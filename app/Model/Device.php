<?php
App::uses('AppModel', 'Model');
/**
 * Device Model
 *
 * @property Event $Event
 */
class Device extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'device_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'device_id' => array(
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
        'ip_adress' => array(
            'ip' => array(
                'rule' => array('ip', 'both'), // 'IPv4' or 'IPv6' or 'both' (default)
                'message' => 'Please supply a valid IP address.',
                'allowEmpty' => true,
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'allowEmpty' => true,
                'message' => 'This IP is already in use.'
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'This name is already in use.'
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            )
        ),
        'location' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
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
        'start_command' => array(
            'url' => array(
                'rule' => array('url', true),
                'message' => 'Please enter a valid Link, like http://www.captility.de',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'stop_command' => array(
            'url' => array(
                'rule' => array('url', true),
                'message' => 'Please enter a valid Link, like http://www.captility.de',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'device_id',
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


    /**
     * Password encryption
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);


        //Encrypt Device Password for later Cronjob Commands/ HTTP-API requests
        if (isset($this->data['Device']['device_pwd']) && $this->data['Device']['device_pwd'] != '') {


            // Encrypt device password
            if (!empty($this->data[$this->alias]['device_pwd'])) {

                $this->data[$this->alias]['device_pwd'] = $this->encryptField($this->data[$this->alias]['device_pwd']);
            }
        }

        return true;
    }

    public function afterFind($results, $primary = false) {

        parent::afterFind($results, $primary);


        foreach ($results as $result => $val) {

            // Decrypt device password
            if (is_array($results[$result]) && isset($results[$result][$this->alias]['device_pwd']) && !empty($results[$result][$this->alias]['device_pwd'])) {

                $results[$result][$this->alias]['device_pwd'] = $this->decryptField($results[$result][$this->alias]['device_pwd']);
            }

        }

        return $results;
    }
}