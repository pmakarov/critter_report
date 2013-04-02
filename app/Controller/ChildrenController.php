<?php
App::uses('AppController', 'Controller');
/**
 * Children Controller
 *
 * @property Child $Child
 */
class ChildrenController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Child->recursive = 0;
		$this->set('children', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Child->exists($id)) {
			throw new NotFoundException(__('Invalid child'));
		}
		$options = array('conditions' => array('Child.' . $this->Child->primaryKey => $id));
		$this->set('child', $this->Child->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Child->create();
			if ($this->Child->save($this->request->data)) {
				$this->Session->setFlash(__('The child has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child could not be saved. Please, try again.'));
			}
		}
		$daycareCenters = $this->Child->DaycareCenter->find('list');
		$rooms = $this->Child->Room->find('list');
		$guardians = $this->Child->Guardian->find('list');
		$this->set(compact('daycareCenters', 'rooms', 'guardians'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Child->exists($id)) {
			throw new NotFoundException(__('Invalid child'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Child->save($this->request->data)) {
				$this->Session->setFlash(__('The child has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Child.' . $this->Child->primaryKey => $id));
			$this->request->data = $this->Child->find('first', $options);
		}
		$daycareCenters = $this->Child->DaycareCenter->find('list');
		$rooms = $this->Child->Room->find('list');
		$guardians = $this->Child->Guardian->find('list');
		$this->set(compact('daycareCenters', 'rooms', 'guardians'));
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
		$this->Child->id = $id;
		if (!$this->Child->exists()) {
			throw new NotFoundException(__('Invalid child'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Child->delete()) {
			$this->Session->setFlash(__('Child deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Child was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Child->recursive = 0;
		$this->set('children', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Child->exists($id)) {
			throw new NotFoundException(__('Invalid child'));
		}
		$options = array('conditions' => array('Child.' . $this->Child->primaryKey => $id));
		$this->set('child', $this->Child->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Child->create();
			if ($this->Child->save($this->request->data)) {
				$this->Session->setFlash(__('The child has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child could not be saved. Please, try again.'));
			}
		}
		$daycareCenters = $this->Child->DaycareCenter->find('list');
		$rooms = $this->Child->Room->find('list');
		$guardians = $this->Child->Guardian->find('list');
		$this->set(compact('daycareCenters', 'rooms', 'guardians'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Child->exists($id)) {
			throw new NotFoundException(__('Invalid child'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Child->save($this->request->data)) {
				$this->Session->setFlash(__('The child has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The child could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Child.' . $this->Child->primaryKey => $id));
			$this->request->data = $this->Child->find('first', $options);
		}
		$daycareCenters = $this->Child->DaycareCenter->find('list');
		$rooms = $this->Child->Room->find('list');
		$guardians = $this->Child->Guardian->find('list');
		$this->set(compact('daycareCenters', 'rooms', 'guardians'));
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
		$this->Child->id = $id;
		if (!$this->Child->exists()) {
			throw new NotFoundException(__('Invalid child'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Child->delete()) {
			$this->Session->setFlash(__('Child deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Child was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
