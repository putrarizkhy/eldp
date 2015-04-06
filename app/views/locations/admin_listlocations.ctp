<style type="text/css">
.actions{
  color: #fff;
}
</style>
<div class="mask1">
  <div class="actionss">
   <table class="table hovered" cellpadding="0" cellspacing="0">
      
      <thead>
        <tr class="title_table">
          <th><a href="/elips/locations/index/page:1/sort:id/direction:asc">Id</a></th>
          <th><a href="/elips/locations/index/page:1/sort:lokasi/direction:asc">Lokasi</a></th>
          <th><a href="/elips/locations/index/page:1/sort:keterangan/direction:asc">Keterangan</a></th>
          <th><a href="/elips/locations/index/page:1/sort:created/direction:asc">Created</a></th>
          <th><a href="/elips/locations/index/page:1/sort:modified/direction:asc">Modified</a></th>
          <th class="actions">Actions</th>
        </tr>
      </thead>

      <tbody id="locationtable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($listlocation as $location) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="entry_record_<?php echo $location['Location']['id'];?>">
          <td><?php echo $location['Location']['id']?></td>
          <td><?php echo $location['Location']['lokasi']?></td>
          <td><?php echo $location['Location']['keterangan']?></td>
          <td><?php echo $location['Location']['created']?></td>
          <td><?php echo $location['Location']['modified']?></td>


          <td class="actions">
            
            <a class="gotolinkanchor" data-title="Edit Location" data-width="400px" data-height="300" href="<?php echo $this->webroot;?>admin/locations/edit/<?php echo $location['Location']['id'] ?>"><i class=" icon-pencil on-right"></i> Edit</a>
            
            <a class="deleteitemtable" href="<?php echo $this->webroot;?>admin/locations/delete/<?php echo $location['Location']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>

        <script type="text/javascript">
          

        $(document).ready(function() { 
            var options2 = {
              success:       showResponse  // post-submit callback
            };
         
            $( "#do_fav_<?php echo $entry['Location']['id']?>" ).click(function() {
              $.Dialog.close();
              
             
              $(".formcontainer").fadeOut();
             
              $('.loadingpagecontainer').show();
              $('#form_do_fav_<?php echo $entry['Location']['id'];?>').ajaxSubmit(options2); 
              

              return false;
            });
        }); 
        
        function showResponse(responseText, statusText, xhr, $form)  { 
          setTimeout(function() {
            $('.loadingpagecontainer').hide();
            $(".formcontainer").show();
            $('#entry_record_<?php echo $entry['Location']['id']?>').html(responseText);
          }, 2000);
        }
        
        </script>
        <?php endforeach;?>
        


        
      </tbody>
    </table>
    <div class="bottom_line1">&nbsp;</div>
  </div>
</div>


