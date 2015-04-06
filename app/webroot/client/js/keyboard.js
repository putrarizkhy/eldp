$(function(){
	
	var	shift = false,
		capslock = false;
		virtualActive = false;
		enterText = '';
		FormID = '';
	

	$("input[type=text].withvirtual").focus(function(){
		$write = $(this);
		enterText = $(this).data('keyboardname');
		FormID = $(this).parents('form').attr('id')
		virtualGoActive();
		$(this).addClass('inputactive');
		

	});

	$( "input[type=text].withvirtual" ).change(function() {
  		$(this).focus();
  		$(this).addClass('inputactive');
	});

	$( "input[type=text].withvirtual" ).blur(function() {
  		//$write = '';
		//virtualClose();
		virtualActive = false;
		
	});

	function virtualClose(){
		$('#virtualkeyboard').transition({ y: 400,delay: 20 });
		$write.blur();
		$write.removeClass('inputactive');
		$write.val('');
	}

	function virtualGoActive(){
		$('#virtualkeyboard').transition({ y: -400 });
		virtualActive = true;
		$('ul#keyboard > li.return').text(enterText);
	}

	$(".virtualclose").click(function(){
		virtualClose();
	});

	
	
	$('#keyboard li').click(function(){
		
		var $this = $(this),
			character = $this.html(); // If it's a lowercase letter, nothing happens to this variable
		
		// Shift keys
		if ($this.hasClass('left-shift') || $this.hasClass('right-shift')) {
			$('.letter').toggleClass('uppercase');
			$('.symbol span').toggle();
			
			shift = (shift === true) ? false : true;
			capslock = false;
			return false;
		}
		
		// Caps lock
		if ($this.hasClass('capslock')) {
			$('.letter').toggleClass('uppercase');
			capslock = true;
			return false;
		}
		
		// Delete
		if ($this.hasClass('delete')) {
			var html = $write.val();
			
			$write.val(html.substr(0, html.length - 1));
			return false;
		}
		
		// Special characters
		if ($this.hasClass('symbol')) character = $('span:visible', $this).html();
		if ($this.hasClass('space')) character = ' ';
		if ($this.hasClass('tab')) character = "\t";
		if ($this.hasClass('return')) {
			var html = $write.val();
			$('form#'+FormID).submit();
			return false;
		}
		
		// Uppercase letter
		if ($this.hasClass('uppercase')) character = character.toUpperCase();
		
		// Remove shift once a key is clicked.
		if (shift === true) {
			$('.symbol span').toggle();
			if (capslock === false) $('.letter').toggleClass('uppercase');
			
			shift = false;
		}
		
		// Add the character
		$write.val($write.val() + character);

		if(virtualActive = true){
			$write.focus();
		}
		
	});
});