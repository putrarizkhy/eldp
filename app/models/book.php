<?php
class Book extends AppModel {

	var $name = 'Book';
	var $actsAs = array('MeioUpload' => array(
	       'file' => array(
	           'dir' => 'files/books',
	           'create_directory' => false,
	           
	           
	       )
	     )
	 );
	
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