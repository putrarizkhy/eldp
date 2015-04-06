<div class="formcontainer">
  <div class="labs form">

      <?php echo $form->create('Category',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
      <?php echo $form->input('id');?>
          <fieldset>
          
        <div style="float:left;width:350px;margin-right:40px;">

          <label>Nama Kategori</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('name',array('div'=>false,'label'=>false));
              ?>
              
          </div>

          <label>Lama Peminjaman</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('lama_peminjaman',array('div'=>false,'label'=>false));
              ?>
              
          </div>

          <label>Denda Terlambat</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('denda_terlambat',array('div'=>false,'label'=>false));
              ?>
              
          </div>

          <label>DDC</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('ddc_id',array('div'=>false,'label'=>false));
              ?>
              
          </div>

          <label>Lokasi</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('location_id',array('div'=>false,'label'=>false));
              ?>
              
          </div>

        </div>

        <div style="float:left;width:350px;">

          <label>Keterangan</label>
          <div class="input-control textarea" data-role="input-control">
              <?php
                echo $form->input('keterangan',array('div'=>false,'label'=>false));
              ?>
          </div>

          <label>Created</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('created',array('div'=>false,'label'=>false));
              ?>
              
          </div>

          <label>Modified</label>

          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('modified',array('div'=>false,'label'=>false));
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
                  
                  
                  $("#CategoryEditForm").clearForm();
                  $(".formcontainer").show();
                  

                  $('tr#category-'+responseText.idtoResponse+' td:nth-child(2)').text(responseText.name);

                  $('tr#category-'+responseText.idtoResponse+' td:nth-child(3)').text(responseText.keterangan);
                  
              
          } 

          var options2 = {
              
              dataType:      'json',  // post-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#CategoryEditForm').on('submit', function(e) {
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