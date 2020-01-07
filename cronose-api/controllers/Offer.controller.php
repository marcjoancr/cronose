<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Offer.model.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Offer_Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/User.controller.php';

class OfferController {

  public static function getAllOffers() {
    $offers = OfferModel::getAll();
    $offersLanguages = Offer_LanguageController::getAllOffers();
    $result = [];
    foreach ($offers as $offer) {
      foreach ($offersLanguages as $offerLanguage) {
        if ($offer['user_dni'] == $offerLanguage['user_dni'] && $offer['specialization_id'] == $offerLanguage['specialization_id']) {
          $result[] = $offer + $offerLanguage + ['user' => UserController::getUsernameByDNI($offer['user_dni'])];
        }
      }
    }
    return $result;
  }

  public static function getOffersByLang($lang) {
    if (!LanguageController::langExist($lang)) return null;
    $offers = self::getAllOffers();
    $result = array_filter($offers, function ($offer) use ($lang) {
      if ($offer['language_id'] == $lang) return true;
    });
    return $result;
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