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

  session_start();

  $langAvailable = ['en','es','ca'];

  if ($_POST && $_POST['lang'] && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);

  $clientLang = isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $defaultLang = 'es';

  in_array($clientLang, $langAvailable) ? $displayLang = $clientLang : $displayLang = $defaultLang;

  $lang = [
    'en' => [
      'logIn' => 'Log In',
      'register' => 'Register',
      'name' => 'Name',
      'email' => 'Email',
      'validEmail' => 'Enter a valid email address!',
      'password' => 'Password',
      'repeatPassword' => 'Repeat password',
      'passError' => 'Passwords must match!',
      'min5characters' => 'Enter at least 5 Characters',
      'agree' => 'I agree to the',
      'terms' => 'Terms and Conditions',
      'submit' => 'Send'
    ],
    'es' => [
      'logIn' => 'Inicia Sesión',
      'register' => 'Registrar',
      'name' => 'Nombre',
      'email' => 'Correo',
      'validEmail' => '¡Introduce un correo valido!',
      'password' => 'Contraseña',
      'repeatPassword' => 'Repite la contraseña',
      'passError' => '¡Las contraseñas deben coincidir!',
      'min5characters' => 'Ingrese al menos 5 caracteres',
      'agree' => 'Estoy de acuerdo con los',
      'terms' => 'términos y condiciones',
      'submit' => 'Enviar'
    ],
    'ca' => [
      'logIn' => 'Inicia Sessió',
      'register' => 'Registrar-se',
      'name' => 'Nom',
      'email' => 'Correu',
      'validEmail' => 'Introdueix un correu valid!',
      'password' => 'Contrasenya',
      'repeatPassword' => 'Repetiu la contrsenya',
      'passError' => 'Les contrasenyes han de coincidir!',
      'min5characters' => 'Introduïu un mínim de 5 caràcters',
      'agree' => "Estic d'acord amb els",
      'terms' => 'Termes i Condicions',
      'submit' => 'Enviar'
    ]
    ];

  function changeLanguage($lang) {
    $_SESSION['lang'] = $lang;
  }
?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/components/nav.php' ?>
