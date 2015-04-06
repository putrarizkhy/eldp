<?php 
App::import('Vendor','tcpdf/tcpdf'); 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT,
                 true, 'UTF-8', false); 

// set document information
$pdf->SetCreator('SO-youth');
// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
//$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(100);
$horizontal_alignments = array('L', 'C', 'R');
$vertical_alignments = array('T', 'M', 'B');
// test fitbox with all alignment combinations
for ($m = 0; $m < 10; ++$m) {
$pdf->AddPage();
$x = 10;
$y = 10;
$w = 85;
$h = 53;
// test all combinations of alignments

	for ($i = 0; $i < 3; ++$i) {
		$fitbox = $horizontal_alignments[$i].' ';
		$x = 10;
		for ($j = 0; $j < 2; ++$j) {
			$fitbox{1} = $vertical_alignments[$j];
			$pdf->Rect($x, $y, $w, $h, 'F', array(), array(128,255,128));
			$pdf->Image(dirname(APP).'/img/kartu-perpus.jpg', $x, $y, $w, $h, 'JPG', '', '', false, 300, '', false, false, 0, $fitbox, false, false);
			$x += 87; // new column
		}
		$y += 100; // new row
	}


}
	

$pdf->Output('filename.pdf', 'I');

?> 
