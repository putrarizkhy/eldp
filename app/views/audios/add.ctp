<?php echo $form->create('Audio',array('enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->select('category_id',$listCategory,null);
    
    echo '</div>';
?>

    <label>Judul Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('title',array('div'=>false,'label'=>false));
    ?>
    </div>



    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('pengarang',array('div'=>false,'label'=>false));

    ?>
    </div>


 <label>Penerbit</label>
    <div class="input-control text" data-role="input-control">
<?php
echo $form->input('penerbit',array('div'=>false,'label'=>false));

?>

</div>


<p>
    <?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
    <?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>
</p>

<!--<p>-->

</div>

<div style="float:left;width:350px;">

<label>Resensi</label>
    <div class="input-control textarea" data-role="input-control">
<?php
echo $form->input('details',array('div'=>false,'label'=>false));

?>
<?php
//echo $form->input('File.image1', array('label'=>'Cover file', 'type'=>'file'));
//echo '</p>';?>
</div>
<p>

<label>Pilih file Audio</label>
<?php
echo $form->input('Audio.audiofiles', array('label'=>false, 'type'=>'file'));
echo '</p>';?>
</div>
</fieldset>
<div style="clear:both;float:none;margin-bottom:30px;"/>
<div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
</div>

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
                  
                  
                  
                  $("#AudioAddForm").clearForm();
                  $(".formcontainer").show();
                  $('#audiotable').append(responseText);
                  
              
          } 

          var options2 = {
              //target:        '#output2',   // target element to update
              //beforeSubmit:  showRequest,  // pre-submit callback
              success:       showResponse  // post-submit callback
          };

          // bind form2 using ajaxSubmit
          $('#AudioAddForm').on('submit', function(e) {
              $.Dialog.close();
              e.preventDefault(); // avoids calling preview.php
             
              $(".formcontainer").fadeOut();
             
              $('.loadingpagecontainer').show();
              $(this).ajaxSubmit(options2);
              

              return false;
          });

          })();
          </script>