<?php
$servername = "localhost"; // Địa chỉ máy chủ MySQL, thường là 'localhost'
$username = "root"; // Tên người dùng MySQL
$password = ""; // Mật khẩu MySQL
$database = "admissions"; // Tên cơ sở dữ liệu bạn đã tạo

// Tạo kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
