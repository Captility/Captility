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

    var $uses = array('Lecture');

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
}