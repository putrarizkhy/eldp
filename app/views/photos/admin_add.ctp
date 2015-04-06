<?php echo $form->create('Photo',array('enctype'=>'multipart/form-data'));?>
<fieldset>

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

            <label>Category</label>

            <div class="input-control text" data-role="input-control">
            <?php
            echo $form->select('category_id',$listCategory,null);
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
        
        <label>Pilih file photo</label>
        <?php
        echo $form->input('File.image1', array('label'=>false, 'type'=>'file'));
        ?>

          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
    <div class="submit">
        <button class="btn btn-2 btn-2g" type="submit">Submit</button>
    </div>


</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">



(function() {
    
function showResponse(responseText, statusText, xhr, $form)  { 

    setTimeout(function() {
        $('.loadingpagecontainer').hide();

        if(statusText=='success'){
          alert("berhasil menambah Photo baru");  
        }else{
          alert("tidak berhasil menambah Photo, silahkan coba kembali");  
        }
        $("#PhotoAddForm").clearForm();
        $(".formcontainer").show();
        $('#phototable').prepend(responseText);
        
    }, 2000);
        
    
} 

var options2 = {
    //target:        '#output2',   // target element to update
    //beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};

// bind form2 using ajaxSubmit
$('#PhotoAddForm').on('submit', function(e) {
    $.Dialog.close();
    e.preventDefault(); // avoids calling preview.php
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $(this).ajaxSubmit(options2);
    

    return false;
});

})();
</script>