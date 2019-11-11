<?php

session_start();

require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';

$user = new User($_POST['username'], $_POST['password'], $_POST['email']);

$response = DB::registerUser($user);
$user->validate();

header('Content-Type: application/json');

if ($user->isValid()) {
    $_SESSION['user'] = $user;
    echo json_encode($response);
} else {
    echo json_encode($response);
}

?>