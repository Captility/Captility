<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');


    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }


    public function login()
    {

        $this->set('headline','Login');

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                $this->Session->setFlash(__('Login successfull'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-success'
                ));

                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password try again'), 'alert', array(
                'plugin' => 'BoostCake',
                'class' => 'alert-danger'
            ));
        }
    }

    public function logout()
    {
        $this->Session->setFlash(__('Logged out.'), 'alert', array(
            'plugin' => 'BoostCake',
            'class' => 'alert-success'
        ));
        return $this->redirect($this->Auth->logout());
    }


    public function isAuthorized($user) {

        // A user can edit himself.
        if (in_array($this->action, array('edit'))) {
            $userId = $this->request->params['pass'][0];
            if ($this->User->isHimself($userId, $user['user_id'])) {
                return true;
            } else {
                $this->Session->setFlash(__('Sie verfügen nicht über die nötigen Rechte diese Aktion auszuführen.'), 'alert', array(
                    'plugin' => 'BoostCake',
                    'class' => 'alert-info'
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
    public function index()
    {
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
    public function view($id = null)
    {
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
    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
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
    public function edit($id = null)
    {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        } else {
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
    public function delete($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
