<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zubair
 * Date: 9/14/12
 * Time: 10:22 PM
 */

require 'libs/facebook-php-sdk/facebook.php';
//require dirname(dirname(__FILE__)) . '/config/facebook_component.config.php';

//class Router {
//    public static function requestUrl($protocol=true) {
//        if ($protocol) {
//            $pageURL = 'http';
//            if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
//                $pageURL .= "s";
//            }
//            $pageURL .= "://";
//        }
//        else {
//            $pageURL = '';
//        }
//
//        if ($_SERVER["SERVER_PORT"] != "80") {
//            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
//        } else {
//            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
//        }
//        return $pageURL;
//    }
//}

class FacebookComponent {

    public $sdk = null;
    protected $_user = null;
    protected $_profile = null;
    public $permissions = array();

    protected $domain;
    protected $login_callback;
    protected $logout_callback;

    public function __construct() {
        //global $FACEBOOK;
        $FB = Configure::read('facebook');

        $FACEBOOK =  array(
            'appId'  => $FB['appId'],
            'secret' => $FB['secret'],
            'domain' => $FB['domain'],
            'login_callback' => $FB['login_callback'],
            'logout_callback' => $FB['logout_callback'],
        );

        $this->sdk = new Facebook(array(
            'appId' => $FACEBOOK['appId'],
            'secret' => $FACEBOOK['secret'],
            'cookie' => true,
        ));

        $this->domain = $FACEBOOK['domain'];
        $this->login_callback = $FACEBOOK['login_callback'];
        $this->logout_callback = $FACEBOOK['logout_callback'];
    }

    public function isLoggedIn() {
        return ($this->getUser() === false);
    }

    public function getUser() {
        if ($this->_user !== null) return $this->_user;

        $this->_user = $this->sdk->getUser();

        if (!$this->_user) {
            return false;
        }

//        try {
//            // Proceed knowing you have a logged in user who's authenticated.
//            $this->_profile = $this->sdk->api('/me');
//        } catch (FacebookApiException $e) {
//            error_log($e);
//            var_dump($e);
//            $this->_user = false;
//        }
        return $this->_user;
    }

    public function profile() {
        try {
            // Proceed knowing you have a logged in user who's authenticated.
            $this->_profile = $this->sdk->api('/me');
        } catch (FacebookApiException $e) {
            error_log($e);
            $this->_user = false;
        }
        return $this->_profile;
    }

    public function login($callback_url) {
        header('Location: '.$this->getLoginUrl($callback_url));
        die('');
    }

    public function getLoginUrl() {
        return $this->sdk->getLoginUrl(array(
            'redirect_uri' => $this->domain . $this->login_callback,
            'scope'        => 'read_stream,publish_stream,email',
            'display'      => 'popup'
        ));
    }

    public function logout() {
        $this->sdk->destroySession();
    }

    public function loginCallback() {
        // save current user in database

        //
    }

    public function getLogoutUrl() {
        return $this->sdk->getLogoutUrl(array(
            'next'=> $this->domain . $this->logout_callback
        ));
    }
}
