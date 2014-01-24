<?php
App::uses('AppModel', 'Model');
App::uses('CakeTime', 'Utility');
/**
 * Schedule Model
 *
 * @property Capture $Capture
 * @property Event $Event
 */
class Schedule extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'schedule_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'schedule_id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'schedule_id' => array(
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
        'interval_start' => array(
            'datetime' => array(
                'rule' => array('date'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'interval_end' => array(
            'datetime' => array(
                'rule' => array('date'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            /*'after' => array(
				'rule' => array('validateIsSameOrAfterDate', array(0 => 'interval_start',1 => 'interval_end')),
				'message' => 'The date does not lie after the first selected date.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),*/
        ),
        'duration' => array(
            'duration' => array(
                'rule' => array('time'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ), 'repeat_time' => array(
            'time' => array(
                'rule' => array('time'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'repeat_day' => array(
            'numeric' => array(
                'rule' => array('alphanumeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'repeat_week' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
                'required' => false,
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
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'schedule_id',
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

    function hasEvents($id) {
        $count = $this->Event->find("count", array("conditions" => array("Schedule.schedule_id" => $id)));
        if ($count == 0) {
            return false;
        }
        else {
            return true;
        }
    }

    public function beforeSave($options = array()) {
        if (!empty($this->data) && !empty($this->data['Schedule']['interval_start'])) {

            $this->data['Schedule']['interval_start'] = CakeTime::format('Y-m-d', $this->data['Schedule']['interval_start']);

            return true;
        }

        return false;
    }


    /**
     * Event gets called after sucessfull Save of Schedule.
     * Manages own Events by capture Rules.
     * @param $scheduleId
     * @param $schedule
     * @return bool
     */
    public function manageOwnEvents($scheduleId, $schedule) {

        $this->log(print_r($this->Event->validationErrors, true));


        //debug('MANAGE EVENTS'); //todo entfernen


        //CHECK IF SINLE EVENT OR MULTIPLE EVENTS ARE INVOLED
        if (empty($schedule['interval_end'])) {

            //SINGLE EVENT CREATION ####################################################################################
            $event = $schedule['Event'];

            //General fields
            $event['title'] = $schedule['Capture']['name']; //todo name from lecture
            $event['status'] = $schedule['Capture']['status'];
            $event['comment'] = $schedule['Capture']['comment'];

            //Date and Time to DATETIME
            $start = strtotime($schedule['interval_start'] . ' ' . $schedule['repeat_time']['hour'] . ':' . $schedule['repeat_time']['min']);
            $end = strtotime(" +" . $schedule['duration']['hour'] . " hours " .
                "+" . $schedule['duration']['min'] . ' minutes', $start);

            $event['start'] = date('Y-m-d H:i:s', $start);
            $event['end'] = date('Y-m-d H:i:s', $end);

            $event['all_day'] = 0;

            //Foregn Keys
            $event['schedule_id'] = $this->getInsertID();
            $event['capture_id'] = $schedule['capture_id'];

            /*//debug($event);*/


            //debug($event); //todo entfernen

            //SAVE NEW TICKET
            $this->Event->create();
            if ($this->Event->save($event)) {

                //debug('TICKET SAVED'); //todo entfernen
                return true;
            }
            else {


                //debug('TICKET NOT SAVED'); //todo entfernen
                //debug($event); //todo entfernen
                //debug($this->invalidFields()); //todo entfernen

                return (__('The Events could not be saved. Please, try again.'));
            }

        }


        else {

            //MULTIPLE EVENT CREATION ##################################################################################

            // WEEK LOOP

            // Start date
            $iterationDate = strtotime($schedule['interval_start']);


            while ($iterationDate <= strtotime($schedule['interval_end'])) {

                //Default Settings
                $event = array();
                $event = $schedule['Event'];

                //General fields
                $event['title'] = $schedule['Capture']['name']; //todo name from lecture
                $event['status'] = $schedule['Capture']['status'];
                $event['comment'] = $schedule['Capture']['comment'];
                $event['all_day'] = 0; //for now

                //Foregn Keys
                $event['schedule_id'] = $this->getInsertID();
                $event['capture_id'] = $schedule['capture_id'];


                //DATE CALCULATION

                //debug(date('Y-m-d', $iterationDate));
                //Find day in week
                $selectedDateTime = strtotime("first " . $schedule['repeat_day'] . " this week", $iterationDate);

                //debug(date('Y-m-d', $selectedDateTime));

                //Process Dates to correct DateTime:
                $selectedDate = date('Y-m-d', $selectedDateTime);
                $start = strtotime($selectedDate . ' ' . $schedule['repeat_time']['hour'] . ':' . $schedule['repeat_time']['min']);
                $end = strtotime(" +" . $schedule['duration']['hour'] . " hours " .
                    "+" . $schedule['duration']['min'] . ' minutes', $start);

                //Set result for current event
                $event['start'] = date('Y-m-d H:i:s', $start);
                $event['end'] = date('Y-m-d H:i:s', $end);


                //Iterate the amount of requested weeks
                $iterationDate = strtotime("+" . $schedule['repeat_week'] . " weeks", $iterationDate);


                //############## SAVE ####################################
                //debug($event); //todo entfernen

                //SAVE NEW EVENT
                $this->Event->create();
                if ($this->Event->save($event)) {

                    //debug('EVENT SAVED'); //todo entfernen
                    //$this->Event->delete();
                }
                else {


                    //debug('EVENT NOT SAVED'); //todo entfernen
                    //debug($event); //todo entfernen
                    //debug($this->invalidFields()); //todo entfernen

                    return (__('The Events could not be saved. Please, try again.'));
                }

                //debug('DONE'); //todo entfernen
                $events = array();
            }

        }


        return true;
    }

}
