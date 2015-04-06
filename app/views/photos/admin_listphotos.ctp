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

        <th><a href="#">Id Pustaka</a></th>
        <th><a href="#">Judul</a></th>
        <th><a href="#">Kategori</a></th>
        <th><a href="#">Penerbit</a></th>
        <th><a href="#">Pengarang</a></th>
        <th><a href="#">Tahun</a></th>
        <th class="actions">Actions</th>
      </tr>
    </thead>

      <tbody id="phototable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listphoto as $photo) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="photo_record_<?php echo $photo['Photo']['id'];?>">
          <td><?php echo $photo['Photo']['id_pustaka']?></td>
          <td><?php echo $photo['Photo']['title']?></td>
          <td><?php echo $photo['Category']['name']?></td>
          <td><?php echo $photo['Photo']['penerbit']?></td>
          <td><?php echo $photo['Photo']['pengarang']?></td>
          <td><?php echo $photo['Photo']['tahun']?></td>


          <td class="actions">
            
            <a class="gotolinkanchor" data-title="View Photo" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/photos/view/<?php echo $photo['Photo']['id'] ?>"><i class="  icon-new-tab on-right"></i> Lihat</a>

            <a class="gotolinkanchor" data-title="Edit Photo" data-width="500px" data-height="375" href="<?php echo $this->webroot;?>admin/photos/edit/<?php echo $photo['Photo']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <div>
              <?php echo $form->create('Photo',array('id'=>'photoform_do_fav_'.$photo['Photo']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
                echo $form->input('PhotoFav.id',array('type'=>'hidden','value'=>$photo['Photo']['id']));
              ?>

              <?php if($photo['Photo']['favorite'] == 0):?>

                <?php echo $form->input('PhotoFav.action',array('type'=>'hidden','value'=>1));?>
                <a data-entryid="<?php echo $photo['Photo']['id'];?>" id="do_fav_<?php echo $photo['Photo']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i> Jadikan Fav</a>
              <?php else:?>
                <?php echo $form->input('PhotoFav.action',array('type'=>'hidden','value'=>0));?>
                <a data-entryid="<?php echo $photo['Photo']['id'];?>" id="do_fav_<?php echo $photo['Photo']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
              <?php endif;?>
              <?php echo $form->end();?>

            </div>

            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/photos/delete/<?php echo $photo['Photo']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
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
echo $this->renderElement('paginate',array('data_scope' => 'photoscope','data_background'=>'#129aa1')); 
}
?>


<script type="text/javascript">
          

$(document).ready(function() { 

   window.entryid = 0;
    var options_photodofav = {

      //beforeSubmit:  showRequest,  // pre-submit callback 
      success:       showResponse_photodofav  // post-submit callback
    };

    $( '.nongoldehlo' ).on('click', function(){

      window.entryid = $(this).data('entryid');
      
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#photoform_do_fav_'+window.entryid).ajaxSubmit(options_photodofav);
      //console.log("cetak1" + window.entryid);
      

      
    });
}); 

function showResponse_photodofav(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();

    $('tbody#phototable #photo_record_'+window.entryid).html(responseText);
    //console.log("cetak2"+window.entryid);
  }, 2000);
}



</script>