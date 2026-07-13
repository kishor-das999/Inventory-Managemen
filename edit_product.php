<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require "db.php";

if (!isset($_GET['id'])) {
    header("Location: home_page.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header("Location: home_page.php");
    exit();
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:420px;
            background:#fff;
            padding:30px;
            border-radius:10px;
            box-shadow:0 5px 15px rgba(0,0,0,.2);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
            color:#333;
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:6px;
            font-size:16px;
        }

        .btn{
            width:100%;
            padding:12px;
            background:#2563eb;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-size:16px;
        }

        .btn:hover{
            background:#1d4ed8;
        }

        .back{
            display:block;
            text-align:center;
            margin-top:15px;
            text-decoration:none;
            color:#555;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Edit Product</h2>

    <form action="update_product.php" method="POST">

        <input
            type="hidden"
            name="id"
            value="<?php echo $row['id']; ?>">

        <input
            type="text"
            name="product_name"
            value="<?php echo $row['product_name']; ?>"
            required>

        <input
            type="number"
            step="0.01"
            name="product_price"
            value="<?php echo $row['product_price']; ?>"
            required>

        <input
            type="number"
            name="product_stock"
            value="<?php echo $row['product_stock']; ?>"
            required>

        <button class="btn" type="submit">
            Update Product
        </button>

    </form>

    <a class="back" href="home_page.php">
        ← Back to Dashboard
    </a>

</div>

</body>
</html>