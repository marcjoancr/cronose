<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    #a{
      background-color: #ec7241;
      border: 1px solid black;
    }
    table, td, th {
       border: 1px solid black;
    }
    th{
       padding-top: 6px;
       padding-right: 6px;
       padding-bottom: 6px;
       padding-left: 6px;
    }
  </style>
</head>
<body>
  <h1>SERVICES</h1>
  <table>
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
