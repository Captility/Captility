<?php
App::uses('AppController', 'Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */
class EventsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {

        parent::beforeFilter();


        //Allow everything for debugging:
        $this->Auth->allow(); //Todo entfernen

    }

    function feed($id = null) {
        $this->layout = "ajax";
        $vars = $this->params['url'];
        $conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end']));
        $events = $this->Event->find('all', $conditions);
        foreach ($events as $event) {
            if ($event['Event']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            }
            else {
                $allday = false;
                $end = $event['Event']['end'];
            }
            $data[] = array(
                'id' => $event['Event']['event_id'],
                'title' => $event['Event']['title'],
                'start' => $event['Event']['start'],
                'end' => $end,
                'allDay' => $allday,
                //'url' => Router::url('/') . '/captures/view/'.$event['Capture']['capture_id'],
                'details' => $event['Event']['comment'],
                'className' => 'eventColor' . $event['EventType']['color'],
                'capture_id' => $event['Capture']['capture_id']
            );
        }
        $this->set("json", json_encode($data));
    }


    function feedMy($id = null) {
        $this->layout = "ajax";
        $vars = $this->params['url'];

        $userid = $this->Auth->user('user_id');
        $conditions = array('conditions' => array('UNIX_TIMESTAMP(start) >=' => $vars['start'], 'UNIX_TIMESTAMP(start) <=' => $vars['end'],
            'Capture.user_id' => $userid));
        $events = $this->Event->find('all', $conditions);
        foreach ($events as $event) {
            if ($event['Event']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            }
            else {
                $allday = false;
                $end = $event['Event']['end'];
            }
            $data[] = array(
                'id' => $event['Event']['event_id'],
                'title' => $event['Event']['title'],
                'start' => $event['Event']['start'],
                'end' => $end,
                'allDay' => $allday,
                //'url' => Router::url('/') . '/captures/view/'.$event['Capture']['capture_id'],
                'details' => $event['Event']['details'],
                'className' => 'eventColor' . $event['EventType']['color'],
                'capture_id' => $event['Capture']['capture_id']
            );
        }
        $this->set("json", json_encode($data));

        $this->render('/Events/feed');
    }

    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
    function update() {
        $vars = $this->params['url'];
        $this->Event->id = $vars['id'];
        $this->Event->saveField('start', $vars['start']);
        $this->Event->saveField('end', $vars['end']);
        $this->Event->saveField('all_day', $vars['allday']);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
