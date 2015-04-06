<?php echo $form->create('Photo',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

            <label>Id Pustaka</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('id_pustaka',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('title',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Category Photo</label>     
            <div class="input-control text" data-role="input-control">
            
            <?php
                    echo $form->select('category_id',$listCategory,null);
                ?>
            </div>

            <div>
      <?php
      echo '<span>Photo sebelumnya</span><br/>';
      if($video['Video']['cover']!=null){?>
        <img width="50" src="<?php echo $this->webroot.$photo['Photo']['cover'];?>"/>
      <?php }else{
        echo '<p>Belum ada photo</p>';
      }

      ?>
      </div>

      <label>Ganti Photo:</label>
      
      <div class="input-control text" data-role="input-control">
      
      <?php
      echo $form->input('File.image1', array('label'=>false, 'type'=>'file'));
      ?>

      </div>

            <label>Penerbit</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('penerbit',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Pengarang</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('pengarang',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Tahun</label>
            <?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
            <?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>
        
          

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
 
    $( "#PhotoEditForm" ).on('submit', function(e) {
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
    $('#photo_record_<?php echo $photo['Photo']['id']?>').html(responseText);
  }, 2000);
}

</script>