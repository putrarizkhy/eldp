<?php echo $form->create('Category',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

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
            echo $form->select('ddc_id',$ddcs,null);
            
            echo '</div>';
            ?>

            </div>

<div style="float:left;width:350px;">

            <label>Tipe</label>
          <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('tipe',array('div'=>false,'label'=>false));
              ?>
          </div>
          
            <label>Lokasi</label>

            <div class="input-control text" data-role="input-control">
              <?php
            echo $form->select('location_id',$locations,null);
            
            echo '</div>';
            ?>

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
</div>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#CategoryEditForm" ).on('submit', function(e) {
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
    $('#entry_record_<?php echo $category['Category']['id']?>').html(responseText);
  }, 2000);
}

</script>