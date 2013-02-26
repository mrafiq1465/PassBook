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
            $this->Pass->read();

            if (isset($this->request->query['remove'])) {
                switch ($this->request->query['remove']) {
                    case 'data[iconImage]' :
                        if (!empty($this->Pass->data['Pass']['iconImage'])) {
                            unlink(WWW_ROOT . $this->Pass->data['Pass']['iconImage']);
                            $this->Pass->data['Pass']['iconImage'] = '';
                            $this->Pass->save($this->Pass->data);
                        }
                        break;
                    case 'data[iconImageRetina]' :
                        if (!empty($this->Pass->data['Pass']['iconImageRetina'])) {
                            unlink(WWW_ROOT . $this->Pass->data['Pass']['iconImageRetina']);
                            $this->Pass->data['Pass']['iconImageRetina'] = '';
                            $this->Pass->save($this->Pass->data);
                        }
                        break;
                    case 'data[backgroundImage]' :
                        if (!empty($this->Pass->data['Pass']['backgroundImage'])) {
                            unlink(WWW_ROOT . $this->Pass->data['Pass']['backgroundImage']);
                            $this->Pass->data['Pass']['thumbnailImage'] = '';
                            $this->Pass->save($this->Pass->data);
                        }
                        break;
                    case 'data[backgroundImageRetina]' :
                        if (!empty($this->Pass->data['Pass']['backgroundImageRetina'])) {
                            unlink(WWW_ROOT . $this->Pass->data['Pass']['backgroundImageRetina']);
                            $this->Pass->data['Pass']['backgroundImageRetina'] = '';
                            $this->Pass->save($this->Pass->data);
                        }
                        break;
                    case 'data[logoImage]' :
                        if (!empty($this->Pass->data['Pass']['logoImage'])) {
                            unlink(WWW_ROOT . $this->Pass->data['Pass']['logoImage']);
                            $this->Pass->data['Pass']['logoImage'] = '';
                            $this->Pass->save($this->Pass->data);
                        }
                        break;
                    case 'data[logoImageRetina]' :
                        if (!empty($this->Pass->data['Pass']['logoImageRetina'])) {
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
            } elseif (isset($this->request->data['iconImage'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "iconImage.png";
                move_uploaded_file($this->request->data['iconImage']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['iconImage'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['iconImageRetina'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "iconImageRetina.png";
                move_uploaded_file($this->request->data['iconImageRetina']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['iconImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['backgroundImage'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "backgroundImage.png";
                move_uploaded_file($this->request->data['backgroundImage']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['backgroundImage'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['backgroundImageRetina'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "backgroundImageRetina.png";
                move_uploaded_file($this->request->data['backgroundImageRetina']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['backgroundImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['logoImage'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "logoImage.png";
                move_uploaded_file($this->request->data['logoImage']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['logoImage'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['logoImageRetina'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "logoImageRetina.png";
                move_uploaded_file($this->request->data['logoImageRetina']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['logoImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['thumbnailImage'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "thumbnailImage.png";
                move_uploaded_file($this->request->data['thumbnailImage']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['thumbnailImage'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } elseif (isset($this->request->data['thumbnailImageRetina'])) {
                usleep(300000);
                $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                if (!is_dir($destination_dir)) {
                    mkdir($destination_dir, 0777, true);
                }
                $destination_path = $destination_dir . "thumbnailImageRetina.png";
                move_uploaded_file($this->request->data['thumbnailImageRetina']['tmp_name'], $destination_path);
                $this->Pass->data['Pass']['thumbnailImageRetina'] = str_replace(WWW_ROOT, '', $destination_path);
                $this->Pass->save($this->Pass->data);
            } else {
                $this->encodeDynamicFields($this->request->data);
                $this->Pass->save($this->request->data);
            }

            if (isset($destination_path)) echo json_encode(array('success' => '/' . str_replace(WWW_ROOT, '', $destination_path)));
            else echo json_encode(array('success' => $id));
            die();
        }

        $this->request->data = $this->Pass->read(null, $id);
        $this->decodeDynamicFields($this->request->data);
        $step = substr($step, 4);

        $barcodeFormats = $this->Pass->BarcodeFormat->find('list');

        $this->set(compact('step', 'barcodeFormats'));
    }

    public function generate_pass($id)
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $email = $this->request->data['email'];
            if (empty($email)) {
                die(json_encode(array('error' => 'email not given')));
            }
            $pass = $this->Pass->generate_pass($id);
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail();
            $email->from(array(SITE_EMAIL => SITE_NAME));
            $email->to($email);
            $email->subject('Pass file');
            $email->attachments($pass);
            $email->send('My message');
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('error' => 'Invalid method'));
        }

    }

    public function encodeDynamicFields(&$data)
    {
        if (!empty($data['Pass']['primaryFields']['Label']) && !empty($data['Pass']['primaryFields']['Value'])) {
            $data['Pass']['primaryFields'] = json_encode($data['Pass']['primaryFields']);
        } else {
            $data['Pass']['primaryFields'] = '';
        }
        if (isset($data['Pass']['secondaryFields'])) $data['Pass']['secondaryFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['secondaryFields'],
            array($this, 'check_all_keys_values'))));

        if (isset($data['Pass']['auxiliaryFields']))$data['Pass']['auxiliaryFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['auxiliaryFields'],
            array($this, 'check_all_keys_values'))));

        if (isset($data['Pass']['backFields'])) $data['Pass']['backFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['backFields'],
            array($this, 'check_all_keys_values'))));

        if (isset($data['Pass']['locations'])) $data['Pass']['locations'] = json_encode(array_merge(array_filter(
            $data['Pass']['locations'],
            array($this, 'check_all_keys_values'))));
    }
    public function decodeDynamicFields(&$data)
    {
        if (!empty($data['Pass']['primaryFields'])) {
            $data['Pass']['primaryFields'] = json_decode($data['Pass']['primaryFields'],1);
        }
        if (!empty($data['Pass']['secondaryFields'])) {
            $data['Pass']['secondaryFields'] = json_decode($data['Pass']['secondaryFields'],1);
        }
        if (!empty($data['Pass']['auxiliaryFields'])) {
            $data['Pass']['auxiliaryFields'] = json_decode($data['Pass']['auxiliaryFields'],1);
        }
        if (!empty($data['Pass']['backFields'])) {
            $data['Pass']['backFields'] = json_decode($data['Pass']['backFields'],1);
        }
        if (!empty($data['Pass']['locations'])) {
            $data['Pass']['locations'] = json_decode($data['Pass']['locations'],1);
        }

    }

    public function check_all_keys_values($item)
    {
        foreach ($item as $v) {
            if ($v == '' || is_null($v)) {
                return false;
            }
        }
        return true;
    }
}
