<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WareNova Login</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="login_page.css">

</head>
<body>

<div class="container">

    <!-- Left Side -->
    <div class="left-panel">

        <div class="overlay">

            <h1>WareNova</h1>

            <p>Inventory Management System</p>

            <span>Manage Your Inventory Smartly</span>

        </div>

    </div>

    <!-- Right Side -->
    <div class="right-panel">

        <div class="login-box">

            <h2>Welcome Back</h2>

            <p class="subtitle">Login to continue</p>

            <?php
            if(isset($_GET['error'])){
                echo "<div class='error'>
                        <i class='fa-solid fa-circle-exclamation'></i>
                        Invalid Username or Password
                      </div>";
            }
            ?>

            <form action="authenticate.php" method="POST">

                <!-- Username -->
                <div class="input-box">

                    <i class="fa-solid fa-user"></i>

                    <input
                        type="text"
                        name="username"
                        placeholder="Username"
                        required>

                </div>

                <!-- Password -->
                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required>

                    <i class="fa-solid fa-eye toggle-password"
                       id="togglePassword"></i>

                </div>

                <div class="options">

                    <label>

                        <input type="checkbox">

                        Remember me

                    </label>

                    <a href="#">Forgot Password?</a>

                </div>

                <button type="submit" class="login-btn">

                    Login

                </button>

            </form>

            <div class="register">

                Don't have an account?

                <a href="registration.php">

                    Create Account

                </a>

            </div>

        </div>

    </div>

</div>

<script src="login_js.js"></script>

</body>
</html>