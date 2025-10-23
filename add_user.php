<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $name, $email, $password, $role);
    $stmt->execute();
    echo "User added! <a href='view_users.php'>View All</a>";
}
?>
<form method='POST'>
    <h2>Add User</h2>
    Name: <input type='text' name='name'><br>
    Email: <input type='email' name='email'><br>
    Password: <input type='password' name='password'><br>
    Role: <select name='role'><option value='1'>User</option><option value='2'>Admin</option></select><br>
    <button type='submit'>Add</button>
</form>
