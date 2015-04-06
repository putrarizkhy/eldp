
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
          <th><a href="#">ID Pustaka</a></th>
          <th><a href="#">Cover</a></th>
          <th><a href="#">Judul</a></th>
          <th><a href="#">Kategori</a></th>
          <th><a href="#">Sutradara</a></th>
          <th><a href="#">Produksi</a></th>
          <th><a href="#">Tahun</a></th>
          <th class="actions">Actions</th>
        </tr>
      </thead>
      <tbody id="videotable">

        <?php 
        $no = 0;
        ?>
        <?php foreach ($listvideo as $entry) : ?>
        <?php $no++; ?>

        <tr class="altrow " id="entry_record_<?php echo $entry['Video']['id']?>">
          <td><?php echo $entry['Video']['id_buku']?></td>
          <td><img src="<?php echo $this->webroot.$entry['Video']['cover']?>"/ width="50"></td>
          <td style="text-align:left;"><?php echo $entry['Video']['title']?></td>
          <td><?php echo $entry['Category']['name']?></td>
          <td><?php echo $entry['Video']['sutradara']?></td>
          <td><?php echo $entry['Video']['produksi']?></td>
          <td><?php echo $entry['Video']['tahun']?></td>
          
          <td class="actions">
            <a class="gotolinkanchor" data-title="View Video" data-width="500px" data-height="400px" href="<?php echo $this->webroot;?>admin/videos/view/<?php echo $entry['Video']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>

            <a class="gotolinkanchor" data-title="Edit Video" data-width="700px" data-height="300px" href="<?php echo $this->webroot;?>admin/videos/edit/<?php echo $entry['Video']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

            <div>
              <?php echo $form->create('Video',array('id'=>'form_do_fav_'.$entry['Video']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
                echo $form->input('VideoFav.id',array('type'=>'hidden','value'=>$entry['Video']['id']));
              ?>

              <?php if($entry['Video']['favorite'] == 0):?>

                <?php echo $form->input('VideoFav.action',array('type'=>'hidden','value'=>1));?>
                <a data-entryid="<?php echo $entry['Video']['id'];?>" id="do_fav_<?php echo $entry['Video']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i> Jadikan Fav</a>
              <?php else:?>
                <?php echo $form->input('VideoFav.action',array('type'=>'hidden','value'=>0));?>
                <a data-entryid="<?php echo $entry['Video']['id'];?>" id="do_fav_<?php echo $entry['Video']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
              <?php endif;?>
              <?php echo $form->end();?>

            </div>

            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/videos/delete/<?php echo $entry['Video']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
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
echo $this->renderElement('paginate',array('data_scope' => 'videoscope','data_background'=>'#1682a9')); 
}
?>


<script type="text/javascript">
          

$(document).ready(function() { 

   window.entryid = 0;
    var options_videodofav = {

      //beforeSubmit:  showRequest,  // pre-submit callback 
      success:       showResponse_videodofav  // post-submit callback
    };

    $( '.nongoldehlo' ).on('click', function(){

      window.entryid = $(this).data('entryid');
      
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_'+window.entryid).ajaxSubmit(options_videodofav);
      //console.log("cetak1" + window.entryid);
      

      
    });
}); 

function showResponse_videodofav(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();

    $('tbody#videotable #entry_record_'+window.entryid).html(responseText);
    //console.log("cetak2"+window.entryid);
  }, 2000);
}



</script>