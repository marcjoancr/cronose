
<?php
  require __DIR__.'/../assets/php/User.php';
  require 'layouts/head.php';

  if (isset($_SESSION['user']) && $_SESSION['user']->isValid()) header('Location: ../index.php');

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
      const url = '../assets/php/Login.php';
      const username = $("#username").val();
      const password = $.md5($("#password").val());

      $.ajax({
        type: 'POST',
        url: url,
        data: { username, password },
        success: function(response) {
          if (response.status == 'success') {
            console.log(response);
            window.location.replace('/');
          } else if (response.status == 'error') {
            console.log(response);
          }
        }
      });
    }

</script>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
