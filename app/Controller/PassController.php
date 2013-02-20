<?php
App::uses('AppController', 'Controller');
/**
 * Pass Controller
 *
 * @property Pass $Pass
 */
class PassController extends AppController
{


    public function index()
    {

    }

    public function create($action = 'event')
    {
        switch ($action) {
            case 'event' :
                $pass_type_id = 1;
                break;
            case 'coupon' :
                $pass_type_id = 2;
                break;
            case 'transport' :
                $pass_type_id = 3;
                break;
            case 'store' :
                $pass_type_id = 4;
                break;
            case 'generic' :
                $pass_type_id = 5;
                break;
            default:
                $pass_type_id = 1;
                break;
        }
        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->Pass->create();
            $this->request->data['Pass']['pass_type_id'] = $pass_type_id;
            if ($this->Pass->save($this->request->data)) {
                echo json_encode(array('success' => array('id' => $this->Pass->id)));
            } else {
                echo json_encode(array('error' => __('The user could not be saved. Please, try again.')));
            }
        }
    }

    public function edit($id, $step = 'step1')
    {
        if (empty($id)) {
            throw new NotFoundException(__('Invalid id'));
        }
        $this->Pass->id = $id;
        if (!$this->Pass->exists()) {
            throw new NotFoundException(__('Invalid pass'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->autoRender = false;
            switch ($step) {
                case 'step1' :
                    $this->Pass->save($this->request->data);
                    echo json_encode(array('success' => array('id' => $this->Pass->id)));
                    break;
                case 'step2' :
                    echo $this->processStep2($id);
                    break;
                case 'step3' :
                    echo $this->processStep3($id);
                    break;
                default:
                    throw new NotFoundException(__('Invalid step'));
            }

        } else {
            $this->request->data = $this->Pass->read(null, $id);
        }
        $step = substr($step, 4);

        $barcodeFormats = $this->Pass->BarcodeFormat->find('list');

        $this->set(compact('step', 'barcodeFormats'));
    }

    public function processStep2($id)
    {
        $this->Pass->id = $id;
        $this->Pass->read();
        if (isset($this->request->query['remove'])) {
            switch ($this->request->query['remove']) {
                case 'data[logoImage]' :
                    if (!empty($this->Pass->data['Pass']['logoImage'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['logoImage']);
                        $this->Pass->data['Pass']['logoImage'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[logoImageRetina]' :
                    if(!empty($this->Pass->data['Pass']['logoImageRetina'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['logoImageRetina']);
                        $this->Pass->data['Pass']['logoImageRetina'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[thumbnailImage]' :
                    if (!empty($this->Pass->data['Pass']['thumbnailImage'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['thumbnailImage']);
                        $this->Pass->data['Pass']['thumbnailImage'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[thumbnailImageRetina]' :
                    if (!empty($this->Pass->data['Pass']['thumbnailImageRetina'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['thumbnailImageRetina']);
                        $this->Pass->data['Pass']['thumbnailImageRetina'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                default:
                    break;
            }
        } elseif (isset($this->request->data['logoImage'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "logoImage.png";
            move_uploaded_file($this->request->data['logoImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['logoImage'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['logoImageRetina'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "logoImageRetina.png";
            move_uploaded_file($this->request->data['logoImageRetina']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['logoImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['thumbnailImage'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "thumbnailImage.png";
            move_uploaded_file($this->request->data['thumbnailImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['thumbnailImage'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['thumbnailImageRetina'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "thumbnailImageRetina.png";
            move_uploaded_file($this->request->data['thumbnailImageRetina']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['thumbnailImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } else {
            $this->Pass->save($this->request->data);
        }
        if (isset($destination_path)) return json_encode(array('success' => '/' . str_replace(WWW_ROOT, '', $destination_path)));
        else return json_encode(array('success' => true));
    }
    
    public function processStep3($id)
    {
        $this->Pass->id = $id;
        $this->Pass->read();
        if (isset($this->request->query['remove'])) {
            switch ($this->request->query['remove']) {
                case 'data[logoImage]' :
                    if (!empty($this->Pass->data['Pass']['logoImage'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['logoImage']);
                        $this->Pass->data['Pass']['logoImage'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[logoImageRetina]' :
                    if(!empty($this->Pass->data['Pass']['logoImageRetina'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['logoImageRetina']);
                        $this->Pass->data['Pass']['logoImageRetina'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[thumbnailImage]' :
                    if (!empty($this->Pass->data['Pass']['thumbnailImage'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['thumbnailImage']);
                        $this->Pass->data['Pass']['thumbnailImage'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                case 'data[thumbnailImageRetina]' :
                    if (!empty($this->Pass->data['Pass']['thumbnailImageRetina'])) {
                        unlink(WWW_ROOT . $this->Pass->data['Pass']['thumbnailImageRetina']);
                        $this->Pass->data['Pass']['thumbnailImageRetina'] = '';
                        $this->Pass->save($this->Pass->data);
                    }
                    break;
                default:
                    break;
            }
        } elseif (isset($this->request->data['logoImage'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "logoImage.png";
            move_uploaded_file($this->request->data['logoImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['logoImage'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['logoImageRetina'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "logoImageRetina.png";
            move_uploaded_file($this->request->data['logoImageRetina']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['logoImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['thumbnailImage'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "thumbnailImage.png";
            move_uploaded_file($this->request->data['thumbnailImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['thumbnailImage'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['thumbnailImageRetina'])) {
            $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "thumbnailImageRetina.png";
            move_uploaded_file($this->request->data['thumbnailImageRetina']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['thumbnailImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
            $this->Pass->save($this->Pass->data);
        } else {
            $this->Pass->save($this->request->data);
        }
        if (isset($destination_path)) return json_encode(array('success' => '/' . str_replace(WWW_ROOT, '', $destination_path)));
        else return json_encode(array('success' => $id));
    }

    public function generate_pass($id)
    {
        $this->autoRender = false;
        $this->Pass->id = $id;
        $data = $this->Pass->read();

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
        if (!empty($this->Pass->data['Pass']['thumbnailImage'])) $passbook->set_image('background', $data_path_web . $this->Pass->data['Pass']['thumbnailImage']);
        if (!empty($this->Pass->data['Pass']['thumbnailImageRetina'])) $passbook->set_image('background', $data_path_web . $this->Pass->data['Pass']['thumbnailImageRetina'], true);

// Set icon
        if (!empty($this->Pass->data['Pass']['logoImage'])) $passbook->set_image('icon', $data_path_web . $this->Pass->data['Pass']['logoImage']);
        if (!empty($this->Pass->data['Pass']['logoImageRetina'])) $passbook->set_image('icon', $data_path_web . $this->Pass->data['Pass']['logoImageRetina'], true);

// Set logo
        $passbook->set_image('logo', $data_path . 'sample' . '/img/event/logo.png');
        $passbook->set_image('logo', $data_path . 'sample' . '/img/event/logo@2x.png', true);

// Set thumbnail
        $passbook->set_image('thumbnail', $data_path . 'sample' . '/img/event/thumbnail.png');
        $passbook->set_image('thumbnail', $data_path . 'sample' . '/img/event/thumbnail@2x.png', true);

// Create a pass
        $pass = $passbook->create('pass', false);
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail();
        $email->from(array('me@example.com' => 'My Site'));
        $email->to('mrafiq1465@gmail.com');
        $email->subject('Pass file');
        $email->attachments($passbook->output_path . $pass);
        $email->send('My message');
        echo json_encode(array('success' => true));
    }
}
