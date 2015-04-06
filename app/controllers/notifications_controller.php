<?php
class NotificationsController extends AppController {

	var $name = 'Notifications';
	var $helpers = array('Html', 'Form');


	function showall(){
		$this->Notification->recursive = 0;
		$notification = $this->Notification->find('all');
		$this->set('notification',$notification);
		$this->layout = 'default_blank';
	}


	function add() {
		if (!empty($this->data)) {
			$this->Notification->create();
			$lastID ='';
			if ($this->Notification->save($this->data)) {
				$status = "true";
				$flashmessage = "Notification baru berhasil ditambahkan";
				$lastID  = $this->Notification->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status,$flashmessage));
				
			} else {
				$status = "false";
				$flashmessage = "Kategori baru tidak berhasil ditambahkan, silahkan coba kembali";
				$this->redirect(array('action'=>'add_responses',$lastID,$status,$flashmessage));
				/*$this->Session->setFlash('Data tidak berhasil disimpan, silahkan coba lagi','flash_erorr');
				$this->redirect(array('action'=>'index'));*/
			}

		}
		$this->layout = 'default_blank';
	}


	function add_responses($id,$status,$flashmessage){
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('numbertoshow',$this->Notification->find('count'));
		$this->set('notification', $this->Notification->read(null, $id));
		$this->set('flashmessage',$flashmessage);

		$this->layout = 'default_blank';
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Category', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Notification->save($this->data)) {
				
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Notification']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
				//$this->Session->setFlash('Berhasil Menghapus','flash_success');
				//$this->redirect(array('action'=>'index'));

			} else {
				
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));

			}
		}
		if (empty($this->data)) {
			$this->data = $this->Notification->read(null, $id);
		}

		$this->layout = 'default_blank';
	}


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('notification', $this->Notification->read(null, $id));
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
		if ($this->Notification->del($id)) {
			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}


	function admin_listnotifications(){
		$this->Notification->recursive = 0;
		//$listnotif = $this->Notification->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Notification.created'=>'DESC')
	    );
	    $listnotif = $this->paginate('Notification');
	    //$this->set(compact('data'));

		$this->set('listnotif',$listnotif);
		$this->layout = 'default_blank';
	}



	//function admin_listnotifications(){
		//$this->Notification->recursive = 0;
		//$listnotif = $this->Notification->find('all');
		//$this->set('listnotif',$listnotif);
		//$this->layout = 'default_blank';
	//}

	function admin_add() {
		if (!empty($this->data)) {

			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/users', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Notification']['dir'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Tidak ada gambar.', true));
				}
			
			}


			$this->Notification->create();
			if ($this->Notification->save($this->data)) {
				$status = "true";
				$lastID  = $this->Notification->getInsertID();
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
			$this->Session->setFlash(__('Invalid Notification.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('notif', $this->Notification->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action'=>'index'));
		}


		if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/users', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Notification']['dir'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}



		if (!empty($this->data)) {
			if ($this->Notification->save($this->data)) {
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Notification']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Notification->read(null, $id);
		}
		$this->set('notif', $this->Notification->read(null, $id));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Notification.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Notification->read(null, $id));
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
		if ($this->Notification->del($id)) {
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
		$this->Notification->recursive=0;
		$notif=$this->Notification->read(null,$id);
		$this->set('notif',$notif);
		$this->layout = 'default_blank';

	}



}
?>