
<?php

  require 'services.php';
  require 'functions.php';

  $pdo = connectToDb();
  $services = fecthAllTasks($pdo);

  require 'database.index.php';

