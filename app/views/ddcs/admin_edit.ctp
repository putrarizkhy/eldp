<?php echo $form->create('Ddc',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

    <label>Kode</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('kode_ddc',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Keterangan</label>

    <div class="input-control textarea" data-role="input-control">
    <?php
    echo $form->input('keterangan',array('div'=>false,'label'=>false));
    ?>
    </div>

    <div style="clear:both;float:none;margin-bottom:30px;"/>
    <div class="submit">
        <button class="btn btn-2 btn-2g" type="submit">Submit</button>
    </div>
</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#DdcEditForm" ).on('submit', function(e) {
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
    $('#entry_record_<?php echo $ddc['Ddc']['id']?>').html(responseText);
  }, 2000);
}

</script>