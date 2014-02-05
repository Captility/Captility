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


        // WEEK FOR OVERVIEW

        // Get german Week defaults
        $week_start = $this->Ticket->getWeekStart();
        $week_end = $this->Ticket->getNextWeekStart();

        // TICKETS

        // GET due Tickets this week, that aren't done or canceled or have failed.
        $data = $this->Ticket->getPendingTickets($week_start, $week_end);

        $this->set('data', $data);
        //debug($data);


        // MY TICKETS

        // GET due Tickets this week, that aren't done or canceled or have failed.
        $tickets = $this->Ticket->getPendingTickets($week_start, $week_end, $this->Auth->user('user_id'));

        $this->set('tickets', $tickets);
        //debug($data);


        // ONLINE / STATUS

        //Get OnlineStatus of this week
        $events = $this->Event->getEventStatusList($week_start, $week_end);
        //debug($events);

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

    public function updateEvents($salt = 0) {


    }
}