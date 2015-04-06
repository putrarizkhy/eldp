<?php echo $form->create('Ebook',array('enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <label>ID Pustaka</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('id_pustaka',array('div'=>false,'label'=>false));
    ?>
    </div>

    <label>Judul Buku</label>
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

</div>

<div style="float:left;width:350px;">

    <label>Tahun Terbit</label>
    <?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');
    ?>
    
   

  
    <label>Resensi</label>
    <div class="input-control textarea" data-role="input-control">
    <?php
    echo $form->input('details',array('div'=>false,'label'=>false));
    ?>
    </div>

    
    <label>Pilih file ebook</label>
    <?php
    echo $form->input('Ebook.ebookfiles', array('div'=>false,'label'=>false, 'type'=>'file'));
    ?>
    

  <br/>
  <br/>

<div style="clear:both;float:none;margin-bottom:30px;"/>
<div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Upload</button>
</div>
</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">



(function() {
    
function showResponse(responseText, statusText, xhr, $form)  { 

    setTimeout(function() {
        $('.loadingpagecontainer').hide();

        if(statusText=='success'){
          alert("berhasil menambah ebook baru");  
        }else{
          alert("tidak berhasil menambah ebook, silahkan coba kembali");  
        }
        $("#EbookAddForm").clearForm();
        $(".formcontainer").show();
        $('#ebookscope #ebooktable').prepend(responseText);
        
    }, 2000);
        
    
} 

var options2 = {
    //target:        '#output2',   // target element to update
    //beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};

// bind form2 using ajaxSubmit
$('#EbookAddForm').on('submit', function(e) {
    $.Dialog.close();
    e.preventDefault(); // avoids calling preview.php
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $(this).ajaxSubmit(options2);
    

    return false;
});

})();
</script>