<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {

        parent::beforeFilter();


        //Allow everything for debugging:
        //$this->Auth->allow();

        $this->Auth->allow('initAuth'); //ToDo AclActions entfernen

        // A logged in user can't register or login. Others can!
        if (in_array($this->action, array('register', 'login', 'logout', 'changePassword'))) {
            if ($this->Auth->user()) {
                $this->Auth->allow('logout');
                $this->Auth->allow('changePassword');
            }
            else {
                $this->Auth->allow('register');
                $this->Auth->allow('login');
            }
        }

    }

    public function isAuthorized($user) {


        // A user can edit himself.
        if (in_array($this->action, array('edit'))) {
            $userId = $this->request->params['pass'][0];
            if ($this->User->isHimself($userId, $user['user_id'])) {
                return true;
            }

        }

        return parent::isAuthorized($user);

    }

    //TODO: Remove ACL Action
    public function initAuth() {

        $group = $this->User->Group;

        //Allow admins to everything
        $group->id = 1;
        $this->Acl->allow($group, 'controllers');

        //allow managers to posts and widgets
        $group->id = 2;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->deny($group, 'controllers/Users');
        $this->Acl->deny($group, 'controllers/Groups');

        $this->Acl->allow($group, 'controllers/Calendars');
        $this->Acl->allow($group, 'controllers/Captures');
        $this->Acl->allow($group, 'controllers/Events');
        $this->Acl->allow($group, 'controllers/EventTypes');
        $this->Acl->allow($group, 'controllers/Hosts');
        $this->Acl->allow($group, 'controllers/Lectures');
        $this->Acl->allow($group, 'controllers/Tasks');
        $this->Acl->allow($group, 'controllers/Tickets');
        $this->Acl->allow($group, 'controllers/Workflows');


        //allow users to only add and edit on posts and widgets
        $group->id = 3;
        $this->Acl->deny($group, 'controllers');
        $this->Acl->deny($group, 'controllers/Users');

        //we add an exit to avoid an ugly "missing views" error message
        echo "all done";
        exit;
    }


    public function login() {

        $this->set('headline', 'Login');

        //Already logged in
        if ($this->request->is('post')) {
            if ($this->Auth->user()) {

                $this->Session->setFlash(__('Sie sind bereits eingeloggt.'), 'flash/info');

                return $this->redirect($this->Auth->redirect());
            }
        }

        // Login
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                //TODO entfernen:
                $this->Session->setFlash(__('Erfolgreich eingeloggt'), 'flash/success');

                // Set Language after login
                $this->Session->write('Config.language', $this->Session->read('Auth.User.language'));

                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Falscher Benutzername oder Passwort. Bitte versuchen Sie es erneut.'), 'flash/danger');
        }
    }

    public function logout() {

        // If logged in -> logout and flash message.
        if ($this->Auth->user()) {
            $this->Session->setFlash(__('Erfolgreich ausgeloggt.'), 'flash/success');
        }

        return $this->redirect($this->Auth->logout());
    }

    function register() {

        $this->set('headline', 'Anmeldung');

        if ($this->request->is('post') || $this->request->is('put')) {

            // Prepare Pojo for Save
            $this->User->create();

            //
            $this->User->Behaviors->attach('Passwordable', array('require' => true, 'confirm' => true));

            // Ensure new User has minimal rights
            $this->request->data['User']['status'] = 'user';
            $this->request->data['User']['group_id'] = 3;
            $this->request->data['User']['password'] = $this->request->data['User']['pwd'];

            if ($this->User->save($this->request->data)) {

                $this->Session->setFlash(__('Der Benutzer wurde erfolgreich  erstellt.'), 'flash/success');

                if ($this->Auth->login()) {

                    $this->Session->setFlash(__('Der Benutzer wurde erfolgreich erstellt und eingeloggt.'), 'flash/success');

                    // Set Language after login
                    $this->Session->write('Config.language', $this->Session->read('Auth.User.language'));

                    return $this->redirect($this->Auth->redirect());
                }

                $this->Session->setFlash(__('Der Benutzer konnte nicht eingeloggt werden.'), 'flash/danger');
            }
            else {
                $this->Session->setFlash(__('Der Benutzer konnte nicht erstellt werden.'), 'flash/danger');
            }

        }

        unset($this->request->data['User']['pwd']);
        unset($this->request->data['User']['pwd_confirm']);

    }


    public function changePassword() {

        //Todo change and check access rights and logged out users !!!!!
        $this->set('headline', 'Change Password');

        if ($this->Auth->user() && $this->request->is(array('post', 'put'))) {

            $this->User->Behaviors->attach('Passwordable', array('require' => true, 'confirm' => true, 'current' => true, 'allowSame' => false));

            $this->request->data['User']['user_id'] = $this->Session->read('Auth.User.user_id');

            if ($this->User->save($this->request->data, true, array('user_id', 'pwd', 'pwd_confirm', 'pwd_current'))) {
                $this->Session->setFlash(__('The user has been saved.'), 'flash/success');
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/danger');
            }
        }

        unset($this->request->data['User']['pwd']);
        unset($this->request->data['User']['pwd_confirm']);
    }


    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->create();

            $this->User->Behaviors->attach('Passwordable', array('require' => true, 'confirm' => true));

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'flash/success');

                // Set Language after login
                $this->Session->write('Config.language', $this->request->data['User']['language']);

                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/danger');
            }
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->Behaviors->attach('Passwordable', array('require' => false, 'confirm' => false));

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'flash/success');
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/danger');
            }
        }
        else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $groups = $this->User->Group->find('list');
        $this->set(compact('groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'flash/success');
        }
        else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'flash/danger');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
