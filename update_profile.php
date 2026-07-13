<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

$oldUsername = $_SESSION['username'];

$fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$gmail = trim($_POST['gmail']);

// Check if new username or email already exists (except current user)
$check = "SELECT * FROM users
          WHERE (username='$username' OR gmail='$gmail')
          AND username != '$oldUsername'";

$result = $conn->query($check);

if ($result->num_rows > 0) {

    echo "<script>
            alert('Username or Email already exists!');
            window.location.href='edit_profile.php';
          </script>";
    exit();

}

// Update Profile
$sql = "UPDATE users
        SET
        fullname='$fullname',
        username='$username',
        gmail='$gmail'
        WHERE username='$oldUsername'";

if ($conn->query($sql) === TRUE) {

    // Update Session
    $_SESSION['username'] = $username;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['gmail'] = $gmail;

    echo "<script>
            alert('Profile Updated Successfully!');
            window.location.href='profile.php';
          </script>";

} else {

    echo "<script>
            alert('Update Failed!');
            window.location.href='edit_profile.php';
          </script>";

}

$conn->close();
?>