<?php
include_once 'Db.php';

/**
 * Created by PhpStorm.
 * User: Vladimir
 * Date: 17.09.2017
 * Time: 14:29
 */
class Comment
{
    /*
        внесение данных таблицу 'comment'
        */
    public function insertUser($fio, $email, $id_region, $id_district, $id_city)
    {
        $pdo = Db::getInstance()->get_pdo();
        $sql = "INSERT INTO user
          SET
          `fio` = '{$fio}',
          `email` = '{$email}',
          `id_region` = '{$id_region}',
          `id_district` = '{$id_district}',
          `city` = '{$id_city}'";
        $rs = $pdo->query($sql);
        return $rs;
    }

  
    public function chekUser($email)
    {
        $pdo = Db::getInstance()->get_pdo();
        $sql = "SELECT * FROM `user` WHERE `email` = '" . $email."'";

        $rs = $pdo->prepare($sql);
        $rs->execute();

        return $rs->fetchall(PDO::FETCH_ASSOC);

    }

    public function getRegion(){
        $pdo = Db::getInstance()->get_pdo();
        $sql = "SELECT * FROM `t_koatuu_tree` WHERE `ter_type_id` = '0'";
        $rs = $pdo->prepare($sql);
        $rs->execute();
        return $rs->fetchall(PDO::FETCH_ASSOC);
    }

    public function getCityFromBd($id_region){
        $pdo = Db::getInstance()->get_pdo();
        $sql = "SELECT * FROM `t_koatuu_tree` WHERE `ter_type_id` = '1' AND `reg_id` =" . $id_region;

        $rs = $pdo->prepare($sql);
        $rs->execute();

        return $rs->fetchall(PDO::FETCH_ASSOC);
    }

    public function getDistrictFromBd($id_city){
        $pdo = Db::getInstance()->get_pdo();
        $sql = "SELECT * FROM `t_koatuu_tree` WHERE `ter_id` =" . $id_city;

        $rs = $pdo->prepare($sql);
        $rs->execute();
        
        return $rs->fetchall(PDO::FETCH_ASSOC);
    }
}