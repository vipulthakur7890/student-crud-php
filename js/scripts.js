function openNewStudentModal() {
    document.getElementById('newStudentModal').style.display = 'block';
}

function closeNewStudentModal() {
    document.getElementById('newStudentModal').style.display = 'none';
}

function updateStudent(element, field, id) {
    const value = element.innerText;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_student.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id + "&field=" + field + "&value=" + value);
}

function deleteStudent(id) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_student.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        }
    };
}
