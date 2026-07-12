<?php

require "db.php";
$fullname = trim($_POST['fullname']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Check duplicate username or email
$check = "SELECT * FROM users WHERE username='$username' OR gmail='$email'";
$result = $conn->query($check);

if ($result->num_rows > 0) {

    echo "<script>
            alert('Username or Email already exists!');
            window.location.href='registration.php';
          </script>";

} else {

    $sql = "INSERT INTO users (fullname, username, gmail, password)
        VALUES ('$fullname', '$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {

        header("Location: success.php");
        exit();

    } else {

        echo "Registration Failed : " . $conn->error;

    }

}

$conn->close();

?>