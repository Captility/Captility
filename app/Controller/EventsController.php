<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
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

        // A logged in user can't register or login. Others can!
        if (in_array($this->action, array('update', 'feed', 'feedMy'))) {
            if ($this->Auth->user()) {
                $this->Auth->allow('update');
                $this->Auth->allow('feed');
                $this->Auth->allow('feedMy');
            }
        }


    }

    function feed($id = null) {


        $this->layout = "ajax";
        $vars = $this->params['url'];

        //Containment Version
        /*$events = $this->Event->find('all', array(
                'conditions' => array(
                    'UNIX_TIMESTAMP(start) >=' => $vars['start'],
                    'UNIX_TIMESTAMP(start) <=' => $vars['end']),
                'recursive' => -1,
                'contain' => array(
                    'EventType' => array('event_type_id', 'color'),
                    'Capture' => array('capture_id', 'status',

                        'Lecture' => array('lecture_id', 'number', 'name', 'link',

                            'Host' => array('host_id', 'name', 'email', 'contact_email'),
                            'User' => array('user_id', 'username', 'email', 'avatar')

                        )
                    )
                )
            )
        );*/

        //LinkedVersion
        $events = $this->Event->find('all', array(
            'contain' => false,
            'link' => array(

                'EventType',
                'Capture' => array(
                    'fields' => array('Capture.capture_id', 'Capture.status', 'Capture.user_id'),
                    'conditions' => array('exactly' => 'Event.capture_id = Capture.capture_id'),

                    'Lecture' => array(
                        'fields' => array('Lecture.lecture_id', 'Lecture.number', 'name', 'Lecture.host_id', 'Lecture.link'),
                        'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),

                        'Host' => array(
                            'fields' => array('Host.host_id', 'Host.name', 'Host.email', 'Host.contact_email'),
                            'conditions' => array('exactly' => 'Lecture.host_id = Host.host_id')),

                        'User' => array(
                            'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                            'conditions' => array('exactly' => 'Capture.user_id = User.user_id'))

                    )
                )
            ),

            'conditions' => array(
                'UNIX_TIMESTAMP(Event.start) >=' => $vars['start'],
                'UNIX_TIMESTAMP(Event.end) <=' => $vars['end']),
        ));

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
            $events[$key]['id'] = $event['Event']['event_id'];
            $events[$key]['title'] = $event['Event']['title'];
            $events[$key]['start'] = $event['Event']['start'];
            $events[$key]['end'] = $end;
            $events[$key]['allDay'] = $allday;
            //'url' => Router::url('/') . '/captures/view/'.$event['Capture']['capture_id'],
            $events[$key]['className'] = 'eventColor' . $event['EventType']['color'];
            $events[$key]['capture_id'] = $event['Capture']['capture_id'];
            $events[$key]['datec'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%a,%d.%m.%y');
            $events[$key]['time'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%H:%M');
        }
        $this->set("json", json_encode($events));
    }


    function feedMy($id = null) {


        $this->layout = "ajax";
        $vars = $this->params['url'];
        $userid = $this->Auth->user('user_id');


        #################################### VERSION 1 NESTED ARRAY ##########################################
        /*SQL: (int) 66 => array('SELECT `Host`.`hos/*t_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 67 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 68 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 69 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 70 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 71 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 72 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0*/

        /*$this->Event->unbindModel(array(
            'belongsTo' => array('Capture')
        ));

        $this->Event->bindModel(array(
            'hasOne' => array(
                'Capture' => array(
                    'foreignKey' => false,
                    'conditions' => array('Capture.capture_id = Event.capture_id')
                ),
                'Lecture' => array(
                    'foreignKey' => false,
                    'conditions' => array('Lecture.lecture_id = Capture.lecture_id')
                ),
                'Host' => array(
                    'foreignKey' => false,
                    'conditions' => array('Host.host_id = Lecture.lecture_id')
                )
            )
        ));
        $events = $this->Event->find('all', array(
            'conditions' => array('Capture.user_id' => $userid),
            'contain' => array('Capture' => array('Lecture' => array('Host')))
        )); ##################################################################################################*/


        /*#################################### VERSION 2 FLAT ARRAY ############################################
        // 'SELECT `Capture`.*, `Event`.*, `Lecture`.* FROM `Captility`.`events` AS `Event` INNER JOIN `Captility`.`captures` AS `Capture` ON (`Capture`.`capture_id` = `Event`.`capture_id`) INNER JOIN `Captility`.`lectures` AS `Lecture` ON (`Lecture`.`lecture_id` = `Capture`.`lecture_id`)  WHERE `Capture`.`user_id` = 1',


        $this->Event->unbindModel(array(
            'belongsTo' => array('Capture')
        ));

        $events = $this->Event->find('all', array(
            'contain' => array(
                'Capture' => array(
                    'Lecture' => array()
                )
            ),
            'joins' => array(
                array(
                    'table' => 'captures',
                    'alias' => 'Capture',
                    'foreignKey' => false,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Capture.capture_id = Event.capture_id'
                    )),
                array(
                    'table' => 'lectures',
                    'alias' => 'Lecture',
                    'foreignKey' => false,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Lecture.lecture_id = Capture.lecture_id',
                    )
                )

            ),
            'conditions' => array('Capture.user_id' => $userid),
            'fields' => array('Capture.*', 'Event.*', 'Lecture.*'),
        )); ##################################################################################################*/


        #################################### VERSION 3 LINKED BEHAVIOR #################################################
        //SQL: SELECT `Event`.`event_id`, `Event`.`title`, `Event`.`comment`, `Event`.`start`, `Event`.`end`, `Event`.`all_day`, `Event`.`status`, `Event`.`link`, `Event`.`created`, `Event`.`modified`, `Event`.`event_type_id`, `Event`.`schedule_id`, `Event`.`capture_id`, `Capture`.`capture_id`, `Capture`.`status`, `Capture`.`user_id`, `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`link`, `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact_email`, `User`.`user_id`, `User`.`username`, `User`.`email`, `User`.`avatar` FROM `Captility`.`events` AS `Event` LEFT JOIN `Captility`.`captures` AS `Capture` ON (`Capture`.`capture_id` = `Event`.`capture_id`) LEFT JOIN `Captility`.`lectures` AS `Lecture` ON (`Lecture`.`lecture_id` = `Capture`.`lecture_id`) LEFT JOIN `Captility`.`host` AS `Host` ON (`Host`.`host_id` = `Lecture`.`host_id`) LEFT JOIN `Captility`.`users` AS `User` ON (`User`.`user_id` = `Lecture`.`user_id`) LEFT JOIN `Captility`.`event_types` AS `EventType` ON (`Event`.`event_type_id` = `EventType`.`event_type_id`)  WHERE UNIX_TIMESTAMP(`Event`.`start`) >= '1389567600' AND UNIX_TIMESTAMP(`Event`.`end`) <= '1389999600' AND `Capture`.`user_id` = 1',

        $events = $this->Event->find('all', array(
            'contain' => false,
            'link' => array(

                'EventType',
                'Capture' => array(
                    'fields' => array('Capture.capture_id', 'Capture.status', 'Capture.user_id'),
                    'conditions' => array('exactly' => 'Event.capture_id = Capture.capture_id'),

                    'Lecture' => array(
                        'fields' => array('Lecture.lecture_id', 'Lecture.number', 'name', 'Lecture.host_id', 'Lecture.link'),
                        'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),

                        'Host' => array(
                            'fields' => array('Host.host_id', 'Host.name', 'Host.email', 'Host.contact_email'),
                            'conditions' => array('exactly' => 'Lecture.host_id = Host.host_id')),

                        'User' => array(
                            'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                            'conditions' => array('exactly' => 'Capture.user_id = User.user_id'))

                    )
                )
            ),

            'conditions' => array(
                'UNIX_TIMESTAMP(Event.start) >=' => $vars['start'],
                'UNIX_TIMESTAMP(Event.end) <=' => $vars['end'],
                'Capture.user_id' => $userid),
        ));

        ##################################################################################################*/


        //$log = $this->Event->getDataSource()->getLog(false, false);
        //debug($log);


        //pr($events);

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
            $events[$key]['end'] = $end;
            $events[$key]['allDay'] = $allday;
            //'url' => Router::url('/') . '/captures/view/'.$event['Capture']['capture_id'],
            $events[$key]['className'] = 'eventColor' . $event['EventType']['color'];
            $events[$key]['capture_id'] = $event['Capture']['capture_id'];
            $events[$key]['datec'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%a,%d.%m.%y');
            $events[$key]['time'] = CakeTime::nice(strtotime($event['Event']['start']), 'CET', '%H:%M');

        }
        $this->set("json", json_encode($events));

        $this->render('feed');
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
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
                $this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
            $this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
