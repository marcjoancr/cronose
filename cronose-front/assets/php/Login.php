<?php

require 'User.php';

$user = new User($_POST['username'], $_POST['password']);

$user->validate();

if ($user->isValid()) {
  // $_SESSION('user') = $user;
    echo 'Valid!';
} else {
    echo 'Ups!';
}

?>
