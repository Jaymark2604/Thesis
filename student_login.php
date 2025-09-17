<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];

    // Query student by student_number
    $stmt = $conn->prepare("SELECT * FROM students WHERE student_number = ?");
    $stmt->bind_param("s", $student_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // Plain password check for testing (use password_hash() in production)
    if ($student && $password === $student['password']) {
        $_SESSION['student_id'] = $student['student_id'];
        $_SESSION['first_name'] = $student['first_name'];
        $_SESSION['last_name'] = $student['last_name'];
        $_SESSION['student_number'] = $student['student_number'];
        $_SESSION['course'] = $student['course'];

        // Redirect to dashboard
        header("Location: student_dashboard.php");
        exit();
    } else {
        $error = "Invalid student number or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

<div class="bg-white shadow-sm rounded-2xl p-8 w-full max-w-md">
    <!-- Logo and Title -->
    <div class="text-center mb-6">
        <img src="image/PLMUNLogo.png" alt="PLMUN Logo" class="mx-auto w-20 mb-3">
        <h1 class="text-2xl font-bold text-gray-800">PLMUN Portal</h1>
        <p class="text-gray-500 text-sm">Student Login</p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Student Number</label>
            <input type="text" name="student_number" required
                   class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <button type="submit" name="login"
                class="w-full bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-medium py-2 rounded-xl shadow hover:opacity-90 transition">
            Login
        </button>
    </form>

    <!-- Error Message -->
    <?php if (!empty($error)) { ?>
        <div class="mt-4 text-center text-red-600 text-sm font-medium">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php } ?>
</div>

</body>
</html>
