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
            $this->Pass->create();
            $this->Pass->save($this->request->data);
        }
    }
}
