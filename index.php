<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo1.jpg" alt="Logo" style="width: 50px; height: 50px;" class="d-inline-block align-top">
            CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="introduce.php">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="daotao.php">Đào tạo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Tuyển sinh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="baiviet.php">Quản lý bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Đăng Nhập Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content container -->
    <div class="container mt-5">
        <div class="row">
            <!-- Panel hình ảnh bên trái -->
            <div class="col-md-3">
                <h3 class="text-center">Thông tin Tuyển sinh</h3>
                <img src="./images/1.jpg.jpg" class="img-fluid mb-3" alt="Trường Cao Đẳng">
                <img src="./images/2.jpg" class="img-fluid mb-3" alt="Trường Cao Đẳng">
                <img src="./images/4.jpg" class="img-fluid mb-3" alt="Trường Cao Đẳng">
            </div>
            <!-- Form đăng ký ở giữa -->
            <div class="col-md-6">
                <h1 class="text-center mb-4">ĐĂNG KÝ TƯ VẤN TUYỂN SINH</h1>
                <form action="register.php" method="post">

                <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?php 
           // Hiển thị thông báo lỗi được truyền trong URL
            echo htmlspecialchars($_GET['error']);
            ?>
        </div>
    <?php endif; ?>
              

                    <div class="form-group">
                        <label for="full_name">Họ tên bạn là gì?</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
    <label for="phone">Số điện thoại liên hệ?</label>
    <input type="text" class="form-control" id="phone" name="phone" required pattern="^\d{10}$" maxlength="10" title="Số điện thoại phải có 10 chữ số">
</div>

                    <div class="form-group">
                        <label for="address">Địa chỉ thường trú của bạn?</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label for="graduation_status">Bạn đã tốt nghiệp?</label>
                        <select class="form-control" id="graduation_status" name="graduation_status" required>
                            <option value="THCS">THCS</option>
                            <option value="THPT">THPT</option>
                            <option value="Nghề">Nghề</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="admission_type">Chọn hệ xét tuyển</label>
                        <select class="form-control" id="admission_type" name="admission_type" required>
                            <option value="Trung Cấp">Trung Cấp</option>
                            <option value="Cao Đẳng">Cao Đẳng</option>
                            <option value="Khác">Khác</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="major">Chọn ngành xét tuyển</label>
                        <select class="form-control" id="major" name="major" required>
                            <option value="">Chọn ngành</option>
                            <option value="CNTT">Công Nghệ Thông Tin</option>
                            <option value="Dược">Dược</option>
                            <option value="Thú Y">Thú Y</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Để lại lời nhắn cho chúng tôi!</label>
                        <textarea class="form-control" id="message" name="message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">ĐĂNG KÝ TƯ VẤN NGAY</button>
                </form>
            </div>

            <!-- Panel video bên phải -->
            <div class="col-md-3">
                <h3 class="text-center">Video giới thiệu</h3>
                <iframe width="180%" height="450" src="https://www.youtube.com/embed/IhYONs2-Kc4?si=lrxITZZ702-4SXPn" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
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
                <p><strong>tiktok:</strong> <a href="https://www.facebook.com/bachkhoataynguyen/?locale=vi_VN" class="text-white">tiktok</a></p>
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
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Thông Báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Đăng ký thành công!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            $('#successModal').modal('show');

            // Clear the success parameter from the URL
            history.replaceState(null, '', 'index.php'); // Removes the success=1 from the URL
        <?php endif; ?>
    });
</script>
</body>
</html>
