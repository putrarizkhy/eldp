
<div id="left-small">




<div class="rents-table-due clearfix">
<?php $telat = $this->requestAction('/rents/telat')?>
<h3 class="box-title"> Buku Yang Harus Dikembalikan Hari ini atau Lebih dari Hari ini</h3>
<?php if(!empty ($telat)):?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th class="largest-row"><?php echo ('Nama Peminjam');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		<th><?php echo ('status');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	</thead>
	<tbody id="list_book_rent">
		<?php
		$i = 0;
		foreach ($telat as $n):
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
					<?php echo $n['Member']['nama']; ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td>
					<?php echo $time->niceShort($n['Rent']['tgl_kembali'],null); ?>
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
				<td class="actions">
								
					<?php echo $html->link(__('Lihat Detail', true), array('controller' => 'rents', 'action' => 'view',$n['Rent']['id'])); ?>
					
				</td>
				
			</tr>
		<?php endforeach; ?>
		
	</tbody>
	</table>
	<?php else:?>
	<?php echo '<p class="red">Tidak ada buku yang harus dikembalikan</p>';
	endif;?>
</div>

</div>
<div id="right-large">
<div class="right-content"
	<div class="books form">
		<?php echo $form->create('Member',array('controller'=>'members','action'=>'search_home_result'),array('id'=>'books_search_form'));?>
		?>
			<fieldset>
			<div class="ctrlHolder">
			<label>
			Masukkan id member untuk memulai proses pinjam <br/>atau pengembalian</label>
			<input name="data[Member][input_id]" type="text" class="small" value="" id="MemberInputId">
			</div>
			
			</fieldset>
			<div class="submit"><input type="submit" value="Submit" alt="/members/search_home_result" ></div>
		</form>
		
	</div>
</div>
</div>