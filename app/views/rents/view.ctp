<div id="left">
<!--<div id="plsLoaderID" style="display:none;">-->
<div id="plsLoaderID" style="display:none;">
<div class="centered">
<?php echo $html->image("loading-ajax.png").'<h3>Loading..</h3><span>Harap menunggu, sistem sedang memproses data anda</span>';  ?>
</div>
</div>
<div class="rents view">
<h2><?php  __('Detail Peminjaman');?></h2>
	<dl class="desc-detail"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Peminjaman'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rent['Rent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Judul'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($rent['Book']['name'], array('controller' => 'books', 'action' => 'view', $rent['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Member'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($rent['User']['nama'], array('controller' => 'users', 'action' => 'view', $rent['User']['id'])); ?>
			&nbsp;
		</dd>
		<?php if($rent['Rent']['status'] == 3){?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Booking'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php 
					echo $time->niceShort($rent['Rent']['tgl_booking']); 
				?>
				&nbsp;
			</dd>
		<?php }else{?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Pinjam'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			
			<?php echo $time->nice($rent['Rent']['tgl_pinjam']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Kembali'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $time->nice($rent['Rent']['tgl_kembali']); ?>
			&nbsp;
		</dd>
		
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Dikembalikan'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php 
				if($rent['Rent']['status'] == 0){
					echo $time->niceShort($rent['Rent']['tgl_dikembalikan']); 
				}else{
					echo '-';
				}?>
				&nbsp;
			</dd>
		<?php }?>
		
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			//$currentdate
			$today = date('Y-m-d', strtotime("now"));
			if($rent['Rent']['status'] == 3){
			$kembali = $rent['Rent']['tgl_booking']; 
			}else{
			$kembali = $rent['Rent']['tgl_kembali']; 
			}
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
			&nbsp;
		</dd>
		<?php if($rent['Rent']['status'] != 3):?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Denda'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			//print_r($rent);
			//$currentdate
			if($today < $kembali || $days == 0){
			echo '-';
			}else{
			$rate = $rent['Book']['Category']['denda_terlambat'];
			echo 'Rp '.$rate*$days;
			}
			 ?>
			&nbsp;
		</dd>
		<?php endif;?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd id="kembali_<?php echo $rent['Rent']['id'];?>">
		<?php 
		$status1 = $rent['Rent']['status'];
		if($status1==1){
		echo '<span class="status out">Keluar</span>';
		}else if($status1==0){
		echo '<span class="status kembali">Kembali</span>';
		}else if($status1==3){
		echo '<span class="status booking">Booking</span>';
		
		}else{
		echo '<span class="status rusak">Hilang/ Rusak</span>';
		}
		?>
			&nbsp;
		</dd>
	</dl>
		<?php if ($groupAuth == 1 || $groupAuth == 2 || $groupAuth == 3):?>
			<?php if($rent['Rent']['status'] == 1):?>
			<div class="afterdl clearfix">
			<ul>
				<script language="Javascript">

				function hide_loading() {
				    Element.hide('plsLoaderID');
					
					$('kembalistatus').appear({ duration: 1.0 });
				}
				function show_loading() {
				    Element.show('plsLoaderID');
					Element.hide('kembalistatus');
				}

				

				</script>
				<li id="kembalistatus">
				<?php echo $ajax->link('Proses Kembali','/rents/do_back/'.$rent['Rent']['id'].'/'.$rent['Rent']['book_id'],array('loading'=>"show_loading();",'loaded'=>"setTimeout('hide_loading()', 3000)",'update'=>'kembalistatus','class'=>'back_rent'),null,false);?>
				
				</li>
				<li id="rusakstatus">
				<?php echo $ajax->link('Rusak / Hilang','/rents/do_loose/'.$rent['Rent']['id'].'/'.$rent['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'kembali_'.$rent['Rent']['id'],'class'=>'back_rent'),null,false);?>
				</li>
			</ul>
			</div>
			<?php endif;?>
			<?php if ($rent['Rent']['status'] == 3):?>
			<div class="afterdl clearfix">
			<ul>
				<li id="bookingstatus">
				
				<?php echo $ajax->link('Proses Pinjam','/rents/booking_to_pinjam/'.$rent['Rent']['id'].'/'.$rent['Book']['Category']['lama_peminjaman'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'bookingstatus','class'=>'back_rent'),null,false);?>
				</li>
				<li id="cancelbookingstatus">
				<?php echo $ajax->link('Cancel Booking','/rents/booking_cancel/'.$rent['Rent']['id'].'/'.$rent['Rent']['book_id'],array('loading'=>"Element.show('plsLoaderID')",'loaded'=>"Element.hide('plsLoaderID')",'update'=>'cancelbookingstatus','class'=>'back_rent'),null,false);?>
				
				</li>
				
			</ul>
			</div>
			<?php endif;?>
		<?php endif;?>
	
</div>
</div>
<div id="right">
<div class="right-content">
<div class="actions">
	<ul>
		
		<li><?php echo $html->link(__('Kembali Ke Beranda', true), array('controller'=>'users','action' => 'home'),array('class'=>'back')); ?> </li>
		
		
	</ul>
</div>
</div>
</div>
