<?php
//nhan du lieu tu form
$iddonhang = $_GET['sid'];
if (isset($_GET['staff']))
{
$staff = $_GET['staff'];
}
//ket noi csdl
require_once '../../../php/connect.php';


$update_sql = "UPDATE donhang SET tinhtrang = N'Đang chuẩn bị' WHERE id = $iddonhang";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../../FE/quanLyDonHang/dangChuanBi.php");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}



?>