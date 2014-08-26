<?php
App::uses('AppController', 'Controller');
/**
 * Devices Controller
 *
 * @property Device $Device
 * @property PaginatorComponent $Paginator
 */
class DevicesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();

        //$this->Auth->allow('cronTask');

        if (in_array($this->action, array('recorderStatusFeed', 'recorderFeed'))) {
            if ($this->Auth->user()) {
                $this->Auth->allow('recorderStatusFeed');
                $this->Auth->allow('recorderFeed');
            }
        }

    }

    /**
     * Retrieve Lecture Recorder Status for selected device.
     */
    public function recorderStatusFeed($device_id) {

        $this->layout = "ajax";

        $this->set("json", $this->Device->getRecorderStatus($device_id));

        $this->render('json');

    }

    public function recorderFeed() {


        $this->layout = "ajax";

        //Get Devices-List
        $this->set('devices', $this->Device->find('all', array('recursive' => -1)));

    }


    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Device->recursive = 0;
        $this->set('devices', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Invalid device'));
        }
        $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
        $this->set('device', $this->Device->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Device->create();
            if ($this->Device->save($this->request->data)) {
                $this->Session->setFlash(__('The Device has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'view', $this->Device->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The Device could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
        if (!$this->Device->exists($id)) {
            throw new NotFoundException(__('Invalid device'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Device->save($this->request->data)) {
                $this->Session->setFlash(__('The Device has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'view', $this->Device->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The Device could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Device.' . $this->Device->primaryKey => $id));
            $this->request->data = $this->Device->find('first', $options);
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
        $this->Device->id = $id;
        if (!$this->Device->exists()) {
            throw new NotFoundException(__('Invalid device'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Device->delete()) {
            $this->Session->setFlash(__('The Device has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The Device could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
