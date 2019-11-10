<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
</head>
<body>
<?php

  require '../assets/php/User.php';

  session_start();

  if (isset($_SESSION['user']) && $_SESSION['user']->isValid()) header('Location: index.php');

  $langAvailable = ['en','es','ca'];

  if ($_POST && $_POST['lang'] && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);

  $clientLang = $_SESSION['lang'] ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $defaultLang = 'es';

  in_array($clientLang, $langAvailable) ? $displayLang = $clientLang : $displayLang = $defaultLang;

  $lang = [
      'en' => [
          'logIn' => 'Log In',
          'name' => 'Name',
          'password' => 'Password',
          'submit' => 'SEND'
          ],
      'es' => [
          'logIn' => 'Inicia Sesión',
          'name' => 'Nombre',
          'password' => 'Contraseña',
          'submit' => 'ENVIAR'
          ],
      'ca' => [
          'logIn' => 'Inicia Sessió',
          'name' => 'Nom',
          'password' => 'Contrasenya',
          'submit' => 'ENVIAR'
          ]
      ];

  function changeLanguage($lang) {
      $_SESSION['lang'] = $lang;
  }

?>

<div class="container">
  <div class="row">
    <div class=" col-4 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center"><?=$lang[$displayLang]['logIn'];?></h5>
          <form id="login-form" method="post" target="_self" class="form-signin">
            <div class="form-label-group">
              <input id="username" type="text" name="username" class="form-control" placeholder="<?=$lang[$displayLang]['name'];?>" required autofocus>
              <br>
            </div>
            <div class="form-label-group">
              <input id="password" type="password" name="password" class="form-control" placeholder="<?=$lang[$displayLang]['password'];?>" required>
              <br>
            </div>
            <input id="login-btn" class="btn btn-lg btn-primary btn-block text-uppercase" type="button" value="<?=$lang[$displayLang]['submit'];?>">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<form action="" method="post" target="_self" name="lang_change">
    <select id="language_selector" name="lang" onchange="lang_change.submit();">
        <option value="es">ES</option>
        <option value="en">EN</option>
        <option value="ca">CA</option>
    </select>
</form>
<script src="../assets/plugin/jquery.md5.min.js"></script>
<script>
    const selector = document.getElementById('language_selector');
    selector.value = "<?= isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>";

    // Validate form
    $('#login-btn').click(() => {
      // JS validator
      login();
    });

    // Send form via ajax request to Login.php
    function login() {
      const url = '../assets/php/Login.php';
      const username = $("#username").val();
      const password = $.md5($("#password").val());
      
      $.ajax({
        type: 'POST',
        url: url,
        data: { username, password },
        success: function(response) {
          if (response.status == 'success') {
            console.log(response);
            window.location.replace('index.php');
          } else if (response.status == 'error') {
            console.log(response);
          }
        }
      });
    }

</script>

</body>
</html>
