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
$pdf->SetFont('courier', '', 10);

// add a page
$pdf->AddPage();

// set JPEG quality
$pdf->setJPEGQuality(100);

$cred = <<<EOT
    <p>
        <b>Taufiq Ridha</b><br/>
        <span style="font-size: 80%;">Member</span>
    </p>
EOT;
$id = <<<EOT
    <span style="font-size: 60%;">30078</span>
EOT;

$pdf->Image(dirname(__FILE__).'/img/kartu-perpus.jpg',
            10, 10, 85.6, 53.98, null, null, null, false, 300);

$pdf->writeHTMLCell(60, 15, 50.5, 20.5, $cred);
$pdf->writeHTMLCell(50, 20, 77, 50.5, $id);

//Close and output PDF document
$pdf->Output('filename.pdf', 'F');

?> 