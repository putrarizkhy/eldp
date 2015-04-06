<style type="text/css">
.calendar{
  background: #fff;
}
</style>
<?php if(empty($book)):?>
  <h1 style="color: #c53437;margin-top:50px auto;text-align:center;margin-bottom:5px;line-height:100px;"> Tidak ditemuan pustaka yang anda cari</h1>
  <p style="color:#000000;margin-top:0 auto;text-align:center;">Silahkan coba kembali, mungkin ada kesalahan</p>
  

<?php else:?>
<h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Pencarian Pustaka');?></h2>
<p class="instructions"> </p>



<div style="float:left;width:700px;">
  <div style="float:left;width:300px;">
    <dl class="desc-detail" style="width:300px;">
      <dt class="altrow">Id Buku</dt>
      <dd class="altrow"><?php echo $book['Book']['id_buku']?>  &nbsp;</dd>
      <dt class="altrow">Judul Buku</dt>
      <dd class="altrow"><?php echo $book['Book']['title']?>  &nbsp;</dd>
      <dt class="altrow">DDC</dt>
      <dd class="altrow"><?php echo $book['Category']['Ddc']['kode_ddc']?> - <?php echo $book['Category']['Ddc']['keterangan']?></dd>
      <dt>Kode ISBN</dt>
      <dd><?php echo $book['Book']['isbn']?> &nbsp;</dd>
      <dt class="altrow">Kategori</dt>
      <dd class="altrow"><?php echo $book['Category']['name']?> &nbsp;</dd>
      <dt>Penerbit</dt>
      <dd><?php echo $book['Book']['penerbit']?> &nbsp;</dd>
      <dt class="altrow">Pengarang</dt>
      <dd class="altrow"><?php echo $book['Book']['pengarang']?> &nbsp;</dd>
      <dt>Thn Terbit</dt>
      <dd><?php echo $book['Book']['tahun']?> &nbsp;</dd>
    </dl>
  </div>

  <div style="float:left;width:300px;">
    <dl class="desc-detail" style="width:300px;">
        <dt class="altrow">Jml Buku</dt>
        <dd class="altrow"><?php echo $book['Book']['jml_buku']?> &nbsp;</dd>
        
        <dt>Buku Yang Sedang Dipinjam</dt>
        <dd><?php echo $book['Book']['onrent'];?>&nbsp;</dd>

        <dt>Buku Tersedia</dt>
        <dd><?php $available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);?>
        <?php echo $available;?> &nbsp;</dd>
        
        <dt class="altrow">Letak Simpan</dt>
        <dd class="altrow"><?php echo $book['Category']['Location']['lokasi']?> &nbsp;<?php echo $book['Category']['Location']['keterangan']?></dd>
        
        <dt>Dapat Dipinjam</dt>
        <dd><?php
              $pinjam = $book['Book']['bisa_dipinjam'];
              if ($pinjam == 1){
                echo 'Iya';
                }else{
                  echo 'Tidak';
              };              
            ?></dd>
        
        <dt class="altrow">Buku Favorite</dt>
        <dd class="altrow" id="favorite_status"><?php 
          $fav = $book['Book']['favorite'];
            if ($fav == 1){
              echo 'Iya';
            }else{
              echo 'Tidak';
            };
        ?></dd>
        
        <dt>Jenis Buku</dt>
        <dd>Fisik</dd>
    </dl>
  </div>
</div>

<div class="image-right clearfix">
<?php if(!empty($book['Book']['photo'])): ?>  

    <img src="/elipsengine/<?php echo $book['Book']['photo']; ?>" alt="<?php echo $book['Book']['name']; ?>" width="100" />  

<?php else:?> 
   <img src="<?php echo $this->webroot;?>images/no-avatar.png" alt="<?php echo $book['Book']['nama']; ?>" width="100" />  
              
<?php endif;?>
</div>
<div class="clearfix"></div>
<hr/>

<?php 
$available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);
$available2 = $book['Book']['bisa_dipinjam'];
if(($available > 0) && ($available2 == 1)):?>


<?php echo $form->create('Rent',array('action'=>'admin_add','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
<fieldset>
<?php echo $form->input('book_id',array('type'=>'hidden','value'=>$book['Book']['id']));?>
<?php echo $form->input('user_id',array('type'=>'hidden','value'=>$memberid));?>
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
          alert('Berhasil meproses transaksi, silahkan pilih button selesai jika sudah, atau scan barcode buku kembali untuk meminjam buku yang lain.')
          $('#table_rent_process table tbody').append(responseText);

    }

    var options_rent_seacrh = {
        success:       showResponse_rents  // post-submit callback
    };

    $('#dorents').on('click', function(e) {
        $.Dialog.close();

        $('#RentAdminAddForm').ajaxSubmit(showResponse_rents);
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

<?php else:?>

<h2 style="color: #c53437;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"> Maaf, buku tidak tersedia untuk di pinjam</h2>

<?php endif;?>

<br/>
<br/>


<?php endif;?>

