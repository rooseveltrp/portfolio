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
    /*
     * done Password protect admin routes
     * done Make sure only the admin can see the admin page
     * done Create an action to reset the schema
     * done Update the flash message template
     */

    public $components = array(
        "Session",
        "Auth" => array(
            "loginRedirect" => array(
                "controller" => "users",
                "action" => "not_logged_in"
            ),
            "logoutRedirect" => array(
                "controller" => "users",
                "action" => "not_logged_in"
            ),
            "authorize" => array(
                "Controller"
            )
        ),
        "RequestHandler"
    );

    public function beforeFilter() {
        $this->set("loggedIn", $this->Auth->loggedIn());
        $this->set("loggedInUser", $this->Auth->user());
    }

    public function isAuthorized($user) {
        if (isset($user['admin']) && (bool)$user['admin']) {
            return true;
        }

        return false;
    }

    public function _isJson() {
        if (isset($this->request->params['ext']) && $this->request->params['ext'] == 'json') {
            return true;
        }
        return false;
    }

    public function _jsonResp($success, $msg, $data = null) {
        $this->set('success', $success);
        $this->set('msg', $msg);
        $this->set('data', $data);
        $this->set("_serialize", array('success', 'msg', 'data'));
    }
}
