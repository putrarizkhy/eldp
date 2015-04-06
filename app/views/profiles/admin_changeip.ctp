<?php echo $form->create('Profile',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>


    
    <label>IP Address lama</label>

    <div>
    <a style="color:black"><?php echo $change['Profile']['ip_address'];?></a>
    </div>
    <br>
    <label>IP Address Baru</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('ip_address',array('div'=>false,'label'=>false));
    ?>
    </div>

    <br>
    <div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
    </div>


</div>


</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      dataType: 'json',
      success:       showResponse  // post-submit callback
    };
 
    $( "#ProfileEditForm" ).on('submit', function(e) {
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
    alert(responseText.flashMessage);
  }, 2000);
}

</script>