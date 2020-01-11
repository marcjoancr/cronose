<?php
session_start();
require_once '../controllers/Language.controller.php';
require_once '../controllers/Offer.controller.php';
require_once '../controllers/User.controller.php';
require_once '../controllers/Chat.controller.php';
require_once '../dao/DAO.php';
new DAO();

//URI
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));
$auxUri = $uri;
array_splice($auxUri, 0, 1);
$auxUriString = implode("/", $auxUri);

//Method
$method = strtolower($_SERVER['REQUEST_METHOD']);

/*-----User logged------*/
if (isset($_SESSION['user'])) $user = json_decode($_SESSION['user']);

if ($uri[0] == 'api') {
  switch ($uri[1]) {
    case 'chat':
      if (count($uri) == 3 && $uri[2] == 'send' && $method == 'post') ChatController::sendMSG($_POST['sender'], $_POST['reciver'], $_POST['msg']);
      break;

    default:
      echo "Nothing";
      break;
  }
} else {

  /*-------Language-------*/
  $langController = LanguageController::getLang();
  $displayLang = $langController['data']['language'];

  if (!LanguageController::langExist($uri[0])) {
    array_unshift($uri, $displayLang);
    $uriString = implode("/", $uri);
    header('Location: ' . $uriString);
  } else {
    $displayLang = $uri[0];
  }
  /*----------------------*/


  switch ($uri[1]){
    case '':
      header('Location: ' . $displayLang . '/home');
      break;

    case 'login':
      if ($method == 'post') {
        echo UserController::userLogin($_POST['username'], $_POST['password']);
      } else {
        include '../views/login.php';
      }
      break;

    case 'register':
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
      $offers = OfferController::getOffersByLang($displayLang);
      include '../views/market.php';
      break;

    case 'about-us':
      include '../views/about-us.php';
      break;

    case 'my-works':
      // $dataController = WorkController::getMyOffers();
      include '../views/myWorks.php';
      break;

    case 'chat':
      if (count($uri) == 3) {
        $reciver = json_decode(UserController::getProfileInfo($uri[2]));
        if ($reciver) {
          $messages = json_decode(ChatController::getChat($user->dni, $reciver->dni));
        };
      };
      include '../views/chat.php';
      break;

    case 'wallet':
      include '../views/wallet.php';
      break;

    case 'profile':
      if (count($uri) == 2) $userProfile = json_decode(UserController::getProfileInfo($user->name));
      if (count($uri) == 3) $userProfile = json_decode(UserController::getProfileInfo($uri[2]));
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
      header('Location: /home');
      include '../views/home.php';
      break;
  }
}

?>
