<?php

require_once 'Model.php';

class OfferModel extends Model
{

  public function __construct($user_dni, $specialization_id, $valoration_avg, $personal_valoration, $coin_price, $visibility) {
    $this->schema = array(
      'user_dni' => $user_dni,
      'specialization_id' => $specialization_id,
      'valoration_avg' => $valoration_avg,
      'personal_valoration' => $personal_valoration,
      'coin_price' => $coin_price,
      'visibility' => $visibility
    );
    parent::__construct();
  }
  public function modelValidation($body) {
    $body = json_decode($body);
    return true;
  }

  // public static function getAllOffers() {
  //   $sql = "select Language_Translation.translation,User.name,Offer_Language.title,Offer_Language.description,Offer.personal_valoration,Offer.valoration_avg,Offer.coin_price from Offer,Offer_Language,User,Language,Language_Translation where User.dni = Offer.user_dni and Offer.user_dni = Offer_Language.user_dni and Language.id = Offer_Language.language_id and Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni and Language_Translation.language_id = Language.id and Language_Translation.translation = 'Español'";
  //   $statement = self::$DB->prepare($sql);
  //   $statement->execute();
  //   return $statement->fetchAll() || [];
  // }


//   public static function getOffersByUsername($username) {
//     $statement = self::query("select Language_Translation.translation,User.name,Offer_Language.title,Offer_Language.description,concat(Media.url,Media.extension) as media
// from Offer,Offer_Language,User,Language,Language_Translation,Media,Load_Media
// where User.dni = Offer.user_dni and Offer.user_dni = Offer_Language.user_dni and Language.id = Offer_Language.language_id
// and Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni
// and Language_Translation.language_id = Language.id and Language_Translation.translation = 'Spanish'
// and Media.id = Load_Media.media_id and Load_Media.user_dni = Offer.user_dni and Load_Media.specialization_id = Offer.specialization_id
// and User.name = '$username'");
//     return $statement->fetchAll();
//   }

}
