<tr class="altrow " id="entry_record_<?php echo $entry['User']['id'];?>">
  <td><?php echo $entry['User']['id']?></td>
  <td><?php echo $entry['User']['id_member']?></td>
  <td><?php echo $entry['User']['name']?></td>
  <td><?php echo $entry['User']['lahir']?></td>
  <td><?php echo $entry['User']['telpon']?></td>
  <td> <?php $grup = $member['User']['group_id'];
            if($grup == 1){
                echo 'Admin';
            }elseif($grup == 2){
                echo 'Petugas Perpus';
            }elseif($grup == 3){
                echo 'Kepala Sekolah';
            }elseif($grup == 4){
                echo 'Guru';
            }else{
                echo 'Siswa';
            }
            ?>

          </td>

  <td class="actions">
    <a class="gotolinkanchor" data-title="View Member" data-width="600px" data-height="375" href="<?php echo $this->webroot;?>admin/users/view/<?php echo $entry['User']['id'] ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
    
    <a class="gotolinkanchor" data-title="Edit Member" data-width="800px" data-height="375" href="<?php echo $this->webroot;?>admin/users/edit/<?php echo $entry['User']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

    <!--a class="gotolinkanchor" data-title="Ganti Password" data-width="800px" data-height="375" href="<?php echo $this->webroot;?>admin/users/password/<?php echo $member['User']['id'] ?>"><i class=" icon-pencil on-right"></i> Ganti Password</a-->
            
    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/users/delete/<?php echo $entry['User']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>

<script type="text/javascript">


$(document).ready(function() { 
  var options2 = {
    success:       showResponse  // post-submit callback
  };

  $( "#do_fav_<?php echo $entry['User']['id']?>" ).click(function() {
    $.Dialog.close();
    
   
    $(".formcontainer").fadeOut();
   
    $('.loadingpagecontainer').show();
    $('#form_do_fav_<?php echo $entry['User']['id'];?>').ajaxSubmit(options2); 
    

    return false;
  });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
setTimeout(function() {
  $('.loadingpagecontainer').hide();
  $(".formcontainer").show();
  $('#entry_record_<?php echo $entry['User']['id']?>').html(responseText);
}, 2000);
}

</script>
