
<!-- STARTING PUBLICATION CODE -->

<script type="text/javascript">


var fo = new FlashObject("<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/swf/publication.swf", "MyPageFlip", "100%", "100%", "8", "9c9c9c");

fo.addParam("base","<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/")
//Your Security Number
fo.addVariable("SecurityCode", "1N5R95EJW651WE60"); //You must specify your security code firstly, otherwise the application will not work!

//Colors
fo.addVariable("BackgroundColor", "9c9c9c");  //background color in hexadecimal format
fo.addVariable("BackgroundColorDegrade", "true"); //true or false
fo.addVariable("ToolbarsColor", "dddddd");  //toolbars color in hexadecimal format
fo.addVariable("ToolbarsAlpha", "100"); //transparency setting for the toolbars, enter a number between 1-100
fo.addVariable("ButtonsColor", "fa7600"); //buttons color in hexadecimal format
fo.addVariable("LoaderColor", "808080");  //loader color in hexadecimal format
fo.addVariable("PagesColor", "dfdfdf"); //pages background color in hexadecimal format
fo.addVariable("PagesLoaderColor", "ff9999"); //pages loader color in hexadecimal format
fo.addVariable("TextsColor", "333333"); //text color in hexadecimal format
fo.addVariable("TipsColor", "ffffcc");  //tips color in hexadecimal format

//Backgrounds and Sounds
fo.addVariable("BgImage1", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/backgrounds/park.jpg"); //first of the background images
fo.addVariable("BgImage2", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/backgrounds/beach.jpg");  //second of the background images
fo.addVariable("BgImage3", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/backgrounds/office.jpg"); //third of the background images
fo.addVariable("BgMode1", "tile"); //background mode for first of the background images (tile, centered or stretch)
fo.addVariable("BgMode2", "tile");  //background mode for second of the background images
fo.addVariable("BgMode3", "tile");  //background mode for third of the background images
fo.addVariable("DefaultBgImage", "1");  //opening the default background
fo.addVariable("MaxTileScreenWidth", "2560"); //maximum width for tile the background image
fo.addVariable("MaxTileScreenHeight", "1440");  //maximum height for tile the background image
fo.addVariable("BgSound1", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/sounds/park.mp3");  //first of the background sounds
fo.addVariable("BgSound2", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/sounds/beach.mp3"); //second of the background sounds
fo.addVariable("BgSound3", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/sounds/office.mp3");  //third of the background sounds
fo.addVariable("FlipSound", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/sounds/flip01.mp3"); //page flip sound effect

//Options
fo.addVariable("PublicationName", "<?php echo $ebook['Ebook']['title']?>");
fo.addVariable("BeginningPage", pagenum); //this parameter is called the address line, must add the "Page" parameter to url eg:www.domain.com/mypageflip.html?Page=5
fo.addVariable("ShowHideToolbars", "show"); //show, hide, auto, autohidetop, autohidebottom, hidetop or hidebottom
fo.addVariable("SoundOnOff", "on"); //on or off
fo.addVariable("EasingTween", "true");  //true or false
fo.addVariable("EasingSpeed", "15");  //figures as
fo.addVariable("BlurredBackground", "false"); //true or false
fo.addVariable("SmoothImageLoad", "false"); //true or false
fo.addVariable("Theme", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/themes/default.swf");  //path of theme file
fo.addVariable("PrePage", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/pages/prepage.swf"); //path of prepage file
fo.addVariable("SimultaneouslyLoadedPages", "20");
fo.addVariable("BookBeginCenter","false");  //true or false
fo.addVariable("HardCover", "false"); //true or false
fo.addVariable("HardCoverRatio", "-30");  //hardflip max y difference
fo.addVariable("HardCoverThickness", "6");  //in pixels
fo.addVariable("HardCoverThicknessColor", "f7f7f7");  //thickness color in hexadecimal format
fo.addVariable("HardCoverThicknessCapsStyle", "none");  //none, round or square
fo.addVariable("HardCoverThicknessJointStyle", "bevel");  //miter, round or bevel
fo.addVariable("IssuesMenuWidth", "200"); //in pixels
fo.addVariable("RealisticPages", "false");  //true or false
fo.addVariable("FlipWithMouse", "true");  //true or false
fo.addVariable("PageFlipSpeed", "3"); //figures as
fo.addVariable("PageFlipStarterSquare", "1"); //a percentage of page width
fo.addVariable("PageFlipSensitiveArea", "99");  //a percentage of page width
fo.addVariable("RightToLeft", "false"); //true or false

//Top Buttons
fo.addVariable("butActualSize", "true");  //true or false for all buttons
fo.addVariable("butFitToScreen", "true");
fo.addVariable("butZoomIn", "true");
fo.addVariable("butZoomOut", "true");
fo.addVariable("butContents", "true");
fo.addVariable("butThumbnails", "true");
fo.addVariable("butFullScreen", "true");
fo.addVariable("butQuality", "true");
fo.addVariable("butSound", "true");
fo.addVariable("butPrint", "true");
fo.addVariable("butTellFriend", "true");
fo.addVariable("butBackground", "true");
fo.addVariable("butHelp", "true");
fo.addVariable("butPDF", "true");

//Bottom Buttons
fo.addVariable("butFrontCover", "true");  //true or false for all buttons
fo.addVariable("butFlipPrev", "true");
fo.addVariable("butGoToPage", "true");
fo.addVariable("pageNumMC", "true");
fo.addVariable("butFlipNext", "true");
fo.addVariable("butBackCover", "true");
fo.addVariable("issuesMenu", "false");

//Paths
fo.addVariable("pagesFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/xml/pages.xml"); //paths of external config files, you can change according to your own directories
fo.addVariable("tocFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/xml/contents.xml");
fo.addVariable("helpFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/xml/help.xml");
fo.addVariable("issuesFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/xml/issues.xml");
fo.addVariable("langFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/languages/english.xml");
fo.addVariable("pdfFile", "<?php echo $this->webroot?>files/ebooks/<?php echo $ebook['Ebook']['id']?>/pdf/MyPF-XML-Basic-Version.pdf");

//Do not change these variables
fo.write("upgrade");

</script>