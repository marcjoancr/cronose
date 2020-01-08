<?php

require_once 'Model.php';

class UserModel extends Model {



  public static function modelValidation($body) {
    return true;
  }

  public static function getById($dni) {
    return self::getUsernameByDNI($dni);
  }

  public static function getUserByName($name) {
    $sql = "SELECT * FROM User WHERE name = '" . $name . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getUsernameByDNI($dni) {
    $sql = "SELECT name FROM User WHERE dni = '" . $dni . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }

  public static function getUserByUsername($username) {
    $sql = "SELECT name FROM User WHERE name = '" . $username . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }

}
