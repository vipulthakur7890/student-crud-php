<?php
include('db.php');

$name = $_POST['name'];
$subject = $_POST['subject'];
$marks = $_POST['marks'];

$query = $pdo->prepare("SELECT * FROM students WHERE name = :name AND subject = :subject");
$query->bindParam(':name', $name);
$query->bindParam(':subject', $subject);
$query->execute();
$student = $query->fetch();

if ($student) {
    $newMarks = $student['marks'] + $marks;
    $updateQuery = $pdo->prepare("UPDATE students SET marks = :marks WHERE id = :id");
    $updateQuery->bindParam(':marks', $newMarks);
    $updateQuery->bindParam(':id', $student['id']);
    $updateQuery->execute();
} else {
    $insertQuery = $pdo->prepare("INSERT INTO students (name, subject, marks) VALUES (:name, :subject, :marks)");
    $insertQuery->bindParam(':name', $name);
    $insertQuery->bindParam(':subject', $subject);
    $insertQuery->bindParam(':marks', $marks);
    $insertQuery->execute();
}

header('Location: teacher_portal.php');
?>
