<?php

require_once 'DAO.php';

class CityDAO extends DAO {

  public static function getAll(){
    $sql = "SELECT * FROM City";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByProvinceId($province) {
    $sql = "SELECT * FROM City WHERE City.province_id = ${province}";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getById($id) {
    $sql = "SELECT * FROM City WHERE City.cp = ${id}";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}