<?php
// Session
session_start();

// Cek apakah user sudah login lewat session atau cookie
if (isset($_SESSION['user_id']) || isset($_COOKIE['user_email'])) {
    // Redirect user yang sudah login ke halaman yang sesuai
    header('Location: pages/index.php');
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
  <title>Landing Page</title>

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
        <button class="btn btn-primary" type="button">Login</button>
        <script>
          document.querySelector('.btn-primary').addEventListener('click', function () {
            window.location.href = 'auth/login.php';
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