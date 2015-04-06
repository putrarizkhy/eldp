<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="" />
<title>Elibrary Client</title>

<meta name="Description" content="Full Customizable Advanced Dynamic Page Flip Flash Object" />
<meta name="Keywords" content="flip,flipping,page flip,pageflip,flip book,flipping book,flash page flip,my page flip" />
<?php echo $javascript->link('FlashObject.js'); ?>
<?php echo $javascript->link('PopUpWin.js'); ?>
<?php echo $javascript->link('RequestObject.js'); ?>

<script type="text/javascript">
function getHTMLEncode(strHTML) {
    var html = "" + strHTML;
    var arrE = [["&","&amp;"], ["\"","&quot;"] ,["<","&lt;"], [">","&gt;"]];
    var arrO = [];

    for (var i=0, j=html.length, k=arrE.length; i<j; ++i) {
        var c = arrO[i] = html.charAt(i);
        for (var l=0; l<k; ++l) {
            if (c == arrE[l][0]) {
                arrO[i] = arrE[l][1];
                break;
            }
        }
    }
    return arrO.join("");
}

var pageparam = Request.QueryString("page");
var pagenum = getHTMLEncode(pageparam);
if(isNaN(pagenum) || pagenum=="") pagenum=0;

</script>
<style type="text/css">
<!--
body {
  background-color: #ccc;
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}
-->
</style></head>
<body>

<a class="buttonback" href="javascript:history.go(-1)" style="position:absolute;top:60px;left:30px;"><img src="<?php echo $this->webroot?>images/back.png"/></a>

<a class="buttonback" href="#" style="position:absolute;top:120px;left:30px;">
<img src="<?php echo $this->webroot;?>client/images/new-logo.png"/>
</a>

<div id="upgrade" style="width:100%; height:100%; text-align:center; font-family:tahoma; font-size:12px"><p>&nbsp;</p><p>&nbsp;</p>
  <strong>You need to upgrade your <a href="http://www.adobe.com/products/flashplayer/" target="_blank" title="Click here for install latest version of Adobe Flash Player">Adobe Flash Player</a><br /><br /><a href="http://www.mypageflip.com" target="_blank">www.MyPageFlip.com</a></strong>
</div>


<?php e($content_for_layout); ?>

<!-- END OF PUBLICATION CODE -->

</body></html>