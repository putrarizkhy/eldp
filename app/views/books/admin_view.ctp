<div style="float:left;width:350px;margin-right:40px;">


    <label>ID Pustaka</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $book['Book']['id_buku'];
    ?>
    </div>


    <label>ISBN</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $book['Book']['isbn'];
    ?>
    </div>

    <label>Category</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $book['Book']['category_id'];
    ?>
    </div>

    <label>Judul Buku</label>
    <div class="input-control text" data-role="input-control">
    <?php
    echo $book['Book']['title'];
    ?>
    </div>



    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $book['Book']['pengarang'];

    ?>
    </div>


 <label>Penerbit</label>
    <div class="input-control text" data-role="input-control">
<?php
echo $book['Book']['penerbit'];

?>

</div>

<label>Tahun Terbit</label>
<div><?php echo $book['Book']['tahun']?>
</div>

<label>Dapat dipinjam ?</label>

<div class="input-control" data-role="input-control">
  <?php $pinjam = $book['Book']['bisa_dipinjam'];
        if($pinjam == 1){
            echo 'Iya';
        }else{
            echo 'Tidak';
        }
  ?>
  
</div>

</div>

<div style="float:left;width:350px;">


<label>Jumlah Buku</label>

<div class="input-control text" data-role="input-control">
<?php
echo $book['Book']['jml_buku'];
?>
</div>


<label>Sedang Dipinjam</label>

<div><?php echo $book['Book']['onrent']; ?>
</div>


<label>Buku Hilang / Rusak</label>

<div><?php echo $book['Book']['jml_rusak'] ?>
</div>

<label>Buku Tersedia</label>

<div><?php $available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);?>
<?php echo $available;?>
</div>


<label>Letak Simpan</label>

<div><?php echo $book['Category']['Location']['lokasi']?> , <?php echo $book['Category']['Location']['keterangan']?>
</div>


<label>Buku Favorite</label>

<div><?php $fav = $book['Book']['favorite'];
    if($fav == 1){
        echo 'Iya';
    }else{
        echo 'Tidak';
    };
?>
</div>


    <label>Jenis Buku</label>

    <div><?php $jenis = $book['Book']['jenis'];
    if($fav == 1){
        echo 'Fisik';
    }else{
        echo 'Bukan';
    };
?>
</div>


<label>Resensi</label>

    <div class="input-control textarea" data-role="input-control">
<?php
echo $book['Book']['sinopsis'];
?>
</div>


<div><?php
echo '<span>Cover anda sebelumnya</span><br/>';
if($book['Book']['preview']!=null){?>
    <img width="50" src="<?php echo $this->webroot.$book['Book']['preview'];?>"/>
<?php }else{
    echo '<p>Belum ada cover</p>';
}

?>
</div>



</div>
<div style="clear:both;float:none;margin-bottom:30px;"/>
