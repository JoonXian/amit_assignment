<?php
session_start();
include('db_connect.php');

// Create Order
if (isset($_POST['checkout']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $item) {
        $quantity = $item['quantity'];
        $price = $item['price'];

        // You can insert into 'orders' table
        $stmt = $conn->prepare("INSERT INTO orders (product_id, quantity, price) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $productId, $quantity, $price);
        $stmt->execute();
    }

    // Clear cart after checkout
    $_SESSION['cart'] = [];
    echo "<h2>Thank you for your order! 🎉</h2>";
    echo '<a href="../html/Accessories.php">Return to Shop</a>';
} else {
    echo "Nothing to checkout.";
}
?>
