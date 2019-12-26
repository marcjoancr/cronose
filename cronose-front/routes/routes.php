<?php

  require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Works.controller.php';
  require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';

  Router::get('/home', 'home');

  Router::get('/market', 'market', 'WorkController::getAll()');

  Router::get('/login', 'login');

  Router::get('/register', 'register');

  Router::get('/about-us', 'about-us');

  Router::get('/my-works', 'myWorks', 'WorkController::getMyOffers');

  Router::get('/logout', 'logout');

  Router::get('/chat', 'chat');

  Router::get('/wallet', 'wallet');

  Router::get('/profile', 'profile');

  Router::get('/card', 'card');

  Router::get('/edit-profile', 'editProfile');

  Router::get('/new-work', 'newWork');

  Router::get('/work', 'work');

  Router::get('/preview-work', 'previewWork');

  Router::get('/published', 'published');

  Router::get('/language/:lang', 'language', 'LanguageController::getLang($lang)');



