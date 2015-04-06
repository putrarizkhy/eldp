<div id="left">
	<div id="plsLoaderID" style="display:none;">
	<div class="centered">
	<?php echo $html->image("loading-ajax.png").'<h3>Loading..</h3><span>Harap menunggu, sistem sedang memproses data anda</span>';  ?>
	</div>
	</div>
<?php if ($groupAuth == 4 || $groupAuth == 5):?>
<h2 class="box-title">Buku yang Sedang Dipinjam</h2>

<?php else:?>
<h2 class="box-title">Proses Kembali</h2>
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
<div class="rents-table-due clearfix">
<h3 class="box-title"> Buku Yang Harus Dikembalikan Hari ini</h3>
<?php if(!empty ($duetoday)):?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		<th><?php echo ('telat');?></th>
		<th><?php echo ('denda');?></th>
		<th><?php echo ('status');?></th>
		<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
		<th class="actions largest-row"><?php __('Actions');?></th>
		<?php endif;?>
	</tr>
	</thead>
	<tbody id="list_book_rent">
		<?php
		$i = 0;
		foreach ($duetoday as $n):
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
					<?php echo $time->niceShort($n['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_kembali'],null); ?>
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
					
					printf("%d hari\n",  $days);
					 ?>
				</td>
				<td>
					<?php 
					//print_r($rent);
					//$currentdate
					$rate = $n['Book']['Category']['denda_terlambat'];
					echo 'Rp '.$rate*$days;
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
				<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
				<td class="actions">
					<li id="kembalistatus_<?php echo $n['Rent']['id'];?>">			
					<?php echo $ajax->link('Kembali','/rents/do_back/'.$n['Rent']['id'].'/'.$n['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'kembalistatus_'.$n['Rent']['id'],'class'=>'back_rent'),null,false);?>
					</li>
					<li id="rusakstatus_<?php echo $n['Rent']['id'];?>">
					<?php echo $ajax->link('Rusak / Hilang','/rents/do_loose/'.$n['Rent']['id'].'/'.$n['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rusakstatus_'.$n['Rent']['id'],'class'=>'back_rent'),null,false);?>
					</li>
					
				</td>
				<?php endif;?>
				
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
	<?php else:?>
	<?php echo '<p class="red">Tidak ada buku yang harus dikembalikan</p>';
	endif;?>
</div>
<div class="rents-table-due clearfix">

<h3 class="box-title"> Buku Yang Harus Dikembalikan Lebih dari hari ini</h3>
<?php if(!empty ($duemore)):?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		<th><?php echo ('telat');?></th>
		<th><?php echo ('denda');?></th>
		<th><?php echo ('status');?></th>
		<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
		<th class="actions largest-row"><?php __('Actions');?></th>
		<?php endif;?>
	</tr>
	</thead>
	<tbody id="list_book_rent">
		<?php
		$i = 0;
		foreach ($duemore as $m):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		
			<tr id="rent_<?php echo $m['Rent']['id'];?>">
				
				<td>
					<?php echo $m['Rent']['id']; ?>
				</td>
				<td>
					<?php echo $m['Book']['id_buku']; ?>
				</td>
				<td>
					<?php echo $m['Book']['name']; ?>
				</td>
				<td>
					<?php echo $time->niceShort($m['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($m['Rent']['tgl_kembali'],null); ?>
				</td>
				<td>
					<?php 
					//$currentdate
					$today = date('Y-m-d', strtotime("now"));
					$kembali = $m['Rent']['tgl_kembali']; 
					//$tgl_kembali = date('Y-m-d',$kembali);
					
					$diff = abs(strtotime($today) - strtotime($kembali));
					
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $years*30*60*60*24)/ (60*60*24));
					
					printf("%d hari\n",  $days);
					 ?>
				</td>
				<td>
					<?php 
					//print_r($rent);
					//$currentdate
					$rate = $m['Book']['Category']['denda_terlambat'];
					echo 'Rp '.$rate*$days;
					 ?>
				</td>
				<td id="kembali_<?php echo $m['Rent']['id'];?>">
					<?php 
					$status2 = $m['Rent']['status'];
					if($status2==1){
					echo '<span class="status out">Keluar</span>';
					}else if($status2==0){
					echo '<span class="status kembali">Kembali</span>';
					}else{
					echo '<span class="status rusak">Hilang/ Rusak</span>';
					}
					?>
				</td>
				<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
				<td class="actions">
					<li id="kembalistatus_<?php echo $m['Rent']['id'];?>">			
					<?php echo $ajax->link('Kembali','/rents/do_back/'.$m['Rent']['id'].'/'.$m['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'kembalistatus_'.$m['Rent']['id'],'class'=>'back_rent'),null,false);?>
					</li>
					<li id="rusakstatus_<?php echo $m['Rent']['id'];?>">
					<?php echo $ajax->link('Rusak / Hilang','/rents/do_loose/'.$m['Rent']['id'].'/'.$m['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rusakstatus_'.$m['Rent']['id'],'class'=>'back_rent'),null,false);?>
					</li>
					
				</td>
				<?php endif;?>
				
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
	
	<?php else:?>
	<?php echo '<p class="red">Tidak ada buku yang harus dikembalikan</p>';
	endif;?>
</div>

<div class="rents-table-due clearfix">

<h3 class="box-title"> Buku Yang Sedang dipinjam, namun tidak harus dikembalikan hari ini</h3>
<?php if(!empty ($notdue)):?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		
		<th><?php echo ('status');?></th>
		<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
			
			<th class="actions largest-row"><?php __('Actions');?></th>
		<?php endif;?>
		
	</tr>
	</thead>
	<tbody id="list_book_rent">
		<?php
		$i = 0;
		foreach ($notdue as $k):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		
			<tr id="rent_<?php echo $k['Rent']['id'];?>">
				
				<td>
					<?php echo $k['Rent']['id']; ?>
				</td>
				<td>
					<?php echo $k['Book']['id_buku']; ?>
				</td>
				<td>
					<?php echo $k['Book']['name']; ?>
				</td>
				<td>
					<?php echo $time->niceShort($k['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($k['Rent']['tgl_kembali'],null); ?>
				</td>
				
				<td id="kembali_<?php echo $k['Rent']['id'];?>">
					<?php 
					$status2 = $k['Rent']['status'];
					if($status2==1){
					echo '<span class="status out">Keluar</span>';
					}else if($status2==0){
					echo '<span class="status kembali">Kembali</span>';
					}else{
					echo '<span class="status rusak">Hilang/ Rusak</span>';
					}
					?>
				</td>
				<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
					<td class="actions">
						
						<li id="kembalistatus_<?php echo $k['Rent']['id'];?>">			
						<?php echo $ajax->link('Kembali','/rents/do_back/'.$k['Rent']['id'].'/'.$k['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'kembalistatus_'.$k['Rent']['id'],'class'=>'back_rent'),null,false);?>
						</li>
						<li id="rusakstatus_<?php echo $k['Rent']['id'];?>">
						<?php echo $ajax->link('Rusak / Hilang','/rents/do_loose/'.$k['Rent']['id'].'/'.$k['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rusakstatus_'.$k['Rent']['id'],'class'=>'back_rent'),null,false);?>
						</li>
					</td>
				<?php endif;?>
				
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
	
	<?php else:?>
	<?php echo '<p class="red">Tidak ada buku yang dipinjam</p>';
	endif;?>
</div>

</div>
<div id="right">
	<div class="right-content" style="margin-top:40px">
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
</div>