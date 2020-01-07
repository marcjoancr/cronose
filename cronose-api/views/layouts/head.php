<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="/assets/img/favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Cronose</title>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/plugin/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/stylesheet/css/main.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- SCRIPTS -->
  <script src="/assets/plugin/jquery/jquery-3.4.1.min.js"></script>
  <script src="/assets/plugin/js/popper.min.js"></script>
  <script src="/assets/plugin/bootstrap/bootstrap.min.js"></script>
  <script src="/assets/plugin/jquery/jquery.md5.min.js"></script>
</head>
<body>

<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require $_SERVER['DOCUMENT_ROOT'].'/views/components/language.php';
  //require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  /*function changeLanguage($lang) {
    $_SESSION['lang'] = $lang;
  }*/
?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/components/nav.php'; ?>

<?php if (isset($_SESSION['user'])):?>
  <div  class="col-10 p-0">
    <div  class="container">
<?php else :?>
  <div  class="col-12">
  <div  class="container">
<?php endif ?>
