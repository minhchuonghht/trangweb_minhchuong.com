<?php
require 'db.php'; // Kết nối đến cơ sở dữ liệu

// Lấy giá trị từ yêu cầu POST và loại bỏ khoảng trắng
$full_name = trim($_POST['full_name']);
$phone = trim($_POST['phone']);
$address = trim($_POST['address']);
$graduation_status = trim($_POST['graduation_status']);
$admission_type = trim($_POST['admission_type']);
$major = trim($_POST['major']);
$message = trim($_POST['message']);

// Khởi tạo một mảng để chứa thông báo lỗi
$errors = [];

// Kiểm tra từng trường dữ liệu
if (empty($full_name)) {
    $errors[] = "Họ tên không được để trống!";
}
if (empty($phone)) {
    $errors[] = "Số điện thoại không được để trống!";
}
if (empty($address)) {
    $errors[] = "Địa chỉ không được để trống!";
}
if (empty($graduation_status)) {
    $errors[] = "Trạng thái tốt nghiệp không được để trống!";
}
if (empty($admission_type)) {
    $errors[] = "Hệ xét tuyển không được để trống!";
}
if (empty($major)) {
    $errors[] = "Ngành xét tuyển không được để trống!";
}

// Kiểm tra định dạng số điện thoại
if (!preg_match("/^\d{10}$/", $phone)) {
    $errors[] = "Số điện thoại phải có 10 chữ số";
}

// Nếu có lỗi, chuyển hướng với thông báo lỗi
if (!empty($errors)) {
    // Chuyển đổi mảng lỗi thành chuỗi duy nhất
    $error_message = urlencode(implode(', ', $errors));
    header("Location: index.php?error=$error_message");
    exit();
}

// Chuẩn bị câu lệnh SQL sử dụng prepared statements để ngăn chặn SQL injection
$sql = "INSERT INTO students (full_name, phone, address, graduation_status, admission_type, major, message, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Đang chờ xử lý')";
$stmt = $conn->prepare($sql);

// Ràng buộc các tham số (tham số cuối cùng giờ đã được cố định trong câu lệnh SQL)
$stmt->bind_param("sssssss", $full_name, $phone, $address, $graduation_status, $admission_type, $major, $message);

// Thực thi câu lệnh và kiểm tra kết quả
if ($stmt->execute()) {
    header("Location: index.php?success=1"); // Chuyển hướng đến index.php với thông báo thành công
} else {
    error_log("Lỗi cơ sở dữ liệu: " . $stmt->error); // Ghi lại lỗi
    header("Location: index.php?error=Có lỗi trong quá trình đăng ký. Vui lòng thử lại sau!"); // Chuyển hướng với thông báo lỗi SQL
}

$stmt->close(); // Đóng câu lệnh
$conn->close(); // Đóng kết nối đến cơ sở dữ liệu
?>
