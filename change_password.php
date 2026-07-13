<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Change Password</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fc;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.box{

width:420px;

background:white;

padding:30px;

border-radius:12px;

box-shadow:0 5px 15px rgba(0,0,0,.15);

}

h2{

text-align:center;

margin-bottom:25px;

color:#2563eb;

}

input{

width:100%;

padding:12px;

margin:10px 0;

border:1px solid #ccc;

border-radius:8px;

}

button{

width:100%;

padding:12px;

background:#2563eb;

color:white;

border:none;

border-radius:8px;

cursor:pointer;

font-size:16px;

}

button:hover{

background:#1d4ed8;

}

.back{

display:block;

text-align:center;

margin-top:15px;

text-decoration:none;

}

</style>

</head>

<body>

<div class="box">

<h2>Change Password</h2>

<form action="update_password.php" method="POST">

<input
type="password"
name="current_password"
placeholder="Current Password"
required>

<input
type="password"
name="new_password"
placeholder="New Password"
required>

<input
type="password"
name="confirm_password"
placeholder="Confirm New Password"
required>

<button type="submit">

Update Password

</button>

</form>

<a class="back" href="profile.php">

← Back to Profile

</a>

</div>

</body>

</html>