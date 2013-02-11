<?php
App::uses('AppModel', 'Model');
/**
 * BarcodeFormat Model
 *
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

}
