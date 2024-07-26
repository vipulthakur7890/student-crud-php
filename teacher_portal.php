<?php
session_start();
include('db.php');

if (!isset($_SESSION['teacher_id'])) {
    header('Location: login.html');
    exit();
}

$query = $pdo->query("SELECT * FROM students");
$students = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="portal-container">
        <h2>Welcome, <?= $_SESSION['username'] ?></h2>
        <button onclick="window.location.href='logout.php'">Logout</button>
        <h2>Student Listing</h2>
        <button onclick="openNewStudentModal()">Add New Student</button>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td contenteditable="true" onBlur="updateStudent(this, 'name', <?= $student['id'] ?>)"><?= $student['name'] ?></td>
                        <td contenteditable="true" onBlur="updateStudent(this, 'subject', <?= $student['id'] ?>)"><?= $student['subject'] ?></td>
                        <td contenteditable="true" onBlur="updateStudent(this, 'marks', <?= $student['id'] ?>)"><?= $student['marks'] ?></td>
                        <td>
                            <button onclick="deleteStudent(<?= $student['id'] ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="newStudentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeNewStudentModal()">&times;</span>
            <form id="newStudentForm" action="add_student.php" method="POST">
                <h2>Add New Student</h2>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
                <label for="marks">Marks:</label>
                <input type="number" id="marks" name="marks" required>
                <button type="submit">Add Student</button>
            </form>
        </div>
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>
