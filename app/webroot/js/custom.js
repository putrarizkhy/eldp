
/***************************************************
		  		   // Portfolio on mouseover opactiy
***************************************************/	
jQuery(document).ready(function () {
if( jQuery.hasOwnProperty("prettyPhoto") ){

jQuery(".lightbox").prettyPhoto({
animation_speed	: 'normal',
theme			: 'pp_default',
social_tools	: ''

});

}


$('.hasTooltip').each(function() { // Notice the .each() loop, discussed below
    $(this).qtip({
        content: {
            text: $(this).data('tooltip') // Use the "div" element next to this for the content
        },

        position: {
        	my: 'top left',
    		at: 'right center',  // Position my top left..
		}
    });
});


$('td.actions a').each(function() { // Notice the .each() loop, discussed below
    $(this).qtip({
        content: {
            text: $(this).data('tooltip') // Use the "div" element next to this for the content
        },

        position: {
        	my: 'top left',
    		at: 'right center',  // Position my top left..
		}
    });
});

//prettyPhoto END	
});

/***************************************************
		  			Nivo Slider start
***************************************************/

 
  // Nivo Slider END
  




/* Box Grid Start */
		jQuery(function() {
			Boxgrid.init();
		});
/* Box Grid  End*/

/* Custom Scroll*/


/* Custom Scroll end*/

/***************************************************
		  		//	Preloader Script
***************************************************/

$(window).load(function() {
  $('#preloader').fadeOut(300, function() {
    $('body').css('overflow','visible');
    $(this).remove();
  });
});

//	//	Preloader Script


/* Background slide start */

function thebackground() {
$('div.background img').css({opacity: 0.0});
$('div.background img:first').css({opacity: 1.0});
setInterval('next()',7000);
}

function next() {
var current = ($('div.background img.show')? $('div.background img.show') : $('div.background img:first'));
if ( current.length == 0 ) current = $('div.background img:first');
var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div.background img:first') :current.next()) : $('div.background img:first'));
next.css({opacity: 0.0})
.addClass('show')
.animate({opacity: 1.0}, 3000);
current.animate({opacity: 0.0}, 3000)
.removeClass('show');
};

/*$(document).ready(function() {
thebackground();	
$('div.background').fadeIn(4000); // works for all the browsers other than IE
$('div.background img').fadeIn(4000); // IE tweak
});*/

/* Background slide end */



