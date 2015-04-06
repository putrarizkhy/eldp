/*
* debouncedresize: special jQuery event that happens once after a window resize
*
* latest version and complete README available on Github:
* https://github.com/louisremi/jquery-smartresize/blob/master/jquery.debouncedresize.js
*
* Copyright 2011 @louis_remi
* Licensed under the MIT license.
*/
var jQueryevent = jQuery.event,
jQueryspecial,
resizeTimeout;

jQueryspecial = jQueryevent.special.debouncedresize = {
	setup: function() {
		jQuery( this ).on( "resize", jQueryspecial.handler );
	},
	teardown: function() {
		jQuery( this ).off( "resize", jQueryspecial.handler );
	},
	handler: function( event, execAsap ) {
		// Save the context
		var context = this,
			args = arguments,
			dispatch = function() {
				// set correct event type
				event.type = "debouncedresize";
				jQueryevent.dispatch.apply( context, args );
			};

		if ( resizeTimeout ) {
			clearTimeout( resizeTimeout );
		}

		execAsap ?
			dispatch() :
			resizeTimeout = setTimeout( dispatch, jQueryspecial.threshold );
	},
	threshold: 50
};

var Boxgrid = (function() {

	var jQueryitems = $( '#rb-grid > li' ),
		transEndEventNames = {
			'WebkitTransition' : 'webkitTransitionEnd',
			'MozTransition' : 'transitionend',
			'OTransition' : 'oTransitionEnd',
			'msTransition' : 'MSTransitionEnd',
			'transition' : 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		jQuerywindow = jQuery( window ),
		jQuerybody = jQuery( 'BODY' ),
		supportTransitions = Modernizr.csstransitions,
		// current item's index
		current = -1,
		winsize = getWindowSize();

	function init( options ) {		

		initEvents();
	}

	function initEvents() {
		
		jQueryitems.each( function() {

			var jQueryitem = jQuery( this ),
				jQueryclose = jQueryitem.find( 'span.rb-close' ),
				jQueryoverlay = jQueryitem.children( 'div.rb-overlay' );

			jQueryitem.on( 'click', function() {

				if( jQueryitem.data( 'isExpanded' ) ) {
					return false;
				}
				jQueryitem.data( 'isExpanded', true );
				// save current item's index
				current = jQueryitem.index();

				var layoutProp = getItemLayoutProp( jQueryitem ),
					clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
					clipPropLast = 'rect(0px ' + (winsize.width +15) + 'px ' + winsize.height + 'px 0px)';


				jQueryoverlay.css( {
					transformOrigin : layoutProp.left + 'px '+ layoutProp.top +'px',
					clip : supportTransitions ? clipPropFirst : clipPropLast,
					transform : supportTransitions ? 'rotate(45deg)' : 'none',
					opacity : 1,
					zIndex: 9999,
					pointerEvents : 'auto'
				} );

				if( supportTransitions ) {
					jQueryoverlay.on( transEndEventName, function() {

						jQueryoverlay.off( transEndEventName );

						setTimeout( function() {
							jQueryoverlay.css( { clip : clipPropLast, transform : 'rotate(0deg)' } ).on( transEndEventName, function() {
								jQueryoverlay.off( transEndEventName );
								jQuerybody.css( 'overflow-y', 'hidden' );
							} );
						}, 25 );

					} );
				}
				else {
					jQuerybody.css( 'overflow-y', 'hidden' );
				}

			} );

			jQueryclose.on( 'click', function() {

				jQuerybody.css( 'overflow-y', 'auto' );

				var layoutProp = getItemLayoutProp( jQueryitem ),
					clipPropFirst = 'rect(' + layoutProp.top + 'px ' + ( layoutProp.left + layoutProp.width ) + 'px ' + ( layoutProp.top + layoutProp.height ) + 'px ' + layoutProp.left + 'px)',
					clipPropLast = 'auto';

				// reset current
				current = -1;

				jQueryoverlay.css( {
					clip : supportTransitions ? clipPropFirst : clipPropLast,
					opacity : supportTransitions ? 1 : 0,
					pointerEvents : 'none'
				} );

				if( supportTransitions ) {
					jQueryoverlay.on( transEndEventName, function() {

						jQueryoverlay.off( transEndEventName );
						setTimeout( function() {
							jQueryoverlay.css( 'opacity', 0 ).on( transEndEventName, function() {
								jQueryoverlay.off( transEndEventName ).css( { clip : clipPropLast, zIndex: -1 } );
								jQueryitem.data( 'isExpanded', false );
							} );
						}, 25 );

					} );
				}
				else {
					jQueryoverlay.css( 'z-index', -1 );
					jQueryitem.data( 'isExpanded', false );
				}

				return false;

			} );

		} );

		jQuery( window ).on( 'debouncedresize', function() { 
			winsize = getWindowSize();
			// todo : cache the current item
			if( current !== -1 ) {
				jQueryitems.eq( current ).children( 'div.rb-overlay' ).css( 'clip', 'rect(0px ' + winsize.width + 'px ' + winsize.height + 'px 0px)' );
			}
		} );

	}

	function getItemLayoutProp( jQueryitem ) {
		
		var scrollT = jQuerywindow.scrollTop(),
			scrollL = jQuerywindow.scrollLeft(),
			itemOffset = jQueryitem.offset();

		return {
			left : itemOffset.left - scrollL,
			top : itemOffset.top - scrollT,
			width : jQueryitem.outerWidth(),
			height : jQueryitem.outerHeight()
		};

	}

	function getWindowSize() {
		jQuerybody.css( 'overflow-y', 'auto' );
		var w = jQuerywindow.width(), h =  jQuerywindow.height();
		if( current === -1 ) {
			jQuerybody.css( 'overflow-y', 'auto' );
		}
		return { width : w, height : h };
	}

	return { init : init };

})();