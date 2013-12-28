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
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
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
                'message' => 'Bitte geben Sie einen Nutzernamen an.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Dieser Nutzername wird bereits verwendet.'
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Bitte geben Sie ein Passwort ein.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'alphaNumeric' => array(
                'rule' => array('alphaNumeric'),
                'message' => 'Nur Zahlen und Nummern erlaubt.',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'length' => array(
                'rule' => array('between', 3, 40), //Todo array('between', 8, 40),
                'message' => 'Das Passwort sollte aus 8 bis 40 Zeichen bestehen.',
            ),
        ),
        // Password confirmation
        'repass' => array(
            'equalToField' => array(
                'rule' => array('equalToField', 'password'),
                'message' => 'Die eingegebenen Passwörter sind verschieden.',
                //'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'Bitte geben Sie eine gültige Emailadresse an.',
                //'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Bitte geben Sie eine gültige Emailadresse an.',
                //'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Diese E-Mailadresse wird bereits genutzt.'
            )
        ),
        'language' => array(

            'checkSupportedLanguage' => array(
                'rule' => array('checkSupportedLanguage'),
                'message' => 'Diese Sprache wird nicht unterstützt.',
                'allowEmpty' => false,
                'required' => true,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'group_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Nutzergruppe setzten.',
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

}
