<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

// Form Submit হয়েছে কিনা চেক
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_name = trim($_POST['product_name']);
    $product_price = trim($_POST['product_price']);
    $product_stock = trim($_POST['product_stock']);

    // Empty Check
    if (empty($product_name) || empty($product_price) || empty($product_stock)) {

        echo "<script>
                alert('Please fill all fields.');
                window.location.href='home_page.php';
              </script>";
        exit();
    }

    // Product Insert
    $sql = "INSERT INTO products (product_name, product_price, product_stock)
            VALUES ('$product_name', '$product_price', '$product_stock')";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Product Added Successfully!');
                window.location.href='home_page.php';
              </script>";

    } else {

        echo "<script>
                alert('Failed to Add Product!');
                window.location.href='home_page.php';
              </script>";
    }

    $conn->close();
}

?>