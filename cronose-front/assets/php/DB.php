<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Connection.php';

require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

class DB {

  public static function connect() {
    global $config;
    return Connection::make($config);
  }

  public static function query($sql, $execute = []) {
    $connection = self::connect();
    $statement = $connection->prepare($sql);
    $statement->execute($execute);
    return $statement;
  }

  public static function getUserByID($id) {
    $statement = self::query("select username, email, password from User where id = '$id'");
    return $statement->fetchAll();
  }

  public static function getUserByUsername($username) {
    $statement = self::query("select username, email, password from User where username = '$username'");
    return $statement->fetchAll();
  }

  public static function getEmailByUsername($username) {
    $statement = self::query("select email from User where username = '$username'");
    return $statement->fetchAll();
  }

  public static function getOffersByUsername($username) {
    $id = self::getIDByUsername($username)[0]['id'];
    $statement = self::query("select * from offer where User_Id = $id");
    return $statement->fetchAll();
  }

  public static function registerUser($user) {
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
    $execute = [$username, $user->getEmail(), $user->getPassword()];
    self::query($sql, $execute);
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
