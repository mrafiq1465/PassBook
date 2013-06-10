<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {

        $path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}

    public function home() {

    }

    public function pricing(){


    }

    public function help(){


    }

    public function refund(){


    }
    public function privacy(){


    }

    public function security(){


    }

    function contact(){

    }

    function feedback(){

    }

    public function thanks(){

        $subject = "Enquiry from Flypass";
        $message = 'test message';
        $name = $this->request->data['Contact']['name'];
        $user_email = $this->request->data['Contact']['email'];
        $comment = $this->request->data['Contact']['comment'];

        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail();
        $email->from('no-reply@flypass.com.au');
        $email->to('support@flydigital.com.au');
       // $email->to('raf@flydigital.com.au');
        $email->subject($subject);
        $email->template('enquiry', 'enquiry');
        $email->viewVars(array('info' =>  array(
            "name" => $name,
            "email" => $user_email,
            "comment" => $comment
        )));
        $email->emailFormat('both');
        $email->send();

    }

    public function feedback_submit(){

        $subject = "Feedback from Flypass";
        $name = $this->request->data['Feedback']['name'];
        $user_email = $this->request->data['Feedback']['email'];
        $comment = $this->request->data['Feedback']['comment'];
        $rating = $this->request->data['Feedback']['rating'];

        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail();
        $email->from('no-reply@flypass.com.au');
        $email->to('support@flydigital.com.au');
        //$email->to('raf@flydigital.com.au');
        $email->subject($subject);
        $email->template('feedback', 'feedback');
        $email->viewVars(array('info' => array(
            "name" => $name,
            "email" => $user_email,
            "comment" => $comment,
            "rating" => $rating
        )));
        $email->emailFormat('both');
        $email->send();

    }

}
