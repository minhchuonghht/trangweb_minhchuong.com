<?php
// Khởi tạo một mảng bài viết (có thể lấy từ file hoặc tạo mới)
$articles = [];

// Xử lý thêm bài viết
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Thêm bài viết mới vào mảng
    $articles[] = [
        'title' => $title,
        'content' => $content,
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Lưu bài viết vào file
    file_put_contents('articles.json', json_encode($articles));

    header("Location: baiviet.php?success=1");
    exit();
}

// Kiểm tra nếu file articles.json tồn tại
if (file_exists('articles.json')) {
    $articles = json_decode(file_get_contents('articles.json'), true);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bài Viết - CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo1.jpg" alt="Logo" style="width: 50px; height: 50px;" class="d-inline-block align-top">
            CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="introduce.php">Giới Thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="daotao.php">Đào tạo</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Tuyển sinh</a></li>
                    <li class="nav-item"><a class="nav-link active" href="baiviet.php">Quản lý bài viết</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.html">Đăng Nhập Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content container -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">QUẢN LÝ BÀI VIẾT</h1>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert">
                Bài viết đã được thêm thành công!
            </div>
        <?php endif; ?>

        <!-- Form thêm bài viết -->
        <form action="baiviet.php" method="post" class="mb-4">
            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Nội dung bài viết</label>
                <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Thêm Bài Viết</button>
        </form>

        <!-- Danh sách bài viết -->
        <h2 class="mb-3">Danh Sách Bài Viết</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Thời gian tạo</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($articles)): ?>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($article['title']); ?></td>
                            <td><?php echo htmlspecialchars($article['content']); ?></td>
                            <td><?php echo $article['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Không có bài viết nào</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
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
