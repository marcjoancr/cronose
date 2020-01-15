<?php

require_once 'Model.php';
require_once '../dao/Achievement.dao.php';

class AchievementModel extends Model {

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

  public static function getAll() {
    return AchievementDAO::getAll();
  }

  public static function getById($id) {
    return AchievementDAO::getById($id);
  }

  public static function getByName($name) {
    return AchievementDAO::getByName($name);
  }

  public static function getByIdAndLang($id, $lang) {
    return AchievementDAO::getByIdAndLang($id, $lang);
  }

  public static function getByLang($lang) {
    return AchievementDAO::getByLang($lang);
  }

  public static function getAllByUser($id) {
    return AchievementDAO::getAllByUser($id);
  }
}
