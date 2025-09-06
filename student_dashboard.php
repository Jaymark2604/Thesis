<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">PLMUN Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Account</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">
          <span class="navbar-text text-white me-3">
            Welcome, <?php echo $_SESSION['student_name']; ?>
          </span>
        </li>
        <li class="nav-item">
          <a class="btn btn-outline-light btn-sm" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
    <div class="card shadow-sm p-4">
        <h3 class="mb-3">Student Dashboard</h3>
        <p class="lead">You are logged in as a student. Use the navigation bar above to access features.</p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
