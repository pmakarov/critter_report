<?php
App::uses('AppController', 'Controller');

/**
 * Reports Controller
 *
 * @property Report $Report
 */
class ReportsController extends AppController {
var $components = array('RequestHandler');
/**
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout='twit';
		$this->Report->recursive = 0;
		$this->set('reports', $this->paginate());
		
	}


/**
 * Ajax Attempt
 *
 */	
	public function ajax_function($data = null) {
		
		$data_back = json_decode(file_get_contents('php://input'));
		
		// set json string to php variables
		sleep(4);
		//First I'm going to try things the hard way...
		$id = $data_back->{"id"};
		$userId = $data_back->{"userId"};
		$status = $data_back->{"status"};
		$date = $data_back->{"date" };
		$childId = $data_back->{"student"};
		$teachers = $data_back->{ "teachers" };
		$dailyActivity = $data_back->{"dailyActivity"};
		$neededItems = $data_back->{"neededItems"};
		$attitudes = $data_back->{"attitudes"};
		$sleepMessage = $data_back->{"sleepMessage"};
		$percentageBreakfastComplete = $data_back->{"percentageBreakfastComplete"};
		$percentageLunchComplete = $data_back->{"percentageLunchComplete"};
		$percentageSnackComplete = $data_back->{"percentageSnackComplete"};
		$pottyEvents = $data_back->{"pottyEvents"};
		$teacherComments = $data_back->{"teacherComments"};
		
		
		$formData = array('user_id' => $userId, 'status' => $status, 'date' => $date, 'child_Id' => $childId, 'teacher_list' => $teachers, 'needed_items' => $neededItems,
					'attitude' => $attitudes, 'sleep' => $sleepMessage, 'breakfast' => $percentageBreakfastComplete, 'lunch' => $percentageLunchComplete, 'snack' => $percentageSnackComplete,
					'potty' => $pottyEvents, 'notes' => $teacherComments, "daily_activity" =>  $dailyActivity,);
		if ($this->Report->save($formData)) {
			$response = array('success' => true, 'userId' => $userId, 'student' => $childId, 'date' => $date, 'id' => $this->Report->id,
			'message' => __('My success message', true),
			'status' => '200');
			$this->layout = '';
			$this->set('response', $response);
		}
		else {
			$response = array('success' => false, 'userId' => $userId, 'teachers' => $teachers, 'date' => $date,
			'message' => __('My error message', true),
			'status' => '200');
			$this->layout = '';
			$this->set('response', $response);
		}
		
	}

/**
 * save method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function save($id = null) {
	    // check if the form has been posted
	    if ($this->request->is('post')) {
	        // try to validate and save
	        if ($this->Report->save($this->request->data)) {
	            $this->Session->setFlash('Report Saved!');
	            $this->redirect(array('action' => 'index'));
	        }
	    }
	 
	    // if an id has been passed, send record data to the view
	    if ($id) {
	       	$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		  	$this->request->data = $this->Report->find('first', $options);
		   	$children = $this->Report->Child->find('list');
			$rooms = $this->Report->Room->find('list');
			$daycareCenters = $this->Report->DaycareCenter->find('list');
			$teachers = $this->Report->Teacher->find('list');
			$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers'));
		}

		
	}

 
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout='twit';
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'twit';
		
		$this->loadModel('Teacher');
		$teacherOptions = $this->Teacher->find('list'); 
		$this->set('teacherOptions', $teacherOptions);
		
		$this->loadModel('Child');
		$childrenOptions = $this->Child->find('list'); 
		$childrenOptions = $this->Child->find('all',array('fields' => array('first_name','last_name','id')));
		$childrenOptions_list = Set::combine($childrenOptions, '{n}.Child.id', array('{0} {1}', '{n}.Child.first_name', '{n}.Child.last_name'));
		
		$this->set('childrenOptions', $childrenOptions_list);
		
		
		
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		}
		
		/*$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers'));*/
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Report->exists($id)) {
			//throw new NotFoundException(__('Invalid report'));
			$this->redirect('add');
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
		}
		$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers'));
	}




/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Report->delete()) {
			$this->Session->setFlash(__('Report deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Report was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Report->recursive = 0;
		$this->set('reports', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
		$this->set('report', $this->Report->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->layout='twit';
		if ($this->request->is('post')) {
			$this->Report->create();
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		}
		$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Report->exists($id)) {
			throw new NotFoundException(__('Invalid report'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Report->save($this->request->data)) {
				$this->Session->setFlash(__('The report has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The report could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Report.' . $this->Report->primaryKey => $id));
			$this->request->data = $this->Report->find('first', $options);
		}
		$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Report->id = $id;
		if (!$this->Report->exists()) {
			throw new NotFoundException(__('Invalid report'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Report->delete()) {
			$this->Session->setFlash(__('Report deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Report was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
