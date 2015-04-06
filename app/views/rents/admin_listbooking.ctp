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
		<th><?php echo ('Tanggal Booking');?></th>
		

		<th><?php echo ('Status');?></th>
          
        </tr>
      </thead>
      <tbody>
        <?php foreach ($rents as $rent) : ?>
        <tr class="altrow ">
			<td class="smallest-row"><?php echo $rent['Rent']['id']?></td>
			<td><?php echo $rent['Book']['title']; ?></td>
			<td><?php echo $rent['User']['name']; ?></td>
			<td>
				<?php echo $time->niceShort($rent['Rent']['created'],null); ?>
			</td>
			

			

			<?php if($tipe == 3):?>
				<td class="smallest-row" id="kembali_<?php echo $rent['Rent']['id'];?>">
					<?php 
					echo '<span class="status out">Booking</span>';
					?>
				</td>
			<?php else:?>
				<td id="kembali_<?php echo $rent['Rent']['id'];?>">
					<span class="status out">Terbooking</span>
					
				</td>
			<?php endif;?>			
			
          	<?php if($tipe == 3 && $rent['Rent']['status']==1):?>
          	<td class="actions3">
	            <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id']; ?>"><i class=" icon-plus on-right"></i> Proses Pinjam</a>

	            <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id']; ?>"><i class=" icon-cancel on-right"></i> Cancel Booking</a>
          	</td>
          	<?php endif;?>
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


