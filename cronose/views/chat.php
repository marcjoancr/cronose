<?php require 'layouts/head.php';?>

<h1>Chat</h1>

<div id="chat"></div>
<div class="input-group">
  <span class="input-group-btn">
    <button id="send-btn" class="btn btn-secondary" type="button"><i class="far fa-paper-plane"></i></button>
  </span>
  <input id="message" type="text" class="form-control">
</div>

<a href="/wallet">wallet</a><br>
<a href="/card">card</a>

<script>

  $(document).ready(function(){

    show();

    $('#send-btn').click(() => {
      send();
    });

    setInterval(function () {
      show();
    },1000);

    function show() {
      const url = '/api/chat/'+window.location.pathname.split('/')[3];
      const sender = 'Admin';
      const reciver = 'window.location.pathname.split('/')[3]';
      const msg = $('#message').val();
      $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: {},
        success: (data) => {
          if (data.status == 'success') {
            let msg = data.msg;
            htmlLi = "<ul>"
            $.each (msg, function(key, value) {
              htmlLi += '<li><strong>' + value['name'] + ': </strong>' + value['message'] + '</li>';
            });
            htmlLi += "</ul>"
            document.getElementById("chat").innerHTML = htmlLi;
          };
        },
        error: ((data) => {
          console.log(data)
        })
      });
    };

    // Send form via ajax to sendMSG
    function send() {
      const url = '/api/chat/' + window.location.pathname.split('/')[3] + '/send';
      const reciver = window.location.pathname.split('/')[3];
      const msg = $('#message').val();
      $.ajax({
        type: 'POST',
        url: url,
        dataType: 'json',
        data: { reciver, msg },
        success: (data) => {
          // console.log(data)
          show();
        },
        error: ((data) => {
          // console.log(data)
        })
      });
    }
  });

</script>

<!-- <?php require '../views/layouts/footer.php';?> -->
