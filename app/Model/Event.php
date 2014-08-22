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
        'device_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
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
        ),
        'Device' => array(
            'className' => 'Device',
            'foreignKey' => 'device_id',
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

    /**
     * Reformat Find resulst for COUNT.
     * @url Reference: http://nuts-and-bolts-of-cakephp.com/2008/09/29/dealing-with-calculated-fields-in-cakephps-find/
     */
    function afterFind($results, $primary = false) {
        if ($primary == true) {
            if (Set::check($results, '0.0')) {
                $fieldName = key($results[0][0]);
                foreach ($results as $key => $value) {
                    $results[$key][$this->alias][$fieldName] = $value[0][$fieldName];
                    unset($results[$key][0]);
                }
            }
        }

        return $results;
    }

    /**
     *
     * Calculate data for new Ticket, generate new Ticket for Event after Workflow Rule. Set Event status.
     *
     * @param int $nextStep
     * @param array $options
     */
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
        if ($nextStep == 1) {

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

    public function getEventStatusList($week_start, $week_end) {

        return $this->find('all', array(

            'link' => array(

                'EventType',
                /*'Ticket' => array(
                    'conditions' => array('exactly' => 'Event.event_id = Ticket.event_id')),*/

                'Capture' => array(
                    'fields' => array('Capture.capture_id', 'Capture.status', 'Capture.user_id'),
                    'conditions' => array('exactly' => 'Capture.capture_id = Event.capture_id'),

                    'Lecture' => array(
                        'fields' => array('Lecture.lecture_id', 'Lecture.number', 'name', 'Lecture.host_id', 'Lecture.link'),
                        'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),
                    ),

                    'User' => array(
                        'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                        'conditions' => array('exactly' => 'User.user_id = Capture.user_id')
                    ),
                ),
            ),

            'conditions' => array(

                'AND' => array(

                    'Event.start >=' => $week_start,
                    'Event.end <=' => $week_end,
                )
            ),

            //'limit' => '30', //TODO ENTFERNEN

            'order' => array('Event.start'),
        ));

    }


    public function getCalendarEvents($start, $end, $user_id = null) {


        #################################### VERSION 1 NESTED ARRAY ##########################################
        /*SQL: (int) 66 => array('SELECT `Host`.`hos/*t_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 67 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 68 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 69 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 70 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 71 => array(
    'query' => 'SELECT `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`semester`, `Lecture`.`type`, `Lecture`.`comment`, `Lecture`.`link`, `Lecture`.`pwd`, `Lecture`.`start`, `Lecture`.`end`, `Lecture`.`created`, `Lecture`.`modified`, `Lecture`.`user_id`, `Lecture`.`host_id`, `Lecture`.`event_type_id`, (CONCAT(`Lecture`.`number`, ' ' ,`Lecture`.`name`)) AS  `Lecture__full_name` FROM `Captility`.`lectures` AS `Lecture`   WHERE `Lecture`.`lecture_id` = 1',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0
),
(int) 72 => array(
    'query' => 'SELECT `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact`, `Host`.`contact_email`, `Host`.`comment` FROM `Captility`.`host` AS `Host`   WHERE `Host`.`host_id` = 2',
    'params' => array(),
    'affected' => (int) 1,
    'numRows' => (int) 1,
    'took' => (float) 0*/

        /*$this->Event->unbindModel(array(
            'belongsTo' => array('Capture')
        ));

        $this->Event->bindModel(array(
            'hasOne' => array(
                'Capture' => array(
                    'foreignKey' => false,
                    'conditions' => array('Capture.capture_id = Event.capture_id')
                ),
                'Lecture' => array(
                    'foreignKey' => false,
                    'conditions' => array('Lecture.lecture_id = Capture.lecture_id')
                ),
                'Host' => array(
                    'foreignKey' => false,
                    'conditions' => array('Host.host_id = Lecture.lecture_id')
                )
            )
        ));
        $events = $this->Event->find('all', array(
            'conditions' => array('Capture.user_id' => $userid),
            'contain' => array('Capture' => array('Lecture' => array('Host')))
        )); ##################################################################################################*/

        /*#################################### VERSION 2 FLAT ARRAY ############################################
        // 'SELECT `Capture`.*, `Event`.*, `Lecture`.* FROM `Captility`.`events` AS `Event` INNER JOIN `Captility`.`captures` AS `Capture` ON (`Capture`.`capture_id` = `Event`.`capture_id`) INNER JOIN `Captility`.`lectures` AS `Lecture` ON (`Lecture`.`lecture_id` = `Capture`.`lecture_id`)  WHERE `Capture`.`user_id` = 1',


        $this->Event->unbindModel(array(
            'belongsTo' => array('Capture')
        ));

        $events = $this->Event->find('all', array(
            'contain' => array(
                'Capture' => array(
                    'Lecture' => array()
                )
            ),
            'joins' => array(
                array(
                    'table' => 'captures',
                    'alias' => 'Capture',
                    'foreignKey' => false,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Capture.capture_id = Event.capture_id'
                    )),
                array(
                    'table' => 'lectures',
                    'alias' => 'Lecture',
                    'foreignKey' => false,
                    'type' => 'INNER',
                    'conditions' => array(
                        'Lecture.lecture_id = Capture.lecture_id',
                    )
                )

            ),
            'conditions' => array('Capture.user_id' => $userid),
            'fields' => array('Capture.*', 'Event.*', 'Lecture.*'),
        )); ##################################################################################################*/

        #################################### VERSION 3 LINKED BEHAVIOR #################################################
        //SQL: SELECT `Event`.`event_id`, `Event`.`title`, `Event`.`comment`, `Event`.`start`, `Event`.`end`, `Event`.`all_day`, `Event`.`status`, `Event`.`link`, `Event`.`created`, `Event`.`modified`, `Event`.`event_type_id`, `Event`.`schedule_id`, `Event`.`capture_id`, `Capture`.`capture_id`, `Capture`.`status`, `Capture`.`user_id`, `Lecture`.`lecture_id`, `Lecture`.`number`, `Lecture`.`name`, `Lecture`.`link`, `Host`.`host_id`, `Host`.`name`, `Host`.`email`, `Host`.`contact_email`, `User`.`user_id`, `User`.`username`, `User`.`email`, `User`.`avatar` FROM `Captility`.`events` AS `Event` LEFT JOIN `Captility`.`captures` AS `Capture` ON (`Capture`.`capture_id` = `Event`.`capture_id`) LEFT JOIN `Captility`.`lectures` AS `Lecture` ON (`Lecture`.`lecture_id` = `Capture`.`lecture_id`) LEFT JOIN `Captility`.`host` AS `Host` ON (`Host`.`host_id` = `Lecture`.`host_id`) LEFT JOIN `Captility`.`users` AS `User` ON (`User`.`user_id` = `Lecture`.`user_id`) LEFT JOIN `Captility`.`event_types` AS `EventType` ON (`Event`.`event_type_id` = `EventType`.`event_type_id`)  WHERE UNIX_TIMESTAMP(`Event`.`start`) >= '1389567600' AND UNIX_TIMESTAMP(`Event`.`end`) <= '1389999600' AND `Capture`.`user_id` = 1',


        $userCondition = (isset($user_id)) ? array('Capture.user_id' => $user_id) : array();

        return $this->find('all', array(
                'contain' => false,
                'link' => array(

                    'EventType',
                    'Capture' => array(
                        'fields' => array('Capture.capture_id', 'Capture.status', 'Capture.user_id'),
                        'conditions' => array('exactly' => 'Event.capture_id = Capture.capture_id'),

                        'Lecture' => array(
                            'fields' => array('Lecture.lecture_id', 'Lecture.number', 'name', 'Lecture.host_id', 'Lecture.link'),
                            'conditions' => array('exactly' => 'Lecture.lecture_id = Capture.lecture_id'),

                            'Host' => array(
                                'fields' => array('Host.host_id', 'Host.name', 'Host.email', 'Host.contact_email'),
                                'conditions' => array('exactly' => 'Lecture.host_id = Host.host_id')),

                            'User' => array(
                                'fields' => array('User.user_id', 'User.username', 'User.email', 'User.avatar'),
                                'conditions' => array('exactly' => 'Capture.user_id = User.user_id'))
                        )
                    )
                ),

                'conditions' => array(

                    'AND' => array(

                        'AND' => array(

                            'UNIX_TIMESTAMP(Event.start) >=' => $start,
                            'UNIX_TIMESTAMP(Event.end) <=' => $end
                        ),

                        $userCondition
                    )
                )
            )
        );
    }


    public function getIntervalStats($start, $end, $scaleFormat, $iterationStep) {

        $statsResult = array();

        foreach (Configure::read('EVENT.STATUSES') as $status => $class) {

            $i = 0;
            $statsResult['scale'][$i] = array();
            $statsResult[$status] = array();

            $iterationDate = strtotime($start);

            while ($iterationDate < strtotime($end)) {

                array_push($statsResult[$status], $this->find('count', array(

                            'fields' => array('Event.event_id', 'Event.status'),
                            'recursive' => -1,

                            'conditions' => array(

                                'AND' => array(

                                    'Event.start >=' => date('Y-m-d H:i:s', $iterationDate),
                                    'Event.start <' => date('Y-m-d H:i:s', strtotime("+1 " . $iterationStep, $iterationDate)),
                                    'Event.status' => $status
                                ),
                            ),
                        )
                    )
                );

                array_push($statsResult['scale'][$i], __(date($scaleFormat, $iterationDate)));

                //Iterate the amount of requested weeks
                $iterationDate = strtotime("+1 " . $iterationStep, $iterationDate);
            }
            $i++;
        }

        return $statsResult;
    }

}
