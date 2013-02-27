<?php
App::uses('AppModel', 'Model');
/**
 * BarcodeMessageEncoding Model
 *
 * @property BarcodeFormat $BarcodeFormat
 */
class BarcodeMessageEncoding extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'barcode_message_encoding';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'BarcodeFormat' => array(
			'className' => 'BarcodeFormat',
			'foreignKey' => 'barcode_format_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
