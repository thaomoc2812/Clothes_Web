<?php

$nvid = $_GET['sid'];
//ket noi csdl
require_once '../../../php/connect.php';
    
$search_sql = "SELECT * FROM danhmucsanpham WHERE idphanloai = $nvid";
$result = mysqli_query($conn, $search_sql);
if($r = mysqli_fetch_assoc($result))
{
    header("Location: ../../FE/quanLyKhoHang/viewLoaiSanPham.php?noti=1");
    exit;
}


$delete_sql = "DELETE FROM phanloaisanpham WHERE id = $nvid";

if (mysqli_query($conn, $delete_sql))
{
    header("Location: ../../FE/quanLyKhoHang/viewLoaiSanPham.php");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}

?>