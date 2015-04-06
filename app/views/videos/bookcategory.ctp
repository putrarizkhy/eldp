<div class="mask1">
  <div class="actions">
    
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table">
          <th>No</th>
          <th class="largest-row"><a href="/elips/books/index/page:1/sort:kategori/direction:asc">Kategori</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Lama Peminjaman</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Denda Terlambat</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">DDC</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Lokasi</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Keterangan</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Created</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Modified</a></th>

          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody id="categorytable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($bookcategory as $category) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="category-<?php echo $category['Category']['id'];?>">
          <td><?php echo $no;?></td>
          <td><?php echo $category['Category']['name']?></td>
          <td><?php echo $category['Category']['lama_peminjaman']?></td>
          <td><?php echo $category['Category']['denda_terlambat']?></td>
          <td><?php echo $category['Category']['ddc_id']?></td>
          <td><?php echo $category['Category']['location_id']?></td>
          <td><?php echo $category['Category']['keterangan']?></td>
          <td><?php echo $category['Category']['created']?></td>
          <td><?php echo $category['Category']['modified']?></td>
          
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>categories/view/<?php echo $category['Category']['id']?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo $this->webroot;?>categories/edit/<?php echo $category['Category']['id']?>"><i class=" icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>categories/delete/<?php echo $category['Category']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
        <?php endforeach;?>
        
      </tbody>
    </table>
    <div class="bottom_line">&nbsp;</div>
  </div>
</div>