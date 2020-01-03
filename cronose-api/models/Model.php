<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/Logger.php';

class Model {

  protected $model;
  protected $schema;
  private static $DB;

  public function __construct() {
    $this->model = str_replace('Model', '', get_called_class());
    self::$DB = DB::connect();
  }

  public static function getAll() {
    $model = str_replace('Model', '', get_called_class());
    $sql = "SELECT * FROM " . $model;
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll();
  }

  public function save() {
    $keys = implode(", ", array_keys($this->schema));
    $values = implode("', '", $this->schema);
    $sql = "INSERT INTO " . $this->model . "(" . $keys . ") VALUES ('" . $values . "')";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    Logger::log("INFO", "New " . $this->model . " saved.");
    return $statement;
  }

  public function getById($id) {

  }

  public function updateById($id, $body) {

  }

  public function deleteById($id) {
    $sql = "DELETE FROM " . $this->model . " WHERE id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    Logger::log("WARNING", "Deleted " . $this->model . " with id = " . $id);
    return $statement;
  }

}
