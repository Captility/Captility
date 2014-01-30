<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Capture $Capture
 * @property Lecture $Lecture
 * @property Ticket $Ticket
 */
class User extends AppModel {

    /**
     * Primary key field
     *
     * @var string
     */
    public $primaryKey = 'user_id';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';


    /**
     * Password hashing
     */
    public function beforeSave($options = array()) {

        parent::beforeSave($options);

        //Already DONE by PasswordableBehavior:
        /*// manual hashing                                                                                           */
        /*if (isset($this->data['User']['password'])) {                                                               */
        /*    $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);             */
        /*}                                                                                                           */
        /*return true;                                                                                                */
    }

    /**
     * Test wheter the User User is imself.
     * @param $post
     * @param $user
     * @return bool
     */
    public function isHimself($user_id, $user) {
        return $this->field('user_id', array('user_id' => $user_id, 'user_id' => $user)) === $user_id;
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user_id' => array(
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
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a username.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Sorry, this username is already taken.'
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a password.',
                'allowEmpty' => false,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'length' => array(
                'rule' => array('between', 3, 20), //Todo array('between', 8, 40),
                'message' => 'The password should contain 8 to 40 letters.',
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Please enter a valid email adress.',
                //'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter a email adress.',
                //'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email adress is alredy in use!'
            )
        ),
        'language' => array(

            'checkSupportedLanguage' => array(
                'rule' => array('checkSupportedLanguage'),
                'message' => 'This language is not supported.',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'avatar' => array(
            'extension' => array(
                'rule' => array('extension', array('gif', 'png', 'jpg', 'svg')),
                'message' => 'Only gif, png and jpg are supported.',
            )
        ),
        'group_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Please enter a number.',
                //'allowEmpty' => false,
                //'required' => true,
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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    // Register as ARO (Access Request Object)
    public $actsAs = array('Acl' => array('type' => 'requester'));

    // Tie to group
    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        }
        else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        }
        else {
            return array('Group' => array('group_id' => $groupId));
        }
    }

    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Capture' => array(
            'className' => 'Capture',
            'foreignKey' => 'user_id',
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
        'Lecture' => array(
            'className' => 'Lecture',
            'foreignKey' => 'user_id',
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
        'Ticket' => array(
            'className' => 'Ticket',
            'foreignKey' => 'user_id',
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

    function hasCaptures($id){
        $count = $this->Capture->find("count", array("conditions" => array("User.user_id" => $id)));
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

    function hasLectures($id){
        $count = $this->Lecture->find("count", array("conditions" => array("User.user_id" => $id)));
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

    function hasTickets($id){
        $count = $this->Ticket->find("count", array("conditions" => array("User.user_id" => $id)));
        if ($count == 0) {
            return false;
        } else {
            return true;
        }
    }

}
