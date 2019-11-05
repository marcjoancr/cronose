<?php

require 'Connection.php';

class DB {

  public static function selectUser($user) {
    $connection = Connection::make();
    $statement = $connection->prepare("select userName,paswd from User where userName = '$user'");
    $statement->execute();
    return $statement->fetchAll();
  }

}
