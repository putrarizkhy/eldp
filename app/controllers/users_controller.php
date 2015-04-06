<?php
class UsersController extends AppController {
var $name = 'Users';
var $components = array('Auth');
function beforeFilter(){
$this->Auth->allow('*');
}

	function signup(){
	if (!empty($this->data)) {
		if(isset($this->data['User']['password2']))
			$this->data['User']['password2hashed'] = $this->
			Auth->password($this->data['User']['password2']);
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('Selamat anda telah terdaftar');
				$this->redirect(array('controller' => 'users',
				'action'=>'home'));
			} else {
				$this->Session->setFlash('There was an error signing
				up. Please, try again.');
				$this->data = null;
			}
		}
	}
	function login() {
	$this->layout='default-login';
	}
	
	function logout() {
	$this->Session->setFlash('Anda telah berhasil keluar, terima kasih telah menggunakan elips');
	$this->redirect($this->Auth->logout());
	}

	function index(){
		$this->recursive = 2;
		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Book' => array(
		             'className' => 'Book',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);
		$totalbook  = $this->User->Book->find('count');
		$this->set('totalbook',$totalbook);

		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Video' => array(
		             'className' => 'Video',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);
		$totalvideo  = $this->User->Video->find('count');
		$this->set('totalvideo',$totalvideo);


		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Audio' => array(
		             'className' => 'Audio',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);
		$totalaudio  = $this->User->Audio->find('count');
		$this->set('totalaudio',$totalaudio);

		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Ebook' => array(
		             'className' => 'Ebook',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);
		$totalebook = $this->User->Ebook->find('count');
		$this->set('totalebook',$totalebook);


		$this->User->bindModel(
			array('belongsTo' =>
				array(
					'Notification' => array(
						'className' => 'Notification',
						'foreignKey'=> ''
					 )
					)
				)
			);

		$notifclientcondition = array('Notification.active'=>1, 'Notification.publish_date <='=>date('Y-m-d', strtotime('now')), 'Notification.expiration_date >='=>date('Y-m-d', strtotime('now')));
		$notifclient = $this->User->Notification->find('all',array('conditions'=>$notifclientcondition,'order' => array('Notification.created' => 'DESC')));
		$this->set('notifclient', $notifclient);

		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Banner' => array(
		             'className' => 'Banner',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);
		$banner = $this->User->Banner->find('all');
		$this->set('banner',$banner);




		$this->layout='default_home';
	}

	function home(){
	}

	function admin(){
	}

	function change_password() {
	    if (!empty($this->data)) {
	    		$this->data = $this->User->findById(3);
		    	$this->data['User']['password2hashed'] = $this->Auth->password($this->data['User']['password2']);
		        if ($this->User->save($this->data)) {
		            $this->Session->setFlash('Password Telah dirubah.');
		            // call $this->redirect() here
		        } else {
		            $this->Session->setFlash('Password tidak berhasil dirubah.');
		        }
		    
	    } else {
	        
	    }
	}

	function admin_password(){
		
	}

	function admin_index(){

		$this->User->recursive = 0;


		$member = $this->User->find('all');
		$this->set('member',$member);

		$comment = $this->User->Comment->find('all');
		$this->set('comment',$comment);
		

		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Ebook' => array(
		             'className' => 'Ebook',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);

		

		$kumpulanEbookFavorite = $this->User->Ebook->find('all'
			,array('conditions'=>array('Ebook.favorite'=>1))
		);

		$this->set('kumpulanEbookFavorite',$kumpulanEbookFavorite);

		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Category' => array(
		             'className' => 'Category',
		             'foreignKey'=> ''
		         )
		        )
		    )
		);

		$bookcategory = $this->User->Category->find('all');
		$this->set('bookcategory',$bookcategory);



		$this->User->bindModel(
			array('belongsTo' =>
				array(
					'Notification' => array(
						'className' => 'Notification',
						'foreignKey' => ''
						)
					)
				)
			);

		$notification = $this->User->Notification->find('all');
		$this->set('notification',$notification);


		$rentscondition = array('Rent.tipe'=>3, 'Rent.status'=>1, 'Rent.tgl_booking'=>date('Y-m-d',strtotime('now')));
		$booking = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('booking', $booking);

		$rentscondition = array('Rent.status'=>1,'Rent.tipe'=>1, 'Rent.tgl_kembali'=>date('Y-m-d', strtotime('now')));
		$back = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('back', $back);

		$rentscondition = array('Rent.status'=>1,'Rent.tipe'=>1, 'Rent.tgl_kembali <'=>date('Y-m-d', strtotime('now')));
		$late = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('late', $late);


		
		$cur_year =  date('Y');
		$this->set('cur_year',$cur_year);
		
		$this->layout = 'default_admin';

	}

	function admin_login(){
		$this->layout = 'default_login';

	}

	function admin_getlivereport(){

		$rentscondition = array('Rent.tipe'=>3, 'Rent.status'=>1, 'Rent.tgl_booking'=>date('Y-m-d',strtotime('now')));
		$booking = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('booking', $booking);

		$rentscondition = array('Rent.status'=>1,'Rent.tipe'=>1, 'Rent.tgl_kembali'=>date('Y-m-d', strtotime('now')));
		$back = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('back', $back);

		$rentscondition = array('Rent.status'=>1,'Rent.tipe'=>1, 'Rent.tgl_kembali <'=>date('Y-m-d', strtotime('now')));
		$late = $this->User->Rent->find('count',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
		$this->set('late', $late);
		$this->layout = 'default_blank';
	}



	function admin_landing(){

		$this->User->recursive = 0;


		

		$this->layout = 'default_admin';

		
		



	}

	function member(){
		$this->Member->recursive = 0;
		$member = $this->User->find('all');
		$this->set('member',$member);
		$this->layout = 'default_blank';
	}

	

	function comment(){

		
		$this->Comment->recursive = 0;
		$comment = $this->User->Comment->find('all');
		$this->set('comment',$comment);
		$this->layout = 'default_blank';
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			$lastID ='';
			if ($this->User->save($this->data)) {
				$status = "true";
				$flashmessage = "Member baru berhasil ditambahkan";
				$lastID  = $this->User->getInsertID();
				//$this->set('ebookID', $lastID);
				$this->redirect(array('action'=>'add_responses',$lastID,$status,$flashmessage));
				
			} else {
				$status = "false";
				$flashmessage = "Member baru tidak berhasil ditambahkan, silahkan coba kembali";
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
		$this->set('numbertoshow',$this->User->find('count'));
		$this->set('user', $this->User->read(null, $id));
		$this->set('flashmessage',$flashmessage);

		$this->layout = 'default_blank';
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['User']['id'];
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
			$this->data = $this->User->read(null, $id);
		}

		$this->layout = 'default_blank';
	}


	function edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Ebook.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('user', $this->User->read(null, $id));
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
		if ($this->User->del($id)) {
			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;
			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';
		
	}

	function admin_listmembers(){
		$this->User->recursive = 0;
		//$listuser = $this->User->find('all');
		$this->paginate = array(
	        
	        'limit' => 10,
	        'order'=>array('User.created'=>'DESC')
	    );
	    $listuser = $this->paginate('User');
	    //$this->set(compact('data'));

		$this->set('listuser',$listuser);
		$this->layout = 'default_blank';
	}



	//function admin_listmembers(){
		//$this->User->recursive = 0;
		//$listuser = $this->User->find('all');
		//$this->set('listuser',$listuser);
		//$this->layout = 'default_blank';
	//}

	function admin_add() {

		if (!empty($this->data)) {
			
			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/users', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['User']['photo'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}

			$this->User->create();
			if ($this->User->save($this->data)) {
				$status = "true";
				$lastID  = $this->User->getInsertID();
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
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('entry', $this->User->read(null, $id));
		$this->layout = 'default_blank';
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Member', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {

			if(!empty($this->data['File']['image'])){
				$fileOK = $this->uploadFiles('files/users', $this->data['File']);
				if(array_key_exists('urls', $fileOK)) {  
				    // save the url in the form data  
				    $this->data['User']['photo'] = $fileOK['urls'][0];  
				}
				else{
					$this->Session->setFlash(__('Preview photo tidak digunakan.', true));
				}
			
			}

			if ($this->User->save($this->data)) {
				$status = "true";
				$flashMessage = "Berhasil Mengedit Data";
				$idtoResponse = $this->data['User']['id'];
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			} else {
				$status = "false";
				$flashMessage = "Tidak Berhasil Mengedit Data";
				$idtoResponse = 0;
				$this->redirect(array('action'=>'edit_responses',$idtoResponse,$status,$flashMessage));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$this->set('member', $this->User->read(null, $id));

		$this->layout = 'default_blank';
	}


	function admin_edit_responses($id,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid User.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('entry', $this->User->read(null, $id));
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
		if ($this->User->del($id)) {
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


	function admin_search_home_result(){
		$this->User->recursive = 2;
		$ketik = $this->data['User']['input_id'];
		$member = $this->User->find('first', array('conditions' => array('User.id_member'=>$ketik)));

		$bookingcondition = array('Rent.tipe'=>3,'Rent.status'=>1,'Rent.user_id'=>$member['User']['id']);

		$bookings = $this->User->Rent->find('all',array('conditions'=>$bookingcondition));


		$duetoday = $this->User->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$member['User']['id'],'Rent.tipe'=>1,'Rent.status'=>1,array(
		"Rent.tgl_kembali <=" => date('Y-m-d', strtotime("now")))),'recursive'=>0));

		$duemore = $this->User->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$member['User']['id'],'Rent.tipe'=>1,'Rent.status'=>1,array(
		"Rent.tgl_kembali >" => date('Y-m-d', strtotime("now")))),'recursive'=>0));

		$this->set(compact('duetoday','duemore'));


		$this->set(compact('member','bookings'));
		$this->layout = 'default_blank';
		
		
	}

	function admin_view($id){
		$this->User->recursive=0;
		$member=$this->User->read(null,$id);
		$this->set('member',$member);
		$this->layout = 'default_blank';

	}

	function admin_search(){

    $this->User->recursive = 2;

    $keyword=$this->data['User']['keyword']; //get keyword from querystring//

    //$actionactive = $this->params['action'];

    //$activecat = $this->params['pass'][0];
    
    //$favoriteurl=$this->params['url']['favorite']; //get keyword from querystring//

    
    

    $conditions = array(
      
      'OR'=>array("User.username LIKE '%$keyword%'","User.name LIKE '%$keyword%'","User.id_member LIKE '%$keyword%'","User.group_id LIKE '%$keyword%'", "Group.name LIKE '%$keyword%'", "User.email LIKE '%$keyword%'")  
    );
    $member = $this->User->find('all',array('conditions'=>$conditions)); 
    $this->set('listuser',$member);

    
    $this->render('admin_listmembers','ajax');
    //$this->layout = 'default_blank';
  }	

  function admin_printall(){
		$this->User->recursive=2;
		$listuser=$this->User->find('all');
		$this->set('listuser',$listuser);
		$this->User->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->User->Profile->find('all');
		$this->set('profile',$profile);
		$this->layout = 'default_print';
	}

	function admin_changepassword(){
		$this->User->recursive=2;
		$change=$this->User->find('all');
		$this->set('change',$change);
		$this->layout = 'default_blank';
	}

  


}
?>