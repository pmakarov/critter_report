<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public $helpers = array('Js', 'Html', 'Form', 'Session');
	var $components = array('Auth', 'Email', 'RequestHandler');
	
	public function beforeFilter() {
		
		$this->Auth->allow('register', 'recover', 'verify');
		
		parent::beforeFilter();

		// For CakePHP 2.0
		$this->Auth->allow('*');

		// For CakePHP 2.1 and up
		$this->Auth->allow();
		
		$this->Auth->allow('initDB'); // We can remove this line after we're finished
	}

	//custom function to quickset ACLs Son...
	public function initDB() {
    $role = $this->User->Role;
    //Allow admins to everything
    $role->id = 1;
    $this->Acl->allow($role, 'controllers');

    //allow managers to posts and widgets
    $role->id = 2;
    $this->Acl->deny($role, 'controllers');
    $this->Acl->allow($role, 'controllers/Reports');
    $this->Acl->allow($role, 'controllers/Posts');
    $this->Acl->allow($role, 'controllers/Widgets');

    //allow users to only add and edit on posts and widgets
    $role->id = 3;
    $this->Acl->deny($role, 'controllers');
    $this->Acl->allow($role, 'controllers/Reports/ajax_function');
    $this->Acl->allow($role, 'controllers/Reports/add');
    $this->Acl->allow($role, 'controllers/Reports/edit');
	$this->Acl->allow($role, 'controllers/Posts/add');
    $this->Acl->allow($role, 'controllers/Posts/edit');
	$this->Acl->allow($role, 'controllers/Users/set_location');
	$this->Acl->allow($role, 'controllers/Widgets/add');
	$this->Acl->allow($role, 'controllers/Widgets/edit'); 
   
    //we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
	}
	
	/**
     * Registration page for new users
     */
    public function register()
    {
		if($this->request->is('post') && $this->request->data) {
			if ($this->request->data['User']['password'] == $this->request->data['User']['password_confirm']){
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
		}
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}
	
	/**
     * Allows the user to email themselves a password redemption token
     */
    public function recover()
    {
        if ($this->Auth->user()) {
            $this->redirect(array('controller' => 'users', 'action' => 'account'));
        }
         
        if (!empty($this->data['User']['email'])) {
            $Token = ClassRegistry::init('Token');
            $user = $this->User->findByEmail($this->data['User']['email']);
             
            if ($user === false) {
                $this->Session->setFlash('No matching user found');
                return false;
            }
             
            $token = $Token->generate(array('User' => $user['User']));
            $this->Session->setFlash('An email has been sent to your account, please follow the instructions in this email.');
            $this->Email->to = $user['User']['email'];
            $this->Email->subject = 'Password Recovery';
            $this->Email->from = 'Support <support@critter.com>';
            $this->Email->template = 'recover';
            $this->set('user', $user);
            $this->set('token', $token);
            $this->Email->send();
        }
    }
     
    /**
     * Accepts a valid token and resets the users password
     */
    public function verify($token_str = null)
    {
        if ($this->Auth->user()) {
            $this->redirect(array('controller' => 'users', 'action' => 'account'));
        }
 
        $Token = ClassRegistry::init('Token');
         
        $res = $Token->get($token_str);
        if ($res) {
            // Update the users password
            $password = $this->User->generatePassword();
            $this->User->id = $res['User']['id'];
            $this->User->saveField('password', $this->Auth->password($password));
            $this->set('success', true);
 
            // Send email with new password
            $this->Email->to = $res['User']['email'];
            $this->Email->subject = 'Password Changed';
            $this->Email->from = 'Support <support@example.com>';
            $this->Email->template = 'verify';
            $this->set('user', $res);
            $this->set('password', $password);
            $this->Email->send();
        }
    }
	
	/**
     * Account details page (change password)
     */
    public function account()
    {
        // Set User's ID in model which is needed for validation
        $this->User->id = $this->Auth->user('id');
         
        // Load the user (avoid populating $this->data)
        $current_user = $this->User->findById($this->User->id);
        $this->set('current_user', $current_user);
 
        $this->User->useValidationRules('ChangePassword');
        $this->User->validate['password_confirm']['compare']['rule'] = array('password_match', 'password', false);
 
        $this->User->set($this->data);
        if (!empty($this->data) && $this->User->validates()) {
		
			// old algorithm asked to hass $password w/ Auth comp but no need.
		   $password = $this->data['User']['password'];
			//echo AuthComponent::password($password) . "<br/>";
			//die(); //23bd3f160cd86e6f3ef90c0d11c64d797eaa71d9 for password hash
            $this->User->saveField('password', $password);
 
            $this->Session->setFlash('Your password has been updated');
            $this->redirect(array('action' => 'account'));
        }       
    }

/**
* Dashboards
*/
	public function dashboard() {
      //get user's group (role)
    $role_name = $this->User->Role->field('name', array('id' => $this->Auth->User('role_id')));
    //group selection logic here
    $action = 'dashboard_' . $role_name;
   // $this->redirect('controller' => 'users' => 'action' => $action);
	$this->redirect(array('controller'=>'users','action' => $action), null, false);
  }
  
 public function dashboard_administrators() {
 $this->layout = 'dashboard';
 }
 
 public function set_location($data = null){
		$data_back = json_decode(file_get_contents('php://input'));
		$location = $data_back->{"location"};
		
		$id = $this->User->id = $this->Auth->user('id');
        $current_user = $this->User->findById($this->User->id);
        $this->set('current_user', $current_user);
		
		$formData = array('id'=> $id, 'location' => $location);
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else
		{
			/*$response = array('success' => true, 'userId' => $this->Session->read('Auth.User.id'),  'message' => __('My success message', true),
			'status' => '200');
			$this->layout = '';
			$this->set('response', $response);*/

			//$this->User->set('location', $location);
			//$this->User->read(null, 1);
			
			//var_dump($current_user);
			//die();
			
			
			$this->User->saveField('location', $location);
			$response = array('success' => true, 'userId' => $id,  'message' => __('My success message', true),
				'status' => '200');
				$this->layout = 'ajax';
				$this->autoRender = false;
			    echo json_encode($response);
			
				$this->Session->write('Auth.User.location', $location);
			/*if ($this->User->saveField('location', $location)) {
				$response = array('success' => true, 'userId' =>$id,  'message' => __('My success message', true),
				'status' => '200');
				$this->layout = 'ajax';
				$this->autoRender = false;
			    echo json_encode($response);
				//$this->layout = '';
				//$this->set('response', $response);
				
			}
			else {
				$response = array('success' => false,  'userId' => $id, 'message' => __('My error message', true),
				'status' => '200');
				$this->layout = '';
				$this->set('response', $response);
			}*/
		}
		
		
 }
 public function dashboard_users() {
 $this->layout = 'dashboard';
 
 //see if user has selected a location
 $this->set('userId', $this->Session->read('Auth.User.id'));
 
 if(!$this->Session->read("Auth.User.location")) {
	 $this->set('userLocation', 'false');
 }
 else
 {
	 $this->set('userLocation', $this->Session->read('Auth.User.location'));
	  //$current_user = $this->User->findById($this->User->id);
 }
		
 
	 $this->loadModel('Child');
	 $childrenOptions = $this->Child->find('list'); 
	 $childrenOptions = $this->Child->find('all',array('fields' => array('first_name','last_name','id')));
	 $childrenOptions_list = Set::combine($childrenOptions, '{n}.Child.id', array('{0} {1}', '{n}.Child.first_name', '{n}.Child.last_name'));
	 $this->set('childrenOptions', $childrenOptions_list);
 
	 //when out of demo- should by find all by user's domain/location 
	$this->loadModel('Report');
	//$reports = 
	$start = date('Y-m-d');
	//$end = date('Y-m-d', strtotime('+1 month'));
	//$conditions = array('Event.start <=' => $end, 'Event.end >=' => $start);
	//$conditions = array($start);
	$reports = $this->Report->find('all', array('conditions' => array('DATE(Report.created)' => $start)));
	//var_dump($reports);
	$this->set('reports', $reports);
	$children = $this->Report->Child->find('list');
	$rooms = $this->Report->Room->find('list');
	//$daycareCenters = $this->Report->DaycareCenter->find('list');
	$teachers = $this->Report->Teacher->find('list');
	$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers', 'childrenOptions_list'));
 
 }
  
  
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
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
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
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
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * login method
 *
 */
	public function login() {
		if ($this->Session->read('Auth.User')) {
			if ($this->request->is('ajax')) {
		        $this->layout = 'ajax';
				$this->autoRender = false;
				$arr = array("login" => "false" , "error" => "Already Logged in");
			    echo json_encode($arr);
			    }
			else{
				$this->Session->setFlash('You are logged in!');
				$role_name = $this->User->Role->field('name', array('id' => $this->Auth->User('role_id')));
				//group selection logic here
				$action = 'dashboard_' . $role_name;
			   // $this->redirect('controller' => 'users' => 'action' => $action);
				$this->redirect(array('controller'=>'users','action' => $action), null, false);
				//$this->redirect(array('controller'=>'reports','action' => 'index'), null, false);
			}
		}
		 
		
		else if ($this->request->is('ajax')){
		        $this->layout = 'ajax';
				$this->autoRender = false;
				//$data_back = json_decode(file_get_contents('php://input'));
				// echo $this->request->data['j_password'];
				//var_dump($data_back);
				// $tmp = $this->Auth->User();
		        if ($this->Auth->login())  
			    {  
					//echo AuthComponent::password($this->data['User']['password']);
					// Set User's ID in model which is needed for validation
					$this->User->id = $this->Auth->user('id');
					 
					// Load the user (avoid populating $this->data)
					$current_user = $this->User->findById($this->User->id);
					$this->set('current_user', $current_user);
					/*if ($this->User->saveField('lastlogin', date('Y-m-d H:i:s')))
					{
						debug($this->User->validationErrors); die();
					}
					else
					{
						debug($this->User->validationErrors); die();
					}
					*/
					
					//$id = $this->Auth->user('id'); 
					//$fields = array('lastlogin' => date('Y-m-d H:i:s'), 'modified' => false);
					//$this->User->id = $id;
					//$this->User->save($fields, false, array('lastlogin'));
				
					$role_name = $this->User->Role->field('name', array('id' => $this->Auth->User('role_id')));
					//group selection logic here
					$action = 'dashboard_' . $role_name;
				   // $this->redirect('controller' => 'users' => 'action' => $action);
					//$this->redirect(array('controller'=>'users','action' => $action), null, false);
			         $arr = array("login" => "true" , "redirect" => Router::url(array("controller"=>"users","action"=>$action)));
					// $this->redirect(array('controller'=>'reports','action' => 'index'));
			         echo json_encode($arr);
			    }  
			    else  
			    {  
			         $arr = array("login" => "false" , "error" => "Invalid Username or Password <br> Please try again.");
			         echo json_encode($arr);
			    } 
		 }
		else if ($this->request->is('post')) {
			if ($this->Auth->login()) {
					$id = $this->Auth->user('id'); 
					$fields = array('lastlogin' => date('Y-m-d H:i:s'), 'modified' => false);
					$this->User->id = $id;
					$this->User->save($fields, false, array('lastlogin'));
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Your username or password was incorrect.');
			}
		}
	}
	

	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}
}