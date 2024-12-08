<?php
$servername = "127.0.0.1"; // IP của máy chủ MySQL, thay đổi nếu cần
$username = "root";         // Tên người dùng MySQL
$password = "123456";       // Mật khẩu MySQL
$dbname = "book_db";        // Tên cơ sở dữ liệu bạn muốn kết nối đến

// Tạo kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

// In ra thông tin về máy chủ MySQL mà PHP đang kết nối tới
echo "Server IP: " . $conn->server_info . "<br>";
echo "Server version: " . $conn->server_version . "<br>";

// Đóng kết nối
$conn->close();
?>
