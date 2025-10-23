<?php
include 'config.php';
$result = $conn->query("SELECT users.*, roles.role_name FROM users JOIN roles ON users.role_id=roles.id");
echo "<h2>All Users</h2><a href='add_user.php'>Add New</a><br><br>";
echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['role_name']}</td>
        <td><a href='edit_user.php?id={$row['id']}'>Edit</a> |
        <a href='delete_user.php?id={$row['id']}'>Delete</a></td>
    </tr>";
}
echo "</table>";
?>