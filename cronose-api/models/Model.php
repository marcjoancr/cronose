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
    $sql = "SELECT FROM " . $this->model . " WHERE id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement;
  }

  public function updateById($id, $body) {
    $body = json_decode($body, true);
    
    if ( !self::getById($id) ) return Logger::log("ERROR", "No " . $this->model . " with id = " . $id);

    $updatedSchema = array_merge($this->schema, $body);

    $sql = "UPDATE " . $this->model . " SET ";
    $lastKey = array_key_last ($updatedSchema);

    foreach ($updatedSchema as $key => $value) {
      $sql = $sql . $key . " = '" . $value . "'";

      if( $lastKey !== $key ) $sql = $sql . ",";

    }

    $sql = $sql . " WHERE id = " . $id . ";";

    echo $sql;

    $statement = self::$DB->prepare($sql);
    $statement->execute();
    if($statement->fetch(PDO::FETCH_ASSOC) < 0){
        Logger::log("INFO", "Updated " . $this->model . " with id = " . $id);
        return $statement;
      } else {
        Logger::log("ERROR", "This " . $this->model . " already exists.");
        return null;
      }
    return $statement;
  }

  public function deleteById($id) {
    $sql = "DELETE FROM " . $this->model . " WHERE id = " . $id . ";";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    Logger::log("WARNING", "Deleted " . $this->model . " with id = " . $id);
    return $statement;
  }

}
