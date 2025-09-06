<?php
$host = "localhost";   // XAMPP default
$user = "root";        // XAMPP default
$pass = "";            // XAMPP default (no password)
$dbname = "school_portal";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
