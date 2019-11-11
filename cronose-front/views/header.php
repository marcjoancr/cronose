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
        'name' => 'Name',
        'password' => 'Password',
        'submit' => 'Send'
        ],
    'es' => [
        'logIn' => 'Inicia Sesión',
        'name' => 'Nombre',
        'password' => 'Contraseña',
        'submit' => 'Enviar'
        ],
    'ca' => [
        'logIn' => 'Inicia Sessió',
        'name' => 'Nom',
        'password' => 'Contrasenya',
        'submit' => 'Enviar'
        ]
    ];

  function changeLanguage($lang) {
      $_SESSION['lang'] = $lang;
  }

?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">CRONOSE</a>

      <div class="collapse navbar-collapse" id="language">
        <ul class="navbar-nav mr-auto" id="language_selector" name="lang" target="_self">
          <li class="nav-item active">
            <a class="nav-link bg-españa border rounded text-dark" value="es" onclick="<?php changeLanguage("es"); ?>"><strong>ESPAÑOL</strong><span class="sr-only">(Current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-catalán border rounded text-dark" value="ca" onclick="<?php changeLanguage("ca"); ?>"><strong>CATALÀ</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-inglés border rounded text-dark" value="en" onclick="<?php changeLanguage("en"); ?>"><strong>ENGLISH</strong></a>
          </li>
        </ul>
        <button type="button" class="btn btn-dark btn-lg">LOG IN</button>
        <button type="button" class="btn btn-secondary btn-lg">REGISTER</button>
      </div>
    </nav>

  <script>
      const selector = document.getElementById('language_selector');
      selector.value = "<?= isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>";

  </script>
