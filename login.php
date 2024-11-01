<?php
session_start();
require 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['loggedin'] = true;
    header("Location: admin.php");
} else {
    echo "Tên đăng nhập hoặc mật khẩu sai!";
}

$conn->close();
?>
