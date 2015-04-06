<?php echo $form->create('Plan',array('enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <label>ID Pengadaan Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('id_plan',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Judul</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('title',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Pilih Cover Buku</label>
    <?php
    echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
    ?>

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->select('category_id',$categories,null);
    
    echo '</div>';
    ?>

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

    <label>Tahun Produksi</label>
    <br>
    <?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
    <?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>
    <br>
    <label>Jumlah Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('jml_buku',array('div'=>false,'label'=>false));

    ?>

    </div>

    <div>
    <label>Resensi</label>
        <div class="input-control textarea" data-role="input-control">
    <?php
    echo $form->input('sinopsis',array('div'=>false,'label'=>false));
    ?>
    </div>


    <div>
<br>
<div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
</div>
</fieldset>


</div>





<?php echo $form->end();?>



<script type="text/javascript">



(function() {
    
function showResponse(responseText, statusText, xhr, $form)  { 

    setTimeout(function() {
        $('.loadingpagecontainer').hide();

        if(statusText=='success'){
          alert("berhasil menambah buku baru");  
        }else{
          alert("tidak berhasil menambah buku, silahkan coba kembali");  
        }
        $("#PlanAddForm").clearForm();
        $(".formcontainer").show();
        $('#plantable').prepend(responseText);
        
    }, 2000);
        
    
} 

var options2 = {
    //target:        '#output2',   // target element to update
    //beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};

// bind form2 using ajaxSubmit
$('#PlanAddForm').on('submit', function(e) {
    $.Dialog.close();
    e.preventDefault(); // avoids calling preview.php
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $(this).ajaxSubmit(options2);
    

    return false;
});

})();
</script>