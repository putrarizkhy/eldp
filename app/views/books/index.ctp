<div id="home-content" class="clearfix">
  <div id="shelf">
    <?php foreach ($books as $book) :?>
    
    <div class="itemisotope">
      <div class="box" >
        <div class="postim" >
          <div class="btitle">
            <h2><a href="#" rel="bookmark" title="Permanent Link to "><?php echo $book['Book']['title']?></a></h2>
          </div>
          <span class="inwriter"><?php echo $book['Book']['pengarang']?></span>
          <a href="#dataebook_<?php echo $book['Book']['id']?>" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot.$book['Book']['preview']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>
      <div class="box-home">
        <div class="btitle-home">
          <h1><?php echo $book['Book']['title']?></h1>
          <p><?php echo $book['Book']['pengarang']?> - <?php echo $book['Book']['penerbit']?></p><br/>
          <h2>Sinopsis</h2>
          <p><?php echo $book['Book']['sinopsis']?></p>
        </div>
        <div class="list" >
          <a href="#dataebook_<?php echo $book['Book']['id']?>" class="ebookpopup">
            <img class="bookcover" src="<?php echo $this->webroot.$book['Book']['preview']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">
          </a>
        </div>
      </div>
      <div style="display:none"><div id="dataebook_<?php echo $book['Book']['id']?>" class="datapopup">
        <div class="rack">
          <div class="previewinsidepopup">
            <img class="" src="<?php echo $this->webroot.$book['Book']['preview']?>" alt="" style="display: inline-block; left: 0px; top: 0px; width: 150px;">

          </div>

          <div class="datapopuppreview">
            <ul>
              <li class="bookavailable_button">
              <?php $available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);
              $available2 = $book['Book']['bisa_dipinjam'];
              if(($available > 0) && ($available2 == 1)):?>
                <a href="#" title="Booking" class="bookingpopup" data-bookid="<?php echo $book['Book']['id']?>"><img src="<?php echo $this->webroot;?>client/images/booking-btn.png"/></a>
              <?php else:?>
                <span style="padding: 10px;background: rgba(0,0,0,0.5);color: #fff;margin-left: 13px;margin-bottom: 5px;display: inline-block;"> Buku tidak tersedia </span>
              <?php endif;?>
              </li>
              <li><a href="<?php echo $this->webroot.'comments/show_comments/'.$controllerActiveId.'/'.$book['Book']['id'];?>" title="#" class="commentpopup fancybox.ajax"><img style="" src="<?php echo $this->webroot?>client/images/comment-btn.png"/></a></li>
            </ul>

            <h1><?php echo $book['Book']['title']?></h1>
            <p class="pengarang"><?php echo $book['Book']['pengarang']?> - <?php echo $book['Book']['penerbit']?></p>
            <h2>Sinopsis</h2>
            <p><?php echo $book['Book']['sinopsis']?></p>
            <br/>
          </div>

          <div class="bookdetailpopup">
            <div class="bookdetailpopupRow">
              <dl class="desc-detail">    
                <dt class="altrow">Id Buku</dt>
                <dd class="altrow"><?php echo $book['Book']['id_buku']?>  &nbsp;</dd>
                <dt class="altrow">DDC</dt>
                <dd class="altrow"><?php echo $book['Category']['Ddc']['kode_ddc']?> - <?php echo $book['Category']['Ddc']['keterangan']?></dd>
                <dt>Kode ISBN</dt>
                <dd><?php echo $book['Book']['isbn']?> &nbsp;</dd>
                <dt class="altrow">Kategori</dt>
                <dd class="altrow"><?php echo $book['Category']['name']?> &nbsp;</dd>
                <dt>Penerbit</dt>
                <dd><?php echo $book['Book']['penerbit']?> &nbsp;</dd>
                <dt class="altrow">Pengarang</dt>
                <dd class="altrow"><?php echo $book['Book']['pengarang']?> &nbsp;</dd>
                <dt>Thn Terbit</dt>
                <dd><?php echo $book['Book']['tahun']?> &nbsp;</dd>
              </dl>
            </div>
            <div class="bookdetailpopupRow">
              <dl class="desc-detail">
                <dt class="altrow">Jml Buku</dt>
                <dd class="altrow"><?php echo $book['Book']['jml_buku']?> &nbsp;</dd>
                <dt>Buku Tersedia</dt>
                <dd class="bookavailablestatus"><?php $available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);?>
            <?php echo $available;?> &nbsp;</dd>
                <dt class="altrow">Letak Simpan</dt>
                <dd class="altrow"><?php echo $book['Category']['Location']['lokasi']?> &nbsp;<?php echo $book['Category']['Location']['keterangan']?></dd>
                <dt>Dapat Dipinjam</dt>
                <dd>Iya &nbsp;</dd>
                <dt class="altrow">Buku Favorite</dt>
                <dd class="altrow" id="favorite_status">Iya &nbsp;</dd>
                <dt>Jenis Buku</dt>
                <dd>Fisik</dd>
              </dl>
            </div>
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