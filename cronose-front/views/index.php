<?php
  require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';
  require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php';

  session_start();

  if (!$_SESSION['user']) header('Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cronose</title>
</head>

<body>
  <h1>Cronose</h1>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
