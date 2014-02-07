<?php
App::uses('AppController', 'Controller');
/**
 * Tickets Controller
 *
 * @property Ticket $Ticket
 * @property PaginatorComponent $Paginator
 */
class TicketsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');


    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Ticket->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 12
        );
        $this->set('tickets', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id), 'recursive' => 2);
        $this->set('ticket', $this->Ticket->find('first', $options));
    }


    /**
     * mark Ticket as Done
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function update($id = null, $status) {


        $this->layout = "ajax";
        $vars = $this->params['url'];

        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid ticket'));
        }

        $this->set("json", json_encode('Before'));

        //if ($this->request->is(array('post', 'put'))) {

        $this->Ticket->id = $id;

        if ($this->Ticket->update($status)) {

            //$this->Session->setFlash(__('The ticket has been updated.'), 'default', array('class' => 'alert alert-success'));

            $this->set("json", json_encode('The ticket has been updated.'));


        }
        else {

            //$this->Session->setFlash(__('The ticket could not be updated. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

            $this->set("json", json_encode('The ticket could not be updated. Please, try again.'));

            throw new InternalErrorException(__('The ticket could not be updated. Please, try again.'));

            //return $this->redirect(array('action' => 'index'));
        }
        //}

        $this->render('json');
    }


    public function feed($my = null, $sideTicket = false) {

        $this->layout = "ajax";

        // MY TICKETS
        $user_id = (isset($my) && ($my == 'true')) ? $this->Auth->user('user_id') : null;
        $sideTicket = ($sideTicket == 'true');

        $week_start = $this->Ticket->getWeekStart();
        $week_end = $this->Ticket->getNextWeekStart();

        // GET due Tickets this week, that aren't done or canceled or have failed.
        $tickets = $this->Ticket->getPendingTickets($week_start, $week_end, $user_id);

        $this->set('tickets', $tickets);
        $this->set('sideTicket', $sideTicket); // true/false

    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {


        if ($this->request->is('post')) {
            $this->Ticket->create();
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $users = $this->Ticket->User->find('list');
        $tasks = $this->Ticket->Task->find('list');
        $events = $this->Ticket->Event->find('list');
        $this->set(compact('users', 'tasks', 'events'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
            $this->request->data = $this->Ticket->find('first', $options);
        }
        $users = $this->Ticket->User->find('list');
        $tasks = $this->Ticket->Task->find('list');
        $events = $this->Ticket->Event->find('list');
        $this->set(compact('users', 'tasks', 'events'));


    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Ticket->id = $id;
        if (!$this->Ticket->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Ticket->delete()) {
            $this->Session->setFlash(__('The ticket has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The ticket could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Ticket->recursive = 0;
        $this->set('tickets', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
        $this->set('ticket', $this->Ticket->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Ticket->create();
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $users = $this->Ticket->User->find('list');
        $tasks = $this->Ticket->Task->find('list');
        $events = $this->Ticket->Event->find('list');
        $this->set(compact('users', 'tasks', 'events'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Ticket->exists($id)) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Ticket->save($this->request->data)) {
                $this->Session->setFlash(__('The ticket has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The ticket could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Ticket.' . $this->Ticket->primaryKey => $id));
            $this->request->data = $this->Ticket->find('first', $options);
        }
        $users = $this->Ticket->User->find('list');
        $tasks = $this->Ticket->Task->find('list');
        $events = $this->Ticket->Event->find('list');
        $this->set(compact('users', 'tasks', 'events'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Ticket->id = $id;
        if (!$this->Ticket->exists()) {
            throw new NotFoundException(__('Invalid ticket'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Ticket->delete()) {
            $this->Session->setFlash(__('The ticket has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The ticket could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
