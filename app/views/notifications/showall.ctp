<div class="mask1">
  <div class="actions">
    
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table">
          <th>No</th>
          <th class="largest-row"><a href="#">Judul</a></th>
          <th><a href="#">Isi</a></th>
          <th><a href="#">Publish</a></th>
          <th><a href="#">Expired</a></th>
          

          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($notification as $notif) : ?>
        <tr id="notif_<?php echo $notif['Notification']['id'] ?>" class="altrow ">
          <td>1</td>
          <td><?php echo $notif['Notification']['title']?></td>
          <td><?php echo $notif['Notification']['content']?></td>
          <td><?php echo $notif['Notification']['created']?></td>
          <td><?php echo $notif['Notification']['expiration_date']?></td>
          
          <td class="actions">
            <a href="<?php echo$this->webroot;?>notifications/view/<?php echo $notif['Notification']['id']; ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo$this->webroot;?>notifications/edit/<?php echo $notif['Notification']['id'] ?>"><i class="icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>notifications/delete/<?php echo $notif['Notification']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
        <?php endforeach;?>
        
      </tbody>
    </table>
    <div class="bottom_line">&nbsp;</div>
  </div>
</div>