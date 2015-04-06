
<tr class="altrow " id="ebook_record_<?php echo $ebook['Ebook']['id'];?>">
<td><?php echo $ebook['Ebook']['id_pustaka']?></td>
<td><?php echo $ebook['Ebook']['title']?></td>
<td><?php echo $ebook['Category']['name']?></td>
<td><?php echo $ebook['Ebook']['penerbit']?></td>
<td><?php echo $ebook['Ebook']['pengarang']?></td>
<td><?php echo $ebook['Ebook']['tahun']?></td>
  
  <td class="actions">
    <a class="gotolinkanchor" data-title="View Ebook" data-width="550px" data-height="300px" href="<?php echo $this->webroot;?>admin/ebooks/view/<?php echo $ebook['Ebook']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
    
    <a class="gotolinkanchor" data-title="Edit Ebook" data-width="750px" data-height="300px" href="<?php echo $this->webroot;?>admin/ebooks/edit/<?php echo $ebook['Ebook']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

    <div>
              <?php echo $form->create('Ebook',array('id'=>'form_do_fav_'.$ebook['Ebook']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
                echo $form->input('EbookFav.id',array('type'=>'hidden','value'=>$ebook['Ebook']['id']));
              ?>

              <?php if($ebook['Ebook']['favorite'] == 0):?>

                <?php echo $form->input('EbookFav.action',array('type'=>'hidden','value'=>1));?>
                <a data-entryid="<?php echo $ebook['Ebook']['id'];?>" id="do_fav_<?php echo $ebook['Ebook']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i> Jadikan Fav</a>
              <?php else:?>
                <?php echo $form->input('EbookFav.action',array('type'=>'hidden','value'=>0));?>
                <a data-entryid="<?php echo $ebook['Ebook']['id'];?>" id="do_fav_<?php echo $ebook['Ebook']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
              <?php endif;?>
              <?php echo $form->end();?>

            </div>

    <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/ebooks/delete/<?php echo $ebook['Ebook']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
  </td>
</tr>


<script type="text/javascript">
          

$(document).ready(function() { 

   window.entryid = 0;
    var options_ebookdofav = {

      //beforeSubmit:  showRequest,  // pre-submit callback 
      success:       showResponse_ebookdofav  // post-submit callback
    };

    $( '.nongoldehlo' ).on('click', function(){

      window.entryid = $(this).data('entryid');
      
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#form_do_fav_'+window.entryid).ajaxSubmit(options_ebookdofav);
      //console.log("cetak1" + window.entryid);
      

      
    });
}); 

function showResponse_ebookdofav(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();

    $('tbody#ebooktable #ebook_record_'+window.entryid).html(responseText);
    //console.log("cetak2"+window.entryid);
  }, 2000);
}



</script>