<?php

require_once 'DAO.php';

class UserDAO extends DAO {

  public static function getUserByUsername($username) {
    $sql = "SELECT * FROM User WHERE name = '" . $username . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public static function getUserByTag($tag) {
    $sql = "SELECT * FROM User WHERE name = '" . $tag . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

}
