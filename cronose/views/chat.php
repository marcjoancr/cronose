<?php require 'layouts/head.php';?>

<h1>Chat</h1>
<?php if ($reciver) : ?>
  <?php if ($user->dni != $reciver->dni) : ?>
  <h2><?= $reciver->name; ?></h2>
  <?php foreach ($messages as $key => $value) : ?>
    <ul>
      <li><b>Name:</b> <?= $value->name; ?>
        <li><b>Message:</b> <?= $value->message ?></li>
      </li>
    </ul>
  <?php endforeach; ?>

  <form id="send-form" method="post" target="_self" class="form-signin">
    <div class="form-label-group">
      <input id="message" type="text" name="message" class="form-control" placeholder="Text" required autofocus>
      <br>
    </div>
    <input id="send-btn" class="btn btn-lg btn-primary btn-block" type="button" value="<?=$lang[$displayLang]['submit'];?>">
  </form>

  <?php endif; ?>
<?php endif; ?>

<a href="/wallet">wallet</a><br>
<a href="/card">card</a>

<script>

  $('#send-btn').click(() => {
    send();
  });

  // Send form via ajax to sendMSG
  function send() {
    console.log($('#message').val());
    const url = '/api/chat/send';
    const sender = '<?= $user->dni; ?>';
    const reciver = '<?= $reciver->dni; ?>';
    const msg = $('#message').val();
    $.ajax({
      type: 'POST',
      url: url,
      dataType: 'json',
      data: { sender, reciver, msg },
      success: (data) => {
        console.log(data)
        // if (data.status == 'success') window.location.href = '/<?= $displayLang; ?>/market';
      }
    });
  }

</script>

<!-- <?php require '../views/layouts/footer.php';?> -->
