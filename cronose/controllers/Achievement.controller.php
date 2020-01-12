<?php

require_once '../models/Achievement.model.php';

class AchievementController {

  public static function getAll() {
  	$achievements = AchievementModel::getAll();
    return $achievements;
  }

  public static function getAllByLang($lang) {
  	$achievements = AchievementModel::getAll();
    return $achievements;
  }

  public static function getAllByUser($dni) {
  	$achievements = AchievementModel::getAllByUser($dni);
    return $achievements;
  }

}