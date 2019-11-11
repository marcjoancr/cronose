<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">CRONOSE</a>

  <div class="collapse navbar-collapse" id="language">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="btn" href="http://act.cronose.org/database_table/database.index.php"><i class="fa fa-database"></i> SERVICES</a>
        </li>
        <li class="nav-item active">
            <a class="btn" href="/views/about-us.php"><i class="fa fa-address-card"></i> ABOUT US</a>
        </li>
    </ul>
    <ul class="navbar-nav mr-auto" id="language_selector" name="lang" target="_self">
      <li class="nav-item active">
        <a class="nav-link border rounded text-dark language" value="es"><strong>ESPAÑOL</strong><span class="sr-only">(Current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link border rounded text-dark language" value="ca"><strong>CATALÀ</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link border rounded text-dark language" value="en"><strong>ENGLISH</strong></a>
      </li>
    </ul>

    <?php if(!isset($_SESSION['user'])) : ?>
      <a href="/views/login.php"><button type="button" class="btn btn-dark btn-lg login">LOG IN</button></a>
      <a href="/views/register.php"><button type="button" class="btn btn-secondary btn-lg register">REGISTER</button></a>
    <?php else : ?>
      <a href="?logout=true"><button id="btn-logout" type="button" class="btn btn-secondary btn-lg">LOG OUT</button></a>
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
    $("a.language").click(function() {
      const selector = $(this).val;
      selector.value = "<?= isset($_SESSION['lang']) ? $_SESSION['lang'] : substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2); ?>";
    });
  });
</script>
