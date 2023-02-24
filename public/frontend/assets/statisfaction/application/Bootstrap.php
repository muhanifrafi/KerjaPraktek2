<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initApp() {
        $db_config = "";
        $autoloader = Zend_Loader_Autoloader::getInstance();
        Zend_Registry::set('basepath', '');
        Zend_Registry::set('baseData', '../library/data');
        Zend_Registry::set('photopath', '../library/data/photo');
        Zend_Registry::set('db_config', $db_config);
        Zend_Registry::set('elearnpath', '/data2/elearning/materi');
        Zend_Registry::set('elearnurl', '/data/elearning/materi');

        $this->bootstrap('multidb');
        $multidb = $this->getPluginResource('multidb');
        Zend_Registry::set('db', $multidb->getDb('db'));
        Zend_Registry::set('dbhelpdesk', $multidb->getDb('dbhelpdesk'));
        ini_set('memory_limit', ' 2688M');
    }

    protected function _initSession() {
        Zend_Session::start();
        $this->sesion_check();
        //return ;
    }

    function sesion_validate() {
        $timeout = 900; //session lima belas menit
        $_SESSION['expires_by'] = time() + $timeout;
    }

    function sesion_check() {

        $exp_time = $_SESSION['expires_by'];
        if (time() < $exp_time) {
            $this->sesion_validate();
            return true;
        } else {
            unset($_SESSION['expires_by']);
            unset($_SESSION['sessionlogin']);
            $timeout = 900;
            $_SESSION['expires_by'] = time() + $timeout;
            return false;
        }
    }

}

