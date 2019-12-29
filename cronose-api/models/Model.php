<?php

require_once '/cronose-api/utilities/DB.php';

class Model {

  protected $model;
  protected $schema;
  private $DB;

  public function __construct() {
    $this->model = str_replace('Model', '', get_class($this));
    $this->$DB = DB::connect();
  }

  public function getAll() {
    $statement = $DB->prepare('select * from '.$model);
    $statement->execute();
    return $statement;
  }

  public function create($body) {
    $body = json_decode($body, true);
    $keys = implode(", ", array_keys($body));
    $values = implode(", ", $body);
    $sql = "INSERT INTO".$model."(".$keys.") VALUES (".$values.")";
    $statement = $DB->prepare($sql);
    $statement->execute();
    return $statement;
  }

  public function getById($id) {

  }

  public function updateById($id, $body) {

  }

  public function deleteById($id) {

  }

}