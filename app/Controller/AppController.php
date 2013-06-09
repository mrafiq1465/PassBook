<?php

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /*
    public $helpers = array(
        'Html'      => array('className' => ''),
        'Form'      => array('className' => ''),
        'Paginator' => array('className' => '')
    );
    */

    public $components = array(
        'Session',
        'Cookie',
        'RequestHandler',
    );


    // If current user is not logged in, prompt for login
    function requireLogin() {
        /*
        if (!$this->Session->check('User')) {
            // clear session var for where we were before going to login form
            $this->Session->delete('goto');

            // set flash message and redirect
            $this->Session->setFlash('You need to be logged in to access this area', FALSE, FALSE, 'login');
            $this->redirect('/users/login/');
            exit();
        }
        */
    }

    // If current user is not admin, prompt for login
    function requireAdmin() {
        // if the admin session hasn't been set
        if ($this->Session->read('User.role_id') != 1) {
            // set flash message and redirect
            $this->Session->setFlash('You need to be an administrator to access this area');
            $this->redirect('/users/login/');
            exit();
        }
    }

    function user_id(){
        return $this->Session->read('User.id');
    }

    // Returns logged in status of current user as true/false
    function isLoggedIn() {
        // if the current user is logged in
        return $this->Session->check('User');
    }

    // Returns true if logged in user is admin, false if not
    function isAdmin() {
        // if the logged in user is the admin
        return ($this->Session->read('User.name')=='admin') ? TRUE : FALSE ;
    }

    // called before every single action
    function beforeFilter() {

        $excluded = array(


        );

        $included_admin = array(

        );

        $login_req = !in_array(array($this->params->params['controller'],$this->params->params['action']),$excluded);
        $login_req_admin = in_array(array($this->params->params['controller'],$this->params->params['action']), $included_admin);
        // if admin pages are being requested
        if(isset($this->params->params['prefix']) && $this->params->params['prefix'] == 'admin') {
            // require the admin to be logged in
            $this->requireAdmin();
        } elseif($login_req_admin) {
            $this->requireAdmin();
        } elseif($login_req) {
            $this->requireLogin();
        }

        $this->set('authUser', $this->Session->check('User'));
    }

    function ajax_response($data) {
        die(json_encode($data));
    }
}
