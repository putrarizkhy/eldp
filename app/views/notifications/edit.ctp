<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('Notification',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
      <?php echo $form->input('id');?>
          <fieldset>
          
          <label>Judul Pengumuman</label>

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


          <label>Tanggal expired</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('expiration_date',array('div'=>false,'label'=>false));
              ?>
              
          </div>
        
          <input type="submit" value="Submit">
          </fieldset>
          <?php echo $form->end();?>
          <script type="text/javascript">


          (function() {
              
          function showResponse(responseText, statusText, xhr, $form)  {

                  $('.loadingpagecontainer').hide();
                  if(statusText=='success'){
                    alert(responseText.flashMessage);  
                  }else{
                    alert(responseText.flashMessage);  
                  }
                  
                  
                  $("#NotificationEditForm").clearForm();
                  $(".formcontainer").show();
                  

                  $('tr#notif_'+responseText.idtoResponse+' td:nth-child(2)').text(responseText.Judul);

                  $('tr#notif_'+responseText.idtoResponse+' td:nth-child(3)').text(responseText.Isi);
                  $('tr#notif_'+responseText.idtoResponse+' td:nth-child(5)').text(responseText.Expired);
                  
              
          } 

          var options2 = {
              
              dataType:      'json',  // post-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#NotificationEditForm').on('submit', function(e) {
              $.Dialog.close();
              e.preventDefault(); // avoids calling preview.php

              $('.loadingpagecontainer').show();
              
              $(".formcontainer").fadeOut();
              
              $(this).ajaxSubmit(options2);
              

              return false;
          });

          })();
          </script>
  </div>
</div><!--end labs upload div-->