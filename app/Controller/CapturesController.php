<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 *
 * @property Capture $Capture
 * @property PaginatorComponent $Paginator
 */
class CapturesController extends AppController {

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
		$this->Capture->recursive = 0;
		$this->set('captures', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Capture->exists($id)) {
			throw new NotFoundException(__('Invalid capture'));
		}
		$options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
		$this->set('capture', $this->Capture->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Capture->create();
			if ($this->Capture->save($this->request->data)) {
				$this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$lectures = $this->Capture->Lecture->find('list');
		$users = $this->Capture->User->find('list');
		$events = $this->Capture->Event->find('list');
		$this->set(compact('lectures', 'users', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Capture->exists($id)) {
			throw new NotFoundException(__('Invalid capture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Capture->save($this->request->data)) {
				$this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
			$this->request->data = $this->Capture->find('first', $options);
		}
		$lectures = $this->Capture->Lecture->find('list');
		$users = $this->Capture->User->find('list');
		$events = $this->Capture->Event->find('list');
		$this->set(compact('lectures', 'users', 'events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Capture->id = $id;
		if (!$this->Capture->exists()) {
			throw new NotFoundException(__('Invalid capture'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Capture->delete()) {
			$this->Session->setFlash(__('The capture has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The capture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
