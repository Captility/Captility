<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 *
 * @property Capture $Capture
 * @property PaginatorComponent $Paginator
 */
class CalendarsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    //public $useTable = false;

    var $uses = array('Lecture', 'Event', 'Ticket');

    public function beforeFilter() {
        parent::beforeFilter();


        if (in_array($this->action, array('dashboard', 'myLectures'))) {
            if ($this->Auth->user()) {
                $this->Auth->allow('dashboard');
                $this->Auth->allow('myLectures');
            }
        }

    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {


        $this->set('sideCalendar', false);
        $this->set('sideTickets', false);

    }

    /**
     * index method
     *
     * @return void
     */
    public function dashboard() {

        $this->set('leftTabs', true);
        $this->set('sideCalendar', true);
        $this->set('sideTickets', true);


        // Get german Week defaults
        $week_start = date('Y-m-d', strtotime('-' . date('w') + 1 . ' days'));
        $week_end = date('Y-m-d', strtotime('+' . (8 - date('w')) . ' days'));


        //Get Data
        $data = $this->Ticket->find('all', array(

            'link' => array(

                'Event' => array(
                    'conditions' => array('exactly' => 'Event.event_id = Ticket.event_id'),

                    'Capture' => array(
                        'fields' => array('Capture.capture_id', 'Capture.user_id'),
                        'conditions' => array('exactly' => 'Capture.capture_id = Event.capture_id'),

                        'Lecture' => array(
                            'fields' => array('Lecture.lecture_id', 'Lecture.number', 'Lecture.name', 'Lecture.host_id'),
                            'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),

                            'Host' => array(
                                'fields' => array('Host.host_id', 'Host.name'),
                                'conditions' => array('exactly' => 'Lecture.host_id = Host.host_id'),
                            ),
                        ),
                    ),
                ),

                'Task' => array(
                    'conditions' => array('exactly' => 'Task.task_id = Ticket.task_id'),
                ),

                'User' => array(
                    'fields' => array('User.user_id', 'User.username'),
                    'conditions' => array('exactly' => 'User.user_id = Ticket.user_id')
                ),

            ),

            'conditions' => array(

                'AND' => array(

                    //TODO: 'Ticket.user_id' => $this->Auth->user('user_id'),
                    //TODO: 'Event.start >=' => $week_start,
                    //TODO: 'Event.end <=' => $week_end,
                    'Ticket.status !=' => array('Done', 'Error', 'Canceled')
                )
            ),

            'limit' => '5',

            'order' => array('Ticket.modified DESC', 'Ticket.created'),
        ));


        //debug($data);
        $this->set('data', $data);


        //Get OnlineStatus
        $events = $this->Event->find('all', array(

            'link' => array(

                'EventType',
                /*'Ticket' => array(
                    'conditions' => array('exactly' => 'Event.event_id = Ticket.event_id')),*/

                'Capture' => array(
                    'fields' => array('Capture.capture_id', 'Capture.status', 'Capture.user_id'),
                    'conditions' => array('exactly' => 'Capture.capture_id = Event.capture_id'),

                    'Lecture' => array(
                        'fields' => array('Lecture.lecture_id', 'Lecture.number', 'name', 'Lecture.host_id', 'Lecture.link'),
                        'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),
                    ),

                    'User' => array(
                        'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                        'conditions' => array('exactly' => 'User.user_id = Capture.user_id')
                    ),
                ),
            ),

            'conditions' => array(

                'AND' => array(

                    'Event.start >=' => $week_start,
                    'Event.end <=' => $week_end,
                )
            ),

            //'limit' => '30', //TODO ENTFERNEN

            'order' => array('Event.start'),
        ));


        //debug($data);
        $week_end = date('Y-m-d', strtotime('+' . (7 - date('w')) . ' days'));
        $this->set(array('events' => $events, 'week_start' => $week_start, 'week_end' => $week_end));
    }


    public function myLectures() {


        $this->set('headline', __('My Lectures'));

        $userid = $this->Auth->user('user_id');
        //$this->set('lectures', $this->Lecture->find('all', array('conditions' => array('Lecture.user_id' => $userid))));


        $this->Paginator->settings = array(
            'limit' => 25,
            'order' => array(
                'Lecture.lecture_id' => 'asc'
            ),
            'conditions' => array('Lecture.user_id' => $userid)
        );
        $data = $this->Paginator->paginate('Lecture');

        $this->set('lectures', $data);

    }

    public function updateAll() {


    }
}