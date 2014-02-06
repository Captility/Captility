<?php
App::uses('AppModel', 'Model');
/**
 * Ticket Model
 *
 * @property User $User
 * @property Task $Task
 * @property Event $Event
 */
class Ticket extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'ticket_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'ticket_id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(


        'ticket_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'status' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'created' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'modified' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'task_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'capture_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),

        'event_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'task_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'event_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );


    public function beforeValidate($options = array()) {

        if (!empty($this->data['Ticket']['ended'])) {

            $this->data['Ticket']['ended'] = $this->formatDateTimepickerToValid($this->data['Ticket']['ended'], $this->data['Ticket']['ended-time'], 'Y-m-d H:i:s');
        }

        return true;
    }


    public function update($status) {


        if ($this->hasAny(array('Ticket.ticket_id' => $this->id)) && array_key_exists($status, Configure::read('TICKET.STATUSES'))) {

            return $this->saveField('status', $status, false);

        }

        return false;
    }

    public function beforeSave($created, $options = array()) {

        //Boolean
        $created = ($created === 'true');

        if (!$created && isset($this->data['Ticket']['status'])) {

            $this->data['Ticket']['old_status'] = $this->field('status');
        }

        return true;

    }

    public function afterSave($created, $options = array()) {


        //Boolean
        $created = ($created === 'true');


        // Check if Update or next Ticket required
        if (!$created && !empty($this->data) && isset($this->data['Ticket']['old_status'])) {

            // Only when status changed...
            if ($this->field('status') != $this->data['Ticket']['old_status']) {

                // check if Ticket is now done and next is required
                if ($this->field('status') == 'Done') {

                    // set ended
                    $this->saveField('ended', date('Y-m-d H:i:s'));

                    // calc next Task
                    $this->Task->id = $this->field('task_id');
                    $nextStep = 1 + $this->Task->field('step');

                    // Order next Ticket for Event (Event does the rest)
                    $this->Event->id = $this->field('event_id');
                    $this->Event->generateNext($nextStep, $options);
                }


                // check if Ticket is canceled and cancel Event
                if ($this->field('status') == 'Canceled') {

                    $this->Event->id = $this->field('event_id');
                    $this->Event->saveField('status', 'Canceled');
                    $this->Event->saveField('ended', date('Y-m-d H:i:s'));
                }


                // check if Ticket is canceled and cancel Event
                if ($this->field('status') == 'Error') {

                    $this->Event->id = $this->field('event_id');
                    $this->Event->saveField('status', 'Failed');
                    $this->Event->saveField('ended', date('Y-m-d H:i:s'));
                }

            }
        }

        /*$this->Task->id = $this->field('task_id'); //TODO: TEST ENTFERNEN
        $nextStep = 1 + $this->Task->field('step'); //TODO: TEST ENTFERNEN

        $this->Event->id = $this->field('event_id'); //TODO: TEST ENTFERNEN
        $this->Event->generateNext($nextStep, $options); //TODO: TEST ENTFERNEN*/

        return true;
    }


    public function generateNewTicket($ticketData) {

        //$this->create();

        // Custom Query for performance and to avoid integrity violations on ajax-call saveField::afterSave
        $insertQuery = "INSERT INTO `Captility`.`tickets` (`status`, `event_id`, `task_id`, `user_id`, `modified`, `created`) " .
            "VALUES ('" . $ticketData['Ticket']['status'] . "', " . $ticketData['Ticket']['event_id'] . ", " .
            $ticketData['Ticket']['task_id'] . ", " . $ticketData['Ticket']['user_id'] . ", '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";

        $this->query($insertQuery);

        /*if ($this->save($ticketData)) {

        }
        else {

            debug($this->validationErrors);
            //throw new InternalErrorException(__('The next Ticket of related workflow could not be generated.'));
        }*/

        /*$log = $this->getDataSource()->getLog(false, false);
        debug($log);*/
    }


    public function getPendingTickets($week_start, $week_end, $user_id = null, $limit = 20) {


        $userCondition = (isset($user_id)) ? array('Ticket.user_id' => $user_id) : array();

        return $this->find('all', array(

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

                    'AND' => array(

                        'Event.start >=' => $week_start,
                        'Event.end <=' => $week_end,
                        'Ticket.status !=' => array('Done', 'Error', 'Canceled'),
                    ),

                    $userCondition
                )
            ),


            'limit' => $limit,

            'order' => array('Ticket.modified DESC', 'Ticket.created'),
        ));

    }


}