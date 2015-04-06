<div id="home-content" class="clearfix">
  <div id="shelf">
    <?php foreach ($videos as $book) :?>
    

    <div class="itemisotope">
    <!--oneset-->
      <div class="box" id="#">
        <div class="postim1">
          <a href="#dataebook<?php echo $book['Video']['id']?>" class="ebookpopup ebookpopup1">
            <img src="<?php echo $this->webroot?><?php echo $book['Video']['cover']?>" style="width:100px;height:152px;">
          </a>
          <a class="play ebookpopup1 ebookpopup" href="#dataebook<?php echo $book['Video']['id']?>" style="opacity: 1;">1</a>
          
        </div>
      </div>

      <div class="box-home">
        <div class="btitle-home">
            <h1><?php echo $book['Video']['title']?></h1>
                <p><?php echo $book['Video']['sutradara']?> - <?php echo $book['Video']['produksi']?></p>
                <br/>
                <h2>Sinopsis</h2>
                <p><?php echo $book['Video']['details']?></p>
        </div>
        <div class="list" >
          <a href="#dataebook<?php echo $book['Video']['id']?>" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot?><?php echo $book['Video']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>

      <div style="">
        <div id="dataebook<?php echo $book['Video']['id']?>" class="datapopup">
        <div class="rack">
          <div class="previewinsidepopup">
            <img class="" src="<?php echo $this->webroot?><?php echo $book['Video']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </div>
          <div class="datapopuppreview1">
            
            <a class="viewvideo" href="<?php echo $this->webroot;?><?php echo $book['Video']['dir'].'/'.$book['Video']['file'];?>" title="<?php echo $book['Video']['title'];?>"><img src="<?php echo $this->webroot?>images/lihat-btn.png"/></a></br>

            <a href="<?php echo $this->webroot;?>videos/download?filename=<?php echo $book['Video']['file'];?>&mimetype=<?php echo $book['Video']['mimetype'];?> " title="#"><img style="margin-top: 32px;margin-left: 141px;" src="<?php echo $this->webroot?>images/download-btn.png"/></a>

            <a class="commentpopup fancybox.ajax" style="margin-top: 34px;margin-left: 141px;" href="<?php echo $this->webroot.'comments/show_comments/'.$controllerActiveId.'/'.$book['Video']['id'];?>" data-libraryId="10"><img src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a>

            <!--<a href="<?php echo $this->webroot;?>files/videos/<?php echo $book['Video']['file'];?>" title="#"><img style="margin-top: 32px;margin-left: 141px;" src="<?php echo $this->webroot?>images/download-btn.png"/><img href="#commentbook" class="ebookpopup" style="margin-top: 0px;margin-left: 141px;" src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a>-->

            <h1><?php echo $book['Video']['title']?></h1>
            <p><?php echo $book['Video']['produksi']?></p>
            <br/>
            <h2>Sinopsis</h2>
            <p><?php echo $book['Video']['details']?></p>
            <br/>
          </div>
          <div class="bookdetailpopup2">
            <dl class="desc-detail">    
              <dt class="altrow">Id</dt>
                <dd class="altrow"><?php echo $book['Video']['id']?>  &nbsp;</dd>
              <dt>Sutradara</dt>
                <dd><?php echo $book['Video']['sutradara']?> &nbsp;</dd>
              <dt class="altrow">Produksi</dt>
                <dd class="altrow"><?php echo $book['Video']['produksi']?> &nbsp;</dd>
              <dt>Thn Terbit</dt>
                <dd><?php echo $book['Video']['tahun']?> &nbsp;</dd>
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

<?php
//extract the get variables
    $url = $this->params['url'];
    unset($url['url']);
    $get_var = http_build_query($url);
     
    $arg1 = array(); $arg2 = array();
    //take the named url
    if(!empty($this->params['named']))
    $arg1 = $this->params['named'];
     
    //take the pass arguments
    if(!empty($this->params['pass']))
    $arg2 = $this->params['pass'];
     
    //merge named and pass
    $args = array_merge($arg1,$arg2);
     
    //add get variables
    $args["?"] = $get_var;
     
    $paginator->options(array('url' => $args));
    
?>
<div class="pageinfo">
  <p><?php 
  echo $paginator->counter(array(
        'format' => 'Halaman %page% dari total %pages% halaman,
                     menampilkan %current% data dari total %count% data.'
                     
  ));

  /*echo $paginator->counter(array(
        'format' => 'Halaman %page% dari %pages%,
                     menampilkan %current% data dari total %count% data,
                     menampilkan data %start%, sampai %end%'
  ));*/
  ?></p>
</div>
<div class="paging">
  
  <?php echo $paginator->prev('<strong>&#65513;</strong> '.__('previous', true), array('escape'=>false,'id'=>'prevpage'), null, array('escape'=>false,'id'=>'prevpage','class'=>'disabled'));?>
  
  <?php echo $paginator->numbers(array(
    'before' => '',
    'after' => '',
    'separator' => '',
    
    'class' => 'number'
  ));
  ?>

  <?php echo $paginator->next(__('next', true).' <strong>&#65515;</strong>', array('escape'=>false,'id'=>'nextpage'), null, array('escape'=>false,'id'=>'nextpage','class' => 'disabled'));?>
</div>

  <nav id="page_nav">
     <a href="#"></a>
  </nav>
<div class="bottomcover ">

  <div id="bottom">
    
    <div class="clear"> </div>
  </div>
</div></div>