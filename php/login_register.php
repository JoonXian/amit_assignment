
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include '../php/config.php';

function redirectWithError($error, $form) {
    $_SESSION[$form . '_error'] = $error;
    $_SESSION['active_form'] = $form;
    header("Location: ../html/account.php");
    exit();
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        redirectWithError('All fields are required!', 'register');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithError('Invalid email format!', 'register');
    }

    $checkEmail = $conn->query("SELECT email FROM users WHERE email = '$email'");
    if ($checkEmail->num_rows > 0) {
        $_SESSION['register_error'] = 'Email is already registered!';
        $_SESSION['active_form'] = 'register';
    } else {
        $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");
    }

    header("Location: ../html/account.php");
    exit();
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

        if ($user['role'] === 'admin') {
                header("Location: ../php/admin.php");
            } else {
                header("Location: ../php/user.php");
            }
            exit(); 
        }
    }

    $_SESSION['login_error'] = 'Invalid email or password!';
    $_SESSION['active_form'] = 'login';
    header("Location: ../html/account.php");
    exit();
}

?>