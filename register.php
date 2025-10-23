<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 1;
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $password, $role);
    if ($stmt->execute()) echo "Registered successfully! <a href='login.php'>Login</a>";
    else echo "Error: " . $stmt->error;
}
?>
<form method='POST'>
    <h2>Register</h2>
    Name: <input type='text' name='name' required><br>
    Email: <input type='email' name='email' required><br>
    Password: <input type='password' name='password' required><br>
    <button type='submit'>Register</button>
</form>
