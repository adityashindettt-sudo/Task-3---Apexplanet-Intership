<?php
session_start();
include 'config.php';
$id = $_SESSION['user_id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    if (!empty($_FILES['profile_pic']['name'])) {
        $target = "uploads/" . basename($_FILES['profile_pic']['name']);
        move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
        $stmt = $conn->prepare("UPDATE users SET name=?, profile_pic=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $target, $id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);
    }
    $stmt->execute();
    echo "Profile updated!";
}
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>
<form method='POST' enctype='multipart/form-data'>
    <h2>Edit Profile</h2>
    Name: <input type='text' name='name' value='<?= $user['name'] ?>'><br>
    <img src='<?= $user['profile_pic'] ?>' width='100'><br>
    Change Picture: <input type='file' name='profile_pic'><br>
    <button type='submit'>Update</button>
</form>
