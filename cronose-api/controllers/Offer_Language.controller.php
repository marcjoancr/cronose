<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Offer_Language.model.php';

class Offer_LanguageController
{
  public static function getAllOffers() {
    return Offer_LanguageModel::getAll();
  }
}
