<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand order-0 order-md-0" href="/"><strong>CRONOSE</strong></a>

  <button class="order-2 order-md-3 navbar-toggler justify-content-end" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-3 order-md-1" id="language">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="btn" href="/views/about-us.php"><i class="fa fa-address-card"></i> ABOUT US</a>
      </li>
      <?php if (isset($_SESSION['user'])):?>
        <li class="nav-item">
          <a class="btn" href="/views/myWorks.php"><i class="fas fa-database"></i> MY OFFERS</a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="btn" href="/views/market.php"><i class="fas fa-map-pin"></i> MARKET</a>
      </li>
    </ul>
    <div class="dropdown-divider"></div>
    <ul class="navbar-nav" id="language_selector" name="lang">
      <li class="nav-item" value="es">
        <a href="?lang=es" class="nav-link">ES <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" value="ca">
        <a href="?lang=ca" class="nav-link">CA</a>
      </li>
      <li class="nav-item" value="en">
        <a href="?lang=en" class="nav-link">EN</a>
      </li>
    </ul>
  </div>
  <div class="order-1 order-md-2">

    <?php if(!isset($_SESSION['user'])) : ?>
      <a class="login-btn" href="/views/login.php"><?=$lang[$displayLang]['logIn'];?></a>
      <a href="/views/register.php"><button type="button" class="btn btn-secondary btn-lg register"><?=$lang[$displayLang]['register'];?></button></a>
    <?php else : ?>
      <a href="?logout=true"><button id="btn-logout" type="button" class="btn btn-secondary btn-lg"><?=$lang[$displayLang]['logOut'];?></button></a>
    <?php endif ?>



    <?php
      if (isset($_GET['logout']) && $_GET['logout']) {
        session_destroy();
        header('Location: /');
      }
    ?>
  </div>
</nav>

<script>
  $(document).ready(function(){
    $('#language_selector .nav-item').each(function(index) {
      const target = $(this);
      if (target.attr('value') == '<?= $_SESSION['lang'] ?? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?>') {
        target.addClass('active');
      }
    });
  });
</script>
