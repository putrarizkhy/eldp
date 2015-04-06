<?php echo $form->create('User',array('enctype'=>'multipart/form-data'));?>
<fieldset>
    <div style="float:left;width:350px;margin-right:40px;">
      
        <label>Masukan Password Baru</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('password',array('div'=>false,'label'=>false));
            ?>
        </div>

        <label>Konfirmasi Password Baru</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $form->input('password',array('div'=>false,'label'=>false));
            ?>
        </div>


    </div>

    <!--div style="float:left;width:350px;">

        

       

        
    </div-->
        
          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
    <div class="submit">
        <button class="btn btn-2 btn-2g" type="submit">Submit</button>
    </div>


</fieldset>
