<?php
App::uses('AppController', 'Controller');
/**
 * EmployeeTypes Controller
 *
 * @property EmployeeType $EmployeeType
 */
class EmployeeTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EmployeeType->recursive = 0;
		$this->set('employeeTypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
		$this->set('employeeType', $this->EmployeeType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EmployeeType->create();
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
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
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
			$this->request->data = $this->EmployeeType->find('first', $options);
		}
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
		$this->EmployeeType->id = $id;
		if (!$this->EmployeeType->exists()) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EmployeeType->delete()) {
			$this->Session->setFlash(__('Employee type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Employee type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->EmployeeType->recursive = 0;
		$this->set('employeeTypes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
		$this->set('employeeType', $this->EmployeeType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->EmployeeType->create();
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EmployeeType->exists($id)) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->EmployeeType->save($this->request->data)) {
				$this->Session->setFlash(__('The employee type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmployeeType.' . $this->EmployeeType->primaryKey => $id));
			$this->request->data = $this->EmployeeType->find('first', $options);
		}
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
		$this->EmployeeType->id = $id;
		if (!$this->EmployeeType->exists()) {
			throw new NotFoundException(__('Invalid employee type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EmployeeType->delete()) {
			$this->Session->setFlash(__('Employee type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Employee type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
