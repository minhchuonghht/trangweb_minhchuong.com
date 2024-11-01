<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đào tạo - CAO ĐẲNG BÁCH KHOA TÂY NGUYÊN</title>
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
                        <a class="nav-link" href="introduce.php">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="daotao.php">Đào tạo</a>
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
            <!-- Panel bên trái -->
            <div class="col-md-3">
                <h3 class="text-center">Chuyên mục đào tạo</h3>
                <ul class="list-group">
                    <li class="list-group-item"><a href="#thoiKhoaBieu">Thời khóa biểu</a></li>
                    <li class="list-group-item"><a href="#bieuMau">Biểu mẫu đào tạo</a></li>
                </ul>
            </div>

            <!-- Nội dung chính -->
            <div class="col-md-9">
                <!-- Thời khóa biểu -->
                <section id="thoiKhoaBieu" class="mb-5">
                    <h2 class="text-center mb-4">Thời Khóa Biểu</h2>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Thứ</th>
                                <th>Buổi Sáng</th>
                                <th>Buổi Chiều</th>
                                <th>Buổi Tối</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Thứ 2</td>
                                <td>CNTT - Lập trình C</td>
                                <td>Thú Y - Chăm sóc động vật</td>
                                <td>Dược - Dược lý học</td>
                            </tr>
                            <tr>
                                <td>Thứ 3</td>
                                <td>CNTT - Cơ sở dữ liệu</td>
                                <td>Thú Y - Phẫu thuật cơ bản</td>
                                <td>Dược - Bào chế dược phẩm</td>
                            </tr>
                            <tr>
                                <td>Thứ 4</td>
                                <td>CNTT - Mạng máy tính</td>
                                <td>Thú Y - Dinh dưỡng động vật</td>
                                <td>Dược - Hóa dược</td>
                            </tr>
                            <tr>
                                <td>Thứ 5</td>
                                <td>CNTT - An toàn thông tin</td>
                                <td>Thú Y - Chẩn đoán bệnh</td>
                                <td>Dược - Kỹ thuật điều chế thuốc</td>
                            </tr>
                            <tr>
                                <td>Thứ 6</td>
                                <td>CNTT - Phát triển Web</td>
                                <td>Thú Y - Điều trị bệnh</td>
                                <td>Dược - Thực hành dược</td>
                            </tr>
                            <tr>
                                <td>Thứ 7</td>
                                <td colspan="3" class="text-center">Hoạt động ngoại khóa</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Biểu mẫu đào tạo -->
                <section id="bieuMau">
                    <h2 class="text-center mb-4">Biểu Mẫu Đào Tạo</h2>
                    <div class="list-group">
                        <a href="mau_dang_ky_hoc.php" class="list-group-item list-group-item-action">
                            Mẫu đăng ký học
                        </a>
                        <a href="mau_xin_nghi_hoc.php" class="list-group-item list-group-item-action">
                            Mẫu xin nghỉ học
                        </a>
                        <a href="mau_dang_ky_thi.php" class="list-group-item list-group-item-action">
                            Mẫu đăng ký thi lại
                        </a>
                        <a href="mau_yeu_cau_xem_diem.php" class="list-group-item list-group-item-action">
                            Mẫu yêu cầu xem điểm
                        </a>
                    </div>
                </section>
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
