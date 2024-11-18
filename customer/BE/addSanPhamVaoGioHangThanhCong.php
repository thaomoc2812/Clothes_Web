<?php

$idsanpham = $_GET['sid'];
$user = $_GET['user'];
$size = $_GET['size'];
$color = $_GET['color'];
$soluong = $_GET['soluong'];

//ket noi csdl
require_once '../../php/connect.php';

$search_khach = "SELECT * FROM khachhang WHERE  sdt = $user ";
$result_khach = mysqli_query($conn, $search_khach);
$fetch_khach= mysqli_fetch_assoc($result_khach);
$idkhachhang = $fetch_khach['id'];


$addsql = "INSERT INTO giohang
(idkhachhang,idsanpham,kichthuoc,mausac,soluong) VALUES ($idkhachhang,$idsanpham,'$size','$color',$soluong)";



//thuc thi cau lenh them
if (mysqli_query($conn, $addsql)) {
    header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}