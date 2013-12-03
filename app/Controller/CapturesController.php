<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 *
 * @property Capture $Capture
 */
class CapturesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Capture->recursive = 0;
		$this->set('captures', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Capture->id = $id;
		if (!$this->Capture->exists()) {
			throw new NotFoundException(__('Invalid capture'));
		}
		$this->set('capture', $this->Capture->read(null, $id));
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
				$this->Session->setFlash(__('The capture has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capture could not be saved. Please, try again.'));
			}
		}
        $users = $this->Capture->User->find('list');
        $events = $this->Capture->Event->find('list');
        $tasks = $this->Capture->Task->find('list');
        $this->set(compact('users', 'events', 'tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Capture->id = $id;
		if (!$this->Capture->exists()) {
			throw new NotFoundException(__('Invalid capture'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Capture->save($this->request->data)) {
				$this->Session->setFlash(__('The capture has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The capture could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Capture->read(null, $id);
		}
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
		$this->Capture->id = $id;
		if (!$this->Capture->exists()) {
			throw new NotFoundException(__('Invalid capture'));
		}
		if ($this->Capture->delete()) {
			$this->Session->setFlash(__('Capture deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Capture was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
