<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['student_name']; ?>!</h2>
    <p>You are logged in as a student.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
