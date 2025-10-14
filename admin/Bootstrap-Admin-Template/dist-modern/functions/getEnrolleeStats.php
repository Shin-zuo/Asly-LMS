<?php
require_once '../../../../config/database.php'; // adjust path as needed
header('Content-Type: application/json');

// Get enrollees count grouped by course and year
$sql = "
    SELECT 
        c.course AS course_name,
        YEAR(e.dateEnrolled) AS year,
        COUNT(e.id) AS total_enrollees
    FROM enrollees e
    JOIN course c ON e.courseId = c.courseId
    GROUP BY c.course, YEAR(e.dateEnrolled)
    ORDER BY YEAR(e.dateEnrolled), c.course
";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
