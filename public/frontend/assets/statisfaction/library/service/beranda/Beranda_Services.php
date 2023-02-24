<?php

class Beranda_Services {

    private static $instance;

    // A private constructor; prevents direct creation of object
    private function __construct() {
        //  echo 'I am constructed';
    }

    // The singleton method
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }

    public function arrjmlquest($id) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM trsurvquest where i_survcat = '$id' order by i_survquest";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function arrtrsurvcat() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM trsurvcat order by i_survcat";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function arrtrsurvsubcat() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM trsurvsubcat order by i_survcat";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function arrtrsurvquest() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM trsurvquest order by i_survquest";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function arrtrsurvrespon($id) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM trsurvrespon where i_survquest = $id order by i_survquest";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function arrtmaircraft() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->setFetchMode(Zend_Db::FETCH_OBJ);
            $sql = "SELECT * FROM tmaircraft ";
            $result = $db->fetchAll($sql);
            return $result;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function simpasurvey($masukan) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('dbhelpdesk');
        try {
            $db->beginTransaction();
            $sql1 = "SELECT max(i_survidentity) as jml FROM trsurvidentity";
            $arrjmlidentity = $db->fetchOne($sql1);

            $ididentity = $arrjmlidentity + 1;

            $n_name = $masukan['n_name'];
            $n_rank = $masukan['n_rank'];
            $n_role = $masukan['n_role'];
            $n_company = $masukan['n_company'];
            $c_product = $masukan['c_product'];
            $n_country = $masukan['n_country'];
            $d_date = $masukan['d_date'];
            $jmldata = $masukan['jmldata'];
            $comment = $masukan['comment'];
            $idquestion = $masukan['idquestion'];
            $i_survcategori = $masukan['i_survcategori'];
            $respon = $masukan['respon'];
            $i_survcat2 = $masukan['i_survcat2'];


            $datainput = array(
                'i_survidentity' => $ididentity,
                'n_name' => $n_name,
                'n_rank' => $n_rank,
                'n_company' => $n_company,
                'n_country' => $n_country,
                'n_role' => $n_role,
                'n_product' => $c_product
            );

            $db->insert('trsurvidentity', $datainput);

            for ($z = 0; $z < $jmldata; $z++) {
                $sql2 = "SELECT max(i_survey) as jml FROM tmsurvey";
                $arrjmlrespon = $db->fetchOne($sql2);

                $idRespon = $arrjmlrespon + 1;
                $i_question = $idquestion[$z];
                $survcategori = $i_survcategori[$z];
                $i_respon = $respon[$z];

                $datainput2 = array(
                    'i_survidentity' => $ididentity,
                    'i_survey' => $idRespon,
                    'i_survquest' => $i_question,
                    'i_survcat' => $survcategori,
                    'i_survrespon' => $i_respon,
                    'd_entry' => new Zend_Db_Expr('NOW()')
                );

                $db->insert('tmsurvey', $datainput2);
            }

            for ($z1 = 0; $z1 < count($comment); $z1++) {
                $sql3 = "SELECT max(i_comment) as jml FROM tmcomment";
                $arrjmlcomment = $db->fetchOne($sql3);

                $idComment = $arrjmlcomment + 1;
                $n_comment = $comment[$z1];

                $datainput3 = array(
                    'i_comment' => $idComment,
                    'i_survidentity' => $ididentity,
                    'i_survcat' => $i_survcat2[$z1],
                    'n_comment' => $n_comment,
                    'd_entry' => new Zend_Db_Expr('NOW()')
                );

                $db->insert('tmcomment', $datainput3);
            }

            $db->commit();

            return 'Success! Submit Your Survey. Thanks you';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'Error!';
        }
    }

}

?>