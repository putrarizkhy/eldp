<?php
class PlansController extends AppController {

	var $name = 'Plans';
	//var $components = array('RequestHandler'); 

	var $helpers = array('Html', 'Form','Excerpt','Magick');
	var $paginate = array('order'=>array('Plan.created'=>'DESC'),'limit'=>'12'); 
	

	
	
	function admin_listplan(){
		$this->Plan->recursive = 2;
		//$listbook = $this->Book->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('Plan.created'=>'DESC')
	    );
	    $listplan = $this->paginate('Plan');
	    //$this->set(compact('data'));
		$this->set('listplan',$listplan);
		$this->layout = 'default_blank';
	}


	function admin_add() {
		
		
		if (!empty($this->data)) {
		
			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/plans', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Plan']['file'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Cover Pengadaan tidak digunakan.', true));
				}
			
			}
			
			
			$this->Plan->create();
			
			
			if ($this->Plan->save($this->data)) {
				$status = "true";
				$lastID  = $this->Plan->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status));

			}else {
				$status = "false";
				$this->redirect(array('action'=>'add_responses',$lastID,$status));
			}
		}
		//$attributes = $this->Book->Attribute->find('list');
		$conditions = array('Category.tipe'=>1);
		$categories = $this->Plan->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		
		
		$this->set(compact('categories'));
		$this->layout = 'default_blank';
	}
	

	function admin_add_responses($id,$status){
		$this->Plan->recursive = 2;
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Plan.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->Plan->read(null, $id));
		$this->layout = 'default_blank';
	}


	function admin_edit() {

		if (!empty($this->data)) {

			//$this->data['Book']['author'] = 1;
			//$this->data['Book']['type'] = 1;
			//$typeSubmitted = $this->data['Book']['type'];
			
			// check for image
			
			if(!empty($this->data['File']['dir'])){
				$fileOK = $this->uploadFiles('files/plans', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['Plan']['file'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview plan tidak digunakan.', true));
				}
			
			}
			

			//$this->data['Book']['tahun'] = $this->data['Book']['tahunBerdiri']['year']; 

			
			if ($this->Plan->save($this->data)) {

				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['Plan']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Plan->read(null, $id);
		}

		$this->set('plan', $this->Plan->read(null, $id));
		//$listMataPelajaran = $this->Book->Pelajaran->find('list',array('fields'=>'Pelajaran.nama'));
		//$conditions = array('Category.tipe'=>1);
		//$categories = $this->Book->Category->find('list',array('fields'=>'Category.name','conditions'=>$conditions));
		//$this->set(compact('categories'));
		//$this->set(compact('tipe'));

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
		if ($this->Plan->del($id)) {
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
			$this->Session->setFlash(__('Invalid Plan.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->Plan->read(null, $id));
		$this->set(compact('status','flashMessage'));
		$this->layout = 'default_blank';

		
	}

	

	function admin_view($id){
		$this->Plan->recursive=0;
		$plan=$this->Plan->read(null,$id);
		$this->set('plan',$plan);
		$this->layout = 'default_blank';

	}




}
?>