<?php
// Session
session_start();

// Koneksi database
require_once '../config/connection.php';

// Cek apakah user sudah login
if (isset($_SESSION['user_id'])) {
    $email = $_SESSION['email'];
} elseif (isset($_COOKIE['user_email'])) {
    $email = $_COOKIE['user_email'];

    // Validasi email
    $query = "SELECT * FROM tbl_users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Set session dari cookie
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
    } else {
        // Cookie tidak valid, redirect ke login
        setcookie('user_email', '', time() - 3600, "/");
        header('Location: ../auth/login.php');
        exit();
    }
} else {
    // Tidak ada session atau cookie, redirect ke login
    header('Location: ../auth/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Landing Page | Home</title>

  <!-- Cdn Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">ikhsan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        <button class="btn btn-danger" type="button">Logout</button>
        <script>
          document.querySelector('.btn-primary').addEventListener('click', function () {
            window.location.href = '../php/process_logout.php';
          });
        </script>

      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1>Selamat Datang Di Landing Page</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula justo quis libero
        ultricies, a elementum ex convallis.</p>
      <a href="#about" class="btn btn-light btn-lg">Learn More</a>
    </div>
  </header>

  <!-- Footer -->
  <footer class="bg-light text-center py-4">
    <p class="mb-0">&copy; 2024 ikhsan. All rights reserved.</p>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>