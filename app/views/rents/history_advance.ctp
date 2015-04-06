
<div id="left-large">
	<div class="rents index">
	<h2 class="box-title"><?php __('History Transaksi Peminjaman');?></h2>
	<div class="content-box-content boxdate clearfix">
	<h3 class="dont-print"> Masukkan Rentang Tanggal Pencarian</h3>
	<?php
		echo $form->create('Rent', array('action'=>'history_advance','class'=>'search'));
		echo '<div class="left-form clearfix">';
		echo 'Tanggal Awal: '.$form->input('tgl_awal', array('div' => false,'type'=>'date','label'=>false,'class'=>'text-input small-input'));
		
		echo '</div>';
		
		echo '<div class="left-form clearfix">';
		echo 'Tanggal Akhir: '.$form->input('tgl_akhir', array('div' => false,'type'=>'date','label'=>false,'class'=>'text-input small-input'));
		
		echo '</div>';
		echo '<div class="left-form">';
		echo $form->submit(__('Search', true), array('label'=>false,'class'=>'button'));
		echo '</div>';
		echo $form->end();
		
	?>
	</div>
	<?php
		if(empty($rents)){
		echo '<p class="red"> Tidak Ada History Peminjaman pada tanggal yang anda pilih, silahkan pilih tanggal yang ingin anda lihat</p>';
		
		
		}else{
	?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo 'No';?></th>
		<th><?php echo 'Id Peminjaman';?></th>
		<th class="largest-row"><?php echo 'Judul';?></th>
		<th><?php echo 'Nama Peminjam';?></th>
		<th><?php echo 'Tanggal Pinjam';?></th>
		<th><?php echo 'Tanggal Kembali';?></th>
		<th><?php echo 'Tanggal Dikembalikan';?></th>
		<th><?php echo 'Telat';?></th>
		<th><?php echo 'Denda';?></th>
		<th><?php echo 'Status';?></th>
		
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	
	
		<?php
		$no = 0;
		$i = 0;
		foreach ($rents as $n):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			$no ++;
		?>
		
			<tr id="rent_<?php echo $n['Rent']['id'];?>">
			
				<td>
					<?php echo $no; ?>
				</td>
				<td>
					<?php echo $html->link(__($n['Rent']['id'], true), array('action' => 'view',$n['Rent']['id']),array('class'=>'back'));?>
				</td>
				<td>
					<?php echo $n['Book']['name']; ?>
				</td>
				<td>
					<?php echo $n['User']['nama']; ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_kembali'],null); ?>
				</td>
				<td>
					<?php 
					if($n['Rent']['status'] == 0){
						echo $time->niceShort($n['Rent']['tgl_dikembalikan']); 
					}else{
						echo '-';
					}?>
				</td>
				<td>
					<?php 
					//$currentdate
					$today = date('Y-m-d', strtotime("now"));
					$kembali = $n['Rent']['tgl_kembali']; 
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
					if($today < $kembali || $days == 0){
					echo '-';
					}else{
					$rate = $n['Book']['Category']['denda_terlambat'];
					echo 'Rp '.$rate*$days;
					}
					
					 ?>
				</td>
				<td id="kembali_<?php echo $n['Rent']['id'];?>">
					<?php 
					$status1 = $n['Rent']['status'];
					if($status1==1){
					echo '<span class="status out">Keluar</span>';
					}else if($status1==0){
					echo '<span class="status kembali">Kembali</span>';
					}else{
					echo '<span class="status rusak">Hilang/ Rusak</span>';
					}
					?>
				</td>
				<td class="action">
					<?php echo $html->link(__('Lihat Detail', true), array('action' => 'view', $n['Rent']['id']),array('class'=>'back_rent')); ?>
					
				</td>
				
				
			</tr>
		<?php endforeach; ?>
		
	
	</table>
	</div>
	
	<?php }?>
	
</div>