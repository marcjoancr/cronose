<?php

class Connection {
  public static function make($config) {
    try {
      return new PDO('mysql:dbname='. $config['database']['name']
                    .';host='.$config['database']['host'].';charset=utf8',
                    $config['database']['username'],
                    $config['database']['password']
                  );
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}