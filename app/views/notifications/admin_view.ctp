

            <label>Judul</label>

            <div class="input-control text" data-role="input-control">
              <?php
                echo $notif['Notification']['title'];
              ?>
              
            </div>

            <label>Isi</label>

            <div class="input-control textarea" data-role="input-control">
              <?php
                echo $notif['Notification']['content'];
              ?>
              
            </div>

            <label>Aktif ?</label>

            <div class="input-control" data-role="input-control">
              <?php $notifcetak = $notif['Notification']['active'];
            if($notifcetak  == 1){
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
            if($notif['Notification']['dir']!=null){?>
                <img width="50" src="<?php echo $this->webroot.$notif['Notification']['dir'];?>"/>
            <?php }else{
                echo '<p class="fontred">Belum ada gambar</p>';
            }

            ?>
            </div>

            <label>Tanggal Publish</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $notif['Notification']['publish_date'];
                ?>
                  
            </div>

            <label>Tanggal expired</label>

            <div class="input-control text" data-role="input-control">
                <?php
                    echo $notif['Notification']['expiration_date'];
                ?>
                  
            </div>
        
          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
   