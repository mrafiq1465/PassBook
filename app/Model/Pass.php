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

        App::import('Vendor', 'Passbook', array('file' => 'Passbook' . DS . 'PKPass.php'));
        $pass = new PKPass();

        $data_path = APP . 'data' . DS;
        $data_path_web = WWW_ROOT;
// Set pass output path
        $pass->setCertificate($data_path . 'ios.p12'); // Set the path to your Pass Certificate (.p12 file)
        $pass->setCertificatePassword(P12_CERT_PASS); // Set password for certificate
        $pass->setWWDRcertPath($data_path . 'AppleWWDRCA.cer');

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
            foreach ($data['Pass']['primaryFields'] as $v) {
                $pass_data['eventTicket']['primaryFields'][] = array(
                    'key' => 'event',
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );
            }
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
        $pass->setJSON(json_encode($pass_data));

// Set background
        if (!empty($this->data['Pass']['backgroundImage'])) $pass->addFile($data_path_web . $this->data['Pass']['backgroundImage'],'background.png');
        if (!empty($this->data['Pass']['backgroundImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['backgroundImageRetina'], 'background@2x.png');

// Set icon
        if (!empty($this->data['Pass']['iconImage'])) $pass->addFile($data_path_web . $this->data['Pass']['iconImage'], 'icon.png');
        if (!empty($this->data['Pass']['iconImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['iconImageRetina'], 'icon@2x.png');

// Set logo
        if (!empty($this->data['Pass']['logoImage'])) $pass->addFile($data_path_web . $this->data['Pass']['logoImage'], 'logo.png');
        if (!empty($this->data['Pass']['logoImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['logoImageRetina'], 'logo@2x.png');

// Set thumbnail
        if (!empty($this->data['Pass']['thumbnailImage'])) $pass->addFile($data_path_web . $this->data['Pass']['thumbnailImage'], 'thumbnail.png');
        if (!empty($this->data['Pass']['thumbnailImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['thumbnailImageRetina'], 'thumbnail@2x.png');

        //Set Strip
        if (!empty($this->data['Pass']['stripImage'])) $pass->addFile($data_path_web . $this->data['Pass']['stripImage'], 'strip.png');
        if (!empty($this->data['Pass']['stripImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['stripImageRetina'], 'strip@2x.png');

// Create a pass

        $passFile = $pass->create();
        if(!$passFile) { // Create and output the PKPass
            return array('error' => 'Error: '.$pass->getError());
        } else {
            $output_path = $data_path . 'passes/' . $id . '/pass.pkpass';
            mkdir($data_path . 'passes/' . $id);
            file_put_contents($output_path, $passFile);
            return array('path' => $output_path);
        }
    }
}
