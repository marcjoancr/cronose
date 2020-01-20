<?php

require_once 'Model.php';
require_once '../dao/City.dao.php';

class CityModel extends Model {

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

  public static function getByProvinceId($province) {
    return CityDAO::getByProvinceId($province);
  }

  public static function getAll() {
    return CityDAO::getAll();
  }

}