<div style="float:left;width:250px;margin-right:40px;">


    <div>
    <?php
    echo '<span>Foto</span><br/>';
    if($photo['Photo']['cover']!=null){?>
        <img width="150" height="100" src="<?php echo $this->webroot.$photo['Photo']['cover'];?>"/>
    <?php }else{
        echo '<p class="fontred">Belum ada foto</p>';
    }

    ?>
    </div>

    <label>ID Pustaka</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $photo['Photo']['id_pustaka'];
    ?>
    </div>

    <label>Judul</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $photo['Photo']['title'];
    ?>
    </div>

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $photo['Category']['name'];
    ?>
    </div>

</div>

<div style="float:left;width:150px;">

    <label>Penerbit</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $photo['Photo']['penerbit'];

    ?>

    </div>

    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $photo['Photo']['pengarang'];

    ?>
    </div>

    <label>Tahun Terbit</label>
    <div><?php echo $photo['Photo']['tahun']?>
    </div>

</div>



</div>
<div style="clear:both;float:none;margin-bottom:30px;"/>
