<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: dashboard.php?login=success");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="auth-container">
  <h2>Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
  <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
</div>
<div id="toast" class="toast"></div>
<?php if (isset($_GET['success']) && $_GET['success'] == 'registered'): ?>
<script>
window.addEventListener('DOMContentLoaded', () => { showToast("Account created successfully!"); });
</script>
<?php endif; ?>
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

