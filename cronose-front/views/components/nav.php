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
    <a href="login.php"><button type="button" class="btn btn-dark btn-lg"><?=$lang[$displayLang]['logIn'];?></button></a>
    <a href="register.php"><button type="button" class="btn btn-secondary btn-lg"><?=$lang[$displayLang]['register'];?></button></a>
  </div>
</nav>
