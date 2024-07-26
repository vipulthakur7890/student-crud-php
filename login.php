<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM teachers WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $teacher = $query->fetch();

    if ($teacher && password_verify($password, $teacher['password'])) {
        $_SESSION['teacher_id'] = $teacher['id'];
        $_SESSION['username'] = $teacher['username'];
        header('Location: teacher_portal.php');
    } else {
        $error = "Invalid credentials. Please try again.";
        echo "<script>document.getElementById('error').innerText = '$error';</script>";
    }
}
?>
