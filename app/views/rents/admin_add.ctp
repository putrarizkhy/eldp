<tr class="altrow ">
	<td class="smallest-row"><?php echo $item['Rent']['id']?></td>
	<td><?php echo $item['Book']['title']; ?></td>
	<td><?php echo $item['User']['name']; ?></td>
	<td>
		<?php echo $time->niceShort($item['Rent']['created'],null); ?>
	</td>
	<td class="smallest-row" id="kembali_<?php echo $item['Rent']['id'];?>">
		<?php 
		echo '<span class="status out">Booking</span>';
		?>
	</td>
	
  	<td class="actions3">
        <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id']; ?>"><i class=" icon-plus on-right"></i> Proses Pinjam</a>

        <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id']; ?>"><i class=" icon-cancel on-right"></i> Cancel Booking</a>
  	</td>
  	
</tr>