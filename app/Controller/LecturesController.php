<?php
App::uses('AppController', 'Controller');
/**
 * Lectures Controller
 *
 * @property Lecture $Lecture
 * @property PaginatorComponent $Paginator
 */
class LecturesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lecture->recursive = 0;
		$this->set('lectures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id), 'recursive' => 2);
		$this->set('lecture', $this->Lecture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lecture->create();
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$users = $this->Lecture->User->find('list');
		$hosts = $this->Lecture->Host->find('list');
		$eventTypes = $this->Lecture->EventType->find('list');
		$this->set(compact('users', 'hosts', 'eventTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id));
			$this->request->data = $this->Lecture->find('first', $options);
		}
		$users = $this->Lecture->User->find('list');
		$hosts = $this->Lecture->Host->find('list');
		$eventTypes = $this->Lecture->EventType->find('list');
		$this->set(compact('users', 'hosts', 'eventTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Lecture->id = $id;
		if (!$this->Lecture->exists()) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lecture->delete()) {
			$this->Session->setFlash(__('The lecture has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The lecture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Lecture->recursive = 0;
		$this->set('lectures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id));
		$this->set('lecture', $this->Lecture->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Lecture->create();
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$users = $this->Lecture->User->find('list');
		$hosts = $this->Lecture->Host->find('list');
		$eventTypes = $this->Lecture->EventType->find('list');
		$this->set(compact('users', 'hosts', 'eventTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id));
			$this->request->data = $this->Lecture->find('first', $options);
		}
		$users = $this->Lecture->User->find('list');
		$hosts = $this->Lecture->Host->find('list');
		$eventTypes = $this->Lecture->EventType->find('list');
		$this->set(compact('users', 'hosts', 'eventTypes'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Lecture->id = $id;
		if (!$this->Lecture->exists()) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lecture->delete()) {
			$this->Session->setFlash(__('The lecture has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The lecture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
