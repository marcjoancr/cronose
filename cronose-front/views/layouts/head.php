<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="shortcut icon" href="favicon.ico"/>
  <meta charset="utf-8">
  <title>Login</title>
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

  $clientLang = $_SESSION['lang'] ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  $defaultLang = 'es';

  in_array($clientLang, $langAvailable) ? $displayLang = $clientLang : $displayLang = $defaultLang;

  $lang = [
    'en' => [
      'logIn' => 'Log In',
      'register' => 'Register',
      'name' => 'Name',
      'password' => 'Password',
      'repeatPassword' => 'Repeat password',
      'agree' => 'I agree to the',
      'terms' => 'Terms and Conditions',
      'submit' => 'Send'
    ],
    'es' => [
      'logIn' => 'Inicia Sesión',
      'register' => 'Registrar',
      'name' => 'Nombre',
      'password' => 'Contraseña',
      'repeatPassword' => 'Repite la contraseña',
      'agree' => 'Estoy de acuerdo con los',
      'terms' => 'términos y condiciones',
      'submit' => 'Enviar'
    ],
    'ca' => [
      'logIn' => 'Inicia Sessió',
      'register' => 'Registrar-se',
      'name' => 'Nom',
      'password' => 'Contrasenya',
      'repeatPassword' => 'Repetiu la contrsenya',
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
