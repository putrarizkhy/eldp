<?php
class Subject extends AppModel {

	var $name = 'Subject';
	/*var $actsAs = array('MeioUpload' => array(
	       'file' => array(
	           'dir' => 'files/books',
	           'create_directory' => false,
	           
	           
	       )
	     )
	 );*/
	
	var $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>