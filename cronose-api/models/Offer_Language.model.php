<?php

require_once 'Model.php';

class Offer_LanguageModel extends Model
{

  public function __construct($language_id, $user_dni, $specialization_id, $title, $description) {
    $this->schema = array(
      'language_id' => $language_id,
      'user_dni' => $user_dni,
      'specialization_id' => $specialization_id,
      'title' => $title,
      'description' => $description
    );
    parent::__construct();
  }

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

}
