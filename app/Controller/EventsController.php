<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Events Controller
 * @author Daniel, Captiliity
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

        // A logged in user can't register or login. Others can!
        if (in_array($this->action, array('update', 'feed', 'feedMy', 'statusFeed'))) {
            if ($this->Auth->user()) {
                $this->Auth->allow('update');
                $this->Auth->allow('feed');
                $this->Auth->allow('feedMy');
                $this->Auth->allow('statusFeed');
            }
        }
    }


    public function statusFeed() {


        $this->layout = "ajax";

        // WEEK FOR OVERVIEW

        // Get german Week defaults
        $week_start = $this->Event->getWeekStart();
        $week_end = $this->Event->getNextWeekStart();

        //Get OnlineStatus of this week
        $events = $this->Event->getEventStatusList($week_start, $week_end);

        $week_end = date('Y-m-d', strtotime('+' . (7 - date('w')) . ' days'));
        $this->set(array('events' => $events, 'week_start' => $week_start, 'week_end' => $week_end));
    }


    public function feed($my = null) {


        $this->layout = "ajax";
        $vars = $this->params['url'];
        $user_id = (isset($my)) ? $this->Auth->user('user_id') : null;

        $events = $this->Event->getCalendarEvents($vars['start'], $vars['end'], $user_id);

        foreach ($events as $key => $event) {
            if ($event['Event']['all_day'] == 1) {
                $allday = true;
                $end = $event['Event']['start'];
            }

            else {
                $allday = false;
                $end = $event['Event']['end'];
            }
            $events[$key]['id'] = $event['Event']['event_id'];
            $events[$key]['title'] = $event['Event']['title'];
            $events[$key]['start'] = $event['Event']['start'];
            $events[$key]['status'] = __($event['Event']['status']);
            $classes = Configure::read('EVENT.STATUSES');

            $events[$key]['status_class'] = array_key_exists($event['Event']['status'], $classes) ? $classes[$event['Event']['status']] : 'default';
            $events[$key]['end'] = $end;
            $events[$key]['allDay'] = $allday;
            //'url' => Router::url('/') . '/captures/view/'.$event['Capture']['capture_id'],
            $events[$key]['className'] = 'eventColor' . $event['EventType']['color'];
            $events[$key]['capture_id'] = $event['Capture']['capture_id'];
            $events[$key]['datec'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%a, %d.%m.%y');
            $events[$key]['time'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%H:%M');
            $events[$key]['location'] = $event['Event']['location'];
        }

        $this->set("json", json_encode($events));
    }


    public function update() {
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
        $this->Event->recursive = 1;

        $this->Paginator->settings = array(
            'limit' => 12,
            /*'contain' => false,
            'link' => array(

                'Ticket' => array(

                    'User' => array(
                        'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                        'conditions' => array('exactly' => 'Ticket.user_id = User.user_id')),
                ),
            ),*/

        );
        $this->set('events', $this->Paginator->paginate());

    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public
    function view($id = null) {

        $this->Event->recursive = 2;

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
    public
    function add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'view', $this->Event->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }

        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');

        $eventTypes = $this->Event->EventType->find('list', array(
            'fields' => array('EventType.event_type_id', 'EventType.name', 'EventType.color')));
        $devices = $this->Event->Device->find('list', array(
            'fields' => array('Device.device_id', 'Device.name', 'Device.location')));

        $this->set(compact('eventTypes', 'schedules', 'captures', 'devices'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public
    function edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'view', $this->Event->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }

        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $eventTypes = $this->Event->EventType->find('list', array(
            'fields' => array('EventType.event_type_id', 'EventType.name', 'EventType.color')));
        $devices = $this->Event->Device->find('list', array(
            'fields' => array('Device.device_id', 'Device.name', 'Device.location')));
        $this->set(compact('eventTypes', 'schedules', 'captures', 'devices'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public
    function delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete($this->Event->id, true)) { //Delete Cascaded
            $this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public
    function admin_index() {
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
    public
    function admin_view($id = null) {
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
    public
    function admin_add() {
        if ($this->request->is('post')) {
            $this->Event->create();
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));


                return $this->redirect(array('action' => 'view', $this->Event->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $devices = $this->Event->Device->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures', 'devices'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public
    function admin_edit($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Invalid event'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Event->save($this->request->data)) {
                $this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

                return $this->redirect(array('action' => 'view', $this->Event->id));
                //return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
            $this->request->data = $this->Event->find('first', $options);
        }
        $eventTypes = $this->Event->EventType->find('list');
        $schedules = $this->Event->Schedule->find('list');
        $captures = $this->Event->Capture->find('list');
        $devices = $this->Event->Device->find('list');
        $this->set(compact('eventTypes', 'schedules', 'captures', 'devices'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public
    function admin_delete($id = null) {
        $this->Event->id = $id;
        if (!$this->Event->exists()) {
            throw new NotFoundException(__('Invalid event'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Event->delete()) {
            $this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
