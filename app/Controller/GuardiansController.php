<?php
App::uses('AppController', 'Controller');
/**
 * Guardians Controller
 *
 * @property Guardian $Guardian
 */
class GuardiansController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Guardian->recursive = 0;
		$this->set('guardians', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Guardian->exists($id)) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		$options = array('conditions' => array('Guardian.' . $this->Guardian->primaryKey => $id));
		$this->set('guardian', $this->Guardian->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Guardian->create();
			if ($this->Guardian->save($this->request->data)) {
				$this->Session->setFlash(__('The guardian has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guardian could not be saved. Please, try again.'));
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
		if (!$this->Guardian->exists($id)) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Guardian->save($this->request->data)) {
				$this->Session->setFlash(__('The guardian has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guardian could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Guardian.' . $this->Guardian->primaryKey => $id));
			$this->request->data = $this->Guardian->find('first', $options);
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
		$this->Guardian->id = $id;
		if (!$this->Guardian->exists()) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Guardian->delete()) {
			$this->Session->setFlash(__('Guardian deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Guardian was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Guardian->recursive = 0;
		$this->set('guardians', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Guardian->exists($id)) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		$options = array('conditions' => array('Guardian.' . $this->Guardian->primaryKey => $id));
		$this->set('guardian', $this->Guardian->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Guardian->create();
			if ($this->Guardian->save($this->request->data)) {
				$this->Session->setFlash(__('The guardian has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guardian could not be saved. Please, try again.'));
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
		if (!$this->Guardian->exists($id)) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Guardian->save($this->request->data)) {
				$this->Session->setFlash(__('The guardian has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guardian could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Guardian.' . $this->Guardian->primaryKey => $id));
			$this->request->data = $this->Guardian->find('first', $options);
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
		$this->Guardian->id = $id;
		if (!$this->Guardian->exists()) {
			throw new NotFoundException(__('Invalid guardian'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Guardian->delete()) {
			$this->Session->setFlash(__('Guardian deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Guardian was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
