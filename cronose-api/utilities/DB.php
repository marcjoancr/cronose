<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/utilities/config.inc.php';

class DB {
  public static function connect() {
    global $config;
    return Connection::make($config);
  }
}
