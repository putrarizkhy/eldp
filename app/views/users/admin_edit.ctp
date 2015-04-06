<style class="fontred"></style>
<?php echo $form->create('User',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

    <div style="float:left;width:350px;margin-right:40px;">
      
        <label>Nama</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('name',array('div'=>false,'label'=>false));
            ?>
        </div>

        <label>Id Member</label>

        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('id_member',array('div'=>false,'label'=>false));
            ?>
              
        </div>


        <label>E-mail</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('email',array('div'=>false,'label'=>false));
            ?>
        </div>   

        <div>
        <?php
        echo '<span>Foto Profil sebelumnya</span><br/>';
        if($member['User']['photo']!=null){?>
            <img width="50" src="<?php echo $this->webroot.$member['User']['photo'];?>"/>
        <?php }else{
            echo '<p class="fontred">Belum ada foto</p>';
        }

        ?>
        </div>

    </div>

    <div style="float:left;width:350px;">

        

        <label>Lahir</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('lahir',array('div'=>false,'label'=>false));
            ?>
        </div>

        <label>Telepon</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('telpon',array('div'=>false,'label'=>false));
            ?>
        </div>

        <label>Group</label>
        <div class="input-control text" data-role="input-control">
            <?php
            $groupselect = array(1=>'Admin',2=>'Petugas Perpus',3=>'Kepala Sekolah',4=>'Guru',5=>'Siswa');
            echo $form->select("group", $groupselect, null, false);

            ?>
        </div>

        <label>Ganti Foto:</label>

        <div class="input-control text" data-role="input-control">

        <?php
        echo $form->input('File.image', array('label'=>false, 'type'=>'file'));
        ?>

        </div>

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
      success:       showResponse  // post-submit callback
    };
 
    $( "#UserEditForm" ).on('submit', function(e) {
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
    $('#entry_record_<?php echo $member['User']['id']?>').html(responseText);
  }, 2000);
}

</script>