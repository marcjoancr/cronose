<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Works.model.php';

class WorkController
{
  public function getAll() {
    return array(
      'data' => [
        'offers' => WorkModel::getAllOffers()
      ]
    );
  }
}
