<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/User.model.php';

class UserController {

  public static function getAllUsers() {
    return UserModel::getAll();
  }

  public static function create($body) {
    if (!UserModel::UserValidation($body)) return null;
    $body = json_decode($body);
    $model = new UserModel($body['dni'], $body['name'], $body['surname'], $body['surname_2'], $body['email'], $body['password'], $body['tag'], $body['coins'], $body['registration_date'], $body['points'], $body['private'], $body['city_cp'], $body['province_id'], $body['avatar_id'], $body['dni_photo_id']);
    return $model->save();
  }

  public static function updateUserById($id) {
    if (!UserModel::modelValidation($body)) return null;
    return UserModel::updateById($id, $body);
  }

  public static function getUserById($id) {
    return UserModel::getById($id);
  }

  public static function deleteUserById($id) {
    return UserModel::deleteById($id);
  }

  public static function getUsernameByDNI($dni) {
    return UserModel::getUsernameByDNI($dni);
  }

  public static function getUserByUsername($username) {
    return UserModel::getUserByUsername($username);
  }

}

?>
