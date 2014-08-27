<?php
App::uses('AppController', 'Controller');
/**
 * Captures Controller
 * @author Daniel, Captiliity
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
    /*public function index() {
        $this->Capture->recursive = 0;

        $this->Paginator->settings = array(
            'limit' => 12
        );
        $this->set('captures', $this->Paginator->paginate());
    }*/
    public function index() {

        $conditions = array();
        //Transform POST into GET
        if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){

            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];

            // We need to overwrite the page every time we change the parameters
            $filter_url['page'] = 1;

            // for each filter we will add a GET parameter for the generated url
            foreach($this->data['Filter'] as $name => $value){
                if($value){
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }
            // now that we have generated an url with GET parameters,
            // we'll redirect to that page
            return $this->redirect($filter_url);

        } else {
            // GET

            // Inspect all the named parameters to apply the filters
            foreach($this->params['named'] as $param_name => $value){

                // Don't apply the default named parameters used for pagination
                if(!in_array($param_name, array('page','sort','direction','limit'))){

                    // You may use a switch here to make special filters
                    // like "between dates", "greater than", etc
                    if($param_name == "search"){
                        $conditions['OR'] = array(
                            array('Capture.name LIKE' => '%' . $value . '%'),
                            array('Lecture.name LIKE' => '%' . $value . '%'),
                            array('Lecture.number LIKE' => '%' . $value . '%')
                        );
                    } else if($param_name == "lecture_id"){

                        $conditions['Lecture.'.$param_name] = $value;
                    } else {
                        $conditions['Capture.'.$param_name] = $value;
                    }
                    $this->request->data['Filter'][$param_name] = $value;
                }
            }
        }

        $this->set('filter_active', !empty($this->params['named']));

        $this->Capture->recursive = 0;
        $this->Paginator->settings = array(
            'limit' => 12,
            'conditions' => $conditions
        );
        $this->set('captures', $this->Paginator->paginate());

        // get the possible values for the filters and
        // pass them to the view
        $lectures = $this->Capture->Lecture->find('list');
        $workflows = $this->Capture->Workflow->find('list');
        $users = $this->Capture->User->find('list');
        $this->set(compact('lectures', 'workflows', 'users'));

        // Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
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


        if ($this->request->is(array('post', 'put'))) {


            /*debug('##################################');
            debug('##################################');
            debug('##################################');

            debug('CaptureController::add(requestData)');
            debug($this->request->data);*/
            $this->Capture->validates($this->request->data['Capture']);


            // Markup Schedule Container
            $Schedules = $this->request->data['Schedule'];
            $this->Capture->Schedule->validates($this->request->data['Schedule']);

            // Extra check for valid data
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
                    $Schedules[$i]['Event']['link'] = $this->request->data['Capture']['link'];

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

                    //debug('SCHEDULE SAVED');
                    //$this->Capture->Schedule->delete();

                    return $this->redirect(array('action' => 'view', $this->Capture->id));
                    //return $this->redirect(array('action' => 'index'));
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
        $devices = $this->Capture->Event->Device->find('list', array(
            'fields' => array('Device.device_id', 'Device.name', 'Device.location')));

        $this->set(compact('lectures', 'users', 'workflows', 'schedules', 'events', 'eventTypes', 'devices'));
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

                return $this->redirect(array('action' => 'view', $this->Capture->id));
                //return $this->redirect(array('action' => 'index'));
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
