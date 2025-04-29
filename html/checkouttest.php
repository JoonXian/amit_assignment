<?php
session_start(); // Start session for cart access

$products = [
    1 => "Bracelet",
    2 => "Baseball Cap",
    3 => "Stylish Sunglasses",
    4 => "Leather Watch",
    5 => "Lucky Charm Necklace",
    6 => "Chic Handbag",
    7 => "Heart Collier Necklace",
    8 => "Delicate Necklace",
    9 => "Bunny Keychain",
    10 => "Earrings Set",
];

// Function to get total cart price
function getCartTotal() {
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    return $total;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $zip = htmlspecialchars($_POST['zip']);
    $card = htmlspecialchars($_POST['card']);
    $expiry = htmlspecialchars($_POST['expiry']);
    $cvv = htmlspecialchars($_POST['cvv']);

    if ($name && $address && $city && $zip && $card && $expiry && $cvv) {
        // Simulate order processing...
        unset($_SESSION['cart']); // Clear cart after checkout
        header("Location: ../php/success.php");
        exit();
    } else {
        $error = "Please fill out all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Fashion Store</title>
  <link rel="stylesheet" href="../css/checkouttest.css">
</head>
<body>
  <div class="container">
    <h1>Checkout</h1>

    <?php if (isset($error)): ?>
      <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="../html/checkouttest.php">
      <div class="section">
        <h2>Shipping Information</h2>
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>

        <label for="city">City</label>
        <input type="text" id="city" name="city" required>

        <label for="zip">ZIP Code</label>
        <input type="text" id="zip" name="zip" required>
      </div>

      <div class="section">
        <h2>Payment Details</h2>
        <label for="card">Card Number</label>
        <input type="text" id="card" name="card" required>

        <label for="expiry">Expiry Date</label>
        <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>

        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" required>
      </div>

      <div class="summary">
        <h2>Order Summary</h2>
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <p>
                    <?php echo htmlspecialchars($products[$item['productId']] ?? "Unknown Product"); ?>
                    x <?php echo $item['quantity']; ?> -
                    RM <?php echo number_format($item['price'] * $item['quantity'], 2); ?>
                </p>
            <?php endforeach; ?>
            <p>Shipping - RM 5.00</p>
            <hr>
            <p><strong>Total: RM <?php echo number_format(getCartTotal() + 5, 2); ?></strong></p>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
      </div>

      <button type="submit" class="checkout-button">Place Order</button>
    </form>
  </div>
</body>
</html>
