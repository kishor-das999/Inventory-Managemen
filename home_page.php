<?php
session_start();
require "db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// ==========================
// Dashboard Statistics
// ==========================

// Total Products
$totalProducts = 0;
$result = $conn->query("SELECT COUNT(*) AS total FROM products");
if ($result) {
    $totalProducts = $result->fetch_assoc()['total'];
}

// Total Stock
$totalStock = 0;
$result = $conn->query("SELECT SUM(product_stock) AS stock FROM products");
if ($result) {
    $row = $result->fetch_assoc();
    $totalStock = $row['stock'] ?? 0;
}

// Total Value
$totalValue = 0;
$result = $conn->query("SELECT SUM(product_price * product_stock) AS value FROM products");
if ($result) {
    $row = $result->fetch_assoc();
    $totalValue = $row['value'] ?? 0;
}

// Low Stock
$lowStock = 0;
$result = $conn->query("SELECT COUNT(*) AS total FROM products WHERE product_stock <= 5");
if ($result) {
    $lowStock = $result->fetch_assoc()['total'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>WareNova Dashboard</title>

<link rel="stylesheet" href="home_page.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<div class="container">

    <!-- ================= Sidebar ================= -->

    <aside class="sidebar">

        <div class="logo">
            <img src="home_logo.png" alt="WareNova Logo">
        </div>

        
        <div class="user-info">

            <h4>
                <?php echo ucfirst($_SESSION['username']); ?>
            </h4>

            <span>Administrator</span>

        </div>

        <ul>

            <li class="active">
                <i class="fa-solid fa-house"></i>
                Home
            </li>

            <li>

                <a href="profile.php">

                    <i class="fa-solid fa-user"></i>

                    Profile

                </a>

            </li>

        </ul>

    </aside>

    <!-- ================= Main ================= -->

    <main class="main">

        <!-- Header -->

        <header>

            <div>

                <h1>Inventory Dashboard</h1>

                <p class="welcome">

                    👋 Welcome back,

                    <strong>

                        <?php echo ucfirst($_SESSION['username']); ?>

                    </strong>

                </p>

                <p id="dateTime"></p>

            </div>

            <div class="header-buttons">

                <button id="addProductBtn">

                    <i class="fa-solid fa-plus"></i>

                    Add Product

                </button>

                <a href="logout.php">

                    <button id="logoutBtn">

                        <i class="fa-solid fa-right-from-bracket"></i>

                        Logout

                    </button>

                </a>

            </div>

        </header>

        <!-- ================= Dashboard Cards ================= -->

        <section class="cards">

            <div class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-box"></i>

                </div>

                <div class="card-info">

                    <h3>Total Products</h3>

                    <h2><?php echo $totalProducts; ?></h2>

                </div>

            </div>

            <div class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-cubes"></i>

                </div>

                <div class="card-info">

                    <h3>Total Stock</h3>

                    <h2><?php echo $totalStock; ?></h2>

                </div>

            </div>

            <div class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-sack-dollar"></i>

                </div>

                <div class="card-info">

                    <h3>Total Value</h3>

                    <h2>

                        <?php echo number_format($totalValue,2); ?>

                        Tk

                    </h2>

                </div>

            </div>

            <div class="card warning">

                <div class="card-icon">

                    <i class="fa-solid fa-triangle-exclamation"></i>

                </div>

                <div class="card-info">

                    <h3>Low Stock</h3>

                    <h2><?php echo $lowStock; ?></h2>

                </div>

            </div>

        </section>

        <!-- ================= Product List ================= -->

        <section class="table-section">

            <div class="table-header">

                <h2>Product List</h2>

                <div class="search-box">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="searchInput"
                        placeholder="Search products...">

                </div>

            </div>
                        <div class="table-responsive">

                <table id="productTable">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Product Name</th>

                            <th>Price</th>

                            <th>Stock</th>

                            <th>Status</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php include "load_products.php"; ?>

                    </tbody>

                </table>

            </div>

        </section>

        <!-- ================= Footer ================= -->

        <footer class="footer">

            <p>

                © 2026 <strong>WareNova</strong> |
                Inventory Management System

            </p>

            <p class="developer">

                Developed by
                <strong>Kishor Das</strong>

            </p>

        </footer>

    </main>

</div>

<!-- ================= Add Product Modal ================= -->

<div class="modal" id="productModal">

    <div class="modal-content">

        <form action="add_product.php" method="POST">

            <h2>

                <i class="fa-solid fa-box-open"></i>

                Add New Product

            </h2>

            <input
                type="text"
                name="product_name"
                placeholder="Product Name"
                required>

            <input
                type="number"
                name="product_price"
                placeholder="Product Price"
                min="0"
                step="0.01"
                required>

            <input
                type="number"
                name="product_stock"
                placeholder="Product Stock"
                min="0"
                required>

            <div class="buttons">

                <button
                    type="submit"
                    id="saveProduct">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Save

                </button>

                <button
                    type="button"
                    id="closeModal">

                    <i class="fa-solid fa-xmark"></i>

                    Cancel

                </button>

            </div>

        </form>

    </div>

</div>
<script src="home_page.js"></script>

<script>

// ================================
// Live Date & Time
// ================================

function updateClock(){

    const now = new Date();

    const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit"
    };

    document.getElementById("dateTime").innerHTML =
        now.toLocaleString("en-US", options);

}

updateClock();

setInterval(updateClock,1000);


// ================================
// Product Search
// ================================

const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("keyup", function(){

    const filter = this.value.toLowerCase();

    const rows = document.querySelectorAll("#productTable tbody tr");

    rows.forEach(function(row){

        const text = row.innerText.toLowerCase();

        if(text.indexOf(filter) > -1){

            row.style.display = "";

        }

        else{

            row.style.display = "none";

        }

    });

});


// ================================
// Add Product Modal
// ================================

const modal = document.getElementById("productModal");

const openBtn = document.getElementById("addProductBtn");

const closeBtn = document.getElementById("closeModal");

openBtn.onclick = function(){

    modal.style.display = "flex";

}

closeBtn.onclick = function(){

    modal.style.display = "none";

}

window.onclick = function(event){

    if(event.target == modal){

        modal.style.display = "none";

    }

}


// ================================
// ESC Key Close Modal
// ================================

document.addEventListener("keydown",function(e){

    if(e.key === "Escape"){

        modal.style.display = "none";

    }

});


// ================================
// Table Row Hover Animation
// ================================

const rows = document.querySelectorAll("#productTable tbody tr");

rows.forEach(function(row){

    row.addEventListener("mouseenter",function(){

        row.style.transition=".25s";

    });

});


// ================================
// Welcome Message
// ================================

console.log("Welcome to WareNova Inventory System");

</script>

</body>

</html>
            