<?php

// Kết nối cơ sở dữ liệu
require_once '../../../php/connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng donhang và khachhang
$sql = "SELECT donhang.id, donhang.giatridonhang, donhang.tienlai, donhang.thoigian, donhang.idkhachhang, khachhang.sdt 
        FROM donhang 
        INNER JOIN khachhang ON donhang.idkhachhang = khachhang.id 
        WHERE donhang.tinhtrang = N'Đã nhận' OR donhang.tinhtrang = 'Offline'";

$result = mysqli_query($conn, $sql);

$donhang = array();
while ($r_sql = mysqli_fetch_assoc($result)) {
    $donhang[] = $r_sql;
}

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($donhang);
?>
