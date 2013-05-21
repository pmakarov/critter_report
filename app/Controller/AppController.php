<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

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
	public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        'Cookie'
		//'DebugKit.Toolbar'
    );
	public $is_mobile = false;
  	public $layouts = array('desktop', 'mobile');
	
    public $helpers = array('Js', 'Html', 'Form', 'Session');

    public function beforeFilter() {
    	
		/*
		// Using "rijndael" encryption because the default "cipher" type of encryption fails to decrypt when PHP has the Suhosin patch installed. 
	    // See: http://cakephp.lighthouseapp.com/projects/42648/tickets/471-securitycipher-function-cannot-decrypt
	    $this->Cookie->type('rijndael');
	
	    // When using "rijndael" encryption the "key" value must be longer than 32 bytes.
	    $this->Cookie->key = 'qSI242342432qs*&sXOw!adre@34SasdadAWQEAv!@*(XSL#$%)asGb$@11~_+!@#HKis~#^'; // When using rijndael encryption this value must be longer than 32 bytes.
	
	    // Flag whether the layout is being "forced" i.e overwritten/controlled by the user (true or false)
	    $forceLayout = $this->Cookie->read('Options.forceLayout');
	
	    // Identify the layout the user wishes to "force" (mobile or desktop)
	    $forcedLayout = $this->Cookie->read('Options.forcedLayout');
	
	    // Check URL paramaters for ?forcedLayout=desktop or ?forcedLayout=mobile and persist this decision in a COOKIE
	    if( isset($this->params->query['forcedLayout']) && in_array($this->params->query['forcedLayout'], $this->layouts) )
	    {
	        $forceLayout = true;
	        $forcedLayout = $this->params->query['forcedLayout'];
	        $this->Cookie->write('Options.forceLayout', $forceLayout);
	        $this->Cookie->write('Options.forcedLayout', $forcedLayout);
	    }
	
	    // We use CakePHP's built in "mobile" User-Agent detection (a pretty basic list of UA's see: /lib/Cake/Network/CakeRequest.php)
	    // Note: For more robust detection consider using "Mobile Detect" (https://github.com/serbanghita/Mobile-Detect) or WURL (http://wurfl.sourceforge.net/)
	    if( ( $forceLayout && $forcedLayout == 'mobile' ) || ( !$forceLayout && $this->request->is('mobile') ) )  {
	        $this->is_mobile = true;
	        $this->autoRender = false; // take care of rendering in the afterFilter()
	    }
	
	    $this->set('is_mobile', $this->is_mobile);
			
		
		if($this->is_mobile){
			$this->Auth->allow('*');
		}
		else {*/
			 //Configure AuthComponent
	        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
	        $this->Auth->logoutRedirect = array('controller' => '/');
	        //$this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'add');
	        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'dashboard');
			$this->Auth->allow('display');
			
	//	}
       
		

    }
	
	/**
     * Before Render
     */
   /* function beforeRender()
    {
        unset($this->data['User']['password']);
        unset($this->data['User']['password_confirm']);
    }*/
    
    // executed after all controller logic, including the view render.
  /*	public function afterFilter() {

    // if in mobile mode, check for a vaild layout and/or view and use it
    if( $this->is_mobile ) {
        $has_mobile_view_file = file_exists( ROOT . DS . APP_DIR . DS . 'View' . DS . $this->name . DS . 'mobile' . DS . $this->action . '.ctp' );
        $has_mobile_layout_file = file_exists( ROOT . DS . APP_DIR . DS . 'View' . DS . 'Layouts' . DS . 'mobile' . DS . $this->layout . '.ctp' );

        $view_file = ( $has_mobile_view_file ? 'mobile' . DS : '' ) . $this->action;
        $layout_file = ( $has_mobile_layout_file ? 'mobile' . DS : '' ) . $this->layout;

        $this->render( $view_file, $layout_file );
    }
  }*/
}
