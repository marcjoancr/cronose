<?php

session_start();

require 'User.php';

$user = new User($_POST['username'], $_POST['password']);

if ($user->isValid()) {
    echo 'Valid!';
} else {
    echo 'Ups!';
}

?>
