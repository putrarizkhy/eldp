<?php
function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');

   fputcsv($df, array('ID Transaksi', 'Judul Buku', 'Member','Tanggal Pinjam','Tanggal Kembali','Tanggal Dikembalikan','Telat','Denda','Status','Catatan'));

   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}
download_send_headers("data_export_" . date("Y-m-d") . ".csv");
$listarray =array();
foreach ($this_transaction as $entry) :
	//$currentdate
	$today = $entry['Rent']['tgl_dikembalikan'];
	$kembali = $entry['Rent']['tgl_kembali']; 
	//$tgl_kembali = date('Y-m-d',$kembali);
	
	$diff = abs(strtotime($today) - strtotime($kembali));
	
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $years*30*60*60*24)/ (60*60*24));
	if($today < $kembali || $days == 0){
		$telat =  '-';
	}else{
		$telat = $days.' hari';
	}
	
	$status1 = $entry['Rent']['status'];
	$status2 = $entry['Rent']['tipe'];

	if($status1==1){
		$status3 = "Keluar";
	}else if($status1==2 && $status2==2){
		$status3 = "Kembali";
		
	}else if($status1==2 && $status2==4){
		$status3 = "Hilang/ Rusak";
		

	}else{
		$status3 = "Hilang/ Rusak";
	}


	$data = array($entry['Rent']['id'],$entry['Book']['title'],$entry['User']['name'],$time->niceShort($entry['Rent']['created']),$time->niceShort($entry['Rent']['tgl_kembali']),$time->niceShort($entry['Rent']['tgl_dikembalikan']),$telat,$entry['Rent']['denda'],$status3,$entry['Rent']['notes']);

	array_push ($listarray, $data);


endforeach; 

$list = array (

    $listarray
);


echo array2csv($listarray);
die();
?>