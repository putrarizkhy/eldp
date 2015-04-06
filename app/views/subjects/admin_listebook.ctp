<div class="mask1">
  <div class="actions">
    <table class="table hovered" cellpadding="0" cellspacing="0">
      <thead>
        <tr class="title_table">
          <th>ID Pustaka</th>
          <th class="largest-row"><a href="/elips/books/index/page:1/sort:name/direction:asc">Judul</a></th>
          <th><a href="/elips/books/index/page:1/sort:kategori/direction:asc">Kategori</a></th>
          <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Penerbit</a></th>
          <th><a href="/elips/books/index/page:1/sort:pengarang/direction:asc">Pengarang</a></th>
          <th><a href="/elips/books/index/page:1/sort:thn_terbit/direction:asc">Tahun</a></th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody id="ebooktable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listbuku as $daftarebook) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="ebook_record_<?php echo $daftarebook['Ebook']['id']?>">
          <td><?php echo $daftarebook['Ebook']['id_pustaka']?></td>
          <td><?php echo $daftarebook['Ebook']['title']?></td>
          <td><?php echo $daftarebook['Category']['name']?></td>
          <td><?php echo $daftarebook['Ebook']['penerbit']?></td>
          <td><?php echo $daftarebook['Ebook']['pengarang']?></td>
          <td><?php echo $daftarebook['Ebook']['tahun']?></td>
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" data-title="Edit Ebook" data-width="900px" data-height="500px" href="<?php echo $this->webroot;?>admin/ebooks/edit/<?php echo $daftarebook['Ebook']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <div>
              <?php echo $form->create('Ebook',array('id'=>'form_do_fav_'.$daftarebook['Ebook']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
                echo $form->input('BookFav.id',array('type'=>'hidden','default'=>$daftarebook['Ebook']['id']));
              ?>

              <?php if($daftarebook['Ebook']['favorite'] == 0):?>

                <?php echo $form->input('BookFav.action',array('type'=>'hidden','default'=>1));?>
                <a id="do_fav_<?php echo $daftarebook['Ebook']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
              <?php else:?>
                <?php echo $form->input('BookFav.action',array('type'=>'hidden','default'=>0));?>
                <a id="do_fav_<?php echo $daftarebook['Ebook']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
              <?php endif;?>
              <?php echo $form->end();?>

            </div>

            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/ebooks/delete/<?php echo $daftarebook['Ebook']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
        <script type="text/javascript">
          

        $(document).ready(function() { 
            var options2 = {
              success:       showResponse  // post-submit callback
            };
         
            $( "#do_fav_<?php echo $daftarebook['Ebook']['id']?>" ).click(function() {
              $.Dialog.close();
              
             
              $(".formcontainer").fadeOut();
             
              $('.loadingpagecontainer').show();
              $('#form_do_fav_<?php echo $daftarebook['Ebook']['id'];?>').ajaxSubmit(options2); 
              

              return false;
            });
        }); 
        
        function showResponse(responseText, statusText, xhr, $form)  { 
          setTimeout(function() {
            $('.loadingpagecontainer').hide();
            $(".formcontainer").show();
            $('#ebook_record_<?php echo $daftarebook['Ebook']['id']?>').html(responseText);
          }, 2000);
        }
        
        </script>
        <?php endforeach;?>
        
      </tbody>
    </table>
    <div class="bottom_line">&nbsp;</div>
  </div>
</div>
