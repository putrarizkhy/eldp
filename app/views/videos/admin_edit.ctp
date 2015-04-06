<div class="formcontainer">
<div class="labs form">
<div id="edit_videos">
<div id="edit_videos-wrapper">
	<div class="loader loaderform" style="display:none;">
	    <img src="<?php echo $this->webroot;?>images/rotite-30-29.png" width="928" height="29" style="position: absolute; display: block; overflow: hidden; left: 0px; top: 0px; margin: 0px; padding: 0px; max-width: none; max-height: none; border: none; line-height: 1; background-color: transparent; -webkit-backface-visibility: hidden; -webkit-user-select: none;">
	    
	</div>
	<br/>
	<p class="statusload loaderformstatus" style="display:none;"> Memproses data, mohon menunggu </p>

	<?php echo $form->create('Video',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
		<fieldset>
		
		<div style="float:left;width:250px;margin-right:40px;">
				
			<?php
			echo $form->input('id');?>
			
			<label>Category Video</label>			
			<div class="input-control text" data-role="input-control">
			
			<?php
                echo $form->select('category_id',$listCategory,null);
            ?>
			</div>

			<label>Judul Video</label>
			<div class="input-control text" data-role="input-control">
			
			<?php
			echo $form->input('title',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
			
			?>
			
			</div>


			<label>Sutradara</label>
			<div class="input-control text" data-role="input-control">
				
				<?php
				echo $form->input('sutradara',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
				
				?>
			</div>

			<label>Produksi</label>
			<div class="input-control text" data-role="input-control">
				
			<?php
			echo $form->input('produksi',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
			
			?>
			
			</div>
			
			<label>Pilih Tahun</label>
			<div class="input-control text" data-role="input-control">
				<?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'));?>
			</div>

			<div>

			<span>File anda sebelumnya</span><br/>
			<?php 
			if($video['Video']['file']!=null):
			?>
			<div id="containerPlayer">Loading the player ...</div>
			<script type="text/javascript">
			jwplayer("containerPlayer").setup({
			    'id': 'playerID',
			    'width': '250',
			    'height': '150',
			    'aboutlink': 'http://basedidea.com',
			    'autostart':false,
			    //'skin': 'skins/five.xml',
			    'image':'images/imagesscreenshot.png',
			    'file': '<?php echo $this->webroot.'files/videos/'.$video['Video']['file'];?>',

			});
			</script>
			<?php else:?>
				<p> Belum ada video untuk entry ini</p>
			<?php endif;?>

			</div>
		</div> <!--endbelah-->
		<div style="float:left;width:250px;margin-right:40px;">

			<label>Resensi</label>
			<div class="input-control textarea" data-role="input-control">
				<?php
				echo $form->input('details',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
				?>
			</div>

			<div>
			<?php
			echo '<span>Cover anda sebelumnya</span><br/>';
			if($video['Video']['cover']!=null){?>
				<img width="50" src="<?php echo $this->webroot.$video['Video']['cover'];?>"/>
			<?php }else{
				echo '<p>Belum ada cover</p>';
			}

			?>
			</div>

			<label>Ganti Cover file:</label>
			
			<div class="input-control text" data-role="input-control">
			
			<?php
			echo $form->input('File.image1', array('label'=>false, 'type'=>'file'));
			?>

			</div>

			
			
			<label>Ganti file</label>
			
			<div class="input-control text" data-role="input-control">
			<?php
	          echo $form->input('file', array('label'=>false, 'type'=>'file'));
			
			;?>
			</div>
			<div style="clear:both;float:none;margin-bottom:10px;"></div>


		    <div class="submit">
		    	<button class="btn btn-2 btn-2g" type="submit">Update</button>
		    </div>
			
		 	
			</fieldset>

			
	    </div> <!--endbelah-->
	    
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
 
    $( "#VideoEditForm" ).on('submit', function(e) {
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
    $('#entry_record_<?php echo $video['Video']['id']?>').html(responseText);
  }, 2000);
}

</script>
