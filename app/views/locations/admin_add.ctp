<?php echo $form->create('Location',array('enctype'=>'multipart/form-data'));?>
<fieldset>

            <label>Lokasi</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('lokasi',array('div'=>false,'label'=>false));
              ?>
              
            </div>

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


<?php echo $form->end();?>



<script type="text/javascript">



(function() {
    
function showResponse(responseText, statusText, xhr, $form)  { 

    setTimeout(function() {
        $('.loadingpagecontainer').hide();

        if(statusText=='success'){
          alert("berhasil menambah Location baru");  
        }else{
          alert("tidak berhasil menambah Location, silahkan coba kembali");  
        }
        $("#LocationAddForm").clearForm();
        $(".formcontainer").show();
        $('#locationtable').prepend(responseText);
        
    }, 2000);
        
    
} 

var options2 = {
    //target:        '#output2',   // target element to update
    //beforeSubmit:  showRequest,  // pre-submit callback
    success:       showResponse  // post-submit callback
};

// bind form2 using ajaxSubmit
$('#LocationAddForm').on('submit', function(e) {
    $.Dialog.close();
    e.preventDefault(); // avoids calling preview.php
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $(this).ajaxSubmit(options2);
    

    return false;
});

})();
</script>