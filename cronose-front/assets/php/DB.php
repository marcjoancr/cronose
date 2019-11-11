<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Connection.php';

require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

class DB {
  
  public static function selectUserByUsername($username) {
    global $config;
    $connection = Connection::make($config);
    $statement = $connection->prepare("select username, password from User where username = '$username'");
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function registerUser($user) {
    global $config;
    $connection = Connection::make($config);
    $statement = $connection->prepare(""); // Insert into database
    $statement->execute();
    return $statement->fetchAll();
  }

}
