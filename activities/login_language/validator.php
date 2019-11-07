<?php

session_start();

require 'Authenticator.php';

if ($_POST) Authenticator::verify($_POST['name'], $_POST['password']);
Authenticator::redirect();