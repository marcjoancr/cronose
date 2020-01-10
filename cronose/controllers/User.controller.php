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
    $response = (self::isValid($username, $password)) ? array('status'=>'success') : array('status'=>'error');
    return json_encode($response);
  }

  public static function userLogout() {
    $_SESSION['user'] = null;
  }

}

?>
