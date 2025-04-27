<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION)) {
    session_start();
}

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? '',
];

$active_form = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error_message'>$error</p>" : '';
}

function isActiveForm($formName, $active_form) {
    return $formName === $active_form ? 'active' : '';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="form-box <?= isActiveForm('login', $active_form) ?>" id="login-form">
            <form action="../php/login_register.php" method="post">
                <h2>Login</h2> 
                <?= showError($errors['login']); ?>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register here</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $active_form) ?>" id="register-form">
            <form action="../php/login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                    <input type="text" placeholder="Name" name="name" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <select name="role" required>
                        <option value="">--Select Role--</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button type="submit" name="register">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>

    <script src="../javascript/account.js"></script>
</body>

</html>