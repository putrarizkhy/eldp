<?php
class BooksController extends AppController {

	var $name = 'Books';
	//var $components = array('RequestHandler'); 

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Book.created'=>'DESC'),'limit'=>'12'); 
	

	
	//var $helpers = array('Html', 'Form');
	//var $components = array('Filter');
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->set('menuTab', 'Books');
	    //$this->set('menuTabChild', 'Books');
	    //$this->Auth->allow('download');
	    $this->set('ModelActive','Book');
	    $this->set('controllerActive','books');
	    $this->set('controllerActiveId',1);
	}
	/*function index() {
		$this->Book->recursive = 0;

		$this->Book->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Book' => array(
		             'className' => 'Book',
		             'foreignKey'=> 'produksi'
		         )
		        )
		    )
		);
		
		$ebooks = $this->Book->find('all',array('order' => array('Book.created' => 'DESC')));
		$this->set('ebooks',$ebooks);

		$videos = $this->Book->Book->find('all',array('order' => array('Book.created' => 'DESC')));
		$this->set('videos',$videos);

	    $listCategory = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
	    $listCategoryBook = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>2)));
		$this->set(compact('listCategory','listCategoryBook'));
		
	}*/

	function index(){
		$this->Book->recursive = 2;

		$actionactive = $this->params['action'];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Book.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$books = $this->paginate(); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Book->Category->find('all',array('conditions'=>array('Category.tipe'=>1)));
		$this->set('categoriesList',$categoriesList);

		$this->set('actionactive',$actionactive);
		
	}

	function favorite(){
		$this->Book->recursive = 2;
		$conditions  = array('Book.favorite'=>1);
		$books = $this->paginate($conditions); 
		$this->set('books',$books);
		$categoriesList = $this->Book->Category->find('all',array('conditions'=>array('Category.tipe'=>1)));
		$this->set('categoriesList',$categoriesList);
		$this->set('favoriteactive','true');
		
	}

	function showcategory($id=null){

		$this->Book->recursive = 2;

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Book.category_id'=>$id,'Book.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions  = array('Book.category_id'=>$id);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Book->Category->find('all',array('conditions'=>array('Category.tipe'=>1)));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Book->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}



	function search(){

		$this->Book->recursive = 2;

		$keyword=$this->params['url']['keyword']; //get keyword from querystring//

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions = array(
				'Book.favorite'=>1,
				'OR'=>array("Book.title LIKE '%$keyword%'","Book.penerbit LIKE '%$keyword%'", "Book.pengarang LIKE '%$keyword%'","Book.sinopsis LIKE '%$keyword%'")  
			);
			
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions = array(
				
				'OR'=>array("Book.title LIKE '%$keyword%'","Book.penerbit LIKE '%$keyword%'", "Book.pengarang LIKE '%$keyword%'","Book.sinopsis LIKE '%$keyword%'")  
			);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Book->Category->find('all',array('conditions'=>array('Category.tipe'=>1)));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Book->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}

	function listbook(){
		$this->Book->recursive = 0;
		$listbuku = $this->Book->find('all');
		$this->set('listbuku',$listbuku);
		$this->layout = 'default_blank';
	}

	function bookcategory(){
		$this->Category->recursive = 0;
		$bookcategory = $this->Book->Category->find('all');
		$this->set('bookcategory',$bookcategory);
		$this->layout = 'default_blank';
	}

	




	function showfavorite(){
		$this->Book->recursive = 0;
		$bukufavorite = $this->Book->find('all',array('conditions'=>array('Book.favorite'=>1)));
		$this->set('bukufavorite',$bukufavorite);;	

		$this->layout = 'default_blank';
	}

	function books() {
		$this->Book->recursive = 2;
		
		$ebooks = $this->Book->find('all');
		$this->set('ebooks',$ebooks);
	    $listCategory = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		
	}

	/*function search(){
		$keyword=$this->params['url']['keyword']; //get keyword from querystring//
		//used simpme or condition with singe value checking
		//replace ModelName with actual name of your Appmodel
		$cond=array('OR'=>array("Book.title LIKE '%$keyword%'","Book.penerbit LIKE '%$keyword%'", "Book.pengarang LIKE '%$keyword%'","Book.details LIKE '%$keyword%'")  );

		$ebooks = $this->Book->find('all',array('conditions'=>$cond,'order' => array('Book.created' => 'DESC')));
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

	}*/

	function video() {
		$this->Book->recursive = 2;
		
		
		$this->set('Books', $this->paginate());
		
		
		if($this->Auth->user('group_id')==3){
		$BooksMurid = $this->Book->find('all');
		$this->set(compact('BooksMurid'));
		
		}
		
		
	}
	function find_category($id = null ) {
		$this->Book->recursive = 2;
		if ($id == 'empty'){
			$ebooks = $this->Book->find('all',array('order' => array('Book.created' => 'DESC')));	
		}else{
			$conditions = array('Book.category_id'=>$id);
			$ebooks = $this->Book->find('all',array('conditions'=>$conditions,'order' => array('Book.created' => 'DESC')));
		}
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

		//$this->render('find_category','ajax');
	}

	function find_category_video($id = null ) {
		$this->Book->recursive = 2;
		$conditions = array('Book.type'=>$id);
		$ebooks = $this->Book->find('all',array('conditions'=>$conditions));
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
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Book', $this->Book->read(null, $id));
		$this->render('view_thumb','ajax');
	}
	function view_thumb_video($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Book', $this->Book->read(null, $id));
		$this->render('view_thumb_video','ajax');
	}

	function lifeskill() {
		$this->Book->recursive = 2;
		$conditions = array('Book.type'=>4);
		$eboks = $this->Book->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function carachter() {
		$this->Book->recursive = 2;
		$conditions = array('Book.type'=>5);
		$eboks = $this->Book->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Book', $this->Book->read(null, $id));
		$this->layout = 'default_book';
	}

	function view_video($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Book', $this->Book->read(null, $id));
	}
	
	function find() {
		$this->Book->recursive = 0;
	    $filter = $this->Filter->process($this);
	    $this->set('Books', $this->paginate(null, $filter));
	    $listMataPelajaran = $this->Book->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
	    //$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
	    $listGuru = $this->Book->User->find('list',array('fields'=>'User.nama','conditions'=>array('User.group_id'=>array(1,2))));
	    
	    /*$listTahunAjaran = $this->Book->PasTahunAjaran->find('list',array('fields'=>'PasTahunAjaran.tahun','order'=>'PasTahunAjaran.id DESC'));*/
	    //$this->set(compact('assets', $this->paginate()));
	    $this->set(compact('listMataPelajaran','listGuru','listTahunAjaran'));
	    $this->set('menuTabChild', 'BookFind');
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
				$this->data['Book']['cover'] = $result['urls'][0];
			}
		}

	return $image_ok;
	}



	function add($type = null) {
		$status = "false";
		if (!empty($this->data)) {
			
			$this->data['Book']['author'] = 1;
			$this->data['Book']['type'] = 1;
			$typeSubmitted = $this->data['Book']['type'];
			
			
			// check for image
			$image_ok = $this->_upload_cover();

			$this->data['Book']['tahun'] = $this->data['Book']['tahunBerdiri']['year']; 

			$this->Book->create();
			if ($this->Book->save($this->data)) {
				$status = "true";
				$lastID  = $this->Book->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}
		
		$listMataPelajaran = $this->Book->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Book->Category->find('list',array('fields'=>'Category.name'));
		$typeBook = $type;
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Book->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('listMataPelajaran','typeBook','status','listCategory'));
		$this->layout = 'default_blank';
	}

	function add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('book', $this->Book->read(null, $id));
		$this->layout = 'default_blank';
	}

	


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('buku', $this->Book->read(null, $id));
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
		if ($this->Book->del($id)) {
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
		$this->Book->recursive = 0;
		$this->set('Books', $this->paginate());
	}

	function administrator_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Book', $this->Book->read(null, $id));
	}

	function administrator_add() {
		if (!empty($this->data)) {
			$this->Book->create();
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The Book has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Book could not be saved. Please, try again.', true));
			}
		}
	}

	function administrator_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Book', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Book->save($this->data)) {
				$this->Session->setFlash(__('The Book has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Book could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Book->read(null, $id);
		}
	}

	function administrator_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Book', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Book->del($id)) {
			$this->Session->setFlash(__('Book deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function download($filename) {
		$this->set('filename',$filename );
	}


	function admin_listbook(){
		$this->Book->recursive = 2;
		//$listbook = $this->Book->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Book.created'=>'DESC')
	    );
	    $listbook = $this->paginate('Book');
	    //$this->set(compact('data'));
		$this->set('listbook',$listbook);
		$this->layout = 'default_blank';
	}


	function admin_add() {
		
		
		if (!empty($this->data)) {
		
			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/books', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Book']['preview'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}
			
			
			$this->data['Book']['tahun'] = $this->data['Book']['tahunBerdiri']['year']; 
			$this->Book->create();
			
			
			if ($this->Book->save($this->data)) {
				$status = "true";
				$lastID  = $this->Book->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));

			}else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
			}
		}
		//$attributes = $this->Book->Attribute->find('list');
		$conditions = array('Category.tipe'=>1);
		$categories = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		
		
		$this->set(compact('categories'));
		$this->layout = 'default_blank';
	}
	

	function admin_add_responses($id,$status){
		$this->Book->recursive = 2;
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->Book->read(null, $id));
		$this->layout = 'default_blank';
	}


	function admin_edit() {

		if (!empty($this->data)) {

			$this->data['Book']['author'] = 1;
			$this->data['Book']['type'] = 1;
			$typeSubmitted = $this->data['Book']['type'];
			
			// check for image
			
			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/books', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Book']['preview'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}
			

			$this->data['Book']['tahun'] = $this->data['Book']['tahunBerdiri']['year']; 

			
			if ($this->Book->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Book']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Book->read(null, $id);
		}

		$this->set('book', $this->Book->read(null, $id));
		//$listMataPelajaran = $this->Book->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$conditions = array('Category.tipe'=>1);
		$categories = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		$this->set(compact('categories'));
		$this->set(compact('tipe'));

		//$this->set(compact('status','flashMessage','idtoResponse'));

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
		if ($this->Book->del($id)) {
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

	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Book->read(null, $id));
		$this->set(compact('status','flashMessage'));
		$this->layout = 'default_blank';

		
	}

	function admin_do_favorite(){
		if (!empty($this->data)) {
			
			
			$idbuku = $this->data['BookFav']['id'];
			$action = $this->data['BookFav']['action'];

			$bukuonselect = $this->Book->read(null, $idbuku);
			$current=$bukuonselect['Book']['favourite']=$action;
			//$do_update = ;
			$this->Book->saveField('favorite',$current);
			
			if ($this->Book->saveField('favourite',$current)) {
				
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


	function admin_showfavorite(){
		$this->Book->recursive = 2;
		$this->paginate = array(
	        
	        'limit' => 20,
	        'order'=>array('Book.created'=>'DESC'),
	        'conditions'=>array('Book.favorite'=>1)
	    );
	    $listbook = $this->paginate('Book');
		$this->set('listbook',$listbook);;	
		$this->render('admin_listbook','ajax');
		$this->layout = 'default_blank';
	}


	function admin_search(){

		$this->Book->recursive = 2;

		$keyword=$this->data['Book']['keyword']; //get keyword from querystring//

		//$actionactive = $this->params['action'];

		//$activecat = $this->params['pass'][0];
		
		//$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		
		

		$conditions = array(
			
			'OR'=>array("Book.id_buku LIKE '%$keyword%'","Book.isbn LIKE '%$keyword%'","Book.title LIKE '%$keyword%'","Book.penerbit LIKE '%$keyword%'", "Book.pengarang LIKE '%$keyword%'", "Category.name LIKE '%$keyword%'","Book.sinopsis LIKE '%$keyword%'")  
		);
		$books = $this->Book->find('all',array('conditions'=>$conditions)); 
		$this->set('listbook',$books);

		

		$conditions = array('Category.tipe'=>1);
		$categoriesList = $this->Book->Category->find('all',array('conditions'=>$conditions));
		$this->set('categoriesList',$categoriesList);


		
		$this->render('admin_listbook','ajax');
		//$this->layout = 'default_blank';
	}


	function admin_search_modal(){
		
		$this->Book->recursive = 2;
		

		$ketik = $this->data['Book']['input_id'];
		$memberid = $this->data['Book']['member_id'];

		$conditions = array('Book.id_buku'=>$ketik);

		$result = $this->Book->find('first',array('conditions'=>$conditions));

		$this->set('book',$result);
		$this->set('memberid',$memberid);

		$this->layout = 'default_blank';
	}

	function admin_view($id){
		$this->Book->recursive=0;
		$book=$this->Book->read(null,$id);
		$this->set('book',$book);
		$this->layout = 'default_blank';

	}


	function admin_printall(){
		$this->Book->recursive=2;
		$book=$this->Book->find('all');
		$this->set('listbook',$book);
		$this->Book->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Book->Profile->find('all');
		$this->set('profile',$profile);
		$this->layout = 'default_print';
	}


	function admin_chart($year = null){
		
		$base_url = $this->webroot . 'books/chart/';
		$this->set('base_url',$base_url);
		$cur_year =  date('Y');
		$this->set('cur_year',$cur_year);
		if(!$year)
			{
				$year = date('Y');
				
			}
		
			
		$bulan1 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>1,'YEAR(Book.created)'=>$year)));
		$jumlahbulan1 = count($bulan1);
		if(empty($bulan1)){
		$jumlahbulan1 =0;
		}
		
		$bulan2 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>2,'YEAR(Book.created)'=>$year)));
		$jumlahbulan2 = count($bulan2);
		if(empty($bulan2)){
		$jumlahbulan2 =0;
		}
		
		$bulan3 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>3,'YEAR(Book.created)'=>$year)));
		$jumlahbulan3 = count($bulan3);
		if(empty($bulan3)){
		$jumlahbulan3 =0;
		}
		
		$bulan4 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>4,'YEAR(Book.created)'=>$year)));
		$jumlahbulan4 = count($bulan4);
		if(empty($bulan4)){
		$jumlahbulan4 =0;
		}
		
		$bulan5 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>5,'YEAR(Book.created)'=>$year)));
		$jumlahbulan5 = count($bulan5);
		if(empty($bulan5)){
		$jumlahbulan5 =0;
		}
		
		$bulan6 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>6,'YEAR(Book.created)'=>$year)));
		$jumlahbulan6= count($bulan6);
		if(empty($bulan6)){
		$jumlahbulan6 =0;
		}
		
		$bulan7 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>7,'YEAR(Book.created)'=>$year)));
		$jumlahbulan7 = count($bulan7);
		if(empty($bulan7)){
		$jumlahbulan7 =0;
		}
		
		$bulan8 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>8,'YEAR(Book.created)'=>$year)));
		$jumlahbulan8 = count($bulan8);
		if(empty($bulan8)){
		$jumlahbulan8 =0;
		}
		
		$bulan9 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>9,'YEAR(Book.created)'=>$year)));
		$jumlahbulan9 = count($bulan9);
		if(empty($bulan9)){
		$jumlahbulan9 =0;
		}
		
		$bulan10 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>10,'YEAR(Book.created)'=>$year)));
		$jumlahbulan10 = count($bulan10);
		if(empty($bulan10)){
		$jumlahbulan10 =0;
		}
		
		$bulan11 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>11,'YEAR(Book.created)'=>$year)));
		$jumlahbulan11 = count($bulan11);
		if(empty($bulan11)){
		$jumlahbulan11 =0;
		}
		
		$bulan12 = $this->Book->find('all',array('conditions'=>
		array('MONTH(Book.created)'=>12,'YEAR(Book.created)'=>$year)));
		$jumlahbulan12 = count($bulan12);
		if(empty($bulan12)){
		$jumlahbulan12 =0;
		}
		
		
		$this->FusionCharts->create
					(
						'Column3D Chart',
						array
						(
							'type' => 'Column3D',
							'width' => 600,
							'height' => 350,
							'id' => ''
						)
					);
		
				$this->FusionCharts->setChartParams
					(
						'Column3D Chart',
						array
						(
							'caption' => 'Jumlah Buku Baru per tahun',
							'xAxisName' => 'Bulan',
							'yAxisName' => 'Unit',
							'decimalPrecision' => '0',
							'formatNumberScale' => '0'
						)
					);
		
				$this->FusionCharts->addChartData
					(
						'Column3D Chart',
						array
						(
							array('value' => $jumlahbulan1, 'params' => array('name' => 'Jan')),
							array('value' => $jumlahbulan2, 'params' => array('name' => 'Feb')),
							array('value' => $jumlahbulan3, 'params' => array('name' => 'Mar')),
							array('value' => $jumlahbulan4, 'params' => array('name' => 'Apr')),
							array('value' => $jumlahbulan5, 'params' => array('name' => 'May')),
							array('value' => $jumlahbulan6, 'params' => array('name' => 'Jun')),
							array('value' => $jumlahbulan7, 'params' => array('name' => 'Jul')),
							array('value' => $jumlahbulan8, 'params' => array('name' => 'Aug')),
							array('value' => $jumlahbulan9, 'params' => array('name' => 'Sep')),
							array('value' => $jumlahbulan10, 'params' => array('name' => 'Oct')),
							array('value' => $jumlahbulan11, 'params' => array('name' => 'Nov')),
							array('value' => $jumlahbulan12, 'params' => array('name' => 'Dec'))
						)
					);
					
			$this->set('year',$year);
			$this->set(compact('jumlahbulan1','jumlahbulan2','jumlahbulan3','jumlahbulan4','jumlahbulan5','jumlahbulan6','jumlahbulan7','jumlahbulan8','jumlahbulan9','jumlahbulan10','jumlahbulan11','jumlahbulan12'));
			$this->layout = 'default_blank';
	}



}
?>