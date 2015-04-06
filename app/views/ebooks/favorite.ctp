<div id="home-content" class="clearfix">
  <div id="shelf">
    <?php foreach ($books as $book) :?>
    
    <div class="itemisotope">
    <!--oneset-->
      <div class="box" id="#">
        <a href="#dataebook1" class="ebookpopup">
          <img class="postim bittle" src="<?php echo $this->webroot?><?php echo $book['Ebook']['cover']?>" width="150" height="190">
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
          <a href="#dataebook1" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot?><?php echo $book['Ebook']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>

      <div style="">
        <div id="dataebook1" class="datapopup">
        <div class="rack">
          <div class="previewinsidepopup">
            <img class="" src="<?php echo $this->webroot?><?php echo $book['Ebook']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </div>
          <div class="datapopuppreview1">
            
            <a data-fancybox-type="iframe" href="<?php echo $this->webroot;?>files/ebooks/<?php echo $book['Ebook']['id'];?>" title="#"><img src="<?php echo $this->webroot?>images/lihat-btn.png"/></a></br><a href="" title="#"><img style="margin-top: 32px;margin-left: 141px;" src="<?php echo $this->webroot?>images/download-btn.png"/><img href="#commentbook" class="ebookpopup" style="margin-top: 0px;margin-left: 141px;" src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a>

            <h1><?php echo $book['Ebook']['title']?></h1>
            <p><?php echo $book['Ebook']['pengarang']?></p>
            <br/>
            <h2>Sinopsis</h2>
            <p><?php echo $book['Ebook']['details']?></p>
            <br/>
          </div>
          <div class="bookdetailpopup2">
            <dl class="desc-detail">    
              <dt class="altrow">Id</dt>
                <dd class="altrow"><?php echo $book['Ebook']['id']?>  &nbsp;</dd>
              <dt>Penerbit</dt>
                <dd><?php echo $book['Ebook']['penerbit']?> &nbsp;</dd>
              <dt class="altrow">Pengarang</dt>
                <dd class="altrow"><?php echo $book['Ebook']['pengarang']?> &nbsp;</dd>
              <dt>Thn Terbit</dt>
                <dd><?php echo $book['Ebook']['tahun']?> &nbsp;</dd>
            </dl>

          </div>

          <div class="bookcomment">
            <div style="display:none">
            <div id="commentbook" class="datapopup">
            <div class="commentbook">
              <div class="postcomment" style="margin-top:30px;">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/avatar2.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                  

                  <h2>Taufiq Ridha</h2>
                  <p>This script is a reusable system for adding a graphical keyboard interface to text fields, password fields and textareas so they can be filled with mouse only. It also adds easy access to special characters your existing keyboard may not otherwise have the ability to generate.</p>
                  <br/>
                </div>
              </div>
              <div class="postcomment">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/avatar1.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                 
                  <h2>Adden</h2>
                  <p>This script is a reusable system for adding a graphical keyboard interface to text fields, password fields and textareas so they can be filled with mouse only. It also adds easy access to special characters your existing keyboard may not otherwise have the ability to generate.</p>
                  <br/>
                </div>
              </div>

              <div class="postcomment">
                <div class="previewinsidepopup1">
                  <img class="" src="client/images/no_avatar.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                </div>
                <div class="datapopuppreview2">
                  
                 
                  <textarea rows="4" cols="50" name="comment" form="usrform"></textarea>
                  <form action="demo_form.asp" id="usrform">
                   
                    <input type="submit">
                  </form>
                  <p>Anda harus login terlebih dahulu untuk menambah komentar     &nbsp;<a href="#"> Login</a></p>
                </div>
              </div>



              
            </div>
            </div>
          </div> 

          </div>

        </div>
        </div>
      </div>
    </div>
    <?php endforeach;?>

  </div>
</div>
<div class="paging">
  <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 |  <?php echo $paginator->numbers();?>
  <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>

  <nav id="page_nav">
     <a href="#"></a>
  </nav>
<div class="bottomcover ">

  <div id="bottom">
    
    <div class="clear"> </div>
  </div>
</div></div>