<?php
App::uses('AppModel', 'Model');
/**
 * Pass Model
 *
 * @property PassType $PassType
 * @property BarcodeFormat $BarcodeFormat
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
		),
		'BarcodeFormat' => array(
			'className' => 'BarcodeFormat',
			'foreignKey' => 'barcode_format_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
