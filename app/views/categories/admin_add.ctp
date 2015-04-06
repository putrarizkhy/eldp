<?php echo $form->create('Category',array('enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">


            <label>Nama Kategori</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('name',array('div'=>false,'label'=>false));
              ?>
              
            </div>


          <label>Tipe</label>
          <div class="input-control text" data-role="input-control">
              <?php
              $tipe=array(1=>'Buku',2=>'Ebook',3=>'Video',4=>'Audio',5=>'Photo',6=>'CD Pembelajaran');

               echo $form->select('tipe',$tipe,null);
              ?>
          </div>

          <div class="categoryhide">

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

            <div id="ket" style="display:none">
          
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

          </div>

          </div>



<div style="float:left;width:350px;">

          <div class="categoryhide">
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
            </div>


</fieldset>
</div>

<?php echo $form->end();?>



<script type="text/javascript">



(function() {
var $globaltipe = '';
    
function showResponse(responseText, statusText, xhr, $form)  { 

    setTimeout(function() {
        $('.loadingpagecontainer').hide();

        if(statusText=='success'){
          alert("berhasil menambah Category baru");  
        }else{
          alert("tidak berhasil menambah Category, silahkan coba kembali");  
        }
        $("#CategoryAddForm").clearForm();
        $(".formcontainer").show();
        $('#categorytable.'+$globaltipe).prepend(responseText);
        
    }, 2000);
        
    
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



$('#CategoryTipe').on('change', function(c) {
  c.preventDefault();
  var tipe = $('#CategoryTipe').val();
  if(tipe == 1){
    $globaltipe = 'category_book_table';
  }else if(tipe == 2){
    $globaltipe = 'category_ebook_table';
  }else if(tipe == 3){
    $globaltipe = 'category_video_table';
  }else if(tipe == 4){
    $globaltipe = 'category_audio_table';
  }else if(tipe == 5){
    $globaltipe = 'category_photo_table';
  }else if(tipe == 6){
    $globaltipe = 'category_subject_table';
  }

  if (tipe==2 || tipe==3 || tipe==4 || tipe==5 || tipe==6) {
    $('.categoryhide').hide();
    $('#ket').show();
  } else{
    $('.categoryhide').show();
    $('#ket').hide();
  };

})

})();
</script>