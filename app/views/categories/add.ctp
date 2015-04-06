<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('Category',array('enctype'=>'multipart/form-data'));?>
          <fieldset>
          
          <label>Nama Kategori</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('name',array('div'=>false,'label'=>false));
              ?>
              
          </div>


          <label>Keterangan</label>
          <div class="input-control textarea" data-role="input-control">
              <?php
                echo $form->input('keterangan',array('div'=>false,'label'=>false));
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
                  
                  
                  
                  $("#CategoryAddForm").clearForm();
                  $(".formcontainer").show();
                  $('#categorytable').append(responseText);
                  
              
          } 

          var options2 = {
              //target:        '#output2',   // target element to update
              //beforeSubmit:  showRequest,  // pre-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#CategoryAddForm').on('submit', function(e) {
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