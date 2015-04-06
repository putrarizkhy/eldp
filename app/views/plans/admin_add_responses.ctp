
<tr class="altrow " id="plan_record_<?php echo $entry['Plan']['id']?>">

  <td style="color:black"><?php echo $entry['Plan']['id']?></td>
  <td style="color:black"><?php echo $entry['Plan']['title']?></td>
  <td style="color:black"><?php echo $entry['Category']['name']?></td>
  <td style="color:black"><?php echo $entry['Plan']['penerbit']?></td>
  <td style="color:black"><?php echo $entry['Plan']['pengarang']?></td>
  <td style="color:black"><?php echo $entry['Plan']['jml_buku']?></td>
  
  <td class="actions">
      <a class="gotolinkanchor" data-title="View Plan" data-width="400px" data-height="600px" href="<?php echo $this->webroot;?>admin/plans/view/<?php echo $entry['Plan']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
      
      <a class="gotolinkanchor" data-title="Edit Plan" data-width="400px" data-height="600px" href="<?php echo $this->webroot;?>admin/plans/edit/<?php echo $entry['Plan']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>

      <!--div>
        <?php echo $form->create('Banner',array('id'=>'bookform_do_fav_'.$entry['Plan']['id'],'action'=>'admin_do_favorite','style'=>'margin:0;'));
          echo $form->input('BookFav.id',array('type'=>'hidden','value'=>$entry['Plan']['id']));
        ?>

        <?php if($entry['Plan']['favorite'] == 0):?>

          <?php echo $form->input('BookFav.action',array('type'=>'hidden','value'=>1));?>
          <a data-entryid="<?php echo $entry['Plan']['id'];?>" id="do_fav_<?php echo $entry['Plan']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i> Jadikan Fav</a>
        <?php else:?>
          <?php echo $form->input('BookFav.action',array('type'=>'hidden','value'=>0));?>
          <a data-entryid="<?php echo $entry['Plan']['id'];?>" id="do_fav_<?php echo $entry['Plan']['id']?>" href="#" class="nongoldehlo"><i class=" icon-star on-right"></i>  Buang dari Fav</a>
        <?php endif;?>
        <?php echo $form->end();?>

      </div-->

      <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/plans/delete/<?php echo $entry['Plan']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
    </td>
</tr>


<script type="text/javascript">
          

$(document).ready(function() { 

   window.entryid = 0;
    var options_plandofav = {

      //beforeSubmit:  showRequest,  // pre-submit callback 
      success:       showResponse_plandofav  // post-submit callback
    };

    $( '.nongoldehlo' ).on('click', function(){

      window.entryid = $(this).data('entryid');
      
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $('#planform_do_fav_'+window.entryid).ajaxSubmit(options_bookdofav);
      //console.log("cetak1" + window.entryid);
      

      
    });
}); 

function showResponse_bookdofav(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();

    $('tbody#plantable #plan_record_'+window.entryid).html(responseText);
    //console.log("cetak2"+window.entryid);
  }, 2000);
}



</script>