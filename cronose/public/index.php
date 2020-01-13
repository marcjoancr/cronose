<?php
session_start();
require_once '../utilities/Logger.php';
require_once '../controllers/Language.controller.php';
require_once '../controllers/Offer.controller.php';
require_once '../controllers/User.controller.php';
require_once '../controllers/Chat.controller.php';
require_once '../controllers/Achievement.controller.php';
require_once '../controllers/Category.controller.php';
require_once '../dao/DAO.php';
new DAO();

//Lang
require '../views/components/language.php';

//URI
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$auxUri = $uri;
array_splice($auxUri, 0, 1);
$auxUriString = implode("/", $auxUri);

/*-------Language-------*/
$langController = LanguageController::getLang();
$displayLang = $langController['language'];

//Method
$method = strtolower($_SERVER['REQUEST_METHOD']);

/*-----User logged------*/
if (isset($_SESSION['user'])) $user = json_decode($_SESSION['user']);
if ($uri[0] == 'api') {

  switch ($uri[1]) {

    case 'categories':
      echo json_encode(CategoryController::getAllByLang($displayLang));
      break;

    case 'register':
      if ($method == 'post') {
        echo json_encode(UserController::register($_POST['user']));
      }
      break;

    case 'login':
      if ($method == 'post') {
        echo json_encode(UserController::userLogin($_POST['username'], $_POST['password']), JSON_PRETTY_PRINT);
      }
      break;

    case 'profile':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(UserController::getProfileInfo($user->name));
        if (count($uri) == 3) echo json_encode(UserController::getProfileInfo($uri[2]));
      }
      break;

    case 'works':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(OfferController::getOffersByLang($_SESSION['displayLang']));
      }
      break;

    case 'myWorks':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(OfferController::getOffersFromUsername($user->name));
      }
      break;

    case 'directions':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(UserController::getAllDirections());
      }

    case 'chat':
      if (count($uri) == 3 && $uri[2] == 'send' && $method == 'post') ChatController::sendMSG($_POST['sender'], $_POST['reciver'], $_POST['msg']);
      if (count($uri) == 3 && $method == 'get'){
        $reciver = UserController::getProfileInfo($uri[2]);
        if ($reciver) {
          echo json_encode(ChatController::showChat($user->dni, $reciver['profile']['dni']));
        };
      };
      if (count($uri) == 4 && $uri[3] == 'send' && $method == 'post') ChatController::sendMSG($_POST['sender'], $_POST['reciver'], $_POST['msg']);
      break;

    default:
      echo "Nothing";
      break;

  }

} else if ($uri[0] != 'assets') {

  if (!LanguageController::langExist($uri[0])) {
    array_unshift($uri, $displayLang);
    $uriString = implode("/", $uri);
    header('Location: ' . $uriString);
  } else if($displayLang != $uri[0]) {
    $displayLang = $uri[0];
    $_SESSION['displayLang'] = $displayLang;
  }
  /*----------------------*/

  $title = "Cronose";

  switch ($uri[1]){
    case '':
      header('Location: ' . $displayLang . '/home');
      break;

    case 'login':
      $title = "Cronose - " . $lang[$displayLang]['logIn'];
      include '../views/login.php';
      break;

    case 'register':
      $title = "Cronose - " . $lang[$displayLang]['register'];
      include '../views/register.php';
      break;

    case 'logout':
      UserController::userLogout();
      header('Location: ' . $displayLang . '/home');
      break;

    case 'home':
      $title = "Cronose";
      include '../views/home.php';
      break;

    case 'market':
      $title = "Cronose - " . $lang[$displayLang]['market'];
      $offers = OfferController::getOffersByLang($displayLang);
      include '../views/market.php';
      break;

    case 'about-us':
      $title = "Cronose - " . $lang[$displayLang]['aboutUs'];
      include '../views/about-us.php';
      break;

    case 'my-works':
      $title = "Cronose - " . $lang[$displayLang]['myOffers'];
      // $dataController = WorkController::getMyOffers();
      include '../views/myWorks.php';
      break;

    case 'chat':
      $title = "Cronose - " . $lang[$displayLang]['chat'];
      if (count($uri) == 3) {
        $reciver = json_encode(UserController::getProfileInfo($uri[2]));
        if ($reciver) {
          include '../views/chat.php';
        } else {
          include '../views/404.php';
        }
      } else {
        include '../views/home.php';
      }
      // include '../views/chat.php';
      break;

    case 'wallet':
      $title = "Cronose - " . $lang[$displayLang]['wallet'];
      include '../views/wallet.php';
      break;

    case 'profile':
      $title = "Cronose - " . $lang[$displayLang]['profile'];
      include '../views/profile.php';
      break;

    case 'card':
      include '../views/card.php';
      break;

    case 'edit-profile':
      include '../views/editProfile.php';
      break;

    case 'new-work':
      include '../views/newWork.php';
      break;

    case 'work':
      $title = "Cronose - " . $lang[$displayLang]['work'];
      include '../views/work.php';
      break;

    case 'preview-work':
      include '../views/previewWork.php';
      break;

    case 'published':
      include '../views/published.php';
      break;

    /*---------RAMIREZ----------*/
    case 'datatable':
      if ($uri[2] == 'province') {
        include '../views/datatables/province.php';
      };
      if ($uri[2] == 'category') {
        include '../views/datatables/category.php';
      };
      if ($uri[2] == 'company') {
        include '../views/datatables/company.php';
      };
      break;
    /*--------------------------*/

    default:
      header('Location: ' . $displayLang . '/home');
      break;
  }
}

?>
