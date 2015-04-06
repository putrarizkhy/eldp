<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('User',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
      <?php echo $form->input('id');?>
          <fieldset>
          
          <div style="float:left;width:350px;margin-right:40px;">
          
              <label>Id Member</label>

              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('id_member',array('div'=>false,'label'=>false));
                  ?>
                  
              </div>


              <label>Username</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('username',array('div'=>false,'label'=>false));
                  ?>
              </div>

              <label>Password</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('password',array('div'=>false,'label'=>false));
                  ?>
              </div>

              <label>E-mail</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('email',array('div'=>false,'label'=>false));
                  ?>
              </div>

             

          </div>

          <div style="float:left;width:350px;">

              <label>Nama</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('name',array('div'=>false,'label'=>false));
                  ?>
              </div>

              <label>Lahir</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('lahir',array('div'=>false,'label'=>false));
                  ?>
              </div>

              <label>Telepon</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    echo $form->input('telpon',array('div'=>false,'label'=>false));
                  ?>
              </div>

              <label>Group</label>
              <div class="input-control text" data-role="input-control">
                  <?php
                    $groupselect = array(1=>'Admin',2=>'Guru',3=>'Siswa');
                    echo $form->select("group", $groupselect, null, false);
                    
                  ?>
              </div>
          </div>
        
          <div style="clear:both;float:none;margin-bottom:30px;"/>

        
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
                  
                  
                  $("#UserEditForm").clearForm();
                  $(".formcontainer").show();
                  

                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(2)').text(responseText.IdMember);

                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(3)').text(responseText.Username);
                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(4)').text(responseText.Nama);
                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(5)').text(responseText.Lahir);
                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(6)').text(responseText.Telpon);
                  $('tr#userentry_'+responseText.idtoResponse+' td:nth-child(7)').text(responseText.Group);
                  
              
          } 

          var options2 = {
              
              dataType:      'json',  // post-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#UserEditForm').on('submit', function(e) {
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