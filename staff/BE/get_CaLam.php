<?php
$staff = $_GET['staff'];
//ket noi csdl
require_once '../../php/connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng donhang
$sql = "SELECT calam, ngay FROM dangkycalam WHERE idnhanvien = $staff";
$result = mysqli_query($conn, $sql);

$calam = array();
while($r_sql = mysqli_fetch_assoc($result))
{
    $calam[] = $r_sql;
}


// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($calam);
?>
