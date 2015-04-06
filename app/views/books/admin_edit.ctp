<?php echo $form->create('Book',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>

    <label>ID Pustaka</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('id_buku',array('div'=>false,'label'=>false));
    ?>
    </div>


    <label>ISBN</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('isbn',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->select('category_id',$categories,null);
    
    echo '</div>';
    ?>

    <label>Judul Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('title',array('div'=>false,'label'=>false));
    ?>
    </div>



    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('pengarang',array('div'=>false,'label'=>false));

    ?>
    </div>


 <label>Penerbit</label>
    <div class="input-control text" data-role="input-control">
<?php
echo $form->input('penerbit',array('div'=>false,'label'=>false));

?>

</div>

</div>

<div style="float:left;width:350px;">

<label>Tahun Produksi</label>
<?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
<?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>

<label>Dapat dipinjam ?</label>

<div class="input-control" data-role="input-control">
  <?php

    echo $form->input('bisa_dipinjam',array('div'=>false,'label'=>false,'type'=>'checkbox'));
  ?>
  
</div>

<label>Jumlah Buku</label>
<div class="input-control text" data-role="input-control">
<?php
echo $form->input('jml_buku',array('div'=>false,'label'=>false));

?>

</div>

<div>
<label>Resensi</label>
    <div class="input-control textarea" data-role="input-control">
<?php
echo $form->input('sinopsis',array('div'=>false,'label'=>false));
?>
</div>


<div>


<?php
echo '<span>Cover anda sebelumnya</span><br/>';
if($book['Book']['preview']!=null){?>
    <img width="50" src="<?php echo $this->webroot.$book['Book']['preview'];?>"/>
<?php }else{
    echo '<p>Belum ada cover</p>';
}

?>
</div>

<label>Ganti Cover file:</label>

<div class="input-control text" data-role="input-control">

<?php
echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
?>

</div>


<div style="clear:both;float:none;margin-bottom:30px;"/>
<div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
</div>
</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#BookEditForm" ).on('submit', function(e) {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $(this).ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();
    $('#book_record_<?php echo $book['Book']['id']?>').html(responseText);
  }, 2000);
}

</script>