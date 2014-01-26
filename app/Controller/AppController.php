<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

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
        'Session',
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
        'Session', 'Time', 'Js',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
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
            $this->Auth->authError = 'Sie verfügen nicht über die nötigen Rechte diese Aktion auszuführen. Bitte loggen Sie sich ein.';
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
