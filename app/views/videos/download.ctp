<?php
//$Filename = '/* file name */'; 
$path = "files/videos/";
$file = $path.$filename;

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: video/x-flv");
header("Content-Transfer-Encoding: binary");
readfile($file);
?>
