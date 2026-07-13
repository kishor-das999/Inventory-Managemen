<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

// ID আছে কিনা চেক
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Delete Query
    $sql = "DELETE FROM products WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Product Deleted Successfully!');
                window.location.href='home_page.php';
              </script>";

    } else {

        echo "<script>
                alert('Failed to Delete Product!');
                window.location.href='home_page.php';
              </script>";

    }

} else {

    header("Location: home_page.php");
    exit();

}

$conn->close();

?>