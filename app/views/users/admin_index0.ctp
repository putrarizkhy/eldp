<ul id="rb-grid" class="rb-grid clearfix homebutton">
    <!-- Home page Photo Box 1 -->
    <li class="rb-span-1 buku_button_depan">
      <h2 class="judul">Ebook</h2>
      <div class="rb-overlay"> 
        <span class="rb-close"><a href="index-2.html"></a></span>
          <!-- Portfolio Content page -->
        <div class="rb-week">
          <div class="container1" id="containerI">
            <div class="main" id="portfolio">
              <!-- Portfolio Part -->
              <div class="clearfix sub_page">
                
              </div>
              
              <ul class="rb-grid clearfix overlay-grids" id="slide">
                
                <li class="rb-span-12">
                  <h1>Ebook</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>
                  <div class="preloadersmall">
                    <img class="" src="images/preloader_small.gif"><br/>
                    <span>Plase wait ...</span>
                  </div>
                  <div id="a" class="book imageNavinside">&nbsp;</div>
                    <h3 style="margin-top: 180px;"><a class="changepage listbukuactive"  href="<?php echo $this->webroot?>ebooks/listebook" data-scope="bookscope" data-background="#c53437">List Ebook</a></h3>
                    <h3><a class="changepage favoritebukuactive" href="<?php echo $this->webroot?>ebooks/showfavorite" data-scope="bookscope" data-background="#c53437">Favorite</a></h3>
                    
                  <div class="bottom_line4"></div>
                </li>
                  
                <li class="title-menu keteranganatas areatochangebackground">
                  
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          
                          <div class="tohide">
                            
                            <div class="listbukucontent">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Ebook<br/></div>
                              <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                            <div class="favoritebukucontent" style="display:none;">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Ebook Favorite<br/></div>
                              <div class="tags">Ini adalah list Ebook Favorite</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>

                          </div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink areatochangebackground">
                    
                    <div class="centercontainer">
                      
                      <div class="tohide">

                        <div class="listbukucontent">
                          <br/>
                          <i class="icon-mobile-2 iconlarge iconapp"></i><br/><br/>
                          <span>Tambah List Buku</span>
                        </div>

                        <div class="favoritebukucontent" style="display:none;">
                          <br/>
                          <i class="icon-plus-2 iconlarge iconapp"></i><br/><br/>
                          <span>Tambah List Ebook Favorite</span>
                        </div>

                      </div>
                    </div>
                </li>

                <li class="bookscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="images/Preloader_1.gif" alt="" /></div>
                  
                  <div id="bookscope" class="view1 view-fifth1 contenareaajax">
                    <div class="mask1">
                      <div class="actions">
                        
                        <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th>No</th>
                              <th class="largest-row"><a href="/elips/books/index/page:1/sort:name/direction:asc">Judul</a></th>
                              <th><a href="/elips/books/index/page:1/sort:kategori/direction:asc">Kategori</a></th>
                              <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Penerbit</a></th>
                              <th><a href="/elips/books/index/page:1/sort:pengarang/direction:asc">Pengarang</a></th>
                              <th><a href="/elips/books/index/page:1/sort:thn_terbit/direction:asc">Tahun</a></th>
                              

                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <?php 
                            $no = 0;
                            ?>
                            <?php foreach ($kumpulanEbook as $daftarebook) : ?>
                            <?php $no++; ?>
                            <tr class="altrow ">
                              <td><?php echo $no;?></td>
                              <td><?php echo $daftarebook['Ebook']['title']?></td>
                              <td><?php echo $daftarebook['Category']['name']?></td>
                              <td><?php echo $daftarebook['Ebook']['penerbit']?></td>
                              <td><?php echo $daftarebook['Ebook']['pengarang']?></td>
                              <td><?php echo $daftarebook['Ebook']['tahun']?></td>
                              
                              <td class="actions">
                                <a href="<?php echo $this->webroot;?>ebooks/view/<?php echo $daftarebook['Ebook']['id'];?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a href="<?php echo $this->webroot;?>ebooks/edit/<?php echo $daftarebook['Ebook']['id'];?>"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="<?php echo $this->webroot;?>ebooks/delete/<?php echo $daftarebook['Ebook']['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $daftarebook['Ebook']['title']?>?');"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                            <?php endforeach;?>
                            
                          </tbody>
                        </table>
                        <div class="bottom_line">&nbsp;</div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="container_bottom"></div>
          </div>
        </div>
      </div>
      <!-- Portfolio icon -->
      <div class="books">&nbsp;</div>
      <!-- // Portfolio icon -->
    </li>
  <!-- // Home page Photo Box 1 -->
             
  <!-- About page box2 -->
    <li>
      <h2 class="judul">Pencarian</h2>
      <div class="rb-overlay"> 
        <span class="rb-close"><a href="index-2.html"></a></span>
          <!-- About Content page -->
        <div class="rb-week">
            <!-- container -->
          <div class="container" id="containerI">
            <div class="main" id="about">
              <!-- About Part -->
              
              <ul class="rb-grid clearfix">
                <li class="rb-span-12">
                  <h1>Pencarian</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>       
                  <div id="a" class="search">&nbsp;</div>
                  <h3 style="margin-top: 180px;"><a href="">Pencarian Sederhana</a></h3>
                  <h3><a href="">Pencarian Detail</a></h3>
                  <h3><a href="">Pencarian Member</a></h3>
                  <div class="bottom_line4"></div>
                </li>
                <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">Pencarian Sederhana<br/></div>
                          <div class="tags">Ini adalah halaman sederhana pencarian buku bersifat auto complete, untuk mencari silahkan <br/>ketikkan kata yang ingin dicari, maka sistem akan mencocokan langsung dengan data yang ada.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas">
                    
                </li>
                <li class="contentareatoload">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                      <div class="actions">
                      <p>Ketik Judul Buku</p>
                        <form name="input" action="html_form_action.asp" method="get">
                          <input type="text" name="user">
                          <input class="sub" type="submit" value="Submit">
                        </form>
                        <div class="bottom_line1">&nbsp;</div>
                      </div>
                    </div>
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
      <div class="search">&nbsp;</div>
      <!-- // About Icon -->
    </li>

    <!-- // About page box2 -->                    

    <!-- Porfolio page box3 -->
    <li class="livereport">
      <div class="tile live" data-role="live-tile" data-effect="slideLeftRight">
        <div class="tile-content">
          <h1>12</br><small> buku</small></br></h1>
          <span class="ket" >Yang sedang di booking</span>
        </div>
        <div class="tile-content">
          <h1>6</br><small> buku</small></br></h1>
          <span class="ket">Yang harus dikembalikan hari ini</span>
        </div>
        <div class="tile-content">
          <h1>4</br><small> buku</small></br></h1>
          <span class="ket">Terlambat dikembalikan lebih dari hari ini</span>
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
                    <h3 style="margin-top: 180px;"><a href="">Peminjaman</a></h3>
                    <h3><a href="">Buku Baru</a></h3>
                    <h3><a href="">Buku Rusak</a></h3>
                    <h3><a href="">History Transaksi</a></h3>
                  <div class="bottom_line4"></div>
                </li>
                <!-- // Resume page box1 -->
                <!-- Resume page box2 -->
                <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">Laporan Peminjaman<br/></div>
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas">
                    <div class="button-dropdown">
                    <br/>
                    <br/>
                        <button class="dropdown-toggle large bg-teal fg-white">Tahun</button>
                        <ul class="dropdown-menu place-right" data-role="dropdown">
                            <li><a href="#">2010</a></li>
                            <li><a href="#">2011</a></li>
                            <li><a href="#">2013</a></li>
                            <li><a href="#">2014</a></li>
                        </ul>
                    </div>
                </li>
                <li class="contentareatoload">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                      <div class="actionss">
                       <img src="images/chart.jpg">
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
        <!-- Resume content page -->
      </div>
      <!-- Resume icon -->
      <div class="report">&nbsp;</div>
    <!-- // Resume icon -->
    </li>

    <!-- Download vcard page box5 -->
    <li>
      <h2>Kategori</h2>
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
                  <h1>Kategori</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>            
                  <div id="a" class="categories">&nbsp;</div>

                  <h3 style="margin-top: 180px;"><a class="changepage listbukuactive"  href="<?php echo $this->webroot?>ebooks/bookcategory" data-scope="categoryscope" data-background="#9E45A3">List Kategori</a></h3>
                  
                  <h3><a href="" class="gotolink" data-table="categorytable" data-url="<?php echo $this->webroot;?>categories/add" data-title="Tambah Kategori">Tambah Kategori</a></h3>
                  <div class="bottom_line4"></div>
                </li>
                  <!-- // Resume page box1 -->
                  <!-- Resume page box2 -->
                <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">List Kategori<br/></div>
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink" data-url="<?php echo $this->webroot;?>categories/add" data-title="Tambah Kategori">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-list iconlarge1 iconapp"></i><br/><br/>
                          <span>Tambah Kategori</span>
                        </div>
                </li>
                 <li class="categoryscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="images/Preloader_1.gif" alt="" /></div>
                  
                  <div id="categoryscope" class="view1 view-fifth1 contenareaajax">
                    <div class="mask1">
                      <div class="actionss">
                       <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th>No</th>
                              <th class="largest-row"><a href="/elips/books/index/page:1/sort:kategori/direction:asc">Kategori</a></th>
                              <th><a href="/elips/books/index/page:1/sort:penerbit/direction:asc">Keterangan</a></th>
          

                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="categorytable">
        <?php 
        $no = 0;
        ?>
        <?php foreach ($bookcategory as $category) : ?>
        <?php $no++; ?>
        <tr class="altrow " id="category-<?php echo $category['Category']['id'];?>">
          <td><?php echo $no;?></td>
          <td><?php echo $category['Category']['name']?></td>
          <td><?php echo $category['Category']['keterangan']?></td>
          
          <td class="actions">
            <a href="<?php echo $this->webroot;?>categories/view/<?php echo $category['Category']['id']?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
            <a class="gotolinkanchor" href="<?php echo $this->webroot;?>categories/edit/<?php echo $category['Category']['id']?>"><i class=" icon-pencil on-right"></i> Edit</a>
            <a href="<?php echo $this->webroot;?>categories/delete/<?php echo $category['Category']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
          </td>
        </tr>
        <?php endforeach;?>
        
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
      <div class="categories">&nbsp;</div>
    </li>
    <!-- // Resume icon -->  

    <!-- Social page box6 -->
    <li class="rb-span-2">
      <h2>Management Files</h2>
      <!-- Social network -->
      <div class="rb-overlay"> 
        <span class="rb-close"><a href="index-2.html"></a></span>
        <!-- Resume Content page -->
        <div class="rb-week">
          <!-- container -->
          <div class="container" id="containerI">
            <div class="main" id="resume2">
              <!-- Resume Part -->
              
              <!-- // Resume Part -->         
              <ul class="rb-grid clearfix overlay-grids">
                <!-- Resume page box1 -->
                <li class="rb-span-12">
                  <h1>Management Files</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>            
                  <div id="a" class="management">&nbsp;</div>
                  <h3 style="margin-top: 180px;"><a href="">List Files</a></h3>
                  <h3><a href="">Tambah Files</a></h3>
                  <div class="bottom_line4"></div>
                </li>
                <!-- // Resume page box1 -->
                <!-- Resume page box2 -->
                 <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">List Files<br/></div>
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-cabinet iconlarge2 iconapp"></i><br/><br/>
                          <span>Tambah Files</span>
                        </div>
                </li>
                 <li class="contentareatoload">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                      <div class="actionss">
                       <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th><a href="/elips/locations/index/page:1/sort:id/direction:asc">Id</a></th>
                              <th><a href="/elips/locations/index/page:1/sort:lokasi/direction:asc">Lokasi</a></th>
                              <th><a href="/elips/locations/index/page:1/sort:keterangan/direction:asc">Keterangan</a></th>
                              <th><a href="/elips/locations/index/page:1/sort:created/direction:asc">Created</a></th>
                              <th><a href="/elips/locations/index/page:1/sort:modified/direction:asc">Modified</a></th>
                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="altrow ">
                              <td>4</td>
                              <td>Rak 1 vel</td>
                              <td>Bawah</td>
                              <td>2011-02-09 19:14:46 </td>
                              <td>2011-02-09 19:14:46</td>
                              <td class="actions">
                                <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Rak 1 vel</td>
                              <td>Bawah</td>
                              <td>2011-02-09 19:14:46 </td>
                              <td>2011-02-09 19:14:46</td>
                              <td class="actions">
                                <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>

                             <tr class="altrow ">
                              <td>4</td>
                              <td>Rak 1 vel</td>
                              <td>Bawah</td>
                              <td>2011-02-09 19:14:46 </td>
                              <td>2011-02-09 19:14:46</td>
                              <td class="actions">
                                <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                            <tr>
                              <td>4</td>
                              <td>Rak 1 vel</td>
                              <td>Bawah</td>
                              <td>2011-02-09 19:14:46 </td>
                              <td>2011-02-09 19:14:46</td>
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
                <!-- // Resume page box2 -->
                
                <!-- // Resume page box9 -->          
              </ul>
            </div><!--mainend-->
            <div class="container_bottom"></div>
          </div><!--Container end-->
        </div><!--rbweekend-->
      </div><!--rbw overlay-->
      <!-- Resume icon -->
      <div class="management">&nbsp;</div>
    <!-- // Social network -->
    </li>

  <li>
    <h2 class="judul1">Ebook Creator</h2>
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
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-tablet iconlarge3 iconapp"></i><br/><br/>
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
    <div class="creator">&nbsp;</div>
    <!-- // Services icon -->
  </li>
  <!-- // Services page box7 -->

  <!-- Twitter page box8 -->
  <li class="finance1">
    <h2 class="judul1">Pengumuman</h2>
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
                  <h1>Pengumuman</h1>
                  <div class="bottom_line2"></div>
                  <div class="bottom_line3"></div>            
                  <div id="a" class="anouncement">&nbsp;</div>
                  
                  

                  <h3 style="margin-top: 180px;"><a class="changepage listbukuactive" href="<?php echo $this->webroot?>notifications/showall" data-scope="notificationscope" data-background="#007599">List Pengumuman</a></h3>
                  
                  <h3>
                    <a href="" class="gotolink" data-table="notificationtable" data-url="<?php echo $this->webroot;?>notifications/add" data-title="Tambah Pengumuman">Tambah Pengumuman</a>
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
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink" data-table="notificationtable" data-url="<?php echo $this->webroot;?>notifications/add" data-title="Tambah Pengumuman">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-comments-2 iconlarge6 iconapp"></i><br/><br/>
                          <span>Tambah Pengumuman</span>
                    </div>
                </li>

                <li class="notificationscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="images/Preloader_1.gif" alt="" /></div>
                  
                  <div id="notificationscope" class="view1 view-fifth1 contenareaajax">


                    <div class="mask1">
                      <div class="actionss">
                       <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th>No</th>
                              <th class="largest-row"><a href="#">Judul</a></th>
                              <th><a href="#">Isi</a></th>
                              <th><a href="#">Publish</a></th>
                              <th><a href="#">Expired</a></th>
          

                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="notificationtable">
                            
                            <?php 
                              $no = 0;
                              ?>
                            <?php foreach ($notification as $notif):  ?>
                             <?php $no++;?>


                            <tr id="notif_<?php echo $notif['Notification']['id'] ?>" class="altrow ">
                              <td><?php echo $no;?></td>
                              <td><?php echo $notif['Notification']['title']?></td>
                              <td><?php echo $notif['Notification']['content']?></td>
                              <td><?php echo $notif['Notification']['created']?></td>
                              <td><?php echo $notif ['Notification']['expiration_date']?></td>
                              <td class="actions">
                                <a href="<?php echo$this->webroot;?>notifications/view/<?php echo $notif['Notification']['id']; ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a class="gotolinkanchor" href="<?php echo$this->webroot;?>notifications/edit/<?php echo $notif['Notification']['id'] ?>"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="<?php echo $this->webroot;?>notifications/delete/<?php echo $notif['Notification']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                          
                            <?php endforeach; ?>

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
    <div class="anouncement">&nbsp;</div>
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
                <h3 style="margin-top: 180px;"><a class="changepage listbukuactive" href="<?php echo $this->webroot?>users/member" data-scope="memberscope" data-background="#A3D046">List Member</a></h3>
                <h3><a href="" class="keteranganatas gotolink" data-table="usertable" data-url="<?php echo $this->webroot;?>users/add/" data-title="Tambah Member" data-width="900px" data-height="375px">Registrasi Member</a></h3>
                <h3><a href="">Cetak Daftar Member</a></h3>
                <h3><a href="">Cetak Barcode Member</a></h3>
                <div class="bottom_line4"></div>
              </li>
                <!-- // Contact page box1 -->
                <!-- Contact page box2 -->
              <li class="title-menu keteranganatas">
                  <div class="view1 view-fifth1">
                    <div class="mask1">
                        <div class="actions">
                          <div class="top_line">&nbsp;</div>
                          <div class="name">List Member<br/></div>
                          <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                          <div class="bottom_line">&nbsp;</div>
                        </div>
                    </div>
                  </div>
                </li>
                <li class="keteranganatas gotolink" data-table="usertable" data-url="<?php echo $this->webroot;?>users/add/" data-title="Tambah Member" data-width="900px" data-height="375px">
                    <div class="listbukucontent">
                          <br/>
                          <i class="icon-user-2 iconlarge4 iconapp"></i><br/><br/>
                          <span>Registrasi Member</span>
                        </div>
                </li>

                    <li class="memberscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="images/Preloader_1.gif" alt="" /></div>
                  
                  <div id="memberscope" class="view1 view-fifth1 contenareaajax">


                    <div class="mask1">
                      <div class="actionss">
                       <table class="table hovered" cellpadding="0" cellspacing="0">
                          <thead>
                            <tr class="title_table">
                              <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
                              <th><a href="/elips/users/index/page:1/sort:id_member/direction:asc">Id Member</a></th>
                              <th><a href="/elips/users/index/page:1/sort:username/direction:asc">Username</a></th>
                              <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Nama</a></th>
                              <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Lahir</a></th>
                              <th><a href="/elips/users/index/page:1/sort:telpon/direction:asc">Telpon</a></th>
                              <th>Group</th>
                              <th class="actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody id="usertable">

                            
                            <?php foreach($member as $user): ?>
                            <tr id="userentry_<?php echo $user['User']['id'] ?>"class="altrow ">

                              

                              <td>27</td>
                              <td><?php echo $user ['User']['id_member']?></td>
                              <td><?php echo $user ['User']['username'] ?></td>
                              <td><?php echo $user ['User']['name'] ?></td>
                              <td><?php echo $user ['User']['lahir'] ?></td>
                              <td><?php echo $user ['User']['telpon'] ?></td>
                              <td><?php echo $user ['User']['group'] ?></td>
                              <td class="actions">
                                <a href="<?php echo $this->webroot?>/Users/view/<?php echo $user ['User']['id'] ?>"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                <a class="gotolinkanchor" href="<?php echo $this->webroot;?>users/edit/<?php echo $user['User']['id'] ?>" data-title="Edit Member" data-width="900px" data-height="500px"><i class="icon-pencil on-right"></i> Edit</a>
                                <a href="<?php echo $this->webroot;?>users/delete/<?php echo $user['User']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
                              </td>
                            </tr>
                            <?php endforeach?>
                          </tbody>
                        </table>
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
      <!-- // Contact content page -->
    </div>
    <!-- Contact icon -->
    <div class="member">&nbsp;</div>
    <!-- // Contact icon -->
  </li>

  <li>
        <h2 class="judul1">Konfigurasi</h2>
        <div class="rb-overlay"> 
          <span class="rb-close"><a href="index-2.html"></a></span>
            <!-- Contact Content page -->
          <div class="rb-week">
              <!-- container -->
            <div class="container" id="containerI">
              <div class="main" id="resume">
               <!-- Contact header -->
                
                <!-- // Contact header -->     
                <ul class="rb-grid clearfix">
                    <!-- Contact page box1 -->
                  <li class="rb-span-12">
                    <h1>Konfigurasi</h1>
                    <div class="bottom_line2"></div>
                    <div class="bottom_line3"></div>       
                    <div id="a" class="setting">&nbsp;</div>
                    <h3 style="margin-top: 180px;"><a href="">List Member</a></h3>
                    <h3><a href="">Registrasi Member</a></h3>
                    <h3><a href="">Cetak Daftar Member</a></h3>
                    <h3><a href="">Cetak Barcode Member</a></h3>
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Contact page box1 -->
                    <!-- Contact page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Member<br/></div>
                              <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        <div class="listbukucontent">
                              <br/>
                              <i class="icon-equalizer iconlarge5 iconapp"></i><br/><br/>
                              <span>Registrasi Member</span>
                            </div>
                    </li>
                    <li class="contentareatoload">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                          <div class="actionss">
                           <table class="table hovered" cellpadding="0" cellspacing="0">
                              <thead>
                                <tr class="title_table">
                                  <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:id_member/direction:asc">Id Member</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:username/direction:asc">Username</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Nama</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Lahir</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:telpon/direction:asc">Telpon</a></th>
                                  <th>Group</th>
                                  <th class="actions">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr class="altrow ">
                                  <td>27</td>
                                  <td>12355485255</td>
                                  <td>taufiq</td>
                                  <td>Taufiq Ridha</td>
                                  <td>Jakarta,20 Januari 2010</td>
                                  <td>Siswa (Member)</td>
                                  <td>5689752</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>26</td>
                                  <td>123456</td>
                                  <td>alvira</td>
                                  <td>Alvira Binthan</td>
                                  <td>30 Januari</td>
                                  <td>21</td>
                                  <td>iswa (Member)</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>

                                 <tr class="altrow ">
                                  <td>25</td>
                                  <td>12345</td>
                                  <td>yuna</td>
                                  <td>Yuna Sukamana</td>
                                  <td>20 Jakarta 1987</td>
                                  <td>56897526</td>
                                  <td>Siswa (Member)</td>
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-pencil on-right"></i> Edit</a>
                                    <a href="/elips/books/delete/60" onclick="return confirm('Are you sure you want to delete # 60?');"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <tr>
                                  <td>24</td>
                                  <td>123</td>
                                  <td>petugas</td>
                                  <td>Petugas Perpus</td>
                                  <td>Jakarta 30 desember</td>
                                  <td>43</td>
                                  <td>Petugas Perpus</td>
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
                </ul>
              </div>
              <div class="container_bottom"></div>
            </div>
              <!-- // Container end -->
          </div>
          <!-- // Contact content page -->
        </div>
        <!-- Contact icon -->
        <div class="setting">&nbsp;</div>
        <!-- // Contact icon -->
      </li>

      <li>
        <h2 class="judul1">Komentar</h2>
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
                    <h3 style="margin-top: 180px;"><a class="changepage listbukuactive" href="<?php echo $this->webroot?>comments/comment" data-scope="commentscope" data-background="#E3328C ">List Komentar</a></h3>
                    <h3><a href="">List Filter</a></h3>
                    
                    <div class="bottom_line4"></div>
                  </li>
                    <!-- // Contact page box1 -->
                    <!-- Contact page box2 -->
                  <li class="title-menu keteranganatas">
                      <div class="view1 view-fifth1">
                        <div class="mask1">
                            <div class="actions">
                              <div class="top_line">&nbsp;</div>
                              <div class="name">List Comment<br/></div>
                              <div class="tags">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                              <div class="bottom_line">&nbsp;</div>
                            </div>
                        </div>
                      </div>
                    </li>
                    <li class="keteranganatas">
                        
                    </li>

                    <li class="commentscope contentareatoload areatochangebackground">
                    
                  
                  <div class="spinner_container"><img id="spinner" src="images/Preloader_1.gif" alt="" /></div>
                  
                  <div id="commentscope" class="view1 view-fifth1 contenareaajax">
                        <div class="mask1">
                          <div class="actionss">
                           <table class="table hovered" cellpadding="0" cellspacing="0">
                              <thead>
                                <tr class="title_table">
                                  <th><a href="/elips/users/index/page:1/sort:id/direction:asc">Id</a></th>
                                  
                                  <th><a href="/elips/users/index/page:1/sort:username/direction:asc">Username</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:nama/direction:asc">Comment</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Status</a></th>
                                  <th><a href="/elips/users/index/page:1/sort:lahir/direction:asc">Created</a></th>
                                  <th class="actions">Actions</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php 
                                $no = 0;?>
                                
                                <?php foreach($comment as $com):?> 
                                <?php
                                $no++;
                                ?>
                                <tr class="altrow ">
                                  <td><?php echo $no; ?></td>
                                  
                                  <td><?php echo $com['User']['username']?></td>
                                  <td><?php echo $com['Comment']['content'] ?></td>
                                  <td><?php echo $com['Comment']['status'] ?></td>
                                  <td><?php echo $com['Comment']['created'] ?></td>
                                  
                                  <td class="actions">
                                    <a href="/elips/books/view/60"><i class=" icon-new-tab on-right"></i> Lihat</a>
                                    <a href="/elips/books/edit/60"><i class="icon-thumbs-up on-right"></i> Setujui</a>
                                    <a href="<?php echo $this->webroot;?>comments/delete/<?php echo $com['Comment']['id']?>" class="deleteitemtable"><i class="icon-remove on-right"></i> Hapus</a>
                                  </td>
                                </tr>
                                <?php endforeach?>
                              </tbody>
                            </table>
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
          <!-- // Contact content page -->
        </div>
        <!-- Contact icon -->
        <div class="comment">&nbsp;</div>
        <!-- // Contact icon -->
      </li>
 
  <!-- // Resume page box4 -->

 <!-- Download vcard page box5 -->
  
  <!-- // Services page box7 -->
  
  <!-- Twitter page box8 -->
  
  <!-- // Contact page box9 -->         
</ul>




