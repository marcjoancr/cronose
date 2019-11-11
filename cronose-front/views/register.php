<?php

  require '../assets/php/User.php';
  require '../views/layouts/head.php';

  if (isset($_SESSION['user']) && $_SESSION['user']->isValid()) header('Location: index.php');

?>

<form action="" method="post" target="_self" name="lang_change">
  <select id="language_selector" name="lang" onchange="lang_change.submit();">
    <option value="es">ES</option>
    <option value="en">EN</option>
    <option value="ca">CA</option>
  </select>
</form>

<div class="container h-100 mt-4">
  <div class="row justify-content-md-center h-100">
    <div class="card-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$lang[$displayLang]['register'];?></h4>
          <form method="POST" class="my-login-validation" id="register">
            <div class="form-group">
              <label for="name"><?=$lang[$displayLang]['name'];?></label>
              <input id="name" type="text" class="form-control" name="name" required autofocus>
            </div>
            <div class="form-group">
              <label for="password"><?=$lang[$displayLang]['password'];?></label>
              <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label for="password2"><?=$lang[$displayLang]['repeatPassword'];?></label>
              <input id="password2" type="password" class="form-control" name="password2" required>
            </div>
            <div class="form-group">
              <div class="custom-checkbox custom-control">
                <input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
                <label for="agree" class="custom-control-label"><?=$lang[$displayLang]['agree'];?> <a href="#"><?=$lang[$displayLang]['terms'];?></a></label>
              </div>
            </div>
            <div class="form-group m-0">
              <button id="btnSubmit" type="submit" class="btn btn-primary btn-block text-uppercase" disabled="">
                <?=$lang[$displayLang]['register'];?>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<br>

<script>
    //JQUERY
  $(document).ready(function() {
    $('#password2').on("focusout",function () {
      if ($('#password').val() == $('#password2').val()) {
        $('#btnSubmit').removeAttr("disabled");
      };
    });
  });

</script>

<?php require'../views/layouts/footer.php';?>
