<tr class="altrow " id="ebook_record_<?php echo $ebook['Ebook']['id']?>">
  <td><?php echo $ebook['Ebook']['id_pustaka']?></td>
  <td><?php echo $ebook['Ebook']['title']?></td>
  <td><?php echo $ebook['Category']['name']?></td>
  <td><?php echo $ebook['Ebook']['penerbit']?></td>
  <td><?php echo $ebook['Ebook']['pengarang']?></td>
  <td><?php echo $ebook['Ebook']['tahun']?></td>
  
  <td class="actions">
    <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $ebook['Ebook']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
    <a class="gotolinkanchor" data-title="Edit Ebook" data-width="900px" data-height="500px" href="<?php echo $this->webroot;?>admin/ebooks/edit/<?php echo $ebook['Ebook']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

    <div>
      <?php echo $form->create('Ebook',array('id'=>'form_do_fav_'.$ebook['Ebook']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
        echo $form->input('BookFav.id',array('type'=>'hidden','default'=>$ebook['Ebook']['id']));
      ?>

      <?php if($ebook['Ebook']['favorite'] == 0):?>

        <?php echo $form->input('BookFav.action',array('type'=>'hidden','default'=>1));?>
        <a id="do_fav_<?php echo $ebook['Ebook']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
      <?php else:?>
        <?php echo $form->input('BookFav.action',array('type'=>'hidden','default'=>0));?>
        <a id="do_fav_<?php echo $ebook['Ebook']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
      <?php endif;?>
      <?php echo $form->end();?>

    </div>

    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/ebooks/delete/<?php echo $ebook['Ebook']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>
<script type="text/javascript">
  

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $ebook['Ebook']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_<?php echo $ebook['Ebook']['id'];?>').ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
          $('.loadingpagecontainer').hide();
          if(statusText=='success'){
            alert("berhasil menjadikan favorite");  
          }else{
            alert("tidak berhasil berhasil menjadikan favorite, silahkan coba kembali");  
          }
          //$("#EbookAdminAddForm").clearForm();
          $(".formcontainer").show();
          $('#ebook_record_<?php echo $ebook['Ebook']['id']?>').html('');
          $('#ebook_record_<?php echo $ebook['Ebook']['id']?>').html(responseText);
}

</script>