<?php
class RentsController extends AppController {

	var $name = 'Rents';
	var $helpers = array('Html', 'Form');


	//var $components = array('Filter');
	//DELETE THIS FUNCTION WHEN DEVELOPMENT FINISH 
	function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('*');
	}
	
	

	function index() {
		$this->Rent->recursive = 0;
		$this->set('rents', $this->paginate());
	}

	function admin_list(){
		$this->Rent->recursive = 0;
		$rentscondition = array('Rent.tipe'=>1, 'Rent.status'=>1);
		//$rents = $this->Notification->find('all');
		$this->paginate = array(
	        'conditions'=>$rentscondition,
	        'limit' => 20,
	        'order'=>array('Rent.modified'=>'DESC')
	    );
	    $rents = $this->paginate('Rent');
	    //$this->set(compact('data'));

		$this->set('tipe',$tipe);
		$this->set('rents', $rents);
		$this->layout = 'default_blank';
	}


	//function admin_list($tipe = null,$user_id = null) {
	//	$this->Rent->recursive = 0;
		//$datestart=$this->params['url']['datestart']; //get keyword from querystring//
		//$datefinish=$this->params['url']['datefinish']; //get keyword from querystring//

		

		//if(!$datestart && !$datefinish && !$user_id){
			//$rentscondition = array('Rent.tipe'=>$tipe,'Rent.status'=>1,);
		//}elseif (!$datestart && !$datefinish) {
			//$rentscondition = array('Rent.tipe'=>$tipe,'Rent.status'=>1,'Rent.user_id'=>$user_id);
			
		//}else{
			//$rentscondition = array('Rent.tgl_pinjam' => date('Y-m-d', strtotime('now')),'Rent.tipe'=>$tipe,'Rent.status'=>1);
		//}

		//tipe
		//1 = 
		
	//	$rentscondition = array('Rent.tipe'=>1, 'Rent.status'=>1);
	//	$rents = $this->Rent->find('all',array('conditions'=>$rentscondition,'order' => array('Rent.modified' => 'DESC')));
	//	$this->set('rents', $rents);
	//	$this->set('tipe',$tipe);
	//	$this->layout = 'default_blank';
	//}

	function admin_listback($tipe = null,$user_id = null) {
		$this->Rent->recursive = 0;
		
		$this->paginate = array(
	        'conditions'=>array('Rent.status'=>2,'Rent.tipe'=>array(2,4)),
	        'limit' => 20,
	        'order'=>array('Rent.modified'=>'DESC')
	    );
	    $rents = $this->paginate('Rent');

		
		
		$this->set('rents', $rents);
		$this->set('tipe',$tipe);
		$this->layout = 'default_blank';
	}

	function admin_listbooking($tipe = null,$user_id = null) {
		$this->Rent->recursive = 0;
		
		$this->paginate = array(
	        'conditions'=>array('Rent.tipe'=>3, 'Rent.status'=>1),
	        'limit' => 20,
	        'order'=>array('Rent.modified'=>'DESC')
	    );
	    $rents = $this->paginate('Rent');

		
		
		$this->set('rents', $rents);
		$this->set('tipe',$tipe);
		$this->layout = 'default_blank';
	}


	

	function view($id = null) {
		$this->Rent->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rent.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('rent', $this->Rent->read(null, $id));
	}
	
	function admin_add() {
		$members = $this->Rent->User->read(null, $this->data['Rent']['user_id']);
		$banyak_peminjaman = $this->Rent->find('count',array('conditions'=>
		array('Rent.user_id'=>$this->data['Rent']['user_id'],'Rent.tipe'=>1,'Rent.status'=>1)));
		$jatah_pinjam = $members['Group']['jatah_peminjaman'];
		if($banyak_peminjaman >= $jatah_pinjam){
			
			$this->render('add_penuh','ajax');

		}else{
			if (!empty($this->data)) {
				$this->Rent->create();
				$this->data['Rent']['status'] = 1;
				$this->data['Rent']['tipe'] = 1;
				$idbuku = $this->data['Rent']['book_id'];
				
				$bukuonrent = $this->Rent->Book->read(null, $idbuku);
				$current=$bukuonrent['Book']['onrent']+1;
				//$do_update = ;
				$this->Rent->Book->saveField('onrent',$current);

				if ($this->Rent->save($this->data)) {
					//set for book are rent
					$lastID  = $this->Rent->getInsertID();

					$rent  = $this->Rent->read(null, $lastID);
					
					$this->set('rent',$rent);
					$this->render('add_success','ajax');
				} else {
					$this->render('add_failed','ajax');
				}
				
				
			}
			$books = $this->Rent->Book->find('list');
			
			$this->set(compact('books'));
		}
	}
	
	function pinjam($userid = null) {
		
		//Configure::write('debug', '0');
		$this->set($userid,'userid');
		$this->Rent->recursive = 2;
		$this->set('member', $this->Rent->User->read(null, $userid));
		$members = $this->Rent->User->read(null, $userid);
		$banyak_peminjaman = $this->Rent->find('count',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>1)));
		$jatah_pinjam = $members['Group']['jatah_peminjaman'];
		
		if(empty($banyak_peminjaman)){
			$idbuku=$this->data['Book']['input_id'];
			$books = $this->Rent->Book->find('list');
			$this->set(compact('books','banyak_peminjaman'));
		}
		
		else if($banyak_peminjaman >= $jatah_pinjam){
			$this->Session->setFlash(__('Member ini melebihi kuota peminjaman, silahkan balikan buku yang telah dipinjam terlebih dahulu', true));
			$this->redirect(array('action'=>'kembali'.'/'.$userid));
		}
		else{
			$idbuku=$this->data['Book']['input_id'];
			$books = $this->Rent->Book->find('list');
			$this->set(compact('books','banyak_peminjaman'));
		}
		$this->set('booking_list', $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>3))));
		
	
	}
	
	function booking_process($userid = null) {
		
		//Configure::write('debug', '0');
		$this->set($userid,'userid');
		$this->Rent->recursive = 2;
		$this->set('member', $this->Rent->User->read(null, $userid));
		$members = $this->Rent->User->read(null, $userid);
		$banyak_peminjaman = $this->Rent->find('count',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>1)));
		$jatah_pinjam = $members['Group']['jatah_peminjaman'];
		
		
		
		
		$this->set('booking_list', $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>3))));
		
	
	}
	
	
	
	function kembali($userid = null) {
		$this->Rent->recursive = 2;
		//Configure::write('debug', '0');
		$this->set($userid,'userid');
		$this->Rent->recursive = 0;
		$today = date('Y-m-d');
		$this->set('today',$today);
		$idbuku=$this->data['Book']['input_id'];
		$this->set('member', $this->Rent->User->read(null, $userid));
		$duetoday = $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>1,array(
		"Rent.tgl_kembali =" => date('Y-m-d', strtotime("now")))),'recursive'=>2,'order' => array('Rent.tgl_kembali ASC')));
		$duemore = $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>1,array(
		"Rent.tgl_kembali <" => date('Y-m-d', strtotime("now")))),'recursive'=>2,'order' => array('Rent.tgl_kembali ASC')));
		$notdue = $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>1,array(
		"Rent.tgl_kembali >" => date('Y-m-d', strtotime("now")))),'recursive'=>2,'order' => array('Rent.tgl_kembali ASC')));
		$this->set(compact('duetoday','duemore','notdue'));
		
	}
	
	function history($userid = null) {
		
		//Configure::write('debug', '0');
		$this->set($userid,'userid');
		$this->Rent->recursive = 0;
		$today = date('Y-m-d');
		$this->set('today',$today);
		$idbuku=$this->data['Book']['input_id'];
		$this->set('member', $this->Rent->User->read(null, $userid));
		$rents = $this->Rent->find('all',array('conditions'=>
		array('Rent.user_id'=>$userid,'Rent.status'=>array(0,1,2)),'recursive'=>2,'order' => array('Rent.tgl_pinjam DESC')));
		
		$this->set(compact('rents'));
		
	}
	
	function history_advance($print =null) {
		$this->set('print',$print);
		$tgl_start_hari=$this->data['Rent']['tgl_awal']['day'];
		$tgl_start_bulan=$this->data['Rent']['tgl_awal']['month'];
		$tgl_start_tahun=$this->data['Rent']['tgl_awal']['year'];
		$tgl_finish_hari=$this->data['Rent']['tgl_akhir']['day'];
		$tgl_finish_bulan=$this->data['Rent']['tgl_akhir']['month'];
		$tgl_finish_tahun=$this->data['Rent']['tgl_akhir']['year'];
		$tgl_start = $tgl_start_tahun.'/'.$tgl_start_bulan.'/'.$tgl_start_hari;
		$tgl_finish = $tgl_finish_tahun.'/'.$tgl_finish_bulan.'/'.$tgl_finish_hari;
		
		
		//Configure::write('debug', '0');
		
		$this->Rent->recursive = 0;
		/*$condition = 'Rent.tgl_pinjam >= to_date(''.$tgl_start.'','yyyy/mm/dd') AND Rent.tgl_pinjam >= to_date(''.$tgl_start.'','yyyy/mm/dd');*/
		$filter = $this->Filter->process($this);
		$rents = $this->Rent->find('all',array(
			'conditions'=>array(
				'and'=>array(
					'Rent.tgl_pinjam <= '=>$tgl_finish,
					'Rent.tgl_pinjam >= '=>$tgl_start,
				)
			),
		'recursive'=>2,'order' => array('Rent.tgl_pinjam DESC')),$this->paginate(null, $filter));
		
		
		
		$this->set(compact('rents'));
		if($print == "print"){
		$this->layout = 'print-preview';
		}
		
		
	}
	
	function do_back($id = null,$book_id=null) {
		$this->set('id',$id);
		$this->set('book_id',$book_id);
		if (!$id) {
			$this->render('back_failed','ajax');
		}
		$this->Rent->recursive = 0;
		$this->data['status'] = 0;
		$this->data['tgl_dikembalikan'] = date('Y-m-d', strtotime("now"));
		$bukuonrent = $this->Rent->Book->read(null, $book_id);
		$current=$bukuonrent['Book']['onrent']-1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);
		
		if ($this->Rent->save($this->data)) {
			
			$this->set('rent', $this->Rent->read(null, $id));
			
			$this->render('back_success','ajax');
		}
	}
	function booked() {
		
		
		if (!empty($this->data)) {

			$usermemberid = $this->data['Rent']['usermemberid'];

			$user = $this->Rent->User->find('all', array('conditions' => array('User.id_member'=>$usermemberid)));

			if(!$user){

				$status= 3;
				$flashMessage = "Tidak ditemukan ID yang dimasukkan, silahkan masukkan ID yang benar";
				$usermemberid = $this->data['Rent']['usermemberid'];
				

			}else{

				$userid = $user[0]['User']['id'];

				//$userid = $this->data['user_id'];
				$book_id = $this->data['Rent']['book_id'];
				$this->Rent->recursive = 2;
		
				$members = $this->Rent->User->read(null, $userid);
				$banyak_peminjaman = $this->Rent->find('count',array('conditions'=>
				array('Rent.user_id'=>$userid,'Rent.tipe'=>1,'Rent.status'=>1)));

				$jatah_pinjam = $members['Group']['jatah_peminjaman'];

				$banyak_booking = $this->Rent->find('count',array('conditions'=>
				array('Rent.user_id'=>$userid,'Rent.tipe'=>3)));

				$jatah_booking = $members['Group']['jatah_booking'];

				$book = $this->Rent->Book->read(null, $book_id);

				$available = $book['Book']['jml_buku']-($book['Book']['jml_rusak']+$book['Book']['onrent']);


				
				if($banyak_peminjaman >= $jatah_pinjam){
					
					$status= 2;
					$flashMessage = "Tidak dapat meminjam, anda melebihi batas pinjam";
				}

				else if($available <= 0){
					$status= 2;
					$flashMessage = "Buku sudah tidak tersedia";
				}

				else if($banyak_booking >= $jatah_booking){
					$status= 2;
					$flashMessage = "Tidak dapat meminjam, anda melebihi batas booking";
				}
				else{
					
					if (!$userid) {
						$status= 2;
						$flashMessage = "Tidak dapat meminjam, silahkan coba kembali";
					}
					
					$this->Rent->create();
					$this->Rent->recursive = 0;
					$this->data['Rent']['status'] = 1;
					$this->data['Rent']['user_id'] = $userid;
					$this->data['Rent']['tipe'] = 3;

					
					
					$this->data['Rent']['tgl_booking'] = date('Y-m-d', strtotime("now"));
					
					$bukuonrent = $this->Rent->Book->read(null, $book_id);
					$current=$bukuonrent['Book']['onrent']+1;
					//$do_update = ;
					$this->Rent->Book->saveField('onrent',$current);


					
					if ($this->Rent->save($this->data)) {
						$booktocheck = $this->Rent->Book->read(null, $book_id);
						$available_book = $booktocheck['Book']['jml_buku']-($booktocheck['Book']['jml_rusak']+$booktocheck['Book']['onrent']);
						$status= 1;
						$flashMessage = "Berhasil membooking buku";
					}
				}

			}

			$this->set('status',$status);
			$this->set('flashMessage',$flashMessage);
			$this->set('usermemberid',$usermemberid);
			$this->set('jatah_pinjam',$jatah_pinjam);
			$this->set('bookid',$book_id);
			$this->set('available_book',$available_book);
			
			$this->layout = 'default_blank';
		}
		
	}

	function admin_cancelbook($id = null){

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
		$rentid = $this->Rent->read(null, $bookid);
		$bookid = $rentid['Rent']['book_id'];
		if ($this->Rent->del($id)) {

			$status = "true";
			$flashMessage = "Berhasil Menghapus";
			$idtodelete = $id;

			$bukuonrent = $this->Rent->Book->read(null, $bookid);
			$current=$bukuonrent['Book']['onrent']-1;
			//$do_update = ;
			$this->Rent->Book->saveField('onrent',$current);

			//$this->Session->setFlash('Berhasil Menghapus','flash_success');
			//$this->redirect(array('action'=>'index'));

		}
		$this->set(compact('status','flashMessage','idtodelete'));
		$this->layout = 'default_blank';

	}
	
	function do_loose($id = null,$book_id=null) {
		$this->set('id',$id);
		$this->set('book_id',$book_id);
		if (!$id) {
			$this->render('back_failed','ajax');
		}
		$this->Rent->recursive = 0;
		$this->data['status'] = 2;
		$bukuonrent = $this->Rent->Book->read(null, $book_id);
		$current=$bukuonrent['Book']['onrent']-1;
		$loose=$bukuonrent['Book']['jml_rusak']+1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);
		$this->Rent->Book->saveField('jml_rusak',$loose);
		
		
		if ($this->Rent->save($this->data)) {
			
			$this->set('rent', $this->Rent->read(null, $id));
			
			$this->render('back_success','ajax');
		}
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Rent', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rent->save($this->data)) {
				$this->Session->setFlash(__('The Rent has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Rent could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rent->read(null, $id);
		}
		$books = $this->Rent->Book->find('list');
		$members = $this->Rent->Member->find('list');
		$this->set(compact('books','members'));
	}

	function delete($id = null,$book_id=null) {
		if (!$id) {
			$this->render('add_failed','ajax');
		}
		$this->Rent->recursive = 0;
		
		$bukuonrent = $this->Rent->Book->read(null, $book_id);
		$current=$bukuonrent['Book']['onrent']-1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);
		
		if ($this->Rent->del($id)) {
			$rents = $this->Rent->find('all',array('conditions'=>
			array('Rent.user_id'=>$this->data['user_id'],'DAY(Rent.tgl_pinjam)'=>$this->data['tgl_pinjam']['day']),'recursive'=>0));
			$this->set(compact('rents'));
			$this->render('add_success','ajax');
		}
	}
	
	
	
	function telat(){
		 
		 
		 return $this->Rent->find('all',array('conditions'=>
		 array('Rent.status'=>1,array(
		 "Rent.tgl_kembali <=" => date('Y-m-d', strtotime("now")))),'recursive'=>2,'order' => array('Rent.tgl_kembali ASC')));
		 
		 		 
	}
	
	function booking_telat(){
		 
		 
		 return $this->Rent->find('all',array('conditions'=>
		 array('Rent.status'=>3,array(
		 "Rent.tgl_booking <=" => date('Y-m-d', strtotime("now")))),'recursive'=>2,'order' => array('Rent.tgl_booking ASC')));
		 
		 		 
	}
	
	function booking_to_pinjam($id = null,$lama_pinjam = null) {
		$this->set('id',$id);
		$this->set('lama_pinjam',$lama_pinjam);
		if (!$id) {
			$this->render('back_failed','ajax');
		}
		$this->Rent->recursive = 0;
		$this->data['status'] = 1;
		$today = date('Y-m-d');
		$this->data['tgl_pinjam'] = date('Y-m-d', strtotime("now"));
		$tanggal_kembali = strtotime(date('Y-m-d', strtotime($today)) . ' +'.$lama_pinjam.' days');
		$this->data['tgl_kembali'] = date('Y-m-d', $tanggal_kembali);
		
		if ($this->Rent->save($this->data)) {
			
			$this->set('rent', $this->Rent->read(null, $id));
			
			$this->render('back_success','ajax');
		}
	}
	
	function booking_to_pinjam2($id = null,$lama_pinjam = null) {
		$this->set('id',$id);
		$this->set('lama_pinjam',$lama_pinjam);
		if (!$id) {
			$this->render('back_failed','ajax');
		}
		$this->Rent->recursive = 0;
		$this->data['status'] = 1;
		$today = date('Y-m-d');
		$this->data['tgl_pinjam'] = date('Y-m-d', strtotime("now"));
		$tanggal_kembali = strtotime(date('Y-m-d', strtotime($today)) . ' +'.$lama_pinjam.' days');
		$this->data['tgl_kembali'] = date('Y-m-d', $tanggal_kembali);
		
		if ($this->Rent->save($this->data)) {
			
			$this->set('rent', $this->Rent->read(null, $id));
			
			$this->render('booking_success','ajax');
		}
	}
	
	
	
	function booking_cancel($id = null,$book_id = null) {
		if (!$id) {
			$this->render('add_failed','ajax');
		}
		$this->Rent->recursive = 0;
		
		$bukuonrent = $this->Rent->Book->read(null, $book_id);
		$current=$bukuonrent['Book']['onrent']-1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);
		
		if ($this->Rent->del($id)) {
			
			$this->render('cancelbooked_success','ajax');
		}
	}
	
	
	function admin_chart($year = null){
		
		$base_url = $this->webroot . 'rents/chart/';
		$this->set('base_url',$base_url);
		$cur_year =  date('Y');
		$this->set('cur_year',$cur_year);
		if(!$year)
			{
				$year = date('Y');
				
			}
		
			
		
		$bulan1 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>1,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>1,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan1 = count($bulan1);
		if(empty($bulan1)){
		$jumlahbulan1 =0;
		}
		
		$bulan2 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>2,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>2,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan2 = count($bulan2);
		if(empty($bulan2)){
		$jumlahbulan2 =0;
		}
		
		$bulan3 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>3,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>3,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan3 = count($bulan3);
		if(empty($bulan3)){
		$jumlahbulan3 =0;
		}
		
		
		$bulan4 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>4,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>4,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan4 = count($bulan4);
		if(empty($bulan4)){
		$jumlahbulan4 =0;
		}
		
		
		$bulan5 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>5,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>5,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan5 = count($bulan5);
		if(empty($bulan5)){
		$jumlahbulan5 =0;
		}
		
		
		$bulan6 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>6,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>6,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan6= count($bulan6);
		if(empty($bulan6)){
		$jumlahbulan6 =0;
		}
		
		
		$bulan7 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>7,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>7,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan7 = count($bulan7);
		if(empty($bulan7)){
		$jumlahbulan7 =0;
		}
		
		
		$bulan8 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>8,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>8,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan8 = count($bulan8);
		if(empty($bulan8)){
		$jumlahbulan8 =0;
		}
		

		$bulan9 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>9,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>9,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));


		$jumlahbulan9 = count($bulan9);
		if(empty($bulan9)){
		$jumlahbulan9 =0;
		}
		
		$bulan10 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>10,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>10,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan10 = count($bulan10);
		if(empty($bulan10)){
		$jumlahbulan10 =0;
		}
		
		$bulan11 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>11,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>11,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));

		$jumlahbulan11 = count($bulan11);
		if(empty($bulan11)){
		$jumlahbulan11 =0;
		}

		$bulan12 = $this->Rent->find('all',array('conditions'=>

		array(
			"OR" => array (
				array(
				'MONTH(Rent.tgl_pinjam)'=>12,
				'YEAR(Rent.tgl_pinjam)'=>$year,
				'ref_id'=>null
				),
				array(
				'MONTH(Rent.tgl_booking)'=>12,
				'YEAR(Rent.tgl_booking)'=>$year,
				'ref_id'=>null,
				'status'=>3,
				'tipe'=>3
				)
			)
		)

		));
		
		
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
							'caption' => 'Jumlah Peminjaman per tahun',
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
	
	
	function admin_chart_loose($year = null){
		
		$base_url = $this->webroot . 'rents/chart_loose/';
		$this->set('base_url',$base_url);
		$cur_year =  date('Y');
		$this->set('cur_year',$cur_year);
		if(!$year)
			{
				$year = date('Y');
				
			}
		
			
		$bulan1 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>1,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan1 = count($bulan1);
		if(empty($bulan1)){
		$jumlahbulan1 =0;
		}
		
		$bulan2 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>2,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan2 = count($bulan2);
		if(empty($bulan2)){
		$jumlahbulan2 =0;
		}
		
		$bulan3 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>3,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan3 = count($bulan3);
		if(empty($bulan3)){
		$jumlahbulan3 =0;
		}
		
		$bulan4 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>4,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan4 = count($bulan4);
		if(empty($bulan4)){
		$jumlahbulan4 =0;
		}
		
		$bulan5 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>5,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan5 = count($bulan5);
		if(empty($bulan5)){
		$jumlahbulan5 =0;
		}
		
		$bulan6 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>6,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan6= count($bulan6);
		if(empty($bulan6)){
		$jumlahbulan6 =0;
		}
		
		$bulan7 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>7,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan7 = count($bulan7);
		if(empty($bulan7)){
		$jumlahbulan7 =0;
		}
		
		$bulan8 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>8,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan8 = count($bulan8);
		if(empty($bulan8)){
		$jumlahbulan8 =0;
		}
		
		$bulan9 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>9,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan9 = count($bulan9);
		if(empty($bulan9)){
		$jumlahbulan9 =0;
		}
		
		$bulan10 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>10,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan10 = count($bulan10);
		if(empty($bulan10)){
		$jumlahbulan10 =0;
		}
		
		$bulan11 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>11,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
		$jumlahbulan11 = count($bulan11);
		if(empty($bulan11)){
		$jumlahbulan11 =0;
		}
		
		$bulan12 = $this->Rent->find('all',array('conditions'=>
		array('MONTH(Rent.tgl_kembali)'=>12,'YEAR(Book.created)'=>$year,'Rent.status'=>2,'Rent.tipe'=>4)));
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
							'caption' => 'Jumlah Buku Rusak per tahun',
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
	
	function viewPdf() {
	    $this->Rent->recursive = 0;
	    $this->set('rents', $this->paginate());
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
		if ($this->Rent->del($id)) {
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

	function admin_view_back($id = null) {
		$this->Rent->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rent.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('rent', $this->Rent->read(null, $id));
		$this->layout = 'default_blank';
	}


	function admin_view_broke($id = null) {
		$this->Rent->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rent.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('rent', $this->Rent->read(null, $id));
		$this->layout = 'default_blank';
	}


	function admin_view_booked($id = null) {
		$this->Rent->recursive = 2;
		if (!$id) {
			$this->Session->setFlash(__('Invalid Rent.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('item', $this->Rent->read(null, $id));

		//$this->render('/books/admin_search_modal','ajax');
		$this->layout = 'default_blank';
	}



	function admin_do_back() {
		
		$this->Rent->recursive = 1;

		$bookid = $this->data['Rent']['book_id'];
		$rentid = $this->data['Rent']['rent_id'];
		$userid = $this->data['Rent']['user_id'];

		$tglpinjam = $this->data['Rent']['tgl_pinjam'];
		$tglkembali = $this->data['Rent']['tgl_kembali'];

		$tgldikembalikan = $this->data['Rent']['tgl_dikembalikan'];
		
		
		$bukuonrent = $this->Rent->Book->read(null, $bookid);
		$current=$bukuonrent['Book']['onrent']-1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);


		$currentrent = $this->Rent->read(null, $rentid);
		
		$this->Rent->saveField('status',2);
		$this->Rent->saveField('tgl_dikembalikan',$tgldikembalikan);


		$this->Rent->create();

		$this->data['Rent']['status'] = 2;
		$this->data['Rent']['tipe'] = 2;

		$this->data['Rent']['tgl_pinjam'] = $tglpinjam;
		$this->data['Rent']['tgl_kembali'] = $tglkembali;
		$this->data['Rent']['tgl_dikembalikan'] = $tgldikembalikan;
		$this->data['Rent']['ref_id'] = $rentid;
		
		if ($this->Rent->save($this->data)) {

			$status = 'true';
			$flashMessage = 'Berhasil memproses data pengembalian buku';
			$idtoresponse = $rentid;
			
			//set for book are rent
			$lastID  = $this->Rent->getInsertID();


			

			$this->redirect(array('action'=>'doback_responses',$lastID,$idtoresponse,$status,$flashMessage));

			

			//$this->render('add_success','ajax');
		} else {

			$status = 'false';
			$flashMessage = 'Tidak Berhasil memproses data pengembalian buku, silahkan ulangi';
			$idtoresponse = 0;

			$this->redirect(array('action'=>'doback_responses',$lastID,$idtoresponse,$status,$flashMessage));
		}

	}

	function admin_do_broke() {
		
		$this->Rent->recursive = 1;

		$bookid = $this->data['Rent']['book_id'];
		$rentid = $this->data['Rent']['rent_id'];
		$userid = $this->data['Rent']['user_id'];

		$tglpinjam = $this->data['Rent']['tgl_pinjam'];
		$tglkembali = $this->data['Rent']['tgl_kembali'];

		$tgldikembalikan = $this->data['Rent']['tgl_dikembalikan'];
		
		
		$bukuonrent = $this->Rent->Book->read(null, $bookid);
		$current=$bukuonrent['Book']['onrent']-1;
		//$do_update = ;
		$this->Rent->Book->saveField('onrent',$current);

		$bukuonrent2 = $this->Rent->Book->read(null, $bookid);
		$current2=$bukuonrent2['Book']['jml_rusak']+1;
		//$do_update = ;
		$this->Rent->Book->saveField('jml_rusak',$current2);


		$currentrent = $this->Rent->read(null, $rentid);
		
		$this->Rent->saveField('status',2);
		$this->Rent->saveField('tgl_dikembalikan',$tgldikembalikan);


		$this->Rent->create();

		$this->data['Rent']['status'] = 2;
		$this->data['Rent']['tipe'] = 4;

		$this->data['Rent']['tgl_pinjam'] = $tglpinjam;
		$this->data['Rent']['tgl_kembali'] = $tglkembali;
		$this->data['Rent']['tgl_dikembalikan'] = $tgldikembalikan;
		$this->data['Rent']['ref_id'] = $rentid;
		
		if ($this->Rent->save($this->data)) {

			$status = 'true';
			$flashMessage = 'Berhasil memproses data pengembalian buku';
			$idtoresponse = $rentid;
			
			//set for book are rent
			$lastID  = $this->Rent->getInsertID();


			

			$this->redirect(array('action'=>'doback_responses',$lastID,$idtoresponse,$status,$flashMessage));

			

			//$this->render('add_success','ajax');
		} else {

			$status = 'false';
			$flashMessage = 'Tidak Berhasil memproses data pengembalian buku, silahkan ulangi';
			$idtoresponse = 0;

			$this->redirect(array('action'=>'doback_responses',$lastID,$idtoresponse,$status,$flashMessage));
		}

	}

	function admin_doback_responses($id,$idtoresponse,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('rent', $this->Rent->read(null, $id));
		$this->set(compact('id','status','flashMessage','idtoresponse'));
		$this->layout = 'default_blank';

		
	}

	function admin_dobroke_responses($id,$idtoresponse,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('rent', $this->Rent->read(null, $id));
		$this->set(compact('id','status','flashMessage','idtoresponse'));
		$this->layout = 'default_blank';

		
	}


	function admin_do_booked() {
		
		$this->Rent->recursive = 1;

		$bookid = $this->data['Rent']['book_id'];
		$rentid = $this->data['Rent']['rent_id'];
		$userid = $this->data['Rent']['user_id'];

		$tglpinjam = $this->data['Rent']['tgl_pinjam'];
		$tglkembali = $this->data['Rent']['tgl_kembali'];

		//$tgldikembalikan = $this->data['Rent']['tgl_dikembalikan'];
		
		
		$bukuonrent = $this->Rent->Book->read(null, $bookid);
		$current=$bukuonrent['Book']['onrent']+1;
		$this->Rent->Book->saveField('onrent',$current);


		$currentrent = $this->Rent->read(null, $rentid);
		
		$this->Rent->saveField('status',3);
		$this->Rent->saveField('tipe',3);
		//$this->Rent->saveField('tgl_dikembalikan',$tgldikembalikan);


		$this->Rent->create();

		$this->data['Rent']['status'] = 1;
		$this->data['Rent']['tipe'] = 1;

		$this->data['Rent']['tgl_pinjam'] = $tglpinjam;
		$this->data['Rent']['tgl_kembali'] = $tglkembali;
		//$this->data['Rent']['tgl_dikembalikan'] = $tgldikembalikan;
		$this->data['Rent']['ref_id'] = $rentid;
		
		if ($this->Rent->save($this->data)) {

			$status = 'true';
			$flashMessage = 'Berhasil memproses data booking buku';
			$idtoresponse = $rentid;
			
			//set for book are rent
			$lastID  = $this->Rent->getInsertID();

			$this->redirect(array('action'=>'dobooked_responses',$lastID,$idtoresponse,$status,$flashMessage));

			

			//$this->render('add_success','ajax');
		} else {

			$status = 'false';
			$flashMessage = 'Tidak Berhasil memproses data booking buku, silahkan ulangi';
			$idtoresponse = 0;
			$lastID  = 0;

			$this->redirect(array('action'=>'dobooked_responses',$lastID,$idtoresponse,$status,$flashMessage));
		}

	}

	function admin_dobooked_responses($id,$idtoresponse,$status,$flashMessage){
		
		if (!$id && !$status) {
			$this->Session->setFlash(__('Invalid Book.', true));
			$this->redirect(array('action'=>'index'));
		}

		$this->set('rent', $this->Rent->read(null, $id));
		$this->set(compact('id','status','flashMessage','idtoresponse'));
		$this->layout = 'default_blank';

		
	}

	function admin_financelist(){
		$this->Rent->recursive = 1;
		
		$rentsconditionyear = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'',array('YEAR(Rent.tgl_pinjam)' => date('Y')));
    	
    	$rentsconditionmonth = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'',array('MONTH(Rent.tgl_pinjam)' => date('m')));

    	$thisyear_transaction = $this->Rent->find('all',array('conditions'=>$rentsconditionyear));

    	$this_month_transaction = $this->Rent->find('all',array('conditions'=>$rentsconditionmonth));

		
		$this->paginate = array(
	        'conditions'=>$rentsconditionmonth,
	        'limit' => 20,
	        'order'=>array('Rent.modified'=>'DESC')
	    );
	    $rents = $this->paginate('Rent');

		
		
		$this->set('rents', $rents);


    	$total_thisyear_transaction = 0;
		
		foreach ($thisyear_transaction as $entry) {
			$total_thisyear_transaction += $entry['Rent']['denda'];
		}

		$total_this_month_transaction = 0;

		foreach ($this_month_transaction as $entry) {
			$total_this_month_transaction += $entry['Rent']['denda'];
		}
		

		$this->set('thisyear_transaction',$thisyear_transaction);
		$this->set('total_thisyear_transaction',$total_thisyear_transaction);


		$this->set('this_month_transaction',$this_month_transaction);
		$this->set('total_this_month_transaction',$total_this_month_transaction);



		

    	$this->layout = 'default_blank';
	}


	function admin_financelist_print(){
		$this->Rent->recursive = 1;
		
		$rentsconditionyear = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'',array('YEAR(Rent.tgl_pinjam)' => date('Y')));
    	
    	$rentsconditionmonth = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'',array('MONTH(Rent.tgl_pinjam)' => date('m')));

    	$thisyear_transaction = $this->Rent->find('all',array('conditions'=>$rentsconditionyear));

    	$this_month_transaction = $this->Rent->find('all',array('conditions'=>$rentsconditionmonth));

		
		
	    

		
		
		


    	$total_thisyear_transaction = 0;
		
		foreach ($thisyear_transaction as $entry) {
			$total_thisyear_transaction += $entry['Rent']['denda'];
		}

		$total_this_month_transaction = 0;

		foreach ($this_month_transaction as $entry) {
			$total_this_month_transaction += $entry['Rent']['denda'];
		}
		

		$this->set('thisyear_transaction',$thisyear_transaction);
		$this->set('total_thisyear_transaction',$total_thisyear_transaction);


		$this->set('this_month_transaction',$this_month_transaction);
		$this->set('total_this_month_transaction',$total_this_month_transaction);

		$this->Rent->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Rent->Profile->find('all');
		$this->set('profile',$profile);

		

    	$this->layout = 'default_print';
	}


	function admin_financesearch(){

		$this->Rent->recursive = 1;

		$tglawal_day = $this->data['Rent']['tgl_awal']['day'];
		$tglawal_month = $this->data['Rent']['tgl_awal']['month'];
		$tglawal_year = $this->data['Rent']['tgl_awal']['year'];

		$tglakhir_day = $this->data['Rent']['tgl_akhir']['day'];
		$tglakhir_month = $this->data['Rent']['tgl_akhir']['month'];
		$tglakhir_year = $this->data['Rent']['tgl_akhir']['year'];

		$tgl_awal_set = $tglawal_day.'-'.$tglawal_month.'-'.$tglawal_year;
		$tgl_akhir_set = $tglakhir_day.'-'.$tglakhir_month.'-'.$tglakhir_year;


		$tgl_awal_query_set = $tglawal_year.'-'.$tglawal_month.'-'.$tglawal_day;
		$tgl_akhir_query_set = $tglakhir_year.'-'.$tglakhir_month.'-'.$tglakhir_day;
		
		$rentscondition = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'','Rent.tgl_pinjam >='=> $tgl_awal_query_set, 'Rent.tgl_pinjam <='=> $tgl_akhir_query_set);
    	
    	

    	$this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition));

    	

		
		$this->paginate = array(
	        'conditions'=>$rentscondition,
	        'limit' => 20,
	        'order'=>array('Rent.modified'=>'DESC')
	    );
	    $rents = $this->paginate('Rent');

		
		
		$this->set('rents', $rents);


    	$total_this_transaction = 0;
		
		foreach ($this_transaction as $entry) {
			$total_this_transaction += $entry['Rent']['denda'];
		}


		
		$this->set('tgl_awal_set',$tgl_awal_set);
		$this->set('tgl_akhir_set',$tgl_akhir_set);

		$this->set('tgl_awal_query_set',$tgl_awal_query_set);
		$this->set('tgl_akhir_query_set',$tgl_akhir_query_set);

		$this->set('this_transaction',$this_transaction);
		$this->set('total_this_transaction',$total_this_transaction);


		

    	$this->layout = 'default_blank';
	}


	function admin_finance_download(){

		$this->Rent->recursive = 2;

		$tglawal_day = $this->data['Rent']['tgl_awal']['day'];
		$tglawal_month = $this->data['Rent']['tgl_awal']['month'];
		$tglawal_year = $this->data['Rent']['tgl_awal']['year'];

		$tglakhir_day = $this->data['Rent']['tgl_akhir']['day'];
		$tglakhir_month = $this->data['Rent']['tgl_akhir']['month'];
		$tglakhir_year = $this->data['Rent']['tgl_akhir']['year'];

		$tgl_awal_set = $tglawal_day.'-'.$tglawal_month.'-'.$tglawal_year;
		$tgl_akhir_set = $tglakhir_day.'-'.$tglakhir_month.'-'.$tglakhir_year;


		$tgl_awal_query_set = $tglawal_year.'-'.$tglawal_month.'-'.$tglawal_day;
		$tgl_akhir_query_set = $tglakhir_year.'-'.$tglakhir_month.'-'.$tglakhir_day;
		
		
		$rentsconditionmonth = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.denda !='=>'',array('MONTH(Rent.tgl_pinjam)' => date('m')));
	

    	$this_transaction = $this->Rent->find('all',array('conditions'=>$rentsconditionmonth,'order'=>array('Rent.modified'=>'DESC')));
    	
    	
    	$total_this_transaction = 0;
		
		foreach ($this_transaction as $entry) {
			$total_this_transaction += $entry['Rent']['denda'];
		}


		
		$this->set('tgl_awal_set',$tgl_awal_set);
		$this->set('tgl_akhir_set',$tgl_akhir_set);

		$this->set('tgl_awal_query_set',$tgl_awal_query_set);
		$this->set('tgl_akhir_query_set',$tgl_akhir_query_set);

		$this->set('this_transaction',$this_transaction);
		$this->set('total_this_transaction',$total_this_transaction);


		

    	$this->layout = 'default_blank';
	}



	function admin_finance_search_download(){

		$this->Rent->recursive = 2;

		$startdate=$this->params['url']['startdate']; //get keyword from querystring//
		$enddate = $this->params['url']['enddate']; //get keyword from querystring//

		
		
		
		$rentscondition = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.tgl_pinjam >='=> $startdate, 'Rent.tgl_pinjam <='=> $enddate);
	

    	$this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition,'order'=>array('Rent.modified'=>'DESC')));
    	
    	
    	
		$this->set('this_transaction',$this_transaction);
		
		

    	$this->render('admin_finance_download','ajax');
	}



	function admin_financesearch_print(){

		$startdate=$this->params['url']['startdate']; //get keyword from querystring//
		$enddate = $this->params['url']['enddate']; //get keyword from querystring//

		$startdate_print=$this->params['url']['startdate_print']; //get keyword from querystring//
		$enddate_print = $this->params['url']['enddate_print']; //get keyword from querystring//

		

		


		$this->Rent->recursive = 1;

		$rentscondition = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.tgl_pinjam >='=> $startdate, 'Rent.tgl_pinjam <='=> $enddate);
	

    	$this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition,'order'=>array('Rent.modified'=>'DESC')));

    	
    	$total_this_transaction = 0;
		
		foreach ($this_transaction as $entry) {
			$total_this_transaction += $entry['Rent']['denda'];
		}


		
		$this->set('startdate_print',$startdate_print);
		$this->set('enddate_print',$enddate_print);


		$this->set('this_transaction',$this_transaction);
		$this->set('total_this_transaction',$total_this_transaction);


		$this->Rent->bindModel(
	    	array('belongsTo' =>
		    	array(
				'Profile' => array(
		             'className' => 'Profile',
		             'foreignKey'=> 'Profile'
		         )
		        )
		    )
		);
		$profile=$this->Rent->Profile->find('all');
		$this->set('profile',$profile);


		

    	$this->layout = 'default_print';
	}

	function admin_searchhistory(){

    $this->Rent->recursive = 1;

    $tglawal_day = $this->data['Rent']['tgl_awal']['day'];
    $tglawal_month = $this->data['Rent']['tgl_awal']['month'];
    $tglawal_year = $this->data['Rent']['tgl_awal']['year'];

    $tglakhir_day = $this->data['Rent']['tgl_akhir']['day'];
    $tglakhir_month = $this->data['Rent']['tgl_akhir']['month'];
    $tglakhir_year = $this->data['Rent']['tgl_akhir']['year'];

    $tgl_awal_set = $tglawal_day.'-'.$tglawal_month.'-'.$tglawal_year;
    $tgl_akhir_set = $tglakhir_day.'-'.$tglakhir_month.'-'.$tglakhir_year;


    $tgl_awal_query_set = $tglawal_year.'-'.$tglawal_month.'-'.$tglawal_day;
    $tgl_akhir_query_set = $tglakhir_year.'-'.$tglakhir_month.'-'.$tglakhir_day;
    
    $rentscondition = array('Rent.created >='=> $tgl_awal_query_set, 'Rent.created <='=> $tgl_akhir_query_set);
      
      

      $this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition));

      

    
    $this->paginate = array(
          'conditions'=>$rentscondition,
          'limit' => 20,
          'order'=>array('Rent.modified'=>'DESC')
      );
      $rents = $this->paginate('Rent');

    
    
    $this->set('rents', $rents);


      $total_this_transaction = 0;
    
    foreach ($this_transaction as $entry) {
      $total_this_transaction += $entry['Rent']['denda'];
    }


    
    $this->set('tgl_awal_set',$tgl_awal_set);
    $this->set('tgl_akhir_set',$tgl_akhir_set);

    $this->set('tgl_awal_query_set',$tgl_awal_query_set);
    $this->set('tgl_akhir_query_set',$tgl_akhir_query_set);

    $this->set('this_transaction',$this_transaction);
    $this->set('total_this_transaction',$total_this_transaction);


    

      $this->layout = 'default_blank';
  }



  function admin_searchhistory_print(){

    $startdate=$this->params['url']['startdate']; //get keyword from querystring//
    $enddate = $this->params['url']['enddate']; //get keyword from querystring//

    $startdate_print=$this->params['url']['startdate_print']; //get keyword from querystring//
    $enddate_print = $this->params['url']['enddate_print']; //get keyword from querystring//

    

    


    $this->Rent->recursive = 1;

    $rentscondition = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.tgl_pinjam >='=> $startdate, 'Rent.tgl_pinjam <='=> $enddate);
  

      $this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition,'order'=>array('Rent.modified'=>'DESC')));

      
      $total_this_transaction = 0;
    
    foreach ($this_transaction as $entry) {
      $total_this_transaction += $entry['Rent']['denda'];
    }


    
    $this->set('startdate_print',$startdate_print);
    $this->set('enddate_print',$enddate_print);


    $this->set('this_transaction',$this_transaction);
    $this->set('total_this_transaction',$total_this_transaction);


    $this->Rent->bindModel(
        array('belongsTo' =>
          array(
        'Profile' => array(
                 'className' => 'Profile',
                 'foreignKey'=> 'Profile'
             )
            )
        )
    );
    $profile=$this->Rent->Profile->find('all');
    $this->set('profile',$profile);


    

      $this->layout = 'default_print';
  }

  function admin_searchhistory_download(){

		$this->Rent->recursive = 2;

		$startdate=$this->params['url']['startdate']; //get keyword from querystring//
		$enddate = $this->params['url']['enddate']; //get keyword from querystring//

		
		
		
		$rentscondition = array('Rent.tipe'=>array(2,4),'Rent.status'=>2,'Rent.denda !='=>null,'Rent.tgl_pinjam >='=> $startdate, 'Rent.tgl_pinjam <='=> $enddate);
	

    	$this_transaction = $this->Rent->find('all',array('conditions'=>$rentscondition,'order'=>array('Rent.modified'=>'DESC')));
    	
    	
    	
		$this->set('this_transaction',$this_transaction);
		
		

    	$this->render('admin_searchhistory_download','ajax');
	}


	  

}
?>