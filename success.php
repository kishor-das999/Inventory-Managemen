<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registration Successful</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            background:#f4f6f9;
        }

        .success-box{
            width:400px;
            background:#fff;
            padding:30px;
            text-align:center;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.15);
        }

        .success-box h2{
            color:green;
            margin-bottom:15px;
        }

        .success-box p{
            margin-bottom:20px;
            color:#555;
        }

        .success-box a{
            display:inline-block;
            text-decoration:none;
            background:#0d6efd;
            color:white;
            padding:12px 25px;
            border-radius:5px;
        }

        .success-box a:hover{
            background:#0b5ed7;
        }

    </style>

</head>

<body>

<div class="success-box">

    <h2>Registration Successful!</h2>

    <p>Your account has been created successfully.</p>

    <a href="login.php">Login Now</a>

</div>

</body>
</html>