<?php
session_start();
require_once __DIR__ . "/../config/database.php"; // adjust path

// ----------------------
// Prevent browser caching
// ----------------------
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// ----------------------
// Auto-login using remember_token
// ----------------------
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];

    $sql = "SELECT ut.user_id, u.username, u.userType
            FROM user_tokens ut
            JOIN users u ON ut.user_id = u.id
            WHERE ut.token = ? AND ut.expires_at > NOW()";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Restore session
        $_SESSION['user_id']  = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['userType'] = $user['userType'];
    }
}

// ----------------------
// Redirect to login if not logged in
// ----------------------
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../auth/login.php"); // adjust path
    exit();
}

// ----------------------
// Optional: role-based access
// Usage: define $requiredRole in the page before including auth_check.php
// Example: $requiredRole = 'Admin';
// ----------------------
if (isset($requiredRole) && $_SESSION['userType'] !== $requiredRole) {
    // Optional: redirect to unauthorized page or home
    header("Location: ../../../auth/login.php"); 
    exit();
}
