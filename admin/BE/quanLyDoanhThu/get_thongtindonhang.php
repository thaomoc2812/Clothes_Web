<?php

//ket noi csdl
require_once '../../../php/connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn dữ liệu từ bảng donhang
$sqltt = "SELECT idsanpham, tienlai, soluong FROM thongtindonhang WHERE tienlai != 0 ORDER BY idsanpham ASC";
$resulttt = mysqli_query($conn, $sqltt);

$thongtindonhang = array();
while($r_sqltt = mysqli_fetch_assoc($resulttt))
{
    $thongtindonhang[] = $r_sqltt;
}


// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode($thongtindonhang);
?>
