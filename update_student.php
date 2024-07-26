<?php
include('db.php');

$id = $_POST['id'];
$field = $_POST['field'];
$value = $_POST['value'];

$updateQuery = $pdo->prepare("UPDATE students SET $field = :value WHERE id = :id");
$updateQuery->bindParam(':value', $value);
$updateQuery->bindParam(':id', $id);
$updateQuery->execute();
?>
