<?php
class PhotosController extends AppController {

	var $name = 'Photos';
	//var $components = array('RequestHandler'); 

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Photo.created'),'limit'=>'10'); 

	
	//var $helpers = array('Html', 'Form');
	//var $components = array('Filter');
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->set('ModelActive','Photo');
	    $this->set('controllerActive','photos');
	    $this->set('controllerActiveId',6);
	    //$this->set('menuTab', 'Ebooks');
	    //$this->set('menuTabChild', 'Ebooks');
	    //$this->Auth->allow('download');
	}
	/*function index() {
		$this->Ebook->recursive = 0;

		$this->Ebook->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Video' => array(
		             'className' => 'Video',
		             'foreignKey'=> 'produksi'
		         )
		        )
		    )
		);
		
		$ebooks = $this->Ebook->find('all',array('order' => array('Ebook.created' => 'DESC')));
		$this->set('ebooks',$ebooks);

		$videos = $this->Ebook->Video->find('all',array('order' => array('Video.created' => 'DESC')));
		$this->set('videos',$videos);

	    $listCategory = $this->Ebook->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
	    $listCategoryVideo = $this->Ebook->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>2)));
		$this->set(compact('listCategory','listCategoryVideo'));
		
	}*/

	function index(){
		$this->Photo->recursive = 0;

		$actionactive = $this->params['action'];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Photo.favorite'=>1);
			$Photos = $this->paginate($conditions); 
			$this->set('books',$Photos);
			$conditions = array('Category.tipe'=>5);
			$categoriesList = $this->Photo->Category->find('all');
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','true');
		}else{

			$books = $this->paginate(); 
			$this->set('books',$books);
			$conditions = array('Category.tipe'=>5);
			$categoriesList = $this->Photo->Category->find('all');
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','false');

		}

		$this->set('actionactive',$actionactive);
		
	}

	function favorite(){
		$this->Photo->recursive = 0;
		$conditions  = array('Photo.favorite'=>1);
		$Photos = $this->paginate($conditions); 
		$this->set('books',$Photos);
		$categoriesList = $this->Photo->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$this->set('favoriteactive','true');
		
	}

	function showcategory($id=null){

		$this->Photo->recursive = 0;

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Photo.category_id'=>$id,'Photo.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions  = array('Photo.category_id'=>$id);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Photo->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Photo->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}



	function search(){

		$this->Photo->recursive = 0;

		$keyword=$this->params['url']['keyword']; //get keyword from querystring//

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions = array(
				'Photo.favorite'=>1,
				'OR'=>array("Photo.title LIKE '%$keyword%'","Photo.penerbit LIKE '%$keyword%'", "Photo.pengarang LIKE '%$keyword%'","Photo.details LIKE '%$keyword%'")  
			);
			
			$Photos = $this->paginate($conditions); 
			$this->set('books',$Photos);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions = array(
				
				'OR'=>array("Photo.title LIKE '%$keyword%'","Photo.penerbit LIKE '%$keyword%'", "Photo.pengarang LIKE '%$keyword%'","Photo.details LIKE '%$keyword%'")  
			);
			$Photos = $this->paginate($conditions); 
			$this->set('books',$Photos);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Photo->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Photo->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}

	function listPhoto(){
		$this->Photo->recursive = 0;
		$listbuku = $this->Photo->find('all');
		$this->set('listbuku',$listbuku);
		$this->layout = 'default_blank';
	}

	function Photocategory(){
		$this->Category->recursive = 0;
		$Photocategory = $this->Photo->Category->find('all');
		$this->set('Photocategory',$Photocategory);
		$this->layout = 'default_blank';
	}

	




	function showfavorite(){
		$this->Photo->recursive = 0;
		$Photofavorite = $this->Photo->find('all',array('conditions'=>array('Photo.favorite'=>1)));
		$this->set('Photofavorite',$Photofavorite);;	

		$this->layout = 'default_blank';
	}

	function Photos() {
		$this->Photo->recursive = 2;
		
		$Photos = $this->Photo->find('all');
		$this->set('Photos',$Photos);
	    $listCategory = $this->Photo->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
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
		$this->Photo->recursive = 2;
		
		
		$this->set('Photos', $this->paginate());
		
		
		if($this->Auth->user('group_id')==3){
		$PhotosMurid = $this->Photo->find('all');
		$this->set(compact('PhotosMurid'));
		
		}
		
		
	}
	function find_category($id = null ) {
		$this->Photo->recursive = 2;
		if ($id == 'empty'){
			$Photos = $this->Photo->find('all',array('order' => array('Photo.created' => 'DESC')));	
		}else{
			$conditions = array('Photo.category_id'=>$id);
			$Photos = $this->Photo->find('all',array('conditions'=>$conditions,'order' => array('Photo.created' => 'DESC')));
		}
		$this->set(compact('Photos'));
		$this->layout = 'default_blank';

		//$this->render('find_category','ajax');
	}

	function find_category_video($id = null ) {
		$this->Photo->recursive = 2;
		$conditions = array('Photo.type'=>$id);
		$Photos = $this->Photo->find('all',array('conditions'=>$conditions));
		$this->set(compact('Photos'));
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
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
		$this->render('view_thumb','ajax');
	}
	function view_thumb_video($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
		$this->render('view_thumb_video','ajax');
	}

	function lifeskill() {
		$this->Photo->recursive = 2;
		$conditions = array('Photo.type'=>4);
		$eboks = $this->Photo->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function carachter() {
		$this->Photo->recursive = 2;
		$conditions = array('Ebook.type'=>5);
		$eboks = $this->Photo->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
		$this->layout = 'default_Photo';
	}

	function view_video($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
	}
	
	function find() {
		$this->Photo->recursive = 0;
	    $filter = $this->Filter->process($this);
	    $this->set('Photos', $this->paginate(null, $filter));
	    $listMataPelajaran = $this->Photo->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
	    //$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
	    $listGuru = $this->Photo->User->find('list',array('fields'=>'User.nama','conditions'=>array('User.group_id'=>array(1,2))));
	    
	    /*$listTahunAjaran = $this->Ebook->PasTahunAjaran->find('list',array('fields'=>'PasTahunAjaran.tahun','order'=>'PasTahunAjaran.id DESC'));*/
	    //$this->set(compact('assets', $this->paginate()));
	    $this->set(compact('listMataPelajaran','listGuru','listTahunAjaran'));
	    $this->set('menuTabChild', 'PhotoFind');
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
				$this->data['Photo']['cover'] = $result['urls'][0];
			}
		}

	return $image_ok;
	}



	function add($type = null) {
		$status = "false";
		if (!empty($this->data)) {
			
			$this->data['Photo']['author'] = 1;
			$this->data['Photo']['type'] = 1;
			$typeSubmitted = $this->data['Photo']['type'];
			
			
			// check for image
			$image_ok = $this->_upload_cover();

			$this->data['Photo']['tahun'] = $this->data['Photo']['tahunBerdiri']['year']; 

			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$status = "true";
				$lastID  = $this->Photo->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}
		
		$listMataPelajaran = $this->Photo->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Photo->Category->find('list',array('fields'=>'Category.name'));
		$typeEbook = $type;
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Ebook->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('listMataPelajaran','typePhoto','status','listCategory'));
		$this->layout = 'default_blank';
	}

	function add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
		$this->layout = 'default_blank';
	}

	function edit($tipe=null,$id = null) {

		

		//type 1 for ebook 2 for video
		if (!$tipe && !$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {

			$this->data['Photo']['author'] = 1;
			$this->data['Photo']['type'] = 1;
			$typeSubmitted = $this->data['Photo']['type'];
			
			// check for image
			
			$image_ok = $this->_upload_cover();
			

			$this->data['Photo']['tahun'] = $this->data['Photo']['tahunBerdiri']['year']; 

			
			if ($this->Photo->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Photo']['id'];
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
			$this->data = $this->Photo->read(null, $id);
		}

		$this->set('Photo', $this->Photo->read(null, $id));
		$listMataPelajaran = $this->Photo->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Photo->Category->find('list',array('fields'=>'Category.nama','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		$this->set(compact('listMataPelajaran','tipe'));

		//$this->set(compact('status','flashMessage','idtoResponse'));

		$this->layout = 'default_blank';
	}


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ebook', $this->Photo->read(null, $id));
		$this->set('status',$status);
		$this->set('flashMessage',$flashMessage);
		$this->set('idtoResponse',$id);

		$this->layout = 'default_blank';
	}

	function delete($id = null) {
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
		if ($this->Photo->del($id)) {
			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}


	function administrator_index() {
		$this->Photo->recursive = 0;
		$this->set('Ebooks', $this->paginate());
	}

	function administrator_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Photo', $this->Photo->read(null, $id));
	}

	function administrator_add() {
		if (!empty($this->data)) {
			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The Photo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Photo could not be saved. Please, try again.', true));
			}
		}
	}

	function administrator_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$this->Session->setFlash(__('The Photo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Photo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
	}

	function administrator_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Photo->del($id)) {
			$this->Session->setFlash(__('Photo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function download($filename) {
		$this->set('filename',$filename );
	}


	function admin_listphotos(){
		$this->Photo->recursive = 0;
		//$listphoto = $this->Photo->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Photo.created'=>'DESC')
	    );
	    $listphoto = $this->paginate('Photo');
	    //$this->set(compact('data'));
		$this->set('listphoto',$listphoto);
		$this->layout = 'default_blank';
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Photo->create();
			if ($this->Photo->save($this->data)) {
				$status = "true";
				$lastID  = $this->Photo->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}

		$conditions = array('Category.tipe'=>5);
		$listCategory = $this->Photo->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Ebook->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('status','listCategory'));

		$this->layout = 'default_blank';



	}

	function admin_add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->Photo->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Photo', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Photo->save($this->data)) {
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Photo']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Photo->read(null, $id);
		}
		$this->set('photo', $this->Photo->read(null, $id));

		$listCategory = $this->Photo->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.tipe'=>5)));
		$this->set(compact('listCategory'));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Photo.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Photo->read(null, $id));
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
		if ($this->Photo->del($id)) {
			//$directory = WWW_ROOT.'files'.DS.'ebooks'.DS.$id;
			//$this->_delete_recursive($directory);

			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}

	function admin_view($id){
		$this->Photo->recursive=0;
		$photo=$this->Photo->read(null,$id);
		$this->set('photo',$photo);
		$this->layout = 'default_blank';

	}


	function admin_search(){

    $this->Photo->recursive = 2;

    $keyword=$this->data['Photo']['keyword']; //get keyword from querystring//

    //$actionactive = $this->params['action'];

    //$activecat = $this->params['pass'][0];
    
    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

    
    

    $conditions = array(
      
      'OR'=>array("Photo.id_pustaka LIKE '%$keyword%'","Photo.title LIKE '%$keyword%'","Photo.penerbit LIKE '%$keyword%'", "Category.name LIKE '%$keyword%'","Photo.pengarang LIKE '%$keyword%'")  
    );
    $photos = $this->Photo->find('all',array('conditions'=>$conditions)); 
    $this->set('listphoto',$photos);

    
    $this->render('admin_listphotos','ajax');
    //$this->layout = 'default_blank';
  }


  function admin_do_favorite(){
    if (!empty($this->data)) {
      
      
      $idphoto = $this->data['PhotoFav']['id'];
      $action = $this->data['PhotoFav']['action'];

      $photoonselect = $this->Photo->read(null, $idphoto);
      $current=$photoonselect['Photo']['favourite']=$action;
      //$do_update = ;
      $this->Photo->saveField('favorite',$current);
      
      if ($this->Photo->saveField('favourite',$current)) {
        
        $status = "false";
        if($action ==1){
          $flashMessage = "Berhasil Menjadikan favourite";
        }else{
          $flashMessage = "Berhasil Membuang dari favourite";
        }
        $this->redirect(array('action'=>'admin_edit_responses',$idphoto,$status,$flashMessage));

      } else {
        $status = "true";
        if($action ==1){
          $flashMessage = "Tidak Berhasil Menjadikan favourite";
        }else{
          $flashMessage = "Tidak Berhasil Membuang dari favourite";
        }
        $this->redirect(array('action'=>'admin_edit_responses',$idphoto,$status,$flashMessage));
      }
      
      
    }
  
  }


  function admin_showfavorite(){
    $this->Photo->recursive = 2;
    $this->paginate = array(
	        
	        'limit' => 20,
	        'order'=>array('Photo.created'=>'DESC'),
	        'conditions'=>array('Photo.favorite'=>1)
	    );
    $listphoto = $this->paginate('Photo'); 
    $this->set('listphoto',$listphoto);;  
    $this->render('admin_listphotos','ajax');
    $this->layout = 'default_blank';
  }

	function admin_printall(){
		$this->Photo->recursive=2;
		$listphoto=$this->Photo->find('all');
		$this->set('listphoto',$listphoto);
		$this->Photo->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Photo->Profile->find('all');
		$this->set('profile',$profile);
		$this->layout = 'default_print';
	}



}
?>