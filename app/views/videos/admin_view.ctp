<div style="float:left;width:200px;margin-right:40px;">


    <label>ID Pustaka</label>
    <div>
    <?php
    echo $video['Video']['id_buku'];
    ?>
    </div>
    </br>

    <label>Judul</label>
    <div>
    <?php
    echo $video['Video']['title'];
    ?>
    </div>
    </br>

    <label>Category Video</label>
    <div>
    <?php
    echo $video['Category']['name'];
    ?>
    </div>
    </br>

</div>

<div style="float:left;width:200px;">

    <label>Sutradara</label>
    <div>
    <?php
    echo $video['Video']['sutradara'];
    ?>
    </div>
    </br>

    <label>Produksi</label>
    <div>
    <?php 
    echo $video['Video']['produksi'];
    ?>
    </div>
    </br>

    <label>Tahun</label>
    <div>
    <?php 
    echo $video['Video']['tahun'];
        ?>
    </div>

</div>

<div style="clear:both;float:none;margin-bottom:30px;"/>
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
