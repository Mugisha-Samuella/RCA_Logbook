<?php
// register.php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $created_at = date('Y-m-d H:i:s');
    
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO user_student (username, password, email, created_at) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$username, $hashed_password, $email, $created_at])) {
        header("Location: login.php");
        exit;
    } else {
        echo "Error: Could not register user.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Sign Up</h2>
    <form method="post" >
        <label>Username</label>
        <input type="text" name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <button type="submit">Register</button>
    </form>
    <h5>Already have an account? <a href="login.php">Login</a></h5>
</body>
</html>
