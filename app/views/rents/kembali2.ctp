<div id="left">
<h2 class="box-title">Proses Peminjaman</h2>
<div class="members-view clearfix">
<span class="image-right clearfix">
<?php if(!empty($member['Member']['photo'])): ?>  

    <img src="/elipsengine/<?php echo $member['Member']['photo']; ?>" alt="Dvd Image" width="100" />  

<?php else:?> 
	 <span>Belum Ada Photo</span>  
	            
<?php endif;?>
</span>
<dl class="desc-detail">

	<dt><?php __('Id Member'); ?></dt>
	<dd>
		<?php echo $member['Member']['id_member']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Nama'); ?></dt>
	<dd>
		<?php echo $member['Member']['nama']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Nis'); ?></dt>
	<dd>
		<?php echo $member['Member']['nis']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Kelas'); ?></dt>
	<dd>
		<?php echo $member['Member']['kelas']; ?>
		&nbsp;
	</dd>
	<dt><?php __('Alamat'); ?></dt>
	<dd>
		<?php echo $member['Member']['alamat']; ?>
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
		<th><?php echo ('status');?></th>
		<th class="actions"><?php __('Actions');?></th>
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
				<span id="kembali_<?php echo $n['Rent']['id'];?>">
				<?php 
				$status1 = $n['Rent']['status'];
				if($status1==1){?>
					<td >
						<?php
						if($status1==1){
						echo '<span class="status out">Keluar</span>';
						}else if($status1==0){
						echo '<span class="status kembali">Kembali</span>';
						}else{
						echo '<span class="status rusak">Hilang/ Rusak</span>';
						}
						?>
					</td>
					<td class="actions">
											
						<?=$ajax->link('Kembali','/rents/do_back/'.$n['Rent']['id'].'/'.$n['Rent']['book_id'],array('update'=>'kembali_'.$n['Rent']['id'],'class'=>'back_rent'),null,false);?>
						
					</td>
				<?php }else{?>
					<td >
						<?php
						if($status1==1){
						echo '<span class="status out">Keluar</span>';
						}else if($status1==0){
						echo '<span class="status kembali">Kembali</span>';
						}else{
						echo '<span class="status rusak">Hilang/ Rusak</span>';
						}
						?>
					</td>
					<td class="actions">
											
						Buku ini sudah dikembalikan
						
					</td>
				<?php };?>
				</span>
				
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
		<th><?php echo ('status');?></th>
		<th class="actions"><?php __('Actions');?></th>
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
				
				
				<?php 
				$status2 = $m['Rent']['status'];
				if($status2==1){?>
					<td id="kembali_<?php echo $n['Rent']['id'];?>">
						<?php
						if($status2==1){
						echo '<span class="status out">Keluar</span>';
						}else if($status2==0){
						echo '<span class="status kembali">Kembali</span>';
						}else{
						echo '<span class="status rusak">Hilang/ Rusak</span>';
						}
						?>
					</td>
					<td id="kembali_<?php echo $n['Rent']['id'];?>" class="actions">
											
						<?=$ajax->link('Kembali','/rents/do_back/'.$m['Rent']['id'].'/'.$m['Rent']['book_id'],array('update'=>'kembali_'.$m['Rent']['id'],'class'=>'back_rent'),null,false);?>
						
					</td>
				<?php }else{?>
					<td id="kembali_<?php echo $n['Rent']['id'];?>">
						<?php
						if($status2==1){
						echo '<span class="status out">Keluar</span>';
						}else if($status2==0){
						echo '<span class="status kembali">Kembali</span>';
						}else{
						echo '<span class="status rusak">Hilang/ Rusak</span>';
						}
						?>
					</td>
					<td class="actions" id="kembali_<?php echo $n['Rent']['id'];?>">
											
						Buku ini sudah dikembalikan
						
					</td>
				<?php };?>
				
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
	<?php else:?>
	<?php echo '<p class="red">Tidak ada buku yang harus dikembalikan</p>';
	endif;?>
</div>


</div>