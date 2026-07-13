<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_stock = $_POST['product_stock'];

    if (empty($product_name) || empty($product_price) || empty($product_stock)) {

        echo "<script>
                alert('Please fill all fields!');
                window.location.href='home_page.php';
              </script>";
        exit();
    }

    $sql = "UPDATE products
            SET
                product_name='$product_name',
                product_price='$product_price',
                product_stock='$product_stock'
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
                alert('Product Updated Successfully!');
                window.location.href='home_page.php';
              </script>";

    } else {

        echo "<script>
                alert('Failed to Update Product!');
                window.location.href='home_page.php';
              </script>";

    }

}

$conn->close();

?>