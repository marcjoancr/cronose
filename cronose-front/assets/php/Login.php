<?php

session_start();

require $_SERVER['DOCUMENT_ROOT'].'User.php';

$user = new User($_POST['username'], $_POST['password']);

header('Content-Type: application/json');
if ($user->isValid()) {
    $_SESSION['user'] = $user;
    $response = [
        'status' => 'success',
        'message' => 'Successfully connected'
    ];
    echo json_encode($response);
} else {
    $response = [
        'status' => 'error',
        'error' => '404',
        'message' => 'Incorrect username or password'
    ];
    echo json_encode($response);
}

?>
