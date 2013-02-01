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

		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
        //$this->set('users', $this->paginate(null,array('User.status' => 1)));
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
		if ($this->request->is('post')) {
            $users = $this->User->find('first', array('conditions' => array('User.email' => $this->request->data['User']['email'])));
            if(!empty($users)){
                $this->Session->setFlash(__('The email already taken. Please, choose another.'));
                $error_exist = true;
            }
            if($this->request->data['User']['password'] != $this->request->data['User']['password2']){
                $this->Session->setFlash(__('Passwords don\'t match. Please, try again.'));
                $error_exist = true;
            }
            if(empty($error_exist)){
                $this->User->create();
                $this->request->data['User']['status'] = 1;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }

		}
		$roles = $this->User->Role->find('list');
		$companies = $this->User->Company->find('list');
		$this->set(compact('roles', 'companies'));
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
		$roles = $this->User->Role->find('list');
		$companies = $this->User->Company->find('list');
		$this->set(compact('roles', 'companies'));
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
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
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
            $this->redirect('/events');
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
                // redirect the user
                //$this->Session->setFlash('You have successfully logged in.'); // Richard asked us to remove this message 2008-10-02 JB
                /*if ($this->Session->check('goto')) {
                    $url = $this->Session->read('goto');
                    $this->Session->delete('goto');
                } else {
                    $url = $this->data['User']['goto'];
                }*/

                $url = (empty($url)) ? '/events' : $url;
                /*if ($dbuser['User']['username'] == 'admin'){
                    $this->redirect('/admin/');
                }*/
                $this->redirect($url);
            }
            else {
                $this->Session->setFlash('Either your username or password is incorrect.', FALSE, FALSE, 'login');
            }
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
                echo json_encode(array('error' => 'Email is not valid'));
            }
            $user = $this->User->find('first', array('recursive' => -1, 'conditions' => array('email' => $email)));
            if (empty($user)) {
                echo json_encode(array('error' => 'The user could not be found. Please, try again.'));
            } else {
                $content = "The password for login is : " . $user['User']['password'];
                $this->Email->to = $user['User']['email'];
                $this->Email->from = 'mrafiq1465@gmail.com';
                $this->Email->subject = 'Login Information';
                $success = $this->Email->send($content, null, null);
                if ($success) echo json_encode(array('success' => 'Password sent to the mail address.'));
                else echo json_encode(array('error' => 'Email could not be sent.'));
            }
        }
    }

}
