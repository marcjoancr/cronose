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
          <form method="POST" class="my-login-validation" id="register" name="registration">
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
                <input id="private" type="checkbox" name="private" class="custom-control-input">
                <label for="private" class="custom-control-label"><?=$lang[$displayLang]['private'];?></label>
              </div>
            </div>
            <div class="form-group m-0">
              <input id="btnSubmit" type="submit" class="btn btn-primary btn-block text-uppercase" value="<?=$lang[$displayLang]['register'];?>"/>
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

    function isValid() {
      return (dni && name && surname && email && password && c_password);
    }

    // Submit Action
    $('form[name="registration"]').submit((e) => {
      e.preventDefault();
      if (!isValid()) return;
      const form = document.forms.namedItem("registration");
      const formData = new FormData(form);
      formData.set( 'password', $.md5(formData.get('password')) );
      formData.delete('c_password');
      const data = Object.fromEntries(formData);
      register(data);
    });

    // Send form via ajax request to Register
    function register(data) {
      const url = '/api/register';
      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { 'user' : data },
        success: function(response) {
          if (response.status == 'success') {
            login(response.profile.name, response.profile.password);
          } else if (response.status == 'error') {
            $("#errorAlertMessage").html( response.message );
            $("#errorAlert").show();
            console.log(response);
          };
        }
      });
    }

    // Send form via ajax request to Login
    function login(name, password) {
      $.ajax({
        type: 'POST',
        url: '/api/login',
        dataType: 'json',
        data: { name, password },
        success: (data) => {
          if (data.status == 'success') window.location.href = '/<?= $displayLang; ?>/market';
        },
        error: (data) => {
          console.log(data);
        }
      });
    }
  });

</script>

<?php

require 'layouts/footer.php';

?>
