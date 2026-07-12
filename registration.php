<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WareNova Registration</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link rel="stylesheet" href="login_page.css">

</head>
<body>

<div class="container">

    <div class="left-panel">

        <div class="overlay">

            <h1>WareNova</h1>

            <p>Inventory Management System</p>

            <span>Manage Your Inventory Smartly</span>

        </div>

    </div>

    <div class="right-panel">

        <div class="login-box">

            <h2>Create Account</h2>

            <p class="subtitle">Register to continue</p>

            <?php
            if(isset($_GET['error'])){
                echo "<div class='error'>".$_GET['error']."</div>";
            }
            ?>

            <form action="register_process.php" method="POST">

                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text"
                    name="fullname"
                    placeholder="Full Name"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email"
                    name="email"
                    placeholder="Email"
                    required>
                </div>

                <div class="input-box">
                    <i class="fa-solid fa-user"></i>
                    <input type="text"
                    name="username"
                    placeholder="Username"
                    required>
                </div>

                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input type="password"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required>

                    <i class="fa-solid fa-eye toggle-password"
                    id="togglePassword"></i>

                </div>


                <button class="login-btn">

                    Register

                </button>

            </form>

            <div class="register">

                Already have an account?

                <a href="login.php">

                    Login

                </a>

            </div>

        </div>

    </div>

</div>

<script src="login_js.js"></script>

</body>
</html>