<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
 * @property EventType $EventType
 * @property Schedule $Schedule
 * @property Capture $Capture
 * @property Ticket $Ticket
 */
class Event extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'event_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'event_type_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'start' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        /*
        'start-time' => array(
            'datetime' => array(
                'rule' => array('isUhrzeit'),
                'message' => 'Uhrzeit angeben.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),*/
        'end' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ), /*
        'end-time' => array(
            'datetime' => array(
                'rule' => array('isUhrzeit'),
                'message' => 'Uhrzeit angeben.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),*/
        'all_day' => array(
            'boolean' => array(
                'rule' => array('boolean'),
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
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'link' => array(
            'url' => array(
                'rule' => array('url', true),
                'message' => 'Please enter a valid Link, like http://www.captility.de',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'capture_id' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
        'EventType' => array(
            'className' => 'EventType',
            'foreignKey' => 'event_type_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Schedule' => array(
            'className' => 'Schedule',
            'foreignKey' => 'schedule_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Capture' => array(
            'className' => 'Capture',
            'foreignKey' => 'capture_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Ticket' => array(
            'className' => 'Ticket',
            'foreignKey' => 'event_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    function hasTickets($id) {
        $count = $this->Ticket->find("count", array("conditions" => array("Ticket.event_id" => $id)));
        if ($count == 0) {
            return false;
        }
        else {
            return true;
        }
    }

    public function beforeValidate($options = array()) {

        if (!empty($this->data['Event']['start']) && !empty($this->data['Event']['start-time'])) {

            $this->data['Event']['start'] = $this->formatDateTimepickerToValid($this->data['Event']['start'], $this->data['Event']['start-time'], 'Y-m-d H:i:s');
        }

        if (!empty($this->data['Event']['end']) && !empty($this->data['Event']['end-time'])) {

            $this->data['Event']['end'] = $this->formatDateTimepickerToValid($this->data['Event']['end'], $this->data['Event']['end-time'], 'Y-m-d H:i:s');
        }

        return true;
    }


    public function afterValidate($options = array()) {

        //debug($this->data);
        //debug($this->validationErrors);

        return true;
    }

    public function generateNext($nextStep = 0, $options = array()) {


        $event = $this->find('first', array(

            'link' => array(

                //'Ticket',
                'Capture' => array(
                    'fields' => array('Capture.capture_id', 'Capture.user_id'),
                    'conditions' => array('exactly' => 'Event.capture_id = Capture.capture_id'),

                    'User' => array(
                        'fields' => array('User.user_id'),
                        'conditions' => array('exactly' => 'User.user_id = Capture.user_id')),

                    'Workflow' => array(
                        'fields' => array('Workflow.workflow_id'),
                        'conditions' => array('exactly' => 'Workflow.workflow_id = Capture.workflow_id'),

                        'Task' => array(
                            'fields' => array('Task.task_id', 'Task.step'),
                            'conditions' => array('exactly' => 'Task.workflow_id = Workflow.workflow_id')),
                    )
                )
            ),

            'conditions' => array(

                'AND' => array(

                    'Event.event_id' => $this->id,
                    'Task.step' => $nextStep
                ),
            ),

            'order' => array('Task.step'),
        ));


        //Update Processing Status with first Task
        if ($nextStep == 0) {

            // ELSE SET DONE
            $this->updateStatus('Processing');
        }

        // IF NEW TASKS TO GENERATE TO TICKET
        if (!empty($event)) {

            $newTicket['Ticket']['event_id'] = $this->id;
            $newTicket['Ticket']['task_id'] = $event['Task']['task_id'];
            $newTicket['Ticket']['user_id'] = $event['User']['user_id'];
            $newTicket['Ticket']['status'] = (isset($event['User']['user_id'])) ? 'Requested' : 'New';

            $this->Ticket->generateNewTicket($newTicket);

        }
        else {

            // ELSE SET DONE
            $this->updateStatus('Online');
        }
    }


    private function updateStatus($newStatus) {

        $status = $this->field('status');

        if ($status != 'Failed' && $status != 'Canceled') {

            $this->saveField('status', $newStatus);
        }

    }

}
