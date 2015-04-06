<style type="text/css">
.calendar{
  background: #fff;
}
</style>
<?php if(empty($item)):?>
  <p style="color:#000000;">Tidak ditemuan transaksi</p>

<?php else:?>
<h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Peminjaman Pustaka');?></h2>
<p class="instructions"> </p>



<div style="float:left;width:700px;">
  <div style="float:left;width:300px;">
    <dl class="desc-detail" style="width:300px;">
      <dt class="altrow">Id Buku</dt>
      <dd class="altrow"><?php echo $item['Book']['id_buku']?>  &nbsp;</dd>
      <dt class="altrow">DDC</dt>
      <dd class="altrow"><?php echo $item['Category']['Ddc']['kode_ddc']?> - <?php echo $item['Category']['Ddc']['keterangan']?></dd>
      <dt>Kode ISBN</dt>
      <dd><?php echo $item['Book']['isbn']?> &nbsp;</dd>
      <dt class="altrow">Kategori</dt>
      <dd class="altrow"><?php echo $item['Category']['name']?> &nbsp;</dd>
      <dt>Penerbit</dt>
      <dd><?php echo $item['Book']['penerbit']?> &nbsp;</dd>
      <dt class="altrow">Pengarang</dt>
      <dd class="altrow"><?php echo $item['Book']['pengarang']?> &nbsp;</dd>
      <dt>Thn Terbit</dt>
      <dd><?php echo $item['Book']['tahun']?> &nbsp;</dd>
    </dl>
  </div>

  <div style="float:left;width:300px;">
    <dl class="desc-detail" style="width:300px;">
        <dt class="altrow">Jml Buku</dt>
        <dd class="altrow"><?php echo $item['Book']['jml_buku']?> &nbsp;</dd>
        
        <dt>Buku Yang Sedang Dipinjam</dt>
        <dd><?php echo $item['Book']['onrent'];?>&nbsp;</dd>

        <dt>Buku Tersedia</dt>
        <dd><?php $available = $item['Book']['jml_buku']-($item['Book']['jml_rusak']+$item['Book']['onrent']);?>
        <?php echo $available;?> &nbsp;</dd>
        
        <dt class="altrow">Letak Simpan</dt>
        <dd class="altrow"><?php echo $item['Category']['Location']['lokasi']?> &nbsp;<?php echo $item['Category']['Location']['keterangan']?></dd>
        
        <dt>Dapat Dipinjam</dt>
        <dd>Iya &nbsp;</dd>
        
        <dt class="altrow">Buku Favorite</dt>
        <dd class="altrow" id="favorite_status">Iya &nbsp;</dd>
        
        <dt>Jenis Buku</dt>
        <dd>Fisik</dd>
    </dl>
  </div>
</div>

<div class="image-right clearfix">
<?php if(!empty($item['Book']['photo'])): ?>  

    <img src="/elipsengine/<?php echo $item['Book']['photo']; ?>" alt="<?php echo $item['Book']['name']; ?>" width="100" />  

<?php else:?> 
   <img src="<?php echo $this->webroot;?>images/no-avatar.png" alt="<?php echo $item['Book']['nama']; ?>" width="100" />  
              
<?php endif;?>
</div>
<div class="clearfix"></div>

<hr/>

<?php echo $form->create('Rent',array('action'=>'admin_do_booked','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
<fieldset>
<?php echo $form->input('book_id',array('type'=>'hidden','value'=>$item['Book']['id']));?>
<?php echo $form->input('user_id',array('type'=>'hidden','value'=>$item['User']['id']));?>
<?php echo $form->input('rent_id',array('type'=>'hidden','value'=>$item['Rent']['id']));?>

<div style="width:40%;float:left;">
  <h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Tanggal Pinjam');?></h2>
  <?php
  echo $form->input('tgl_pinjam',array('type'=>'date','label'=>false));
  ?>
</div>
<div style="width:10%;float:left;display:block;">
  &nbsp;
</div>
<div style="width:40%;float:left;">
  <h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Tanggal Kembali');?></h2>
  <?php
  echo $form->input('tgl_kembali',array('type'=>'date','label'=>false));
  ?>
</div>
<div class="clearfix"></div>
 <br/>
<br/>
<script>
    var datepinjam = new Date();
    var datekembali = new Date();
    datekembali.setDate(datekembali.getDate() + 3);

    $("#datepinjam").datepicker({
        date: datepinjam, // set init date
        position: "top", // top or bottom,
        format: "d/m/y", // set output format
        
    });

    $("#datekembali").datepicker({
        date: datekembali, // set init date
        position: "top", // top or bottom,
        format: "d/m/y", // set output format
        
    });

    function showResponse_rents(responseText, statusText, xhr, $form)  { 

          console.log(responseText);
          alert(responseText.flashMessage);
          if(responseText.status == 'true'){
            
            $('tr#pengembalian_'+responseText.idtoresponse+' #kembali_'+responseText.idtoresponse).html('<i class="icon-checkmark on-left" style="background: #7fa900;color: white;padding: 4px;border-radius: 50%;font-size: 10px;"></i>Berhasil');

            $('tr#pengembalian_'+responseText.idtoresponse+' .actions3').html('');

            
          }else{
            //alert(responseText.flashMessage);
          }
          //$('#table_rent_process table tbody').append(responseText);

    }

    var options_rent_seacrh = {
        dataType: 'json',
        success:       showResponse_rents  // post-submit callback
    };

    $('#dorents').on('click', function(e) {
        $.Dialog.close();

        $('#RentAdminDoBookedForm').ajaxSubmit(options_rent_seacrh);
        $('#table_rent_process').fadeIn();
        $('#input_id_book_searchhome').val('');
        $('#input_id_book_searchhome').focus();
        return false;
    });

    $('#cancelrents').on('click', function(e) {
        $.Dialog.close();
        $('#input_id_book_searchhome').val('');
        $('#input_id_book_searchhome').focus();
        return false;
    });
    
</script>



<button id="dorents" type="submit" class="primary large">Pinjam</button>
<button id="cancelrents" class="danger large">Cancel</button>
</fieldset>
<?php echo $form->end();?>
<br/>
<br/>

<?php endif;?>

