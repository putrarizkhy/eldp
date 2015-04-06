<style type="text/css">
.calendar{
  background: #fff;
}
.metro .date{
  margin-top: 10px;
}
</style>

<h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;"><?php __('Peminjaman Pustaka');?></h2>
<p class="instructions"> </p>

<dl class="desc-detail" style="width:300px;">
  <dt class="altrow">Id Peminjaman</dt>
  <dd class="altrow"><?php echo $rent['Rent']['id']?>  &nbsp;</dd>
  <dt class="altrow">Nama Peminjam</dt>
  <dd class="altrow"><?php echo $rent['User']['name']?>  &nbsp;</dd>
  <dt class="altrow">Judul Buku</dt>
  <dd class="altrow"><?php echo $rent['Book']['title'];?></dd>
  <dt>Tanggal Pinjam</dt>
  <dd><?php echo $time->niceShort($rent['Rent']['tgl_pinjam'],null); ?>&nbsp;</dd>
  <dt>Tanggal harus dikembalikan</dt>
  <dd><?php echo $time->niceShort($rent['Rent']['tgl_kembali'],null); ?>&nbsp;</dd>
  <dt>Telat</dt>
  <dd>
    <?php
    //$currentdate
    $today = date('Y-m-d', strtotime("now"));
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
  </dd>
  <dt class="altrow">Denda seharusnya</dt>
  <dd>
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
 </dd>
 </dt>
  
</dl>

<div class="clearfix"></div>

<hr style="margin:10px 0;"/>

<?php echo $form->create('Rent',array('action'=>'admin_do_back','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
<fieldset>

  <?php echo $form->input('book_id',array('type'=>'hidden','value'=>$rent['Book']['id']));?>
  <?php echo $form->input('rent_id',array('type'=>'hidden','value'=>$rent['Rent']['id']));?>
  <?php echo $form->input('user_id',array('type'=>'hidden','value'=>$rent['Rent']['user_id']));?>
  <?php echo $form->input('tgl_pinjam',array('type'=>'hidden','value'=>$rent['Rent']['tgl_pinjam']));?>
  <?php echo $form->input('tgl_kembali',array('type'=>'hidden','value'=>$rent['Rent']['tgl_kembali']));?>

  <h2 style="color: #000000;margin-top:0;text-align:left;margin-bottom:5px;line-height:50px;">
    <?php __('Tanggal Kembali');?>
  </h2>

  <?php
    echo $form->input('tgl_dikembalikan',array('type'=>'date','label'=>false));
  ?>

  <label>Denda<br/>Masukan denda yang ingin anda masukkan (angka tanpa titik /koma)</label>
  <div class="input-control text" data-role="input-control">
      <?php
      echo $form->input('denda',array('div'=>false,'label'=>false,'style'=>'width:30%;','placeholder'=>$rate*$days));
      ?>
  </div>  
  <label>Catatan<br/>masukkan catatan jika ada</label>
  <div class="input-control text" data-role="input-control">
      <?php
      echo $form->input('notes',array('div'=>false,'label'=>false,'style'=>'width:50%;'));
      ?>
  </div>   

<div class="clearfix"></div>
<script>

    function showResponse_rents(responseText, statusText, xhr, $form)  { 
          console.log(responseText);
          alert(responseText.flashMessage);
          if(responseText.status == 'true'){
            
            $('tr#pengembalian_'+responseText.idtoresponse+' #kembali_'+responseText.idtoresponse).html('<i class="icon-checkmark on-left" style="background: #7fa900;color: white;padding: 4px;border-radius: 50%;font-size: 10px;"></i>Berhasil');

            $('table#pengembalian_duetoday tr#pengembalian_'+responseText.idtoresponse+' .actions3').html('');

            
          }else{
            //alert(responseText.flashMessage);
          }
          //$('#table_rent_process table tbody').append(responseText);

    }


    var options_rent_seacrh = {
        dataType: 'json',
        success:       showResponse_rents  // post-submit callback,

    };

    $('#dorents').on('click', function(e) {
        $.Dialog.close();

        $('#RentAdminDoBackForm').ajaxSubmit(options_rent_seacrh);
        //$('#table_rent_process').fadeIn();
        
        return false;
    });

    $('#cancelrents').on('click', function(e) {
        $.Dialog.close();
        $('#input_id_book_searchhome').val('');
        $('#input_id_book_searchhome').focus();
        return false;
    });
    
</script>



<button id="dorents" type="submit" class="primary large">Proses</button>
<button id="cancelrents" class="danger large">Cancel</button>
</fieldset>
<?php echo $form->end();?>
<br/>
<br/>

