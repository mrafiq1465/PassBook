<?php
App::uses('AppModel', 'Model');
/**
 * Pass Model
 *
 * @property PassType $PassType
 * @property Type $Type
 */
class Pass extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'pass';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PassType' => array(
			'className' => 'PassType',
			'foreignKey' => 'pass_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
