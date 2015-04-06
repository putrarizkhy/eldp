<tr class="altrow " iid="entry_record_<?php echo $notif['Notification']['id'];?>">
<td><?php echo $notif['Notification']['id']?></td>
<td><?php echo $notif['Notification']['title']?></td>
<td><?php echo $notif['Notification']['content']?></td>
<td><?php $notifcetak = $notif['Notification']['active'];
if($notifcetak  == 1){
  echo 'Aktif';
}else{
  echo "Tidak Aktif";
}
?>

</td>
<td><?php echo $notif['Notification']['publish_date']?></td>
<td><?php echo $notif['Notification']['expiration_date']?></td>


  <td class="actions">
    
    <a class="gotolinkanchor" data-title="View Notification" data-width="350px" data-height="375" href="<?php echo $this->webroot;?>admin/notifications/view/<?php echo $notif['Notification']['id'] ?>"><i class="  icon-new-tab on-right"></i> Lihat</a>

    <a class="gotolinkanchor" data-title="Edit Notification" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/notifications/edit/<?php echo $notif['Notification']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>
    
    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/notifications/delete/<?php echo $notif['Notification']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>

<script type="text/javascript">


$(document).ready(function() { 
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
