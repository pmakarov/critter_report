<?php
App::uses('AppController', 'Controller');
/**
 * Contacts  Controller
 * Use: For contacting the site for any reason
 */

class ContactsController extends Controller {
 
    public $components = array('Email','MathCaptcha' => array('timer' => 3));
 
    function send() {
        if(!empty($this->data)) {
            $this->Contact->set($this->data);
			
 			if ($this->MathCaptcha->validate($this->data['Contact']['captcha'])) {
	            if($this->Contact->validates()) {
	                if(!empty($this->data['Contact']['company'])) {
	                    $this->Email->from = $this->data['Contact']['company'] . ' - ' . $this->data['Contact']['name'] . ' <' . $this->data['Contact']['email'] . '>';
	                } else {
	                    $this->Email->from = $this->data['Contact']['name'] . ' <' . $this->data['Contact']['email'] . '>';
	                }
	                $this->Email->to = 'krain.arnold@gmail.com';
					$this->Email->cc = 'makarov9mm@gmail.com';
	                $this->Email->subject = 'Critter request';
					try {
							// success message
							$this->Email->send($this->data['Contact']['message']);
						
						}
						catch(Exception $e){
							echo $e->getMessage();
						}
	              
	                //$this->Session->setFlash('Your message has been sent.');
	                // Display the success.ctp page instead of the form again
	                $this->render('success');
	            } else {
	                $this->render('index');
	            }
            }
			else {
					
						$message ='Could not complete contact request!';
						$this->Session->setFlash($message, 'default',  array('class' => 'flash'));
				}
        }
    }
 
    function index() {
        // Placeholder for index. No actual action here, everything is submitted to the send function.
        $captcha = $this->MathCaptcha->getCaptcha();
		$this->set(compact('captcha'));
    }
 
}
?>