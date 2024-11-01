<?php
session_start(); // Khởi động phiên làm việc để theo dõi trạng thái đăng nhập

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    exit;
}

require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Truy vấn để lấy dữ liệu sinh viên
$sql = "SELECT full_name, phone FROM students"; // Chỉ lấy họ tên và số điện thoại
$result = $conn->query($sql); // Thực thi truy vấn
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="index.php">
            <img src="images/logo1.jpg" alt="Logo" style="width: 50px; height: 50px;" class="d-inline-block align-top">
            CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Đăng Xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Danh Sách Liên Hệ Sinh Viên</h1>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Không có dữ liệu sinh viên.</p>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="admin.php" class="btn btn-primary">Quay lại trang quản lý</a>
        </div>
    </div>
      <!-- Footer Section -->
<footer class="bg-danger text-white mt-5">
    <div class="container py-4">
        <h3 class="text-center">Liên Hệ Chúng Tôi</h3>
        <div class="row">
            <div class="col-md-6">
                <h5>Thông Tin Liên Hệ</h5>
                <p><strong>Địa chỉ:</strong> 300 Đường hà huy tập, Thành phố buôn ma thuật</p>
                <p><strong>Số điện thoại:</strong> (098) 765-4321</p>
                <p><strong>Email:</strong> info@yourcollege.edu.vn</p>
                <p><strong>Giờ làm việc:</strong> Thứ Hai - Thứ Sáu, 8:00 - 17:00</p>
                <p><strong>Mạng xã hội:</strong> <a href="https://www.facebook.com/bachkhoataynguyen/?locale=vi_VN" class="text-white">Facebook</a></p>
            </div>
            <div class="col-md-6">
                <h5>Bản Đồ Địa Điểm</h5>
                <!-- Google Map -->
                <iframe 
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=300%20H%C3%A0%20Huy%20T%E1%BA%ADp%2C%20T%C3%A2n%20An%2C%20Bu%C3%B4n%20Ma%20Thu%E1%BB%99t%2C%20%C4%90%E1%BA%AFk%20L%E1%BA%AFk&zoom=10&maptype=roadmap"
                    width="100%" 
                    height="250" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy"></iframe>
            </div>
        </div>
        <div class="text-center mt-4">
            <p>&copy; 2024 CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN. All rights reserved.</p>
        </div>
    </div>
</footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
