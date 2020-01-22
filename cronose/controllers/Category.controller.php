<?php

require_once '../models/Category.model.php';

class CategoryController {

  public static function getAll() {
  	$categories = CategoryModel::getAll();
    return $categories;
  }

  public static function getAllByLang($lang) {
  	$categories = CategoryModel::getAllByLang($lang);
    return $categories;
  }

  public static function getCountSpecialization($lang) {
    $categories = CategoryModel::getCountSpecialization($lang);
    if ($categories) return [
      "status" => "success",
      "offers" => $categories
    ];
    else return [
      "status" => "error",
      "msg" => "Something went wrong!"
    ];
  }

}
