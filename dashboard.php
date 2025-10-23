<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
echo "<h2>Welcome to Dashboard!</h2>";
echo "<a href='view_users.php'>Manage Users</a> | ";
echo "<a href='edit_profile.php'>Edit Profile</a> | ";
echo "<a href='logout.php'>Logout</a>";
?>