<tr class="altrow ">
  <td><?php echo $no;?></td>
  <td><?php echo $ebook['Book']['title']?></td>
  <td><?php echo $ebook['Category']['name']?></td>
  <td><?php echo $ebook['Book']['penerbit']?></td>
  <td><?php echo $ebook['Book']['pengarang']?></td>
  <td><?php echo $ebook['Book']['tahun']?></td>
  
  <td class="actions">
    <a href="<?php echo $this->webroot;?>books/view/<?php echo $book['Book']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
    <a class="gotolinkanchor" href="<?php echo $this->webroot;?>Books/edit/<?php echo $book['Book']['id'];?>" data-title="Edit Book" data-width="900px" data-height="500px"><i class="icon-pencil on-right"></i> Edit</a>
    <a href="<?php echo $this->webroot;?>books/delete/<?php echo $ebook['Book']['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $book['Book']['title']?>?');"  class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>