<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php'; ?>
<?php if (!isset($_SESSION['user'])) header('Location: login.php'); ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
