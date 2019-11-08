<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="shortcut icon" href="favicon.ico"/>
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
<?php

    session_start();

    $langAvailable = ['en','es','ca'];

    if ($_POST['lang'] && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);

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
          <form action="validator.php" method="post" target="_self" class="form-signin">
            <div class="form-label-group">
              <input type="text" name="name" class="form-control" placeholder="<?=$lang[$displayLang]['name'];?>" required autofocus>
              <br>
            </div>
            <div class="form-label-group">
              <input type="password" name="password" class="form-control" placeholder="<?=$lang[$displayLang]['password'];?>" required>
              <br>
            </div>
            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="<?=$lang[$displayLang]['submit'];?>">
            <!--<button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" value="<?=$lang[$displayLang]['submit'];?>"><?=$lang[$displayLang]['submit'];?></button>-->
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
<script>
    const selector = document.getElementById('language_selector');
    selector.value = "<?= isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>";
</script>

</body>
</html>
