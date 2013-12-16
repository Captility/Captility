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
        // Allow users to register and logout.
        $this->Auth->allow('logout');

        // A logged in user can't register or login. Others can!
        if (in_array($this->action, array('register', 'login'))) {
            if ($this->Auth->user()) {
                $this->Session->setFlash(__('Sie sind bereits angemeldet.'), 'alert', array(
                    'class' => 'alert alert-info', 'plugin' => 'BoostCake'
                ));
            }
            else {
                $this->Auth->allow('register');
                $this->Auth->allow('login');
            }
        }
    }


    public function login() {

        $this->set('headline', 'Login');

        //Alredy logged in
        if ($this->request->is('post')) {
            if ($this->Auth->user()) {

                $this->Session->setFlash(__('Sie sind bereits eingeloggt.'), 'default', array(
                    'class' => 'alert alert-info', 'plugin' => 'BoostCake'
                ));

                return $this->redirect($this->Auth->redirect());
            }
        }

        // Login
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                //TODO entfernen:
                $this->Session->setFlash(__('Erfolgreich eingeloggt'), 'default', array(
                    'class' => 'alert alert-success', 'plugin' => 'BoostCake'
                ));

                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password try again'), 'default', array(
                'class' => 'alert alert-danger', 'plugin' => 'BoostCake'
            ));
        }
    }

    public function logout() {

        // If logged in -> logout and flash message.
        if ($this->Auth->user()) {
            $this->Session->setFlash(__('Logged out.'), 'default', array(
                'class' => 'alert alert-success', 'plugin' => 'BoostCake'
            ));
        }

        return $this->redirect($this->Auth->logout());
    }

    function register() {

        $this->set('headline', 'Anmeldung');

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Der Benutzer wurde erfolgreich  erstellt.'), 'default', array('class' => 'alert alert-success', 'plugin' => 'BoostCake'));

                if ($this->Auth->login()) {

                    $this->Session->setFlash(__('Der Benutzer wurde erfolgreich  erstellt und eingeloggt.'), 'default', array(
                        'class' => 'alert alert-success', 'plugin' => 'BoostCake'
                    ));

                    return $this->redirect($this->Auth->redirect());
                }

                $this->Session->setFlash(__('Der Benutzer konnte nicht eingeloggt werden.'), 'default', array(
                    'class' => 'alert alert-danger', 'plugin' => 'BoostCake'
                ));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger', 'plugin' => 'BoostCake'));
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
            else {
                $this->Session->setFlash(__('Sie verfügen nicht über die nötigen Rechte diese Aktion auszuführen.'), 'alert', array(
                    'class' => 'alert alert-info', 'plugin' => 'BoostCake'
                ));
            }
        }


        return parent::isAuthorized($user);

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
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'alert', array('class' => 'alert alert-success', 'plugin' => 'BoostCake'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert', array('class' => 'alert alert-danger', 'plugin' => 'BoostCake'));
            }
        }
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
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'alert', array('class' => 'alert alert-success', 'plugin' => 'BoostCake'));
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'alert', array('class' => 'alert alert-danger', 'plugin' => 'BoostCake'));
            }
        }
        else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
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
            $this->Session->setFlash(__('The user has been deleted.'), 'alert', array('class' => 'alert alert-success', 'plugin' => 'BoostCake'));
        }
        else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'alert', array('class' => 'alert alert-danger', 'plugin' => 'BoostCake'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
