<?php
App::uses('AppController', 'Controller');
/**
 * Workflows Controller
 *
 * @property Workflow $Workflow
 * @property PaginatorComponent $Paginator
 */
class WorkflowsController extends AppController {

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
		$this->Workflow->recursive = 0;
		$this->set('workflows', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Workflow->exists($id)) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		$options = array('conditions' => array('Workflow.' . $this->Workflow->primaryKey => $id));
		$this->set('workflow', $this->Workflow->find('first', $options));
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
				$this->Session->setFlash(__('The workflow has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$lectures = $this->Workflow->Lecture->find('list');
		$tasks = $this->Workflow->Task->find('list');
		$this->set(compact('lectures', 'tasks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Workflow->exists($id)) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workflow->save($this->request->data)) {
				$this->Session->setFlash(__('The workflow has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflow could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Workflow.' . $this->Workflow->primaryKey => $id));
			$this->request->data = $this->Workflow->find('first', $options);
		}
		$lectures = $this->Workflow->Lecture->find('list');
		$tasks = $this->Workflow->Task->find('list');
		$this->set(compact('lectures', 'tasks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Workflow->id = $id;
		if (!$this->Workflow->exists()) {
			throw new NotFoundException(__('Invalid workflow'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Workflow->delete()) {
			$this->Session->setFlash(__('The workflow has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The workflow could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
