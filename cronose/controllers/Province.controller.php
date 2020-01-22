<?php

require_once '../models/Province.model.php';

class ProvinceController {

  public static function getAll() {
  	$cities = ProvinceModel::getAll();
    return $cities;
  }

  public static function getById($id) {
    return ProvinceModel::getById($id);
  }

}