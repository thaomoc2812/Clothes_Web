<?php

$idkhachhang = $_GET['idkhachhang'];
//ket noi csdl
require_once '../../../php/connect.php';

$update_sql = "UPDATE khachhang SET hoatdong = 1 WHERE id = $idkhachhang";


//thuc thi cau lenh them
if (mysqli_query($conn, $update_sql)) {
    //in thong bao thanh cong

    header("Location: ../../FE/quanLyKhachHang/viewTaiKhoanDaBiKhoa.php");

    exit();
} else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}
