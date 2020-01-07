<?php require_once 'config.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $.ajax({
      type: "GET",
      url: "<?= $config['api']['api_url'] ?>" + window.location.pathname,
      dataType: "html"
    }).done((data) => {
      $('#app').html(data);
    });
  </script>
</head>

<body>
  <div id="app"></div>
</body>

</html>
