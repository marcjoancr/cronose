<?php

require 'User.php';

header('Content-type: application/json');

$user = new User($_POST['username'], $_POST['password']);

$user->validate();

echo json_encode($user->isValid());

// if ($user->isValid()) {
//     echo 'Valid!';    
// } else {
//     echo 'Ups!';
// }

?>