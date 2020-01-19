<?php

require_once 'DAO.php';

class AchievementDAO extends DAO {

  public static function getAll(){
    $sql = "SELECT * FROM Achievement";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getById($id) {
    $sql = "SELECT * FROM Achievement WHERE id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByName($name) {
    $sql = "SELECT * FROM Achievement_language WHERE name = " . $name . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByIdAndLang($id, $lang) {
    $sql = "SELECT * FROM Achievement_language WHERE language_id = " . $lang . " AND achievement_id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByLang($lang) {
    $sql = "SELECT * FROM Achievement_language WHERE language_id = " . $lang . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getAllByUser($id) {
    $sql = "SELECT * FROM obtain WHERE user_id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getDescription($lang){
    $sql = "SELECT description FROM Achievement_language WHERE language_id = '" . $lang . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}