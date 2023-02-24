<?php

require_once 'Zend/Controller/Action.php';
require_once 'Zend/Session.php';
require_once "service/beranda/Beranda_Services.php";

class IndexController extends Zend_Controller_Action {

    public function init() {
        $registry = Zend_Registry::getInstance();
        $this->auth = Zend_Auth::getInstance();
        $this->view->basePath = $registry->get('basepath');
        $this->beranda_serv = Beranda_Services::getInstance();
        $this->_helper->layout->setLayout('main-layout');
    }

    public function indexAction() {
        $this->view->aircraft = $this->beranda_serv->arrtmaircraft();
        $this->_helper->layout->setLayout('main-layout');
    }

    public function logoutAction() {
        Zend_Session::destroy(true);
        $this->_redirect('./index');
    }

}