
<tr id="rent_<?php echo $rent['Rent']['id'];?>">
	<td>
		<?php echo $rent['Rent']['id']; ?>
	</td>
	<td>
		<?php echo $rent['Book']['title']; ?>
	</td>
	<td>
		<?php echo $rent['User']['name']; ?>
	</td>
	<td>
		<?php echo $time->niceShort($rent['Rent']['tgl_pinjam'],null); ?>
	</td>
	<td>
		<?php echo $time->niceShort($rent['Rent']['tgl_kembali'],null); ?>
	</td>
	<td>
		<i class="icon-checkmark on-left"
    style="background: #7fa900;color: white;padding: 4px;border-radius: 50%;font-size: 10px;"></i>
           Berhasil
	</td>
	<td class="actions">
		
		<a class="deleteitemrent" href="<?php echo $this->webroot;?>admin/rents/delete/<?php echo $rent['Rent']['id']?>" ><i class="icon-remove on-right"></i> Hapus</a>
	</td>

	<script type="text/javascript">

	$( '.contenareaajax' ).on( "click", "a.deleteitemrent", function(e) {

      e.preventDefault(); // avoids calling preview.php
      if(confirm('Apakah anda yakin akan menghapus item ini ?')){
          //$.fancybox.showLoading();

          var clickedItem = $(this);
          $('.loadingpagecontainer').show();
          
          $.ajax({
            type: "POST",
            dataType: "json",
            cache: false,
            url: this.href, // preview.php
            //data: $("#postp").serializeArray(), // all form fields
            success: function (data) {
              console.log(data);
              
              // on success, post (preview) returned data in fancybox
              if(data.status == "true"){

                  //clickedItem.parents('tr').removeClass('details-open');
                  
                clickedItem.parents('tr').fadeOut('slow',function(){
                    $('.loadingpagecontainer').hide();
                    clickedItem.parents('tr').remove();
                    alert(data.flashMessage);
                });
              }else{

              }
            } // success
          }); // ajax

      }else{
          //alert('Batal menghapus')
      }
    }); // on
	</script>
	
</tr>



	

