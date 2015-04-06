<tr class="altrow " id="entry_record_<?php echo $entry['Video']['id']?>">
<td><?php echo $entry['Video']['id_buku']?></td>
<td><img src="<?php echo $this->webroot.$entry['Video']['cover']?>"/ width="50"></td>
<td style="text-align:left;"><?php echo $entry['Video']['title']?></td>
<td><?php echo $entry['Category']['name']?></td>
<td><?php echo $entry['Video']['sutradara']?></td>
<td><?php echo $entry['Video']['produksi']?></td>
<td><?php echo $entry['Video']['tahun']?></td>
  
  <td class="actions">
  <a class="gotolinkanchor" data-title="View Video" data-width="500px" data-height="400px" href="<?php echo $this->webroot;?>admin/videos/view/<?php echo $entry['Video']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>

  <a class="gotolinkanchor" data-title="Edit Video" data-width="700px" data-height="300px" href="<?php echo $this->webroot;?>admin/videos/edit/<?php echo $entry['Video']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

    <div>
      <?php echo $form->create('Video',array('id'=>'form_do_fav_'.$entry['Video']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
        echo $form->input('VideoFav.id',array('type'=>'hidden','default'=>$entry['Video']['id']));
      ?>

      <?php if($entry['Video']['favorite'] == 0):?>

        <?php echo $form->input('VideoFav.action',array('type'=>'hidden','default'=>1));?>
        <a id="do_fav_<?php echo $entry['Video']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
      <?php else:?>
        <?php echo $form->input('VideoFav.action',array('type'=>'hidden','default'=>0));?>
        <a id="do_fav_<?php echo $entry['Video']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
      <?php endif;?>
      <?php echo $form->end();?>

    </div>

    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/videos/delete/<?php echo $entry['Video']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>
<script type="text/javascript">
  

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $entry['Video']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_<?php echo $entry['Video']['id'];?>').ajaxSubmit(options2); 
      

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
          $('#entry_record_<?php echo $entry['Video']['id']?>').html('');
          $('#entry_record_<?php echo $entry['Video']['id']?>').html(responseText);
}

</script>