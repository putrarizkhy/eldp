<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('User',array('enctype'=>'multipart/form-data'));?>


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
                    alert("berhasil menambah kategori baru");  
                  }else{
                    alert("tidak berhasil menambah kategori, silahkan coba kembali");  
                  }
                  
                  
                  
                  $("#UserAddForm").clearForm();
                  $(".formcontainer").show();
                  $('#usertable').append(responseText);
                  
              
          } 

          var options2 = {
              //target:        '#output2',   // target element to update
              //beforeSubmit:  showRequest,  // pre-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#UserAddForm').on('submit', function(e) {
              $.Dialog.close();
              e.preventDefault(); // avoids calling preview.php
             
              $(".formcontainer").fadeOut();
             
              $('.loadingpagecontainer').show();
              $(this).ajaxSubmit(options2);
              

              return false;
          });

          })();
          </script>
  </div>
</div><!--end labs upload div-->