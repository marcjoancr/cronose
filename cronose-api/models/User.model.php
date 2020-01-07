<?php

require_once 'Model.php';

class UserModel extends Model {

  public function __construct($dni, $name, $surname, $surname_2, $email, $password, $tag, $coins, $registration_date, $points, $private, $city_cp, $province_id, $avatar_id, $dni_photo_id ) {
    $this->schema = array(
      'dni' => $dni,
      'name' => $name,
      'surname' => $surname,
      'surname_2' => $surname_2,
      'email' => $email,
      'password' => $password,
      'tag' => $tag,
      'coins' => $coins,
      'registration_date' => $registration_date,
      'points' => $points,
      'private' => $private,
      'city_cp' => $city_cp,
      'province_id' => $province_id,
      'avatar_id' => $avatar_id,
      'dni_photo_id' => $dni_photo_id
    );
    parent::__construct();
  }

  public static function modelValidation($body) {
    return true;
  }

  public static function getById($dni) {
    return self::getUsernameByDNI($dni);
  }

  public static function getUsernameByDNI($dni) {
    $sql = "SELECT name FROM " . str_replace('Model', '', get_called_class()) . " WHERE dni = '" . $dni . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }
  
  public static function getUserByUsername($username) {
    $sql = "SELECT name FROM " . str_replace('Model', '', get_called_class()) . " WHERE name = '" . $username . "';";
    $statement = self::$DB->prepare($sql);
    $statement->execute();
    return $statement->fetchAll()[0];
  }

}
