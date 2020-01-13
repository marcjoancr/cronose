<?php

  require 'layouts/head.php';

  if (isset($_SESSION['user']) && $_SESSION['user']->isValid()) header('Location: ../index.php');

?>
<div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
  <span id="errorAlertMessage"></span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="container h-100 mt-4">
  <div class="row justify-content-md-center h-100">
    <div class="card-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?=$lang[$displayLang]['register'];?></h4>
          <form method="POST" class="my-login-validation" id="register">
            <div class="form-group">
              <label for="dni"><?=$lang[$displayLang]['dni'];?></label>
              <input id="dni" type="text" class="form-control" name="dni" required autofocus>
            </div>
            <div class="form-group">
              <label for="name"><?=$lang[$displayLang]['name'];?></label>
              <input id="name" type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label for="surname"><?=$lang[$displayLang]['surname'];?></label>
              <input id="surname" type="text" class="form-control" name="surname" required>
            </div>
            <div class="form-group">
              <label for="surname_2"><?=$lang[$displayLang]['surname_2'];?></label>
              <input id="surname_2" type="text" class="form-control" name="surname_2">
            </div>
            <div class="form-group">
              <label for="email"><?=$lang[$displayLang]['email'];?></label>
              <input id="email" type="text" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label for="password"><?=$lang[$displayLang]['password'];?></label>
              <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label for="c_password"><?=$lang[$displayLang]['repeatPassword'];?></label>
              <input id="c_password" type="password" class="form-control" name="c_password" required>
            </div>
            <div class="form-group">
              <div class="custom-checkbox custom-control">
                <input id="private" type="checkbox" name="private" class="custom-control-input" required>
                <label for="private" class="custom-control-label"><?=$lang[$displayLang]['private'];?></label>
              </div>
            </div>
            <div class="form-group m-0">
              <input id="btnSubmit" type="button" class="btn btn-primary btn-block text-uppercase" value="<?=$lang[$displayLang]['register'];?>"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/assets/plugin/bootstrap/bootstrap-validate.js"></script>

<script>

  $(document).ready(function(){
    $('#errorAlert').hide();

    //Validate
    let dni, name, surname, email, password, c_password, private;
    bootstrapValidate('#dni', 'min:9:<?=$lang[$displayLang]['min9characters'];?>|required', function (isValid){
      dni = isValid;
    });
    bootstrapValidate('#name', 'min:4:<?=$lang[$displayLang]['min4characters'];?>|required', function (isValid){
      name = isValid;
    });
    bootstrapValidate('#surname', 'min:4:<?=$lang[$displayLang]['min4characters'];?>|required', function (isValid){
      surname = isValid;
    });
    bootstrapValidate('#email','email:<?=$lang[$displayLang]['validEmail'];?>|required', function (isValid) {
      email = isValid;
    });
    bootstrapValidate('#password', 'min:5:<?=$lang[$displayLang]['min5characters'];?>|required', function (isValid) {
      password = isValid;
    });
    bootstrapValidate('#c_password','matches:#password:<?=$lang[$displayLang]['passError'];?>|required', function (isValid){
      c_password = isValid;
    });

    function validate() {
      if (dni && name && surname && email && password && c_password) {
        register();
      }
    }

    // Validate form
    $('#btnSubmit').click(() => {
      validate();
    });

    // Send form via ajax request to Login
    function login() {
      const url = '/api/login';
      const username = $("#username").val();
      const password = $.md5($("#password").val());
    }

    // Send form via ajax request to Login.php
    function register() {
      const url = '/api/register';
      const dni = $("#dni").val();
      const name = $("#name").val();
      const surname = $("#surname").val();
      const surname_2 = $("#surname_2").val();
      const email = $("#email").val();
      const password = $.md5($("#password").val());
      const private = $("#private").is(':checked');
      const data = { 'user' : { dni, name, surname, surname_2, email, password, private } };

      $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(response) {
          response = JSON.parse(response);
          if (response.status == 'success') {
            $.ajax({
              type: 'POST',
              url: '/api/login',
              dataType: 'json',
              data: { "username" : response.profile.name, "password" : response.profile.password },
              success: (data) => {
                if (data.status == 'success') window.location.href = '/<?= $displayLang; ?>/market';
              },
              error: (data) => {
                console.log(data);
              }
            });
          } else if (response.status == 'error') {
            $("#errorAlertMessage").html( response.message );
            $("#errorAlert").show();
            console.log(response);
          };
        }
      });
    }
  });

</script>

<?php

require 'layouts/footer.php';

?>
