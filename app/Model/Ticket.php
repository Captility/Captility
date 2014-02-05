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
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                'required' => true,
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

            return $this->saveField('status', $status);
        }

        return false;
    }

    public function beforeSave($created, $options = array()) {

        //Boolean
        $created = ($created === 'true');

        if (!$created && isset($this->data['Ticket']['status'])) {

            $this->data['Ticket']['old_status'] = $this->field('status');
        }

    }

    public function afterSave($created, $options = array()) {

        //Boolean
        $created = ($created === 'true');

        // Check if Update or next Ticket required
        if (!$created && !empty($this->data) && isset($this->data['Ticket']['old_status'])) {

            // Only when status changed...
            if ($this->field('status') != $this->data['Ticket']['old_status']) {

                // check if Ticket is done and next is required
                if ($this->field('status') == 'Done') {


                    // calc next Task
                    $this->Task->id = $this->field('task_id');
                    $nextStep = 1 + $this->Task->field('step');

                    // Order next Ticket for Event (Event does the rest)
                    $this->Event->id = $this->field('event_id');
                    $this->Event->generateNext($nextStep, $options);
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


        $this->create();

        if ($this->save($ticketData)) {

        }
        else {
            throw new InternalErrorException(__('The next Ticket of related workflow could not be generated.'));
        }

    }


}