<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="favicon.ico"/>
  <meta charset="utf-8">
  <title>Cronose</title>
  <link rel="stylesheet" href="/assets/plugin/bootstrap/bootstrap.min.css">
  <script src="/assets/plugin/jquery/jquery-3.4.1.min.js"></script>
  <script src="/assets/plugin/js/popper.min.js"></script>
  <script src="/assets/plugin/bootstrap/bootstrap.min.js"></script>
</head>
<body>

<?php

  require $_SERVER['DOCUMENT_ROOT'].'/views/components/language.php';

  session_start();

  $langAvailable = ['en','es','ca'];

  if ($_POST && $_POST['lang'] && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);

  $clientLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $defaultLang = 'es';

  in_array($clientLang, $langAvailable) ? $displayLang = $clientLang : $displayLang = $defaultLang;

  function changeLanguage($lang) {
    $_SESSION['lang'] = $lang;
  }
?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/components/nav.php' ?>
