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
  <title>OJT Attendance</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
    }
    .attendance-box {
      max-width: 600px;
      margin: auto;
      text-align: center;
      padding: 30px;
    }
    #currentTime {
      font-size: 1.3rem;
      font-weight: bold;
      margin: 15px 0;
    }
  </style>
</head>
<body>

<!-- Navbar -->
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
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Consultation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Calendar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="OJT.php">OJT</a>
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


<!-- Main Attendance -->
<div class="container mt-5">
  <div class="card shadow-sm attendance-box">
    <h3 class="mb-4">OJT Attendance</h3>
    
    <!-- IN / OUT Buttons -->
    <div class="mb-3">
      <button id="btnIn" class="btn btn-success btn-lg me-3">🟢 IN</button>
      <button id="btnOut" class="btn btn-danger btn-lg">🔴 OUT</button>
    </div>

    <!-- Current Time & Date -->
    <div id="currentTime">--:-- --/--/----</div>
  </div>

  <!-- History Log -->
  <div class="card shadow-sm mt-4 p-3">
    <h4 class="mb-3">⏱ Attendance History</h4>
    <table class="table table-bordered text-center">
      <thead class="table-primary">
        <tr>
          <th>Action</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody id="historyTable">
        <tr><td colspan="2">No records yet</td></tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
let hasTimeIn = false; 
let hasTimeOut = false; 

function updateClock() {
  const now = new Date();
  document.getElementById("currentTime").textContent = 
    now.toLocaleTimeString() + " | " + now.toLocaleDateString();
}
setInterval(updateClock, 1000);
updateClock();

// Handle IN button
document.getElementById("btnIn").addEventListener("click", function() {
  if (hasTimeIn && !hasTimeOut) {
    alert("You already timed IN. Please time OUT before another IN.");
    return;
  }
  const now = new Date().toLocaleString();
  const row = `<tr><td><strong>Time In</strong></td><td>${now}</td></tr>`;
  document.getElementById("historyTable").innerHTML += row;
  hasTimeIn = true;
  hasTimeOut = false;
});

// Handle OUT button
document.getElementById("btnOut").addEventListener("click", function() {
  if (!hasTimeIn) {
    alert("You must time IN before you can time OUT.");
    return;
  }
  if (hasTimeOut) {
    alert("You already timed OUT. Please come back later.");
    return;
  }
  const now = new Date().toLocaleString();
  const row = `<tr><td><strong>Time Out</strong></td><td>${now}</td></tr>`;
  document.getElementById("historyTable").innerHTML += row;
  hasTimeOut = true;
});
</script>

</body>
</html>
