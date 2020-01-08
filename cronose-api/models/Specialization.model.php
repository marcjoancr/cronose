<?php

require_once 'Model.php';

class SpecializationModel extends Model
{

  public function __construct($specialization_id,$category_id) {
    $this->schema = array(
      'specialization_id' => $specialization_id,
      'category_id' => $category_id
    );
    parent::__construct();
  }

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

  public static function getAll() {
    $sql = "SELECT * FROM Specialization";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    var_dump($statement);
    return $statement->fetchAll();
  }

  public static function getAllByLanguage($language) {
    $sql = "SELECT * FROM Specialization_Language WHERE language_id = ".$language."";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getById($specialization_id) {
    $sql = "SELECT * FROM  Specialization WHERE id = '" . $specialization_id . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getByCategoryId($category_id) {
    $sql = "SELECT * FROM  Specialization WHERE category_id = '" . $category_id . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

}
