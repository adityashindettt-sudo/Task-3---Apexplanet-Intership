<?php
session_start();
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role_id'] = $row['role_id'];
            header("Location: dashboard.php");
        } else echo "Invalid password!";
    } else echo "User not found!";
}
?>
<form method='POST'>
    <h2>Login</h2>
    Email: <input type='email' name='email' required><br>
    Password: <input type='password' name='password' required><br>
    <button type='submit'>Login</button>
</form>
