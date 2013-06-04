<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    var $components = array('Email');


    /**
 * index method
 *
 * @return void
 */
	public function index() {

        if ($this->isLoggedIn()) {
            $options = array(
                'recursive' => 2,
                'conditions' => array('User.id' => $this->user_id())
            );
            $user = $this->User->find('all', $options);
        }
        else {
            $this->redirect('/users/login_account');

        }

       // $this->User->recursive = 1;
        $this->request->data = $this->User->read(null, $this->user_id());
        $this->set(compact('user', 'user'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

        $this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	 function add() {

        //if ($this->isLoggedIn()) {
           // $this->redirect('/');
       // }
        $error_exist = false;

        if ($this->request->is('post') || $this->request->is('put')) {

            $this->Session->delete('Message.flash');

            $users = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
            if(!empty($users)){
                //$this->Session->setFlash(__('The email already taken. Please, choose another.'));
                $this->ajax_response(array('error' => 'The email already taken. Please, choose another.'));
                $error_exist = true;
            }
            if($this->request->data['User']['password'] != $this->request->data['User']['password2']){
               // $this->Session->setFlash(__('Passwords don\'t match. Please, try again.'));
                $this->ajax_response(array('error' => 'Passwords don\'t match. Please, try again.'));
                $error_exist = true;
            }
            if(empty($error_exist)){
                $this->User->create();
                $this->request->data['User']['status'] = 1;
                if ($this->User->save($this->request->data)) {
                    $users = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
                    $this->Session->write($users);
                    //$url = (empty($url)) ? '/' : $url;
                    if ($this->request->is('ajax')){
                        $this->ajax_response(array('success' => true, 'user_id' => $users['User']['id']));
                    }
                   // $this->redirect($url);
                }
            }
		}
	}

	public function edit($id = null) {
        if(!$this->isAdmin()){
            if($this->user_id() != $id){
                $this->Session->setFlash(__('Access denied.'));
                $this->logout();
                $this->redirect('/users/login/');
            }
        }
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            $users = $this->User->find('first', array('conditions' => array(
                'User.email' => $this->request->data['User']['email'],
                'User.id !=' => $this->User->id,
            )));
            if(!empty($users)){
                $this->Session->setFlash(__('The email already taken. Please, choose another.'));
                $error_exist = true;
            }
            if($this->request->data['User']['password'] != $this->request->data['User']['password2']){
                $this->Session->setFlash(__('Passwords don\'t match. Please, try again.'));
                $error_exist = true;
            }
            if(empty($error_exist)){
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        if (!$this->isAdmin()) {
            $this->Session->setFlash(__('Access denied.'));
            $this->logout();
            $this->redirect('/users/login/');
        }

        $this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->saveField('status', 0)) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    function login_account() {
        if ($this->isLoggedin()) {
            $this->redirect('/users');
            exit;
        }

        if (!empty($this->data)) {
            $this->Session->delete('Message.flash');

            $dbuser = $this->User->find('first', array('recursive' => -1, 'conditions' => array(
                'OR' => array(
                    array('User.email' => $this->data['User']['email'])
                )
            )));

            if(!empty($dbuser) && ($dbuser['User']['password'] == $this->data['User']['password'] )){
                // write the username to a session

                $this->Session->write($dbuser);
                $this->ajax_response(array('success' => true, 'user_id' => $dbuser['User']['id']));

                $this->redirect('/users');
            }
            else {
                if (!$this->request->is('ajax')) $this->Session->setFlash('Either your username or password is incorrect.', false, false, 'login');
                else $this->ajax_response(array('error' => 'Either your username or password is incorrect.'));
            }
        }
    }

    function login() {
        if ($this->isLoggedin()) {
            $this->redirect('/');
            exit;
        }

        if (!empty($this->data)) {
            $this->Session->delete('Message.flash');

            $dbuser = $this->User->find('first', array('recursive' => -1, 'conditions' => array(
                'OR' => array(
                    array('User.email' => $this->data['User']['email'])
                )
            )));

            if(!empty($dbuser) && ($dbuser['User']['password'] == $this->data['User']['password'] )){
                // write the username to a session

                $this->Session->write($dbuser);


                $url = (empty($url)) ? '/' : $url;
                /*if ($dbuser['User']['username'] == 'admin'){
                    $this->redirect('/admin/');
                }*/
                if(!empty($dbuser['User']['payment_token']) && $dbuser['User']['payment_token_status'] == 1){
                    $payment_token = true;
                }else {
                    $payment_token = false;
                }

                if ($this->request->is('ajax')){
                    $this->ajax_response(array('success' => true, 'user_id' => $dbuser['User']['id'], 'payment_token' => $payment_token));
                }
                $this->redirect($url);
            }
            else {
                if (!$this->request->is('ajax')) $this->Session->setFlash('Either your username or password is incorrect.', false, false, 'login');
                else $this->ajax_response(array('error' => 'Either your username or password is incorrect.'));
            }
        }
    }

    function _eway_get_token_customer_id() {

        if ($this->isLoggedIn()) {
            $options = array(
                'recursive' => 2,
                'conditions' => array('User.id' => $this->user_id())
            );
            $user = $this->User->find('all', $options);
        }
        $TokenCustomerID = $user['User']['TokenCustomerID'];
        if(!empty($TokenCustomerID)){
            return (float) $TokenCustomerID;
        }

        return null;
    }

    protected $eway = null;

    function __eway_load_library() {
        if ($this->eway) {
            return;
        }
        //Include RapidAPI Library
        require_once('../Vendor/Rapid3.0.php');

        //Create RapidAPI Service
        $this->eway = new RapidAPI();

        //$redirect_url = preg_replace('/default.php/', 'results.php', $self_url);

    }


    function __get_site_url() {
        $self_url = 'http';
        if (!empty($_SERVER['HTTPS'])) {$self_url .= "s";}
        $self_url .= "://" . $_SERVER["SERVER_NAME"];

        if ($_SERVER["SERVER_PORT"] != "80") {
            $self_url .= ":".$_SERVER["SERVER_PORT"];
        }
        $self_url .= '/users/payment/'; //$_SERVER["REQUEST_URI"];
        return $self_url;
    }


    function __eway_create_request() {

        $this->__eway_load_library();

        //Create AccessCode Request Object
        $request = new CreateAccessCodeRequest();
        return $request;

    }

    function _eway_payment_complete_success($result) {
        //file_put_contents('token_payment_data.txt', var_export($result, true));

        $this->request->data['User']['AccessCode'] = $result->AccessCode;
        $this->request->data['User']['AuthorisationCode'] = $result->AuthorisationCode;
        $this->request->data['User']['ResponseCode'] = $result->ResponseCode;
        $this->request->data['User']['ResponseMessage'] = $result->ResponseMessage;
        $this->request->data['User']['InvoiceNumber'] = $result->InvoiceNumber;
        $this->request->data['User']['InvoiceReference'] = $result->InvoiceReference;
        $this->request->data['User']['TotalAmount'] = $result->TotalAmount;
        $this->request->data['User']['TransactionID'] = $result->TransactionID;
        $this->request->data['User']['TransactionStatus'] = $result->TransactionStatus;
        $this->request->data['User']['TokenCustomerID'] = $result->TokenCustomerID;
        $this->request->data['User']['PaymentDate'] = '';

        $this->User->id = $this->user_id();
        if ($this->User->save($this->request->data)){
           $url = "/pass/edit/".$this->Session->read('pass_id').'/step6';
           $this->redirect($url);
        }
    }

    function _eway_payment_complete_error($result) {
       // file_put_contents('token_payment_data.txt', var_export($result, true));
        $url = "/pass/edit/".$this->Session->read('pass_id').'/step5';
        $this->redirect($url);
    }

    function _eway_payment_create($customer_id) {
        $request = $this->__eway_create_request();

        if (!$customer_id) {
            if ($this->isLoggedIn()) {
                $options = array(
                    'recursive' => 2,
                    'conditions' => array('User.id' => $this->user_id())
                );
                $user = $this->User->find('all', $options);
            }

            $request->Customer->Reference = 1;
            // todo: set other user information
            $request->Customer->Title = $user['User']['title'];
            $request->Customer->FirstName = $user['User']['first_name'];
            //Note: LastName is Required Field When Create/Update a TokenCustomer
            $request->Customer->LastName = $user['User']['last_name'];
            $request->Customer->Email = $user['User']['email'];
            // todo: end of other user information

            $request->Customer->Country = 'au';
        }
        else {
            $request->Customer->TokenCustomerID = $customer_id;

        }

        $request->Method = 'TokenPayment';

        $request->Payment->TotalAmount = 1000;

        $request->RedirectUrl = $this->__get_site_url() . '?mode=token_payment';
        $result = $this->eway->CreateAccessCode($request);

        //Check if any error returns
        if(isset($result->Errors)) {
            //Get Error Messages from Error Code. Error Code Mappings are in the Config.ini file
            $ErrorArray = explode(",", $result->Errors);

            $lblError = "";

            foreach ( $ErrorArray as $error )
            {
                if(isset($this->eway->APIConfig[$error]))
                    $lblError .= $error." ".$this->eway->APIConfig[$error]."<br>";
                else
                    $lblError .= $error;
            }
            // todo: remove die, log the error and display the user that a critical error has occured
            die($lblError);

            return false;
        }

        //var_dump($result);

        $this->set('FormActionURL', $result->FormActionURL);
        $this->set('AccessCode', $result->AccessCode);
        return true;
    }

//    function _eway_user_create_complete($result) {
//        // todo: save user in database
//        file_put_contents('token_customer_data.txt', var_export($result, true));
//    }
//
//    function _eway_user_create() {
//
//        // get access token by submitting user information
//        $request = $this->__eway_create_request();
//
//        // todo: set user id in reference for backtracking
//        $request->Customer->Reference = 1;
//        // todo: set other user information
//        $request->Customer->Title = 'Mr.';
//        $request->Customer->FirstName = 'naam';
//        //Note: LastName is Required Field When Create/Update a TokenCustomer
//        $request->Customer->LastName = 'nai';
//        $request->Customer->Email = 'zubair6@gmail.com';
//        // todo: end of other user information
//
//        $request->Method = 'CreateTokenCustomer';
//
//        $request->Customer->Country = 'au';
//        $request->Payment->TotalAmount = 0;
//
//        $request->RedirectUrl = $this->__get_site_url() . '?mode=token_customer';
//
//        $result = $this->eway->CreateAccessCode($request);
//
//        //Check if any error returns
//        if(isset($result->Errors)) {
//            //Get Error Messages from Error Code. Error Code Mappings are in the Config.ini file
//            $ErrorArray = explode(",", $result->Errors);
//
//            $lblError = "";
//
//            foreach ( $ErrorArray as $error )
//            {
//                if(isset($this->eway->APIConfig[$error]))
//                    $lblError .= $error." ".$this->eway->APIConfig[$error]."<br>";
//                else
//                    $lblError .= $error;
//            }
//            // todo: remove die, log the error and display the user that a critical error has occured
//            die($lblError);
//
//            return false;
//        }
//        $this->set('FormActionURL', $result->FormActionURL);
//        $this->set('AccessCode', $result->AccessCode);
//        return true;
//    }

    function payment() {
//        if (!$this->isLoggedIn()) {
//            $this->redirect('/users/login');
//        }else {
//            $options = array(
//                'conditions' => array('User.id' => $this->user_id())
//            );
//            $user = $this->User->find('all', $options);
//        }

        if ($this->request->is('post')) {
            die('data posted here');
        }
        // make_payment
        if (isset($this->request->query['AccessCode'])) {
            $this->__eway_load_library();

            $request = new GetAccessCodeResultRequest();

            $request->AccessCode = $this->request->query['AccessCode'];

            //Call RapidAPI to get the result
            $result = $this->eway->GetAccessCodeResult($request);

            if(isset($result->Errors))
            {
                //Get Error Messages from Error Code. Error Code Mappings are in the Config.ini file
                $ErrorArray = explode(",", $result->Errors);
                var_dump($ErrorArray);
                $lblError = "";
                foreach ( $ErrorArray as $error )
                {
                    $lblError .= $this->eway->APIConfig[$error]."<br>";
                }
                var_dump($lblError);
            }
            else {
//                if ($this->request->query['mode']=='token_customer') {
//                    $this->_eway_user_create_complete($result);
//                    $this->_eway_payment_create($result->TokenCustomerID);
//                }
//                else if ($this->request->query['mode']=='token_payment') {

                    if ($result->ResponseCode == '00') {
                        $this->_eway_payment_complete_success($result);
                    }
                    else {
                        $this->_eway_payment_complete_error($result);
                    }
                    // todo: redirect to success page
                    //var_dump($result);
                    die('');
//                }
            }
        }
        else {
            $this->_eway_payment_create($this->_eway_get_token_customer_id());
            // display form to input card information
        }
    }

    function paymentToken() {
       //Zubair: This actioan will be called where user already have a token in user table.
        // so we will need to use this token & get the payment.

        if (!$this->isLoggedIn()) {
            $this->redirect('/users/login');
        }else {
            $options = array(
                'conditions' => array('User.id' => $this->user_id())
            );
            $dbuser = $this->User->find('all', $options);
        }

        $this->ajax_response(array('success' => true,'user_id' => $this->user_id()));
       /*
        $user_token = $dbuser['User']['payment_token'];

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->loadModel('Payment');

            $amount = "9.95";
            //$pass_id = $this->reqeust->data['Payment']['pass_id'];


            $this->ajax_response(array('success' => true));

        }
        */
    }


    function logout() {
        // delete the user session
        $this->Session->destroy();
        // redirect to posts index page
        $this->Session->setFlash('You have successfully logged out.');
        $this->redirect('/');
    }

    function send_password() {
        $this->autoRender = false;
        if ($this->request->is('post') || $this->request->is('put')) {
            $email = $this->request->data['email'];
            if (empty($email)) {
                $this->ajax_response(array('error' => 'Email is not valid'));
            }
            $user = $this->User->find('first', array('recursive' => -1, 'conditions' => array('email' => $email)));
            if (empty($user)) {
                $this->ajax_response(array('error' => 'The user could not be found. Please, try again.'));
            } else {
                $content = "The password for login is : " . $user['User']['password'];
                $this->Email->to = $user['User']['email'];
                $this->Email->from = 'mrafiq1465@gmail.com';
                $this->Email->subject = 'Login Information';
                $success = $this->Email->send($content, null, null);
                if ($success) $this->ajax_response(array('success' => 'Password sent to the mail address.'));
                else $this->ajax_response(array('error' => 'Email could not be sent.'));
            }
        }
    }

}
