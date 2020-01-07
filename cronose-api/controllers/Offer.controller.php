<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/models/Offer.model.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Offer_Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/User.controller.php';
// require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';

class OfferController
{
  public static function getAllOffers() {
    $offers = OfferModel::getAll();
    $offersLanguages = Offer_LanguageController::getAllOffers();
    // $langs = LanguageController::getAllLangs();
    $users = UserController::getAllUsers();
    foreach ($offers as $offer) {
      foreach ($offersLanguages as $offerLanguage) {
        if ($offer['user_dni'] == $offerLanguage['user_dni'] && $offer['specialization_id'] == $offerLanguage['specialization_id']) {
          $result[] = $offer + $offerLanguage + ['user' => UserController::getUsernameByDNI($offer['user_dni'])];
        }
      }
    }
    return $result;
  }

  // public function getMyOffers() {
  //   $username = $_SESSION['user']->getUsername();
  //   return array(
  //     'offers' => WorkModel::getOffersByUsername($username)
  //   );
  // }
}
