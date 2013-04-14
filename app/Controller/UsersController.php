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
          $id = 3;

        if (!$this->isLoggedIn()) {
            $options = array(
               // 'recursive' => -1,
                'conditions' => array('User.id' => $id)
            );
            $user = $this->User->find('all', $options);
        }
        else {
            $this->redirect('/user/login');

        }

       // $this->User->recursive = 1;

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
	public function add() {

        if ($this->isLoggedIn()) {
            $this->redirect('/');
        }
        $error_exist = false;
		if ($this->request->is('post')) {
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
                        $this->ajax_response(array('success' => true));
                    }
                   // $this->redirect($url);
                }
            }
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
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

    function login() {
        if ($this->isLoggedin()) {
            $this->redirect('/');
            exit;
        }

        if (!empty($this->data)) {
            $this->Session->delete('Message.flash');

            $dbuser = $this->User->find('first', array('recursive' => -1, 'conditions' => array(
                'OR' => array(
                    array('User.name' => $this->data['User']['email']),
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
                if ($this->request->is('ajax')){
                    $this->ajax_response(array('success' => true));
                }
                $this->redirect($url);
            }
            else {
                if (!$this->request->is('ajax')) $this->Session->setFlash('Either your username or password is incorrect.', FALSE, FALSE, 'login');
                else $this->ajax_response(array('error' => 'Either your username or password is incorrect.'));
            }
        }
    }

    function payment() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/users/login');
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->loadModel('Payment');


            $amount = "9.95";
           /*
            $pass_id = $this->reqeust->data['Payment']['pass_id'];
            $card_name = $this->reqeust->data['User']['card_name'];
            $card_name = $this->reqeust->data['User']['card_number'];
            $exp_month = $this->reqeust->data['User']['card_expiration_month'];
            $exp_year = $this->reqeust->data['User']['card_expiration_year'];
            $ccv = $this->reqeust->data['User']['card_ccv'];
         */

            /*
            if ($this->Payment->save($this->reqeust->data)){
                if ($this->request->is('ajax')) {
                    $this->ajax_response(array('success' => true));
                }
            } else {
                if ($this->request->is('ajax')) {
                    $this->ajax_response(array('error' => 'data could not be saved'));
                }
            }
            */
            $this->ajax_response(array('success' => true));

        }
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
