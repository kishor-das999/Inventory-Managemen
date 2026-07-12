<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require "db.php";

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);

$serial = 1;

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        if ($row['product_stock'] <= 5) {
            $status = "<span class='low-stock'>Low Stock</span>";
        } else {
            $status = "<span class='available'>Available</span>";
        }

        echo "
        <tr>

            <td>{$serial}</td>

            <td>{$row['product_name']}</td>

            <td>{$row['product_price']} Tk</td>

            <td>{$row['product_stock']}</td>

            <td>{$status}</td>

            <td>

                <a href='edit_product.php?id={$row['id']}'>
                    <button class='edit-btn'>Edit</button>
                </a>

                <a href='delete_product.php?id={$row['id']}'
                   onclick=\"return confirm('Are you sure you want to delete this product?')\">
                    <button class='delete-btn'>Delete</button>
                </a>

            </td>

        </tr>
        ";

        $serial++;
    }

} else {

    echo "
    <tr>
        <td colspan='6' style='text-align:center;padding:20px;'>
            No Product Found
        </td>
    </tr>
    ";

}

$conn->close();

?>