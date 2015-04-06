<?php
header("Content-Disposition:attachment;filename='".$filename.".pdf'");
//header("Content-type:application/pdf");

// It will be called downloaded.pdf


// The PDF source is in original.pdf
readfile($filename);
?>

<html>
<body>