<?php echo $form->create('Plan',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>

    <label>ID Plan</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('id_plan',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Judul Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('title',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->select('category_id',$categories,null);
    
    echo '</div>';
    ?>

    <label>Penerbit</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('penerbit',array('div'=>false,'label'=>false));

    ?>

    </div>

    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('pengarang',array('div'=>false,'label'=>false));

    ?>
    </div>

      <label>Tahun Produksi</label>
    <br><?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
    <?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>

    <div>

    <?php
    echo '<span>Cover anda sebelumnya</span><br/>';
    if($plan['Plan']['file']!=null){?>
        <img width="50" src="<?php echo $this->webroot.$plan['Plan']['file'];?>"/>
    <?php }else{
        echo '<p>Belum ada cover</p>';
    }

    ?>
    </div>


    

 

</div>

<div style="float:left;width:350px;">

  

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


    

    <label>Ganti Cover file:</label>

    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
    ?>

    </div>


<div style="clear:both;float:none;margin-bottom:30px;"/>
<br>
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
 
    $( "#PlanEditForm" ).on('submit', function(e) {
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
    $('#plan_record_<?php echo $plan['Plan']['id']?>').html(responseText);
  }, 2000);
}

</script>