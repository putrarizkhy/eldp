<style type="text/css">
	.metro h2.totalkas {
		font-size: 21px;
		color: #fff;
		line-height: 40px;
		margin-bottom: 27px;
		font-weight: 300;
		width: 350px;
		float: left;
	}
	.bottom_line{
		clear: both;
		display: none;
	}
</style>
<?php
date_default_timezone_set('Asia/Jakarta');
echo $this->renderElement('header_paginate'); 
?>
<div class="mask1 content_transaction_container">
  <div class="actions">
    
    <h2 class="totalkas"> Total Kas Bulan <?php echo date('F');?> = Rp <?php echo $total_this_month_transaction;?></h2>
    <h2 class="totalkas"> Total Kas Tahun <?php echo date('Y');?> = Rp <?php echo $total_thisyear_transaction;?></h2>
    <div class="buttonlist_finance">
    	<button id="dofindfinance" type="submit" style="float:left;" class="info normal printview opennewtab" href="<?php echo $this->webroot?>admin/rents/financelist_print">Print</button>
    	<button id="dofindfinance" type="submit" style="float:left;" class="info normal opensametab" href="<?php echo $this->webroot?>admin/rents/finance_download">Export</button>
    </div>

    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table">
		<th class="smallest-row"><?php echo ('ID Transaksi');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>

		<th class="largest-row"><?php echo ('Member');?></th>
		<?php if($tipe == 3):?>
			<th><?php echo ('Tanggal Booking');?></th>
		<?php else:?>
			<th><?php echo ('Tanggal Pinjam');?></th>
			<th><?php echo ('Tanggal Kembali');?></th>
			<th><?php echo ('Tanggal Dikembalikan');?></th>
		<?php endif;?>
		
		<?php if($tipe != 3):?>
			<th><?php echo ('Telat');?></th>
			<th><?php echo ('Denda');?></th>

		<?php endif;?>
		<th><?php echo ('Status');?></th>
		<th><?php echo ('Catatan');?></th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rents as $rent) : ?>
        <tr class="altrow ">
			<td class="smallest-row"><?php echo $rent['Rent']['id']?></td>
			<td><?php echo $rent['Book']['title']; ?></td>
			<td><?php echo $rent['User']['name']; ?></td>

			<?php if($tipe == 3):?>
				<td>
					<?php echo $time->niceShort($rent['Rent']['created'],null); ?>
				</td>
			<?php else:?>
				<td>
					<?php echo $time->niceShort($rent['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($rent['Rent']['tgl_kembali'],null); ?>
				</td>
				<td>
					<?php 
					
						echo $time->niceShort($rent['Rent']['tgl_dikembalikan']); 
					?>
				</td>
			<?php endif;?>

			
				<td>
					<?php 
					//$currentdate
					$today = $rent['Rent']['tgl_dikembalikan'];
					$kembali = $rent['Rent']['tgl_kembali']; 
					//$tgl_kembali = date('Y-m-d',$kembali);
					
					$diff = abs(strtotime($today) - strtotime($kembali));
					
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $years*30*60*60*24)/ (60*60*24));
					if($today < $kembali || $days == 0){
					echo '-';
					}else{
					printf("%d hari\n",  $days);
					}
					 ?>
				</td>

				<td>

					<?php 
					
					//print_r($rent);
					//$currentdate
					if(empty($rent['Rent']['denda'])){
					echo '-';
					}else{
					echo 'Rp '.$rent['Rent']['denda'];
					}
					
					 ?>
				</td>
			

			<?php if($tipe == 3):?>
				<td class="smallest-row" id="kembali_<?php echo $rent['Rent']['id'];?>">
					<?php 
					echo '<span class="status out">Booking</span>';
					?>
				</td>
			<?php else:?>
				<td id="kembali_<?php echo $rent['Rent']['id'];?>">
					<?php 
					$status1 = $rent['Rent']['status'];
					$status2 = $rent['Rent']['tipe'];
					if($status1==1){
						echo '<span class="status out">Keluar</span>';
					}else if($status1==2 && $status2==2){
						echo '<span class="status kembali">Kembali</span>';
					}else if($status1==2 && $status2==4){
						echo '<span class="status rusak">Hilang/ Rusak</span>';

					}else{
						echo '<span class="status rusak">Hilang/ Rusak</span>';
					}
					?>
				</td>
			<?php endif;?>			
				<td class="smallest-row" id="kembali_<?php echo $rent['Rent']['id'];?>">
					<?php 
					echo $rent['Rent']['notes'];
					?>
				</td>
          	
        </tr>
        <?php endforeach;?>
        
      </tbody>
    </table>
    <div class="bottom_line">&nbsp;</div>
  </div>
</div>


<?php
echo $this->renderElement('paginate',array('data_scope' => 'financescope','data_background'=>'#007599')); 
?>

<script type="text/javascript">
$(".opennewtab").click(function() {
  var productLink = $(this);

  productLink.attr("target", "_blank");
  window.open(productLink.attr("href"));

  return false;
});

$(".opensametab").click(function() {
  var productLink = $(this);

  productLink.attr("target", "_blank");
  window.open(productLink.attr("href"));

  return false;
});
</script>
