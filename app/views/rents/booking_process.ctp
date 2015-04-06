
<div id="left">

	<div id="plsLoaderID" style="display:none;">
	<div class="centered">
	<?php echo $html->image("loading-ajax.png").'<h3>Loading..</h3><span>Harap menunggu, sistem sedang memproses data anda</span>';  ?>
	</div>
	</div>

<?php if ($groupAuth == 4 || $groupAuth == 5):?>
<h2 class="box-title">Buku yang Sedang di Booking</h2>
<?php else:?>
<h2 class="box-title">Proses Peminjaman dari Booking</h2>

<?php endif;?>
<div class="members-view clearfix">
<span class="image-right clearfix">
<?php if(!empty($member['User']['photo'])): ?>  
	
    <img src="<?php echo $this->webroot.$member['User']['photo']; ?>" alt="User Image" width="100" />  

<?php else:?> 
	 <?php echo $html->image("user-icon.png")?>
	            
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
<?php if(!empty($booking_list)){?>
<div class="rents form rents-table-due clearfix">
	
	<h3>Buku yang telah di booking</h3>
	
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('Tanggal Booking');?></th>
		<th><?php echo ('Tanggal Pinjam');?></th>
		<th><?php echo ('Tanggal Kembali');?></th>
		<th class="actions largest-row"><?php echo ('Status');?></th>
		<th class="actions largest-row"><?php __('Actions');?></th>
	</tr>
	</thead>
	<tbody id="list_book_booked">
		<?php
		$i = 0;
		foreach ($booking_list as $n):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		
			<tr id="rent_<?php echo $n['Rent']['id'];?>">
				<td>
					<?php echo $n['Rent']['id']; ?>
				</td>
				<td>
					<?php echo $n['Book']['id_buku']; ?>
				</td>
				<td>
					<?php echo $n['Book']['name']; ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_booking'],null);  ?>
				</td>
				<td>
					<?php 
					if(empty($n['Rent']['tgl_pinjam'])){
						echo '-';
					}else{
						echo $time->niceShort($n['Rent']['tgl_pinjam'],null); 
					}?>
				</td>
				<td>
					<?php 
					if(empty($n['Rent']['tgl_kembali'])){
						echo '-';
					}else{
						echo $time->niceShort($n['Rent']['tgl_kembali'],null);
					}?>
					
				</td>
				<td>
					<?php 
					$status2 = $n['Rent']['status'];
					if($status2==1){
					echo '<span class="status out">Keluar</span>';
					}else if($status2==0){
					echo '<span class="status kembali">Kembali</span>';
					}
					else if($status2==3){
					echo '<span class="status booking">Booking</span>';
					}
					else{
					echo '<span class="status rusak">Hilang/ Rusak</span>';
					}
					?>
				</td>
				
				<td class="actions">
					<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
					<li id="bookingstatus_<?php echo $n['Rent']['id'];?>">
					
					<?php echo $ajax->link('Proses Pinjam','/rents/booking_to_pinjam2/'.$n['Rent']['id'].'/'.$n['Book']['Category']['lama_peminjaman'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rent_'.$n['Rent']['id'],'class'=>'back_rent'),null,false);?>
					</li>
					
					
					<?php endif;?>
					<li id="cancelbookingstatus_<?php echo $n['Rent']['id'];?>">
					<?php echo $ajax->link('Cancel Booking','/rents/booking_cancel/'.$n['Rent']['id'].'/'.$n['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rent_'.$n['Rent']['id'],'class'=>'back_rent'),null,false);?>
					
					</li>
					
					
				</td>
				
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
	


</div>
<?php }else{

echo '<p class="red">Tidak ada buku yang di booking</p>';
}
?>
<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
<div class="submit button">
<?php echo $html->link(__('Pinjam Buku yang lain', true), array('controller'=>'rents','action' => 'pinjam',$member['User']['id']),array('class'=>'small_button')); ?>
</div>
<?php endif;?>
</div>
<div id="right">
	<div class="right-content" style="margin-top:40px">
		<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
		<div class="finish-container">
		<?php echo $html->link(__('Selesai', true), array('controller'=>'users','action' => 'home'),array('class'=>'finish')); ?>
		</div>
		<?php else:?>
		<div class="finish-container">
		<?php echo $html->link(__('Kembali', true), array('controller'=>'users','action' => 'home_user'),array('class'=>'finish')); ?>
		</div>
		<?php endif;?>
		
	</div>
</div>