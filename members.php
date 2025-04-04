<?php
include('database.php'); // Connect to DB

// Add student
if (isset($_POST['add_student'])) {
    $name = $_POST['student_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $contact = $_POST['contact_number'];
    $dept = $_POST['department'];
    $roll = $_POST['roll_no'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $created_by = 'admin'; // Replace as needed

    $query = "INSERT INTO students_login 
        (student_name, email, password_hash, contact_number, department, roll_no, dob, address, created_by) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssss", $name, $email, $password, $contact, $dept, $roll, $dob, $address, $created_by);
    $stmt->execute();
    $stmt->close();
}

// Delete student
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $query = "DELETE FROM students_login WHERE student_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    header("Location: manage.php");
    exit();
}

// Fetch all students
$result = $conn->query("SELECT * FROM students_login");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <link rel="stylesheet" href="../frontend/css/manage.css">
</head>
<body>
    
    
    <h1>Student Management</h1>

    <form method="POST">
        <input type="text" name="student_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="contact_number" placeholder="Contact Number">
        <input type="text" name="department" placeholder="Department">
        <input type="text" name="roll_no" placeholder="Roll No">
        <input type="date" name="dob" placeholder="Date of Birth">
        <input type="text" name="address" placeholder="Address">
        <button type="submit" name="add_student">Add Student</button>
    </form>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Contact</th><th>Department</th><th>Roll No</th><th>DOB</th><th>Address</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['student_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['contact_number'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['roll_no'] ?></td>
            <td><?= $row['dob'] ?></td>
            <td><?= $row['address'] ?></td>
            <td><a href="?delete_id=<?= $row['student_id'] ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

