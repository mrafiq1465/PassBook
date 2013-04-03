<?php
App::uses('AppModel', 'Model');
/**
 * Payment Model
 *
 * @property Pass $Pass
 */
class Payment extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'payment';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Pass' => array(
			'className' => 'Pass',
			'foreignKey' => 'pass_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
