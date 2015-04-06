<?php
class Audio extends AppModel {

	var $name = 'Audio';
	var $actsAs = array('MeioUpload' => array(
	       'file' => array(
	           'dir' => 'files/audios',
	           'create_directory' => false,
	           
	           
	       )
	     )
	 );
	var $belongsTo = array(
		'Pelajaran' => array(
	      'className' => 'Pelajaran',
	      'foreignKey'=> 'matapelajaran'
	   	),
		/*'User' => array(
		 'className' => 'User',
		 'foreignKey'=> 'author'
		),*/
		'Category' => array(
		 'className' => 'Category',
		 'foreignKey'=> 'category_id'
		),
		
	);

}
?>