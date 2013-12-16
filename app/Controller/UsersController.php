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
                $this->Session->setFlash(__('Sie sind bereits angemeldet.'), 'flash/info');
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

                $this->Session->setFlash(__('Sie sind bereits eingeloggt.'), 'flash/info');

                return $this->redirect($this->Auth->redirect());
            }
        }

        // Login
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                //TODO entfernen:
                $this->Session->setFlash(__('Erfolgreich eingeloggt'), 'flash/success');

                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password try again'), 'flash/danger');
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

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Der Benutzer wurde erfolgreich  erstellt.'), 'success');

                if ($this->Auth->login()) {

                    $this->Session->setFlash(__('Der Benutzer wurde erfolgreich erstellt und eingeloggt.'), 'flash/success');

                    return $this->redirect($this->Auth->redirect());
                }

                $this->Session->setFlash(__('Der Benutzer konnte nicht eingeloggt werden.'), 'flash/danger');
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/danger');
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
                $this->Session->setFlash(__('Sie verfügen nicht über die nötigen Rechte diese Aktion auszuführen.'), 'flash/danger');
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
                $this->Session->setFlash(__('The user has been saved.'), 'flash/success');
                return $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/danger');
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
