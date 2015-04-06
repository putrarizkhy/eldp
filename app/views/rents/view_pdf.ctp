<?php 
foreach ($rents as $rent):
$file = 'img/barcode/code_'.$rent['Rent']['id'].'.png';
if (fileExistsInPath($file))	{
echo 'udah ada';
}else{
$data_to_encode = $rent['Rent']['id'];
                        
// Generate Barcode data
$barcode->barcode();
$barcode->setType('C128');
$barcode->setCode($data_to_encode);
$barcode->setSize(80,200);

// Generate filename            
$random = rand(0,1000000);


// Generates image file on server            
$barcode->writeBarcodeFile($file);

// Display image
echo $html->image('barcode/code_'.$rent['Rent']['id'].'.png'); 
}
endforeach;
?> 
