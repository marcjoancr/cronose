<?php

require_once '../models/Offer.model.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Offer_Language.controller.php';
require_once '../controllers/User.controller.php';

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

  public static function getOffersByDNIAndLang($dni, $lang) {
    $offers = OfferModel::getOffersByDNIAndLang($dni, $lang);
    if ($offers) return [
      "status" => "success",
      "offers" => $offers
    ];
    else return [
      "status" => "error",
      "msg" => "Something went wrong!"
    ];
  }

  public static function getOffer($offerLang,$offerEsp,$offerId) {
    $offer = OfferModel::getOffer($offerLang,$offerEsp,$offerId);
    if ($offer) return [
      "status" => "success",
      "offers" => $offer
    ];
    else return [
      "status" => "error",
      "msg" => "Something went wrong!"
    ];
  }

}
