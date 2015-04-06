<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="" />
<title>Elibrary Client</title>

<?php
echo $html->css('/client/css/foundation.min.css');
echo $html->css('/client/style.css');
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

<div id="wrapper">  <!-- wrapper begin -->

  <div id="masthead"><!-- masthead begin -->

    <div id="head" class="clearfix">
      <div id="blogname-home">  
        
        <h1 class="logo"><a href="<?php echo $this->webroot;?>" title="#"><img src="<?php echo $this->webroot;?>client/images/Logo-ELDP-User-05.png" style="width: 260px; height: auto;"/></a></h1>
      </div>
      
    </div><!--end masthead-->
    

    <div id="botmenu" class="clearfix">
        
        <?php echo $this->renderElement('category_list');?>

  
      <div class="buttonview">
        <ul class="button-group radius">
        
        <li><a id="homeicon" class="button" href="<?php echo $this->webroot;?>" title="#"></a></li>
        <li>
        <?php if($favoriteactive=='true'):?>
        <a id="favorite" class="button active" href="<?php echo $this->webroot;?><?php echo $controllerActive;?>/<?php echo $actionactive;?><?php if(!empty($activecat)){echo '/'.$activecat; }?>" title="#"></a>
        <?php else:?>
        <a id="favorite" class="button" href="<?php echo $this->webroot;?><?php echo $controllerActive;?>/<?php echo $actionactive;?><?php if(!empty($activecat)){echo '/'.$activecat; }?>/?favorite=true" title="#"></a>  
        
        <?php endif;?>
        </li>

        <li><a id="comment" href="#comment1" class="ebookpopup button"></a></li>
        <li><a id="listview1"  class="button" href="#" title="#"></a></li>
        <li><a id="listview" class="active button" href="#" title="#"></a></li>
        </ul>
        <!--oneset-->
          

          <div style="display:none">
            <div id="comment1" class="datapopup">
            <div class="commenthome">
              <div class="postcomment" style="margin-top:30px;">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/avatar2.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                  

                  <h2>Taufiq</h2>
                  <p>This script is a reusable system for adding a graphical keyboard interface to text fields, password fields and textareas so they can be filled with mouse only. It also adds easy access to special characters your existing keyboard may not otherwise have the ability to generate.</p>
                  <br/>
                </div>
              </div>
              <div class="postcomment">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/avatar1.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                 
                  <h2>Adden</h2>
                  <p>This script is a reusable system for adding a graphical keyboard interface to text fields, password fields and textareas so they can be filled with mouse only. It also adds easy access to special characters your existing keyboard may not otherwise have the ability to generate.</p>
                  <br/>
                </div>
              </div>

              <div class="postcomment">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/no_avatar.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                 
                  <textarea rows="4" cols="50" name="comment" form="usrform"></textarea>
                  <form action="demo_form.asp" id="usrform">
                   
                    <input type="submit">
                  </form>
                  <p>Anda harus login terlebih dahulu untuk menambah komentar     &nbsp;<a href="#"> Login</a></p>
                </div>
              </div>



              
            </div>
            </div>
          </div> 
       
 
        
        
      </div>
      
      <?php echo $form->create($ModelActive,array('action'=>'search','type'=>'get','id'=>'searchbar','enctype'=>'multipart/form-data'));?>
      
        <input style="" name="keyword" type="text" placeholder="Pencarian" class="" maxlength="700" value="" id="BookName" data-keyboardname="cari">
      <?php echo $form->end()?>
      
    </div>


    
  </div>

<div id="casing">

    <?php echo ($content_for_layout); ?>




<div id="bookingpopup" style="display:none;">
  <h2>Silahkan scan barcode <br/>kartu member anda</h2>
  
  
  <div class="loadingbooking" style="color:#fff;display:none;">
    <img src="<?php echo $this->webroot?>client/images/ajax-loader2.gif"> &nbsp; Memproses data..
  </div>
  <?php echo $form->create('Rent',array('action'=>'booked','style'=>'margin:0;','autocomplete'=>'off'));
  ?>
  <a href="#" class="showformmemberbooking">Klik jika anda tidak menggunakan barcode scanner</a>
  <div class="row showformmemberbooking" style="position:absolute;top: -100px">
    
    <div class="large-12 columns">
      <label>Masukkan ID Member, kemudian tekan enter

        <?php echo $form->input('usermemberid',array('id'=>'inputid_memberbooking','placeholder'=>'ID Member','label'=>false));?>  
      </label>
      <?php echo $form->input('book_id',array('type'=>'hidden','id'=>'inputid_bookbooking'));?>
      
    </div>
    
    <a href="#" class="hideformmemberbooking">Klik untuk menggunakan barcode scanner</a>
  </div>
  
  <?php echo $form->end();?>
  <div id="transaction_success" style="display:none;">
    <img src="<?php echo $this->webroot?>client/images/checkmark.png" style="width:35px;height:35px;vertical-align:middle"/>
    <span class="status_booked">Berhasil membooking buku</span>
  </div>


  <div id="transaction_failed" style="display:none;">
    <img src="<?php echo $this->webroot?>client/images/close.png" style="width:35px;height:35px;vertical-align:middle"/>
    <span class="status_booked"></span>
  </div>

</div>

<div id="audio_container" style="display:none;">
  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-details">
        <ul>
          <li><span class="jp-title"></span></li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
</div>


<div id="virtualkeyboard">

  <a class="fancybox-close virtualclose"></a>
  <ul id="keyboard">
    <li class="symbol"><span class="off">`</span><span class="on">~</span></li>
    <li class="symbol"><span class="off">1</span><span class="on">!</span></li>
    <li class="symbol"><span class="off">2</span><span class="on">@</span></li>
    <li class="symbol"><span class="off">3</span><span class="on">#</span></li>
    <li class="symbol"><span class="off">4</span><span class="on">$</span></li>
    <li class="symbol"><span class="off">5</span><span class="on">%</span></li>
    <li class="symbol"><span class="off">6</span><span class="on">^</span></li>
    <li class="symbol"><span class="off">7</span><span class="on">&amp;</span></li>
    <li class="symbol"><span class="off">8</span><span class="on">*</span></li>
    <li class="symbol"><span class="off">9</span><span class="on">(</span></li>
    <li class="symbol"><span class="off">0</span><span class="on">)</span></li>
    <li class="symbol"><span class="off">-</span><span class="on">_</span></li>
    <li class="symbol"><span class="off">=</span><span class="on">+</span></li>
    <li class="delete lastitem">delete</li>
    <li class="tab">tab</li>
    <li class="letter">q</li>
    <li class="letter">w</li>
    <li class="letter">e</li>
    <li class="letter">r</li>
    <li class="letter">t</li>
    <li class="letter">y</li>
    <li class="letter">u</li>
    <li class="letter">i</li>
    <li class="letter">o</li>
    <li class="letter">p</li>
    <li class="symbol"><span class="off">[</span><span class="on">{</span></li>
    <li class="symbol"><span class="off">]</span><span class="on">}</span></li>
    <li class="symbol lastitem"><span class="off">\</span><span class="on">|</span></li>
    <li class="capslock">caps lock</li>
    <li class="letter">a</li>
    <li class="letter">s</li>
    <li class="letter">d</li>
    <li class="letter">f</li>
    <li class="letter">g</li>
    <li class="letter">h</li>
    <li class="letter">j</li>
    <li class="letter">k</li>
    <li class="letter">l</li>
    <li class="symbol"><span class="off">;</span><span class="on">:</span></li>
    <li class="symbol"><span class="off">'</span><span class="on">&quot;</span></li>
    <li class="return lastitem">return</li>
    <li class="left-shift">shift</li>
    <li class="letter">z</li>
    <li class="letter">x</li>
    <li class="letter">c</li>
    <li class="letter">v</li>
    <li class="letter">b</li>
    <li class="letter">n</li>
    <li class="letter">m</li>
    <li class="symbol"><span class="off">,</span><span class="on">&lt;</span></li>
    <li class="symbol"><span class="off">.</span><span class="on">&gt;</span></li>
    <li class="symbol"><span class="off">/</span><span class="on">?</span></li>
    <li class="right-shift lastitem">shift</li>
    <li class="space lastitem">&nbsp;</li>
  </ul>

</div>


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


    $( document ).on( "click", "a.cdpembelajaran", function() {

        var datafolder = $(this).data('folder');
        $.fancybox({

            type: 'html',
            autoSize: false,
            width:'100%',
            height:'100%',
            content :'<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" id="movie_name" align="middle"><param name="movie" value="'+this.href+'"/><param name="base" value="'+datafolder+'"/><!--[if !IE]>--><object type="application/x-shockwave-flash" data="'+this.href+'" width="100%" height="100%"><param name="movie" value="'+this.href+'"/><param name="base" value="'+datafolder+'"/><!--<![endif]--><a href="http://www.adobe.com/go/getflash"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/></a><!--[if !IE]>--></object><!--<![endif]--></object>',
            beforeClose: function() {
                $(".fancybox-inner").unwrap();
            },
            padding:0,
            openEffect:'elastic',
            closeEffect:'elastic',
        }); //fancybox
        return false;
    });

    
  

    $(".imagegalerry").fancybox({
      
    });
    $(".ebookpopup").fancybox({
      'titleShow' : false,
      'openEffect'  : 'elastic',
        'closeEffect' : 'elastic',
      'autoSize' : false,
      'maxWidth':800,
      'padding':0,
      'autoHeight':true
    });

    

    
      $(".commentpopup").fancybox({
        //var libraryid = $(this).data.libraryid;
        'titleShow' : false,
        'openEffect'  : 'elastic',
        'closeEffect' : 'elastic',
        'padding':0,
        

        
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


    $( document ).on( "click", "a.viewaudio", function(e) {
      var filetoplay = $(this).data('filetoplay');
      var artist = $(this).data('artist');
      console.log(filetoplay+'dan'+artist);
      $.fancybox({
        titleShow : false,
        openEffect  : 'elastic',
        closeEffect : 'elastic',
        autoSize : false,
        type:'inline',
        href:'#audio_container',
        width:250,
        height:179,
        padding:0,
        autoHeight:false,
        beforeShow:function(){
          
          $("#jquery_jplayer_1").jPlayer({
            ready: function () {
              $(this).jPlayer("setMedia", {
                title:artist,
                artist:artist,
                mp3:filetoplay,
              }).jPlayer("play"); // Attempts to Auto-Play the media
            },
            swfPath: "/js",
            supplied: "mp3"
          });

        },
        beforeClose:function(){
          $("#jquery_jplayer_1").jPlayer("destroy");
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

              //update stock only when success

              var bookid_toupdate = responseText.bookid;
              var availablebookupdate = responseText.available_book;

              $('#dataebook_'+bookid_toupdate).find('dd.bookavailablestatus').text(availablebookupdate);

              if(availablebookupdate <= 0){

                $('#dataebook_'+bookid_toupdate).find('li.bookavailable_button img').hide();
                $('#dataebook_'+bookid_toupdate).find('li.bookavailable_button').append('<span style="padding: 10px;background: rgba(0,0,0,0.5);color: #fff;margin-left: 13px;margin-bottom: 5px;display: inline-block;"> Buku tidak tersedia </span>');

              }

              
              
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

        $('#RentBookedForm').unbind('submit').bind('submit',function(e) {
          e.preventDefault();
          $('.loadingbooking').show();
          $("div.showformmemberbooking").css({
            position: 'absolute',
            top: '-1000px'
          });
          $('a.showformmemberbooking').hide();
          $('#RentBookedForm').ajaxSubmit(options_booked);
          //$("#RentBookedForm").unbind('submit');
          return false;
        });
    }); 

    
  </script>
</body>
</html>
