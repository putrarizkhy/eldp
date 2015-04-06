

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $plan['Plan']['title'];
              ?>
              
            </div>
            <label>Kategori</label>

    <div class="input-control text" data-role="input-control">
    <?php
    echo $plan['Plan']['category_id'];
    ?>
    </div>

    <label>Pengarang</label>
    <div class="input-control text" data-role="input-control">

    <?php
    echo $plan['Plan']['pengarang'];

    ?>
    </div>


     <label>Penerbit</label>
        <div class="input-control text" data-role="input-control">
    <?php
    echo $plan['Plan']['penerbit'];

    ?>

    </div>

    <label>Tahun Terbit</label>
    <div><?php echo $plan['Plan']['tahun']?>
    </div>

    <label>Jumlah Buku</label>
    <div><?php echo $plan['Plan']['jml_buku']?>
    </div>

    
           


            <div>
            <?php
            echo '<span>Gambar</span><br/>';
            if($plan['Plan']['file']!=null){?>
                <img width="50" src="<?php echo $this->webroot.$plan['Plan']['file'];?>"/>
            <?php }else{
                echo '<p class="fontred">Belum ada gambar</p>';
            }

            ?>
            </div>

            <label>Tanggal Didaftarkan</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $plan['Plan']['created'];
                ?>
                  
            </div>

            <label>Tanggal Edit Terakhir</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $plan['Plan']['modified'];
                ?>
                  
            </div>
        
          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
   