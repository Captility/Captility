<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */

/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */

/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 *        'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 *        'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 *        array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 *        array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));

/**
 * TimeZone Settings.
 */
setlocale(LC_ALL, 'de_DE.UTF8', 'de_DE', 'de', 'ge', 'deu');

/**
 * LinkableBehavior as alternative for Containable to lighten handling of deep association data mining withot nasty Model-Binding conflicts.
 * @url https://github.com/lorenzo/linkable
 * @licence MIT
 */
CakePlugin::load('Linkable');

/**
 * Use DebugKit Plugin for Debugging.
 * @url https://github.com/cakephp/debug_kit - Official CakePHP Debug Kit Git Repository
 * @author CakePhp
 * @licence MIT
 */
CakePlugin::load('DebugKit');

/**
 * Use BoostCake Plugin for Bootstrap Usage. Provides a few handy Elements like Alerts and Pagination settings.
 * @author slywalker
 * @url http://slywalker.github.io/cakephp-plugin-boost_cake/
 * @licence MIT
 */
CakePlugin::load('BoostCake');

/**
 * Lowlevel jQuery Full-Calendar integration template. Depricated, use Captility's own Calendar integration from Captility v0.3 onwards.
 * @author Adam Shaw
 * @url http://arshaw.com/fullcalendar/
 * @licence MIT
 */
/*CakePlugin::load('FullCalendar');*/

/**
 * Use AclExtras Plugin to sync ACO Lists. Lots of Handy functions to controll Authorisation.
 * @url https://github.com/markstory/acl_extras/
 * @author markstory
 * @licence MIT
 */
CakePlugin::load('AclExtras');


// TODO: Neue Breiche anpassen. Adminbereich admin Prefix als Ziel-Seite
//Configure::write('Routing.prefixes', array('admin'));


/**
 * CAPTILITY VERSION
 */

Configure::write('CAPTILITY.VERSION', '0.3.1');


/**
 * GLOBAL VARIABLES AND CONSTANTS
 */

/**
 * Supported Languages.
 */
Configure::write('Captility.supportedLanguages', array('deu', 'eng'));


/** TICKET STATUSES */
Configure::write('TICKET.STATUSES', array(
    // Name => Class
    'New' => 'default',
    'Requested' => 'primary',
    'Urgend' => 'warning',
    'Overdue' => 'danger',
    'Error' => 'inverse',
    'Done' => 'success'

));

/** CAPTURE STATUSES */
Configure::write('CAPTURE.STATUSES', array(
    // Name => Class
    'Accepted' => 'success',
    'Request' => 'primary',
    'Pending' => 'warning',
    'Refused' => 'danger',
    'Closed' => 'default',
));


/** EVENT STATUSES */
Configure::write('EVENT.STATUSES', array(
    // Name => Class
    'Due' => 'default',
    'Processing' => 'primary',
    'Canceled' => 'warning',
    'Failed' => 'danger',
    'Online' => 'success'

));


/**
 * Bootstrap Layout for Forms.
 */
Configure::write('FORM.INPUT_DEFAULTS', array(
    'role' => 'form',
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => array( //'class' => 'control-label'
            //'class' => 'col col-md-3 control-label'
        ),
        //'wrapInput' => 'col col-md-9',
        'class' => 'form-control'
    ),
    //'class' => 'well form-horizontal'
));

/**
 * Toogle all fields invalidate fpr debugging.
 */
Configure::write('MODEL.INVALIDATE_ALL', false);