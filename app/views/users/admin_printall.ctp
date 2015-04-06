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
 
  <p style="padding-top: 40px;">Semua Daftar Member <?php echo $entry['Profile']['name'] ?></p>
  <?php endforeach;?>
</div>
<div class="mask1">
  <div class="actions">
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table" style="background-color: #99C342;">
          <th><a>Id</a></th>
          <th><a>Id Member</a></th>
          <th><a>Nama</a></th>
          <th><a>Lahir</a></th>
          <th><a>Alamat</a></th>
          <th><a>Telpon</a></th>
          <th><a>Email</a></th>
          <th>Group</th>
          <th>Didaftarkan</th>
          
        </tr>
      </thead>
      <tbody id="usertable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listuser as $member) : ?>
        <?php $no++; ?>

        <tr class="altrow " id="entry_record_<?php echo $member['User']['id'];?>">
          <td class="aligncenter"><?php echo $member['User']['id']?></td>
          <td class="aligncenter"><?php echo $member['User']['id_member']?></td>
          <td><?php echo $member['User']['name']?></td>
          <td class="aligncenter"><?php echo $member['User']['lahir']?></td>
          <td><?php echo $member['User']['alamat']?></td>
          <td class="aligncenter"><?php echo $member['User']['telpon']?></td>
          <td><?php echo $member['User']['email']?></td>
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
          <td class="aligncenter"><?php echo $member['User']['created']?></td>
          
          
        </tr>

        
        <?php endforeach;?>
        


        
      </tbody>
    </table>
    <div class="bottom_line1">&nbsp;</div>
  </div>
