<?php
require 'db.php'; // Kết nối với cơ sở dữ liệu

$message = ''; // Biến để lưu thông báo
$redirect = ''; // Biến để lưu URL chuyển hướng

// Các tùy chọn có sẵn cho ngành, hệ xét tuyển và tình trạng tốt nghiệp
$majors = ['CNTT', 'Dược', 'Thú y'];
$admission_types = ['Trung Cấp', 'Cao Đẳng', 'Khác'];
$graduation_statuses = ['THCS', 'THPT', 'Nghề'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // Lấy ID của học viên từ form
    $status = $_POST['status']; // Lấy trạng thái mới từ form
    $full_name = $_POST['full_name']; // Lấy họ tên từ form
    $phone = $_POST['phone']; // Lấy số điện thoại từ form
    $address = $_POST['address']; // Lấy địa chỉ từ form
    $graduation_status = $_POST['graduation_status']; // Lấy trạng thái tốt nghiệp từ form
    $admission_type = $_POST['admission_type']; // Lấy hệ xét tuyển từ form
    $major = $_POST['major']; // Lấy ngành từ form
    $message_content = $_POST['message']; // Lấy lời nhắn từ form

    // Câu lệnh SQL để cập nhật thông tin học viên
    $sql = "UPDATE students 
            SET status='$status', full_name='$full_name', phone='$phone', address='$address',
                graduation_status='$graduation_status', admission_type='$admission_type', major='$major', message='$message_content'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $message = "<div class='alert alert-success' role='alert'>Cập nhật thông tin thành công! <span id='success-message'>Chuyển hướng...</span></div>";
        $redirect = "admin.php"; // Địa chỉ trang để chuyển hướng
    } else {
        $message = "<div class='alert alert-danger' role='alert'>Error updating record: " . $conn->error . "</div>";
    }

    $conn->close();
}

// Nếu yêu cầu không phải POST, lấy thông tin học viên từ cơ sở dữ liệu
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $id = $_GET['id']; // Lấy ID từ URL
    $sql = "SELECT * FROM students WHERE id=$id"; // Truy vấn để lấy thông tin học viên
    $result = $conn->query($sql); // Thực thi truy vấn
    $row = $result->fetch_assoc(); // Lấy dữ liệu của học viên dưới dạng mảng kết hợp
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Thông Tin</title>
    <!-- Link tới Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function redirectToAdmin() {
            window.location.href = "<?php echo $redirect; ?>";
        }
        window.onload = function() {
            if (document.getElementById('success-message')) {
                setTimeout(redirectToAdmin, 3000); // Chuyển hướng sau 3 giây
            }
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                        <a class="nav-link" href="login.html">Trang chủ</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đào tạo </a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quản lý bài viết</a>
                    </li>
                    <a class="nav-link" href="logout.php">Đăng Xuất</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Sửa Thông Tin Học Viên</h1>
        <?php echo $message; // Hiển thị thông báo nếu có ?>

        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST'): ?>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'] ?? ''); ?>">

            <div class="form-group">
                <label for="full_name">Họ tên</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo htmlspecialchars($row['full_name'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($row['phone'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($row['address'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="graduation_status">Tốt nghiệp</label>
                <select id="graduation_status" name="graduation_status" class="form-control" required>
                    <?php foreach ($graduation_statuses as $status): ?>
                        <option value="<?php echo htmlspecialchars($status); ?>" <?php if (($row['graduation_status'] ?? '') == $status) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($status); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="admission_type">Hệ xét tuyển</label>
                <select id="admission_type" name="admission_type" class="form-control" required>
                    <?php foreach ($admission_types as $type): ?>
                        <option value="<?php echo htmlspecialchars($type); ?>" <?php if (($row['admission_type'] ?? '') == $type) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($type); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="major">Ngành</label>
                <select id="major" name="major" class="form-control" required>
                    <?php foreach ($majors as $major_option): ?>
                        <option value="<?php echo htmlspecialchars($major_option); ?>" <?php if (($row['major'] ?? '') == $major_option) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($major_option); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Lời nhắn</label>
                <textarea id="message" name="message" class="form-control" rows="3" required><?php echo htmlspecialchars($row['message'] ?? ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="status">Trạng thái hồ sơ</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="Đang chờ xử lý" <?php if (($row['status'] ?? '') == 'Đang chờ xử lý') echo 'selected'; ?>>Đang chờ xử lý</option>
                    <option value="Đã phê duyệt" <?php if (($row['status'] ?? '') == 'Đã phê duyệt') echo 'selected'; ?>>Đã phê duyệt</option>
                    <option value="Bị từ chối" <?php if (($row['status'] ?? '') == 'Bị từ chối') echo 'selected'; ?>>Bị từ chối</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </form>
        <?php endif; ?>
    </div>

    <!-- Link tới các file script của Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Đóng kết nối cơ sở dữ liệu chỉ khi không ở trong POST request
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $conn->close();
}
?>
