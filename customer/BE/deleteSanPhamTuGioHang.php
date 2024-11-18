<?php
$idgiohang = $_GET['sid'];
$sdt = $_GET['user'];
//ket noi csdl
require_once '../../php/connect.php';




$delete_sql = "DELETE FROM giohang WHERE id = $idgiohang";


if (mysqli_query($conn, $delete_sql))
{
    
    header("Location: ../FE/viewGioHang.php?user=$sdt");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}