<?php
session_start(); // Start the session

// Your Product IDs and Names
$products = [
    1 => "Bracelet",
    2 => "Baseball Cap",
    3 => "Stylish Sunglasses",
    4 => "Leather Watch",
    5 => "Lucky Charm Necklace",
    6 => "Chic Handbag",
    7 => "Heart Collier Necklace",
    8 => "Delicate Necklace",

    // Add more here if you want
];

// Function to add a product
function addToCart($productId, $price) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    } else {
        $_SESSION['cart'][$productId] = [
            'productId' => $productId,
            'price' => $price,
            'quantity' => 1
        ];
    }
}

// Function to remove one quantity
function removeOneFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']--;
        if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}

// Function to remove the item fully
function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

// Function to calculate total
function getTotal() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}

// Handle actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = $_GET['id'] ?? null;
    $price = $_GET['price'] ?? null;

    if ($action == 'add' && $productId && $price) {
        addToCart($productId, $price);
    } elseif ($action == 'remove_one' && $productId) {
        removeOneFromCart($productId);
    } elseif ($action == 'remove' && $productId) {
        removeFromCart($productId);
    }
}

// Handle checkout
if (isset($_POST['checkout'])) {
    echo "Thank you for your purchase!";
    session_unset(); // Clear cart after checkout
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
</head>

<body>

<header>
    <a href="#" class="logo"><img src="../img/logo.png" alt=""></a>

    <ul class="navmenu">
        <li><a href="../html/Accessories.html">Home</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="../html/AboutUs.html">About Us</a></li>
    </ul>

    <div class="navicon">
        <a href="#"><i class='bx bx-search'></i></a>
        <a href="../html/account.php"><i class='bx bx-user'></i></a>
        <a href="../php/cart.php"><i class='bx bx-cart'></i></a>
        <a href="../html/account.php" class="btn logout-btn">Logout</a>
    </div>
</header>

<section class="cart-section">
    <div class="cart-container">
        <h2>Your Cart</h2>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table>
                <tr>
                    <th>Name</th> <!-- Changed from Product to Name -->
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($_SESSION['cart'] as $item): 
                    $productTotal = $item['price'] * $item['quantity'];
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($products[$item['productId']] ?? "Unknown Product"); ?></td>
                    <td>RM <?php echo number_format($item['price'], 2); ?></td>
                    <td>
                        <a href="cart.php?action=remove_one&id=<?php echo $item['productId']; ?>" class="quantity-btn">-</a>
                        <?php echo $item['quantity']; ?>
                        <a href="cart.php?action=add&id=<?php echo $item['productId']; ?>&price=<?php echo $item['price']; ?>" class="quantity-btn">+</a>
                    </td>
                    <td>RM <?php echo number_format($productTotal, 2); ?></td>
                    <td>
                        <a href="cart.php?action=remove&id=<?php echo $item['productId']; ?>" class="btn danger-btn">Remove</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <div class="cart-total">
                <h3>Total: RM <?php echo number_format(getTotal(), 2); ?></h3>
            </div>

            <form action="cart.php" method="POST">
                <button type="submit" name="checkout" class="btn checkout-btn">Checkout</button>
            </form>
        <?php else: ?>
            <p class="empty-cart">Your cart is empty!</p>
        <?php endif; ?>

    </div>
</section>

<footer>
    Developed by <b>"Placeholder"</b> · Copyrighted © 2025
</footer>

</body>
</html>
