<?php
App::uses('AppModel', 'Model');
/**
 * Pass Model
 *
 * @property PassType $PassType
 * @property User $User
 * @property BarcodeFormat $BarcodeFormat
 * @property Download $Download
 * @property Payment $Payment
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
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

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Download' => array(
            'className' => 'Download',
            'foreignKey' => 'pass_id',
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
        'Payment' => array(
            'className' => 'Payment',
            'foreignKey' => 'pass_id',
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

    public function generate_pass($id)
    {
        $this->id = $id;
        $data = $this->read();

        App::import('Vendor', 'Passbook', array('file' => 'Passbook' . DS . 'PKPass.php'));
        $pass = new PKPass();

        $data_path = APP . 'data' . DS;
        $data_path_web = WWW_ROOT;
// Set pass output path
        $pass->setCertificate($data_path . 'Certificates.p12'); // Set the path to your Pass Certificate (.p12 file)
        $pass->setCertificatePassword(P12_CERT_PASS); // Set password for certificate
        $pass->setWWDRcertPath($data_path . 'AppleWWDR.pem');

// Create pass data
        $pass_data = array(
            // Identifiers
            'description' => $data['Pass']['description'],
            'teamIdentifier' => '9E8L8Y3KWG', # Required!
            'passTypeIdentifier' => 'pass.flypass.coupon', # Required!
            'organizationName' => $data['Pass']['organizationName'],
            'serialNumber' => '12345678',
            // Texts
            'logoText' => $data['Pass']['headerText'],
           // 'headerText' => $data['Pass']['headerText'],
            // Passbook version
            'formatVersion' => 1,

            // Event
            //'relevantDate' => "2013-12-28T13:00-08:00",
        );

        //Barcode
        $pass_data['barcode']['format'] = $data['BarcodeFormat']['value'];
        $pass_data['barcode']['message'] = $data['Pass']['barcodeMessage'];
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
            $pass_data['coupon']['locations'][] = array(
                'latitude' => $location[0],
                'longitude' => $location[1],
            );
        }

        //Event
        $data['Pass']['primaryFields'] = json_decode($data['Pass']['primaryFields'], 1);
        if (is_array($data['Pass']['primaryFields'])) {
            foreach ($data['Pass']['primaryFields'] as $v) {
                $pass_data['coupon']['primaryFields'][] = array(
                    'key' => 'offer',
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );
            }
        }

        $i = 1;
        $data['Pass']['secondaryFields'] = json_decode($data['Pass']['secondaryFields'], 1);
        if (is_array($data['Pass']['secondaryFields'])) {
            foreach ($data['Pass']['secondaryFields'] as $v) {
                $pass_data['coupon']['secondaryFields'][] = array(
                    'key' => 'offer_'.$i,
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );
                $i++;
            }
        }
        $data['Pass']['auxiliaryFields'] = json_decode($data['Pass']['auxiliaryFields'], 1);
        if (is_array($data['Pass']['auxiliaryFields'])) {
            foreach ($data['Pass']['auxiliaryFields'] as $v) {
                $pass_data['coupon']['auxiliaryFields'][] = array(
                    'key' => 'offer_'.$i,
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );
                $i++;
            }
        }
        $data['Pass']['backFields'] = json_decode($data['Pass']['backFields'], 1);
        if (is_array($data['Pass']['backFields'])) {
            foreach ($data['Pass']['backFields'] as $v) {
                $pass_data['coupon']['backFields'][] = array(
                    'key' => 'offer_'.$i,
                    'label' => $v['Label'],
                    'value' => $v['Value']
                );
                $i++;
            }
        }

        // Styling
        if (!empty($this->data['Pass']['backgroundColor'])) $pass_data['backgroundColor'] = $data['Pass']['backgroundColor'];
        if (!empty($this->data['Pass']['foregroundColor'])) $pass_data['foregroundColor'] = $data['Pass']['foregroundColor'];
        if (!empty($this->data['Pass']['labelColor'])) $pass_data['labelColor'] = $data['Pass']['labelColor'];


// Set JSON
        $pass->setJSON(json_encode($pass_data));

// Set background
        if (!empty($this->data['Pass']['backgroundImage'])) $pass->addFile($data_path_web . $this->data['Pass']['backgroundImage'], 'background.png');
        if (!empty($this->data['Pass']['backgroundImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['backgroundImageRetina'], 'background@2x.png');

// Set icon
        if (!empty($this->data['Pass']['iconImage'])) $pass->addFile($data_path_web . $this->data['Pass']['iconImage'], 'icon.png');
        if (!empty($this->data['Pass']['iconImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['iconImageRetina'], 'icon@2x.png');

// Set logo
        if (!empty($this->data['Pass']['logoImage'])) {
            $pass->addFile($data_path_web . $this->data['Pass']['logoImage'], 'logo.png');
        }
        if (!empty($this->data['Pass']['logoImageRetina']))  {
            $pass->addFile($data_path_web . $this->data['Pass']['logoImageRetina'], 'logo@2x.png');
        }

// Set thumbnail
        if (!empty($this->data['Pass']['thumbnailImage'])) $pass->addFile($data_path_web . $this->data['Pass']['thumbnailImage'], 'thumbnail.png');
        if (!empty($this->data['Pass']['thumbnailImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['thumbnailImageRetina'], 'thumbnail@2x.png');

//Set Strip
        if (!empty($this->data['Pass']['stripImage'])) $pass->addFile($data_path_web . $this->data['Pass']['stripImage'], 'strip.png');
        if (!empty($this->data['Pass']['stripImageRetina'])) $pass->addFile($data_path_web . $this->data['Pass']['stripImageRetina'], 'strip@2x.png');

// Create a pass

        $passFile = $pass->create();

        if (!$passFile) { // Create and output the PKPass
            return array('error' => 'Error: ' . $pass->getError());
        } else {
            $output_path = $data_path . 'passes/' . $id . '/pass.pkpass';
            if (!file_exists($data_path . 'passes/' . $id)) {
                $response = mkdir($data_path . 'passes/' . $id);
                if (!$response) {
                    return array('error' => 'Output path not writable!');
                }
            }

            $response = file_put_contents($output_path, $passFile);
            file_put_contents($output_path . '.json', json_encode($pass_data));
            if (!$response) {
                return array('error' => 'Output path not writable!');
            }

            return array('path' => $output_path);
        }
    }
}
