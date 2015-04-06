<?php
class Category extends AppModel {

	var $name = 'Category';
	
	var $belongsTo = array(
		'Ddc' => array(
	      'className' => 'Ddc',
	      'foreignKey'=> 'ddc_id'
	   	),
	   	'Location' => array(
	      'className' => 'Location',
	      'foreignKey'=> 'location_id'
	   	),


		
	);
	var $hasMany = array(
		'Book' => array(
			'className' => 'Book',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>