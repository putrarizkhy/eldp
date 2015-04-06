<?php
class CommentsController extends AppController {

	var $name = 'Comments';
	var $helpers = array('Html', 'Form');


	function comment(){

		
		$this->Comment->recursive = 0;
		$comment = $this->Comment->find('all');
		$this->set('comment',$comment);
		$this->layout = 'default_blank';
	}
	

	/*function getListCategories(){
		$this->Category->recursive = 0;
		$categoriesList = $this->Category->find('all');
		$this->set('categoriesList',$categoriesList);
		$this->render('/elements/category_list');
	}*/

	function add() {
		if (!empty($this->data)) {
			//find user first
			$usermemberid = $this->data['Rent']['usermemberid'];

			$user = $this->Comment->User->find('first', array('conditions' => array('User.id_member'=>$usermemberid)));

			if(!$user){

				$status= 3;
				$flashMessage = "Tidak ditemukan ID yang dimasukkan, silahkan masukkan ID yang benar";
				//$usermemberid = $this->data['Rent']['usermemberid'];

			}else{
				$this->data['Comment']['user_id'] = $user['User']['id'];
				$this->Comment->create();
				if ($this->Comment->save($this->data)) {
					$status = 1;
					$lastID  = $this->Comment->getInsertID();
					$comment = $this->Comment->read(null, $lastID);
					$flashMessage = "Komentar berhasil ditambahkan";
					//$this->set('ebookID', $lastID);
					//$this->redirect(array('action'=>'add_responses',$lastID,$status));
					
				} else {
					$status = 2;

					$flashMessage = "Komentar tidak berhasil ditambahkan, silahkan coba kembali";
					//$this->redirect(array('action'=>'add_responses',$lastID,$status));
					/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
					$this->redirect(array('action'=>'index'));*/
				}
			}
			

			$this->set('status',$status);
			$this->set('flashMessage',$flashMessage);
			$this->set('comment',$comment);
		}


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
		if ($this->Comment->del($id)) {
			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}

	function admin_listcomments(){
		$this->Comment->recursive = 0;

		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Comment.created'=>'DESC')
	    );
	    $listcomment = $this->paginate('Comment');
		
		$this->set('listcomment',$listcomment);
		$this->layout = 'default_blank';
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$status = "true";
				$lastID  = $this->Comment->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				
			} else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}
		}


		$this->layout = 'default_blank';



	}



	
	function admin_add_responses($id,$status){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Comment.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->Comment->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Comment']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Comment->read(null, $id);
		}
		$this->set('comment', $this->Comment->read(null, $id));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Category.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Comment->read(null, $id));
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
		if ($this->Comment->del($id)) {
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

	function show_comments( $tipepustaka  = null,$idpustaka = null){
		
			//1 for book
			//2 for ebooks
			//3 for videos
			//4 for cd
			//5 for audio
			//6 for photos

		
			$conditions = array(
				'conditions'=>array(
					'Comment.library_type'=>$tipepustaka,
					'Comment.library_id'=>$idpustaka,
				),
				
				'order' => array('Comment.created ASC')
			);
			$comments = $this->Comment->find('all',$conditions);
			$this->set('comments',$comments);
			$this->set(compact('tipepustaka','idpustaka'));
		
		$this->layout = 'default_blank';
	}

	function admin_search(){

	    $this->Comment->recursive = 2;

	    $keyword=$this->data['Comment']['keyword']; //get keyword from querystring//

	    //$actionactive = $this->params['action'];

	    //$activecat = $this->params['pass'][0];
	    
	    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

	    
	    
	    
	    $conditions = array(
	      
	      'OR'=>array("Comment.content LIKE '%$keyword%'","User.name LIKE '%$keyword%'")  
	    );
	    $listcomment = $this->Comment->find('all',array('conditions'=>$conditions)); 
	    $this->set('listcomment',$listcomment);

	    
	    $this->render('admin_listcomments','ajax');
	    //$this->layout = 'default_blank';
  	}

}
?>