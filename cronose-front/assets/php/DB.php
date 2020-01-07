<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/Connection.php';

require $_SERVER['DOCUMENT_ROOT'].'/config.inc.php';

class DB {

  public static function connect() {
    global $config;
    return Connection::make($config);
  }

  public static function query($sql, $execute = []) {
    $connection = self::connect();
    $statement = $connection->prepare($sql);
    $statement->execute($execute);
    return $statement;
  }

  // public static function getUserByID($id) {
  //   $statement = self::query("select name, email, password from User where id = '$id'");
  //   return $statement->fetchAll();
  // }

  // public static function getIDByUsername($username) {
  //   $statement = self::query("select id from User where name = '$username'");
  //   return $statement->fetchAll();
  // }

  public static function getUserByUsername($username) {
    $statement = self::query("select name, email, password from User where name = '$username'");
    return $statement->fetchAll();
  }

  public static function getEmailByUsername($username) {
    $statement = self::query("select email from User where name = '$username'");
    return $statement->fetchAll();
  }

  // public static function getOffersByUsername($username) {
  //   $id = self::getIDByUsername($username)[0]['id'];
  //   $statement = self::query("select * from Offer where User_Id = $id");
  //   return $statement->fetchAll();
  // }

//   public static function getBasicInfoOffersByUsername($username) {
//     $id = self::getIDByUsername($username);
//     $statement = self::query("select Language_Translation.translation,User.name,Offer_Language.title,Offer_Language.description,concat(Media.url,Media.extension) as media
// from Offer,Offer_Language,User,Language,Language_Translation,Media,Load_Media
// where User.dni = Offer.user_dni and Offer.user_dni = Offer_Language.user_dni and Language.id = Offer_Language.language_id
// and Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni
// and Language_Translation.language_id = Language.id and Language_Translation.translation = 'Spanish'
// and Media.id = Load_Media.media_id and Load_Media.user_dni = Offer.user_dni and Load_Media.specialization_id = Offer.specialization_id
// and User.name = '$username'");
//     return $statement->fetchAll();
//   }

//   public static function getAllOffers() {
//     $statement = self::query("select Language_Translation.translation,User.name,Offer_Language.title,Offer_Language.description,Offer.personal_valoration,Offer.valoration_avg,Offer.coin_price
// from Offer,Offer_Language,User,Language,Language_Translation
// where User.dni = Offer.user_dni and Offer.user_dni = Offer_Language.user_dni and Language.id = Offer_Language.language_id
// and Offer.specialization_id = Offer_Language.specialization_id and Offer.user_dni = Offer_Language.user_dni
// and Language_Translation.language_id = Language.id and Language_Translation.translation = 'Spanish'");
//     return $statement->fetchAll();
//   }

  public static function registerUser($user) {
    $username = $user->getUsername();
    if (self::getUserByUsername($username)) return [
        'status' => 'error',
        'error' => '404',
        'message' => 'User already exists'
      ];
    if (self::getEmailByUsername($username)) return [
        'status' => 'error',
        'code' => '404',
        'message' => 'Email already registered'
      ];
    $sql = "INSERT INTO User(username, email, password) VALUES (?, ?, ?)";
    $execute = [$username, $user->getEmail(), $user->getPassword()];
    self::query($sql, $execute);
    if (!self::getUserByUsername($username)) return [
        'status' => 'error',
        'code' => '500',
        'message' => 'Server Error: Something went wrong'
      ];
    return [
      'status' => 'success',
      'message' => 'User registered'
    ];
  }

}
