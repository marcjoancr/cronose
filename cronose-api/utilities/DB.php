<?php

require_once '/cronose-api/utilities/Connection.php';
require_once '/cronose-api/utilities/config.inc.php';

class DB {
  public static function connect() {
    global $config;
    return Connection::make($config);
  }
}