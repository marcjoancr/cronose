<?php

session_start();

require 'User.php';

$_SESSION['user'] = new User($_POST['username'], $_POST['password']);

$_SESSION['user']->validate();

if ($_SESSION['user']->isValid()) {
    var_dump($_SESSION['user']);
} else {
    echo 'Ups!';
}

?>
