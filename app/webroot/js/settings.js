// JavaScript Document


$(document).ready(function(){
//  Settings Panel 
	$('.open-buttton').click(function(){
	
		if($('.open-buttton').hasClass('closed')){
			$(this).parent('.settings-panel').stop().animate({left:175},400);
			$(this).removeClass('closed').addClass('opened');
		} else {
			$(this).parent('.settings-panel').stop().animate({left:0},400);
			$(this).removeClass('opened').addClass('closed');
		}
	});

	
// Bacground Patterns and Background Colour 
	
$('.settings-panel .bg_patterns ul li').click(function(){
		var thisBGcol = $(this).css('background-color');
		var thisBGimg = $(this).css('background-image');
		$('body').css('background-image', thisBGimg);
		$('.rb-week > div').css('background-image', thisBGimg);
	});
	
	// Heading  Font and CSS Changes 
	
	$('#cfont').change(function(){
		var fontName = $('#cfont').val();
		if(fontName == 'default'){
			$('#customFont').attr('href','css/typography.css');
		}else if(fontName == 'cardo'){
			$('#customFont').attr('href','css/cardo.html');
			} else if(fontName == 'IMFell'){
			$('#customFont').attr('href','css/IMFell.html');
		} else if(fontName == 'Josefin'){
			$('#customFont').attr('href','css/Josefin.html');
		}  else if(fontName == 'OpenSansCondensed'){
			$('#customFont').attr('href','css/OpenSansCondensed.html');
		}   else if(fontName == 'OpenSans'){
			$('#customFont').attr('href','css/OpenSans.html');
		} else if(fontName == 'Vollkorn'){
			$('#customFont').attr('href','css/Vollkorn.html');
		} else if(fontName == 'DroidSans'){
			$('#customFont').attr('href','css/DroidSans.html');
		}
		else if(fontName == 'cabin'){
			$('#customFont').attr('href','css/cabin.html');
		}else {
			$('#customFont').attr('href','css/typography.css');
		}
	});
	
	
// Content Font and CSS Changes 
	
	$('#confont').change(function(){
		var fontName = $('#confont').val();
		if(fontName == 'default'){
			$('#contentfont').attr('href','css/arial_content.html');
		}else if(fontName == 'Arial'){
			$('#contentfont').attr('href','css/arial_content.html');
		} else if(fontName == 'Tahoma'){
			$('#contentfont').attr('href','css/tahoma_content.html');
		} else if(fontName == 'Verdana'){
			$('#contentfont').attr('href','css/verdana_content.html');
		}    else if(fontName == 'OpenSans'){
			$('#contentfont').attr('href','css/opensans_content.html');
		} 
	});
	
	});
