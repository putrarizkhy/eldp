
<div style="float:left;width:200px;margin-right:40px;">


    <label>ID Pustaka</label>
    <div>
    <?php
    echo $audio['Audio']['id_pustaka'];
    ?>
    </div>
    </br>

    <label>Judul</label>
    <div>
    <?php
    echo $audio['Audio']['title'];
    ?>
    </div>
    </br>

    <label>Category Audio</label>
    <div>
    <?php
    echo $audio['Category']['name'];
    ?>
    </div>
    </br>

</div>

<div style="float:left;width:200px;">

    <label>Penyanyi</label>
    <div>
    <?php
    echo $audio['Audio']['sutradara'];
    ?>
    </div>
    </br>

    <label>Pengarang</label>
    <div>
    <?php 
    echo $audio['Audio']['produksi'];
    ?>
    </div>
    </br>

    <label>Tahun</label>
    <div>
    <?php 
    echo $audio['Audio']['tahun'];
        ?>
    </div>



</div>

<div style="clear:both;float:none;margin-bottom:30px;"/>


<div id="audio_container" style="margin:0 auto;text-align:center;margin-bottom:20px;">
  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio" style="margin:0 auto;text-align:center;">
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



<script type="text/javascript">
$("#jquery_jplayer_1").jPlayer({
    ready: function () {
      $(this).jPlayer("setMedia", {
        title:'<?php echo $audio['Audio']['sutradara'];?>',
        artist:'<?php echo $audio['Audio']['produksi'];?>',
        mp3:'<?php echo $this->webroot.'files/audios/'.$audio['Audio']['file'];?>'
      }).jPlayer("play"); // Attempts to Auto-Play the media
    },
    swfPath: "/js",
    supplied: "mp3"
});
</script>
