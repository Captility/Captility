<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 * @author Daniel, Captiliity
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

    var $uses = array('Lecture', 'Event', 'Ticket', 'Device');

    public function beforeFilter() {
        parent::beforeFilter();

        //$this->Auth->allow('cronTask');

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
        /*$data = $this->Ticket->getPendingTicketsByWeek($week_start, $week_end);

        $this->set('data', $data);*/


        // MY TICKETS NOW AJAX'ED

        // GET due Tickets this week, that aren't done or canceled or have failed.
        /*$tickets = $this->Ticket->getPendingTicketsByWeek($week_start, $week_end, $this->Auth->user('user_id'));

        $this->set('tickets', $tickets);*/


        // ONLINE / STATUS NOW AJAX'ED

        //Get OnlineStatus of this week
        /*$events = $this->Event->getEventStatusList($week_start, $week_end);*/

        $week_end = date('Y-m-d', strtotime('+' . (7 - date('w')) . ' days'));
        $this->set(array( /*'events' => $events,*/
            'week_start' => $week_start, 'week_end' => $week_end));
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


    /**
     * CronTask function to manage scheduled Events in Captility, called by cronjob or manual cronjob injection.
     *
     * @deprecated CaptilityShell should preferably be used instead per cake commandline to ensure security.
     *
     * CronTab should look like:
     *
     *  # Captility Event Execution
     *  * /5 * * * * /path/to/captility/cron_localhost >> /path/to/captility/cron_localhost.log
     *  # > /dev/null 2>&1 # alternate null output
     *
     *
     * CronScript 'cron_localhost' should look like:
     *
     *   #!/usr/bin/php
     *  <?php
     *  $content = file_get_contents('http://localhost/captility/calendars/cronTask/6Q7dc2R7119XsS46U6f9cs7Saf8e70cD045e16Qh3e4f');
     *
     *  if(!empty($content)) {
     *
     *   $content += PHP_EOL;
     *  }
     *
     *  echo $content;
     *  ?>
     *
     * @param int $hash ValidationHash to ensure security.
     * @throws NotFoundException Returns error with invalid hash.
     */
    public function cronTask($hash = 0) {

        // Encrypt key
        $cron_key = Security::hash($hash, 'sha1', true);

        // Check if the cron key is correct
        if ($cron_key == Configure::read('CAPTILITY.CRON_KEY')) {

            $this->layout = "ajax";


            //TODO Add Device CronTask!

            // #########################################################################################################
            // ################################ CRONJOB TASK INJECTIONS ################################################
            // #########################################################################################################

            // ################################ TICKETS::Update Urgency Statuses  ######################################
            $this->Ticket->updateUrgencyStatuses();

            // ################################ EVENTS:: Generate new Tickets from WF  ##################################
            $jsonResponse = $this->Event->updateTicketsFromWorkflow();

            // #########################################################################################################


            // Send response as JSON for log if soemthing was done:
            if (!empty($jsonResponse)) {

                $jsonResponse = date('Y-m-d H:i:s') . ' | ' . json_encode($jsonResponse);
            }

            $this->set("json", $jsonResponse);

            $this->render('json');

        }
        else {

            throw new NotFoundException();
        }

    }

    public function production() {

    }

    public function catalog() {

    }


    public function stats() {

        $this->set('leftTabs', true);
        $this->set('sideCalendar', true);
        $this->set('sideTickets', true);


        // ###### TICKETS ########################################################################################## -->
        $statsTicketsData = $this->Ticket->getIntervalStats(
            $this->Ticket->getWeekStart(),
            $this->Ticket->getNextWeekStart()
        ); // interation strtotime

        $this->set('statsTicketsData', $statsTicketsData);


        // ###### WEEK ############################################################################################# -->
        $statsWeekData = $this->Event->getIntervalStats(
            $this->Event->getWeekStart(), //start of interval //date('Y-m-d 00:00:00', strtotime('Monday this week'))
            $this->Event->getNextWeekStart(), //start of interval
            'l', // scale date-format
            'day'); // interation strtotime

        $this->set('statsWeekData', $statsWeekData);
        $this->set('statsWeekScale', json_encode($statsWeekData['scale'][0]));


        // ###### MONTH ############################################################################################# -->
        $firstDayofNextMonth = date('Y-m-01 00:00:00', strtotime('next month')); // First Instant of next Month
        $lastKWDay = date('Y-m-d 00:00:00', strtotime('first monday', strtotime($firstDayofNextMonth))); // First instance of next month's 'alone' KW

        $statsMonthData = $this->Event->getIntervalStats(
            date('Y-m-01 00:00:00'), //start of interval
            $lastKWDay, //start of interval
            '\K\W W', // scale date-format
            'week'); // interation strtotime

        $this->set('statsMonthData', $statsMonthData);
        $this->set('statsMonthScale', json_encode($statsMonthData['scale'][0]));


        // ###### YEAR ############################################################################################# -->
        $statsYearData = $this->Event->getIntervalStats(
            date('Y-01-01 00:00:00'), //start of interval
            date('Y-01-01 00:00:00', strtotime('+1 year')), //end of interval
            'M', // scale date-format
            'month'); // interation strtotime

        $this->set('statsYearStart', $statsYearData);
        $this->set('statsYearEnd', json_encode($statsYearData['scale'][0]));
        $this->set('statsYearData', $statsYearData);
        $this->set('statsYearScale', json_encode($statsYearData['scale'][0]));


        // ###### Ever ############################################################################################# -->
        $firstEntryDate = $this->Event->find('first', array(
            'fields' => array('Event.start'),
            'order' => array('Event.start' => 'ASC')
        ));

        if (!empty($firstEntryDate)) {
            $statsEverData = $this->Event->getIntervalStats(
                date('Y-01-01 00:00:00', strtotime($firstEntryDate['Event']['start'])), //start of interval
                date('Y-01-01 00:00:00', strtotime('+1 year')), //end of interval
                'Y', // scale date-format
                'year'); // interation strtotime


            $this->set('statsEverData', $statsEverData);
            $this->set('statsEverScale', json_encode($statsEverData['scale'][0]));
        }

    }
}