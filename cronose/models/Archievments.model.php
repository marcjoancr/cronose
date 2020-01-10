<?php

require_once 'Model.php';

class ArchievmentsModel {

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

  public static function getAll() {
    $sql = "SELECT * FROM Archievments";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getById($id) {
    $sql = "SELECT * FROM Archievments WHERE id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getByName($name) {
    $sql = "SELECT * FROM Archievments WHERE name = " . $name . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}
