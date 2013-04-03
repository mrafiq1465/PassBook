<?php
App::uses('AppModel', 'Model');
/**
 * Download Model
 *
 * @property Pass $Pass
 */
class Download extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'download';


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
