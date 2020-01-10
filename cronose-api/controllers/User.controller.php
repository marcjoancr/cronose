<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/User.model.php';

class UserController {

  public static function getProfileInfo($username) {
    return UserModel::getUserByUsername($username);
  }

  public static function isValid($username, $password) {
    $user = UserModel::getUserByUsername($username);
    if (!$user) return false;
    if ($user['password'] != $password) return false;
    return true;
  }

  public static function userLogin($username, $password) {
    if (!self::isValid($username, $password)) return;
    return UserModel::getUserByUsername($username);
  }

}

?>
