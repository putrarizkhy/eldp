  <td><?php echo $entry['Location']['id']?></td>
  <td><?php echo $entry['Location']['lokasi']?></td>
  <td><?php echo $entry['Location']['keterangan']?></td>
  <td><?php echo $entry['Location']['created']?></td>
  <td><?php echo $entry['Location']['modified']?></td>

  <td class="actions">
    
    <a class="gotolinkanchor" data-title="Edit Location" data-width="400px" data-height="300" href="<?php echo $this->webroot;?>admin/locations/edit/<?php echo $entry['Location']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>
    
    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/locations/delete/<?php echo $entry['Location']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
</td>


<script type="text/javascript">
          

$(document).ready(function() { 
    alert('<?php echo $flashMessage?>');
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $entry['Location']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_<?php echo $entry['Location']['id'];?>').ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();
    $('#entry_record_<?php echo $entry['Location']['id']?>').html(responseText);
  }, 2000);
}

</script>
