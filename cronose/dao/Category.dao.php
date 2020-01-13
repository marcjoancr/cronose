<?php

require_once 'DAO.php';

class CategoryDAO extends DAO {

  public static function getAll(){
    $sql = "SELECT Category.id, Category_Language.name, Category_Language.language_id, Category.coin_price FROM Category, Category_Language 
              WHERE Category.id = Category_Language.category_id";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getById($id) {
    $sql = "SELECT Category.id, Category_Language.name, Category_Language.language_id, Category.coin_price FROM Category, Category_Language 
              WHERE Category.id = Category_Language.category_id AND Category.id = ${id}";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByName($name) {
    $sql = "SELECT Category.id, Category_Language.name, Category_Language.language_id, Category.coin_price FROM Category, Category_Language 
              WHERE Category.id = Category_Language.category_id AND Category_Language.name = '${name}'";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getByIdAndLang($id, $lang) {
    $sql = "SELECT Category.id, Category_Language.name, Category_Language.language_id, Category.coin_price FROM Category, Category_Language 
              WHERE Category.id = Category_Language.category_id AND Category_Language.language_id = '${lang}' AND Category.id = ${id}";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function getAllByLang($lang) {
    $sql = "SELECT Category.id, Category_Language.name, Category_Language.language_id, Category.coin_price FROM Category, Category_Language 
              WHERE Category.id = Category_Language.category_id AND Category_Language.language_id = '${lang}'";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

}