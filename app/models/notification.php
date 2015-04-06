<?php
class Notification extends AppModel {

	var $name = 'Notification';
	
	var $belongsTo = array(
		'User' => array(
	      'className' => 'User',
	      'foreignKey'=> 'user_id'
	   	),
	   	


		
	);

}
?>