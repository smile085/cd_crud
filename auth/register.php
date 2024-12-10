<?php
// Session
session_start();

// Cek apakah user sudah login
if (isset($_SESSION['user_id']) || isset($_COOKIE['user_email'])) {
    header('Location: ../pages/index.php');
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
    <title>Register</title>

    <!-- Cdn Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Css -->
    <style>
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .register-btn {
            background-color: #007bff;
            color: #fff;
            width: 100%;
        }

        .register-btn:hover {
            background-color: #0056b3;
        }

        .form-text {
            font-size: 0.9em;
            color: #6c757d;
        }

        .error-modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0.7);
            visibility: hidden;
        }

        .error-modal.show {
            visibility: visible;
        }

        .modal-content {
            background-color: #007bff;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            width: 80%;
            max-width: 400px;
        }

        .close-btn {
            background-color: transparent;
            color: #fff;
            border: 1px solid #fff;
            padding: 10px 20px;
            margin-top: 15px;
            cursor: pointer;
        }
    </style>
    
</head>

<body class="bg-light">

    <!-- Register Form Section -->
    <div class="register-container">
        <h2 class="text-center">Register</h2>
        <form action="../php/process_register.php" method="POST">
            <!-- Name Input -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required
                    placeholder="Enter your email">
            </div>

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    placeholder="Enter your password">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn register-btn">Register</button>
        </form>

        <!-- Login Link -->
        <div class="mt-3 text-center">
            <p class="form-text">Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>

    <!-- Error Modal -->
    <?php if (isset($_GET['error']) && $_GET['error'] == 'email_exists'): ?>
    <div id="error-modal" class="error-modal">
        <div class="modal-content">
            <h3 class="text-white">Oops! Ada yang salah...</h3>
            <p class="text-white">Email sudah terdaftar! Silahkan ganti.</p>
            <button id="close-modal" class="close-btn">Close</button>
        </div>
    </div>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const errorModal = document.getElementById('error-modal');
            const closeModalBtn = document.getElementById('close-modal');

            // Show the modal if there is an error (ensure it's visible)
            if (errorModal && window.location.search.includes('error=email_exists')) {
                errorModal.classList.add('show');
            }

            // Close the modal when the close button is clicked
            if (closeModalBtn) {
                closeModalBtn.addEventListener('click', function () {
                    errorModal.classList.remove('show');
                });
            }
        });
    </script>

</body>

</html>