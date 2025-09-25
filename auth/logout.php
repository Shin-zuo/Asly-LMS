<?php
session_start();
require_once '../config/database.php';

// If user has a remember_token cookie, delete it from DB
if (isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    // Delete token record from DB
    $stmt = $conn->prepare("DELETE FROM user_tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    // Expire the cookie in the browser
    setcookie("remember_token", "", time() - 3600, "/", "", false, true);
}

// Destroy session completely
$_SESSION = [];
session_unset();
session_destroy();

// Redirect back to login
header("Location: ../auth/login.php");
exit();
