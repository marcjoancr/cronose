<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Offer.model.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Offer_Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/User.controller.php';

class OfferController {

  public static function getAllOffers() {
    $offers = OfferModel::getAllOffers();
    return $offers;
  }

  public static function getOffersByLang($lang) {
    if (!LanguageController::langExist($lang)) return null;
    $offers = OfferModel::getOffersByLang($lang);
    return $offers;
  }

  public static function getOffersFromUsername($username) {
    $user = UserController::getUserByUsername($username);
    if (!$user) return null;
    $offers = self::getAllOffers();
    $result = array_filter($offers, function ($offer) use ($user) {
      if ($offer['user_dni'] == $user['dni']) return true;
    });
    return $result;
  }

}
