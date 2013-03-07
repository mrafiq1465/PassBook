<?php
App::uses('AppModel', 'Model');
/**
 * Pass Model
 *
 * @property PassType $PassType
 * @property BarcodeFormat $BarcodeFormat
 */
class Pass extends AppModel
{

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

    public function generate_pass($id)
    {
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
        $passbook->p12_cert_pass = P12_CERT_PASS; # Required!

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
            'logoText' => $data['Pass']['logoText'],
            // Passbook version
            'formatVersion' => 1,

            // Event
            'relevantDate' => "2013-12-28T13:00-08:00",
        );

        //Barcode
        $pass_data['barcode']['format'] = $data['BarcodeFormat']['name'];
        $pass_data['barcode']['message'] = '123456789';
        $encoding = $this->BarcodeFormat->BarcodeMessageEncoding->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'barcode_format_id' => $data['BarcodeFormat']['id'],
            )
        ));
        $pass_data['barcode']['messageEncoding'] = $encoding['BarcodeMessageEncoding']['name'];


        //Locations
        $data['Pass']['locations'] = json_decode($data['Pass']['locations'], 1);
        foreach ($data['Pass']['locations'] as $location) {
            $location = explode(',', $location['Value']);
            $pass_data['locations'][] = array(
                'latitude' => $location[0],
                'longitude' => $location[1],
            );
        }

        //Event
        $data['Pass']['primaryFields'] = json_decode($data['Pass']['primaryFields'], 1);
        if (is_array($data['Pass']['primaryFields'])) {
            $pass_data['eventTicket']['primaryFields'][] = array(
                'key' => 'event',
                'label' => $data['Pass']['primaryFields']['Label'],
                'value' => $data['Pass']['primaryFields']['Value']
            );
        }

        $data['Pass']['secondaryFields'] = json_decode($data['Pass']['secondaryFields'], 1);
        if (is_array($data['Pass']['secondaryFields'])) {
            foreach ($data['Pass']['secondaryFields'] as $v) {
                $pass_data['eventTicket']['secondaryFields'][] = array(
                    'key' => 'event',
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );    
            } 
        }
        $data['Pass']['auxiliaryFields'] = json_decode($data['Pass']['auxiliaryFields'], 1);
        if (is_array($data['Pass']['auxiliaryFields'])) {
            foreach ($data['Pass']['auxiliaryFields'] as $v) {
                $pass_data['eventTicket']['auxiliaryFields'][] = array(
                    'key' => 'event',
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );    
            } 
        }
        $data['Pass']['backFields'] = json_decode($data['Pass']['backFields'], 1);
        if (is_array($data['Pass']['backFields'])) {
            foreach ($data['Pass']['backFields'] as $v) {
                $pass_data['eventTicket']['backFields'][] = array(
                    'key' => 'event',
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );    
            } 
        }
        

        // Styling
        if (!empty($pass_data['backgroundColor'])) $pass_data['backgroundColor'] = $data['Pass']['backgroundColor'];
        if (!empty($pass_data['foregroundColor'])) $pass_data['foregroundColor'] = $data['Pass']['foregroundColor'];
        if (!empty($pass_data['labelColor'])) $pass_data['labelColor'] = $data['Pass']['labelColor'];


// Set JSON
        $passbook->set_json($pass_data);

// Set background
        if (!empty($this->data['Pass']['backgroundImage'])) $passbook->set_image('background', $data_path_web . $this->data['Pass']['backgroundImage']);
        if (!empty($this->data['Pass']['backgroundImageRetina'])) $passbook->set_image('background', $data_path_web . $this->data['Pass']['backgroundImageRetina'], true);

// Set icon
        if (!empty($this->data['Pass']['iconImage'])) $passbook->set_image('icon', $data_path_web . $this->data['Pass']['iconImage']);
        if (!empty($this->data['Pass']['iconImageRetina'])) $passbook->set_image('icon', $data_path_web . $this->data['Pass']['iconImageRetina'], true);

// Set logo
        if (!empty($this->data['Pass']['logoImage'])) $passbook->set_image('logo', $data_path_web . $this->data['Pass']['logoImage']);
        if (!empty($this->data['Pass']['logoImageRetina'])) $passbook->set_image('logo', $data_path_web . $this->data['Pass']['logoImageRetina'], true);

// Set thumbnail
        if (!empty($this->data['Pass']['thumbnailImage'])) $passbook->set_image('thumbnail', $data_path_web . $this->data['Pass']['thumbnailImage']);
        if (!empty($this->data['Pass']['thumbnailImageRetina'])) $passbook->set_image('thumbnail', $data_path_web . $this->data['Pass']['thumbnailImageRetina'], true);

// Create a pass
        $pass = $passbook->create('pass', false);
        return $passbook->output_path . $pass;
    }
}
