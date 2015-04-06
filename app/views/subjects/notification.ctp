<div class="mask1">
  <div class="actions">
    
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table">
          <th>No</th>
          <th class="largest-row"><a href="/elips/books/index/page:1/sort:name/direction:asc">Judul</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Isi</a></th>
          <th><a href="/elips/books/index/page:1/sort:pengarang/direction:asc">Publish</a></th>
          <th><a href="/elips/books/index/page:1/sort:thn_terbit/direction:asc">Expired</a></th>
          

          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($notification as $notif) : ?>
        <tr class="altrow ">
          <td>1</td>
          <td><?php echo $notif['Notification']['title']?></td>
          <td><?php echo $notif['Notification']['content']?></td>
          <td><?php echo $notif['Notification']['created']?></td>
          <td><?php echo $notif['Notification']['expiration_date']?></td>
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $notif['Notification']['id']; ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a href="<?php echo $this->webroot;?>ebooks/edit/<?php echo $notifk['Notification']['id'];?>"><i class="icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>ebooks/delete/<?php echo $notif['Notification']['id']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $notif['Notification']['title']?>?');"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
        <?php endforeach;?>
        
      </tbody>
    </table>
    <div class="bottom_line">&nbsp;</div>
  </div>
</div>