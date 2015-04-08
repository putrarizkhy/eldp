<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Elibrary Admin</title>
  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600' rel='stylesheet' type='text/css'>-->

  <?php echo $html->css('responsive'); ?>
  <?php echo $html->css('metro-bootstrap'); ?>
  <?php echo $html->css('iconFont'); ?>
  <?php echo $html->css('typography'); ?>
  <?php echo $html->css('entypo/entypo'); ?>
  
  <?php echo $html->css('settings'); ?>
  <?php echo $html->css('styles'); ?>
  <?php echo $javascript->link('jquery.min.js'); ?>

  <?php echo $html->css('jquery.qtip'); ?>
  <!--[if lt IE 9]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <link rel="stylesheet" type="text/css" href="css/ie8.css" />
  <![endif]-->
  
</head>

<body class="metro">

  <!-- Preloader-  -->
  <!--<div id="preloader">
    <div id="spinner_container"><img id="spinner" src="images/loading.gif" alt="" /></div>
  </div>-->
  <!-- Preloader-  END--> 

  <div class="background">
  <img src="<?php echo $this->webroot;?>slider/matdes.jpg" alt="pic1" />
    <!--<img src="slider/image2.png" alt="pic2" />
   
  <img src="slider/3.jpg" alt="pic3" />
   <img src="slider/4.jpg" alt="pic4" />-->
  </div>

  



  <div class="container2">
    <div class="loadingpagecontainer">
    
    <div class="loader loadingstateall" style="">
      <img src="<?php echo $this->webroot;?>images/rotite-30-29.png" width="928" height="29" style="position: absolute; display: block; overflow: hidden; left: 0px; top: 0px; margin: 0px; padding: 0px; max-width: none; max-height: none; border: none; line-height: 1; background-color: transparent; -webkit-backface-visibility: hidden; -webkit-user-select: none;">
    </div>
    <p class="loaderstat" style="color:#fff;">Memuat data mohon menunggu </p>
    </div>

    <div class="main">

      <!-- Header Part -->
      <div class="clearfix sub_page">
        <div class="clr logo_bg">
          <div class="logo_center">
            <div class="logo"><span>Admin</span>&nbsp;Panel</div>
            <div class="slogan">Electronic Library</div>
          </div>
          <div class="header_rightbg">
            <div class="clr"> 
              <div class="ph_number">
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Header Part -->
   
      <?php e($content_for_layout); ?>
   </div>
  </div><!-- /container -->


  
  <?php echo $javascript->link('jquery.form.min.js'); ?>

  
  <?php echo $javascript->link('modernizr.custom.js'); ?>
  <?php echo $javascript->link('jquery.widget.js'); ?>


  <?php echo $javascript->link('metro.min.js'); ?>

  
  <?php echo $javascript->link('jquery.debouncedresize.js'); ?>

  <?php echo $javascript->link('retina.js'); ?>
  <?php echo $javascript->link('jquery.qtip.js'); ?>
  <?php echo $javascript->link('settings.js'); ?>
  <?php echo $javascript->link('custom.js'); ?>

  
  

 </body>
</html>