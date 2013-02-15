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
                default:
                    throw new NotFoundException(__('Invalid step'));
            }

        } else {
            $this->request->data = $this->Pass->read(null, $id);
        }
        $step = substr($step, 4);

        $this->set(compact('step'));
    }

    public function processStep2($id)
    {
        $this->Pass->id = $id;
        $this->Pass->read();
        if (isset($this->request->query['remove'])) {
            switch($this->request->query['remove']) {
                case 'data[iconImage]' :
                    unlink(WWW_ROOT . $this->Pass->data['Pass']['iconImage']);
                    $this->Pass->data['Pass']['iconImage'] = '';
                    $this->Pass->save($this->Pass->data);break;
                case 'data[backgroundImage]' :
                    unlink(WWW_ROOT . $this->Pass->data['Pass']['backgroundImage']);
                    $this->Pass->data['Pass']['backgroundImage'] = '';
                    $this->Pass->save($this->Pass->data);break;
                default: break;
            }

        } elseif (isset($this->request->data['iconImage'])) {
            $destination_dir = WWW_ROOT . "data/$id/iconImage/";
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "image.jpg";
            move_uploaded_file($this->request->data['iconImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['iconImage'] = str_replace(WWW_ROOT,'',$destination_path);
            $this->Pass->save($this->Pass->data);
        } elseif (isset($this->request->data['backgroundImage'])) {
            $destination_dir = WWW_ROOT . "data/$id/backgroundImage/";
            if (!is_dir($destination_dir)) {
                mkdir($destination_dir, 0777, true);
            }
            $destination_path = $destination_dir . "image.jpg";
            move_uploaded_file($this->request->data['backgroundImage']['tmp_name'], $destination_path);
            $this->Pass->data['Pass']['backgroundImage'] = str_replace(WWW_ROOT,'',$destination_path);
            $this->Pass->save($this->Pass->data);
        } else {
            $this->Pass->save($this->request->data);
        }
        return json_encode(array('success' => true));
    }
}
