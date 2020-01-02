<?php
require 'models/Article.model.php';

$model = new ArticleModel("Adios","Merol","Tomeu",0);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="cronose/cronose-front/assets/img/favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Cronose</title>
  <!-- CSS -->
  <link rel="stylesheet" href="cronose/cronose-front/assets/plugin/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../cronose-front/assets/stylesheet/css/main.css">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- SCRIPTS -->
  <script src="../cronose-front/assets/plugin/jquery/jquery-3.4.1.min.js"></script>
  <script src="../cronose-front/assets/plugin/js/popper.min.js"></script>
  <script src="../cronose-front/assets/plugin/bootstrap/bootstrap.min.js"></script>
  <script src="../cronose-front/assets/plugin/jquery/jquery.md5.min.js"></script>
</head>
<body>
<h1>Api</h1>

<div class="container">
  <div class="row">
    <div class=" col-4 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">LOGIN</h5>
          <form id="login-form" method="post" target="_self" class="form-signin">
            <div class="form-label-group">
              <input id="username" type="text" name="username" class="form-control" placeholder="Nombre" required autofocus>
              <br>
            </div>
            <div class="form-label-group">
              <input id="password" type="password" name="password" class="form-control" placeholder="Contraseña" required>
              <br>
            </div>
            <input id="login-btn" class="btn btn-lg btn-primary btn-block" type="button" value="Entrar">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
