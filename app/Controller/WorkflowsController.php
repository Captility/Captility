<?php
App::uses('AppController', 'Controller');
/**
 * Workflows Controller
 *
 * @property Workflow $Workflow
 */
class WorkflowsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Workflow->recursive = 0;
		$this->set('workflows', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Workflow->id = $id;
		if (!$this->Workflow->exists()) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		$this->set('workflow', $this->Workflow->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Workflow->create();
			if ($this->Workflow->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow could not be saved. Please, try again.'));
			}
		}
		$tasks = $this->Workflow->Task->find('list');
		$this->set(compact('tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Workflow->id = $id;
		if (!$this->Workflow->exists()) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Workflow->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Workflow->read(null, $id);
		}
		$tasks = $this->Workflow->Task->find('list');
		$this->set(compact('tasks'));
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
		$this->Workflow->id = $id;
		if (!$this->Workflow->exists()) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		if ($this->Workflow->delete()) {
			$this->Session->setFlash(__('Workflow deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Workflow was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
