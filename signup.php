<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $password);

    if ($stmt->execute()) {
        header("Location: login.php?success=registered");
        exit;
    } else {
        $error = "Email already exists or something went wrong.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sign Up</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth-container">
  <h2>Create Account</h2>
  <form method="POST">
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Sign Up</button>
  </form>
  <p>Already have an account? <a href="login.php">Login</a></p>
  <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
<div id="toast" class="toast"></div>
<script>
function showToast(message) {
  const toast = document.getElementById("toast");
  toast.textContent = message;
  toast.className = "toast show";
  setTimeout(() => { toast.className = "toast"; }, 3500);
}
</script>
</body>
</html>

