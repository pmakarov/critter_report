<?php
App::uses('AppController', 'Controller');
/**
 * DaycareCenters Controller
 *
 * @property DaycareCenter $DaycareCenter
 */
class DaycareCentersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->DaycareCenter->recursive = 0;
		$this->set('daycareCenters', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DaycareCenter->exists($id)) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		$options = array('conditions' => array('DaycareCenter.' . $this->DaycareCenter->primaryKey => $id));
		$this->set('daycareCenter', $this->DaycareCenter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DaycareCenter->create();
			if ($this->DaycareCenter->save($this->request->data)) {
				$this->Session->setFlash(__('The daycare center has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daycare center could not be saved. Please, try again.'));
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
		if (!$this->DaycareCenter->exists($id)) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DaycareCenter->save($this->request->data)) {
				$this->Session->setFlash(__('The daycare center has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daycare center could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DaycareCenter.' . $this->DaycareCenter->primaryKey => $id));
			$this->request->data = $this->DaycareCenter->find('first', $options);
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
		$this->DaycareCenter->id = $id;
		if (!$this->DaycareCenter->exists()) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DaycareCenter->delete()) {
			$this->Session->setFlash(__('Daycare center deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Daycare center was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DaycareCenter->recursive = 0;
		$this->set('daycareCenters', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DaycareCenter->exists($id)) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		$options = array('conditions' => array('DaycareCenter.' . $this->DaycareCenter->primaryKey => $id));
		$this->set('daycareCenter', $this->DaycareCenter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DaycareCenter->create();
			if ($this->DaycareCenter->save($this->request->data)) {
				$this->Session->setFlash(__('The daycare center has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daycare center could not be saved. Please, try again.'));
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
		if (!$this->DaycareCenter->exists($id)) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DaycareCenter->save($this->request->data)) {
				$this->Session->setFlash(__('The daycare center has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The daycare center could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DaycareCenter.' . $this->DaycareCenter->primaryKey => $id));
			$this->request->data = $this->DaycareCenter->find('first', $options);
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
		$this->DaycareCenter->id = $id;
		if (!$this->DaycareCenter->exists()) {
			throw new NotFoundException(__('Invalid daycare center'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DaycareCenter->delete()) {
			$this->Session->setFlash(__('Daycare center deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Daycare center was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
