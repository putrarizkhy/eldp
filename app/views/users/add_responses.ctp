
<?php if (!$user):?>
    <tr class="altrow ">
	<td><p class="booknotfound" style="color: #7b4520;margin: 70px 0 0 300px;font-weight: 700;">Tidak ditemukan ebook</p></td>
    </tr>
<?php else:?>

        <tr class="altrow " id="user-<?php echo $user['User']['id'];?>">
          <td><?php echo $numbertoshow;?></td>
          <td><?php echo $user['User']['id_member']?></td>
          <td><?php echo $user['User']['username']?></td>
          <td><?php echo $user['User']['name'] ?></td>
          <td><?php echo $user['User']['lahir'] ?></td>
          <td><?php echo $user['User']['telpon'] ?></td>
          <td><?php echo $user['User']['group'] ?></td>
          <td class="actions">
            <a href="<?php echo $this->webroot;?>users/view/<?php echo $user['User']['id']?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo $this->webroot;?>users/edit/<?php echo $user['User']['id']?>"><i class=" icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>users/delete/<?php echo $user['User']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
<?php endif; ?>



