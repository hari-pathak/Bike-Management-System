<?php

session_start();

include "db.php";


// Make sure the form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}


// Get form data
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";


// Check empty fields
if (empty($email) || empty($password)) {
    die("Email and password are required.");
}


// Find user by email
$sql = "SELECT id, name, email, password FROM users WHERE email = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();


// Check if user exists
if ($result->num_rows === 0) {
    die("Invalid email or password.");
}


// Get user data
$user = $result->fetch_assoc();


// Verify password
if (!password_verify($password, $user["password"])) {
    die("Invalid email or password.");
}


// Store user information in session
$_SESSION["user_id"] = $user["id"];
$_SESSION["user_name"] = $user["name"];
$_SESSION["user_email"] = $user["email"];


// Login successful
header("Location: dashboard.php");
exit;

?>