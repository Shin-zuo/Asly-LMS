<?php
require_once '../config/database.php';

if (isset($_GET['educationId'])) {
    $educationId = intval($_GET['educationId']);

    // Fetch year levels based on selected education level
    $sql = "SELECT yearLevel, yearName 
            FROM yearlevel 
            WHERE educationId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $educationId);
    $stmt->execute();
    $result = $stmt->get_result();

    $years = [];
    while ($row = $result->fetch_assoc()) {
        $years[] = $row;
    }

    echo json_encode($years);
}
?>
