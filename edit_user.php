<?php
include 'config.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $role = $_POST['role'];
    $stmt = $conn->prepare("UPDATE users SET name=?, role_id=? WHERE id=?");
    $stmt->bind_param("sii", $name, $role, $id);
    $stmt->execute();
    header("Location: view_users.php");
}
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>
<form method='POST'>
    <h2>Edit User</h2>
    Name: <input type='text' name='name' value='<?= $row['name'] ?>'><br>
    Role: <select name='role'>
        <option value='1' <?= $row['role_id']==1?'selected':'' ?>>User</option>
        <option value='2' <?= $row['role_id']==2?'selected':'' ?>>Admin</option>
    </select><br>
    <button type='submit'>Update</button>
</form>
