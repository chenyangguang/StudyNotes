<?php

//use Phalcon\Mvc\Controller;
//class SignupController extends Controller
class SignupController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
        //exit("test");
	}

	public function registerAction()
	{
        //Request varialbles from html form
        //$name = $this->request->getPost('name', 'string');
        //$email = $this->request->getPost('email', 'email');
        //$user = new Users();
        //$user->name=$name;
        //$use->email = $email;
        //
        //Store and check for errors
        //if ($user->save() == true) {
            //echo "ok";
        //}else{
        //echo "Sorry, the following problem";
        //
        //foreach($user->getMessages() as $message)
        //{
        //echo $message->getMessage(), '<br />'
        //}
        //}

		$user = new Users();

		// Store and check for errors
		$success = $user->save(
			$this->request->getPost(),
			array('name', 'email')
		);

		if ($success) {
			echo "Thanks for registering!";
		} else {
			echo "Sorry, the following problems were generated: ";
			foreach ($user->getMessages() as $message) {
				echo $message->getMessage(), "<br/>";
			}
		}

		$this->view->disable();
	}

}
