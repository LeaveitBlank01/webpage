<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard">
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <h2>Menu</h2>
      <button class="close-btn" id="closeBtn">×</button>
    </div>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="#" id="userDetailsBtn">User Details</a></li>
      <li><a href="#" id="logoutBtn">Logout</a></li>
    </ul>
  </aside>

  <div class="main-content">
    <header>
      <button class="menu-btn" id="menuBtn">≡</button>
      <h1>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?></h1>
    </header>

    <section>
      <h2>Dashboard</h2>
      <p>This is your secure user dashboard.</p>

      <div id="userDetails" class="hidden">
        <h3>User Details</h3>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
        <p><strong>ID:</strong> <?php echo $_SESSION['user_id']; ?></p>
      </div>
    </section>
  </div>
</div>
<div class="popup-overlay" id="popupOverlay">
  <div class="popup-box">
    <h2>Log Out</h2>
    <p>Are you sure you want to log out?</p>
    <div class="popup-buttons">
      <button id="cancelLogout" class="btn cancel">Cancel</button>
      <button id="confirmLogout" class="btn confirm">Log Out</button>
    </div>
  </div>
</div>
<div id="toast" class="toast"></div>
<script>
const sidebar = document.getElementById('sidebar');
const menuBtn = document.getElementById('menuBtn');
const closeBtn = document.getElementById('closeBtn');
const userDetailsBtn = document.getElementById('userDetailsBtn');
const logoutBtn = document.getElementById('logoutBtn');
menuBtn.addEventListener('click', () => sidebar.classList.add('open'));
closeBtn.addEventListener('click', () => sidebar.classList.remove('open'));
userDetailsBtn.addEventListener('click', () => {
  document.getElementById('userDetails').classList.toggle('hidden');
});
const popup = document.getElementById('popupOverlay');
const cancelBtn = document.getElementById('cancelLogout');
const confirmBtn = document.getElementById('confirmLogout');
logoutBtn.addEventListener('click', (e) => { e.preventDefault(); popup.classList.add('show'); });
cancelBtn.addEventListener('click', () => popup.classList.remove('show'));
confirmBtn.addEventListener('click', () => { window.location.href = 'logout.php'; });
function showToast(message) {
  const toast = document.getElementById("toast");
  toast.textContent = message;
  toast.className = "toast show";
  setTimeout(() => { toast.className = "toast"; }, 3500);
}
</script>
<?php if (isset($_GET['login']) && $_GET['login'] == 'success'): ?>
<script>
window.addEventListener('DOMContentLoaded', () => { showToast("Welcome back, <?php echo htmlspecialchars($_SESSION['fullname']); ?>!"); });
</script>
<?php endif; ?>
</body>
</html>

