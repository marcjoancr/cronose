<?php

class LanguageController
{

  public function getLang($language){
    $langAvailable = ['en','es','ca'];
    $defaultLang = 'es';

    $lang = in_array($language, $langAvailable) ? $language : $defaultLang;
    return array(
      'data' => [
        'language' => $lang
      ]
    );
  }

}
