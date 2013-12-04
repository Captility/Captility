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
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    // Use DebugKit by sharing Component Toolbar of Plugin DebugKit
    public $components = array('DebugKit.Toolbar');

    // Prepare Helpers for Bootstrap layout
    public $helpers = array(
        'Session',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
    );



//    /**
//     * Components are packages of logic that are shared between controllers.
//     * If you find yourself wanting to copy and paste things between controllers,
//     * you might consider wrapping some functionality in a component.
//     */
//    public $components = array(
//        'Session', // Share Session Component among Controllers
//        'Auth' => array( // Add Athentification Controller to share among Controllers
//            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
//            'logoutRedirect' => array('controller' => 'posts', 'action' => 'index'),
//            'authorize' => array('Controller')
//        )
//    );
//
//    /**
//     * TODO: Change access to index and view for everyone.
//     */
//    public function beforeFilter() {
//        // Allow all index and view Requests for everyone
//        $this->Auth->allow('index', 'view');
//    }
//
//    /**
//     * Allow admin users to see everything. AAuthorization for every request.
//     * @param $user The requesting user
//     * @return bool True if authorized
//     */
//    public function isAuthorized($user) {
//        // Admin can access every action
//        if (isset($user['role']) && $user['role'] === 'admin') {
//            return true;
//        }
//
//        // Default deny
//        return false;
//    }
}
