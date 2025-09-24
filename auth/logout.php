<?php
session_start();
require_once '../config/database.php';

// If user has a remember_me cookie, delete it from DB
if (isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];

    // Find matching token in DB
    $sql = "SELECT id, token FROM user_tokens";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($token, $row['token'])) {
                // Delete token record from DB
                $deleteSql = "DELETE FROM user_tokens WHERE id = ?";
                $stmt = $conn->prepare($deleteSql);
                $stmt->bind_param("i", $row['id']);
                $stmt->execute();
                break;
            }
        }
    }

    // Expire the cookie
    setcookie("remember_me", "", time() - 3600, "/", "", false, true);
}

// Destroy session completely
$_SESSION = [];
session_unset();
session_destroy();

// Redirect back to login
header("Location: ../auth/login.php");
exit();
