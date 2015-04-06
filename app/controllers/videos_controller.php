<?php
class VideosController extends AppController {

	var $name = 'Videos';
	//var $components = array('RequestHandler'); 

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Video.created'=>'DESC'),'limit'=>'12'); 

	
	//var $helpers = array('Html', 'Form');
	//var $components = array('Filter');
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->set('menuTab', 'Videos');
	    //$this->set('menuTabChild', 'Videos');
	    //$this->Auth->allow('download');
	    $this->set('ModelActive','Video');
	    $this->set('controllerActive','videos');
	    $this->set('controllerActiveId',3);
	}
	/*function index() {
		$this->Video->recursive = 0;

		$this->Video->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Video' => array(
		             'className' => 'Video',
		             'foreignKey'=> 'produksi'
		         )
		        )
		    )
		);
		
		$ebooks = $this->Video->find('all',array('order' => array('Video.created' => 'DESC')));
		$this->set('ebooks',$ebooks);

		$videos = $this->Video->Video->find('all',array('order' => array('Video.created' => 'DESC')));
		$this->set('videos',$videos);

	    $listCategory = $this->Video->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
	    $listCategoryVideo = $this->Video->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>2)));
		$this->set(compact('listCategory','listCategoryVideo'));
		
	}*/

	function index(){
		$this->Video->recursive = 0;

		$actionactive = $this->params['action'];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Video.favorite'=>1);
			$Videos = $this->paginate($conditions); 
			$this->set('videos',$Videos);
			$categoriesList = $this->Video->Category->find('all',array('conditions'=>array('Category.tipe'=>3)));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','true');
		}else{

			$Videos = $this->paginate(); 
			$this->set('videos',$Videos);
			$categoriesList = $this->Video->Category->find('all',array('conditions'=>array('Category.tipe'=>3)));
			$this->set('categoriesList',$categoriesList);
			$this->set('favoriteactive','false');

		}

		$this->set('actionactive',$actionactive);
		
	}

	function favorite(){
		$this->Video->recursive = 0;
		$conditions  = array('Video.favorite'=>1);
		$Videos = $this->paginate($conditions); 
		$this->set('Videos',$Videos);
		$categoriesList = $this->Video->Category->find('all',array('conditions'=>array('Category.tipe'=>3)));
		$this->set('categoriesList',$categoriesList);
		$this->set('favoriteactive','true');
		
	}

	function showcategory($id=null){

		$this->Video->recursive = 0;

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions  = array('Video.category_id'=>$id,'Video.favorite'=>1);
			$Videos = $this->paginate($conditions); 
			$this->set('videos',$Videos);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions  = array('Video.category_id'=>$id);
			$Videos = $this->paginate($conditions); 
			$this->set('videos',$Videos);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Video->Category->find('all',array('conditions'=>array('Category.tipe'=>3)));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Video->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}



	function search(){

		$this->Video->recursive = 0;

		$keyword=$this->params['url']['keyword']; //get keyword from querystring//

		$actionactive = $this->params['action'];

		$activecat = $this->params['pass'][0];
		
		$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

		if( $favoriteurl == 'true'){
			
			$conditions = array(
				'Video.favorite'=>1,
				'OR'=>array("Video.title LIKE '%$keyword%'","Video.penerbit LIKE '%$keyword%'", "Video.pengarang LIKE '%$keyword%'","Video.details LIKE '%$keyword%'")  
			);
			
			$Videos = $this->paginate($conditions); 
			$this->set('videos',$Videos);
			
			$this->set('favoriteactive','true');
		}else{

			$conditions = array(
				
				'OR'=>array("Video.title LIKE '%$keyword%'","Video.penerbit LIKE '%$keyword%'", "Video.pengarang LIKE '%$keyword%'","Video.details LIKE '%$keyword%'")  
			);
			$Videos = $this->paginate($conditions); 
			$this->set('videos',$Videos);

			$this->set('favoriteactive','false');

		}

		$categoriesList = $this->Video->Category->find('all',array('conditions'=>array('Category.tipe'=>3)));
		$this->set('categoriesList',$categoriesList);
		$activecatname = $this->Video->Category->read(null,$activecat);

		$this->set('actionactive',$actionactive);
		$this->set('activecat',$activecat);
		$this->set('activecatname',$activecatname);
		
		$this->render('index');
	}

	function listVideo(){
		$this->Video->recursive = 0;
		$Video = $this->Video->find('all');
		$this->set('listVideo',$Video);
		$this->layout = 'default_blank';
	}

	function Videocategory(){
		$this->Category->recursive = 0;
		$Videocategory = $this->Video->Category->find('all');
		$this->set('Videocategory',$Videocategory);
		$this->layout = 'default_blank';
	}

	




	function showfavorite(){
		$this->Video->recursive = 0;
		$Videofavorite = $this->Video->find('all',array('conditions'=>array('Video.favorite'=>1)));
		$this->set('Videofavorite',$Videofavorite);;	

		$this->layout = 'default_blank';
	}

	function Videos() {
		$this->Video->recursive = 2;
		
		$Videos = $this->Video->find('all');
		$this->set('Videos',$Videos);
	    $listCategory = $this->Video->Category->find('list',array('fields'=>'Category.name','conditions'=>array('Category.type'=>1)));
		$this->set(compact('listCategory'));
		
	}

	/*function search(){
		$keyword=$this->params['url']['keyword']; //get keyword from querystring//
		//used simpme or condition with singe value checking
		//replace ModelName with actual name of your Appmodel
		$cond=array('OR'=>array("Video.title LIKE '%$keyword%'","Video.penerbit LIKE '%$keyword%'", "Video.pengarang LIKE '%$keyword%'","Video.details LIKE '%$keyword%'")  );

		$ebooks = $this->Video->find('all',array('conditions'=>$cond,'order' => array('Video.created' => 'DESC')));
		$this->set(compact('ebooks'));
		$this->layout = 'default_blank';

	}*/

	function video() {
		$this->Video->recursive = 2;
		
		
		$this->set('Videos', $this->paginate());
		
		
		if($this->Auth->user('group_id')==3){
		$VideosMurid = $this->Video->find('all');
		$this->set(compact('VideosMurid'));
		
		}
		
		
	}
	function find_category($id = null ) {
		$this->Video->recursive = 2;
		if ($id == 'empty'){
			$ebooks = $this->Video->find('all',array('order' => array('Video.created' => 'DESC')));	
		}else{
			$conditions = array('Video.category_id'=>$id);
			$ebooks = $this->Video->find('all',array('conditions'=>$conditions,'order' => array('Video.created' => 'DESC')));
		}
		$this->set(compact('Videos'));
		$this->layout = 'default_blank';

		//$this->render('find_category','ajax');
	}

	function find_category_video($id = null ) {
		$this->Video->recursive = 2;
		$conditions = array('Video.type'=>$id);
		$ebooks = $this->Video->find('all',array('conditions'=>$conditions));
		$this->set(compact('Videos'));
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
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Video', $this->Video->read(null, $id));
		$this->render('view_thumb','ajax');
	}
	function view_thumb_video($id=null){

		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Video', $this->Video->read(null, $id));
		$this->render('view_thumb_video','ajax');
	}

	function lifeskill() {
		$this->Video->recursive = 2;
		$conditions = array('Video.type'=>4);
		$eboks = $this->Video->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function carachter() {
		$this->Video->recursive = 2;
		$conditions = array('Video.type'=>5);
		$eboks = $this->Video->find('all',array('conditions'=>$conditions));
		$this->set(compact('eboks'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Video', $this->Video->read(null, $id));
		$this->layout = 'default_ebook';
	}

	function view_video($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Video', $this->Video->read(null, $id));
	}
	
	function find() {
		$this->Video->recursive = 0;
	    $filter = $this->Filter->process($this);
	    $this->set('Videos', $this->paginate(null, $filter));
	    $listMataPelajaran = $this->Video->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
	    //$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
	    $listGuru = $this->Video->User->find('list',array('fields'=>'User.nama','conditions'=>array('User.group_id'=>array(1,2))));
	    
	    /*$listTahunAjaran = $this->Video->PasTahunAjaran->find('list',array('fields'=>'PasTahunAjaran.tahun','order'=>'PasTahunAjaran.id DESC'));*/
	    //$this->set(compact('assets', $this->paginate()));
	    $this->set(compact('listMataPelajaran','listGuru','listTahunAjaran'));
	    $this->set('menuTabChild', 'VideoFind');
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
				$this->data['Video']['cover'] = $result['urls'][0];
			}
		}

	return $image_ok;
	}



	function admin_add($type = null) {
		$status = "false";
		if (!empty($this->data)) {
			
			$this->data['Video']['author'] = 1;
			$this->data['Video']['type'] = 1;
			$typeSubmitted = $this->data['Video']['type'];
			
			
			// check for image
			$image_ok = $this->_upload_cover();

			$this->data['Video']['tahun'] = $this->data['Video']['tahunBerdiri']['year']; 

			$this->Video->create();
			if ($this->Video->save($this->data)) {
				$status = "true";
				$lastID  = $this->Video->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}
		
		$listMataPelajaran = $this->Video->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		
		$conditions = array('Category.tipe'=>3);
		$listCategory = $this->Video->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		$typeVideo = $type;
		//$fieldsKelas = 'PasRombel.KETERANGAN,PasRombel.ID_RUANG_KELAS';
		/*$listKelas = $this->Video->PasRombel->find('list',array('fields'=>'PasRombel.nama','conditions'=>array('tahun_ajaran_id'=>$this->Session->read('tahunAjaran'))));*/
		$this->set(compact('listMataPelajaran','typeVideo','status','listCategory'));
		$this->layout = 'default_blank';
	}

	function admin_add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->Video->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit() {

		if (!empty($this->data)) {

			$this->data['Video']['author'] = 1;
			$this->data['Video']['type'] = 1;
			$typeSubmitted = $this->data['Video']['type'];
			
			// check for image
			
			$image_ok = $this->_upload_cover();
			

			$this->data['Video']['tahun'] = $this->data['Video']['tahunBerdiri']['year']; 

			
			if ($this->Video->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Video']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Video->read(null, $id);
		}

		$this->set('video', $this->Video->read(null, $id));
		$listMataPelajaran = $this->Video->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		$conditions = array('Category.tipe'=>3);
		$listCategory = $this->Video->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		$this->set(compact('listCategory'));
		$this->set(compact('listMataPelajaran','tipe'));

		//$this->set(compact('status','flashMessage','idtoResponse'));

		$this->layout = 'default_blank';
	}


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('video', $this->Video->read(null, $id));
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
		if ($this->Video->del($id)) {
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
		$this->Video->recursive = 0;
		$this->set('Videos', $this->paginate());
	}

	function administrator_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('Video', $this->Video->read(null, $id));
	}

	function administrator_add() {
		if (!empty($this->data)) {
			$this->Video->create();
			if ($this->Video->save($this->data)) {
				$this->Session->setFlash(__('The Video has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Video could not be saved. Please, try again.', true));
			}
		}
	}

	function administrator_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Video', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Video->save($this->data)) {
				$this->Session->setFlash(__('The Video has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Video could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Video->read(null, $id);
		}
	}

	function administrator_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Video', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Video->del($id)) {
			$this->Session->setFlash(__('Video deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function download() {
		$filename=$this->params['url']['filename']; //get keyword from querystring//
		$mimetype=$this->params['url']['mimetype']; //get keyword from querystring//

		$this->force_download($filename,'files/videos/'.$filename);
		return true;



	}


	function admin_listvideo(){
		$this->Video->recursive = 0;
		//$listvideo = $this->Video->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Video.created'=>'DESC')
	    );
	    $listvideo = $this->paginate('Video');
	    //$this->set(compact('data'));

		$this->set('listvideo',$listvideo);
		$this->layout = 'default_blank';
	}


	


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Video.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Video->read(null, $id));
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
		if ($this->Video->del($id)) {
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

    $this->Video->recursive = 2;

    $keyword=$this->data['Video']['keyword']; //get keyword from querystring//

    //$actionactive = $this->params['action'];

    //$activecat = $this->params['pass'][0];
    
    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

    
    

    $conditions = array(
      
      'OR'=>array("Video.id_buku LIKE '%$keyword%'","Video.title LIKE '%$keyword%'","Video.tahun LIKE '%$keyword%'","Video.details LIKE '%$keyword%'", "Video.sutradara LIKE '%$keyword%'", "Category.name LIKE '%$keyword%'", "Video.produksi LIKE '%$keyword%'")  
    );
    $video = $this->Video->find('all',array('conditions'=>$conditions)); 
    $this->set('listvideo',$video);

    
    $this->render('admin_listvideo','ajax');
    //$this->layout = 'default_blank';
  }

  function admin_view($id){
		$this->Video->recursive=0;
		$video=$this->Video->read(null,$id);
		$this->set('video',$video);
		$this->layout = 'default_blank';

	}


	function admin_do_favorite(){
		if (!empty($this->data)) {
			
			
			$idvideo = $this->data['VideoFav']['id'];
			$action = $this->data['VideoFav']['action'];

			$videoonselect = $this->Video->read(null, $idvideo);
			$current=$videoonselect['Video']['favourite']=$action;
			//$do_update = ;
			$this->Video->saveField('favorite',$current);
			
			if ($this->Video->saveField('favourite',$current)) {
				
				$status = "false";
				if($action ==1){
					$flashMessage = "Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idvideo,$status,$flashMessage));

			} else {
				$status = "true";
				if($action ==1){
					$flashMessage = "Tidak Berhasil Menjadikan favourite";
				}else{
					$flashMessage = "Tidak Berhasil Membuang dari favourite";
				}
				$this->redirect(array('action'=>'admin_edit_responses',$idvideo,$status,$flashMessage));
			}
			
			
		}
	
	}



	//function admin_do_favorite(){
		//if (!empty($this->data)) {
			
			
			//$idbuku = $this->data['BookFav']['id'];
			//$action = $this->data['BookFav']['action'];

			//$bukuonselect = $this->Video->read(null, $idbuku);
			//$current=$bukuonselect['Video']['favorite']=$action;
			//$do_update = ;
			//$this->Video->saveField('favorite',$current);
			
			//if ($this->Video->saveField('favorite',$current)) {
				
				//$status = "false";
				//if($action ==1){
				//	$flashMessage = "Berhasil Menjadikan favourite";
				//}else{
					//$flashMessage = "Berhasil Membuang dari favourite";
				//}
				//$this->redirect(array('action'=>'admin_edit_responses',$idbuku,$status,$flashMessage));

			//} else {
				//$status = "true";
				//if($action ==1){
					//$flashMessage = "Tidak Berhasil Menjadikan favourite";
				//}else{
					//$flashMessage = "Tidak Berhasil Membuang dari favourite";
				//}
				//$this->redirect(array('action'=>'admin_edit_responses',$idbuku,$status,$flashMessage));
			//}
			
			
		//}
	
	//}





	function admin_showfavorite(){
		$this->Video->recursive = 2;

		$this->paginate = array(
	        
	        'limit' => 20,
	        'order'=>array('Video.created'=>'DESC'),
	        'conditions'=>array('Video.favorite'=>1)
	    );
	    $listvideo = $this->paginate('Video');
		$this->set('listvideo',$listvideo);;	
		$this->render('admin_listvideo','ajax');
		$this->layout = 'default_blank';
	}


	//function admin_showfavorite(){
		//$this->Video->recursive = 0;
		//$videofavorite = $this->Video->find('all',array('conditions'=>array('Video.favorite'=>1)));
		//$this->set('listvideo',$videofavorite);	
		//$this->render('admin_listvideo','ajax');
		//$this->layout = 'default_blank';
	//}


	function admin_printall(){
		$this->Video->recursive=2;
		$listvideo=$this->Video->find('all');
		$this->set('listvideo',$listvideo);
		$this->Video->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Video->Profile->find('all');
		$this->set('profile',$profile);
		$this->layout = 'default_print';
	}


}
?>