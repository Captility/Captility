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


        $this->set('headline', __('Kalender'));

    }

    /**
     * index method
     *
     * @return void
     */
    public function dashboard() {


        $this->set('headline', __('Pinnwand – Wochenübersicht'));
        $this->set('leftTabs', true);
        $this->set('sidebar', true);
    }


    public function myLectures() {


        $this->set('headline', 'Meine Veranstaltungen');

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