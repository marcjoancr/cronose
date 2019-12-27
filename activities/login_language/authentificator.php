<?php

function authenticator(){

    empty($_POST) ? redirect($verified) : verify();
    
}

function redirect(){

  if (!$_SESSION['verified']) return false;

}

function verifySession() {
  $result = DB::selectUser($_SESSION['user'][0]);

  if ($result) {
    if (password_verify($_SESSION['user'][1], $result[0][1])) {
      $_SESSION['verified'] = true;
      return true;
    }
  }
  redirect();
}

function verify() {
  if (empty($_POST['name']) || empty($_POST['password'])) die();
  $_SESSION['user'] = [$_POST['name'], $_POST['password']];
  verifySession();
}
