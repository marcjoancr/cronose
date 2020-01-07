<?php

class LanguageController {

  static $langAvailable = ['en','es','ca'];
  static $defaultLang = 'es';

  public function getLang(){
    $clientLang = $_SESSION['lang'] ?? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $lang = in_array($clientLang, self::$langAvailable) ? $clientLang : self::$defaultLang;
    self::setLang($lang);
    return array(
      'data' => [
        'language' => $lang
      ]
    );

  }

  public function setLang($language){
    $lang = in_array($language, self::$langAvailable) ? $language : self::$defaultLang;
    $_SESSION['lang'] = $lang;
  }

  public function langExist($language){
    if( in_array($language, self::$langAvailable) ) return true;
    return false;
  }

}
