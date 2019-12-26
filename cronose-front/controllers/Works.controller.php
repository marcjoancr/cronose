<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Works.model.php';
require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';

class WorkController
{
  public function getAll() {
    return array(
      'data' => [
        'offers' => WorkModel::getAllOffers()
      ]
    );
  }

  public function getMyOffers() {
    session_start();
    $username = $_SESSION['user']->getUsername();
    return array(
      'data' => [
        'offers' => WorkModel::getOffersByUsername($username)
      ]
    );
  }
}
