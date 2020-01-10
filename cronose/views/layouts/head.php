<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="/assets/img/favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Cronose</title>
  <meta name="title" content="Cronose"/>
  <meta name="description" content="A social platform for sharing your time with other people and let you know to others. Make this place your site for knowing nice other people and interchange some activities eachother."/>
  <meta name="robots" content="index, follow"/>

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/plugin/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/stylesheet/css/main.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/plugin/leaflet/leaflet.css">
  <!-- SCRIPTS -->
  <script src="/assets/plugin/jquery/jquery-3.4.1.min.js"></script>
  <script src="/assets/plugin/js/popper.min.js"></script>
  <script src="/assets/plugin/bootstrap/bootstrap.min.js"></script>
  <script src="/assets/plugin/jquery/jquery.md5.min.js"></script>
  <script src="/assets/plugin/leaflet/leaflet.js"></script>
</head>
<body>

<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require '../views/components/language.php';

?>

<?php require '../views/components/nav.php'; ?>

<?php if (isset($_SESSION['user'])):?>
  <div  class="col-10 p-0">
    <div  class="container">
<?php else :?>
  <div  class="col-12">
  <div  class="container">
<?php endif ?>