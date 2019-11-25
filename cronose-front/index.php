<?php

  require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';
  require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php';

  if (!isset($_SESSION['user'])) header('Location: views/login');

?>

  <h1>Cronose</h1>
  <img src="/assets/img/profile.jpeg" width="200">

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
