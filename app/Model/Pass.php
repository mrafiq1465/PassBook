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

    public function generate_pass($id) {
        $this->id = $id;
        $data = $this->read();

        App::import('Vendor', 'Passbook', array('file' => 'Passbook' . DS . 'Passbook.php'));
        $passbook = new Passbook();

        $data_path = APP . 'data' . DS;
        $data_path_web = WWW_ROOT;
// Set pass output path
        $passbook->output_path = $data_path . "passes" . DS . $id . DS;

        if (!is_dir($passbook->output_path)) mkdir($passbook->output_path, 0777, true);

// Set temporary folder
        $passbook->temp_path = sys_get_temp_dir() . DS;

// Set P12 certificate
        $passbook->p12_certificate = $data_path . 'ios.p12'; # Required!
        $passbook->p12_cert_pass = '1234'; # Required!

// Set WWDR certificate
        $passbook->wwdr_certificate = $data_path . 'AppleWWDRCA.cer'; # Required!

// Create pass data
        $pass_data = array(
            // Identifiers
            'teamIdentifier' => '9E8L8Y3KWG', # Required!
            'passTypeIdentifier' => 'pass.eventcinemas.movie', # Required!
            'organizationName' => $data['Pass']['organizationName'],
            'serialNumber' => '123456789',
            'description' => $data['Pass']['description'],
            // Texts
            'logoText' => '',
            // Passbook version
            'formatVersion' => 1,
            // Locations
            'locations' => array(
                array(
                    'latitude' => 37.6189722,
                    'longitude' => -122.3748889,
                ),
                array(
                    'latitude' => 37.33182,
                    'longitude' => -122.03118,
                )
            ),
            // Event
            'relevantDate' => "2013-12-28T13:00-08:00",
            'eventTicket' => array(
                'primaryFields' => array(
                    array(
                        'key' => 'event',
                        'label' => 'EVENT',
                        'value' => 'The Beat Goes On'
                    )
                ),
                'secondaryFields' => array(
                    array(
                        'key' => 'location',
                        'label' => 'LOCATION',
                        'value' => 'Moscone West'
                    ),
                ),
                'auxiliaryFields' => array(
                    array(
                        'key' => 'location',
                        'label' => 'LOCATION',
                        'value' => 'Moscone West'
                    ),
                ),
                'backFields' => array(
                    array(
                        'key' => 'copy1',
                        'label' => 'Lorem Ipsum',
                        'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
                    )
                )
            ),
            'barcode' => array(
                'format' => 'PKBarcodeFormatPDF417',
                'message' => '123456789',
                'messageEncoding' => 'iso-8859-1'
            )
        );

        // Styling
        if (!empty($pass_data['backgroundColor'])) $pass_data['backgroundColor'] = $data['Pass']['backgroundColor'];
        if (!empty($pass_data['foregroundColor'])) $pass_data['foregroundColor'] = $data['Pass']['foregroundColor'];
        if (!empty($pass_data['labelColor'])) $pass_data['labelColor'] = $data['Pass']['labelColor'];


// Set JSON
        $passbook->set_json($pass_data);

// Set background
        if (!empty($this->data['Pass']['thumbnailImage'])) $passbook->set_image('background', $data_path_web . $this->data['Pass']['thumbnailImage']);
        if (!empty($this->data['Pass']['thumbnailImageRetina'])) $passbook->set_image('background', $data_path_web . $this->data['Pass']['thumbnailImageRetina'], true);

// Set icon
        if (!empty($this->data['Pass']['logoImage'])) $passbook->set_image('icon', $data_path_web . $this->data['Pass']['logoImage']);
        if (!empty($this->data['Pass']['logoImageRetina'])) $passbook->set_image('icon', $data_path_web . $this->data['Pass']['logoImageRetina'], true);

// Set logo
        $passbook->set_image('logo', $data_path . 'sample' . '/img/event/logo.png');
        $passbook->set_image('logo', $data_path . 'sample' . '/img/event/logo@2x.png', true);

// Set thumbnail
        $passbook->set_image('thumbnail', $data_path . 'sample' . '/img/event/thumbnail.png');
        $passbook->set_image('thumbnail', $data_path . 'sample' . '/img/event/thumbnail@2x.png', true);

// Create a pass
        $pass = $passbook->create('pass', false);
        return $passbook->output_path . $pass;
    }
}
