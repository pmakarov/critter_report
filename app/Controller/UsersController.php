<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	public $helpers = array('Html', 'Form', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();

		// For CakePHP 2.0
		$this->Auth->allow('*');

		// For CakePHP 2.1 and up
		$this->Auth->allow();
		
		//$this->Auth->allow('initDB'); // We can remove this line after we're finished
	}

	/* custom function to quickset ACLs Son...
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
    $this->Acl->allow($role, 'controllers/Reports/add');
    $this->Acl->allow($role, 'controllers/Reports/edit');
	$this->Acl->allow($role, 'controllers/Posts/add');
    $this->Acl->allow($role, 'controllers/Posts/edit');
    $this->Acl->allow($role, 'controllers/Widgets/add');
    $this->Acl->allow($role, 'controllers/Widgets/edit');
    //we add an exit to avoid an ugly "missing views" error message
    echo "all done";
    exit;
	}*/
	
	
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
 public function dashboard_users() {
 $this->layout = 'dashboard';
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
			if ($this->request->is('ajax')){
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