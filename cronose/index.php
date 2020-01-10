<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Language.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/Offer.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/User.controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/Model.php';
new Model();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Origin");

session_start();
echo $_SESSION['a'];

$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$langController = LanguageController::getLang();
$displayLang = $langController['data']['language'];

if (!LanguageController::langExist($uri[0])) {
  array_unshift($uri, $displayLang);
  $uriString = implode("/", $uri);
  header('Location: ' . $uriString);
} else {
  $displayLang = $uri[0];
}

$auxUri = $uri;
array_splice($auxUri, 0, 1);
$auxUriString = implode("/", $auxUri);
if (!isset($_SESSION['user'])) $_SESSION['user'] = null;

$method = strtolower($_SERVER['REQUEST_METHOD']);
switch ($uri[1]){
  case '':
    header('Location: ' . $displayLang . '/home');
    break;
  case 'home':
    include '/var/www/cronose/cronose-api/views/home.php';
    break;

  case 'market':

    $offers = OfferController::getOffersByLang($displayLang);
    include '/var/www/cronose/cronose-api/views/market.php';
    break;

  case 'login':
    if ($method == 'post') {
      $_SESSION['user'] = UserController::userLogin($_POST['username'], $_POST['password']);
      echo $_SESSION['user'];
    } else {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/login.php';
    }
    break;
  case 'register':
    include $_SERVER['DOCUMENT_ROOT'] . '/views/register.php';
    break;

  case 'about-us':
    include $_SERVER['DOCUMENT_ROOT'] . '/views/about-us.php';
    break;

  case 'my-works':
    // $dataController = WorkController::getMyOffers();
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
      $user = UserController::getProfileInfo($_SESSION['user']->getUsername());
    else if ( count($uri) == 3 )
      $user = UserController::getProfileInfo($uri[2]);
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

  case 'datatable':
    if ($uri[2] == 'province') {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/datatables/province.php';
    };
    if ($uri[2] == 'category') {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/datatables/category.php';
    };
    if ($uri[2] == 'company') {
      include $_SERVER['DOCUMENT_ROOT'] . '/views/datatables/company.php';
    };
    break;

  default:
    header('Location: /home');
    include $_SERVER['DOCUMENT_ROOT'] . '/views/home.php';
    break;
}

?>
