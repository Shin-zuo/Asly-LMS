<?php
$requiredRole = 'Student'; // only Students can access this page
require_once '../../../auth/auth_check.php';
require_once '../../../config/database.php'; // your DB connection

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../auth/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user info
$sql = "SELECT username, userType FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Fetch current profile picture
$sql_pic = "SELECT picture FROM profiles WHERE acctId = ?";
$stmt_pic = $conn->prepare($sql_pic);
$stmt_pic->bind_param("i", $user_id);
$stmt_pic->execute();
$res_pic = $stmt_pic->get_result();
$profile = $res_pic->fetch_assoc();
$currentPicture = $profile ? $profile['picture'] : null;

$successMessage = '';
$errorMessage = '';

// Handle upload/delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete profile picture
    if (isset($_POST['delete_picture'])) {
        if (!empty($currentPicture) && file_exists("../../../uploads/" . $currentPicture)) {
            unlink("../../../uploads/" . $currentPicture);
        }

        $delete = "UPDATE profiles SET picture = NULL WHERE acctId = ?";
        $stmt_del = $conn->prepare($delete);
        $stmt_del->bind_param("i", $user_id);
        $stmt_del->execute();

        $currentPicture = null;
        $successMessage = "Profile picture deleted successfully.";
    }

    // Upload new picture
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_picture'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','gif'];

        if (in_array($ext, $allowed)) {
            $newName = uniqid('profile_', true) . '.' . $ext;
            $uploadPath = "../../../uploads/" . $newName;

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                // Insert or update
                $check = $conn->prepare("SELECT id FROM profiles WHERE acctId = ?");
                $check->bind_param("i", $user_id);
                $check->execute();
                $res = $check->get_result();

                if ($res->num_rows > 0) {
                    $update = $conn->prepare("UPDATE profiles SET picture = ? WHERE acctId = ?");
                    $update->bind_param("si", $newName, $user_id);
                    $update->execute();
                } else {
                    $insert = $conn->prepare("INSERT INTO profiles (acctId, picture) VALUES (?, ?)");
                    $insert->bind_param("is", $user_id, $newName);
                    $insert->execute();
                }

                // Delete old picture
                if (!empty($currentPicture) && file_exists("../../../uploads/" . $currentPicture)) {
                    unlink("../../../uploads/" . $currentPicture);
                }

                $currentPicture = $newName;
                $successMessage = "Profile picture updated successfully.";
            } else {
                $errorMessage = "Failed to upload file.";
            }
        } else {
            $errorMessage = "Invalid file type. Allowed: jpg, jpeg, png, gif.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Asly LMS</title>
    <link rel="stylesheet" crossorigin href="./assets/main-D9K-blpF.css">
</head>
<body class="admin-layout">
<div class="admin-wrapper" id="admin-wrapper">

    <?php include 'topAndSidebar.php'; ?>

    <main class="admin-main">
        <div class="container-fluid p-4 p-lg-5">
            <h2 class="mb-4">My Profile</h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
            <?php endif; ?>
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
            <?php endif; ?>

            <div class="card shadow-sm p-4" style="max-width: 500px;">
                <div class="text-center mb-3">
                    <img src="<?= $currentPicture ? '../../../uploads/' . htmlspecialchars($currentPicture) : '../../../assets/default-avatar.png' ?>"
                         alt="Profile Picture"
                         class="rounded-circle"
                         width="150" height="150"
                         style="object-fit: cover;">
                </div>
                <h5 class="text-center mb-1"><?= htmlspecialchars($user['username']) ?></h5>
                <p class="text-center text-muted mb-4"><?= htmlspecialchars($user['userType']) ?></p>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Change Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <button type="submit" name="delete_picture" class="btn btn-danger" onclick="return confirm('Delete your profile picture?')">Delete</button>
                    </div>
                </form>
            </div>

        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.querySelector('[data-sidebar-toggle]');
    const wrapper = document.getElementById('admin-wrapper');
    if(toggleButton && wrapper) {
        const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
        if(isCollapsed) wrapper.classList.add('sidebar-collapsed');
        toggleButton.addEventListener('click', () => {
            wrapper.classList.toggle('sidebar-collapsed');
            toggleButton.classList.toggle('is-active');
            localStorage.setItem('sidebar-collapsed', wrapper.classList.contains('sidebar-collapsed'));
        });
    }
});
</script>

</body>
</html>
