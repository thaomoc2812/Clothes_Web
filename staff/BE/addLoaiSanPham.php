<?php
//nhan du lieu tu form

$tenloaisanpham = $_POST['tenLoaiSanPham'];
$staff = $_POST['staff'];

//ket noi csdl
require_once '../../php/connect.php';

if (!$tenloaisanpham) {
    header("Location: ../FE/addLoaiSanPham.php?staff=$staff&noti=1");
    exit;
}

$search = "SELECT * FROM phanloaisanpham WHERE (loaisanpham = '$tenloaisanpham') ";

$query = mysqli_query($conn, $search);
$q = 0;
while ($r0 = mysqli_fetch_assoc($query)) {
    if ($r0['loaisanpham'] == $tenloaisanpham) {
        $q = 1;
    }
};
if ($q == 1) {
    header("Location: ../FE/addLoaiSanPham.php?staff=$staff&noti=2");
    exit;
}
$addsql = "INSERT INTO phanloaisanpham
(loaisanpham) VALUES ('$tenloaisanpham')";



//thuc thi cau lenh them
if (mysqli_query($conn, $addsql)) {
    header("Location: ../FE/viewLoaiSanPham.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}