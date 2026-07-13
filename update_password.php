<?php

session_start();

require "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

$current = $_POST['current_password'];
$new = $_POST['new_password'];
$confirm = $_POST['confirm_password'];

if ($new != $confirm) {

    echo "<script>
    alert('New Password and Confirm Password do not match!');
    window.location='change_password.php';
    </script>";

    exit();

}

$sql = "SELECT * FROM users WHERE username='$username'";

$result = $conn->query($sql);

$user = $result->fetch_assoc();

if ($current != $user['password']) {

    echo "<script>
    alert('Current Password is incorrect!');
    window.location='change_password.php';
    </script>";

    exit();

}

$update = "UPDATE users
SET password='$new'
WHERE username='$username'";

if ($conn->query($update)) {

    echo "<script>
    alert('Password Updated Successfully!');
    window.location='profile.php';
    </script>";

} else {

    echo "<script>
    alert('Update Failed!');
    window.location='change_password.php';
    </script>";

}

$conn->close();

?>