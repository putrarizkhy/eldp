<tr class="altrow " iid="entry_record_<?php echo $entry['Category']['id'];?>">
          <td><?php echo $entry['Category']['id']?></td>
          <td><?php echo $entry['Category']['name']?></td>
          <td><?php echo $entry['Category']['lama_peminjaman']?></td>
          <td><?php echo $entry['Category']['denda_terlambat']?></td>
          <td><?php echo $entry['Ddc']['keterangan']?></td>
          <td><?php echo $entry['Location']['lokasi']?></td>
          <td><?php echo $entry['Category']['keterangan']?></td>
          <td><?php echo $entry['Category']['created']?></td>
          <td><?php echo $entry['Category']['modified']?></td>


          <td class="actions">
            <!--a href="<?php echo $this->webroot;?>categories/view/<?php echo $entry['Category']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a-->
            <a class="gotolinkanchor" data-title="Edit Category" data-width="785px" data-height="400px" href="<?php echo $this->webroot;?>admin/categories/edit/<?php echo $entry['Category']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>
            
            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/categories/delete/<?php echo $entry['Category']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>

<script type="text/javascript">


$(document).ready(function() { 
  var options2 = {
    success:       showResponse  // post-submit callback
  };

  $( "#do_fav_<?php echo $entry['Category']['id']?>" ).click(function() {
    $.Dialog.close();
    
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $('#form_do_fav_<?php echo $entry['Category']['id'];?>').ajaxSubmit(options2); 
    

    return false;
  });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
setTimeout(function() {
  $('.loadingpagecontainer').hide();
  $(".formcontainer").show();
  $('#entry_record_<?php echo $entry['Category']['id']?>').html(responseText);
}, 2000);
}

</script>
