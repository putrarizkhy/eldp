<div style="float:left;width:200px;margin-right:40px;">


    <label>ID Pustaka</label>
    <div>
    <?php
    echo $ebook['Ebook']['id_pustaka'];
    ?>
    </div>
    </br>

    <label>Judul</label>
    <div>
    <?php
    echo $ebook['Ebook']['title'];
    ?>
    </div>
    </br>

    <label>Kategori</label>
    <div>
    <?php
    echo $ebook['Category']['name'];
    ?>
    </div>
    </br>

</div>

<div style="float:left;width:200px;">

    <label>Penerbit</label>
    <div>
    <?php
    echo $ebook['Ebook']['penerbit'];
    ?>
    </div>
    </br>

    <label>Pengarang</label>
    <div>
    <?php 
    echo $ebook['Ebook']['pengarang'];
    ?>
    </div>
    </br>

    <label>Tahun</label>
    <div>
    <?php 
    echo $ebook['Ebook']['tahun'];
        ?>
    </div>

</div>

<div style="clear:both;float:none;margin-bottom:30px;"/>
