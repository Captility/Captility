<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 *
 * @property Capture $Capture
 * @property PaginatorComponent $Paginator
 */
class CapturesController extends AppController {

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
        $this->Capture->recursive = 0;

        $this->Paginator->settings = array(
            'limit' => 12
        );
        $this->set('captures', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id), 'recursive' => 2);
        $this->set('capture', $this->Capture->find('first', $options));
    }

    /**
     * Adding a new Capture to the System. Creates multiple schedules as well, that process their own Events.
     * @return void
     */
    public function add() {


        if ($this->request->is('post')) {


            //debug($this->request->data);

            // Markup Container
            $Schedules = $this->request->data['Schedule'];
            $this->Capture->Schedule->validates($this->request->data['Schedule']);

            // Extra Check valid data
            $validData = true;
            foreach ($Schedules as $i => $Schedule) {

                // SCHEDULE VALIDATION
                if (empty($Schedule['interval_start']) || empty($Schedule['duration'])) {

                    $this->Session->setFlash(__('A Schedule is missing information.') .
                        '\n' . __('The Capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                    $validData = false;
                    break;
                }
                else {

                    /*//CONVERT DATA
                    $Schedules[$i]['interval_start'] = CakeTime::format('Y-m-d', substr($Schedule['interval_start'], 4));

                    if (!empty($Schedule['interval_end'])) {
                        $Schedules[$i]['interval_end'] = CakeTime::format('Y-m-d', substr($Schedule['interval_end'], 4));
                    }*/

                    //SCHEDULE[Event] Data
                    $Schedules[$i]['Event']['event_type_id'] = $this->request->data['Event']['event_type_id'];
                    $Schedules[$i]['Event']['link'] = $this->request->data['Event']['link'];

                    $Schedules[$i]['Capture']['name'] = $this->request->data['Capture']['name'];
                    $Schedules[$i]['Capture']['status'] = $this->request->data['Capture']['status'];
                    $Schedules[$i]['Capture']['comment'] = $this->request->data['Capture']['comment'];
                }
            }

            //debug($Schedules);


            // ########################### SAVE NEW DATA ###############################################################

            // Create and Save Event for Capture
            $this->Capture->create();
            if ($validData && $this->Capture->save($this->request->data['Capture'] /*, array('validate' => 'only')*/)) {


                $this->Session->setFlash(__('The Capture has been saved.'), 'default', array('class' => 'alert alert-success'));


                // Capture hasMany Schedules
                foreach ($Schedules as $i => $Schedule) {

                    $Schedules[$i]['capture_id'] = $this->Capture->id;
                }


                if ($this->Capture->Schedule->saveAll($Schedules)) {

                    debug('SCHEDULE SAVED');
                    //$this->Capture->Schedule->delete();

                    return $this->redirect(array('action' => 'index'));
                }
                else {

                    $this->Session->setFlash(__('The schedule could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

                    //debug('SCHEDULE NOT SAVED'); //todo entfernen
                    //debug($this->Capture->Schedule->invalidFields()); //todo entfernen

                    $this->Capture->delete();

                }

            }
            else {
                $this->Session->setFlash(__('The Capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

            }
        }


        // Normal Form View
        $lectures = $this->Capture->Lecture->find('list', array(
            'fields' => array('Lecture.lecture_id', 'Lecture.full_name', 'Lecture.semester')));
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $events = $this->Capture->Event->find('list');
        $schedules = $this->Capture->Schedule->find('list');
        $eventTypes = $this->Capture->Event->EventType->find('list', array(
            'fields' => array('EventType.event_type_id', 'EventType.name', 'EventType.color')));

        $this->set(compact('lectures', 'users', 'workflows', 'schedules', 'events', 'eventTypes'));
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

        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }

        /*if ($this->request->is(array('post', 'put'))) {
            if ($this->Capture->save($this->request->data)) {
                $this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }*/


        if ($this->request->is(array('post', 'put'))) {


            //debug($this->request->data);

            //TODO: CAPTURE::EDIT
            /*

            // Markup Container
            $Schedules = $this->request->data['Schedule'];

            // Extra Check valid data
            $validData = true;
            foreach ($Schedules as $i => $Schedule) {

                // SCHEDULE VALIDATION
                if (empty($Schedule['interval_start']) || empty($Schedule['duration'])) {

                    $this->Session->setFlash(__('A Schedule is missing information.') .
                        '\n' . __('The Capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                    $validData = false;
                    break;
                }
                else {

                    //CONVERT DATA
                    $Schedules[$i]['interval_start'] = CakeTime::format('Y-m-d', substr($Schedule['interval_start'], 4));

                    if (!empty($Schedule['interval_end'])) {
                        $Schedules[$i]['interval_end'] = CakeTime::format('Y-m-d', substr($Schedule['interval_end'], 4));
                    }

                    //SCHEDULE[Event] Data
                    $Schedules[$i]['Event']['event_type_id'] = $this->request->data['Event']['event_type_id'];
                    $Schedules[$i]['Event']['link'] = $this->request->data['Event']['link'];

                    $Schedules[$i]['Capture']['name'] = $this->request->data['Capture']['name'];
                    $Schedules[$i]['Capture']['status'] = $this->request->data['Capture']['status'];
                    $Schedules[$i]['Capture']['comment'] = $this->request->data['Capture']['comment'];
                }
            }

            //debug($Schedules);

            */ //TODO: CAPTURE::EDIT

            // ########################### SAVE NEW DATA ###############################################################

            // Create and Save Event for Capture
            if ( /*TODO: CAPTURE::EDIT $validData && */
                $this->Capture->save($this->request->data['Capture'])
            ) {


                $this->Session->setFlash(__('The Capture has been saved.'), 'default', array('class' => 'alert alert-success'));


                // Capture hasMany Schedules
                /* //TODO: CAPTURE::EDIT foreach ($Schedules as $i => $Schedule) {

                    $Schedules[$i]['capture_id'] = $this->Capture->id;

                    if ($this->Capture->Schedule->save($Schedules[$i])) {

        //              //debug('SCHEDULE SAVED'); //todo entfernen

                        $this->Capture->Schedule->manageOwnEvents($this->Capture->Schedule->id, $Schedules[$i]);
                        //$this->Capture->Schedule->delete();
                    }
                    else {

                        $this->Session->setFlash(__('A Schedule could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        //debug('SCHEDULE NOT SAVED'); //todo entfernen
                        //debug($Schedules[$i]); //todo entfernen
                        //debug($this->Capture->Schedule->invalidFields()); //todo entfernen
                    }
                }*/

                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The Capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));

            }
        }


        else {
            $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
            $this->request->data = $this->Capture->find('first', $options);
        }


        // VIEW

        // Related Model Data of this particular Capture
        $this->set('myEvent', $this->Capture->Event->find('first', array(
                'conditions' => array('Capture.' . $this->Capture->primaryKey => $id),
            )
        ));

        $this->set('mySchedules', $this->Capture->Schedule->find('all', array(
                'link' => array(
                    'Capture'
                ),
                'conditions' => array('Capture.' . $this->Capture->primaryKey => $id),
            )
        ));


        // Normal View Data for ALL related Models
        $lectures = $this->Capture->Lecture->find('list', array(
            'fields' => array('Lecture.lecture_id', 'Lecture.full_name', 'Lecture.semester')));
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $events = $this->Capture->Event->find('list');
        $schedules = $this->Capture->Schedule->find('list');
        $eventTypes = $this->Capture->Event->EventType->find('list', array(
            'fields' => array('EventType.event_type_id', 'EventType.name', 'EventType.color')));

        $this->set(compact('lectures', 'users', 'workflows', 'schedules', 'events', 'eventTypes'));
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
        // Set active Capture record
        $this->Capture->id = $id;
        $capture = $this->Capture->findByCaptureId($id);

        if (!$this->Capture->exists()) {
            throw new NotFoundException(__('Invalid capture'));
        }

        $this->request->onlyAllow('post', 'delete');

        /*        //Still has Schedules? Break!
                if ($this->Capture->hasSchedules($this->Capture->id)) {

                    $this->Session->setFlash(__('The Capture could not be deleted. Related Schedules exist!'), 'default', array('class' => 'alert alert-danger'));
                    return $this->redirect(array('action' => 'index'));
                }*/


        // Delete Capture
        if ($this->Capture->delete($this->Capture->id, true)) { //Delete Cascaded
            $this->Session->setFlash(__('The capture has been deleted.'), 'default', array('class' => 'alert alert-success'));


            // RELATION EVENTS
            /*if ($this->Capture->hasEvents($this->Capture->id)) {

                // Set active Event record
                $this->Capture->Event->id = $capture['Event']['event_id'];
                // Delete associated Event
                if ($this->Capture->Event->delete()) {
                    $this->Session->setFlash(__('The related events have been deleted.'), 'default', array('class' => 'alert alert-success'));
                }
                else {
                    $this->Session->setFlash(__('The related events could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }

            // RELATION EVENTS
            if ($this->Capture->hasSchedules($this->Capture->id)) {

                // Set active Event record
                $this->Capture->Schedule->id = $capture['Schedule']['schedule_id'];
                // Delete associated Event
                if ($this->Capture->Event->delete()) {
                    $this->Session->setFlash(__('The related schedules have been deleted.'), 'default', array('class' => 'alert alert-success'));
                }
                else {
                    $this->Session->setFlash(__('The related schedules could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                }
            }*/
        }
        else {
            $this->Session->setFlash(__('The capture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
        $this->Capture->recursive = 0;
        $this->set('captures', $this->Paginator->paginate());
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
        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
        $this->set('capture', $this->Capture->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public
    function admin_add() {
        if ($this->request->is('post')) {
            $this->Capture->create();
            if ($this->Capture->save($this->request->data)) {
                $this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $this->set(compact('lectures', 'users', 'workflows'));
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
        if (!$this->Capture->exists($id)) {
            throw new NotFoundException(__('Invalid capture'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Capture->save($this->request->data)) {
                $this->Session->setFlash(__('The capture has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The capture could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        else {
            $options = array('conditions' => array('Capture.' . $this->Capture->primaryKey => $id));
            $this->request->data = $this->Capture->find('first', $options);
        }
        $lectures = $this->Capture->Lecture->find('list');
        $users = $this->Capture->User->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $this->set(compact('lectures', 'users', 'workflows'));
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
        $this->Capture->id = $id;
        if (!$this->Capture->exists()) {
            throw new NotFoundException(__('Invalid capture'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Capture->delete()) {
            $this->Session->setFlash(__('The capture has been deleted.'), 'default', array('class' => 'alert alert-success'));
        }
        else {
            $this->Session->setFlash(__('The capture could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
