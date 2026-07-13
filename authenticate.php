<?php
session_start();

require "db.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {

    $_SESSION['username'] = $username;

    header("Location: home_page.php");

} else {

    header("Location: login.php?error=1");

}

$conn->close();
?>