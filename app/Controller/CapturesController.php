<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
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
        $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id), 'recursive' => 2);
        $this->set('capture', $this->Capture->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {


        if ($this->request->is('post')) {

            pr($this->request->data);

            // EVENT
            $this->request->data['Event']['event_type_id'] = 1;
            $this->request->data['Event']['title'] = $this->request->data['Capture']['name'];
            $this->request->data['Event']['details'] = $this->request->data['Capture']['comment'];

            // Endtime
            $date = $this->request->data['Event']['start'];
            $endDateTime = new DateTime(
                $date['year'] . '-' . $date['month'] . '-' . $date['day'] . ' ' .
                    $date['hour'] . ':' . $date['min'] . ':' . '00');

            $endDateTime->modify('+2 hours');

            $endDate = $endDateTime->format('Y-m-d H:i:s');

            $this->request->data['Event']['end'] = $endDate;


            //$this->request->data['Event']['end']['hour'] = 2 + $this->request->data['Capture']['date']['hour'];
            $this->request->data['Event']['all_day'] = 0;
            $this->request->data['Event']['status'] = $this->request->data['Capture']['status'];


            // Create and Save Event for Capture
            if ($this->Capture->save($this->request->data)) {


                $this->Session->setFlash(__('The Capture has been saved.'), 'default', array('class' => 'alert alert-success'));

                // Capture hasOne Event
                $this->request->data['Event']['capture_id'] = $this->Capture->id;


                if ($this->Capture->Event->save($this->request->data)) {

                    $this->Session->setFlash(__('The Event has been saved.'), 'default', array('class' => 'alert alert-success'));

                }
                else {

                    $this->Session->setFlash(__('The Event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                }

                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The Capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));

            }
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $events = $this->Capture->Event->find('list');
        $schedules = $this->Capture->Schedule->find('list');
        $eventTypes = $this->Capture->Event->EventType->find('list', array(
            'fields' => array('EventType.event_type_id', 'EventType.name', 'EventType.color')));

        $this->set(compact('lectures', 'users', 'workflows', 'schedules', 'events', 'eventTypes'));
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
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        else {
            $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
            $this->request->data = $this->Capture->find('first', $options);
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $events = $this->Capture->Event->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $this->set(compact('lectures', 'users', 'events', 'workflows'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        // Set active Capture record
        $this->Capture->id = $id;

        // Set active Event record
        $event = $this->Capture->findByCaptureId($id);
        $this->Capture->Event->id = $event['Event']['event_id'];

        if (!$this->Capture->exists()) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $this->request->onlyAllow('post', 'delete');

        // Delete Capture
        if ($this->Capture->delete()) {
            $this->Session->setFlash(__('The capture has been deleted.'), 'default', array('class' => 'alert alert-success'));

            // Delete associated Event
            if ($this->Capture->Event->delete()) {
                $this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
            }
            else {
                $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        else {
            $this->Session->setFlash(__('The capture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Capture->recursive = 0;
        $this->set('captures', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
        $this->set('capture', $this->Capture->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Capture->create();
            if ($this->Capture->save($this->request->data)) {
                $this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $this->set(compact('lectures', 'users', 'workflows'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Capture->save($this->request->data)) {
                $this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        else {
            $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
            $this->request->data = $this->Capture->find('first', $options);
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $this->set(compact('lectures', 'users', 'workflows'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Capture->id = $id;
        if (!$this->Capture->exists()) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Capture->delete()) {
            $this->Session->setFlash(__('The capture has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The capture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
