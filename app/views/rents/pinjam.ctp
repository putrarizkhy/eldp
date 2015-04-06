
<div id="left">

	<div id="plsLoaderID" style="display:none;">
	<div class="centered">
	<?php echo $html->image("loading-ajax.png").'<h3>Loading..</h3><span>Harap menunggu, sistem sedang memproses data anda</span>';  ?>
	</div>
	</div>
	
<?php if ($groupAuth == 4 || $groupAuth == 5):?>
<h2 class="box-title">Buku yang Sedang Dipinjam</h2>
<?php else:?>
<h2 class="box-title">Proses Peminjaman</h2>
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

<div class="rents form rents-table-due clearfix">
	
	<h3>Buku yang di pinjam hari ini</h3>
	
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
		<th><?php echo ('No');?></th>
		<th><?php echo ('Id Buku');?></th>
		
		<th class="largest-row"><?php echo ('Judul Buku');?></th>
		<th><?php echo ('tgl_pinjam');?></th>
		<th><?php echo ('tgl_kembali');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	</thead>
	<tbody id="list_book_rent">
	</tbody>
	</table>

<form id="books_modal" action="<?php echo $this->webroot; ?>
books/search_modal/<?php echo $member['User']['id'];?>" method="post" onsubmit="return false;">

	<fieldset>
	<div class="ctrlHolder">
	<label>
	Ketikkan Kode Buku Yang Ingin Dipinjam</label>
	<input name="data[Book][input_id]" type="text" class="small" id="books_modal_input" >
	</div>
	
	</fieldset>
	<div class="submit">
	<input type="submit" title="Form Peminjaman Buku" value="Cari" onclick="Modalbox.show('<?php echo $this->webroot; ?>books/search_modal/<?php echo $member['User']['id'];?>', {title: this.title, method: 'post', params:Form.serialize('books_modal'), overlayClose: true }); return false;" class="button" />
	</div>
</form>



</div>
</div>
<div id="right">
	<div class="right-content" style="margin-top:40px">
		<?php if ($groupAuth != 4 || $groupAuth != 5):?>
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