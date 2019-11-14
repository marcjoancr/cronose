<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="favicon.ico"/>
  <meta charset="utf-8">
  <title>Cronose</title>
  <!-- CSS -->
  <link rel="stylesheet" href="/assets/plugin/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/stylesheet/css/main.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>
  <!-- SCRIPTS -->
  <script src="/assets/plugin/jquery/jquery-3.4.1.min.js"></script>
  <script src="/assets/plugin/js/popper.min.js"></script>
  <script src="/assets/plugin/bootstrap/bootstrap.min.js"></script>
  <script src="/assets/plugin/jquery/jquery.md5.min.js"></script>
</head>
<body>

<?php

  require $_SERVER['DOCUMENT_ROOT'].'/views/components/language.php';

  session_start();

  $langAvailable = ['en','es','ca'];
  $defaultLang = 'es';

  if (isset($_GET['lang']) && in_array($_GET['lang'], $langAvailable)) changeLanguage($_GET['lang']);

  $clientLang = $_SESSION['lang'] ?? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

  $displayLang = in_array($clientLang, $langAvailable) ? $clientLang : $defaultLang;

  function changeLanguage($lang) {
    $_SESSION['lang'] = $lang;
  }
?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/components/nav.php' ?>

  <div class="container">
