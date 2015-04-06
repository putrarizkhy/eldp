<?php
class AudiosController extends AppController {

	var $name = 'Audios';
	//var $components = array('RequestHandler'); 

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Audio.created'),'limit'=>'10'); 

	
	//var $helpers = array('Html', 'Form');
	//var $components = array('Filter');
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->set('ModelActive','Audio');
	    $this->set('controllerActive','audios');
	    $this->set('controllerActiveId',5);

	    //$this->set('menuTab', 'Audios');
	    //$this->set('menuTabChild', 'Audios');
	    //$this->Auth->allow('download');
	}
	/*function index() {
		$this->Audio->recursive = 0;

		$this->Audio->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Audio' => array(
		             'className' => 'Audio',
		             'foreignKey'=> 'produksi'
		         )
		        )
		    )
		);
		
		$ebooks = $this->Audio->find('all',array('order' => array('Audio.created' => 'DESC')));
		$this->set('ebooks',$ebooks);

		$videos = $this->Audio->Audio->find('all',array('order' => array('Audio.created' => 'DESC')));
		$this->set('videos',$videos);

	    $listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
	    $listCategoryAudio = $this->Audio->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>2)));
		$this->set(compact('listCategory','listCategoryAudio'));
		
	}*/

	function index(){
		$this->Audio->recursive = 0;

		$actionactive = $this->params['action'];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Audio.favorite'=>1);
			$Audios = $this->paginate($conditions); 
			$this->set('books',$Audios);
			$conditions = array('Category.tipe'=>4);
			$categoriesList = $this->Audio->Category->find('all',array('conditions'=>$conditions));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','true');
		}else{

			$books = $this->paginate(); 
			$this->set('books',$books);
			$conditions = array('Category.tipe'=>4);
			$categoriesList = $this->Audio->Category->find('all',array('conditions'=>$conditions));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','false');

		}

		$this->set('actionactive',$actionactive);
		
	}

	function favorite(){
		$this->Audio->recursive = 0;
		$conditions  = array('Audio.favorite'=>1);
		$Audios = $this->paginate($conditions); 
		$this->set('books',$Audios);
		$conditions = array('Category.tipe'=>4);
		$categoriesList = $this->Audio->Category->find('all',array('conditions'=>$conditions));
		$this->set('categoriesList',$categoriesList);
		$this->set('favoriteactive','true');
		
	}

	function showcategory($id=null){

		$this->Audio->recursive = 0;

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Audio.category_id'=>$id,'Audio.favorite'=>1);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions  = array('Audio.category_id'=>$id);
			$books = $this->paginate($conditions); 
			$this->set('books',$books);

			$this->set('favoriteactive','false');

		}

		$conditions = array('Category.tipe'=>4);
		$categoriesList = $this->Audio->Category->find('all',array('conditions'=>$conditions));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Audio->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}



	function search(){

		$this->Audio->recursive = 0;

		$keyword=$this->params['url']['keyword']; //get keyword from querystring//

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions = array(
				'Audio.favorite'=>1,
				'OR'=>array("Audio.title LIKE '%$keyword%'","Audio.penerbit LIKE '%$keyword%'", "Audio.pengarang LIKE '%$keyword%'","Audio.details LIKE '%$keyword%'")  
			);
			
			$Audios = $this->paginate($conditions); 
			$this->set('books',$Audios);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions = array(
				
				'OR'=>array("Audio.title LIKE '%$keyword%'","Audio.penerbit LIKE '%$keyword%'", "Audio.pengarang LIKE '%$keyword%'","Audio.details LIKE '%$keyword%'")  
			);
			$Audios = $this->paginate($conditions); 
			$this->set('books',$Audios);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Audio->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Audio->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}

	function listAudio(){
		$this->Audio->recursive = 0;
		$listbuku = $this->Audio->find('all');
		$this->set('listbuku',$listbuku);
		$this->layout = 'default_blank';
	}

	function Audiocategory(){
		$this->Category->recursive = 0;
		$Audiocategory = $this->Audio->Category->find('all');
		$this->set('Audiocategory',$Audiocategory);
		$this->layout = 'default_blank';
	}

	




	function showfavorite(){
		$this->Audio->recursive = 0;
		$Audiofavorite = $this->Audio->find('all',array('conditions'=>array('Audio.favorite'=>1)));
		$this->set('Audiofavorite',$Audiofavorite);;	

		$this->layout = 'default_blank';
	}

	function Audios() {
		$this->Audio->recursive = 2;
		
		$Audios = $this->Audio->find('all');
		$this->set('Audios',$Audios);
	    $listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		
	}

	/*function search(){
		$keyword=$this->params['url']['keyword']; //get keyword from querystring//
		//used simpme or condition with singe value checking
		//replace ModelName with actual name of your Appmodel
		$cond=array('OR'=>array("Audio.title LIKE '%$keyword%'","Audio.penerbit LIKE '%$keyword%'", "Audio.pengarang LIKE '%$keyword%'","Audio.details LIKE '%$keyword%'")  );

		$ebooks = $this->Audio->find('all',array('conditions'=>$cond,'order' => array('Audio.created' => 'DESC')));
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

	}*/

	function video() {
		$this->Audio->recursive = 2;
		
		
		$this->set('Audios', $this->paginate());
		
		
		if($this->Auth->user('group_id')==3){
		$AudiosMurid = $this->Audio->find('all');
		$this->set(compact('AudiosMurid'));
		
		}
		
		
	}
	function find_category($id = null ) {
		$this->Audio->recursive = 2;
		if ($id == 'empty'){
			$Audios = $this->Audio->find('all',array('order' => array('Audio.created' => 'DESC')));	
		}else{
			$conditions = array('Audio.category_id'=>$id);
			$Audios = $this->Audio->find('all',array('conditions'=>$conditions,'order' => array('Audio.created' => 'DESC')));
		}
		$this->set(compact('Audios'));
		$this->layout = 'default_blank';

		//$this->render('find_category','ajax');
	}

	function find_category_video($id = null ) {
		$this->Audio->recursive = 2;
		$conditions = array('Audio.type'=>$id);
		$Audios = $this->Audio->find('all',array('conditions'=>$conditions));
		$this->set(compact('Audios'));
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
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
		$this->render('view_thumb','ajax');
	}
	function view_thumb_video($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
		$this->render('view_thumb_video','ajax');
	}

	function lifeskill() {
		$this->Audio->recursive = 2;
		$conditions = array('Audio.type'=>4);
		$eboks = $this->Audio->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function carachter() {
		$this->Audio->recursive = 2;
		$conditions = array('Audio.type'=>5);
		$eboks = $this->Audio->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
		$this->layout = 'default_audio';
	}

	function view_video($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
	}
	
	function find() {
		$this->Audio->recursive = 0;
	    $filter = $this->Filter->process($this);
	    $this->set('Audios', $this->paginate(null, $filter));
	    $listMataPelajaran = $this->Audio->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
	    //$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
	    $listGuru = $this->Audio->User->find('list',array('fields'=>'User.nama','conditions'=>array('User.group_id'=>array(1,2))));
	    
	    /*$listTahunAjaran = $this->Audio->PasTahunAjaran->find('list',array('fields'=>'PasTahunAjaran.tahun','order'=>'PasTahunAjaran.id DESC'));*/
	    //$this->set(compact('assets', $this->paginate()));
	    $this->set(compact('listMataPelajaran','listGuru','listTahunAjaran'));
	    $this->set('menuTabChild', 'AudioFind');
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
				$this->data['Audio']['cover'] = $result['urls'][0];
			}
		}

	return $image_ok;
	}



	function add($type = null) {
		$status = "false";
		if (!empty($this->data)) {
			
			$this->data['Audio']['author'] = 1;
			$this->data['Audio']['type'] = 1;
			$typeSubmitted = $this->data['Audio']['type'];
			
			
			// check for image
			$image_ok = $this->_upload_cover();

			$this->data['Audio']['tahun'] = $this->data['Audio']['tahunBerdiri']['year']; 

			$this->Audio->create();
			if ($this->Audio->save($this->data)) {
				$status = "true";
				$lastID  = $this->Audio->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}
		
		$listMataPelajaran = $this->Audio->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.name'));
		$typeAudio = $type;
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Audio->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('listMataPelajaran','typeAudio','status','listCategory'));
		$this->layout = 'default_blank';
	}

	function add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
		$this->layout = 'default_blank';
	}

	function edit($tipe=null,$id = null) {

		

		//type 1 for ebook 2 for video
		if (!$tipe && !$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Audio', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {

			$this->data['Audio']['author'] = 1;
			$this->data['Audio']['type'] = 1;
			$typeSubmitted = $this->data['Audio']['type'];
			
			// check for image
			
			$image_ok = $this->_upload_cover();
			

			$this->data['Audio']['tahun'] = $this->data['Audio']['tahunBerdiri']['year']; 

			
			if ($this->Audio->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Audio']['id'];
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
			$this->data = $this->Audio->read(null, $id);
		}

		$this->set('Audio', $this->Audio->read(null, $id));
		$listMataPelajaran = $this->Audio->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.nama','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		$this->set(compact('listMataPelajaran','tipe'));

		//$this->set(compact('status','flashMessage','idtoResponse'));

		$this->layout = 'default_blank';
	}


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ebook', $this->Audio->read(null, $id));
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
		if ($this->Audio->del($id)) {
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
		$this->Audio->recursive = 0;
		$this->set('Audios', $this->paginate());
	}

	function administrator_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Audio', $this->Audio->read(null, $id));
	}

	function administrator_add() {
		if (!empty($this->data)) {
			$this->Audio->create();
			if ($this->Audio->save($this->data)) {
				$this->Session->setFlash(__('The Audio has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Audio could not be saved. Please, try again.', true));
			}
		}
	}

	function administrator_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Audio', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Audio->save($this->data)) {
				$this->Session->setFlash(__('The Audio has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Audio could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Audio->read(null, $id);
		}
	}

	function administrator_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Audio', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Audio->del($id)) {
			$this->Session->setFlash(__('Audio deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function download($filename) {
		$this->set('filename',$filename );
	}



	function admin_listaudios(){
		$this->Audio->recursive = 0;
		//$listaudio = $this->Audio->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Audio.created'=>'DESC')
	    );
	    $listaudio = $this->paginate('Audio');
	    //$this->set(compact('data'));

		$this->set('listaudio',$listaudio);
		$this->layout = 'default_blank';
	}


	function admin_add() {
		

		if (!empty($this->data)) {
		
			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/audios', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Audio']['preview'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}
			
			
			$this->data['Audio']['tahun'] = $this->data['Audio']['tahun']['year']; 
			$this->Audio->create();
			
			
			if ($this->Audio->save($this->data)) {
				$status = "true";
				$lastID  = $this->Audio->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));

			}else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
			}
		}


		$conditions = array('Category.tipe'=>4);
		$listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Audio->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('status','listCategory'));


		$this->layout = 'default_blank';



	}

	function admin_add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('audio', $this->Audio->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Audio', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['Audio']['tahun'] = $this->data['Audio']['tahunBerdiri']['year']; 
			if ($this->Audio->save($this->data)) {
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Audio']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Audio->read(null, $id);
		}
		$this->set('audio', $this->Audio->read(null, $id));

		$listCategory = $this->Audio->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.tipe'=>4)));
		$this->set(compact('listCategory'));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Audio.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Audio->read(null, $id));
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
		if ($this->Audio->del($id)) {
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

	function admin_search(){

    $this->Audio->recursive = 2;

    $keyword=$this->data['Audio']['keyword']; //get keyword from querystring//

    //$actionactive = $this->params['action'];

    //$activecat = $this->params['pass'][0];
    
    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

    
    

    $conditions = array(
      
      'OR'=>array("Audio.id_pustaka LIKE '%$keyword%'","Audio.title LIKE '%$keyword%'","Audio.produksi LIKE '%$keyword%'", "Audio.sutradara LIKE '%$keyword%'", "Category.name LIKE '%$keyword%'", "Audio.tahun LIKE '%$keyword%'", "Audio.details LIKE '%$keyword%'")  
    );
    $audio = $this->Audio->find('all',array('conditions'=>$conditions)); 
    $this->set('listaudio',$audio);

    
    $this->render('admin_listaudios','ajax');
    //$this->layout = 'default_blank';
  }

  function admin_view($id){
		$this->Audio->recursive=0;
		$audio=$this->Audio->read(null,$id);
		$this->set('audio',$audio);
		$this->layout = 'default_blank';

	}

	function admin_do_favorite(){
		if (!empty($this->data)) {
			
			
			$idaudio = $this->data['AudioFav']['id'];
			$action = $this->data['AudioFav']['action'];

			$audioonselect = $this->Audio->read(null, $idaudio);
			$current=$audioonselect['Audio']['favourite']=$action;
			//$do_update = ;
			$this->Audio->saveField('favorite',$current);
			
			if ($this->Audio->saveField('favourite',$current)) {
				
				$status = "false";
				if($action ==1){
					$flashMessage = "Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idaudio,$status,$flashMessage));

			} else {
				$status = "true";
				if($action ==1){
					$flashMessage = "Tidak Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Tidak Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idaudio,$status,$flashMessage));
			}
			
			
		}
	
	}


	function admin_showfavorite(){
		$this->Audio->recursive = 2;

		$this->paginate = array(
	        
	        'limit' => 20,
	        'order'=>array('Audio.created'=>'DESC'),
	        'conditions'=>array('Audio.favorite'=>1)
	    );
	    $listaudio = $this->paginate('Audio');
		$this->set('listaudio',$listaudio);;	
		$this->render('admin_listaudios','ajax');
		$this->layout = 'default_blank';
	}
	
	function admin_printall(){
		$this->Audio->recursive=2;
		$listaudio=$this->Audio->find('all');
		$this->set('listaudio',$listaudio);
		$this->Audio->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Audio->Profile->find('all');
		$this->set('profile',$profile);
		$this->layout = 'default_print';
	}



}
?>