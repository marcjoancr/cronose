<?php

require_once 'Model.php';

class LanguageModel extends Model
{

  public function __construct($id) {
    $this->schema = array(
      'id' => $id
    );
    parent::__construct();
  }

  public static function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

}
