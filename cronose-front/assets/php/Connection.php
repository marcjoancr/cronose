<?php

class Connection {

  public static function make() {
    try {
      return new PDO('mysql:dbname=LOGIN;host=127.0.0.1', 'admin', 'cronose');
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
