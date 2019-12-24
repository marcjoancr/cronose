<?php
require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

class Model
{

  public static function make($config) {
    try {
      return new PDO('mysql:dbname='. $config['database']['name']
                    .';host='.$config['database']['host'],
                    $config['database']['username'],
                    $config['database']['password']
                  );
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function connect() {
    global $config;
    return self::make($config);
  }

  public static function query($sql, $execute = []) {
    $connection = self::connect();
    $statement = $connection->prepare($sql);
    $statement->execute($execute);
    return $statement;
  }

}
