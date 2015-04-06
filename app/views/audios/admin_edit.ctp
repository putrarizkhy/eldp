<?php echo $form->create('Audio',array('action'=>'edit','enctype'=>'multipart/form-data'));?>
<fieldset>
  <div style="float:left;width:250px;margin-right:40px;">

    <?php
    echo $form->input('id',array('div'=>false,'label'=>false));
    ?>

            <label>Id Pustaka</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('id_pustaka',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            

            <label>Category Audio</label>     
            <div class="input-control text" data-role="input-control">
            
            <?php
                    echo $form->select('category_id',$listCategory,null);
                ?>
            </div>

            <label>Penyanyi</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('sutradara',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <label>Pengarang</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('produksi',array('div'=>false,'label'=>false));
              ?>
              
            </div>


            <label>Tahun</label>
            <div>
            <?php echo $form->year('tahunBerdiri', 1945, 2015, null, array('class'=>'year-set'), 'Pilih Tahun');    ?>
            <?php //echo $form->input('jumlahhalaman',array('class'=>'text-input normal-input','label'=>'Jumlah halaman'));   ?>
            </div>
            <br/>

            <?php
          echo '<span>Audio anda sebelumnya</span><br/>';
          if($audio['Audio']['file']!=null){?>

            <div id="audio_container" style="margin:0 auto;text-align:center;margin-bottom:20px;">
              <div id="jquery_jplayer_1" class="jp-jplayer" ></div>
              <div id="jp_container_1" class="jp-audio" style="">
                <div class="jp-type-single">
                  <div class="jp-gui jp-interface">
                    <ul class="jp-controls">
                      <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                      <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                      <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                      <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                      <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                      <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                    </ul>
                    <div class="jp-progress">
                      <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                      </div>
                    </div>
                    <div class="jp-volume-bar">
                      <div class="jp-volume-bar-value"></div>
                    </div>
                    <div class="jp-time-holder">
                      <div class="jp-current-time"></div>
                      <div class="jp-duration"></div>
                      <ul class="jp-toggles">
                        <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                        <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="jp-details">
                    <ul>
                      <li><span class="jp-title"></span></li>
                    </ul>
                  </div>
                  <div class="jp-no-solution">
                    <span>Update Required</span>
                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                  </div>
                </div>
              </div>
            </div>


          <?php }else{
            echo '<p>Belum ada file</p>';
          }
            ?>
</div>

<div style="float:left;width:250px;">

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $form->input('title',array('div'=>false,'label'=>false));
              ?>
              
            </div>

            <?php
            echo '<span>Cover anda sebelumnya</span><br/>';
            if($audio['Audio']['cover']!=null){?>
                <img width="50" src="<?php echo $this->webroot.$audio['Audio']['cover'];?>"/>
            <?php }else{
                echo '<p>Belum ada cover</p>';
            }

            ?>
            <label>Ganti file Cover</label>
            <?php
            echo $form->input('File.image1', array('label'=>false, 'type'=>'file'));
            ?>
          <br/>
          
          <label>Ganti file Audio</label>
          <?php
          echo $form->input('file', array('label'=>false, 'type'=>'file'));
          ?>
          </div>
</div>
    <div style="clear:both;float:none;margin-bottom:10px;"/>
    <div class="submit">
        <button class="btn btn-2 btn-2g" type="submit">Submit</button>
    </div>


</fieldset>


<?php echo $form->end();?>



<script type="text/javascript">
          

$(document).ready(function() { 
    var options2 = {
      success:       showResponse  // post-submit callback
    };
 
    $( "#AudioEditForm" ).on('submit', function(e) {
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
    $('#audio_record_<?php echo $audio['Audio']['id']?>').html(responseText);
  }, 2000);
}



</script>


<script type="text/javascript">
$("#jquery_jplayer_1").jPlayer({
    ready: function () {
      $(this).jPlayer("setMedia", {
        title:'<?php echo $audio['Audio']['sutradara'];?>',
        artist:'<?php echo $audio['Audio']['produksi'];?>',
        mp3:'<?php echo $this->webroot.'files/audios/'.$audio['Audio']['file'];?>'
      }).jPlayer(); // Attempts to Auto-Play the media
    },
    swfPath: "/js",
    supplied: "mp3"
});
</script>