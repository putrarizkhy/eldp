<style type="text/css">
.calendar{
  background: #fff;
}
</style>

<h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Pencarian Pustaka');?></h2>
<p class="instructions"> </p>

<dl class="desc-detail" style="width:300px;">
  <dt class="altrow">Id Peminjaman</dt>
  <dd class="altrow"><?php echo $rent['Rent']['id']?>  &nbsp;</dd>
  <dt class="altrow">Judul Buku</dt>
  <dd class="altrow"><?php echo $rent['Book']['title'];?></dd>
  <dt>Tanggal Pinjam</dt>
  <dd><?php echo $rent['Rent']['tgl_pinjam']?> &nbsp;</dd>
  <dt class="altrow">Denda</dt>
  <dd class="altrow"><?php echo $book['Category']['name']?> &nbsp;</dd>
</dl>

<div class="clearfix"></div>

<hr/>

<?php echo $form->create('Rent',array('action'=>'admin_add','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
<fieldset>
<?php echo $form->input('book_id',array('type'=>'hidden','value'=>$book['Book']['id']));?>
<?php echo $form->input('user_id',array('type'=>'hidden','value'=>$memberid));?>

  <h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;">
    <?php __('Tanggal Kembali');?>
  </h2>

  <?php
    echo $form->input('tgl_kembali',array('type'=>'date','label'=>false));
  ?>

<div class="clearfix"></div>
<br/>
<br/>
<script>

    function showResponse_rents(responseText, statusText, xhr, $form)  { 

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
<br/>
<br/>

