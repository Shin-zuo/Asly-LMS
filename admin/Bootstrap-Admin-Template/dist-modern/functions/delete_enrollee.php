<?php
// Include your database connection
require_once '../../../../config/database.php'; // adjust path if needed
session_start();


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM enrollees WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Enrollee deleted successfully.";
    } else {
        $_SESSION['error'] = "Error deleting enrollee. Please try again.";
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Invalid enrollee ID.";
}

// Redirect back to the enrollee list page
header("Location: ../userManagement.php"); // change to your actual page
exit();
?>
