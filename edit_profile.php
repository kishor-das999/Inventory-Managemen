<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Profile</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#f4f7fc;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.container{

width:500px;

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 5px 20px rgba(0,0,0,.15);

}

h2{

text-align:center;

margin-bottom:30px;

color:#2563eb;

}

.input-group{

margin-bottom:20px;

}

.input-group label{

display:block;

margin-bottom:8px;

font-weight:600;

}

.input-group input{

width:100%;

padding:12px;

border:1px solid #ccc;

border-radius:8px;

font-size:15px;

}

button{

width:100%;

padding:13px;

background:#2563eb;

color:white;

border:none;

border-radius:8px;

font-size:16px;

cursor:pointer;

}

button:hover{

background:#1d4ed8;

}

.back{

display:block;

text-align:center;

margin-top:15px;

text-decoration:none;

color:#2563eb;

font-weight:bold;

}

</style>

</head>

<body>

<div class="container">

<h2>Edit Profile</h2>

<form action="update_profile.php" method="POST">

<div class="input-group">

<label>Full Name</label>

<input
type="text"
name="fullname"
value="<?php echo htmlspecialchars($user['fullname']); ?>"
required>

</div>

<div class="input-group">

<label>Username</label>

<input
type="text"
name="username"
value="<?php echo htmlspecialchars($user['username']); ?>"
required>

</div>

<div class="input-group">

<label>Email</label>

<input
type="email"
name="gmail"
value="<?php echo htmlspecialchars($user['gmail']); ?>"
required>

</div>

<button type="submit">

<i class="fa-solid fa-floppy-disk"></i>

Save Changes

</button>

</form>

<a href="profile.php" class="back">

← Back to Profile

</a>

</div>

</body>

</html>