<style type="text/css">
.actions{
  color: #fff;
}
</style>
<?php 
if($this->action != 'admin_search'){
echo $this->renderElement('header_paginate'); 
}
?> 

<div class="mask1">
  <div class="actionss">
   <table class="table hovered" cellpadding="0" cellspacing="0">
      
    <thead>
      <tr class="title_table">
        <th>Id</th>
        <th class="largest-row"><a href="#">Judul</a></th>
        <th><a href="#">Isi</a></th>
        <th><a href="#">Aktif</a></th>
        <th><a href="#">Publish</a></th>
        <th><a href="#">Expired</a></th>
        <th class="actions">Actions</th>
      </tr>
    </thead>

      <tbody id="locationtable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listnotif as $notif) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="entry_record_<?php echo $notif['Notification']['id'];?>">
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

        <?php endforeach;?>
        


        
      </tbody>
    </table>
    <!--div class="bottom_line1">&nbsp;</div-->
  </div>
</div>

  <?php 
if($this->action != 'admin_search'){
echo $this->renderElement('paginate',array('data_scope' => 'notificationscope','data_background'=>'#109079')); 
}
?>

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