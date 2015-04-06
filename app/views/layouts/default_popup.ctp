<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Elibrary Admin</title>
  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,600' rel='stylesheet' type='text/css'>-->

  
  <?php echo $html->css('metro-bootstrap.min'); ?>
  <?php echo $html->css('iconFont'); ?>
  
  <?php echo $html->css('entypo/entypo'); ?>
  <?php echo $javascript->link('jquery.min.js'); ?>

   <?php echo $javascript->link('jquery.form.min.js'); ?>
  

  <?php echo $javascript->link('modernizr.custom.js'); ?>
  <?php echo $javascript->link('jquery.widget.js'); ?>


  <?php echo $javascript->link('metro.min.js'); ?>
  

  
  

  <!--[if lt IE 9]>
     <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
     <link rel="stylesheet" type="text/css" href="css/ie8.css" />
  <![endif]-->
  
</head>

<body class="metro">

      <!-- // Header Part -->
   
      <?php e($content_for_layout); ?>




 
  


 </body>
</html>