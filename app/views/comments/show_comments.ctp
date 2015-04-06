
<div  class="bookcomment">

  <div class="datapopup">
    <div id="commentbook" class="commentbook">
    <h1 style="margin-bottom:30px;"> List Komentar</h1>
    <hr/>
	<?php 
	if(!empty($comments)):
	foreach ($comments as $comment):?>
	<div class="postcomment" style="">
		<div class="previewinsidepopup1">

			<?php if (isset($comment['User']['photo'])):?>
		  	<img class="" src="<?php echo $this->webroot.$comment['User']['photo'];?>" alt="" style="display: inline-block; left: 0px; top: 0px;width:50px; ">
			<?php else:?>

			<img class="" src="<?php echo $this->webroot;?>client/images/no_avatar.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">

			<?php endif;?>
		</div>
		<div class="datapopuppreview2">
		  <h3 style="margin-bottom:3px;"><?php echo $comment['User']['name']?></h3>

		  <?php echo $comment['Comment']['content']?>
		  <small style="margin-top:5px;display:block;font-size:0.9em;color:#5c5c5c;">Dibuat pada <?php echo $time->niceShort($comment['Comment']['created'],null); ?> </small>
		  <br/>
		</div>
	</div>
	<?php endforeach;
	else:
	?>
	<div class="postcomment" style="margin-top:30px;">

		
		<div class="previewinsidepopup1">
		  
		</div>

		<div class="datapopuppreview2">
		  <h2></h2>
		  <p class="nocomment" style="background:rgba(204,51,51,0.8);color:#fff;padding:15px;">Belum terdapat komentar</p>
		  <br/>
		</div>

	</div>
	<?php endif;?>
	  <?php echo $form->create('Comment',array('action'=>'add','style'=>'margin:0;','autocomplete'=>'off'));?>
      <div class="postcomment">
        <div class="previewinsidepopup1">
          <img class="" src="<?php echo $this->webroot;?>client/images/no_avatar.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
        </div>
        <div class="datapopuppreview2">
        	<?php echo $form->input('content',array('id'=>'commentcontentinput','placeholder'=>'Tulis komentar anda disini, kemudian tekan tombol kirim','label'=>false,'rows'=>4,'cols'=>50));?>  
        	<?php echo $form->input('library_type',array('type'=>'hidden','value'=>$tipepustaka));?>  
        	<?php echo $form->input('library_id',array('type'=>'hidden','value'=>$idpustaka));?>  
          
          <br/>
            <input id="submitcomment" type="submit" class="button" value="Kirim Komentar">
        </div>
      </div>
      <?php echo $form->end();?>
    </div>
</div>
</div><!--endcomment-->
<script type="text/javascript">


$('#CommentAddForm').submit(function(e) { 

	//get all value
	var commentcontent = $('#commentcontentinput').val();
	var library_type = $('#CommentLibraryType').val();
	var library_ID = $('#CommentLibraryId').val();
//var bookid = $(this).data('bookid');

	if(commentcontent == ''){
		alert("Silahkan masukkan komentar, komentar tidak boleh kosong");
	}else{
		$.fancybox({
		titleShow : false,
		openEffect  : 'elastic',
		closeEffect : 'elastic',
		autoSize : false,
		type:'inline',
		href:'#bookingpopup',
		width:500,
		height:300,
		padding:0,
		autoHeight:false,
		scrollOutside: false,
		afterShow:function(){
		  
		  $("div.showformmemberbooking").css({
		    position: 'absolute',
		    top: '-1000px'
		  });

		  $( "#inputid_memberbooking").focus();
		  switchto_commentform(library_ID,library_type,commentcontent);
		  activate_commentaddform_function();
		  
		},
		beforeClose:function(){
		  $('a.showformmemberbooking').fadeIn();
		  $("div.showformmemberbooking").css({
		    position: 'absolute',
		    top: '-1000px'
		  });
		  $('#transaction_success').hide();
		  $('#transaction_failed').hide();
		  reset_commentform();
		}
		});
	}
	e.preventDefault();
  	return false;
});


function switchto_commentform(libraryID,libraryType,Comment){
	//console.log(libraryID);
	//remove first backcomment button and append
	$('#bookingpopup').find('a#backtocomment').remove();
	$('#bookingpopup').append('<a style="margin-top:15px;display:block;" id="backtocomment" href="http://localhost/elibrary/comments/show_comments/'+libraryType+'/'+libraryID+'" class="commentpopup fancybox.ajax">&larr; Klik disini untuk kembali</a>');
	//change action to comment etc
	$('#RentBookedForm').attr("action", "<?php echo $this->webroot?>comments/add");
	$('#RentBookedForm').attr("id", "CommentAddForm2");
	//$('#inputid_memberbooking').attr("id", "data[Comment][usermemberid]");
	$('#CommentAddForm2').append('<input type="hidden" name="data[Comment][library_type]" id="LibraryTypeHidden" value="'+libraryType+'">');
	$('#CommentAddForm2').append('<input type="hidden" name="data[Comment][library_id]" id="LibraryIdHidden" value="'+libraryID+'">');

	$('#CommentAddForm2').append('<input type="hidden" name="data[Comment][content]" id="CommentContentHidden" value="'+Comment+'">');
}

function reset_commentform(){
	$('#bookingpopup').find('a#backtocomment').remove();
	$('#CommentAddForm2').find('a#backtocomment').remove();
	$('#CommentAddForm2').attr("action", "<?php echo $this->webroot?>rents/booked");
	$('#CommentAddForm2').attr("id", "RentBookedForm");
}

function activate_commentaddform_function(){

	window.usebarcodescanner = true;

	function showResponsecomment(responseText, statusText, xhr, $form)  { 
	  setTimeout(function() {

	    console.log(responseText);
	    
	    if(responseText.status == 3){
	    	
			alert(responseText.flashMessage);
			closeLoading_comment();

			if(window.usebarcodescanner == true){
				$("div.showformmemberbooking").css({
				  position: 'relative',
				  top: '0'
				});
			}else{
				$("div.showformmemberbooking").css({
				  position: 'absolute',
				  top: '-1000px'
				});
				$('a.showformmemberbooking').show();
			}
		}
	    else if(responseText.status == 1){
			closeLoading_comment();
			$('#transaction_failed').hide();
			$('#transaction_success').show();
			$('.status_booked').text(responseText.flashMessage);

	    }else if(responseText.status == 2){
			closeLoading_comment();
			$('#transaction_success').hide();
			$('#transaction_failed').show();
			$('.status_booked').text(responseText.flashMessage);
	      
	    }else{
	      closeLoading_comment();
	      
	      alert(responseText.flashMessage);
	    }
	    $('a#backtocomment').show();
	  }, 2000);

	  
	}

	function closeLoading_comment(){
	  $('#transaction_success').hide();
	  $('#transaction_failed').hide();
	  $('#CommentAddForm2').clearForm();
	  $('.loadingbooking').hide();
	  $('a.hideformmemberbooking').hide();
	  $('a.showformmemberbooking').hide();
	  $("div.showformmemberbooking").css({
	    position: 'absolute',
	    top: '-1000px'
	  });
	}

	var options_comment = {
	  dataType:  'json',
	  success: showResponsecomment  // post-submit callback
	};

	$('#CommentAddForm2').unbind('submit').bind('submit',function(e) {
	
		e.preventDefault();
  		$('.loadingbooking').show();
  		$("div.showformmemberbooking").css({
    		position: 'absolute',
    		top: '-1000px'
  		});

  		$('a#backtocomment').hide();
  		
  		$('#CommentAddForm2').ajaxSubmit(options_comment);
  		//$("#CommentAddForm2").unbind('submit');
  		return false;
	});
}
</script>
