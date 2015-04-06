<div id="home-content" class="clearfix">
  <div id="shelf">
    <?php foreach ($books as $book) :?>
    
    <div class="itemisotope">
      <div class="box" >
        <div class="postim" >
          <div class="btitle">
            <h2><a href="#" rel="bookmark" title="Permanent Link to "><?php echo $book['Audio']['title']?></a></h2>
          </div>
          <span class="inwriter"><?php echo $book['Audio']['produksi']?></span>
          <a href="#dataebook_<?php echo $book['Audio']['id']?>" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot.$book['Audio']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>
      <div class="box-home">
        <div class="btitle-home">
          <h1><?php echo $book['Audio']['title']?></h1>
          <p><?php echo $book['Audio']['pengarang']?> - <?php echo $book['Audio']['penerbit']?></p><br/>
          <h2>Sinopsis</h2>
          <p><?php echo $book['Audio']['details']?></p>
        </div>
        <div class="list" >
          <a href="#dataebook_<?php echo $book['Audio']['id']?>" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot.$book['Audio']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>
      <div style="display:none"><div id="dataebook_<?php echo $book['Audio']['id']?>" class="datapopup">
        <div class="rack">
         
         <div class="previewinsidepopup">
            <img class="" src="<?php echo $this->webroot?><?php echo $book['Audio']['cover']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </div>
          <div class="datapopuppreview1">
            
            <a class="viewaudio" href="#" data-filetoplay="<?php echo $this->webroot?>files/audios/<?php echo $book['Audio']['file']?>" data-artist="<?php echo $book['Audio']['title']?>" title=""><img src="<?php echo $this->webroot?>images/lihat-btn.png"/></a></br>

            <a href="<?php echo $this->webroot;?>audios/download?filename=<?php echo $book['Audio']['file'];?>&mimetype=<?php echo $book['Audio']['mimetype'];?> " title="#"><img style="margin-top: 32px;margin-left: 141px;" src="<?php echo $this->webroot?>images/download-btn.png"/></a>

            <a class="commentpopup fancybox.ajax" style="margin-top: 34px;margin-left: 141px;" href="<?php echo $this->webroot.'comments/show_comments/'.$controllerActiveId.'/'.$book['Audio']['id'];?>" data-libraryId="#"><img src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a>


                <!--a href="#" title="Booking" class="" ><img src="<?php echo $this->webroot;?>client/images/lihat-btn.png"/></a></br>

              <a href="" title="#" class=""><img style="" src="<?php echo $this->webroot?>client/images/download-btn.png"/></a></br>
          
              <a href="<?php echo $this->webroot.'comments/show_comments/'.$controllerActiveId.'/'.$book['Audio']['id'];?>" title="#" class=""><img style="" src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a></br-->


            <!--a class="viewaudio" href="#" title="#" data-filetoplay="<?php echo $this->webroot?>files/audios/<?php echo $book['Audio']['file']?>" data-artist="<?php echo $book['Audio']['title']?>"><img src="<?php echo $this->webroot?>images/lihat-btn.png"/></a></br>

            <a href="" title="#"><img style="margin-top: 32px;margin-left: 141px;" src="<?php echo $this->webroot?>images/download-btn.png"/>

              <img href="#commentbook" class="ebookpopup" style="margin-top: 0px;margin-left: 141px;" src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a-->

            <h1><?php echo $book['Audio']['title']?></h1>
            <p><?php echo $book['Audio']['produksi']?></p>
            <br/>
            <h2>Sinopsis</h2>
            <p><?php echo $book['Audio']['details']?></p>
            <br/>
          </div>
          <div class="bookdetailpopup2">
            <dl class="desc-detail">    
              <dt class="altrow">Id</dt>
                <dd class="altrow"><?php echo $book['Audio']['id']?>  &nbsp;</dd>
              <dt>Penyanyi</dt>
                <dd><?php echo $book['Audio']['produksi']?> &nbsp;</dd>
              <dt class="altrow">Pengarang</dt>
                <dd class="altrow"><?php echo $book['Audio']['sutradara']?> &nbsp;</dd>
              <dt>Thn Terbit</dt>
                <dd><?php echo $book['Audio']['tahun']?> &nbsp;</dd>
            </dl>

          </div>

          

          <div  class="bookcomment">
            <div style="display:none">
              <div class="datapopup">
                <div id="commentbook" class="commentbook">
                  

                  <div class="postcomment">
                    <div class="previewinsidepopup1">
                      <img class="" src="client/images/no_avatar.png" alt="" style="display: inline-block; left: 0px; top: 0px; ">
                    </div>
                    <div class="datapopuppreview2">
                      <textarea rows="4" cols="50" name="comment" form="usrform" placeholder="Tulis komentar anda disini"></textarea>
                        <input type="submit">
                    </div>
                  </div>
                </div>
            </div>
          </div><!--endcomment-->
          </div>
        </div><!--endrack-->
      </div><!--end display:none:-->
    </div><!--end itemisotope-->
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