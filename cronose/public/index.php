<?php
session_start();

// Controllers
require_once '../controllers/Language.controller.php';
require_once '../controllers/Offer.controller.php';
require_once '../controllers/User.controller.php';
require_once '../controllers/Chat.controller.php';
require_once '../controllers/Achievement.controller.php';
require_once '../controllers/Category.controller.php';

// DAO
require_once '../dao/DAO.php';
new DAO();

// Logger
require_once '../utilities/Logger.php';

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

      case 'work':
         if ($method == 'get') {
           if (count($uri) == 2) echo json_encode(OfferController::getOffer($uri[4],$uri[3],$uri[2]));
           if (count($uri) == 5) echo json_encode(OfferController::getOffer($uri[4],$uri[3],$uri[2]));
        }
      break;

    case 'myWorks':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(OfferController::getOffersByDNIAndLang($user->dni, $displayLang));
      }
      break;

    case 'directions':
      if ($method == 'get') {
        if (count($uri) == 2) echo json_encode(UserController::getAllDirections());
      }

    case 'chat':
    // var_dump($uri);
      if (count($uri) == 4 && $method == 'get'){
        $sender = UserController::getProfileInfo($uri[2]);
        $reciver = UserController::getProfileInfo($uri[3]);
        if ($reciver) {
          echo json_encode(ChatController::showChat($sender['profile']['dni'], $reciver['profile']['dni']));
        };
      };
      if (count($uri) == 4 && $uri[3] == 'send' && $method == 'post') {
        $reciver = UserController::getProfileInfo($uri[2]);
        if ($reciver) echo ChatController::sendMSG($user->dni, $reciver['profile']['dni'], $_POST['msg']);
      }
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

  switch ($uri[1]){
    case '':
      header('Location: ' . $displayLang . '/home');
      break;

    case 'login':
      $title = $lang[$displayLang]['logIn'];
      include '../views/login.php';
      break;

    case 'register':
      $title = $lang[$displayLang]['register'];
      include '../views/register.php';
      break;

    case 'logout':
      UserController::userLogout();
      header('Location: ' . $displayLang . '/home');
      break;

    case 'home':
      include '../views/home.php';
      break;

    case 'market':
      $title = $lang[$displayLang]['market'];
      $offers = OfferController::getOffersByLang($displayLang);
      include '../views/market.php';
      break;

    case 'about-us':
      $title = $lang[$displayLang]['aboutUs'];
      include '../views/about-us.php';
      break;

    case 'my-works':
      $title = $lang[$displayLang]['myOffers'];
      // $dataController = WorkController::getMyOffers();
      include '../views/myWorks.php';
      break;

    case 'chat':
      $title = $lang[$displayLang]['chat'];
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
      $title = $lang[$displayLang]['wallet'];
      include '../views/wallet.php';
      break;

    case 'profile':
      $title = $lang[$displayLang]['profile'];
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
      $title = $lang[$displayLang]['work'];
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
