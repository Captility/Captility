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

    public function beforeSave(/*$insert,*/ $options = array()) {

        //Boolean
        $insert = empty($this->id);

        if (!$insert && isset($this->data['Ticket']['status'])) {

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

                // check if Ticket is now done and next is required !Watch out: multiple recursive afterSaveCalls will happen
                if ($this->field('status') == 'Done') {

                    // set ended
                    $this->saveField('ended', date('Y-m-d H:i:s')); //,true, false); //avoid new callback

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

        // Custom Query for performance and to avoid integrity violations on ajax-call saveField::afterSave
        // Not needed anymore because of whitelisting!
        /*$insertQuery = "INSERT INTO `Captility`.`tickets` (`status`, `event_id`, `task_id`, `user_id`, `modified`, `created`) " .
            "VALUES ('" . $ticketData['Ticket']['status'] . "', " . $ticketData['Ticket']['event_id'] . ", " .
            $ticketData['Ticket']['task_id'] . ", " . $ticketData['Ticket']['user_id'] . ", '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "')";
        $this->query($insertQuery);*/


        /**
         * WHITELIST
         *
         * "Since you are creating the new Ticket from within the afterSave() method of Ticket itself after the initial update of the status field, the model's whitelist is set to the only field you were initially saving (status)."
         * @url http://stackoverflow.com/questions/21588917/cakephp-missing-fields-on-create-insert-into-query/21591713?noredirect=1#21591713
         */
        $this->create();
        if (!$this->save($ticketData, false, array('event_id', 'task_id', 'user_id', 'status'))) {

            //debug($this->validationErrors);
            throw new InternalErrorException(__('The next Ticket of related workflow could not be generated.'));
        }

    }


    public function getPendingTicketsByWeek($week_start, $week_end, $user_id = null, $limit = PHP_INT_MAX) {


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
                    'fields' => array('User.user_id', 'User.username', 'User.email'),
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


    public function getPendingTicketsByAge($untilDate, $statusesAllowed = array('New', 'Requested', 'Urgend'), $limit = PHP_INT_MAX) {


        return $this->find('all', array(

                'link' => array(

                    'Event' => array(
                        'conditions' => array('exactly' => 'Event.event_id = Ticket.event_id'),

                    ),

                ),

                'conditions' => array(

                    'AND' => array(

                        'Event.start <=' => $untilDate,
                        'Ticket.status' => $statusesAllowed,
                    ),
                ),

                'limit' => $limit,
            )
        );
    }


    // #########################################################################################################
    // ################################# CRON TASK TICKET PRIORITY #############################################
    // #########################################################################################################

    public function updateUrgencyStatuses() {


        $deadlineOverdue = date('Y-m-d H:i:s', strtotime('-' . Configure::read('TICKET.OVERDUE_DAYS') . ' days'));
        $overdueTickets = $this->getPendingTicketsByAge($deadlineOverdue);

        foreach ($overdueTickets as $i => $overdueTicket) {

            $this->id = $overdueTicket['Ticket']['ticket_id'];
            $overdueTicket['Ticket']['status'] = 'Overdue';
            $this->save($overdueTicket, array('validate' => false, 'modified' => false, 'callbacks' => false));
        }


        $deadlineUrgend = date('Y-m-d H:i:s', strtotime('-' . Configure::read('TICKET.URGEND_DAYS') . ' days'));
        $urgendTickets = $this->getPendingTicketsByAge($deadlineUrgend, array('New', 'Requested'));

        foreach ($urgendTickets as $i => $urgendTicket) {

            $this->id = $urgendTicket['Ticket']['ticket_id'];
            $urgendTicket['Ticket']['status'] = 'Urgend';
            $this->save($urgendTicket, array('validate' => false, 'modified' => false, 'callbacks' => false));
        }

    }


    public function getIntervalStats($start, $end) {


        foreach (Configure::read('TICKET.STATUSES') as $status => $class) {

            $statsResult[$status] = $this->find('count', array(

                    'fields' => array('Event.event_id', 'Ticket.status'),

                    'conditions' => array(

                        'AND' => array(

                            'Event.start >=' => $start,
                            'Event.start <' => $end,
                            'Ticket.status' => $status
                        ),
                    ),
                )

            );
        }

        return $statsResult;
    }
}