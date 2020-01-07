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

  public function modelValidation($body) {
    return true;
  }

}
