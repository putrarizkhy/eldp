<td><?php echo $entry['Notification']['id']?></td>
<td><?php echo $entry['Notification']['title']?></td>
<td><?php echo $entry['Notification']['content']?></td>
<td><?php $notifcetak = $entry['Notification']['active'];
if($notifcetak  == 1){
  echo 'Aktif';
}else{
  echo "Tidak Aktif";
}
?>

</td>
<td><?php echo $entry['Notification']['publish_date']?></td>
<td><?php echo $entry['Notification']['expiration_date']?></td>

  <td class="actions">
    
    <a class="gotolinkanchor" data-title="View Notification" data-width="350px" data-height="375" href="<?php echo $this->webroot;?>admin/notifications/view/<?php echo $entry['Notification']['id'] ?>"><i class="  icon-new-tab on-right"></i> Lihat</a>

    <a class="gotolinkanchor" data-title="Edit Notification" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/notifications/edit/<?php echo $entry['Notification']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>
    
    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/notifications/delete/<?php echo $entry['Notification']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>


<script type="text/javascript">
          

$(document).ready(function() { 
    alert('<?php echo $flashMessage?>');
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $entry['Notification']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_<?php echo $entry['Notification']['id'];?>').ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();
    $('#entry_record_<?php echo $entry['Notification']['id']?>').html(responseText);
  }, 2000);
}

</script>
