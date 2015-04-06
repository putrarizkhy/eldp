<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('Notification',array('enctype'=>'multipart/form-data','id'=>'formtambah'));?>
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
                    alert("berhasil menambah kategori baru");  
                  }else{
                    alert("tidak berhasil menambah kategori, silahkan coba kembali");  
                  }
                  
                  
                  
                  $("#formtambah").clearForm();
                  $(".formcontainer").show();
                  $('#notificationtable').append(responseText);
                  
              
          } 

          var options2 = {
              //target:        '#output2',   // target element to update
              //beforeSubmit:  showRequest,  // pre-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#formtambah').on('submit', function(e) {
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