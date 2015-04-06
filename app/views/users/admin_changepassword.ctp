<?php echo $form->create('User',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>



    <label>Password lama</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('password',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Password Baru</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('password',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Konfirmasi Password Baru</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('password',array('div'=>false,'label'=>false));
    ?>
    </div>


    <div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
    </div>


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
    $('#banner_record_<?php echo $change['User']['id']?>').html(responseText);
  }, 2000);
}

</script>