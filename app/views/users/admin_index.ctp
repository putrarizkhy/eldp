<style type="text/css">
.rb-span-12 h1{
  color: #fff;
}
.loaddefaultcontent{
  display: block;
  line-height: 0;

}
.submit button:hover{
  background: #98c141;
}
.inputdatefinance{
  
  width:250px;
  float: left;
}
.metro .inputdatefinance .date, .date1{
  margin-top: 0;
}
.tags:after{
  clear: both;
  display: none;
}
</style>
<ul id="rb-grid" class="rb-grid clearfix homebutton">
        <!-- Home page Photo Box 1 -->
        <li class="rb-span-1 buku_button_depan">
          <h2 class="judul">Buku</h2>
          <div class="rb-overlay"> 
            <span class="rb-close"><a href="index-2.html"></a></span>
              <!-- Portfolio Content page -->
            <div class="rb-week">
              <div class="container1" id="containerI">
                <div class="main" id="portfolio">
                  <!-- Portfolio Part -->
                  
                  
                  <ul class="rb-grid clearfix overlay-grids" id="slide">
                    
                    <li class="rb-span-12">
                      <h1>Buku</h1>
                      <div class="bottom_line2"></div>
                      <div class="bottom_line3"></div>
                      <div class="preloadersmall">
                        <img class="" src="images/preloader_small.gif"><br/>
                        <span>Plase wait ...</span>
                      </div>
                      <div id="a" class="book imageNavinside">&nbsp;</div>

                        <h3 style="margin-top: 180px;" class="menufirst">
                          <a class="changepage" data-countinside="1" href="<?php echo $this->webroot?>admin/books/listbook" data-scope="bookscope" data-background="#c53437" data-fontcolor="#ffd16e">List Buku</a>
                        </h3>
                        
                        <h3>
                          <a class="changepage" data-countinside="2" href="<?php echo $this->webroot?>admin/books/showfavorite" data-scope="bookscope" data-background="#c53437" data-fontcolor="#ffd16e">Favorite</a>
                        </h3>

                        <h3>
                          <a class="changepage" data-countinside="3" href="<?php echo $this->webroot?>admin/books/find" data-scope="bookscope" data-background="#c53437" data-fontcolor="#ffd16e">Pencarian</a>
                        </h3>

                        <h3>
                          <a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/books/printall">Cetak Daftar Buku</a>
                        </h3>

                        <!--<h3>
                          <a class="changepage" data-countinside="4" href="<?php echo $this->webroot?>admin/books/find" data-scope="bookscope" data-background="#c53437" data-fontcolor="#ffd16e">Cetak Barcode Buku</a>
                        </h3>-->

                        
                      <div class="bottom_line4"></div>
                    </li>
                    
                    <li class="title-menu keteranganatas areatochangebackground">
                      
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              
                              <div class="tohide">
                                
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Buku<br/></div>
                                  <div class="tags">Semua buku yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="favoritebukucontent countinside_2_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Buku Favorite<br/></div>
                                  <div class="tags">Semua buku yang terdaftar sebagai Favorite</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>


                                <div class="favoritebukucontent countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian Buku<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('Book',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[Book][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchbooksubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>
                                  
                                </div>

                                <div class="favoritebukucontent countinside_4_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Cetak List Buku<br/></div>
                                  <div class="tags">Mencetak list buku yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                              </div>
                            </div>
                        </div>
                      </div>
                    </li>

                    <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/books/add" data-title="Tambah Buku" data-width="900px" data-height="375px">
                        <div class="centercontainer">
                            <div class="listbukucontent">
                              <br/>
                              <i class="icon-book iconlarge iconapp"></i><br/><br/>
                              <span>Tambah List Buku</span>
                            </div>

                        </div>
                    </li>

                    <li class="bookscope contentareatoload areatochangebackground">
                    
                  

                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="bookscope" class="view1 view-fifth1 contenareaajax">
                        <!--load book-->
                      </div>

                    </li>

                  </ul>

                </div>
                <div class="container_bottom"></div>
              </div>
            </div>
          </div>
          <!-- Portfolio icon -->
          <div class="books loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/books/listbook" data-scope="bookscope" data-background="#c53437" data-fontcolor="#ffd16e">&nbsp;</div>
          <!-- // Portfolio icon -->
        </li>
      <!-- // Home page Photo Box 1 -->
                 
      <!-- About page box2 -->
        <li>
          <h2 class="judul">Foto</h2>
          <div class="rb-overlay"> 
            <span class="rb-close"><a href="#"></a></span>
              <!-- About Content page -->
            <div class="rb-week">
                <!-- container -->
              <div class="container" id="containerI">
                <div class="main" id="resume7">
                  <!-- About Part -->
                  
                  <ul class="rb-grid clearfix">
                    <li class="rb-span-12">
                      <h1>Foto</h1>
                      <div class="bottom_line2"></div>
                      <div class="bottom_line3"></div>       
                      <div id="a" class="search">&nbsp;</div>
                      

                      <h3 style="margin-top: 180px;" class="menufirst"><a class="changepage listbukuactive" data-countinside="1" href="<?php echo $this->webroot;?>admin/photos/listphotos" data-scope="photoscope" data-background="#129aa1" data-fontcolor="#094483">List Foto</a></h3>

                      <h3>
                      <a class="changepage" data-countinside="2" href="<?php echo $this->webroot;?>admin/photos/showfavorite" data-scope="photoscope" data-background="#129aa1" data-fontcolor="#094483">Favorite</a>
                      </h3>

                      <h3>
                      <a class="changepage" data-countinside="3" href="<?php echo $this->webroot;?>admin/photos/find" data-scope="photoscope" data-background="#129aa1" data-fontcolor="#094483">Pencarian</a>
                      </h3>

                      <h3>
                      <a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/photos/printall">Cetak Daftar Foto</a>
                      </h3>

                      <div class="bottom_line4"></div>
                    </li>

                    <li class="title-menu keteranganatas areatochangebackground">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="tohide">
                            
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Foto<br/></div>
                                  <div class="tags">Semua foto yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="favoritebukucontent countinside_2_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Foto Favorite<br/></div>
                                  <div class="tags">Semua foto yang terdaftar sebagai Favorite</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="favoritebukucontent countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian Foto<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('Photo',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[Photo][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchphotosubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>  
                                </div>

                                <div class="favoritebukucontent countinside_4_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Cetak Daftar Foto<br/></div>
                                  <div class="tags">Mencetak list foto yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                              </div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/photos/add" data-title="Tambah Photos" data-width="900px" data-height="375px">
                  
                    <div class="centercontainer">
                      
                      <div class="tohide">

                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-camera iconlarge9 iconapp"></i><br/><br/>
                          <span>Tambah Foto</span>
                        </div>

                        <div class="favoritebukucontent" style="display:none;">
                          <br/>
                          <i class="icon-plus-2 iconlarge iconapp"></i><br/><br/>
                          <span>Tambah List Audio Favorite</span>
                        </div>

                      </div>
                    </div>
                </li>
                    <li class="photoscope contentareatoload areatochangebackground">
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>

                      <div id="photoscope" class="view1 view-fifth1 contenareaajax">
                        
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="container_bottom"></div>
              </div>
                <!-- // container -->
            </div>
            <!-- // About Content page -->
          </div>
          <!-- About Icon -->

          <div class="search loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/photos/listphotos" data-scope="photoscope" data-background="#129aa1" data-fontcolor="#094483">&nbsp;</div>

          
          <!-- // About Icon -->
        </li>

        <!-- // About page box2 -->                    

        <!-- Porfolio page box3 -->
        <li class="livereport">
          <div class="tile live" data-role="live-tile" data-effect="slideLeftRight" id="livereport-tile">
            <div class="tile-content">
              <h1>
                <span id="livereport_booking">
                <?php          
               echo $booking; 
               ?></span>
             </br><small> buku</small></br></h1>
              <span class="ket" >Yang sedang di booking</span>
            </div>
            <div class="tile-content">
              <h1>
                <span id="livereport_back">
                <?php
                  echo $back;
                 ?></span>
              </br><small> buku</small></br></h1>
              <span class="ket">Yang harus dikembalikan hari ini</span>
            </div>
            <div class="tile-content">
              <h1>
                <span id="livereport_late">
                <?php
                  echo $late;
                 ?></span>
              </br><small> buku</small></br></h1>
              <span class="ket">Terlambat dikembalikan</span>
            </div>
          </div>
        </li>
        <!-- // Portfolio page box3 -->

        <!-- Resume page box4 -->
        <li>
          <h2>Laporan</h2>
          <div class="rb-overlay"> 
            <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Resume Content page -->
            <div class="rb-week">
            <!-- container -->
              <div class="container" id="containerI">
                <div class="main" id="resume">
                  <!-- Resume Part -->
                  
                  <!-- // Resume Part -->     
                  <ul class="rb-grid clearfix overlay-grids">
                    <!-- Resume page box1 -->
                    <li class="rb-span-12">
                      <h1>Laporan</h1>
                      <div class="bottom_line2"></div>
                      <div class="bottom_line3"></div>       
                      <div id="a" class="report">&nbsp;</div>

                        <h3 style="margin-top: 180px;" class="menufirst">
                          <a class="changepage laporanchange" data-countinside="1" href="<?php echo $this->webroot?>admin/rents/chart" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e" data-actionactive="<?php echo $this->webroot;?>admin/rents/chart" data-yeartoprocees="<?php echo $cur_year;?>">Peminjaman</a>
                        </h3>
                        
                        

                        <h3>

                           <a class="changepage laporanchange" data-countinside="2" href="<?php echo $this->webroot?>admin/books/chart" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e" data-fontcolor="#41332e" data-actionactive="<?php echo $this->webroot;?>admin/books/chart" data-yeartoprocees="<?php echo $cur_year;?>">Buku Baru</a>

                          
                        </h3>


                        <h3>

                           <a class="changepage laporanchange" data-countinside="3" href="<?php echo $this->webroot?>admin/rents/chart_loose" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e" data-fontcolor="#41332e" data-actionactive="<?php echo $this->webroot;?>admin/rents/chart_loose" data-yeartoprocees="<?php echo $cur_year;?>">Buku Rusak</a>

                          
                        </h3>


                        
                      <div class="bottom_line4"></div>
                    </li>
                    <!-- // Resume page box1 -->
                    <!-- Resume page box2 -->
                    <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="tohide">
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Laporan Peminjaman<br/></div>
                                  <div class="tags">Total Data peminjaman per tahun</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_2_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Laporan Buku Baru<br/></div>
                                  <div class="tags">Total Data buku baru per tahun</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>


                                <div class="listbukucontent countinside_3_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Laporan Buku Rusak<br/></div>
                                  <div class="tags">Total Data buku rusak per tahun</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                              </div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        <div class="button-dropdown">
                        <span style="margin-top:30px;display:block;margin-bottom:10px;">Pilih tahun yang lain:</span>
                        
                            <button class="dropdown-toggle large bg-teal fg-white button_dropdown_changeyear"><?php echo $cur_year?></button>
                            <ul class="dropdown-menu place-right laporandropdown dropdown_changeyear" data-role="dropdown">
                              
                                <li><a class="laporan_changeyear" id="url_current_year_minus_4" href="<?php echo $base_url.($cur_year-4); ?>" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e"><?php echo $cur_year-4;?></a></li>
                                <li><a class="laporan_changeyear" id="url_current_year_minus_3" href="<?php echo $base_url.($cur_year-3); ?>" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e"><?php echo $cur_year-3;?></a></li>
                                
                                <li><a class="laporan_changeyear" id="url_current_year_minus_2" href="<?php echo $base_url.($cur_year-2); ?>" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e"><?php echo $cur_year-2;?></a></li>
                                <li><a class="laporan_changeyear" id="url_current_year_minus_1" href="<?php echo $base_url.($cur_year-1); ?>" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e"><?php echo $cur_year-1;?></a></li>

                                <li><a class="laporan_changeyear" id="url_current_year" href="<?php echo $base_url.($cur_year); ?>" data-scope="laporanscope" data-background="#109079" data-fontcolor="#41332e"><?php echo $cur_year;?></a></li>
                                
                            </ul>
                        </div>
                    </li>

                    <li class="laporanscope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="laporanscope" class="view1 view-fifth1 contenareaajax">
                        <!--load ddc-->
                      </div>

                    </li>
                     
                  </ul>
                </div>
                <div class="container_bottom"></div>
              </div>
              <!-- // Container end -->
            </div>
            <!-- Resume content page -->
          </div>
          <!-- Resume icon -->
          <div class="report loaddefaultcontent laporanchange" data-href="<?php echo $this->webroot;?>admin/rents/chart/" data-scope="laporanscope" data-actionactive="<?php echo $this->webroot;?>admin/rents/chart" data-yeartoprocees="<?php echo $cur_year;?>" data-background="#109079" data-fontcolor="#41332e">&nbsp;</div>
          
        <!-- // Resume icon -->
        </li>

        <!-- Download vcard page box5 -->
        <li>
          <h2>Kode DDC</h2>
          <div class="rb-overlay"> 
            <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Resume Content page -->
            <div class="rb-week">
            <!-- container -->
              <div class="container" id="containerI">
                <div class="main" id="resume1">
                  
                  

                  <ul class="rb-grid clearfix overlay-grids">
                      <!-- Resume page box1 -->
                    <li class="rb-span-12">
                      <h1>Kode DDC</h1>
                      <div class="bottom_line2"></div>
                      <div class="bottom_line3"></div>            
                      <div id="a" class="codex">&nbsp;</div>

                      <h3 style="margin-top: 180px;" class="menufirst">
                        <a class="changepage" data-countinside="1" href="<?php echo $this->webroot?>admin/ddcs/listddc" data-scope="ddcscope" data-background="#9e45a3" data-fontcolor="#90e4d3">List Kode DDC</a>
                      </h3>
                      
                      

                      <h3>
                        <a class="gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/ddcs/add" data-title="Tambah Ddc" data-width="900px" data-height="375px" style="color:#fff;">Tambah Kode DDC</a>
                      </h3>

                      <div class="bottom_line4"></div>
                    </li>
                      <!-- // Resume page box1 -->
                      <!-- Resume page box2 -->
                    <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Kode DDC<br/></div>
                              <div class="tags">Kode DDC yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/ddcs/add" data-title="Tambah DDC" data-width="900px" data-height="375px">
                        <div class="listbukucontent">
                          <br/>
                          <i class="icon-code iconlarge1 iconapp"></i><br/><br/>
                          <span>Tambah Kode DDC</span>
                        </div>
                    </li>
                    <li class="ddcscope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="ddcscope" class="view1 view-fifth1 contenareaajax">
                        <!--load ddc-->
                      </div>

                    </li>
                      <!-- // Resume page box9 -->          
                  </ul>
                </div>
                <div class="container_bottom"></div>
              </div>
              <!-- // Container end -->
            </div>
            <!-- Resume content page -->
          </div>
          <!-- Resume icon -->
          
          <div class="codex loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/ddcs/listddc" data-scope="ddcscope" data-background="#9e45a3" data-fontcolor="#90e4d3">&nbsp;</div>

          
        </li>
        <!-- // Resume icon -->  

        <!-- Social page box6 -->
        <li class="rb-span-2">
          <h2>Kategori</h2>
        <div class="rb-overlay"> 
        <span class="rb-close"><a href="index-2.html"></a></span>
        <!-- Resume Content page -->
        <div class="rb-week">
        <!-- container -->
          <div class="container" id="containerI">
            <div class="main" id="resume2">
              
              

              <ul class="rb-grid clearfix overlay-grids">
                  <!-- Resume page box1 -->
                <li class="rb-span-12">
                  <h1>Kategori</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>            
                  <div id="a" class="categories">&nbsp;</div>


                  <h3 style="margin-top: 180px;" class="menufirst"><a class="changepage" data-countinside="1" href="<?php echo $this->webroot;?>admin/categories/listcategories/1" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_book_table">List Kategori Buku</a></h3>

                  <h3><a class="changepage" data-countinside="2" href="<?php echo $this->webroot;?>admin/categories/listcategories/2" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_ebook_table">List Kategori Ebook</a></h3>

                  <h3><a class="changepage" data-countinside="3" href="<?php echo $this->webroot;?>admin/categories/listcategories/3" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_video_table">List Kategori Video</a></h3>

                  <h3><a class="changepage" data-countinside="4" href="<?php echo $this->webroot;?>admin/categories/listcategories/4" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_audio_table">List Kategori Audio</a></h3>

                  <h3><a class="changepage" data-countinside="5" href="<?php echo $this->webroot;?>admin/categories/listcategories/5" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_photo_table">List Kategori Photo</a></h3>
                  
                  <h3><a class="changepage" data-countinside="6" href="<?php echo $this->webroot;?>admin/categories/listcategories/6" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_subject_table">List Kategori CD Pembelajaran</a></h3>

                  <h3><a class="gotolink" data-countinside="" data-url="<?php echo $this->webroot?>admin/categories/add" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-width="900px" data-height="375px" style="color:#fff">Tambah Kategori</a></h3>
                  <div class="bottom_line4"></div>
                </li>
                  <!-- // Resume page box1 -->
                  <!-- Resume page box2 -->
                <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">

                          <div class="tohide">
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori Buku<br/></div>
                                  <div class="tags">Kategori untuk Buku</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_2_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori Ebook<br/></div>
                                  <div class="tags">Kategori untuk Ebook</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_3_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori Video<br/></div>
                                  <div class="tags">Kategori untuk Video</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_4_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori Audio<br/></div>
                                  <div class="tags">Kategori untuk Audio</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_5_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori Photo<br/></div>
                                  <div class="tags">Kategori untuk Photo</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_6_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Kategori CD Pembelajaran<br/></div>
                                  <div class="tags">Kategori untuk CD Pembelajaran</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>
                          </div>

                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink" data-url="<?php echo $this->webroot;?>admin/categories/add" data-title="Tambah Kategori" data-width="900px" data-height="375px">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-list iconlarge2 iconapp"></i><br/><br/>
                          <span>Tambah Kategori</span>
                        </div>
                </li>

                <li class="categoryscope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="categoryscope" class="view1 view-fifth1 contenareaajax">
                        <!--load ddc-->
                      </div>

                    </li>

                  <!-- // Resume page box9 -->          
              </ul>
            </div>
            <div class="container_bottom"></div>
          </div>
          <!-- // Container end -->
        </div>
        <!-- Resume content page -->
      </div>
      <!-- Resume icon -->

      <div class="categories loaddefaultcontent " data-href="<?php echo $this->webroot;?>admin/categories/listcategories/1" data-scope="categoryscope" data-background="#C68000" data-fontcolor="#D3F54D" data-table="category_book_table">&nbsp;</div>


      
    </li>

      <li>
        <h2 class="judul1">Lokasi Buku</h2>
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Services Content page -->
          <div class="rb-week">
              <!-- container -->
            <div class="container" id="containerI">
              <div class="main" id="services">
               <!-- Services header -->
                
                <!-- // Services header -->    
                <ul class="rb-grid clearfix overlay-grids">
                    <!-- Services page box1 -->
                  <li class="rb-span-12">
                    <h1>Lokasi Buku</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>
                    <div id="a" class="rack">&nbsp;</div>

                      <h3 style="margin-top: 180px;"class="menufirst"><a class="changepage" data-countinside="1" href="<?php echo $this->webroot;?>admin/locations/listlocations" data-scope="locationscope" data-background="#CD3355" data-fontcolor="#FDA2D9">List Lokasi Buku</a></h3>


                      <h3><a class="gotolink" data-countinside="2" data-url="<?php echo $this->webroot;?>admin/locations/add" data-scope="locationscope" data-background="#CD3355" data-fontcolor="#FDA2D9" data-title="Tambah Lokasi Buku" data-width="500px" data-height="375px" style="color:#fff">Tambah Lokasi Buku</a></h3>
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Services page box1 -->
                    <!-- Services page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Lokasi Buku<br/></div>
                              <div class="tags">Daftar letak buku </div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas gotolink" data-url="<?php echo $this->webroot;?>admin/locations/add" data-title="Tambah Lokasi Buku" data-width="500px" data-height="375px">

                        <div class="listbukucontent">
                              <br/>
                              <i class="icon-cabinet iconlarge8 iconapp"></i><br/><br/>
                              <span>Tambah Lokasi Buku</span>
                            </div>
                    </li>

                    <li class="locationscope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="locationscope" class="view1 view-fifth1 contenareaajax">
                        <!--load ddc-->
                      </div>

                    </li>  
                    <!-- // Services page box9 -->
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- // Services content page -->
        </div>
        <!-- Services icon -->

        <div class="rack loaddefaultcontent " data-href="<?php echo $this->webroot;?>admin/locations/listlocations" data-scope="locationscope" data-background="#CD3355" data-fontcolor="#FDA2D9">&nbsp;</div>
        
        <!-- // Services icon -->
      </li>
      <!-- // Services page box7 -->
   
      <!-- Twitter page box8 -->
      <li class="finance1">
        <h2 class="judul1">Keuangan</h2>
        <!-- Social network -->
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Resume Content page -->
            <div class="rb-week">
              <!-- container -->
              <div class="container" id="containerI">
                <div class="main" id="resume3">
        <!-- Resume Part -->
                  
        <!-- // Resume Part -->         
                  <ul class="rb-grid clearfix overlay-grids">
                    <!-- Resume page box1 -->
                    <li class="rb-span-12">
                      <h1>Keuangan</h1>
                      <div class="bottom_line2"></div>
                      <div class="bottom_line3"></div>            
                      <div id="a" class="finance">&nbsp;</div>
                      
                      <h3 style="margin-top: 180px;"><a class="changepage" data-countinside="1" href="<?php echo $this->webroot;?>admin/rents/financelist" data-scope="financescope" data-background="#007599" data-fontcolor="#D3F54D" data-table="">Laporan Keuangan</a></h3>


                      <h3><a class="changepage" data-countinside="2" href="<?php echo $this->webroot;?>admin/rents/financelist2" data-scope="financescope" data-background="#007599" data-fontcolor="#D3F54D" data-table="">Pencarian Laporan Keuangan</a></h3>

                      <h3></h3>
                      <div class="bottom_line4"></div>
                    </li>
                    <!-- // Resume page box1 -->
                    <!-- Resume page box2 -->
                    <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">

                              <div class="tohide">
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Keuangan<br/></div>
                                  <div class="tags">Dibawah ini list laporan keuangan pada bulan ini</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="listbukucontent countinside_2_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian List Keuangan<br/></div>
                                  

                                  <div class="tags">

                                    <?php echo $form->create('Rent',array('action'=>'admin_financesearch','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>

                                    <div class="inputdatefinance">
                                    <?php
                                      echo $form->input('tgl_awal',array('type'=>'date','label'=>'Tanggal awal'));
                                    ?>
                                    </div>

                                    <div class="inputdatefinance">
                                    <?php
                                      echo $form->input('tgl_akhir',array('type'=>'date','label'=>'Tanggal akhir'));
                                    ?>
                                    
                                    </div>
                                    <button id="dofindfinance" type="submit" style="float:left;" class="default large">Submit</button>
                                    <?php echo $form->end();?>
                                  </div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                              </div>
                              
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        <div class="listbukucontent">
                              <br/>
                              
                            </div>
                    </li>
                    
                    <li class="financescope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="financescope" class="view1 view-fifth1 contenareaajax">
                        <!--load ddc-->
                      </div>

                    </li>  
                    <!-- // Resume page box9 -->          
                  </ul>
                </div>
                <div class="container_bottom"></div>
              </div>
              <!-- // Container end -->
            </div>

          <!-- Resume content page -->
        </div>
        <!-- Resume icon -->

        <div class="finance loaddefaultcontent " data-href="<?php echo $this->webroot;?>admin/rents/financelist" data-scope="financescope" data-background="#007599" data-fontcolor="#D3F54D">&nbsp;</div>

        
        <!-- // Social network -->
      </li>
      <!-- // Twitter page box8 -->
   
      <!-- Contact page box9 -->
      <li>
        <h2 class="judul1">Member</h2>
    <div class="rb-overlay"> 
      <span class="rb-close"><a href="index-2.html"></a></span>
        <!-- Contact Content page -->
      <div class="rb-week">
          <!-- container -->
        <div class="container" id="containerI">
          <div class="main" id="contact">
           <!-- Contact header -->
            
            <!-- // Contact header -->     
            <ul class="rb-grid clearfix">
                <!-- Contact page box1 -->
              <li class="rb-span-12">
                <h1>Member</h1>
                <div class="bottom_line2"></div>
                <div class="bottom_line3"></div>       
                <div id="a" class="member">&nbsp;</div>

                <h3 style="margin-top: 180px;" class="menufirst"><a class="changepage listbukuactive" data-countinside="1" href="<?php echo $this->webroot;?>admin/users/listmembers" data-scope="memberscope" data-background="#99C342" data-fontcolor="#3D861B">List Member</a></h3>
                                
                <!--h3><a data-table="usertable"-->

                <h3><a class="gotolink" data-countinside="2" data-url="<?php echo $this->webroot;?>admin/users/add" data-scope="memberscope" data-background="#99C342" data-fontcolor="#3D861B" data-title="Registrasi Member" data-width="800px" data-height="375px" style="color:#fff">Registrasi Member</a></h3>

                <h3><a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/users/printall">Cetak Daftar Member</a></h3>
                
                <h3><a href="">Cetak Barcode Member</a></h3>

                <h3>
                  <a class="changepage" data-countinside="3" href="<?php echo $this->webroot?>admin/users/find" data-scope="memberscope" data-background="#99C342" data-fontcolor="#3D861B">Pencarian</a>
                </h3>

                <div class="bottom_line4"></div>
              </li>
                <!-- // Contact page box1 -->
                <!-- Contact page box2 -->
              <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="tohide">

                            <div class="listmembers countinside_1_container">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Member<br/></div>
                              <div class="tags">Semua member yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="listmembers countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian Member<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('User',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[User][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchusersubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>
                                  
                                </div>

                          </div>
                        </div>
                    </div>
                  </div>
                </li>

                <!--li  data-table="usertable"-->

                <li class="keteranganatas gotolink" data-url="<?php echo $this->webroot;?>admin/users/add" data-title="Registrasi Member" data-width="800px" data-height="375px">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-user-2 iconlarge4 iconapp"></i><br/><br/>
                          <span>Registrasi Member</span>
                        </div>
                </li>

                    <li class="memberscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                  
                  <div id="memberscope" class="view1 view-fifth1 contenareaajax">

                  </div>
                </li>
            </ul>
          </div>
          <div class="container_bottom"></div>
        </div>
          <!-- // Container end -->
      </div>
      <!-- // Contact content page -->
    </div>
    <!-- Contact icon -->

    <div class="member loaddefaultcontent " data-href="<?php echo $this->webroot;?>admin/users/listmembers" data-scope="memberscope" data-background="#99C342" data-fontcolor="#3D861B">&nbsp;</div>
    <!-- // Contact icon -->
  </li>

    <li>
        <h2 class="judul1">Pengumuman</h2>
    <!-- Social network -->
    <div class="rb-overlay"> 
      <span class="rb-close"><a href="index-2.html"></a></span>
        <!-- Resume Content page -->
        <div class="rb-week">
          <!-- container -->
          <div class="container" id="containerI">
            <div class="main" id="resume">
    <!-- Resume Part -->
              
    <!-- // Resume Part -->         
              <ul class="rb-grid clearfix overlay-grids">
                <!-- Resume page box1 -->
                <li class="rb-span-12">
                  <h1>Pengumuman</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>            
                  <div id="a" class="anouncement">&nbsp;</div>
                  
                  

                  <h3 style="margin-top: 180px;" class="menufirst"><a class="changepage listbukuactive" data-countinside="1" href="<?php echo $this->webroot;?>admin/notifications/listnotifications" data-scope="notificationscope" data-background="#109079" data-fontcolor="#537E40">List Pengumuman</a></h3>
                  
                  <!--a data-table="notificationtable"-->
                  <h3>
                    <a class="gotolink" data-countinside="2"  data-url="<?php echo $this->webroot;?>admin/notifications/add" data-scope="notificationscope" data-background="#109079" data-fontcolor="#537E40" data-width="500px" data-height="375px" data-title="Tambah Pengumuman" style="color:#fff">Tambah Pengumuman</a>
                  </h3>
                  
                  <div class="bottom_line4"></div>
                </li>
                <!-- // Resume page box1 -->
                <!-- Resume page box2 -->
                <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">List Pengumuman<br/></div>
                          <div class="tags">Semua pengumuman yang terdaftar</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>

                <li class="keteranganatas gotolink" data-table="notificationtable" data-url="<?php echo $this->webroot;?>admin/notifications/add" data-width="500px" data-height="375px" data-title="Tambah Pengumuman">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-comments-2 iconlarge6 iconapp"></i><br/><br/>
                          <span>Tambah Pengumuman</span>
                    </div>
                </li>

                <li class="notificationscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                  
                  <div id="notificationscope" class="view1 view-fifth1 contenareaajax">

                  </div>

                </li>  
                <!-- // Resume page box9 -->          
              </ul>
            </div>
            <div class="container_bottom"></div>
          </div>
          <!-- // Container end -->
        </div>

      <!-- Resume content page -->
    </div>
    <!-- Resume icon -->
    <div class="anouncement loaddefaultcontent " data-href="<?php echo $this->webroot;?>admin/notifications/listnotifications" data-scope="notificationscope" data-background="#109079" data-fontcolor="#537E40">&nbsp;</div>
    <!-- // Social network -->
  </li>
      <!-- // Resume page box4 -->
    
     <!-- Download vcard page box5 -->
      <li> 
        <h2 class="judul1">Ebook</h2>
      <div class="rb-overlay"> 
        <span class="rb-close"><a href="index-2.html"></a></span>
          <!-- Portfolio Content page -->
        <div class="rb-week">
          <div class="container1" id="containerI">
            <div class="main" id="resume6">
              <!-- Portfolio Part -->
              
              
              <ul class="rb-grid clearfix overlay-grids" id="slide">
                
                <li class="rb-span-12">
                  <h1>Ebook</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>
                  <div class="preloadersmall">
                    <img class="" src="images/preloader_small.gif"><br/>
                    <span>Plase wait ...</span>
                  </div>
                  <div id="a" class="pusdig imageNavinside">&nbsp;</div>
                    
                    <h3 style="margin-top: 180px;" class="menufirst">
                      <a class="changepage" data-countinside="1" href="<?php echo $this->webroot?>admin/ebooks/listebook" data-scope="ebookscope" data-background="#77234E" data-fontcolor="#c4ff00">List Ebook</a>
                    </h3>
                    
                    <h3>
                      <a class="changepage" data-countinside="2" href="<?php echo $this->webroot?>admin/ebooks/showfavorite" data-scope="ebookscope" data-background="#77234E" data-fontcolor="#c4ff00">Favorite</a>
                    </h3>


                    <h3>
                      <a class="changepage" data-countinside="3" href="<?php echo $this->webroot?>ebooks/admin_find" data-scope="ebookscope" data-background="#77234E" data-fontcolor="#c4ff00">Pencarian</a>
                    </h3>

                    <h3>
                      <a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/ebooks/printall">Cetak Daftar Ebook</a>
                    </h3>
                    
                  <div class="bottom_line4"></div>
                </li>
                  
                <li class="title-menu keteranganatas areatochangebackground">
                  
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          
                          <div class="tohide">
                            
                            <div class="listbukucontent countinside_1_container">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Ebook<br/></div>
                              <div class="tags">Semua Ebook yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="favoritebukucontent countinside_2_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Ebook Favorite<br/></div>
                              <div class="tags">Semua Ebook yang terdaftar sebagai Favorite</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="favoritebukucontent countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian E-Book<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('Ebook',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[Ebook][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchebooksubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>                                  
                            </div>

                            <div class="favoritebukucontent countinside_4_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Cetak Daftar Ebook<br/></div>
                              <div class="tags">Mencetak list buku yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                          </div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/ebooks/add" data-title="Tambah Ebooks" data-width="900px" data-height="375px">
                    
                    <div class="centercontainer">
                      
                      <div class="tohide">

                        <div class="listbukucontent">
                          <br/>
                          <i class="icon-mobile-2 iconlarge1 iconapp"></i><br/><br/>
                          <span>Tambah List Ebooks</span>
                        </div>

                        <div class="favoritebukucontent" style="display:none;">
                          <br/>
                          <i class="icon-plus-2 iconlarge iconapp"></i><br/><br/>
                          <span>Tambah List Ebook Favorite</span>
                        </div>

                      </div>
                    </div>
                </li>

                <li class="ebookscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                  
                  <div id="ebookscope" class="view1 view-fifth1 contenareaajax">
                    <!--load ebook-->
                  </div>

                </li>
              </ul>
            </div>
            <div class="container_bottom"></div>
          </div>
        </div>
      </div>
      <!-- Portfolio icon -->
      <div class="pusdig loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/ebooks/listebook" data-scope="ebookscope" data-background="#77234E" data-fontcolor="#c4ff00">&nbsp;</div>
      <!-- // Portfolio icon -->
    </li>
      
      <!-- // Download vcard page box5 -->    

      <!-- Social page box6 -->
      <li class="rb-span-2">
        <h2>Pustaka Multimedia</h2>
        <!-- Social network -->
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Resume Content page -->
          <div class="rb-week">
              <!-- container -->
            <div class="container" id="containerI">
              <div class="main" id="resume4">
        <!-- Resume Part -->
                
        <!-- // Resume Part -->         
                <ul class="rb-grid clearfix overlay-grids">
                    <!-- Resume page box1 -->
                  <li class="rb-span-12">
                    <h1>Pustaka Multimedia</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>            
                    <div id="a" class="pusmul">&nbsp;</div>
                    <h3 style="margin-top: 180px;"><a href="">List Pustaka Multimedia</a></h3>
                    <h3><a href="">Tambah Pustaka Multimedia</a></h3>
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Resume page box1 -->
                    <!-- Resume page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Pustaka Multimedia<br/></div>
                              <div class="tags">Semua Pustaka Multimedia yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        <div class="listbukucontent">
                              <br/>
                              <i class="icon-monitor iconlarge7 iconapp"></i><br/><br/>
                              <span>Tambah Pustaka Multimedia</span>
                            </div>
                    </li>
                    <li class="contentareatoload">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                          <div class="actionss">
                           <table class="table hovered" cellpadding="0" cellspacing="0">
                              <thead>
                                <tr class="title_table">
                                  <th><a href="/elips/locations/index/page:1/sort:id/direction:asc">No</a></th>
                                  <th><a href="/elips/locations/index/page:1/sort:lokasi/direction:asc">Cover</a></th>
                                  <th><a href="/elips/locations/index/page:1/sort:lokasi/direction:asc">Judul</a></th>
                                  <th><a href="/elips/locations/index/page:1/sort:keterangan/direction:asc">Kategori</a></th>
                                  <th><a href="/elips/locations/index/page:1/sort:created/direction:asc">Tahun</a></th>
                                  <th><a href="/elips/locations/index/page:1/sort:modified/direction:asc">Pengarang</a></th>
                                  <th class="actions">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="altrow ">
                                  <td>1</td>
                                  <td><img src="images/bg08.jpg"></td>
                                  <td>Bumi</td>
                                  <td>Pengetahuan Alam</td>
                                  <td>2011</td>
                                  <td>Jokowi</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <tr class="altrow ">
                                  <td>2</td>
                                  <td><img src="images/bg08.jpg"></td>
                                  <td>Laut</td>
                                  <td>Pengetahuan Alam</td>
                                  <td>2011</td>
                                  <td>Jokowi</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>

                                 <tr class="altrow ">
                                  <td>3</td>
                                  <td><img src="images/bg08.jpg"></td>
                                  <td>Bumi</td>
                                  <td>Pengetahuan Alam</td>
                                  <td>2011</td>
                                  <td>Jokowi</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <tr class="altrow ">
                                  <td>4</td>
                                  <td><img src="images/bg08.jpg"></td>
                                  <td>Laut</td>
                                  <td>Pengetahuan Alam</td>
                                  <td>2011</td>
                                  <td>Jokowi</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            <div class="bottom_line1">&nbsp;</div>
                          </div>
                        </div>
                      </div>
                    </li>  
                    <!-- // Resume page box9 -->          
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- Resume content page -->
        </div>
        <!-- Resume icon -->
        <div class="pusmul">&nbsp;</div>
        <!-- // Social network -->
      </li>


      <li class="rb-span-2">
        <h2>Gallery Video Pendidikan</h2>
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Resume Content page -->
          <div class="rb-week">
              <!-- container -->
            <div class="container" id="containerI">
              <div class="main" id="resume3">
        <!-- Resume Part -->
                
        <!-- // Resume Part -->         
                <ul class="rb-grid clearfix overlay-grids">
                    <!-- Resume page box1 -->
                  <li class="rb-span-12">
                    <h1>Gallery Video Pendidikan</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>            
                    <div id="a" class="galvid">&nbsp;</div>

                    <h3 style="margin-top: 180px;" class="menufirst">
                      <a class="changepage" data-countinside="1" href="<?php echo $this->webroot?>admin/videos/listvideo" data-scope="videoscope" data-background="#1682a9" data-fontcolor="#4d187e">List Video</a>
                    </h3>
                    
                    <h3>
                      <a class="changepage" data-countinside="2" href="<?php echo $this->webroot?>admin/videos/showfavorite" data-scope="videoscope" data-background="#1682a9" data-fontcolor="#4d187e">Favorite</a>
                    </h3>

                    <h3>
                      <a class="changepage" data-countinside="3" href="<?php echo $this->webroot?>admin/videos/find" data-scope="videoscope" data-background="#1682a9" data-fontcolor="#4d187e">Pencarian</a>
                    </h3>

                    <h3>
                      <a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/videos/printall">Cetak Daftar Video</a>
                    </h3>

                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Resume page box1 -->
                    <!-- Resume page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">

                            <div class="actions">
                              <div class="tohide">
                                <div class="listbukucontent countinside_1_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Video Pendidikan<br/></div>
                                  <div class="tags">Semua Video yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="favoritebukucontent countinside_2_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">List Video Favorite<br/></div>
                                  <div class="tags">Semua Video yang terdaftar sebagai Favorite</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                                <div class="favoritebukucontent countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian Video<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('Video',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[Video][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchvideosubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>                                  
                                </div>

                                <div class="favoritebukucontent countinside_4_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Cetak Daftar Video<br/></div>
                                  <div class="tags">Mencetak list Video yang terdaftar</div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                              </div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/videos/add" data-title="Tambah Video" data-width="900px" data-height="375px">
                        <div class="listbukucontent">
                          <br/>
                          <i class="icon-film iconlarge6 iconapp"></i><br/><br/>
                          <span>Tambah Video</span>
                        </div>
                    </li>
                    <li class="videoscope contentareatoload areatochangebackground">
                    
                  
                      <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                      
                      <div id="videoscope" class="view1 view-fifth1 contenareaajax">
                        <!--load ebook-->
                      </div>

                    </li>
                    
                    <!-- // Resume page box9 -->          
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- Resume content page -->
        </div>
        <!-- Resume icon -->
        <div class="galvid loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/videos/listvideo" data-scope="videoscope" data-background="#1682a9" data-fontcolor="#4d187e">&nbsp;</div>
        <!-- // Social network -->
      </li>


      <li>
        <h2>Ebook CR</h2>
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Services Content page -->
            <div class="rb-week">
              <!-- container -->
              <div class="container" id="containerI">
                <div class="main" id="services">
               <!-- Services header -->
                
                <!-- // Services header -->       
                <ul class="rb-grid clearfix overlay-grids">
                    <!-- Services page box1 -->
                  <li class="rb-span-12">
                    <h1>Ebook Creator</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>
                    <div id="a" class="creator">&nbsp;</div>
                    <h3 style="margin-top: 180px;"><a href="">Buat Ebook</a></h3>
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Services page box1 -->
                    <!-- Services page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Buat Ebook<br/></div>
                              <div class="tags">Membuat Ebook baru</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        <div class="listbukucontent">
                              <br/>
                              <i class="icon-tablet iconlarge8 iconapp"></i><br/><br/>
                              <span>Tambah Ebook</span>
                            </div>
                    </li>
                    <li class="contentareatoload">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                          <div class="actionss">
                            <img src="images/steps.jpg">
                            <div class="bottom_line1">&nbsp;</div>
                          </div>
                        </div>
                      </div>
                    </li>  
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- // Services content page -->
        </div>
        <!-- Services icon -->
        <div class="creator">&nbsp;</div>
        <!-- // Services icon -->
      </li>

      <li>
        <h2>Komentar</h2>
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Contact Content page -->
          <div class="rb-week">
              <!-- container -->
            <div class="container" id="containerI">
              <div class="main" id="resume5">
               <!-- Contact header -->
                
                <!-- // Contact header -->     
                <ul class="rb-grid clearfix">
                    <!-- Contact page box1 -->
                  <li class="rb-span-12">
                    <h1>Komentar</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>       
                    <div id="a" class="comment">&nbsp;</div>

                    
                    <h3 style="margin-top: 180px;" class="menufirst">
                      <a class="changepage" data-countinside="1" href="<?php echo $this->webroot?>admin/comments/listcomments" data-scope="commentscope" data-background="#E3328C" data-FDA2D9="#4d187e">List Komentar</a>
                    </h3>
                    
                    <h3 class="menufirst">
                      <a class="changepage" data-countinside="2" href="<?php echo $this->webroot?>admin/comments/find" data-scope="commentscope" data-background="#E3328C" data-FDA2D9="#4d187e">Pencarian</a>
                    </h3>

                    
                    
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Contact page box1 -->
                    <!-- Contact page box2 -->
                  <li class="title-menu keteranganatas">
                    <div class="view1 view-fifth1">
                      <div class="mask1">

                          <div class="actions">
                            <div class="tohide">
                              <div class="listbukucontent countinside_1_container">
                                <div class="top_line">&nbsp;</div>
                                <div class="name">List Comment<br/></div>
                                <div class="tags">Semua Comment yang terdaftar</div>
                                <div class="bottom_line">&nbsp;</div>
                              </div>

                              

                              <div class="favoritebukucontent countinside_2_container" style="display:none;">
                                <div class="top_line">&nbsp;</div>
                                <div class="name">Pencarian Komentar<br/></div>
                                <div class="tags">
                                  <?php echo $form->create('Comment',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                  <fieldset>
                                    <div class="input-control text" style="width:70%;">
                                        <input type="text" placeholder="ketikkan pencarian " name="data[Comment][keyword]"/>
                                        <button type="submit" class="btn-search" id="searchcommentsubmit"></button>
                                    </div>
                                    
                                  </fieldset>
                                  <?php echo $form->end();?>
                                </div>                                  
                              </div>

                              

                            </div>
                          </div>
                      </div>
                    </div>
                  </li>
                  
                  <li class="keteranganatas">
                      
                  </li>

                
                  <li class="commentscope contentareatoload areatochangebackground">
                    <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                    
                    <div id="commentscope" class="view1 view-fifth1 contenareaajax"></div>

                  </li>
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- // Contact content page -->
        </div>
        <!-- Contact icon -->
        <div class="comment loaddefaultcontent" data-href="<?php echo $this->webroot?>admin/comments/listcomments" data-scope="commentscope" data-background="#E3328C " data-fontcolor="#FDA2D9">&nbsp;</div>
        <!-- // Contact icon -->
      </li>

      <li>
      <h2 class="">Audio</h2>
    
    <div class="rb-overlay"> 
      <span class="rb-close"><a href="#"></a></span>
        <!-- Contact Content page -->
      <div class="rb-week">
          <!-- container -->
        <div class="container" id="containerI">
          <div class="main" id="contact">
           <!-- Contact header -->
            
            <!-- // Contact header -->     
            <ul class="rb-grid clearfix">
                <!-- Contact page box1 -->
              <li class="rb-span-12">
                <h1>Audio</h1>
                <div class="bottom_line2"></div>
                <div class="bottom_line3"></div>       
                <div id="a" class="audio">&nbsp;</div>




                <h3 style="margin-top: 180px;" class="menufirst"><a class="changepage listbukuactive" data-countinside="1" href="<?php echo $this->webroot;?>admin/audios/listaudios" data-scope="audioscope" data-background="#A3D046" data-fontcolor="#225E1F">List Audio</a></h3>

                <h3>
                  <a class="changepage" data-countinside="2" href="<?php echo $this->webroot;?>admin/audios/showfavorite" data-scope="audioscope" data-background="#A3D046" data-fontcolor="#225E1F">Favorite</a>
                </h3>

                <h3>
                  <a class="changepage" data-countinside="3" href="<?php echo $this->webroot;?>admin/audios/find" data-scope="audioscope" data-background="#A3D046" data-fontcolor="#225E1F">Pencarian</a>
                </h3>

                <h3>
                  <a class="printview opennewtab" data-countinside="4" href="<?php echo $this->webroot?>admin/audios/printall">Cetak Daftar Audio</a>
                </h3>

                
                <div class="bottom_line4"></div>
              </li>
                <!-- // Contact page box1 -->
                <!-- Contact page box2 -->
              <li class="title-menu keteranganatas areatochangebackground">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="tohide">
                            
                            <div class="listbukucontent countinside_1_container">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Audio<br/></div>
                              <div class="tags">Semua Audio yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="favoritebukucontent countinside_2_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Audio Favorite<br/></div>
                              <div class="tags">Semua Audio yang terdaftar sebagai Favorite</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="favoritebukucontent countinside_3_container" style="display:none;">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">Pencarian Audio<br/></div>
                                  <div class="tags">
                                    <?php echo $form->create('Audio',array('action'=>'admin_search','enctype'=>'multipart/form-data'));?>
                                    <fieldset>
                                      <div class="input-control text" style="width:70%;">
                                          <input type="text" placeholder="ketikkan pencarian " name="data[Audio][keyword]"/>
                                          <button type="submit" class="btn-search" id="searchaudiosubmit"></button>
                                      </div>
                                      
                                    </fieldset>
                                    <?php echo $form->end();?>
                                  </div>
                                  
                                </div>

                            <div class="favoritebukucontent countinside_4_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Cetak Daftar Audio<br/></div>
                              <div class="tags">Mencetak Audio buku yang terdaftar</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                          </div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink areatochangebackground" data-url="<?php echo $this->webroot;?>admin/audios/add" data-title="Tambah Audios" data-width="900px" data-height="375px">
                  
                    <div class="centercontainer">
                      
                      <div class="tohide">
                        <div class="listbukucontent">
                          <br/>
                          <i class="icon-music iconlarge4 iconapp"></i><br/><br/>
                          <span>Tambah List Audio</span>
                        </div>

                        <div class="favoritebukucontent" style="display:none;">
                          <br/>
                          <i class="icon-plus-2 iconlarge iconapp"></i><br/><br/>
                          <span>Tambah List Audio Favorite</span>
                        </div>

                      </div>
                    </div>
                </li>

                    <li class="audioscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                  
                  <div id="audioscope" class="view1 view-fifth1 contenareaajax">

                    
                  </div>
                </li>
            </ul>
          </div>
          <div class="container_bottom"></div>
        </div>
          <!-- // Container end -->
      </div>
      <!-- // Contact content page -->
    </div>
    <!-- Contact icon -->
  <div class="audio loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/audios/listaudios" data-scope="audioscope" data-background="#A3D046" data-fontcolor="#225E1F">&nbsp;</div>
    <!-- // Contact icon -->
  </li>


  <li>
    <h2>Transaksi</h2>
    <div class="rb-overlay"> 
      <span class="rb-close"><a href="index-2.html"></a></span>
        <!-- Contact Content page -->
      <div class="rb-week">
          <!-- container -->
        <div class="container" id="containerI">
          <div class="main" id="resume2">
           <!-- Contact header -->
            
            <!-- // Contact header -->     
            <ul class="rb-grid clearfix">
                <!-- Contact page box1 -->
              <li class="rb-span-12">
                <h1>Transaksi</h1>
                <div class="bottom_line2"></div>
                <div class="bottom_line3"></div>       
                <div id="a" class="transaksi">&nbsp;</div>


                <h3 style="margin-top: 180px;" class="menufirst">
                  <a class="changepage datalink1" data-countinside="1" href="<?php echo $this->webroot?>admin/rents/list" data-scope="rentscope" data-background="#df9019 " data-fontcolor="#C2F15F">Peminjaman</a>
                </h3>

                <h3>
                  <a class="changepage datalink2" data-countinside="2" href="<?php echo $this->webroot?>admin/rents/listback" data-scope="rentscope" data-background="#df9019 " data-fontcolor="#C2F15F">Pengembalian</a>
                </h3>


                <h3>
                  <a class="changepage datalink3" data-countinside="3" href="<?php echo $this->webroot?>admin/rents/listbooking" data-scope="rentscope" data-background="#df9019 " data-fontcolor="#C2F15F">Booking</a>
                </h3>

                <h3>
                  <a class="changepage datalink4" data-countinside="4" href="<?php echo $this->webroot?>admin/rents/history2" data-scope="rentscope" data-background="#df9019 " data-fontcolor="#C2F15F">History Transaksi</a>
                </h3>

                <div class="bottom_line4"></div>
              </li>
                <!-- // Contact page box1 -->
                <!-- Contact page box2 -->

              <li class="title-menu keteranganatas rentscope">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions" style="color:#fff;;">
                         <div class="tohide">
                            
                            <div class="tohide_transaction countinside_1_container">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Transaksi Peminjaman<br/></div>
                              <div class="tags">Dibawah ini adalah list lengkap transaksi peminjaman</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="tohide_transaction countinside_2_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Transaksi  Pengembalian<br/></div>
                              <div class="tags">Dibawah ini adalah list lengkap transaksi pengembalian</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="tohide_transaction countinside_3_container" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">Transaksi  Booking<br/></div>
                              <div class="tags">Dibawah ini adalah list lengkap transaksi booking</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="tohide_transaction countinside_4_container">
                                  <div class="top_line">&nbsp;</div>
                                  <div class="name">History Transaksi<br/></div>
                                  

                                  <div class="tags">

                                    <?php echo $form->create('Rent',array('action'=>'admin_searchhistory','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>

                                    <div class="inputdatefinance">
                                    <?php
                                      echo $form->input('tgl_awal',array('type'=>'date','label'=>'Tanggal awal'));
                                    ?>
                                    </div>

                                    <div class="inputdatefinance">
                                    <?php
                                      echo $form->input('tgl_akhir',array('type'=>'date','label'=>'Tanggal akhir'));
                                    ?>
                                    
                                    </div>
                                    <button id="dofindtransaction" type="submit" style="float:left;background-color:#EAA741;" class="default large">Submit</button>
                                    <?php echo $form->end();?>
                                  </div>
                                  <div class="bottom_line">&nbsp;</div>
                                </div>

                            <div class="addtransaction_container">
                              
                               <div class="name">Tambah  Transaksi</div>
                              <div class="tags tagspecial">Untuk memulai peminjaman, atau pengembalian, silahkan masukkan ID member, <br/>atau scan barcode member.</div>

                              <?php echo $form->create('User',array('action'=>'search_home_result','enctype'=>'multipart/form-data','autocomplete'=>'off'));?>
                              <fieldset>
                                <div class="input-control text" style="width:100%;background:transparent;">
                                    <input type="text" id="input_id_user_searchhome" placeholder="" name="data[User][input_id]" style="width:70%;" id=""/>
                                    <div class="button-list">
                                      <button class="primary" type="submit" id="search_user_home_submit">Submit</button>
                                      <button class="bg-darkRed fg-white" id="cancel_transaction_first" data-scope="1" >Cancel</button>
                                    </div>
                                </div>
                                
                              </fieldset>
                              <?php echo $form->end();?>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                          </div>

                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas addtransactionbutton">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-cart iconlarge2 iconapp"></i><br/><br/>
                          <span>Tambah Transaksi</span>
                        </div>
                </li>

                <li class="rentscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="<?php echo $this->webroot;?>images/Preloader_1.gif" alt="" /><br/><span style="color:#7c7c7c;"> Memuat data... mohon menunggu</span></div>
                  
                  <div id="rentscope" class="view1 view-fifth1 contenareaajax">
                    <!--Load rent scope default here-->
                  </div>

                </li>
            </ul>
          </div>
          <div class="container_bottom"></div>
        </div>
          <!-- // Container end -->
      </div>
      <!-- // Contact content page -->
    </div>
    <!-- Contact icon -->
    <div class="transaksi loaddefaultcontent" data-href="<?php echo $this->webroot;?>admin/rents/list/1/1" data-scope="rentscope" data-background="#df9019" data-fontcolor="#C2F15F">&nbsp;</div>
    <!-- // Contact icon -->
  </li>
      <!-- // Services page box7 -->
      
      <!-- Twitter page box8 -->
      
      <!-- // Contact page box9 -->         
    </ul>


