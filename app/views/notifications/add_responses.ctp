
<?php if (!$notification):?>
    <tr class="altrow ">
	<td><p class="booknotfound" style="color: #7b4520;margin: 70px 0 0 300px;font-weight: 700;">Tidak ditemukan ebook</p></td>
    </tr>
<?php else:?>

        <tr class="altrow " id="category-<?php echo $notication['Notification']['id'];?>">
          <td><?php echo $numbertoshow;?></td>
          <td><?php echo $notification['Notification']['title']?></td>
          <td><?php echo $notification['Notification']['content']?></td>
          <td><?php echo $notification['Notification']['created']?></td>
          <td><?php echo $notification['Notification']['expiration_date']?></td>
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>categories/view/<?php echo $notification['Notification']['id']?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo $this->webroot;?>categories/edit/<?php echo $notification['Notification']['id']?>"><i class=" icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>categories/delete/<?php echo $notification['Notification']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
<?php endif; ?>



