 <?php echo $form->create('Profile',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
<div style="float:left;width:350px;margin-right:40px;">

    <?php
    echo $form->input('id');?>

    <label>Name</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('name',array('div'=>false,'label'=>false));
    ?>
    </div>


    <label>E-mail</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('email',array('div'=>false,'label'=>false));
    ?>
    </div>


    <label>Alamat</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('alamat',array('div'=>false,'label'=>false));
    ?>
    </div>

    <div>


    <?php
    echo '<span>Logo anda sebelumnya</span><br/>';
    if($profile['Profile']['image']!=null){?>
        <img width="50" src="<?php echo $this->webroot.$profile['Profile']['image'];?>"/>
    <?php }else{
        echo '<p>Belum ada logo</p>';
    }

    ?>
    </div>

    

</div>



<div style="float:left;width:350px;">

    <label>No. Telepon</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('no_tlp',array('div'=>false,'label'=>false));

    ?>
    </div>


    <label>Nama Pustakawan</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('nama_pustakawan',array('div'=>false,'label'=>false));

    ?>

    </div>

    <label>Kepala Pustakawan</label>
        <div class="input-control text" data-role="input-control">
    <?php
    echo $form->input('kepala_pustakawan',array('div'=>false,'label'=>false));

    ?>
    </div>



    <label>Ganti logo:</label>

    <div class="input-control text" data-role="input-control">

    <?php
    echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
    ?>

    </div>


<div style="clear:both;float:none;margin-bottom:30px;"/>
<div class="submit">
    <button class="btn btn-2 btn-2g" type="submit">Submit</button>
</div>
</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse,  // post-submit callback,
      dataType: "json"
    };
 
    $( "#ProfileEditForm" ).on('submit', function(e) {
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
    alert(responseText.flashMessage);
  }, 2000);
}

</script>