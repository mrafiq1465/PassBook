<?php
App::uses('AppController', 'Controller');



class PassController extends AppController {


    //public $components = array('RequestHandler');
   // public $helpers = array('Text');

    public $name = 'Pass';


    public function index() {

	}

    public function create() {

    }

    public function event() {
        $pass_type_id = 1;
    }

    public function coupon() {
        $pass_type_id = 2;
    }

    public function transport() {
        $pass_type_id = 3;
    }

    public function store() {
        $pass_type_id = 4;
    }

    public function generic() {
        $pass_type_id = 5;
    }
}
