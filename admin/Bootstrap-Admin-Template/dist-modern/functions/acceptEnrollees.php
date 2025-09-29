<?php
require_once '../../../../config/database.php'; // adjust path if needed

if (isset($_GET['id'])) {
    $enrolleeId = intval($_GET['id']);

    // 1. Get enrollee details
    $sql = "SELECT * FROM enrollees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $enrolleeId);
    $stmt->execute();
    $result = $stmt->get_result();
    $enrollee = $result->fetch_assoc();

    if ($enrollee) {
        // -------------------------
        // 2. Generate custom Student ID
        // -------------------------
        $year = date('y', strtotime($enrollee['dateEnrolled'])); // e.g. "25" for 2025

        // Get the last student ID for this year
        $sqlLastId = "SELECT id FROM students WHERE id LIKE ? ORDER BY id DESC LIMIT 1";
        $likeYear = $year . "%";
        $stmtLast = $conn->prepare($sqlLastId);
        $stmtLast->bind_param("s", $likeYear);
        $stmtLast->execute();
        $resultLast = $stmtLast->get_result();

        if ($rowLast = $resultLast->fetch_assoc()) {
            // Extract the numeric sequence from last ID
            $lastSeq = intval(substr($rowLast['id'], 2));
            $newSeq = $lastSeq + 1;
        } else {
            $newSeq = 1; // first student of this year
        }

        // Final Student ID format: YY + 5-digit padded sequence
        $studentId = $year . str_pad($newSeq, 5, '0', STR_PAD_LEFT);

        // -------------------------
        // 3. Insert into students
        // -------------------------
        $insertStudent = "INSERT INTO students 
            (id, firstName, middleName, lastName, prefix, courseId, email, contactNumber, 
            lastSchoolAttended, lastSchoolYr, birthDate, gender, dateEnrolled, educationalAttainment) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt2 = $conn->prepare($insertStudent);
        $stmt2->bind_param("issssissssssss",
            $studentId,
            $enrollee['firstName'],
            $enrollee['middleInitial'], // map middleInitial → middleName
            $enrollee['lastName'],
            $enrollee['prefix'],
            $enrollee['courseId'],
            $enrollee['email'],
            $enrollee['contactNumber'],
            $enrollee['lastSchoolAttended'],
            $enrollee['lastSchoolYr'],
            $enrollee['birthDate'],
            $enrollee['gender'],
            $enrollee['dateEnrolled'],
            $enrollee['educationalAttainment']
        );

        if ($stmt2->execute()) {
            // -------------------------
            // 4. Update enrollee status
            // -------------------------
            $updateEnrollee = "UPDATE enrollees SET status = 'Accepted' WHERE id = ?";
            $stmt3 = $conn->prepare($updateEnrollee);
            $stmt3->bind_param("i", $enrolleeId);
            $stmt3->execute();

            // -------------------------
            // 5. Create username & password
            // -------------------------
            $username = $studentId; // student ID as username

            // password = first 2 letters of last name (capitalized) + '@' + year enrolled
            $lastName = ucfirst(strtolower($enrollee['lastName']));
            $firstTwo = substr($lastName, 0, 2);
            $yearFull = date('Y', strtotime($enrollee['dateEnrolled']));
            $rawPassword = $firstTwo . '@' . $yearFull;

            $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT);

            // -------------------------
            // 6. Insert into users table
            // -------------------------
            $insertUser = "INSERT INTO users (userType, username, password, userId) VALUES (?, ?, ?, ?)";
            $stmt4 = $conn->prepare($insertUser);
            $userType = "Student";
            $stmt4->bind_param("sssi", $userType, $username, $hashedPassword, $studentId);
            $stmt4->execute();

            // ✅ Done
            header("Location: ../userManagement.php?success=1");
            exit();
        } else {
            header("Location: ../userManagement.php?error=" . urlencode("Error inserting student"));
            exit();
        }
    } else {
        header("Location: ../userManagement.php?error=" . urlencode("Enrollee not found"));
        exit();
    }
} else {
    header("Location: ../userManagement.php?error=" . urlencode("No ID provided"));
    exit();
}
?>
