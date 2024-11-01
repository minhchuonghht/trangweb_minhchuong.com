<?php
session_start(); // Khởi động phiên làm việc để theo dõi trạng thái đăng nhập

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
    exit;
}

require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Xử lý form chỉnh sửa trạng thái khi yêu cầu là POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id']; // Lấy ID của học viên từ form
    $status = $_POST['status']; // Lấy trạng thái mới từ form

    // Sử dụng Prepared Statements
    $stmt = $conn->prepare("UPDATE students SET status=? WHERE id=?");
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        $message = "Cập nhật trạng thái thành công!"; // Thông báo thành công
    } else {
        $message = "Error updating record: " . $stmt->error; // Thông báo lỗi nếu có
    }
    $stmt->close();
}

// Xử lý yêu cầu lọc ngành và hệ xét tuyển
$selected_major = '';
$selected_admission_type = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['major'])) {
        $selected_major = $_POST['major'];
    }
    if (isset($_POST['admission_type'])) {
        $selected_admission_type = $_POST['admission_type'];
    }
}

// Truy vấn để lấy dữ liệu sinh viên theo ngành và hệ xét tuyển
$sql = "SELECT * FROM students WHERE 1=1";
$params = [];
if ($selected_major != '') {
    $sql .= " AND major=?";
    $params[] = $selected_major;
}
if ($selected_admission_type != '') {
    $sql .= " AND admission_type=?";
    $params[] = $selected_admission_type;
}

// Tạo prepared statement với số lượng tham số động
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    // Bind params dynamically based on the number of filters
    $types = str_repeat("s", count($params)); // Tạo chuỗi kiểu dữ liệu (string)
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result(); // Thực thi truy vấn
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .sidebar {
            background-color: #f8f9fa;
            padding: 15px;
            border-right: 1px solid #dee2e6;
            height: 100vh;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="index.php">
            <img src="images/logo1.jpg" alt="Logo" style="width: 50px; height: 50px;" class="d-inline-block align-top">
            CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Đăng Xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 sidebar">
                <h4 class="text-center">Thanh Công Cụ</h4>
                <a href="admin.php">Quản lý hồ sơ</a>
                <a href="register.php">Đăng ký tư vấn</a>
                <a href="contact.php">Liên hệ</a>
            </nav>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h1 class="text-center mt-5 mb-4">Quản Lý Hồ Sơ</h1>

                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?php echo $message; ?></div>
                <?php endif; ?>

                <form method="post" action="admin.php" class="form-inline mb-4">
                    <div class="form-group mr-2">
                        <label for="major" class="mr-2">Chọn ngành:</label>
                        <select id="major" name="major" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="CNTT" <?php echo ($selected_major == 'CNTT') ? 'selected' : ''; ?>>Công nghệ thông tin</option>
                            <option value="Dược" <?php echo ($selected_major == 'Dược') ? 'selected' : ''; ?>>Dược</option>
                            <option value="Thú Y" <?php echo ($selected_major == 'Thú Y') ? 'selected' : ''; ?>>Thú Y</option>
                        </select>
                    </div>
                    <div class="form-group mr-2">
                        <label for="admission_type" class="mr-2">Hệ xét tuyển:</label>
                        <select id="admission_type" name="admission_type" class="form-control">
                            <option value="">Tất cả</option>
                            <option value="Trung cấp" <?php echo ($selected_admission_type == 'Trung cấp') ? 'selected' : ''; ?>>Trung cấp</option>
                            <option value="Cao đẳng" <?php echo ($selected_admission_type == 'Cao đẳng') ? 'selected' : ''; ?>>Cao đẳng</option>
                            <option value="Khác" <?php echo ($selected_admission_type == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>

                <?php if ($result->num_rows > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tốt nghiệp</th>
                                <th>Hệ xét tuyển</th>
                                <th>Ngành</th>
                                <th>Lời nhắn</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['full_name']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['graduation_status']; ?></td>
                                    <td><?php echo $row['admission_type']; ?></td>
                                    <td><?php echo $row['major']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                    <td>
                                        <!-- Form để cập nhật trạng thái của học viên -->
                                        <form action='admin.php' method='post'>
                                            <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                            <select class="form-control" name='status'>
                                                <option value='Đang chờ xử lý' <?php echo ($row['status'] == 'Đang chờ xử lý') ? 'selected' : ''; ?>>Đang chờ xử lý</option>
                                                <option value='Đã phê duyệt' <?php echo ($row['status'] == 'Đã phê duyệt') ? 'selected' : ''; ?>>Đã phê duyệt</option>
                                                <option value='Bị từ chối' <?php echo ($row['status'] == 'Bị từ chối') ? 'selected' : ''; ?>>Bị từ chối</option>
                                            </select>
                                            <button type='submit' class='btn btn-success mt-2'>Cập nhật</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href='edit.php?id=<?php echo $row['id']; ?>' class='btn btn-warning'>Sửa</a>
                                    </td>
                                    <td>
                                        <!-- Liên kết để xóa hồ sơ học viên -->
                                        <a href='delete.php?id=<?php echo $row['id']; ?>' class='btn btn-danger'>Xóa</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <a href='admin.php' class='btn btn-primary mb-3'>Quay lại</a>
                <?php else: ?>
                    <a href='admin.php' class='btn btn-primary mb-3'>Quay lại</a>
                    <br>
                    <p>0 kết quả</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close(); // Đóng kết nối cơ sở dữ liệu
?>
