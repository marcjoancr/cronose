<?php

require_once '../models/City.model.php';

class CityController {

  public static function getAll() {
  	$cities = CityModel::getAll();
    return $cities;
  }

  public static function getByProvinceId($province) {
    return CityModel::getByProvinceId($province);
  }

}