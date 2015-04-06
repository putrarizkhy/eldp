
<?php if (!$category):?>
    <tr class="altrow ">
	<td><p class="booknotfound" style="color: #7b4520;margin: 70px 0 0 300px;font-weight: 700;">Tidak ditemukan ebook</p></td>
    </tr>
<?php else:?>

        <tr class="altrow " id="category-<?php echo $category['Category']['id'];?>">
          <td><?php echo $numbertoshow;?></td>
          <td><?php echo $category['Category']['name']?></td>
          <td><?php echo $category['Category']['keterangan']?></td>
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>categories/view/<?php echo $category['Category']['id']?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo $this->webroot;?>categories/edit/<?php echo $category['Category']['id']?>"><i class=" icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>categories/delete/<?php echo $category['Category']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
<?php endif; ?>



