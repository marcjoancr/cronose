<?php

	require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Language.controller.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Works.controller.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/controllers/Profile.controller.php';
  require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/User.php';
  //require_once './routes/api.route.php';

  session_start();

  $uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

  $langController = LanguageController::getLang();

  $displayLang = $langController['data']['language'];

  if ( !LanguageController::langExist($uri[0]) ){
  	array_unshift($uri, $displayLang);
  	$uriString = implode("/", $uri);
  	header('Location: ' . $uriString);
  }else{
  	$displayLang = $uri[0];
  }

  $auxUri = $uri;
  array_splice($auxUri, 0, 1);
  $auxUriString = implode("/", $auxUri);


  switch ($uri[1]){

		case '':
			header('Location: ' . $displayLang . '/home');
			break;

		case 'home':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/home.php';
			break;

		case 'market':
      $dataController = WorkController::getAll();
			include $_SERVER['DOCUMENT_ROOT'] . '/views/market.php';
			break;

		case 'login':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/login.php';
			break;

		case 'register':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/register.php';
			break;

		case 'about-us':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/about-us.php';
			break;

		case 'my-works':
      $dataController = WorkController::getMyOffers();
			include $_SERVER['DOCUMENT_ROOT'] . '/views/myWorks.php';
			break;

		case 'logout':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/logout.php';
			break;

		case 'chat':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/chat.php';
			break;

		case 'wallet':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/wallet.php';
			break;

		case 'profile':

			if ( count($uri) == 2 )
				$dataController = ProfileController::getProfile($_SESSION['user']->getUsername());
			else if ( count($uri) == 3 )
				$dataController = ProfileController::getProfile($uri[2]);

			include $_SERVER['DOCUMENT_ROOT'] . '/views/profile.php';
			break;

		case 'card':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/card.php';
			break;

		case 'edit-profile':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/editProfile.php';
			break;

		case 'new-work':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/newWork.php';
			break;

		case 'work':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/work.php';
			break;

		case 'preview-work':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/previewWork.php';
			break;

		case 'published':
			include $_SERVER['DOCUMENT_ROOT'] . '/views/published.php';
			break;

		default:
			header('Location: /home');
			include $_SERVER['DOCUMENT_ROOT'] . '/views/home.php';
			break;
}
