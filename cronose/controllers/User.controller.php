<?php

require_once '../models/User.model.php';

class UserController {

  public static function getProfileInfo($username) {
    return json_encode(UserModel::getUserByUsername($username));
  }

  public static function isValid($username, $password) {
    $user = UserModel::getUserByUsername($username);
    if (!$user) return false;
    if ($user['password'] != $password) return false;
    $_SESSION['user'] = json_encode($user);
    return true;
  }

  public static function userLogin($username, $password) {
    return (self::isValid($username, $password)) ? true : false;
  }

  public static function userLogout() {
    $_SESSION['user'] = null;
  }

}

?>
