<tr class="altrow " id="photo_record_<?php echo $entry['Photo']['id'];?>">
<td><?php echo $entry['Photo']['id_pustaka']?></td>
<td><?php echo $entry['Photo']['title']?></td>
<td><?php echo $entry['Category']['name']?></td>
<td><?php echo $entry['Photo']['penerbit']?></td>
<td><?php echo $entry['Photo']['pengarang']?></td>
<td><?php echo $entry['Photo']['tahun']?></td>

  <td class="actions">
    
    <a class="gotolinkanchor" data-title="View Photo" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/photos/view/<?php echo $entry['Photo']['id'] ?>"><i class="  icon-new-tab on-right"></i> Lihat</a>

            <a class="gotolinkanchor" data-title="Edit Photo" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/photos/edit/<?php echo $entry['Photo']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <div>
      <?php echo $form->create('Photo',array('id'=>'photoform_do_fav_'.$entry['Photo']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
        echo $form->input('PhotoFav.id',array('type'=>'hidden','default'=>$entry['Photo']['id']));
      ?>

      <?php if($entry['Photo']['favorite'] == 0):?>

        <?php echo $form->input('PhotoFav.action',array('type'=>'hidden','value'=>1));?>
        <a id="do_fav_<?php echo $entry['Photo']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
      <?php else:?>
        <?php echo $form->input('PhotoFav.action',array('type'=>'hidden','value'=>0));?>
        <a id="do_fav_<?php echo $entry['Photo']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
      <?php endif;?>
      <?php echo $form->end();?>

    </div>
            
            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/photos/delete/<?php echo $entry['Photo']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>


<script type="text/javascript">
  

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $entry['Photo']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#photoform_do_fav_<?php echo $entry['Photo']['id'];?>').ajaxSubmit(options2); 
      

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
          $('#photo_record_<?php echo $entry['Photo']['id']?>').html('');
          $('#photo_record_<?php echo $entry['Photo']['id']?>').html(responseText);
}

</script>