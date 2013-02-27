<?php
App::uses('AppModel', 'Model');
/**
 * BarcodeFormat Model
 *
 * @property BarcodeMessageEncoding $BarcodeMessageEncoding
 * @property Pass $Pass
 */
class BarcodeFormat extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'barcode_format';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BarcodeMessageEncoding' => array(
			'className' => 'BarcodeMessageEncoding',
			'foreignKey' => 'barcode_format_id',
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
		'Pass' => array(
			'className' => 'Pass',
			'foreignKey' => 'barcode_format_id',
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
