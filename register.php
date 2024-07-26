<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = $pdo->prepare("SELECT * FROM teachers WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();

    if ($query->rowCount() > 0) {
        $error = "Username already exists. Please choose another.";
        echo "<script>document.getElementById('error').innerText = '$error';</script>";
    } else {
        $insertQuery = $pdo->prepare("INSERT INTO teachers (username, password) VALUES (:username, :password)");
        $insertQuery->bindParam(':username', $username);
        $insertQuery->bindParam(':password', $password);
        $insertQuery->execute();
        header('Location: login.html');
    }
}
?>
