<?php
/**
 * Application level Controller
 * @author Daniel, Captiliity
 */
App::uses('Controller', 'Controller');
App::uses('CakeTime', 'Utility');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // Use DebugKit by sharing Component Toolbar of Plugin DebugKit
    public $components = array('DebugKit.Toolbar',
        'Session', 'RequestHandler',
        'Acl',
        'Auth' => array(
            'loginAction' => array('controller' => 'users', 'action' => 'login'),
            'loginRedirect' => array('controller' => 'calendars', 'action' => 'dashboard'),
            'logoutRedirect' => "/",
            'authorize' => array('Controller', 'Actions' => array('actionPath' => 'controllers')),
            'authError' => 'Bitte loggen Sie sich ein um auf diese Funktion zugreifen zu können.')
    );


// Prepare Helpers for Bootstrap layout
    public $helpers = array( //ToDo BooskCake Plugin Aufräumen:
        'Session', 'Text', 'Time', 'Js' => array('Jquery'),
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
        'Breadcrumbs', 'Gravatar',
        'Captility'
    );


    public function beforeFilter() {
        // ###### LAYOUT ########
        // Set default layout for all views
        $this->layout = 'captility';

        // SideElements for all Layouts
        $this->set('sideCalendar', true);
        $this->set('sideTickets', true);

        // ###### AUTHORIZE ########
        // Set public pages with: parent::beforeFilter();
        $this->Auth->allow('display');

        if ($this->Auth->user()) {

            $this->Auth->allow('index', 'view');
        }

        // ###### LANGUAGE ########
        if ($this->Session->check('Config.language')) {
            Configure::write('Config.language', $this->Session->read('Config.language'));
            $this->Auth->authError = 'Sie verfügen nicht über die nötigen Rechte diese Aktion auszuführen.';
        }

        // Time format DMY or MDY
        if (Configure::read('Config.language') === 'eng') {
            Configure::write('Captility.dateFormat', 'MDY');
        }
        else {
            Configure::write('Captility.dateFormat', 'DMY');
        }
    }


    public function beforeRender() {


        if ($this->Auth->user() && $this->request->is('post')) {

            //Delay Session Timeout on new action
            $this->Session->renew();
        }
    }


    public function isAuthorized($user) {

        if (in_array($this->action, array('dashboard', 'myLectures'))) { //ToDo: Edit informActions

            // Inform over admin/manager actions in AppController
            $this->informOverAdminAction($user);
        }

        // Default deny
        return false;
    }

    // Inform over admin/manager actions in AppController
    public function informOverAdminAction($user) {


        if (isset($user['Group']['name']) && $user['Group']['name'] === 'admin') {
            $this->Session->setFlash(__('You are editing this entry as admin'), 'flash/info');
            //return true;
        }

        if (isset($user['Group']['name']) && $user['Group']['name'] === 'manager') {
            $this->Session->setFlash(__('You are editing this entry as manager'), 'flash/info');
        }


    }


}
