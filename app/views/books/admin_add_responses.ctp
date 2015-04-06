
<tr class="altrow " id="book_record_<?php echo $entry['Book']['id']?>">

  <td><?php echo $entry['Book']['id_buku']?></td>
  <td style="text-align:left;"><?php echo $entry['Book']['title']?></td>
  <td><?php echo $entry['Category']['name']?></td>
  <td><?php echo $entry['Book']['penerbit']?></td>
  <td><?php echo $entry['Book']['pengarang']?></td>
  <td><?php echo $entry['Book']['onrent']?></td>
  <td><?php echo $entry['Book']['jml_rusak']?></td>
  <td>
    <?php $available = $entry['Book']['jml_buku']-($entry['Book']['jml_rusak'] + $entry['Book']['onrent']);?>
    <?php echo $available;?>
  </td>
  <td><?php echo $entry['Category']['Location']['lokasi']; ?></td>
  
  <td class="actions">
    <a class="gotolinkanchor" data-title="View Book" data-width="900px" data-height="600px" href="<?php echo $this->webroot;?>admin/books/view/<?php echo $entry['Book']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
    
    <a class="gotolinkanchor" data-title="Edit Book" data-width="900px" data-height="600px" href="<?php echo $this->webroot;?>admin/books/edit/<?php echo $entry['Book']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

    <div>
      <?php echo $form->create('Book',array('id'=>'bookform_do_fav_'.$entry['Book']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
        echo $form->input('BookFav.id',array('type'=>'hidden','default'=>$entry['Book']['id']));
      ?>

      <?php if($entry['Book']['favorite'] == 0):?>

        <?php echo $form->input('BookFav.action',array('type'=>'hidden','value'=>1));?>
        <a id="do_fav_<?php echo $entry['Book']['id']?>" href="#"><i class=" icon-star on-right"></i> Jadikan Fav</a>
      <?php else:?>
        <?php echo $form->input('BookFav.action',array('type'=>'hidden','value'=>0));?>
        <a id="do_fav_<?php echo $entry['Book']['id']?>" href="#"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
      <?php endif;?>
      <?php echo $form->end();?>

    </div>

    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/books/delete/<?php echo $entry['Book']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>


<script type="text/javascript">
  

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#do_fav_<?php echo $entry['Book']['id']?>" ).click(function() {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#bookform_do_fav_<?php echo $entry['Book']['id'];?>').ajaxSubmit(options2); 
      

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
          $('#book_record_<?php echo $entry['Book']['id']?>').html('');
          $('#book_record_<?php echo $entry['Book']['id']?>').html(responseText);
}

</script>