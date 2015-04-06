<div id="left">
<h2 class="box-title">History Peminjaman</h2>
<div class="members-view clearfix">
<?php if(!empty($member['Member']['photo'])): ?>  
	
    <img src="<?php echo $this->webroot.$member['Member']['photo']; ?>" alt="User Image" width="100" />  

<?php else:?> 
	 <span>Belum Ada Photo</span>  
	            
<?php endif;?>
</span>
<dl class="desc-detail">

	<dt><?php __('Id Member'); ?></dt>
	<dd>
		<?php echo $member['User']['id_member']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Nama'); ?></dt>
	<dd>
		<?php echo $member['User']['nama']; ?>
		&nbsp;
	</dd>
	<dt><?php __('TTL'); ?></dt>
	<dd>
		<?php echo $member['User']['lahir']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Alamat'); ?></dt>
	<dd>
		<?php echo $member['User']['alamat']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Group'); ?></dt>
	<dd>
		<?php echo $member['Group']['name'];		
		?>
		&nbsp;
	</dd>
	
</dl>
</div>
<div class="rents-table-due clearfix">
<h3 class="box-title"> Data history peminjaman</h3>
<?php if(!empty ($rents)):?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Peminjaman');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		<th><?php echo ('Tanggal dikembalikan');?></th>
		<th><?php echo ('telat');?></th>
		<th><?php echo ('denda');?></th>
		<th><?php echo ('status');?></th>
		
	</tr>
	</thead>
	<tbody id="list_book_rent">
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
				
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
		
	
	<?php else:?>
	<?php echo '<p class="red">Belum ada history peminjaman</p>';
	endif;?>
	
</div>



</div>
<div id="right">
<div class="right-content">
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Kembali Ke List User', true), array('controller' => 'users','action' => 'index'), array('class' => 'back'));?></li>
	</ul>
</div>
</div>