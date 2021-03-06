<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Reports Controller
 *
 * @property Report $Report
 */
class ReportsController extends AppController {
public $helpers = array('Js', 'Html', 'Form', 'Session');
var $components = array('Auth', 'Email', 'RequestHandler');
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
		//sleep(4);
		//First I'm going to try things the hard way...
		$id = $data_back->{"id"};
		$userId = $data_back->{"userId"};
		$roomId = $data_back->{"room"};
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
		
		
	
		
		$formData = array('id' => $id, 'user_id' => $userId, 'room_id' => $roomId, 'status' => $status, 'date' =>  date('Y-m-d', strtotime($date)), 'child_id' => $childId, 'teacher_list' => $teachers, 'needed_items' => $neededItems,
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
		$this->layout = 'dashboard';
		
		$this->loadModel('Teacher');
		$teacherOptions = $this->Teacher->find('list'); 
		$this->set('teacherOptions', $teacherOptions);
		
		$this->loadModel('Child');
		$childrenOptions = $this->Child->find('list'); 
		$childrenOptions = $this->Child->find('all',array('fields' => array('first_name','last_name','id')));
		$childrenOptions_list = Set::combine($childrenOptions, '{n}.Child.id', array('{0} {1}', '{n}.Child.first_name', '{n}.Child.last_name'));
		
		$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		
		
 		$this->set('userId', $this->Session->read('Auth.User.id'));
		if(!$this->Session->read("Auth.User.location")) {
			 $this->set('userLocation', 'false');
		 }
		 else {
			 $this->set('userLocation', $this->Session->read('Auth.User.location'));
		 }
		
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers', 'childrenOptions_list'));
		
		
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
		
		$this->layout = 'dashboard';
		
		$this->loadModel('Teacher');
		$teacherOptions = $this->Teacher->find('list'); 
		$this->set('teacherOptions', $teacherOptions);
		
		$this->loadModel('Child');
		$childrenOptions = $this->Child->find('list'); 
		$childrenOptions = $this->Child->find('all',array('fields' => array('first_name','last_name','id')));
		$childrenOptions_list = Set::combine($childrenOptions, '{n}.Child.id', array('{0} {1}', '{n}.Child.first_name', '{n}.Child.last_name'));
		
 		$this->set('userId', $this->Session->read('Auth.User.id'));
		if(!$this->Session->read("Auth.User.location")) {
			 $this->set('userLocation', 'false');
		 }
		 else {
			 $this->set('userLocation', $this->Session->read('Auth.User.location'));
		 }
		
		
		
		
		$children = $this->Report->Child->find('list');
		$rooms = $this->Report->Room->find('list');
		$daycareCenters = $this->Report->DaycareCenter->find('list');
		$teachers = $this->Report->Teacher->find('list');
		
		$this->set(compact('children', 'rooms', 'daycareCenters', 'teachers', 'childrenOptions_list', 'id'));
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
	
	public function get_reports($data = null){
		
		$data_back = json_decode(file_get_contents('php://input'));
				$date = $data_back->{"date"};
				$room = $data_back->{"room"};
				
				//$start = date('Y-m-d');
				//$end = date('Y-m-d', strtotime('+1 month'));
				//$conditions = array('Event.start <=' => $end, 'Event.end >=' => $start);
				//echo "<br/>" .  $room;
				
				$conditions = array($date);
				$children = $this->Report->Child->find(
					'all',
					array( 'order' => array('Child.last_name' => 'ASC'),
					)
				);
				//echo count($children) . "<br/>";
				
				$reports = $this->Report->find(
					'all', 
					array(
						'conditions' => array(
								'DATE(Report.created)' => $date,
								'Report.room_id' => $room
								),
						'order' => array('Child.last_name' => "ASC") 
						)
				);
				
				//Check to see if we have ANY reports; if no then let's create and insert new report shells into db
				if( count($reports) == 0)
				{
					$start = date('Y-m-d');
					$data = array();
					    
					foreach ($children as $key) {
						$formData = array(
							'user_id' => $this->Session->read('Auth.User.id'), 
							'room_id' => $room, 
							'status' => "DRAFT", 
							'date' => $start, 
							'child_id' => $key['Child']['id']);
						
						array_push($data, $formData);
					}
					
					if($this->Report->saveAll($data))
					{
						
						$reports = $this->Report->find(
							'all', 
							array(
								'conditions' => array(
										'DATE(Report.created)' => $date,
										'Report.room_id' => $room
										),
								'order' => array('Child.last_name' => "ASC") 
								)
						);
						
						$data = array();
					 
						foreach ($reports as $key) {
							//echo "<br/>" .  $key['Report']['room_id'];
							
							$formData = array(
								'id' => $key['Report']['id'],
								'user_id' => $key['Report']['user_id'], 
								'room_id' => $key['Report']['room_id'], 
								'status' => $key['Report']['status'], 
								'date' => $key['Report']['date'], 
								'child_id' => $key['Report']['child_id']
								);
							
							foreach($children as $var){
								
								if($var['Child']['id'] == $key['Report']['child_id'])
								{
									$formData['child_name'] = $var['Child']['last_name'] . ', ' . $var['Child']['first_name'];
								}
							}
							
							array_push($data, $formData);
						}
						$response = array('success' => true,  'reports' => json_encode($data), 'message' => __('My success message', true),
						'status' => '200');
						$this->layout = 'ajax';
						$this->autoRender = false;
						echo json_encode($response);
					}
					else {
						$response = array('success' => false, 'message' => __('My epic fail message', true),
						'status' => '200');
						$this->layout = 'ajax';
						$this->autoRender = false;
						echo json_encode($response);
					}
				}
				else {
				
					$data = array();
					 
					foreach ($reports as $key) {
						$formData = array(
							'id' => $key['Report']['id'],
							'user_id' => $key['Report']['user_id'], 
							'room_id' => $key['Report']['room_id'], 
							'status' => $key['Report']['status'], 
							'date' => $key['Report']['date'], 
							'child_id' => $key['Report']['child_id']
							);
						
						foreach($children as $var){
							
							if($var['Child']['id'] == $key['Report']['child_id'])
							{
								$formData['child_name'] = $var['Child']['last_name'] . ', ' . $var['Child']['first_name'];
							}
						}
						
						array_push($data, $formData);
					}
					
					$response = array('success' => true,  'reports' => json_encode($data), 'message' => __('My success message', true),
						'status' => '200');
						$this->layout = 'ajax';
						$this->autoRender = false;
						echo json_encode($response);
					
				}
				
				
		}
		public function clear_report($data = null){
		
		$data_back = json_decode(file_get_contents('php://input'));
		$id = $data_back->{"id"};
		$this->Report->id =  $id;
		$formData = array('user_id' => null, 'room_id' => null, 'status' => 'DRAFT', 
					);
		if ($this->Report->save($formData)) {
			$response = array('success' => true,  'id' => $this->Report->id,
			'message' => __('My success message', true),
			'status' => '200');
			$this->layout = 'ajax';
			$this->autoRender = false;
			$this->set('response', $response);
		}
		else {
			$response = array('success' => false,  'userId' => $id, 'message' => __('My error message', true),
				'status' => '200');
				$this->layout = 'ajax';
				$this->autoRender = false;
				$this->set('response', $response);
			}
		}
		
		
		
		public function send_report($id = null) {
			$this->Report->id = $id;
			 if (!$this->Report->exists()) {
		        throw new NotFoundException(__('Invalid report'));
		    }
			
			$report = $this->Report->read(null, $id);
			
			$Email = new CakeEmail('default');	
			$Email->viewVars(compact('report'));
			$Email->template('critter_report');
		    $Email->emailFormat('html');
			$today = date('m/d/Y');
			$subject = 'Critter Report- ' . $today;
			$Email->subject($subject);
		    $Email->to(array('subv14@hotmail.com'));
		    $Email->from('makarov9mm@gmail.com');
		    $Email->send();
			
			$this->redirect(array('controller' => 'users', 'action' => 'dashboard_users'));
		}
		
		public function view_pdf($id = null) {
		    $this->Report->id = $id;
		    if (!$this->Report->exists()) {
		        throw new NotFoundException(__('Invalid report'));
		    }
		    // increase memory limit in PHP
		    ini_set('memory_limit', '512M');
		    $this->set('report', $this->Report->read(null, $id));
		}
		
		public function print_reports($reports = null){
            App::import('Vendor', 'dompdf', array('file'=> 'dompdf' . DS . 'dompdf_config.inc.php'));
           
            $id = json_decode($this->request->params['named']['reports']);
           
            //echo($id[0]) . "<br/>";
            //echo($id[1]) . "<br/>";
            //$data_back = json_decode(file_get_contents('php://input'));
            //$reports = $data_back->{"reports"};
            $reports = $id;
            ini_set('memory_limit', '512M');
            $arr = $this->Report->find('all', array('conditions' => array("Report.id" => $reports)));
            $children = $this->Report->Child->find(
                    'all',
                    array( 'order' => array('Child.last_name' => 'ASC'),
                    )
                );
               
                //var_dump($arr);
                //die();
            $html = '<html><body>';
            foreach ($arr as $key) {
                           
                $div = '<div STYLE="page-break-after: always">' . '<h2>Critter Report</h2>'
                . '<strong>Date: </strogn>' . $key['Report']['date'] . "<br/>"
                . '<strong>Room: </strong>'. $key['Room']['name'] . "<br/>"
                . $key['Report']['user_id'] . "<br/>"
                . $key['Report']['room_id'] . "<br/>"
                . $key['Report']['status'] . "<br/>"
                . $key['Report']['date'] . "<br/>"
                . $key['Report']['child_id'] . "<br/>"
                . '</div>';
                $html .= $div;
            }
           
            $html .= '</body></html>';
           
           
            $this->dompdf = new DOMPDF();
            $papersize = "legal";
            $orientaion = "portrait";
       
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientaion);
            $this->dompdf->render();
           
            $output = $this->dompdf->output();
            echo $output;
            file_put_contents('Reports.pdf', $output);
           
            //$this->ext = 'pdf';
            $this->set('arr', $arr);
            $this->response->type('pdf');
          
            //$this->Report->id =  $reports;
           
            //$this->set('report', $this->Report->read(null, 223));
            //return new CakeResponse(array('body'=> json_encode(array('success' => true,'message'=>'Reports sent to Print')),'status'=>200));
               
            //$this->layout = 'pdf';
            //$this->response->download('biff.pdf');
            //$this->autoRender = false;
            //$this->render('pdf/print_reports');
             //$this->redirect(array('action' => 'index'));
        }
		
		public function email_reports($reports = null){
			$data_back = json_decode(file_get_contents('php://input'));
			$reports = $data_back->{"reports"};
			
			for ($i=0; $i<count($reports); $i++)
			{
				$id = $reports[$i];
				$this->Report->id = $id;
				if (!$this->Report->exists()) {
			        throw new NotFoundException(__('Invalid report'));
			    }
				
				$report = $this->Report->read(null, $id);
				$this->Report->saveField('status', 'SENT');
				//$this->Report->save();
				
				$this->Report->Child->id = $report['Report']['child_id'];
				
				$guard = $this->Report->Child->Guardian->find('all');
				$recipients = array();
				foreach ($guard as $key ) {
					array_push($recipients, $key['Guardian']['email']);
				}
				
				$Email = new CakeEmail('default');	
				$Email->viewVars(compact('report'));
				$Email->template('critter_report');
			    $Email->emailFormat('html');
				$today = date('m/d/Y');
				$subject = 'Critter Report- ' . $today;
				$Email->subject($subject);
			    $Email->to($recipients);
			    $Email->from('info@critter-report.com');
			    $Email->send();
				
				}
				
				
				return new CakeResponse(array('body'=> json_encode(array('success' => true,'message'=>'Reports sent')),'status'=>200));
				//$response = array('success' => true, 'message' => "wut?", 'status' => '200');
				//$this->layout = 'ajax';
				//$this->autoRender = false;
				//$this->set('response', $response);
				
		}

		public function set_tag_data($reports = null){
			$data_back = json_decode(file_get_contents('php://input'));
			$reports = $data_back->{"reports"};
			
			$teacher_comments = $this->Session->read('Auth.User.teacher_notes');
			$activities = $this->Session->read('Auth.User.activities');
			$teachers = $this->Session->read('Auth.User.teachers');
			
			for ($i=0; $i<count($reports); $i++)
			{
				$id = $reports[$i];
				$this->Report->id = $id;
				if (!$this->Report->exists()) {
			        throw new NotFoundException(__('Invalid report'));
			    }
				
				$report = $this->Report->read(null, $id);
				$this->Report->saveField('teacher_list', $teachers);
				$this->Report->saveField('daily_activity', $activities);
				$this->Report->saveField('notes', $teacher_comments);
			}
			return new CakeResponse(array('body'=> json_encode(array('success' => true,'message'=>'Tag data saved to reports')),'status'=>200));		
 		}
		
		public function mark_absent($reports = null){
			$data_back = json_decode(file_get_contents('php://input'));
			$reports = $data_back->{"reports"};
			
			for ($i=0; $i<count($reports); $i++)
			{
				$id = $reports[$i];
				$this->Report->id = $id;
				if (!$this->Report->exists()) {
			        throw new NotFoundException(__('Invalid report'));
			    }
				
				$report = $this->Report->read(null, $id);
				$this->Report->saveField('status', 'ABSENT');
			}
			return new CakeResponse(array('body'=> json_encode(array('success' => true,'message'=>'Reports marked absent')),'status'=>200));		
 		}
	
	}


