<?php
require 'database/connect.php'; // Skrip koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']);
    $country = $_POST['country']; // Ambil inisial negara dari form

    if (!$terms) {
        header("Location: signup.php?error=You must accept the terms and conditions.");
        exit();
    }

    if ($password !== $confirm_password) {
        header("Location: signup.php?error=Passwords do not match.");
        exit();
    }

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        header("Location: signup.php?error=Email is already taken.");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password, flag) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $username, $email, $hashed_password, $country);

    if ($stmt->execute()) {
        header("Location: login.php?success=Account created successfully. Please login.");
        exit();
    } else {
        header("Location: signup.php?error=An error occurred. Please try again.");
        exit();
    }
}
?>
