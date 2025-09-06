<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // For testing: plain password check
    if ($student && $password === $student['password']) {
        $_SESSION['student_id'] = $student['student_id'];
        $_SESSION['student_name'] = $student['name'];
        header("Location: student_dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <div class="text-center mb-3">
            <img src="image/PLMUNLogo.png" 
                 alt="PLMUN Logo" class="img-fluid" style="width:80px;">
            <h4 class="mt-3">Student OJT Portal</h4>
        </div>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>

        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger text-center mt-3">
                <?php echo $error; ?>
            </div>
        <?php } ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
