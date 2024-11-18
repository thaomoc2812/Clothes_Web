<?php
$staff = $_GET['staff'];
$idlohang = $_GET['idlohang'];
$masanpham = $_GET['masanpham'];
//ket noi csdl
require_once '../../php/connect.php';




$delete_sql = "DELETE FROM thongtinlohang WHERE idlohang = $idlohang AND masanpham = '$masanpham'";


if (mysqli_query($conn, $delete_sql))
{
    
    header("Location: ../FE/nhapKho.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}