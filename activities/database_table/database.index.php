<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../../cronose-front/assets/plugin/bootstrap.min.css">
  <title></title>
</head>
<body>
  <h1>SERVICES</h1>
  <table class="table table-bordered table-responsive">
    <tr id='a'>
      <th>ID</th>
      <th>NAME</th>
      <th>ASSIGNED PERSON</th>
      <th>CREATION DATE</th>
    </tr>
    <?php foreach ($services as $service): ?>
   <tr>
     <th><?= $service->id; ?></th>
     <th><?= $service->name; ?></th>
     <th><?= $service->assigned_person; ?></th>
     <th><?= $service->creation_date; ?></th>
   </tr>
   <?php endforeach; ?>
  </table>
</body>
</html>
