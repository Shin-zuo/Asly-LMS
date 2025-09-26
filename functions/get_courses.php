<?php
require_once '../config/database.php';

if (isset($_GET['educationId'])) {
    $educationId = intval($_GET['educationId']);

    $sql = "SELECT courseId, courseCode, course 
            FROM course 
            WHERE educationId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $educationId);
    $stmt->execute();
    $result = $stmt->get_result();

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }

    echo json_encode($courses);
}
?>
