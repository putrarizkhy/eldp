<div class="headerprint">
  <?php foreach ($profile as $entry) : ?>
  <div>
  <?php

  if($entry['Profile']['image']!=null){?>
      <img style="float:left" width="100" src="<?php echo $this->webroot.$entry['Profile']['image'];?>"/>
  <?php }else{
      echo '<p class="fontred">Belum ada foto</p>';
  }

  ?>
  </div>

  <h1 style="text-align: center;font-size: 1.5em"><?php echo $entry['Profile']['name'] ?></h1>
  <p style="text-align: center;-webkit-margin-before: 0em;-webkit-margin-after: 0em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;"><?php echo $entry['Profile']['alamat'] ?></p>
  <p style="text-align: center;
  -webkit-margin-before: 0em;-webkit-margin-after: 0em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;
}">No.Telepon: <?php echo $entry['Profile']['no_tlp'] ?>, E-mail: <?php echo $entry['Profile']['email'] ?></p>
 
  <p style="padding-top: 40px;">Semua Daftar Photo <?php echo $entry['Profile']['name'] ?></p>
  <?php endforeach;?>
</div>
<div class="mask1">
  <div class="actions">
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table" style="background-color: #129aa1;">
          <th><a href="#">Id Pustaka</a></th>
          <th><a href="#">Judul</a></th>
          <th><a href="#">Kategori</a></th>
          <th><a href="#">Penerbit</a></th>
          <th><a href="#">Pengarang</a></th>
          <th><a href="#">Tahun</a></th>
          <th><a href="#">Didaftarkan</a></th>
          
        </tr>
      </thead>
      <tbody id="phototable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listphoto as $photo) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="entry_record_<?php echo $photo['Photo']['id'];?>">
          <td class="aligncenter"><?php echo $photo['Photo']['id_pustaka']?></td>
          <td><?php echo $photo['Photo']['title']?></td>
          <td><?php echo $photo['Category']['name']?></td>
          <td><?php echo $photo['Photo']['penerbit']?></td>
          <td><?php echo $photo['Photo']['pengarang']?></td>
          <td class="aligncenter"><?php echo $photo['Photo']['tahun']?></td>
          <td class="aligncenter"><?php echo $photo['Photo']['created']?></td>
          
          
        </tr>

        
        <?php endforeach;?>
        


        
      </tbody>
    </table>
    <div class="bottom_line1">&nbsp;</div>
  </div>
