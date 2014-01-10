<?php
App::uses('AppModel', 'Model');
/**
 * Host Model
 *
 * @property Lecture $Lecture
 */
class Host extends AppModel {


    var $displayField = "name";
    /*var $actsAs = array('MultipleDisplayFields' => array(
        'fields' => array('firstname', 'surname'),
        'pattern' => '%s %s'
    ));*/

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'host';

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'host_id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'host_id' => array(
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
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'atLeastOneEmail' => array(
                'rule' => array('atLeastOneEmail'),
                'message' => 'At least one contact E-Mail is required.',
                'allowEmpty' => true,
                'required' => true),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid E-Mail adress.',
                'allowEmpty' => null,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'contact_email' => array(
            'atLeastOneEmail' => array(
                'rule' => array('atLeastOneEmail'),
                'message' => 'At least one contact E-Mail is required.',
                'allowEmpty' => true,
                'required' => true),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid E-Mail adress.',
                'allowEmpty' => null,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    /**
     * @param $data
     * @return bool
     * Usage: var $validate = array('myField1' => array('atLeastOne', 'myField2', 'myField3', 'myField4'), ...
     */
    function atLeastOneEmail($data) {

        return !empty($this->data[$this->name]['contact_email'])
            || !empty($this->data[$this->name]['email']);
    }


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Lecture' => array(
            'className' => 'Lecture',
            'foreignKey' => 'host_id',
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

    function hasLectures($id){
        $count = $this->Lecture->find("count", array("conditions" => array("Host.host_id" => $id)));
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

}
