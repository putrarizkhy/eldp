

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $banner['Banner']['title'];
              ?>
              
            </div>

            <label>Aktif ?</label>

            <div class="input-control" data-role="input-control">
              <?php $aktif = $banner['Banner']['active'];
          if($aktif  == 1){
            echo 'Aktif';
          }else{
            echo "Tidak Aktif";
          }
          ?>
            </div>
            <br>

            <div>
            <?php
            echo '<span>Gambar</span><br/>';
            if($banner['Banner']['file']!=null){?>
                <img width="50" src="<?php echo $this->webroot.$banner['Banner']['file'];?>"/>
            <?php }else{
                echo '<p class="fontred">Belum ada gambar</p>';
            }

            ?>
            </div>

            <label>Tanggal Dibuat</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $banner['Banner']['created'];
                ?>
                  
            </div>

            <label>Tanggal Edit Terakhir</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $banner['Banner']['modified'];
                ?>
                  
            </div>
        
          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
   