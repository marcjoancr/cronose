<?php

require_once '../models/User.model.php';

class UserController {

  public static function getProfileInfo($username) {
    $profile = UserModel::getUserByUsername($username);
    $achievement = AchievementController::getAllByUser($profile['dni']);
    if ($profile) return [
      "status" => "success",
      "profile" => $profile,
      "achievement" => $achievement
    ];
    else return [
      "status" => "error",
      "msg" => "That profile doesn't exists!"
    ];
  }

  public static function getUserByInitialsAndTag($initials, $tag) {
    $profile = UserModel::getUserByInitialsAndTag($initials, $tag);
    // $achievement = AchievementController::getAllByUser($profile['dni']);
    if ($profile) return [
      "status" => "success",
      "profile" => $profile,
      // "achievement" => $achievement
    ];
    else return [
      "status" => "error",
      "msg" => "That profile doesn't exists!"
    ];
  }

  public static function getUsersByInitials($initials) {
    $users = UserModel::getUsersByInitials($initials);
    if ($users) return [
      "status" => "success",
      "profile" => $users
    ];
    else return [
      "status" => "error",
      "msg" => "That profile doesn't exists!"
    ];
  }


  public static function register($user) {
    $profile = UserModel::saveUser($user);
    if ($profile) return [
      "status" => "success",
      "profile" => $profile
    ];
    else return [
      "status" => "error",
      "msg" => "Something went wrong!"
    ];
  }

  public static function isValid($username, $password) {
    $user = UserModel::getUserByUsername($username);
    if (!$user) return false;
    if ($user['password'] != $password) return false;
    $_SESSION['user'] = json_encode($user);
    return true;
  }

  public static function userLogin($username, $password) {
    $response = self::isValid($username, $password);
    if ($response) return [
      "status" => "success",
      "msg" => "Successfully logged!"
    ];
    else return [
      "status" => "error",
      "msg" => "Something go wrong!"
    ];
  }

  public static function userLogout() {
    $_SESSION['user'] = null;
  }

  public static function getAllDirections() {
    $directions = UserModel::getAllDirections();
    return $directions;
  }

}

?>
