<?php
  require $_SERVER['DOCUMENT_ROOT'].'/assets/php/User.php';
  require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php';

  session_start();

  if (!$_SESSION['user']) header('Location: login.php');
?>

  <h1>Cronose</h1>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
