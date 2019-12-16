<?php

  require __DIR__.'/../assets/php/User.php';
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
              <label for="username"><?=$lang[$displayLang]['name'];?></label>
              <input id="username" type="text" class="form-control" name="username" required autofocus>
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
              <label for="myPasswordConfirm"><?=$lang[$displayLang]['repeatPassword'];?></label>
              <input id="myPasswordConfirm" type="password" class="form-control" name="password2" required>
            </div>
            <!-- <div class="form-group">
              <div class="custom-checkbox custom-control">
                <input id="agree" type="checkbox" name="agree" class="custom-control-input" required>
                <label for="agree" class="custom-control-label"><?=$lang[$displayLang]['agree'];?> <a href="#"><?=$lang[$displayLang]['terms'];?></a></label>
              </div>
            </div> -->
            <div class="form-group m-0">
              <input id="btnSubmit" type="button" class="btn btn-primary btn-block text-uppercase" value="<?=$lang[$displayLang]['register'];?>" disabled/>
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
    let vName,vEmail,vPass,vPass2;
    bootstrapValidate('#username', 'min:4:<?=$lang[$displayLang]['min4characters'];?>',function (validName){
      vName = (validName) ?  true : false;
      validate();
    });
    bootstrapValidate('#email','email:<?=$lang[$displayLang]['validEmail'];?>',function (validEmail) {
      vEmail = (validEmail) ?  true : false;
      validate();
    });
    bootstrapValidate('#password', 'min:5:<?=$lang[$displayLang]['min5characters'];?>', function (validPass) {
      vPass = (validPass) ? true : false;
      validate();
    });
    bootstrapValidate('#myPasswordConfirm','matches:#password:<?=$lang[$displayLang]['passError'];?>', function (validPass2){
      vPass2 = (validPass2) ? true : false;
      validate();
    });

    function validate() {
      if (vName && vEmail && vPass && vPass2) {
        $('#btnSubmit').prop("disabled", false);
      } else {
        $('#btnSubmit').prop("disabled", true);
      };
    };

    // Validate form
    $('#btnSubmit').click(() => {
      register();
    });

    // Send form via ajax request to Login.php
    function register() {
      const url = '../assets/php/Register.php';
      const username = $("#username").val();
      const password = $.md5($("#password").val());
      const email = $("#email").val();

      $.ajax({
        type: 'POST',
        url: url,
        data: { username, password, email },
        success: function(response) {
          if (response.status == 'success') {
            console.log(response);
            window.location.replace('/');
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
