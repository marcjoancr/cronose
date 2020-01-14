<?php require 'layouts/head.php';?>

  <!-- <div class="row mt-4">
    <div class="col-8 bg-danger mt-4 pt-4">
      <h2>TITLE OFFER</h2>
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxfQZPWWpsLa2NR415rEgu2CwyRu0A3RtA_tDC3K08hIqnNoxy&s" alt="">
    </div>
    <div class="col-4 bg-secondary mt-4 pt-4">
      <h4>Shedule</h4>
      <p>Example paragraph</p>
    </div>
  </div> -->

  <script>
    $(document).ready(function(){
      const url = (window.location.pathname.split('/')[3]) ? '/api/work/'+window.location.pathname.split('/')[3] : '/api/work' ;
      showWork();
      function showWork() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            var work = JSON.parse(this.responseText);
            console.log(work);
          }
        }
        xmlhttp.open("GET", url, false);
        xmlhttp.send();
      };
    });
  </script>

<a href="chat">Chat</a>

<?php require '../views/layouts/footer.php';?>
