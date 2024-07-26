<?php
include('db.php');

$id = $_POST['id'];

$deleteQuery = $pdo->prepare("DELETE FROM students WHERE id = :id");
$deleteQuery->bindParam(':id', $id);
$deleteQuery->execute();
?>
