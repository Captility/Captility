<?php
App::uses('AppModel', 'Model');
/**
 * Workflow Model
 *
 * @property Capture $Capture
 * @property Task $Task
 */
class Workflow extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'workflow_id';

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
        'workflow_id' => array(
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
                'message' => 'Enter a name for the workflow.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This name is already in use.'
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
        'Capture' => array(
            'className' => 'Capture',
            'foreignKey' => 'workflow_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'workflow_id',
            'dependent' => true,
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

    public function beforeDelete($cascade = true) {

        if ($cascade) {
            $captures = $this->Capture->find("all", array(
                "conditions" => array("Capture.workflow_id" => $this->id)
            ));
        }


        foreach ($captures as $i => $capture) {

            $capture['Capture']['workflow_id'] = null;
            $this->Capture->save($capture['Capture']);
        }

        return true;
    }

}
