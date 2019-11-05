<!DOCTYPE html>
<html>
<head>
  <title>Cronose</title>
</head>
<body>
  <?php
    if (!$_POST['lang']) require 'validator.php';

    session_start();

    $langAvailable = ['en','es','ca'];
    
    if ($_POST['lang'] && in_array($_POST['lang'], $langAvailable)) changeLanguage($_POST['lang']);
    $clientLang = $_SESSION['lang'] ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $defaultLang = 'es';

    in_array($clientLang, $langAvailable) ? $displayLang = $clientLang : $displayLang = $defaultLang;

    $lang = [
        'en' => [
            'welcome' => 'Welcome',
            ],
        'es' => [
            'welcome' => 'Bienvenido',
            ],
        'ca' => [
            'welcome' => 'Benvingut',
            ]
        ];
    
    function changeLanguage($lang) {
        $_SESSION['lang'] = $lang;
    }
    
  ?>
  <form action="" method="post" target="_self" name="lang_change">
      <select id="language_selector" name="lang" onchange="lang_change.submit();">
          <option value="es">ES</option>
          <option value="en">EN</option>
          <option value="ca">CA</option>
      </select>
  </form>
  <script>
      const selector = document.getElementById('language_selector');
      selector.value = "<?= $_SESSION['lang'] ?>";
  </script>
  <h1><?=$lang[$displayLang]['welcome'];?></h1>
</body>
</html>
