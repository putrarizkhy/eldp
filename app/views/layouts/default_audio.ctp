<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="" />
<title>Elibrary Client</title>

<?php
echo $html->css('/client/css/foundation.min.css');
echo $html->css('/client/css/jquery.fancybox.css');
echo $html->css('/client/css/keyboard.css');
echo $html->css('/skin/pink.flag/jplayer.pink.flag.css');




echo $javascript->link('/client/js/vendor/modernizr.min.js');
echo $javascript->link('/client/js/jwplayer.js');

echo $javascript->link('/client/js/jquery-1.7.1.min.js');
echo $javascript->link('jquery.jplayer.min.js');
?>


</head>

<body>
<?php e($content_for_layout); ?>


<?php

echo $javascript->link('jquery.form.min.js');

echo $javascript->link('/client/js/jquery.infinitescroll.min.js');

echo $javascript->link('/client/js/jquery.isotope.min.js');
echo $javascript->link('/client/js/jquery.easing.1.3.js');

echo $javascript->link('/client/js/keyboard.js');


echo $javascript->link('/client/js/jquery.transit.min.js');
echo $javascript->link('/client/js/jquery.fancybox.js');
echo $javascript->link('/client/js/jquery.jscroll.min.js');



echo $javascript->link('/client/js/effects.js');
echo $javascript->link('/client/js/superfish.js');

echo $javascript->link('/client/js/foundation.min.js');


?>




<script type="text/javascript">
    $(document).ready(function(){
      $("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            title: "Bubble<br/>jsdf",
            
            mp3: "<?php echo $this->webroot;?>files/audios/Dd_Guetta_Titanium_ft_Sia.mp3",
            wmode:"window"
          });
        },
        swfPath: "/js",
        supplied: "m4a, oga,mp3"
      });
    });
  </script>

<script>
    $(function(){



      var statusView = 'shelfActive';
      var $container = $('#shelf');
    
      $container.isotope({
          itemSelector : '.itemisotope',
      
        });
      
        $container.infinitescroll({
          navSelector  : '#page_nav',    // selector for the paged navigation 
          nextSelector : '#page_nav a',  // selector for the NEXT link (to page 2)
          itemSelector : '.itemisotope',     // selector for all items you'll retrieve
          animate: true,
          loading: {
              finishedMsg: 'Tidak ada item lagi.',
              img: '<?php echo $this->webroot?>images/preloader_small2.gif',
              msgText: "<em>Loading item lainnya</em>",
            }
        },
        // call Isotope as a callback
        function( newElements ) {
          if(statusView == 'listActive'){
              $('.box-home').show();
              $('.box').hide();
            }else{
              $('.box-home').hide();
              $('.box').show();
            }
            console.log(statusView);
            $container.isotope( 'appended', $( newElements ) ); 
        }
        );


    $(".ebookpopup").fancybox({
      'titleShow' : false,
      'openEffect'  : 'elastic',
        'closeEffect' : 'elastic',
      'autoSize' : false,
      'maxWidth':800,
      'padding':0,
      'autoHeight':true
    });

    $( document ).on( "click", "a.bookingpopup", function(e) {
      var bookid = $(this).data('bookid');
      
      $.fancybox({
        titleShow : false,
        openEffect  : 'elastic',
        closeEffect : 'elastic',
        autoSize : false,
        type:'inline',
        href:'#bookingpopup',
        width:500,
        height:300,
        padding:0,
        autoHeight:false,
        afterShow:function(){
          
          $("div.showformmemberbooking").css({
            position: 'absolute',
            top: '-1000px'
          });

          $( "#inputid_memberbooking").focus();
          $( "#inputid_bookbooking").val(bookid);
          
          
        },
        beforeClose:function(){
          $('a.showformmemberbooking').fadeIn();
          $("div.showformmemberbooking").css({
            position: 'absolute',
            top: '-1000px'
          });
          $('#transaction_success').hide();
          $('#transaction_failed').hide();

        }
      });
      e.preventDefault();
    });

    $( document ).on( "click", "a.fancypdf", function() {
      $.fancybox({
        type: 'iframe',
        autoSize: false,
        url: this.href,
          
          beforeClose: function() {
            $(".fancybox-inner").unwrap();
          }
      }); //fancybox
      return false;
    });
    $( "#listview" ).on( "click", shelfviewactive );
      $( "#listview1" ).on( "click", listviewactive );

      function listviewactive(){
      statusView = 'listActive';
      $('.itemisotope').css({'width':'100%','height':'230px'});
      $container.isotope('reLayout');
      $('.box-home').fadeIn();
      $('.box').fadeOut();
      $('#home-content').addClass('list-view');
      $( "#listview1" ).addClass('active');
      $( "#listview" ).removeClass('active');
      return false;

    }

    function shelfviewactive(){
      statusView = 'shelfActive';
      $('.itemisotope').css({'width':'180px','height':'280px'});
      $container.isotope('reLayout');
      $('.box-home').fadeOut();
      $('.box').fadeIn();
      $('#home-content').removeClass('list-view');
      $( "#listview" ).addClass('active');
      $( "#listview1" ).removeClass('active');
      return false;

    }
    });

    $( document ).on( "click", "a.viewebook", function() {
        $.fancybox({

            type: 'html',
            autoSize: false,
            width:'100%',
            height:'100%',
            content: '<embed src="'+this.href+'" height="100%" width="100%" />',
            beforeClose: function() {
                $(".fancybox-inner").unwrap();
            },
            padding:0,
            openEffect:'elastic',
            closeEffect:'elastic',
        }); //fancybox
        return false;
    });


    $( document ).on( "click", "a.viewvideo", function() {
        videoplay = this.href;
       $.fancybox({

        padding : 0, // optional
        title : this.title,
        content: '<div id="containerPlayer">Loading the player ...</div>',
        beforeShow:function(){
            jwplayer("containerPlayer").setup({
                'id': 'playerID',
                'width': '900',
                'height': '550',
                'aboutlink': 'http://basedidea.com',
                'autostart':true,
                //'skin': 'skins/five.xml',
                'image':'images/imagesscreenshot.png',
                'file': videoplay,
            
            });
        },
        beforeClose: function() {
            $(".fancybox-inner").unwrap();
        }
       }); // fancybox
       return false;
      
    }); // ready


    

    $( document ).on( "click", "a.showformmemberbooking", function() {
        window.usebarcodescanner = true;
        $(this).hide();
        $( "#inputid_memberbooking" ).focus();
        $("div.showformmemberbooking").css({
          position: 'relative',
          top: '0'
        });
        console.log(window.usebarcodescanner);
    }); // ready

    $( document ).on( "click", "a.hideformmemberbooking", function() {
        window.usebarcodescanner = false;
        $( "#inputid_memberbooking" ).focus();
        $('a.showformmemberbooking').fadeIn();
        $("div.showformmemberbooking").css({
          position: 'absolute',
          top: '-1000px'
        });
        console.log(window.usebarcodescanner);
    }); // ready




    
    

    
    

</script>


<script>
  jQuery(document).foundation();
  

  // Wrapping, self invoking function prevents globals
  (function() {
     // Hide the elements initially
     var lis = $('.itemisotope').hide();
     


     // When some anchor tag is clicked. (Being super generic here)       
     
        var i = 0;
         
        // FadeIn each list item over 200 ms, and,
        // when finished, recursively call displayImages.
        // When eq(i) refers to an element that does not exist,
        // jQuery will return an empty object, and not continue
        // to fadeIn.
        (function displayImages() {
           lis.eq(i++).fadeIn(200, displayImages);
        })();

     
     
  })();
  
</script>


<script type="text/javascript">
    $(document).ready(function() { 

        window.usebarcodescanner = true;

        function showResponse(responseText, statusText, xhr, $form)  { 
          setTimeout(function() {

            console.log(responseText);
            if(responseText.status == 3){
              alert(responseText.flashMessage);
              closeLoading_booked();

              if(window.usebarcodescanner == true){
                $("div.showformmemberbooking").css({
                  position: 'relative',
                  top: '0'
                });
              }else{
                $("div.showformmemberbooking").css({
                  position: 'absolute',
                  top: '-1000px'
                });
                $('a.showformmemberbooking').show();
              }
              
            }else if(responseText.status == 1){
              closeLoading_booked();
              $('#transaction_failed').hide();
              $('#transaction_success').show();
              $('.status_booked').text(responseText.flashMessage);
              
            }else if(responseText.status == 2){
              closeLoading_booked();
              $('#transaction_success').hide();
              $('#transaction_failed').show();
              $('.status_booked').text(responseText.flashMessage);
              
            }else{
              closeLoading_booked();
              
              alert(responseText.flashMessage);
            }
          }, 2000);

          
        }

        function closeLoading_booked(){
          $('#transaction_success').hide();
          $('#transaction_failed').hide();
          $('#RentBookedForm').clearForm();
          $('.loadingbooking').hide();
          $('a.hideformmemberbooking').hide();
          $('a.showformmemberbooking').hide();
          $("div.showformmemberbooking").css({
            position: 'absolute',
            top: '-1000px'
          });
        }

        var options_booked = {
          dataType:  'json',
          success: showResponse  // post-submit callback
        };

        $('#RentBookedForm').submit(function() { 
          $('.loadingbooking').show();
          $("div.showformmemberbooking").css({
            position: 'absolute',
            top: '-1000px'
          });
          $('a.showformmemberbooking').hide();
          $(this).ajaxSubmit(options_booked);
          $("#RentBookedForm").unbind('submit');
          return false;
        });
    }); 

    
  </script>
</body>
</html>
