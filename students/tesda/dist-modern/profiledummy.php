<?php
// Mock user data for front-end display
$user = [
    'username' => 'John Doe',
    'userType' => 'Student'
];
$currentPicture = 'default-avatar.png'; // default picture

$successMessage = '';
$errorMessage = '';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - Asly LMS</title>
    <link rel="stylesheet" href="./assets/main-D9K-blpF.css">
</head>
<body class="admin-layout">

<div class="admin-wrapper" id="admin-wrapper">

    <?php 
    // Include your existing sidebar & top menu template
    include 'topAndSidebar.php'; 
    ?>

    <main class="admin-main">
        <div class="container-fluid p-4 p-lg-5">
            <h2 class="mb-4">Profile Settings</h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
            <?php endif; ?>
            <?php if ($errorMessage): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
            <?php endif; ?>

            <ul class="nav nav-tabs mb-4">
                <li class="nav-item"><a class="nav-link active" href="#view-profile" data-tab>View Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#edit-profile" data-tab>Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#change-password" data-tab>Change Password</a></li>
            </ul>

            <div class="tab-content">

                <!-- View Profile -->
                <div id="view-profile" class="tab-pane active">
                    <div class="card shadow-sm p-4" style="max-width: 500px;">
                        <div class="text-center mb-3">
                            <img src="<?= htmlspecialchars($currentPicture) ?>" alt="Profile Picture" class="rounded-circle" width="150" height="150">
                        </div>
                        <h5 class="text-center mb-1"><?= htmlspecialchars($user['username']) ?></h5>
                        <p class="text-center text-muted mb-4"><?= htmlspecialchars($user['userType']) ?></p>
                    </div>
                </div>

                <!-- Edit Profile -->
                <div id="edit-profile" class="tab-pane">
                    <div class="card shadow-sm p-4" style="max-width: 500px;">
                        <form id="editProfileForm">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user['username']) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Change Profile Picture</label>
                                <input type="file" name="profile_picture" class="form-control" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                <button type="button" class="btn btn-danger" onclick="deletePicture()">Delete Picture</button>
                            </div>
                            <div class="text-center mb-3">
                                <img id="preview" src="<?= htmlspecialchars($currentPicture) ?>" class="rounded-circle" width="120" height="120">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password -->
                <div id="change-password" class="tab-pane">
                    <div class="card shadow-sm p-4" style="max-width: 500px;">
                        <form id="changePasswordForm">
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Tab navigation
    const tabs = document.querySelectorAll('[data-tab]');
    const panes = document.querySelectorAll('.tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', (e) => {
            e.preventDefault();
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const target = document.querySelector(tab.getAttribute('href'));
            panes.forEach(p => p.classList.remove('active'));
            target.classList.add('active');
        });
    });

    // Mock form submit
    document.getElementById('editProfileForm').addEventListener('submit', e => {
        e.preventDefault();
        alert('Profile updated (mock, not saved to database)');
    });
    document.getElementById('changePasswordForm').addEventListener('submit', e => {
        e.preventDefault();
        alert('Password changed (mock, not saved to database)');
    });
});

// Preview uploaded image
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        document.getElementById('preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Delete picture mock
function deletePicture() {
    if(confirm('Delete profile picture?')) {
        document.getElementById('preview').src = 'default-avatar.png';
        alert('Profile picture deleted (mock)');
    }
}
</script>

</body>
</html>
