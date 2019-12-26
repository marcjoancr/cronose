<?php
session_start();
$_SESSION['lang'] = $data['language'];
header('Location: /');
?>
