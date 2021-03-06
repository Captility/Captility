<?php
App::uses('AppController', 'Controller');
/**
 * Hosts Controller
 *
 * @author Daniel, Captiliity
 * @property Host $Host
 * @property PaginatorComponent $Paginator
 */
class HostsController extends AppController {

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
        $this->Host->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 12
        );
        $this->set('hosts', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        $this->set('sideCalendar', false);

        if (!$this->Host->exists($id)) {
            throw new NotFoundException(__('Invalid host'));
        }
        $options = array('conditions' => array('Host.' . $this->Host->primaryKey => $id), 'recursive' => 2);
        $this->set('host', $this->Host->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {

        if ($this->request->is('post')) {
            $this->Host->create();
            if ($this->Host->save($this->request->data)) {
                $this->Session->setFlash(__('The host has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The host could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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

        if (!$this->Host->exists($id)) {
            throw new NotFoundException(__('Invalid host'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Host->save($this->request->data)) {
                $this->Session->setFlash(__('The host has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The host could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Host.' . $this->Host->primaryKey => $id));
            $this->request->data = $this->Host->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Host->id = $id;
        if (!$this->Host->exists()) {
            throw new NotFoundException(__('Invalid host'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Host->delete()) {
            $this->Session->setFlash(__('The host has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The host could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
