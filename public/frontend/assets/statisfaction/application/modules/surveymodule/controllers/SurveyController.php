<?php

require_once 'Zend/Controller/Action.php';
require_once "service/beranda/Beranda_Services.php";

class Surveymodule_SurveyController extends Zend_Controller_Action {

    public function preDispatch() {
        $this->view->addHelperPath('viewhelper', 'OA_View_Helper');
        $this->_helper->layout->setLayout('target-column');
        $registry = Zend_Registry::getInstance();
        $this->view->basePath = $registry->get('basepath');
        $this->view->baseData = $registry->get('baseData');
        $this->beranda_serv = Beranda_Services::getInstance();
    }

    public function init() {
        
    }

    public function downloadAction() {
        $this->view->arrtrsurvcat = $this->beranda_serv->arrtrsurvcat();
        $this->view->arrtrsurvsubcat = $this->beranda_serv->arrtrsurvsubcat();
        $this->view->arrtrsurvquest = $this->beranda_serv->arrtrsurvquest();
    }

    public function download2Action() {
        $this->view->arrtrsurvcat = $this->beranda_serv->arrtrsurvcat();
        $this->view->arrtrsurvsubcat = $this->beranda_serv->arrtrsurvsubcat();
        $this->view->arrtrsurvquest = $this->beranda_serv->arrtrsurvquest();
    }

    public function identityAction() {
        $n_name = $_POST['n_name'];
        $n_rank = $_POST['n_rank'];
        $n_role = $_POST['n_role'];
        $n_company = $_POST['n_company'];
        $c_product = $_POST['c_product'];
        $n_country = $_POST['n_country'];
        $d_date = $_POST['d_date'];

        $this->view->n_name = $n_name;
        $this->view->n_rank = $n_rank;
        $this->view->n_role = $n_role;
        $this->view->n_company = $n_company;
        $this->view->c_product = $c_product;
        $this->view->n_country = $n_country;
        $this->view->d_date = $d_date;
        $this->view->aircraft = $this->beranda_serv->arrtmaircraft();
    }

    public function formsurveyAction() {
        $n_name = $_POST['n_name'];
        $n_rank = $_POST['n_rank'];
        $n_role = $_POST['n_role'];
        $n_company = $_POST['n_company'];
        $c_product = $_POST['c_product'];
        $n_country = $_POST['n_country'];
        $d_date = $_POST['d_date'];

        $this->view->n_name = $n_name;
        $this->view->n_rank = $n_rank;
        $this->view->n_role = $n_role;
        $this->view->n_company = $n_company;
        $this->view->c_product = $c_product;
        $this->view->n_country = $n_country;
        $this->view->d_date = $d_date;

        $this->view->arrtrsurvcat = $this->beranda_serv->arrtrsurvcat();
        $this->view->arrtrsurvsubcat = $this->beranda_serv->arrtrsurvsubcat();
        $this->view->arrtrsurvquest = $this->beranda_serv->arrtrsurvquest();
        $this->view->aircraft = $this->beranda_serv->arrtmaircraft();
    }

    public function simpansurveyAction() {
        $n_name = $_POST['n_name'];
        $n_rank = $_POST['n_rank'];
        $n_role = $_POST['n_role'];
        $n_company = $_POST['n_company'];
        $c_product = $_POST['c_product'];
        $n_country = $_POST['n_country'];
        $c_productFix = implode("-", $c_product);
        $d_date = $_POST['d_date'];
        $jmldata = $_POST['jmldata'];
        $comment = $_POST['comment'];

        for ($z = 0; $z < $jmldata; $z++) {
            $idquest = 'idquest_' . $z;
            $idquestion[] = $_POST[$idquest];

            $i_survcat = 'i_survcat_' . $z;
            $i_survcategori[] = $_POST[$i_survcat];

            $idrespon = 'respon_' . $z;
            $respon[] = $_POST[$idrespon];
        }



        for ($z1 = 0; $z1 < count($comment); $z1++) {
            $i_survcat2 = 'i_survcat2_' . $z1;
            $i_survcat2arr[] = $_POST[$i_survcat2];
        }

        $masukan = array(
            'n_name' => $n_name,
            'n_rank' => $n_rank,
            'n_company' => $n_company,
            'n_country' => $n_country,
            'n_role' => $n_role,
            'c_product' => $c_productFix,
            'jmldata' => $jmldata,
            'idquestion' => $idquestion,
            'i_survcategori' => $i_survcategori,
            'comment' => $comment,
            'i_survcat2' => $i_survcat2arr,
            'respon' => $respon
        );
        $this->view->hasil = $this->beranda_serv->simpasurvey($masukan);
    }

}

?>