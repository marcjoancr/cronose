<?php

  require 'layouts/head.php';

  if (isset($_POST['user'])) {
    $_SESSION['user'] = $_POST['user'];
    echo "hpa";
  }

  if (isset($_SESSION['user']) && $_SESSION['user']->isValid()) header('Location: ../home');

?>

<div class="container">
  <div class="row">
    <div class=" col-4 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center"><?=$lang[$displayLang]['logIn'];?></h5>
          <form id="login-form" method="post" target="_self" class="form-signin">
            <div class="form-label-group">
              <input id="username" type="text" name="username" class="form-control" placeholder="<?=$lang[$displayLang]['name'];?>" required autofocus>
              <br>
            </div>
            <div class="form-label-group">
              <input id="password" type="password" name="password" class="form-control" placeholder="<?=$lang[$displayLang]['password'];?>" required>
              <br>
            </div>
            <input id="login-btn" class="btn btn-lg btn-primary btn-block" type="button" value="<?=$lang[$displayLang]['submit'];?>">
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<script>

    // Validate form
    $('#login-btn').click(() => {
      // JS validator
      login();
    });

    // Send form via ajax request to Login.php
    function login() {
      const url = 'http://api.local.cronose/<?= $displayLang; ?>/login';
      const username = $("#username").val();
      const password = $.md5($("#password").val());

      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { username, password },
        success: (data) => {
          const user = data;
          $.ajax({
            type: 'POST',
            url: "<?= $_SERVER["HTTP_HOST"] . $_SERVER['PHP_SELF'] ?>",
            dataType: 'json',
            data: { user },
            success: (data) => {
              console.log('logged');
              if (data['logged'] == true) window.location.href = '/<?= $displayLang; ?>/market';
            }
          });
        }
      });
    }

</script>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
