<?php
//nhan du lieu tu form
$staff = $_POST['staff'];
$idsoluong = $_POST['idsoluong'];
$soluong = $_POST['soluong'];
$giabanra = $_POST['giabanra'];
$idsanpham = $_POST['idsanpham'];
require_once '../../php/connect.php';

$update_sql = "UPDATE soluong SET soluong = $soluong, giabanra = $giabanra  WHERE id = $idsoluong";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/editSanPham.php?staff=$staff&sid=$idsanpham");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}