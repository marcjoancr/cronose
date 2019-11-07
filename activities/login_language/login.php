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

    require 'Authenticator.php';

    Authenticator::redirect();
    $langAvailable = ['en','es','ca'];
    
    if (isset($_POST['lang']) && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);

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

<h1><?=$lang[$displayLang]['logIn'];?></h1>

<form action="validator.php" method="post" target="_self">
    <?=$lang[$displayLang]['name'];?>: <input type="text" name="name"><br>
    <?=$lang[$displayLang]['password'];?>: <input type="password" name="password"><br>
    <input type="submit" value="<?=$lang[$displayLang]['submit'];?>">
</form>
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

