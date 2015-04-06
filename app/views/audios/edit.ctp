<div class="formcontainer">
<div class="labs form">
<div id="edit_audios">
<div id="edit_audios-wrapper">
	<div class="loader loaderform" style="display:none;">
	    <img src="<?php echo $this->webroot;?>images/rotite-30-29.png" width="928" height="29" style="position: absolute; display: block; overflow: hidden; left: 0px; top: 0px; margin: 0px; padding: 0px; max-width: none; max-height: none; border: none; line-height: 1; background-color: transparent; -webkit-backface-visibility: hidden; -webkit-user-select: none;">
	    
	</div>
	<br/>
	<p class="statusload loaderformstatus" style="display:none;"> Memproses data, mohon menunggu </p>

	<?php echo $form->create('Audio',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
		<fieldset>
		
		<div style="float:left;width:350px;margin-right:40px;">
				
			<?php
			echo $form->input('id');?>
			
			<label>Category Audio</label>			
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


			<label>Jumlah halaman</label>
			<div class="input-control text" data-role="input-control">
				
				<?php echo $form->input('jumlahhalaman',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));	?>
			</div>
			
			<label>Pilih Tahun</label>
			<div class="input-control text" data-role="input-control">
				<?php echo $form->year('tahunBerdiri', 1945, 2011, null, array('class'=>'year-set'));?>
			</div>

		</div> <!--endbelah-->
		<div style="float:left;width:350px;margin-right:40px;">

			<label>Resensi</label>
			<div class="input-control textarea" data-role="input-control">
				<?php
				echo $form->input('details',array('class'=>'text-input large-input', 'div'=>false,'label'=>false));
				?>
			</div>

			<div>
			<?php
			echo '<span>Cover anda sebelumnya</span><br/>';
			if($ebook['Audio']['cover']!=null){
			$vowels = array("img/");
			$cover = str_replace($vowels, "", $ebook['Audio']['cover']);
			

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

			</div>

			<div>

			<span>File anda sebelumnya</span><br/>
			<span>Nama File : <strong><?php echo $ebook['Ebook']['file']; ?></strong></span>

			</div>
			
			<label>Ganti file</label>
			
			<div class="input-control text" data-role="input-control">
			<?php
	          echo $form->input('file', array('label'=>false, 'type'=>'file'));
			
			;?>
			</div>
			
			
		 	
			</fieldset>

			
	    </div> <!--endbelah-->
	    <div style="clear:both;float:none;margin-bottom:30px;"></div>
	    <div class="submit">
	    	<button class="btn btn-2 btn-2g" type="submit">Update</button>
	    </div>
        <br/>
        <br/>
	<?php echo $form->end();?>
</div>
</div>
</div>
</div>

<script type="text/javascript">


(function() {
    
function showResponse(responsesText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxSubmit method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
    if(responsesText.status == "true"){
    	setTimeout(function() {
        	$(".loaderformstatus").hide();
        	$(".loaderform").hide();
        	$.fancybox.close();

        	//process
        	var Audiotoresponse = $('#bookshelf_'+responsesText.idtodelete);
        	
        	
        	$(Audiotoresponse).find('div.Audio').attr('data-image',responsesText.coverbg);

        	$(Audiotoresponse).find('div.Audio').append('<style>#bookshelf_'+responsesText.idtodelete+' .Audio .cover::before{background: -webkit-linear-gradient(left, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url("<?php echo $this->webroot?>'+responsesText.coverbg+'"), #009bdb;background: linear-gradient(to right, transparent 0%, rgba(0, 0, 0, 0.01) 1%, rgba(0, 0, 0, 0.1) 50%, transparent 100%), url("<?php echo $this->webroot?>'+responsesText.coverbg+'"), #009bdb;background-size:160px 100px;}</style>');
        	$(Audiotoresponse).find('h2#judulbuku').text(responsesText.title);
        	$(Audiotoresponse).find('span#pengarangbuku').text(responsesText.pengarang);
        	$(Audiotoresponse).find('li#detailbuku').text(responsesText.details);
        	$(Audiotoresponse).find('.front').css({
        		'background':'url(<?php echo $this->webroot?>'+responsesText.coverbg+')',
        		'background-size':'80px 99px'
        	});

        	$(Audiotoresponse).find('li.buttonlist > a.icon-download').attr('href','<?php echo $this->webroot?>audios/download/'+responsesText.filelocation);
        	$(Audiotoresponse).find('li.buttonlist > a.viewAudio').attr('href','<?php echo $this->webroot?>files/ebooks/'+responsesText.filelocation);
        	$(Audiotoresponse).removeClass('details-open');
			$(Audiotoresponse).find('li.buttonlist').fadeOut();
        	
    	},4000);
    }else{

    }
    
} 

var options3 = {
    //target:        '#output2',   // target element to update
    //beforeSubmit:  showRequest,  // pre-submit callback
    
    dataType:      'json',  // post-submit callback
    success:       showResponse

    	

    
};

// bind form2 using ajaxSubmit
$('#AudioEditForm').on('submit', function(e) {
    e.preventDefault(); // avoids calling preview.php
    // submit the form via ajax
    $("#AudioEditForm").fadeOut();
    //$.fancybox.resize();
    $(".loaderformstatus").fadeIn();
    $(".loaderform").fadeIn();

    
    $(this).ajaxSubmit(options3);
    

    return false;
});

})();       
</script>
