<style class="fontred"></style>

    <div style="float:left;width:260px;margin-right:40px;">
      
        <div>
        <?php
        echo '<span>Foto Profil</span><br/>';
        if($member['User']['photo']!=null){?>
            <img width="50" src="<?php echo $this->webroot.$member['User']['photo'];?>"/>
        <?php }else{
            echo '<p class="fontred">Belum ada foto</p>';
        }

        ?>
        </div>

        <label>Id Member</label>

        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['id_member'];
            ?>
              
        </div>


        <label>Username</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['username'];
            ?>
        </div>


        <label>E-mail</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['email'];
            ?>
        </div>   

    </div>

    <div style="float:left;width:250px;">

        <label>Nama</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['name'];
            ?>
        </div>

        <label>Lahir</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['lahir'];
            ?>
        </div>

        <label>Telepon</label>
        <div class="input-control text" data-role="input-control">
            <?php
            echo $member['User']['telpon'];
            ?>
        </div>

        <label>Group</label>
        <div class="input-control text" data-role="input-control">
            <?php $grup = $member['User']['group_id'];
            if($grup == 1){
                echo 'Admin';
            }elseif($grup == 2){
                echo 'Petugas Perpus';
            }elseif($grup == 3){
                echo 'Kepala Sekolah';
            }elseif($grup == 4){
                echo 'Guru';
            }else{
                echo 'Siswa';
            }
            ?>


        </div>
    </div>
        
          

    <div style="clear:both;float:none;margin-bottom:30px;"/>
    
