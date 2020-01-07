<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "pedro", "1234", "Cronose");

$id = $_REQUEST['id'];

$stmt = $conn->prepare("delete from Category where id ='$id'");
$stmt->execute();
$result = $stmt->get_result();

$conn->close();

?>
