<style type="text/css">
	.metro h2.totalkas {
		font-size: 21px;
		color: #fff;
		line-height: 40px;
		margin-bottom: 27px;
		font-weight: 300;
		width: 300px;
		float: left;
	}
	.bottom_line{
		clear: both;
		display: none;
	}
</style>

<div class="headerprint">
  <?php foreach ($profile as $entry) : ?>
  <div>
  <?php

  if($entry['Profile']['image']!=null){?>
      <img style="float:left" width="100" src="<?php echo $this->webroot.$entry['Profile']['image'];?>"/>
  <?php }else{
      echo '<p class="fontred">Belum ada foto</p>';
  }

  ?>
  </div>

  <h1 style="text-align: center;font-size: 1.5em"><?php echo $entry['Profile']['name'] ?></h1>
  <p style="text-align: center;-webkit-margin-before: 0em;-webkit-margin-after: 0em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;"><?php echo $entry['Profile']['alamat'] ?></p>
  <p style="text-align: center;
  -webkit-margin-before: 0em;-webkit-margin-after: 0em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;
}">No.Telepon: <?php echo $entry['Profile']['no_tlp'] ?>, E-mail: <?php echo $entry['Profile']['email'] ?></p>
 
  <p style="padding-top: 40px;">Cetak Daftar Pencarian Laporan Keuangan <?php echo $entry['Profile']['name'] ?></p>
  <?php endforeach;?>
</div>
<div class="mask1 content_transaction_container">
  <div class="actions">
    
    <h2 class="totalkas" style="width:550px;"> Total Kas dari <?php echo $startdate_print;?> s/d <?php echo $enddate_print;?> = Rp <?php echo $total_this_transaction;?></h2>
    

    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table" style="background-color: #007599;">
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
        <?php foreach ($this_transaction as $rent) : ?>
        <tr class="altrow ">
			<td class="smallest-row aligncenter"><?php echo $rent['Rent']['id']?></td>
			<td><?php echo $rent['Book']['title']; ?></td>
			<td><?php echo $rent['User']['name']; ?></td>

			<?php if($tipe == 3):?>
				<td class="aligncenter">
					<?php echo $time->niceShort($rent['Rent']['created'],null); ?>
				</td>
			<?php else:?>
				<td class="aligncenter">
					<?php echo $time->niceShort($rent['Rent']['tgl_pinjam'],null); ?>
				</td>
				<td class="aligncenter">
					<?php echo $time->niceShort($rent['Rent']['tgl_kembali'],null); ?>
				</td>
				<td class="aligncenter">
					<?php 
					
						echo $time->niceShort($rent['Rent']['tgl_dikembalikan']); 
					?>
				</td>
			<?php endif;?>

			
				<td class="aligncenter">
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

				<td class="aligncenter">

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
				<td class="smallest-row aligncenter" id="kembali_<?php echo $rent['Rent']['id'];?>">
					<?php 
					echo '<span class="status out">Booking</span>';
					?>
				</td>
			<?php else:?>
				<td id="kembali_<?php echo $rent['Rent']['id'];?>" class="aligncenter">
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
				<td class="smallest-row aligncenter" id="kembali_<?php echo $rent['Rent']['id'];?>">
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



