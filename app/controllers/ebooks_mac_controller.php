<?php
class EbooksController extends AppController {

	var $name = 'Ebooks';
	

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Ebook.created'=>'DESC'),'limit'=>'12'); 
	
	

	
	//var $helpers = array('Html', 'Form');
	//var $components = array('Filter');
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->set('menuTab', 'Ebooks');
	    //$this->set('menuTabChild', 'Ebooks');
	    //$this->Auth->allow('download');
	    $this->set('ModelActive','Ebook');
	    $this->set('controllerActive','ebooks');
	    $this->set('controllerActiveId',2);
	}
	

	function index(){
		$this->Ebook->recursive = 0;

		$actionactive = $this->params['action'];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Ebook.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			$conditions = array('Category.tipe'=>2);
			$categoriesList = $this->Ebook->Category->find('all',array('conditions'=>$conditions));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','true');
		}else{

			$books = $this->paginate(); 
			$this->set('books',$books);
			$conditions = array('Category.tipe'=>2);
			$categoriesList = $this->Ebook->Category->find('all',array('conditions'=>$conditions));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','false');

		}

		$this->set('actionactive',$actionactive);
		
	}

	function favorite(){
		$this->Ebook->recursive = 0;
		$conditions  = array('Ebook.favorite'=>1);
		$books = $this->paginate($conditions); 
		$this->set('books',$books);
		$categoriesList = $this->Ebook->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$this->set('favoriteactive','true');
		
	}

	function showcategory($id=null){

		$this->Ebook->recursive = 0;

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Ebook.category_id'=>$id,'Ebook.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions  = array('Ebook.category_id'=>$id);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$conditions = array('Category.tipe'=>2);
		$categoriesList = $this->Ebook->Category->find('all',array('conditions'=>$conditions));
		
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Ebook->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}



	function search(){

		$this->Ebook->recursive = 0;

		$keyword=$this->params['url']['keyword']; //get keyword from querystring//

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions = array(
				'Ebook.favorite'=>1,
				'OR'=>array("Ebook.title LIKE '%$keyword%'","Ebook.penerbit LIKE '%$keyword%'", "Ebook.pengarang LIKE '%$keyword%'","Ebook.details LIKE '%$keyword%'")  
			);
			
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions = array(
				
				'OR'=>array("Ebook.title LIKE '%$keyword%'","Ebook.penerbit LIKE '%$keyword%'", "Ebook.pengarang LIKE '%$keyword%'","Ebook.details LIKE '%$keyword%'")  
			);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$conditions = array('Category.tipe'=>2);
		$categoriesList = $this->Ebook->Category->find('all',array('conditions'=>$conditions));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Ebook->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}

	function admin_listebook(){
		$this->Ebook->recursive = 0;

		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Ebook.created'=>'DESC')
	    );
	    $listbuku = $this->paginate('Ebook');
	    //$this->set(compact('data'));


		
		$this->set('listbuku',$listbuku);
		$this->layout = 'default_blank';
	}

	function bookcategory(){
		$this->Category->recursive = 0;
		$bookcategory = $this->Ebook->Category->find('all');
		$this->set('bookcategory',$bookcategory);
		$this->layout = 'default_blank';
	}

	




	function admin_showfavorite(){
		$this->Ebook->recursive = 2;

		$this->paginate = array(
	        
	        'limit' => 20,
	        'order'=>array('Ebook.created'=>'DESC'),
	        'conditions'=>array('Ebook.favorite'=>1)
	    );
	    $listbuku = $this->paginate('Ebook');
		$this->set('listbuku',$listbuku);;	
		$this->render('admin_listebook','ajax');
		$this->layout = 'default_blank';
	}

	function ebooks() {
		$this->Ebook->recursive = 2;
		
		$ebooks = $this->Ebook->find('all');
		$this->set('ebooks',$ebooks);
	    $listCategory = $this->Ebook->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		
	}

	/*function search(){
		$keyword=$this->params['url']['keyword']; //get keyword from querystring//
		//used simpme or condition with singe value checking
		//replace ModelName with actual name of your Appmodel
		$cond=array('OR'=>array("Ebook.title LIKE '%$keyword%'","Ebook.penerbit LIKE '%$keyword%'", "Ebook.pengarang LIKE '%$keyword%'","Ebook.details LIKE '%$keyword%'")  );

		$ebooks = $this->Ebook->find('all',array('conditions'=>$cond,'order' => array('Ebook.created' => 'DESC')));
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

	}*/

	function video() {
		$this->Ebook->recursive = 2;
		
		
		$this->set('Ebooks', $this->paginate());
		
		
		if($this->Auth->user('group_id')==3){
		$EbooksMurid = $this->Ebook->find('all');
		$this->set(compact('EbooksMurid'));
		
		}
		
		
	}
	function find_category($id = null ) {
		$this->Ebook->recursive = 2;
		if ($id == 'empty'){
			$ebooks = $this->Ebook->find('all',array('order' => array('Ebook.created' => 'DESC')));	
		}else{
			$conditions = array('Ebook.category_id'=>$id);
			$ebooks = $this->Ebook->find('all',array('conditions'=>$conditions,'order' => array('Ebook.created' => 'DESC')));
		}
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

		//$this->render('find_category','ajax');
	}

	function find_category_video($id = null ) {
		$this->Ebook->recursive = 2;
		$conditions = array('Ebook.type'=>$id);
		$ebooks = $this->Ebook->find('all',array('conditions'=>$conditions));
		$this->set(compact('ebooks'));
		//6 for BSE
		//7 for BSE Non kemendiknas
		//8 for cahracterbulding
		//9 for lifeskill
		//10 for computer
		//11 for fiksi
		//12 video Dokumenter Sejarah Indonesia
		//13 video IPTEK
		//14 video Life Skill
		//15 video Carachter Building


		$this->render('find_category_video','ajax');
	}

	function view_thumb($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Ebook', $this->Ebook->read(null, $id));
		$this->render('view_thumb','ajax');
	}
	function view_thumb_video($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Ebook', $this->Ebook->read(null, $id));
		$this->render('view_thumb_video','ajax');
	}

	function lifeskill() {
		$this->Ebook->recursive = 2;
		$conditions = array('Ebook.type'=>4);
		$eboks = $this->Ebook->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function carachter() {
		$this->Ebook->recursive = 2;
		$conditions = array('Ebook.type'=>5);
		$eboks = $this->Ebook->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ebook', $this->Ebook->read(null, $id));
		$this->layout = 'default_ebook';
	}

	function view_video($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Ebook', $this->Ebook->read(null, $id));
	}
	
	function find() {
		$this->Ebook->recursive = 0;
	    $filter = $this->Filter->process($this);
	    $this->set('Ebooks', $this->paginate(null, $filter));
	    $listMataPelajaran = $this->Ebook->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
	    //$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
	    $listGuru = $this->Ebook->User->find('list',array('fields'=>'User.nama','conditions'=>array('User.group_id'=>array(1,2))));
	    
	    /*$listTahunAjaran = $this->Ebook->PasTahunAjaran->find('list',array('fields'=>'PasTahunAjaran.tahun','order'=>'PasTahunAjaran.id DESC'));*/
	    //$this->set(compact('assets', $this->paginate()));
	    $this->set(compact('listMataPelajaran','listGuru','listTahunAjaran'));
	    $this->set('menuTabChild', 'EbookFind');
	}

	function _upload_cover() {
	// init
	$image_ok = TRUE;
	
		// if a file has been added
		if($this->data['File']['image1']['error'] != 4) {
			// try to upload the file
			$result = $this->upload_files('img', $this->data['File']);

			// if there are errors
			if(array_key_exists('errors', $result)) {
				// set image ok to false
				$image_ok = FALSE;
				// set the error for the view
				$this->set('errors', $result['errors']);
			} else {
				// save the url
				$this->data['Ebook']['cover'] = $result['urls'][0];
			}
		}

	return $image_ok;
	}



	function _uploadpdf($output_dir){
		$status = array('status'=>FALSE,'message'=>'File tidak ditemukan','filename'=>'');
		if($this->data['Ebook']['ebookfiles'])
		{
		    //$output_dir = "uploads/";
		    //ini_set("display_errors",1);
		    if(isset($this->data['Ebook']['ebookfiles']))
		    {
		        //$RandomNum   = time();
		        
		        $ImageName      = str_replace(' ','-',strtolower($this->data['Ebook']['ebookfiles']['name']));
		        $ImageType      = $this->data['Ebook']['ebookfiles']['type']; //"image/png", image/jpeg etc.
		     
		        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
		        $ImageExt       = str_replace('.','',$ImageExt);
		        if($ImageExt != "pdf")
		        {
		        	$status = array('status'=>FALSE,'message'=>'File yang diizinkan untuk diupload adalah pdf','filename'=>'');
		            
		        }
		        else
		        {
		            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
		            $NewImageName = $ImageName.'.'.$ImageExt;
		         
		            move_uploaded_file($this->data['Ebook']['ebookfiles']["tmp_name"],$output_dir. $NewImageName);
		        
		            /*$location   = "/usr/local/convert";
		            $name       = $output_dir. $NewImageName;
		            $num = count_pages($name);
		            $RandomNum   = time();
		            $nameto     = $output_dir.$RandomNum.".jpg";
		            $convert    = $location . " " . $name . " ".$nameto;
		            exec($convert);
		            for($i = 0; $i<$num;$i++)
		            {
		                $display .= "<img src='$output_dir$RandomNum-$i.jpg' title='Page-$i' /><br>"; 
		            }*/
		            $status = array('status'=>TRUE,'message'=>'','filename'=>$NewImageName);
		            
		        }
		    }
		}

		return $status;
	}


	function _createcoverpdf($pdf_file,$save_to){
		
		 
		$img = new imagick();
		 
		//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
		//this is important to give good quality output, otherwise text might be unclear
		$img->setResolution(200,200);
		 
		//read the pdf
		$img->readImage("{$pdf_file}[0]");
		 
		//reduce the dimensions - scaling will lead to black color in transparent regions
		$img->scaleImage(800,0);
		 
		//set new format
		$img->setImageFormat('jpg');
		 
		// -flatten option, this is necessary for images with transparency, it will produce white background for transparent regions
		$img = $img->flattenImages();

		//savetodatabase

		 
		//save image file
		$img->writeImages($save_to, false);

		$img->destroy();

		return true;
	}


	function _convertallpdf($pdf_file,$save_to){

		$img = new imagick($pdf_file);
		 
		//this must be called before reading the image, otherwise has no effect - "-density {$x_resolution}x{$y_resolution}"
		//this is important to give good quality output, otherwise text might be unclear
		$img->setResolution(200,200);
		 
		
		 
		//reduce the dimensions - scaling will lead to black color in transparent regions
		$img->scaleImage(800,0);
		 
		//set new format
		$img->setImageFormat('jpg');
		 
		$img->setImageBackgroundColor('white');
		

		$num_pages = $img->getNumberImages();


	    // Convert PDF pages to images
	    for($i = 0;$i < $num_pages; $i++) {         

	        // Set iterator postion
	        $img->setIteratorIndex($i);

	        // Set image format
	        $img->setImageFormat('jpg');

	        // Write Images to temp 'upload' folder     
	        $img->writeImage($save_to.DS.'page'.'-'.$i.'.jpg');
	    }

	    $img->destroy();

	    return $num_pages;
	}

	function _createXMLFile($xmlfile,$numberimage)
	{
		$stringDataBody='';

		//$dir=digiBook::readFolderDirectory($imgloc);//Open location  of  image sliced
		
		$fh = fopen($xmlfile, 'w') or die("can't open file");
		
		$stringDataTop='<PageflipDataSet>
<Settings
	
	CopyrightMessage="88C1F4F548398C7320B4340428387FE9B7DB79FE90F2D216176A510E9212E429A55087950E0FAC8530C9740DBBC7739735BA5CBE9ED2D3261DCA5EDEA0E5611C4351CACB683FEC8DB8C279FE9542D546275A6FDEA4254F1D75DF540B98398C70F0C317723F7572BAB6A9FA21BD32E7599450DC13904AF286275A6B9E9435501D31519795A801CC7320C1FC06BD32D98B6F504395ECD8DC1D31A70B6D9D59B26A374B48136FFC812B26DC950B2DD6D91BF8B6EAB397F94B52C2FBF0D652E61B4723723E80D92D611ADA60D50D4D1AD80B707B74F7684ECC8200C208B56835721C54517513984CAC70F0B2140860287287B6FEFA54BD35611C4351CABFBA73ED4BB4C90A6E8C598F62B26277D69FD8439B10C0E4FA9AEAC92CA2C7E992A7E86E73B74B44D4F731922A009FA3CE9DD6C928518A563F83C77030C63B63A3703E61D6D1DA5DCEA422E866286E1BCE9BD8739735BA5CBE9ED2D3261DCA5EDEA0E5611C4351CABFBA73ED4BB4C90A6E8C598F62B26277D69FD8439B10C0E4FA9AEA962B81C7E99295D7B472A67F53B50701C2F7229FA3CE9DD6C928518A563F83C77030C63B63A3703E61D6D1DA52168ED8101C8751B995A814EC70F0C0E4F548497109B7DB79FE90F2D216176A510E9212E429A55087950EF3FEB70D60E6F2AE91D19BA3C7E99295D7B472A67F53B50701C2F7229FA3CE9DD6C92B6F504395ECD8DC1D31A707A565064E43E37221C24E03EFE9FA4D0BC0BBFAA949D88727B644D68/6025"
	
	CopyrightMessageDisplay = "false"
	ContextMenu="true"
	
	PageWidth="300"
	PageHeight="400"
	AutoSize="true"
	
	ViewAngle="0"
	
	StartPage="1"
	
	AlwaysOpened="false"
	ZeroPage="false"
	ZeroPageAlwaysVisible="false"
	
	CenterSinglePage="true"
	
	RightToLeft="false"
	VerticalMode="false"
	
	OffsetX="0"
	OffsetY="0"
	
	HardCover="true"
	HardPage="false"
	EmbossedPages="true"
	EmbossAlpha="100"
	ShadowsEnabled="true"
	ShadowsAlpha="100"
	
	LargeCover="true"
	LargeCoverVerticalOversize="24"
	LargeCoverHorizontalOversize="12"
	
	DropShadow="true"
	DropShadowSize="20"
	DropShadowOffset="10"
	DropShadowAlpha="30"
	
	PageLoaderBackColor="0xffffff"
	
	PageScale="true"
	MinScale="50"
	MaxScale="150"
	
	MinStageWidth="700"
	MinStageHeight="620"
	BaseStageWidth="820"
	BaseStageHeight="640"
	
	TransparentBackground="false"
	BackgroundColor="0xcccccc"
	BackgroundImageFile=""

	ZoomOnPageClick="true"
	DragZoom="true"
	
	FPSControlEnabled="true"
	MaxFPS="60"
	ShowFPS="false"
	
	FontLibraryFile="pageFlipFonts.swf"
	xDefaultFont=""
	
	ControlBar="true"
	KeyboardShortcutsEnabled="true"
	ControlBarScale="100"
	ControlBarFullScreenScale="150"
	
	xControlBarBackgroundColor="0x000000"
	xControlBarBackgroundAlpha="100"
	
	CustomControlBarIcons="false"
	xCustomControlBarFile="pageFlipControls.swf"
	
	CustomControlBarLayout="false"
	
	EnableButtonColoring="true"
	ButtonColor="0xffffff"
	ButtonAlpha="100"
	ButtonOverColor="0xF0B400"
	ButtonOverAlpha="100"
	ButtonPressColor="0x666666"
	ButtonPressAlpha="50"
	ButtonDisabledColor="0x666666"
	ButtonDisabledAlpha="15"
	
	ButtonToolTip="true"
	
	ControlBarLoaderEnabled="true"
	ButtonFirstLastEnabled="true"			  	
	ButtonLeftRightEnabled="true"			  	
	ButtonZoomEnabled="true"			  	
	ButtonPrintEnabled="true"			  	
	ButtonAutoFlipEnabled="true"			  	
	ButtonPDFLinkEnabled="true"
	PDFlink=""
	ButtonLanguageEnabled="true"
	ButtonThumbnailEnabled="true"			  	
	ButtonMuteEnabled="true"			  	
	ButtonInfoEnabled="true"			  	
	ButtonIndexEnabled="true"			  	
	ButtonFullScreenEnabled="true"			  	
	ButtonCloseEnabled="true"
	PageDisplayEnabled="true"
	PageNameDisplay="false"
	ControlBarPagerWidth="150"
	
	ButtonCustom0Enabled="true"
	ButtonCustom1Enabled="true"
	ButtonCustom2Enabled="false"
	ButtonCustom3Enabled="false"
	ButtonCustom4Enabled="false"
	ButtonCustom5Enabled="false"
	ButtonCustom6Enabled="false"
	ButtonCustom7Enabled="false"
		
	ContentPreviewEnabled="true"
	ThumbnailsEnabled="false"
	ThumbnailModeStart="false"
	ThumbnailWidth="90"
	ThumbnailHeight="120"
	ThumbnailDropShadow="true"
	ThumbnailDropShadowSize="8"
	ThumbnailDropShadowOffset="2"
	ThumbnailDropShadowAlpha="30"
	
	StartAutoFlip="false"
	AutoFlipDefaultInterval="2000"
	AutoFlipLooping="true"
		  
	TransparencyEnabled="true"
	TransparencyActivePage="false"
	TransparencyAutoLevel="true"
	TransparencyMaxLevel="16"
	
	DragArea="70"
	AutoFlipArea="70"
	MousePursuitSpeed="8"
	ZoomFollowSpeed="10"
	FlippingDuration="800"
	
	PageCache="5"
	UnloadPages="false"
	
	MouseControl="true"
	DefaultTransition="1"
	DefaultTransitionDuration="250"
	FlippingSpreadActivity="true"
		
	LayoutOrder="PREVIEW-CONTENT-CONTROLBAR"
	ControlBarHeight="50"
	ControlBarOffset="10"
	ContentPreviewHeight="90"
	ContentPreviewWidth="130"
	
	PopupBackgroundColor="0xFFFFFF"
	PopupBackgroundOpacity="80"
	PopupBorderThickness="0"
	PopupBorderColor="0x000000"
	PopupRounded="true"
	PopupRoundedRadius="8"		
	PopupMargin="8"
	PopupTitleFont="DINBlk_PFL Normal"			
	xPopupTextFont=""
	PopupTitleColor="0x333333"
	PopupTextColor="0x333333"
	PopupSpace="8"
	PopupMouseFollowSpeed="5"
	
	InfoWindowWidth="250"
	FloatingWindowColumnWidth="200"
	FloatingWindowMargin="10"
	FloatingWindowHorizontalSpace="16"
	FloatingWindowVerticalSpace="16"
	FloatingWindowSeparator="true"
	FloatingWindowSeparatorColor="0x555555"
	FloatingWindowSeparatorAlpha="100"
	FloatingWindowSeparatorHeight="1"
	FloatingWindowSeparatorOffset="8"
	FloatingWindowBackgroundColor="0x000000"
	FloatingWindowBackgroundAlpha="80"
	FloatingWindowBorderThickness="0"
	FloatingWindowBorderColor="0xFFFFFF"
	FloatingWindowBorderAlpha="100"
	FloatingWindowCornerRadius="16"		
	FloatingWindowColor="0xFFFFFF"
	FloatingWindowSize="10"
	FloatingWindowAlign="CENTER"
	
	TOCTitleFont="DINBlk_PFL Normal"			
	TOCTitleColor="0xFFFFFF"
	TOCTitleSize="20"
	TOCTitleAlign="CENTER"			
	TOCLinkColor="0xFFFFFF"
	TOCLinkSize="12"
	TOCLinkAlign="CENTER"			
	TOCLinkPageNumberColor="0xFFFFFF"
	TOCLinkPageNumberSize="20"
	TOCLinkPageNumberAlign="CENTER"
	TOCPageNumberFirst="false"
	TOCPageNumberWidth="32"		
	TOCDescriptionColor="0xFFFFFF"
	TOCDescriptionSize="12"
	TOCDescriptionAlign="CENTER"
	
	SoundEnabled="true"
	StartMute="false"
	
	
	
	>

	<Sounds	EffectVolume="50" >
		<PullOpen		SoundFile="sounds/pullflip2start.mp3" />
		<PullOpen		SoundFile="sounds/pullflip3start.mp3" />
		<PullClose		SoundFile="sounds/pullflip0end.mp3" />
		<PullClose		SoundFile="sounds/pullflip1end.mp3" />
		<PullClose		SoundFile="sounds/pullflip2end.mp3" />
		<PullClose		SoundFile="sounds/pullflip3end.mp3" />
		<PushOpen		SoundFile="sounds/pushflip0start.mp3" />
		<PushOpen		SoundFile="sounds/pushflip1start.mp3" />
		<PushOpen		SoundFile="sounds/pushflip2start.mp3" />
		<PushClose		SoundFile="sounds/pushflip0end.mp3" />
		<PushClose		SoundFile="sounds/pushflip1end.mp3" />
		<PushClose		SoundFile="sounds/pushflip2end.mp3" />
	</Sounds>
</Settings>

<PageOrder>
';
		
		$stringDataBody .= '<PageData	PageFile="pages/cover.jpg"
				ZoomFiles="pages/cover.jpg[200%]pages/cover.jpg[300%]pages/cover.jpg[500%]"
				MainBGImage="backgrounds/office.jpg"
				PrintFile="pages/cover.jpg"
				/>
';
		
		for ($i=1;$i<$numberimage;$i++){

			$stringDataBody.= '<PageData	PageFile="pages/page-'.$i.'.jpg"
				ZoomFiles="pages/page-'.$i.'.jpg[200%]pages/page-'.$i.'.jpg[300%]pages/page-'.$i.'.jpg[500%]"
				MainBGImage="backgrounds/office.jpg"
				PrintFile="pages/page-'.$i.'.jpg"
				/>
';
		}

		$stringDataBottom='</PageOrder>
<TableOfContents>
	
</TableOfContents>
<Info>
	<Title Name="BUKU ELEKTRONIK" Align="center" Separator="false" />
	<Description Text="" Align="center" Separator="false" />
	<Description Text="" Align="center" />
	<Description Text="" Color="0x777777" Align="center" />
</Info>
<Language>
	<Lang Name="English"
		Loading="LOADING"
		PagerPage="Page #"
		PagerThumbnailPopup="Page #"
		PagerThumbnails="Thumbnails"
		PagerThumbnailPages="Thumbs #"
		PagerZoomPage="Zoom Page #"
		
		PrintLeftTooltip="Print left side page"
		PrintRightTooltip="Print right side page"
		ZoomLeftTooltip="Zoom on left side page"
		ZoomRightTooltip="Zoom on right side page"
		ZoomInTooltip="Zoom In"
		ZoomOutTooltip="Zoom Out"
		FirstPageTooltip="First page"
		PreviousPageTooltip="Previous page"
		NextPageTooltip="Next page"
		LastPageTooltip="Last page"
		
		AutoFlipTooltip="Autoflip On/Off (A)"
		MuteTooltip="Mute (M)"
		InfoTooltip="About (Shift-I)"
		IndexTooltip="Table Of Contents (I)"
		LanguageTooltip="Magyar"
		ThumbnailTooltip="Thumbnail View (T)"
		FullscreenTooltip="Fullscreen On/Off (Shift-F)"
		CloseTooltip="Quit PageFlip (Shift-Q)"
		PDFDownloadTooltip="Download PDF version"
		
		SearchTooltip="Find"
		HelpTooltip="Help"
		BookmarksTooltip="Bookmarks"
		
		Custom0Tooltip="Custom Button 0"
		Custom1Tooltip="Custom Button 1"
		Custom2Tooltip="Custom Button 2"
		Custom3Tooltip="Custom Button 3"
		Custom4Tooltip="Custom Button 4"
		Custom5Tooltip="Custom Button 5"
		Custom6Tooltip="Custom Button 6"
		Custom7Tooltip="Custom Button 7"
	/>
	
</Language>
</PageflipDataSet>';
		
		fwrite($fh, $stringDataTop.$stringDataBody.$stringDataBottom);//Write file name to xml file

		fclose($fh);
	}





	function admin_add() {
		$status = "false";
		if (!empty($this->data)) {
			
			$this->data['Ebook']['author'] = 1;
			$this->data['Ebook']['type'] = 1;
			$typeSubmitted = $this->data['Ebook']['type'];
			
			
			// check for image
			//$image_ok = $this->_upload_cover();

			$this->data['Ebook']['tahun'] = $this->data['Ebook']['tahunBerdiri']['year'];



			$this->Ebook->create();
			if ($this->Ebook->save($this->data)) {
				$status = "true";
				$lastID  = $this->Ebook->getInsertID();

				//copy directory
				$newdirectory = WWW_ROOT.'files'.DS.'ebooks'.DS.$lastID;
				mkdir($newdirectory);

				$this->_cpyrec(WWW_ROOT.'files'.DS.'ebooks'.DS.'default',$newdirectory);

				$pdf_ok = $this->_uploadpdf($newdirectory.DS.'pdf'.DS);

				$filenamepdf = $newdirectory.DS.'pdf'.DS.$pdf_ok['filename'];
				$fileoutputjpgconvert =  $newdirectory.DS.'pageflipdata'.DS.'pages'.DS.'cover.jpg';
				$this->_createcoverpdf($filenamepdf,$fileoutputjpgconvert);

				$coverpath = 'files/ebooks/'.$lastID.'/pageflipdata/pages/cover.jpg';

				$pdfpath = 'files/ebooks/'.$lastID.'/pdf/'.$pdf_ok['filename'];

				

				//convert pdf
				$folderoutputconvertall = $newdirectory.DS.'pageflipdata'.DS.'pages';
				$convertingall = $this->_convertallpdf($filenamepdf,$folderoutputconvertall);

				//create xml file
				$xmlfilelocation = $newdirectory.DS.'pageflipdata'.DS.'pageflipdata.xml';
				$this->_createXMLFile($xmlfilelocation,$convertingall);


				$record = $this->Ebook->read(null, $lastID);
				$this->Ebook->saveField('cover', $coverpath);
				$this->Ebook->saveField('pdffile', $pdfpath);
				$this->Ebook->saveField('jumlahhalaman', $convertingall);
				
				

				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}
		
		$listMataPelajaran = $this->Ebook->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		
		$conditions = array('Category.tipe'=>2);
		$listCategory = $this->Ebook->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Ebook->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('listMataPelajaran','status','listCategory'));
		$this->layout = 'default_blank';
	}



	

	function admin_add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ebook', $this->Ebook->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit() {
		//type 1 for ebook 2 for video
		
		if (!empty($this->data)) {

			$this->data['Ebook']['author'] = 1;
			$this->data['Ebook']['type'] = 1;
			$typeSubmitted = $this->data['Ebook']['type'];
			
			// check for image
			
			$image_ok = $this->_upload_cover();
			

			$this->data['Ebook']['tahun'] = $this->data['Ebook']['tahunBerdiri']['year']; 

			
			if ($this->Ebook->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Ebook']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
				//$this->Session->setFlash('Berhasil Menghapus','flash_success');
				//$this->redirect(array('action'=>'index'));
				

			} else {

				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
				//$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				//$this->redirect(array('action'=>'index'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ebook->read(null, $id);
		}

		$this->set('ebook', $this->Ebook->read(null, $id));
		$listMataPelajaran = $this->Ebook->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Ebook->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.tipe'=>2)));
		$this->set(compact('listCategory'));
		$this->set(compact('listMataPelajaran','tipe'));

		//$this->set(compact('status','flashMessage','idtoResponse'));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('ebook', $this->Ebook->read(null, $id));
		$this->set(compact('status','flashMessage'));
		$this->layout = 'default_blank';

		
	}

	function admin_delete($id = null) {
		$status = "false";
		$flashMessage = "";
		$idtodelete = "";
		if (!$id) {
			$status = "false";
			$flashMessage = "Tidak Berhasil Menghapus";
			$idtodelete = "";
			//$this->Session->setFlash('Tidak Berhasil Menghapus','flash_erorr');
			//$this->redirect(array('action'=>'index'));
		}
		if ($this->Ebook->del($id)) {
			$directory = WWW_ROOT.'files'.DS.'ebooks'.DS.$id;
			$this->_delete_recursive($directory);

			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}


	

	function download() {
		$filename=$this->params['url']['filename']; //get keyword from querystring//
		$this->set('filename',$filename );

	}


	function admin_do_favorite(){
		if (!empty($this->data)) {
			
			
			$idbuku = $this->data['EbookFav']['id'];
			$action = $this->data['EbookFav']['action'];

			$bukuonselect = $this->Ebook->read(null, $idbuku);
			$current=$bukuonselect['Ebook']['favourite']=$action;
			//$do_update = ;
			$this->Ebook->saveField('favorite',$current);
			
			if ($this->Ebook->saveField('favourite',$current)) {
				
				$status = "false";
				if($action ==1){
					$flashMessage = "Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idbuku,$status,$flashMessage));

			} else {
				$status = "true";
				if($action ==1){
					$flashMessage = "Tidak Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Tidak Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idbuku,$status,$flashMessage));
			}
			
			
		}
	
	}


	function cd(){
		$this->Ebook->recursive = 0;
	}

	function admin_view($id){
		$this->Ebook->recursive=0;
		$ebook=$this->Ebook->read(null,$id);
		$this->set('ebook',$ebook);
		$this->layout = 'default_blank';

	}

	function admin_search(){

    $this->Ebook->recursive = 2;

    $keyword=$this->data['Ebook']['keyword']; //get keyword from querystring//

    //$actionactive = $this->params['action'];

    //$activecat = $this->params['pass'][0];
    
    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

    
    
    
    $conditions = array(
      
      'OR'=>array("Ebook.id_pustaka LIKE '%$keyword%'","Ebook.title LIKE '%$keyword%'","Ebook.penerbit LIKE '%$keyword%'","Ebook.pengarang LIKE '%$keyword%'", "Ebook.tahun LIKE '%$keyword%'", "Ebook.details LIKE '%$keyword%'")  
    );
    $ebook = $this->Ebook->find('all',array('conditions'=>$conditions)); 
    $this->set('listbuku',$ebook);

    
    $this->render('admin_listebook','ajax');
    //$this->layout = 'default_blank';
  }

  function admin_printall(){
		$this->Ebook->recursive=2;
		$listbuku=$this->Ebook->find('all');
		$this->set('listbuku',$listbuku);
		$this->layout = 'default_print';
	}

	



}
?>