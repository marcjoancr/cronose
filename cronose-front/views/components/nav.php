<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">CRONOSE</a>

  <div class="collapse navbar-collapse" id="language">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <!-- <a class="btn" href="http://act.cronose.org/database_table/database.index.php"><i class="fa fa-database"></i> SERVICES</a> -->
      </li>
      <li class="nav-item">
        <a class="btn" href="/views/about-us.php"><i class="fa fa-address-card"></i> ABOUT US</a>
      </li>
    </ul>
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

    <?php if(!isset($_SESSION['user'])) : ?>
      <a class="login-btn" href="/views/login.php">Log In</a>
      <a href="/views/register.php"><button type="button" class="btn btn-secondary btn-lg register">Register</button></a>
    <?php else : ?>
      <a href="?logout=true"><button id="btn-logout" type="button" class="btn btn-secondary btn-lg">Log Out</button></a>
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
