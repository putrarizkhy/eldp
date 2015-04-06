<div class="formcontainer">
<div class="labs form">
<div id="edit_ebooks">
<div id="edit_ebooks-wrapper">
	<div class="loader loaderform" style="display:none;">
	    <img src="<?php echo $this->webroot;?>images/rotite-30-29.png" width="928" height="29" style="position: absolute; display: block; overflow: hidden; left: 0px; top: 0px; margin: 0px; padding: 0px; max-width: none; max-height: none; border: none; line-height: 1; background-color: transparent; -webkit-backface-visibility: hidden; -webkit-user-select: none;">
	    
	</div>
	<br/>
	<p class="statusload loaderformstatus" style="display:none;"> Memproses data, mohon menunggu </p>

	<?php echo $form->create('Ebook',array('action'=>'admin_edit','enctype'=>'multipart/form-data'));?>
	<fieldset>
	
	<div style="float:left;width:350px;margin-right:40px;">
			
		<?php
		echo $form->input('id');?>
		
		<label>Category Ebook</label>			
		<div class="input-control text" data-role="input-control">
		
		<?php
            echo $form->select('category_id',$listCategory,null);
        ?>
		</div>

		<label>Judul Buku</label>
		<div class="input-control text" data-role="input-control">
		
		<?php
		echo $form->input('title',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
		
		?>
		
		</div>


		<label>Pengarang</label>
		<div class="input-control text" data-role="input-control">
			
			<?php
			echo $form->input('pengarang',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
			
			?>
		</div>

		<label>Penerbit</label>
		<div class="input-control text" data-role="input-control">
			
		<?php
		echo $form->input('penerbit',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
		
		?>
		
		</div>


		
		
		

	</div> <!--endbelah-->
	<div style="float:left;width:350px;margin-right:40px;">

		<label>Pilih Tahun</label>
		<div class="input-control text" data-role="input-control">
			<?php echo $form->year('tahunBerdiri', 1945, 2011, null, array('class'=>'year-set'));?>
		</div>

		<label>Resensi</label>
		<div class="input-control textarea" data-role="input-control">
			<?php
			echo $form->input('details',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
			?>
		</div>

		<!--<div>
		<?php
		echo '<span>Cover anda sebelumnya</span><br/>';
		if($ebook['Ebook']['cover']!=null){
		$vowels = array("img/");
		$cover = str_replace($vowels, "", $ebook['Ebook']['cover']);
		

		echo $html->image($cover,array('width'=>'100px'));
		}else{
			echo '<p>Belum ada cover</p>';
		}

		?>
		</div>

		<label>Ganti Cover file:</label>
		
		<div class="input-control text" data-role="input-control">
		
		<?php
		echo $form->input('File.image1', array('label'=>false, 'type'=>'file'));
		?>

		</div>-->

		<div>

		<span>File anda sebelumnya</span><br/>
		<span>Nama File : <strong><?php echo $ebook['Ebook']['pdffile']; ?></strong></span>

		</div>
		
		<label>Ganti file</label>
		
		<div class="input-control text" data-role="input-control">
		<?php
          echo $form->input('file', array('label'=>false, 'type'=>'file'));
		?>
		</div>
		
    </div> <!--endbelah-->
    <div style="clear:both;float:none;margin-bottom:30px;"></div>
    <div class="submit">
    	<button class="btn btn-2 btn-2g" type="submit">Update</button>
    </div>
	</fieldset>
    
    <br/>
    <br/>
	<?php echo $form->end();?>
</div>
</div>
</div>
</div>

<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#EbookAdminEditForm" ).on('submit', function(e) {
      $.Dialog.close();
      
     
      $(".formcontainer").fadeOut();
     
      $('.loadingpagecontainer').show();
      $(this).ajaxSubmit(options2); 
      

      return false;
    });
}); 

function showResponse(responseText, statusText, xhr, $form)  { 
  setTimeout(function() {
    $('.loadingpagecontainer').hide();
    $(".formcontainer").show();
    $('#ebook_record_<?php echo $ebook['Ebook']['id']?>').html(responseText);
  }, 2000);
}

</script>


