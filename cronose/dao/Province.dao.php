<?php

require_once 'DAO.php';

class ProvinceDAO extends DAO {

  public static function getAll(){
    $sql = "SELECT Province.id, Province.name FROM Province";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getById($id) {
    $sql = "SELECT Province.id, Province.name FROM Province WHERE Province.id = ${id}";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}