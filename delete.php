<?php
require 'db.php'; // Kết nối với cơ sở dữ liệu

$id = $_GET['id']; // Lấy ID của học viên cần xóa từ URL

$sql = "DELETE FROM students WHERE id=$id"; // Câu lệnh SQL để xóa học viên dựa trên ID

if ($conn->query($sql) === TRUE) { // Thực thi câu lệnh SQL và kiểm tra xem có thành công không
    echo "Xóa thành công!"; // Thông báo xóa thành công
} else {
    echo "Error deleting record: " . $conn->error; // Thông báo lỗi nếu không thể xóa
}

echo "<br><br>";
echo "<a href='admin.php'>Quay lại Trang Quản Lý</a>"; // Đường dẫn để quay lại trang quản lý

$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
