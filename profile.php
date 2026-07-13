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

$product = $conn->query("SELECT COUNT(*) AS total FROM products");
$totalProduct = $product->fetch_assoc()['total'];

$stock = $conn->query("SELECT SUM(product_stock) AS stock FROM products");
$totalStock = $stock->fetch_assoc()['stock'];

$value = $conn->query("SELECT SUM(product_price * product_stock) AS value FROM products");
$totalValue = $value->fetch_assoc()['value'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Profile</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Poppins,sans-serif;
}

body{
background:#f4f7fc;
}

.container{
display:flex;
}

.sidebar{
width:220px;
background:#1f2937;
height:100vh;
color:white;
padding-top:30px;
}

.logo{
text-align:center;
margin-bottom:40px;
}

.logo i{
font-size:45px;
color:#3b82f6;
}

.logo h2{
margin-top:10px;
}

.sidebar ul{
list-style:none;
}

.sidebar ul li{
padding:15px 25px;
}

.sidebar ul li:hover{
background:#2563eb;
}

.sidebar ul li a{
color:white;
text-decoration:none;
display:block;
}

.main{
flex:1;
padding:40px;
}

.profile-card{

max-width:900px;

margin:auto;

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}

.profile-top{

text-align:center;

}

.profile-top img{

width:130px;

height:130px;

border-radius:50%;

object-fit:cover;

border:5px solid #2563eb;

}

.profile-top h2{

margin-top:15px;

}

.role{

color:#2563eb;

font-weight:bold;

margin-top:5px;

}

.info{

margin-top:35px;

display:grid;

grid-template-columns:1fr 1fr;

gap:20px;

}

.box{

background:#f7f9fc;

padding:20px;

border-radius:10px;

}

.box h4{

margin-bottom:10px;

color:#2563eb;

}

.stats{

display:grid;

grid-template-columns:repeat(3,1fr);

gap:20px;

margin-top:30px;

}

.card{

background:#2563eb;

color:white;

padding:20px;

text-align:center;

border-radius:10px;

}

.buttons{

margin-top:35px;

text-align:center;

}

.buttons a{

text-decoration:none;

padding:12px 25px;

margin:8px;

border-radius:8px;

color:white;

display:inline-block;

}

.edit{

background:#2563eb;

}

.pass{

background:#f59e0b;

}

.logout{

background:#ef4444;

}

</style>

</head>

<body>

<div class="container">

<div class="sidebar">

<div class="logo">

<i class="fa-solid fa-boxes-stacked"></i>

<h2>Inventory</h2>

</div>

<ul>

<li>

<a href="home_page.php">

<i class="fa-solid fa-house"></i>

Home

</a>

</li>

<li style="background:#2563eb;">

<a href="profile.php">

<i class="fa-solid fa-user"></i>

Profile

</a>

</li>

</ul>

</div>

<div class="main">

<div class="profile-card">

<div class="profile-top">

<img src="images/default.png">

<h2><?php echo $user['fullname']; ?></h2>

<div class="role"><?php echo $user['role']; ?></div>

</div>

<div class="info">

<div class="box">

<h4>Username</h4>

<p><?php echo $user['username']; ?></p>

</div>

<div class="box">

<h4>Email</h4>

<p><?php echo $user['gmail']; ?></p>

</div>

<div class="box">

<h4>Joined</h4>

<p><?php echo $user['created_at']; ?></p>

</div>

<div class="box">

<h4>Status</h4>

<p style="color:green;">● Online</p>

</div>

</div>

<div class="stats">

<div class="card">

<h3><?php echo $totalProduct; ?></h3>

<p>Products</p>

</div>

<div class="card">

<h3><?php echo $totalStock; ?></h3>

<p>Total Stock</p>

</div>

<div class="card">

<h3><?php echo number_format($totalValue,2); ?> Tk</h3>

<p>Inventory Value</p>

</div>

</div>

<div class="buttons">

<a href="edit_profile.php" class="edit">

<i class="fa-solid fa-user-pen"></i>

Edit Profile

</a>

<a href="change_password.php" class="pass">

<i class="fa-solid fa-key"></i>

Change Password

</a>

<a href="logout.php" class="logout">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>

</div>

</div>

</div>

</div>

</body>

</html>