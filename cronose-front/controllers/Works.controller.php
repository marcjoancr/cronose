<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Works.model.php';
require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';

class WorkController
{
  public function getAll() {
    return array(
      'offers' => WorkModel::getAllOffers()
    );
  }

  public function getMyOffers() {
    $username = $_SESSION['user']->getUsername();
    return array(
      'offers' => WorkModel::getOffersByUsername($username)
    );
  }
}
