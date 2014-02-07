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

        $this->Auth->allow('updateEvents');

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
        $week_start = $this->Event->getWeekStart();
        $week_end = $this->Event->getNextWeekStart();

        // TICKETS NOW AJAX'ED

        // GET due Tickets this week, that aren't done or canceled or have failed.
        /*$data = $this->Ticket->getPendingTickets($week_start, $week_end);

        $this->set('data', $data);*/


        // MY TICKETS NOW AJAX'ED

        // GET due Tickets this week, that aren't done or canceled or have failed.
        /*$tickets = $this->Ticket->getPendingTickets($week_start, $week_end, $this->Auth->user('user_id'));

        $this->set('tickets', $tickets);*/


        // ONLINE / STATUS NOW AJAX'ED

        //Get OnlineStatus of this week
        /*$events = $this->Event->getEventStatusList($week_start, $week_end);*/

        $week_end = date('Y-m-d', strtotime('+' . (7 - date('w')) . ' days'));
        $this->set(array(/*'events' => $events,*/ 'week_start' => $week_start, 'week_end' => $week_end));
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


    public function cronTask($salt = 0) {

        throw new NotFoundException();
    }

    /**
     * CRON TASK for generating new Tasks for this day. Can be called as often as wanted.
     * @param int $salt
     */
    public function updateEvents($salt = 0) {

        // Encrypt key
        $cron_key = Security::hash($salt, 'sha1', true);

        // Check if the cron key is correct
        if ($cron_key == Configure::read('CAPTILITY.CRON_KEY')) {

            $this->layout = "ajax";

            $today_start = date('Y-m-d') . ' 00:00:00';
            $today_now = date('Y-m-d H:i:s');

            $events = $this->Event->find('all', array(

                    'fields' => array('Event.event_id', 'Event.title', 'Event.status',
                        "(SELECT COUNT(event_id) FROM tickets AS Ticket WHERE Ticket.event_id = Event.event_id) AS ticketCount"),

                    'conditions' => array(

                        'AND' => array(

                            'Event.start >=' => $today_start,
                            'Event.start <=' => $today_now,
                            'Event.status !=' => array('Canceled', 'Failed', 'Online'),

                        )
                    )
                )
            );

            $count = 0;
            $jsonResponse = null;

            foreach ($events as $i => $event) {

                if ($event['Event']['ticketCount'] == 0) {

                    $jsonResponse[$count] = $event;

                    $this->Event->id = $event['Event']['event_id'];
                    $this->Event->generateNext();
                    $count++;
                }
            }

            if(!empty($jsonResponse)){

                $jsonResponse = date('Y-m-d H:i:s').' | '.json_encode($jsonResponse);
            }

            $this->set("json", $jsonResponse);

            $this->render('json');

        }
        else {

            throw new NotFoundException();
        }


    }
}