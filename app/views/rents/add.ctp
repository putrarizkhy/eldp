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
<div class="rents form">
<?php echo $form->create('Rent');?>
	<fieldset>
 		
	<?php
		echo $form->input('book_id');
		echo $form->input('member_id');
		echo $form->input('tgl_pinjam');
		echo $form->input('tgl_kembali');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>