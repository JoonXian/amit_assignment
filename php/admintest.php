<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../html/account.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../css/admintest.css">
  <link rel="stylesheet" href="../css/style.css"> <!-- Optional if needed -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>

  <!-- Website Header -->
  <header>
    <a href="#" class="logo"><img src="../img/logo2.png" alt="Logo"></a>

    <ul class="navmenu">
      <li><a href="../html/Accessories.html">Home</a></li>
      <li><a href="../html/Accessories.html">Products</a></li>
      <li><a href="../html/AboutUs.html">About Us</a></li>
      <li><a href="../html/account.php">Login</a></li>
    </ul>

    <div class="navicon">
      <a href="#"><i class='bx bx-search'></i></a>
      <a href="../php/admintest.php"><i class='bx bx-user'></i></a>
      <a href="../php/cart.php"><i class='bx bx-cart'></i></a>
      <a href="../html/account.php" class="btn logout-btn">Logout</a>
    </div>
  </header>

  <!-- Add spacing to push admin content below fixed header -->
  <div style="height: 100px;"></div>

  <!-- Admin Panel Layout -->
  <div class="admin-container">
    <aside class="sidebar">
      <hr>
      <button class="btn btn-sm btn-outline-light mt-2" onclick="toggleDarkMode()">Toggle Dark Mode</button>
      <h2>Admin Panel</h2>
      <ul>
        <li onclick="loadSection('members')">Member List Preview</li>
        <li onclick="loadSection('insert')">Insert New Item</li>
        <li onclick="loadSection('profile')">Update Profile</li>
      </ul>
    </aside>

    <main class="main-content" id="main-content">
      <h2>Welcome to the Admin Dashboard</h2>
      <p>Select an option from the sidebar.</p>
    </main>
  </div>

  <script src="../javascript/admintest.js"></script>
  <script src="../javascript/account.js"></script>
</body>
</html>
