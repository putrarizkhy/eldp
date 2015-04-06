<tr class="altrow " id="audio_record_<?php echo $audio['Audio']['id'];?>">
<td><?php echo $audio['Audio']['id_pustaka']?></td>
<td><?php echo $audio['Audio']['title']?></td>
<td><?php echo $audio['Category']['name']?></td>
<td><?php echo $audio['Audio']['sutradara']?></td>
<td><?php echo $audio['Audio']['produksi']?></td>
<td><?php echo $audio['Audio']['tahun']?></td>

  <td class="actions">
    
    <a class="gotolinkanchor" data-title="View Audio" data-width="500px" data-height="200" href="<?php echo $this->webroot;?>admin/audios/view/<?php echo $audio['Audio']['id'] ?>"><i class="  icon-new-tab on-right"></i> Lihat</a>

            <a class="gotolinkanchor" data-title="Edit Audio" data-width="650px" data-height="375" href="<?php echo $this->webroot;?>admin/audios/edit/<?php echo $audio['Audio']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <div>
      <?php echo $form->create('Audio',array('id'=>'audioform_do_fav_'.$audio['Audio']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
        echo $form->input('AudioFav.id',array('type'=>'hidden','default'=>$audio['Audio']['id']));
      ?>

      <?php if($audio['Audio']['favorite'] == 0):?>

        <?php echo $form->input('AudioFav.action',array('type'=>'hidden','value'=>1));?>
        <a id="do_fav_<?php echo $audio['Audio']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
      <?php else:?>
        <?php echo $form->input('AudioFav.action',array('type'=>'hidden','value'=>0));?>
        <a id="do_fav_<?php echo $audio['Audio']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
      <?php endif;?>
      <?php echo $form->end();?>

    </div>
            
            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/audios/delete/<?php echo $audio['Audio']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>

<script type="text/javascript">
  

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $audio['Audio']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#audioform_do_fav_<?php echo $audio['Audio']['id'];?>').ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
          $('.loadingpagecontainer').hide();
          if(statusText=='success'){
            alert("berhasil menjadikan favorite");  
          }else{
            alert("tidak berhasil berhasil menjadikan favorite, silahkan coba kembali");  
          }
          //$("#EbookAdminAddForm").clearForm();
          $(".formcontainer").show();
          $('#audio_record_<?php echo $audio['Audio']['id']?>').html('');
          $('#audio_record_<?php echo $audio['Audio']['id']?>').html(responseText);
}

</script>
