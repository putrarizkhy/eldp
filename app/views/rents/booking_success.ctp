
<td>
	<?php echo $rent['Rent']['id']; ?>
</td>
<td>
	<?php echo $rent['Book']['id_buku']; ?>
</td>
<td>
	<?php echo $rent['Book']['name']; ?>
</td>
<td>
	<?php echo $time->niceShort($rent['Rent']['tgl_booking'],null);  ?>
</td>
<td>
	<?php 
	if(empty($rent['Rent']['tgl_pinjam'])){
		echo '-';
	}else{
		echo $time->niceShort($rent['Rent']['tgl_pinjam'],null); 
	}?>
</td>
<td>
	<?php 
	if(empty($rent['Rent']['tgl_kembali'])){
		echo '-';
	}else{
		echo $time->niceShort($rent['Rent']['tgl_kembali'],null);
	}?>
	
</td>
<td>
	<?php 
	
	echo '<span class="status kembali">Berhasil memproses peminjaman</span>';
	
	?>
</td>
<td class="actions">
	
	
	<?php echo $ajax->link('Hapus','/rents/delete/'.$rent['Rent']['id'].'/'.$rent['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'rent_'.$rent['Rent']['id'],'class'=>'hapus'),null,false);?>
	
</td>
