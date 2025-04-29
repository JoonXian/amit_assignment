<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Order Success - Fashion Store</title>
  <link rel="stylesheet" href="../css/checkouttest.css">
  <link rel="stylesheet" href="../css/style.css"> 
  <style>
    /* Base layout to push footer down */
    html, body {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
    }

    .main-content {
      flex: 1;
    }

    .success-container {
      max-width: 600px;
      margin: 80px auto;
      text-align: center;
      padding: 40px;
      background-color: #f4fdf4;
      border: 1px solid #c6ecc6;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 128, 0, 0.1);
    }

    .success-container h1 {
      color: #2e7d32;
    }

    .success-container p {
      font-size: 18px;
      margin: 20px 0;
    }

    .success-container a {
      display: inline-block;
      margin-top: 25px;
      padding: 10px 25px;
      background-color: #2e7d32;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .success-container a:hover {
      background-color: #246b28;
    }

    /* Footer styles */
    .site-footer {
      background-color: #333;
      color: #fff;
      padding: 40px 20px 20px;
    }

    .footer-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-column {
      flex: 1 1 200px;
      margin: 10px;
    }

    .footer-column h4 {
      margin-bottom: 15px;
      color: #fff;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
    }

    .footer-column ul li {
      margin-bottom: 10px;
    }

    .footer-column ul li a {
      color: #ccc;
      text-decoration: none;
    }

    .footer-column ul li a:hover {
      text-decoration: underline;
    }

    .social-icons a {
      margin-right: 10px;
      color: #ccc;
      font-size: 20px;
      text-decoration: none;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 20px;
      font-size: 14px;
      border-top: 1px solid #444;
      color: #ccc;
    }
  </style>
</head>
<body>
  <main class="main-content">
    <div class="success-container">
      <h1>Thank You for Your Order!</h1>
      <p>Your order has been placed successfully. You will receive a confirmation email shortly.</p>
      <a href="../html/Accessories.html">Continue Shopping</a>
    </div>
  </main>

  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-column">
        <h4>About Us</h4>
        <p>Your go-to destination for trendy accessories and fashion essentials.</p>
      </div>
      <div class="footer-column">
        <h4>Quick Links</h4>
        <ul>
          <li><a href="../html/Accessories.html">Home</a></li>
          <li><a href="../html/Accessories.html">Products</a></li>
          <li><a href="../html/AboutUs.html">About Us</a></li>
        </ul>
      </div>
      <div class="footer-column">
        <h4>Follow Us</h4>
        <div class="social-icons">
          <a href="#"><i class='bx bxl-facebook'></i></a>
          <a href="#"><i class='bx bxl-instagram'></i></a>
          <a href="#"><i class='bx bxl-twitter'></i></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Accesora. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>
