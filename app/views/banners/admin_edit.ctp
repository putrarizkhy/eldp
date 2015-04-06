<?php echo $form->create('Banner',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>



    <label>ID Pustaka</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('id_pustaka',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Judul</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('title',array('div'=>false,'label'=>false));
    ?>
    </div>

    <div>
    <?php
    echo '<span>Gambar Banner sebelumnya</span><br/>';
    if($banner['Banner']['file']!=null){?>
        <img width="50" src="<?php echo $this->webroot.$banner['Banner']['file'];?>"/>
    <?php }else{
        echo '<p>Belum ada Gambar Banner</p>';
    }

    ?>
    </div>

    <label>Ganti Gambar Banner:</label>

    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
    ?>

    </div>

    <label>Aktif ?</label>

    <div class="input-control" data-role="input-control">
      <?php

        echo $form->input('active',array('div'=>false,'label'=>false,'type'=>'checkbox'));
      ?>
      
    </div>



</div>

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
 
    $( "#BannerEditForm" ).on('submit', function(e) {
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
    $('#banner_record_<?php echo $banner['Banner']['id']?>').html(responseText);
  }, 2000);
}

</script>