<?php
//nhan du lieu tu form
$staff = $_POST['staff'];
$loaisanpham = $_POST['loaisanpham'];
$id = $_POST['sid'];
//ket noi csdl
require_once '../../php/connect.php';


$update_sql = "UPDATE phanloaisanpham SET loaisanpham = '$loaisanpham' WHERE id = $id";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/viewLoaiSanPham.php?staff=$staff");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}