
<div class="liquid-slider" id="slider-id">
<div id="landing1">
  
<!--<div id="headerlanding"></div>
<div id="digiclock"></div>-->
<img src="<?php echo $this->webroot;?>client/images/Logo-ELDP-User-05.png" id="logolanding"/>
<div id="pengumuman">
<img src="<?php echo $this->webroot;?>client/images/notes.png" id="notes"/>
  <section id="content" class="sub-content">
    
    
      <!--<div id="menu"></div>-->
      <div id="mybook">
          <div title="first page" rel="first chapter">
            <img src="<?php echo $this->webroot;?>client/images/pen.png"/>
              <!--<h3>1 jQuery Booklet</h3>
              <p>This is a sample booklet! It uses all of the default options, but feel free to explore all the possibilities in the <a href="options">options</a> section.</p>
              <h3>Content Variety</h3>
              <p>You can place any sort of html elements inside of your booklet pages. There is no limit to the possibilities you can create. Even using simple options, you can have elaborate displays.</p>-->
          </div>
          <div title="second page">
              <h3 style="font-size:20px;">Pengumuman 1</h3>
              <p></p>
              <ul>
                  <li><h4>Total Buku terdaftar:</h4><h2><?php echo $totalbook;?></h2></li>
                  <li><h4>Total Video terdaftar:</h4><h2><?php echo $totalvideo;?></h2></li>
                  <li><h4>Total Audio terdaftar:</h4><h2><?php echo $totalaudio; ?></h2></li>
                  <li><h4>Total Ebook terdaftar:</h4><h2><?php echo $totalebook; ?></h2></li>
                  
              </ul>
              <p></p>
          </div>
          <?php 
          $no = 0;
          ?>
          <?php foreach ($notifclient as $notif) : ?>
          <div title="third page">
              <h3 style="font-size:20px; padding-left:10px;"><?php echo $notif['Notification']['title']?></h3>
              <p style="">

                <?php
                echo '<span></span><br/>';
                if($notif['Notification']['dir']!=null){?>
                    <img width="245" src="<?php echo $this->webroot.$notif['Notification']['dir'];?>"/>
                <?php }else{
                    echo '<p class="fontred">No Image</p>';
                }

                ?>

              </p>
              <p style=""><?php echo $notif['Notification']['content']?></p>

          </div>
        <?php endforeach; ?>
      </div>
  </section>
</div>



<!--<div id="libraryidentity">
  <h1>Integrated Library System</h1>
  <p>SMAN 8 Jakarta</br>
  Jalan Taman Bukitduri Tebet Jakarta Selatan</br>
Telpon 021-: 8295455, Fax. 021-8351782</p>
</div>-->
<div id="box">
<img src="<?php echo $this->webroot;?>client/images/papan-gambar-03.png" id="tablet"/>


  <ul class="bxslider">
  <?php foreach ($banner as $banner) :  ?>
    <li><img src="<?php echo $this->webroot.$banner['Banner']['file'];?>"></li>
    <?php endforeach; ?>
    <!--li><img src="<?php echo $this->webroot;?>client/images/slider/slide2.png"></li>
    <li><img src="<?php echo $this->webroot;?>client/images/slider/slide3.png"></li>
    <li><img src="<?php echo $this->webroot;?>client/images/slider/slide4.png"></li-->
    <!--<li><img src="<?php echo $this->webroot;?>client/images/slider/image1.png"></li>
    <li><img src="<?php echo $this->webroot;?>client/images/slider/image2.png"></li>
    <li><img src="<?php echo $this->webroot;?>client/images/slider/image3.png"></li>-->
    
  </ul>

</div>


<div id="bgstart"><img src="<?php echo $this->webroot;?>client/images/tombol-mulai-01.png" style="width:200px; height:auto;"/></div>
<div id="welcomelandingtext">
  <!--<h2>SELAMAT DATANG DI</h2>
  <h1>e-LIBRARY</h1>
  <div class="sponsortext">
    <p>In previous article I explained 6 jQuery News ticker plugin examples, 4 SpellChecker Plugin examples, 4 jQuery Price Range slider examples, 11+ Best jQuery Countdown timer plugins, 12+ Best jQuery Drag and Drop Plugins, 11+ best jQuery Scroll to top plugins and many articles relating to jQuery Plugins, JQuery, Ajax, asp.net, SQL Server etc. Now I will explain best jQuery clock plugins (analog & digital) examples.</p>
  </div>-->
  <a href="#" id="gotoslidelanding2" class="" style="margin-top:450px; float:right; right:40px; font-size: 20px;">Mulai</a>
</div>

  </div>

  <div id="landing2">

    
    <div id="wrapper">  <!-- wrapper begin -->

      <div id="masthead"><!-- masthead begin -->

        <div id="head" class="clearfix">
          <div id="blogname-home">  
            
            <h1 class="logo"><a href="<?php echo $this->webroot;?>" title="#"><img src="<?php echo $this->webroot;?>client/images/Logo-ELDP-User-05.png" style="width: 260px; height: auto;"/></a></h1>
          </div>
          
        </div><!--end masthead-->
        

        <div id="botmenu" class="botmenuhome clearfix">
          <p class="home">Selamat Datang Electronic Library</p>
          <span>Silahkan pilih tipe pustaka yang ingin anda lihat, atau silahkan scan barcode buku atau kartu member anda</span>
        </div>


        
      </div>

      <div id="casing">

        <div id="home-content1" class="clearfix">
          <div class="tip clearfix" style="margin-left:0px;width:1215px;">
            <ul >Buku</ul>
            <ul style="margin-left: 127px;">E-book</ul>
            <ul style="margin-left: 119px;">Video</ul>
            <ul style="margin-left: 73px;">CD Pembelajaran</ul>
            <ul style="margin-left: 68px;">Audio</ul>
            <ul style="margin-left: 123px;">Foto</ul>
          </div>

          <div id="shelf-home">

            <div class="box" id="bukuHome">
              <a href="<?php echo $this->webroot;?>books" class="ebookpopup">
                <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-buku-05.png">
              </a>
            </div>
            
            <div class="box" id="ebookHome">
              <a href="<?php echo $this->webroot;?>ebooks" class="ebookpopup">
                <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-ebook-06.png">
              </a>
            </div>

            <div class="box" id="videoHome">
              <a href="<?php echo $this->webroot;?>videos" class="ebookpopup">
                  <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-video-07.png">
              </a>
            </div>

            <div class="box" id="CDHome">
              <a href="<?php echo $this->webroot;?>subjects" class="ebookpopup">
                <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-cd-08.png">
              </a>
            </div>

            <div class="box" id="audioHome">
               <a href="<?php echo $this->webroot;?>audios" class="ebookpopup">
                <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-audio-09.png">
              </a>
            </div>

            <div class="box" id="fotoHome">
              <a href="<?php echo $this->webroot;?>photos" class="ebookpopup">
                <img class="postim bittle" src="<?php echo $this->webroot;?>client/images/kotak-foto-10.png">
              </a>
            </div>

          </div>
        </div>


        
        <div class='clear'></div> 
        
        <div class="bottomcover ">

          <div id="bottom">
            
            <div class="clear"> </div>
          </div>
        </div>

        
        <div class='clear'></div> 
      </div>
    </div>

  </div>
</div>

<?php

echo $javascript->link('/client/js/jquery-1.7.1.min.js');

echo $javascript->link('/client/js/jquery.bxslider.min.js');

//echo $javascript->link('/client/js/jquery.infinitescroll.min.js');

//echo $javascript->link('/client/js/jquery.isotope.min.js');
echo $javascript->link('/client/js/jquery.easing.1.3.js');

echo $javascript->link('/client/js/jquery.touchSwipe.min.js');
echo $javascript->link('/client/js/jquery.liquid-slider.min.js');

//echo $javascript->link('/client/js/keyboard.js');


echo $javascript->link('/client/js/jquery.transit.min.js');
//echo $javascript->link('/client/js/jquery.fancybox.js');
//echo $javascript->link('/client/js/jquery.jscroll.min.js');



//echo $javascript->link('/client/js/effects.js');
//echo $javascript->link('/client/js/superfish.js');

//echo $javascript->link('/client/js/foundation.min.js');

echo $javascript->link('/client/js/jquery.booklet.latest.js');

?>





<script>
    $(function(){

    $('#slider-id').liquidSlider({
      dynamicTabs:false,
      hideSideArrows:true
    });
    var api2 = $.data( $('#slider-id')[0], 'liquidSlider');

    $('#gotoslidelanding2').click(function (e) {
      api2.setNextPanel(1);api2.updateClass($(this))
    });  

    $('.bxslider').bxSlider({
      pager:false,
      auto:true
    });
    
    });
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
  var windowWidth = $(window).width(); //retrieve current window width
  var windowHeight = $(window).height(); //retrieve current window height

  $("#landing1").width(windowWidth).height(windowHeight);
  $("#landing2").width(windowWidth).height(windowHeight);
  $(".panel-wrapper").width(windowWidth).height(windowHeight);
  $(".panel-container").height(windowHeight);
  $("#slider-id-wrapper").width(windowWidth).height(windowHeight);
  $("#slider-id-wrapper").css('max-width',windowWidth);
  
  
  $("#slider-id").width(windowWidth);


  var buku = $('#bukuHome');
    var ebook = $('#ebookHome');
    var video = $('#videoHome');
    var cd = $('#CDHome');
    var audio = $('#audioHome');
    var foto = $('#fotoHome');

    function goyang(mc){
      $(mc).transition({ y: '-40px' },function(){
        $(mc).transition({ y: '0' });
      });
    }
    $.fx.speeds._default = 250;
    
    function goyangCD(){
      goyang(foto);
      setTimeout(function() {
        productGoyang();
        },3500);
    }

    
    
    function productGoyang(){

      setTimeout(function() {
        goyang(buku);
        },3500);
        setTimeout(function() {
          goyang(ebook);
        },4000);
        setTimeout(function() {
          goyang(video);
        },4500);

        setTimeout(function() {
          goyang(cd);
        },5000);

        setTimeout(function() {
          goyang(audio);
        },5500);

        setTimeout(function() {
          goyangCD();
        },6000);


    }
    productGoyang();
    //productInRed();
  

})
</script>
<script>
  //jQuery(document).foundation();
  
  
</script>


  <script type="text/javascript">
      $(function () {
    
      // Init
      
      var updateSelect = function (event, data) {
        var pageTotal = data.options.pageTotal;
        $('#gotoIndex, #addIndex, #removeIndex').children().remove();
        $('#gotoIndex, #addIndex, #removeIndex').append('<option value="start">start</option><option value="end">end</option>');            
        for(i = 0; i < pageTotal; i++) {
          $('#gotoIndex, #addIndex, #removeIndex').append('<option value="'+ i +'">'+ i +'</option>');            
        }
      };
      
      var options = $.extend({}, $.fn.booklet.defaults, {
          pagePadding: 15,
          menu: "#menu",
          height: 405,
          width:570,
          speed : 1500,
          pagePadding:20,
          pageSelector: true,
          chapterSelector: true,
          arrows: false,
          
          auto: true,
          delay: 6000,

          manual: false,
          overlays: true,
          

          arrowsHide:true
      });
      var updateOptions = function () {
        $('#options-list').children().remove();
        $.each(options, function(key, value){
          $('#options-list').append('<li>'+key+' <input value="'+value+'" id="option-'+key+'" /></li>');
          $('#option-'+key).on('change', function(e){
            e.preventDefault();
            var value = $(this).val();
            var intValue = parseInt(value);
            
            if(!isNaN(intValue)) {
              options[key] = intValue;
              return;
            }

            options[key] = value;
          });
        });
      };
      updateOptions();
      
      var config = $.extend({}, options, {
        create: updateSelect,
        add: updateSelect,
        remove: updateSelect
      });
          var mybook = $("#mybook").booklet(config);
  
      $('#gotoIndex').on('change', function(e){
        e.preventDefault();
        $('#custom-gotopage').click();
      });
  
      // New Page Default HTML
  
      var newPageCount = 0;
          var newPageHtml = function() {
        newPageCount++;
        return "<div rel='new chapter'>New Page \#"+newPageCount+"</div>";
      };
      
      
      // Display
      
          var display = $("#display");
      var updateDisplay = function(message) {
        display.text(message + '\r\n' + display.text());
      };
  
      // Demo Actions
  
          $('#custom-destroy').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet("destroy");
              updateDisplay('$("#mybook").booklet("destroy")');
          });

          $('#custom-create').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet(config);
              updateDisplay('$("#mybook").booklet();');
          });

          $('#custom-disable').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet("disable");
              updateDisplay('$("#mybook").booklet("disable")');
          });

          $('#custom-enable').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet("enable");
              updateDisplay('$("#mybook").booklet("enable")');
          });

          $('#custom-next').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet("next");
        updateDisplay('$("#mybook").booklet("next");');
          });

          $('#custom-prev').click(function (e) {
              e.preventDefault();
              $("#mybook").booklet("prev");
        updateDisplay('$("#mybook").booklet("prev");');
          });

          $('#custom-gotopage').click(function (e) {
              e.preventDefault();
        var index = $('#gotoIndex').val();
              $("#mybook").booklet("gotopage", index);
        updateDisplay('$("#mybook").booklet("gotopage", '+(index == "start" || index == "end" ? '"'+index+'"' : index)+');');
          });

          $('#custom-add-index').click(function (e) {
              e.preventDefault();
        var newPage = newPageHtml();
        var index = $('#addIndex').val();
              $("#mybook").booklet("add", index, newPage);
        updateDisplay('$("#mybook").booklet("add", '+ (index == "start" || index == "end" ? '"'+index+'"' : index) +', "'+ new String(newPage) +'");');
          });
  
          $('#custom-remove-index').click(function (e) {
              e.preventDefault();
        var index = $('#removeIndex').val();
              $("#mybook").booklet("remove", index);
        updateDisplay('$("#mybook").booklet("remove", '+ (index == "start" || index == "end" ? '"'+index+'"' : index) +');');
          });

          $('#custom-update-options').click(function (e) {
              e.preventDefault();
        $("#mybook").booklet("option", options);
        updateDisplay('$("#mybook").booklet("option", '+ options +');');
          });
  
          $('#custom-reset-options').click(function (e) {
              e.preventDefault();
        $("#mybook").booklet("option", config);
        updateDisplay('$("#mybook").booklet("option", '+ options +');');
        updateOptions();
          });

      });
    </script>
