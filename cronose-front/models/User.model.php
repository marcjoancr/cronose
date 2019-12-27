<?php

header("Content-Type: text/html;charset=utf-8");

class UserModel extends Model
{

  public static function getUserProfile($user) {
    $statement = self::query("select * FROM User where User.name = '$user'");
    return $statement->fetchAll();
  }

}