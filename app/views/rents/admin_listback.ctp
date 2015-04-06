<?php
echo $this->renderElement('header_paginate'); 
?>
<div class="mask1 content_transaction_container">
  <div class="actions">
    
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
echo $this->renderElement('paginate',array('data_scope' => 'rentscope','data_background'=>'#df9019')); 
?>


