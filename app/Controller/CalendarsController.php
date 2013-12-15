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

    /**
     * index method
     *
     * @return void
     */
    public function index() {


        $this->set('headline', 'Wochenübersicht');
    }
}