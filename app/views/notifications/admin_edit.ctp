<?php echo $form->create('Notification',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('title',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Isi</label>

            <div class="input-control textarea" data-role="input-control">
              <?php
                echo $form->input('content',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Aktif ?</label>

            <div class="input-control" data-role="input-control">
              <?php

                echo $form->input('active',array('div'=>false,'label'=>false,'type'=>'checkbox'));
              ?>
              
            </div>

            <div>
            <?php
            echo '<span>Gambar sebelumnya</span><br/>';
            if($notif['Notification']['dir']!=null){?>
                <img width="50" src="<?php echo $this->webroot.$notif['Notification']['dir'];?>"/>
            <?php }else{
                echo '<p class="fontred">Belum ada gambar</p>';
            }

            ?>
            </div>

            <label>Pilih Gambar:</label>

            <div class="input-control text" data-role="input-control">

            <?php
            echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
            ?>

            </div>

            <label>Tanggal Publish</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $form->input('publish_date',array('div'=>false,'label'=>false));
                ?>
                  
            </div>

            <label>Tanggal expired</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $form->input('expiration_date',array('div'=>false,'label'=>false));
                ?>
                  
            </div>
        
          

    <div style="clear:both;float:none;margin-bottom:10px;"/>
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
 
    $( "#NotificationEditForm" ).on('submit', function(e) {
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
    $('#entry_record_<?php echo $notif['Notification']['id']?>').html(responseText);
  }, 2000);
}

</script>