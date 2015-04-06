<?php echo $form->create('Notification',array('enctype'=>'multipart/form-data'));?>
<fieldset>

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('title',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Isi</label>

            <div class="input-control textarea" data-role="input-control">
              <?php
                echo $form->input('content',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Aktif ?</label>

            <div class="input-control" data-role="input-control">
              <?php

                echo $form->input('active',array('div'=>false,'label'=>false,'type'=>'checkbox'));
              ?>
              
            </div>

            <label>Pilih Gambar</label>
            <?php
            echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
            ?>

            <label>Tanggal Publish</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $form->input('publish_date',array('div'=>false,'label'=>false));
                ?>
                  
            </div>

            <label>Tanggal expired</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $form->input('expiration_date',array('div'=>false,'label'=>false));
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
          alert("berhasil menambah Notification baru");  
        }else{
          alert("tidak berhasil menambah Notification, silahkan coba kembali");  
        }
        $("#NotificationAddForm").clearForm();
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
$('#NotificationAddForm').on('submit', function(e) {
    $.Dialog.close();
    e.preventDefault(); // avoids calling preview.php
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $(this).ajaxSubmit(options2);
    

    return false;
});

})();
</script>