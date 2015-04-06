<?php
class Plan extends AppModel {
var $name = 'Plan';

/*var $validate = array(
'username' => array(
'notempty' => array(
'rule' => array('minLenght', 1),
'required' => true,
'allowEmpty' => false,
'message' => 'User name cannot be empty'
),
'unique' => array(
'rule' => array('checkUnique', 'username'),
'message' => 'User name taken. Use another'
)
),
'password' => array(
'notempty' => array(
'rule' => array('minLenght', 1),
'required' => true,
'allowEmpty' => false,
'message' => 'Password cannot be empty.'
),
'passwordSimilar' => array(
'rule' => 'checkPasswords',
'message' => 'Different password re entered.'
)
),
'email' => array(
'rule' => 'email',
'required' => true,
'allowEmpty' => false,
'message' => 'Please enter a valid email'
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