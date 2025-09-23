<?php
require_once '../config/database.php';

session_start(); // start session at the top

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username exists in database
    $sql = "SELECT id, userType, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Plain-text password check (basic)
        if ($password === $user['password']) {
            // Save user info in session
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['username']  = $user['username'];
            $_SESSION['userType']  = $user['userType'];

            // Redirect to dashboard (you can change per userType if needed)
            header("Location: /mobapp-master/mobapp-master/admin/Bootstrap-Admin-Template/dist-modern/index.php");
exit();

        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/css/style.css">





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/login.css">
  <title>Document</title>
</head>

<body>
  <div class="login-dark">
     <form method="post">
      <h2 class="sr-only">Login Form</h2>
      <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>
      <div class="form-group">
        <input class="form-control" type="text" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input class="form-control" type="password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-block" type="submit">Log In</button>
      </div>
      <a href="#" class="forgot">Forgot your email or password?</a>
    </form>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>