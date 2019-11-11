<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Connection.php';

require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

class DB {

  private static function connect() {
    global $config;
    return Connection::make($config);
  }
  
  public static function getUserByUsername($username) {
    $connection = self::connect();
    $statement = $connection->prepare("select username, password from User where username = '$username'");
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function getEmailByUsername($username) {
    $connection = self::connect();
    $statement = $connection->prepare("select email from User where username = '$username'");
    $statement->execute();
    return $statement->fetchAll();
  }

  public static function registerUser($user) {
    $connection = self::connect();
    $username = $user->getUsername();
    if (self::getUserByUsername($username)) return [
        'status' => 'error',
        'error' => '404', 
        'message' => 'User already exists'
      ];
    if (self::getEmailByUsername($username)) return [
        'status' => 'error',
        'code' => '404', 
        'message' => 'Email already registered'
      ];
    $sql = "INSERT INTO User(username, email, password) VALUES (?, ?, ?)";
    $statement = $connection->prepare($sql); // Insert into database
    $statement->execute([$username, $user->getEmail(), $user->getPassword()]);
    $statement->fetchAll();
    if (!self::getUserByUsername($username)) return [
        'status' => 'error',
        'code' => '500',
        'message' => 'Server Error: Something went wrong'
      ];
    return [
      'status' => 'success', 
      'message' => 'User registered'
    ];
  }

}
