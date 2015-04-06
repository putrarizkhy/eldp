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
          <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
          <th><a href="/elips/users/index/page:1/sort:id_member/direction:asc">Id Member</a></th>
          <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Nama</a></th>
          <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Lahir</a></th>
          <th><a href="/elips/users/index/page:1/sort:telpon/direction:asc">Telpon</a></th>
          <th>Group</th>
          <th class="actions">Actions</th>
        </tr>
      </thead>

      <tbody id="usertable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listuser as $member) : ?>
        <?php $no++; ?>

        <tr class="altrow " id="entry_record_<?php echo $member['User']['id'];?>">
          <td><?php echo $member['User']['id']?></td>
          <td><?php echo $member['User']['id_member']?></td>
          <td><?php echo $member['User']['name']?></td>
          <td><?php echo $member['User']['lahir']?></td>
          <td><?php echo $member['User']['telpon']?></td>
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

          <td class="actions">
            <a class="gotolinkanchor" data-title="View Member" data-width="600px" data-height="375" href="<?php echo $this->webroot;?>admin/users/view/<?php echo $member['User']['id'] ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>

            <a class="gotolinkanchor" data-title="Edit Member" data-width="800px" data-height="375" href="<?php echo $this->webroot;?>admin/users/edit/<?php echo $member['User']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <!--a class="gotolinkanchor" data-title="Ganti Password" data-width="800px" data-height="375" href="<?php echo $this->webroot;?>admin/users/password/<?php echo $member['User']['id'] ?>"><i class=" icon-pencil on-right"></i> Ganti Password</a-->
            
            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/users/delete/<?php echo $member['User']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
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
echo $this->renderElement('paginate',array('data_scope' => 'memberscope','data_background'=>'#99C342')); 
}
?>

        <script type="text/javascript">
          

        $(document).ready(function() { 
            var options2 = {
              success:       showResponse  // post-submit callback
            };
         
            $( "#do_fav_<?php echo $entry['User']['id']?>" ).click(function() {
              $.Dialog.close();
              
             
              $(".formcontainer").fadeOut();
             
              $('.loadingpagecontainer').show();
              $('#form_do_fav_<?php echo $entry['User']['id'];?>').ajaxSubmit(options2); 
              

              return false;
            });
        }); 
        
        function showResponse(responseText, statusText, xhr, $form)  { 
          setTimeout(function() {
            $('.loadingpagecontainer').hide();
            $(".formcontainer").show();
            $('#entry_record_<?php echo $entry['User']['id']?>').html(responseText);
          }, 2000);
        }
        
        </script>
