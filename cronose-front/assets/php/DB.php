<?php

require 'Connection.php';

include __DIR__.'/../../config.inc.php';

class DB {
  
  public static function selectUserByUsername($username) {
    global $config;
    $connection = Connection::make($config);
    $statement = $connection->prepare("select username, password from User where username = '$username'");
    $statement->execute();
    return $statement->fetchAll();
  }

}
