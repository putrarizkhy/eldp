<div id="home-content" class="clearfix">
  <div id="shelf">
    <div class="itemisotope">
        <!--oneset-->
          <div class="box boxcd" id="#">
            <a href="#dataebook1" class="ebookpopup">
              <img class="videobox postim bittle" src="images/book5.png">
            </a>
          </div>

          <div class="box-home">
            <div class="btitle-home">
                <h1><?php echo $book['Ebook']['title']?></h1>
                    <p><?php echo $book['Ebook']['pengarang']?> - <?php echo $book['Ebook']['penerbit']?></p>
                    <br/>
                    <h2>Sinopsis</h2>
                    <p><?php echo $book['Ebook']['details']?></p>
            </div>
            <div class="list" >
              <a href="#dataebook<?php echo $book['Ebook']['id']?>" class="ebookpopup">
                <img class="bookcover" src="<?php echo $this->webroot?><?php echo $book['Ebook']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
              </a>
            </div>
          </div>

          <div style="display:none">
            
            <div id="dataebook1" class="datapopup">
            <div class="rack">
              <div class="previewinsidepopup">
                <img class="" src="images/book5.png" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
              </div>
              <div class="datapopuppreview1">
                
                <a href="videos/IPA/home.swf" title="#" class="fancycd"><img src="images/lihat-btn.png"/></a></br><a href="javascript:parent.jQuery.fancybox.open({href : 'videos/IPA/home.swf', title : 'My title', type: 'iframe',minWidth:1000});" title="#"><img style="margin-top: 32px;margin-left: 141px;" src="images/download-btn.png"/></a>
                
                <h1>This is Title Book</h1>
                <p>Bernando - Garpit bung</p>
                <br/>
                <h2>Sinopsis</h2>
                <p>This script is a reusable system for adding a graphical keyboard interface to text fields, password fields and textareas so they can be filled with mouse only. It also adds easy access to special characters your existing keyboard may not otherwise have the ability to generate.</p>
                <br/>
                </div>
                <div class="bookdetailpopup2">
                <dl class="desc-detail">    
                  <dt class="altrow">Id</dt>
                    <dd class="altrow">151  &nbsp;</dd>
                  <dt>Penerbit</dt>
                    <dd>Garpit bung &nbsp;</dd>
                  <dt class="altrow">Pengarang</dt>
                    <dd class="altrow">Bernando &nbsp;</dd>
                  <dt>Thn Terbit</dt>
                    <dd>2011 &nbsp;</dd>
                </dl>

              </div>
            </div>
            </div>
          </div>
        </div>
  </div>
</div>