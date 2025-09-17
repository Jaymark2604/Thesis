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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PLMUN Portal</title>
  <link rel="icon" type="image/png" href="image/PLMUNLogo.png">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen">

<div class="grid grid-cols-12 gap-6 max-w-7xl mx-auto p-6">
  
  <!-- Include Sidebar -->
  <?php include 'includes/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="col-span-12 md:col-span-9 lg:col-span-10 bg-white rounded-2xl p-6 shadow-sm">
    <h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
    <p>Welcome to your student dashboard!</p>
  </main>

</div>

</body>
</html>
