<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/DB.php';

class Model {

  protected $model;
  protected $schema;
  private static $DB;

  public function __construct() {
    $this->model = str_replace('Model', '', get_called_class());
    self::$DB = DB::connect();
  }

  public static function getAll() {
    $sql = 'select * from '.str_replace('Model', '', get_called_class());
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public function save() {
    $keys = implode(", ", array_keys($this->schema));
    $values = implode("', '", $this->schema);
    $sql = "INSERT INTO ".$this->model."(".$keys.") VALUES ('".$values."')";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    echo $sql;
    return $statement;
  }

  public function getById($id) {

  }

  public function updateById($id, $body) {

  }

  public function deleteById($id) {

  }

}
