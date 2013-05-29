<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
    Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
    Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
    Router::connect('/pricing', array('controller' => 'pages', 'action' => 'pricing'));
    Router::connect('/help', array('controller' => 'pages', 'action' => 'help'));
    Router::connect('/refund', array('controller' => 'pages', 'action' => 'refund'));
    Router::connect('/security', array('controller' => 'pages', 'action' => 'security'));
    Router::connect('/privacy', array('controller' => 'pages', 'action' => 'privacy'));
    Router::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
    Router::connect('/thanks', array('controller' => 'pages', 'action' => 'thanks'));

/**
 * ... Load all our custom routes
 */


    Router::connect('/pass/create/', array('controller' => 'pass', 'action' => 'create'));
    Router::connect('/pass/download_pkpass/:id', array('controller' => 'pass', 'action' => 'download_pkpass'),array('pass' => array('id')));
    Router::connect('/pass/download_report/:id', array('controller' => 'pass', 'action' => 'download_report'),array('pass' => array('id')));
    Router::connect('/pass/update_download_history/', array('controller' => 'pass', 'action' => 'update_download_history'));


/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
    require CAKE . 'Config' . DS . 'routes.php';
