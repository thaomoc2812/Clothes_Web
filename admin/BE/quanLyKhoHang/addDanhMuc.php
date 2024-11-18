<?php
//nhan du lieu tu form

$loaisanpham = $_POST['loaisanpham'];
$tendanhmuc = $_POST['tenDanhMuc'];


//ket noi csdl
require_once '../../../php/connect.php';

if (!$loaisanpham || !$tendanhmuc) {
    header("Location: ../../FE/quanLyKhoHang/addDanhMuc.php?noti=1");
    exit;
}

$search = "SELECT * FROM danhmucsanpham WHERE (tendanhmuc = '$tendanhmuc') ";

$query = mysqli_query($conn, $search);
$q = 0;
while ($r0 = mysqli_fetch_assoc($query)) {
    if ($r0['tendanhmuc'] == $tendanhmuc) {
        $q = 1;
    }
};
if ($q == 1) {
    header("Location: ../../FE/quanLyKhoHang/addDanhMuc.php?noti=2");
    exit;
}
$search_sql = "SELECT * FROM phanloaisanpham WHERE loaisanpham = '$loaisanpham'";
$result = mysqli_query($conn, $search_sql);
if ($r = mysqli_fetch_assoc($result))
    $idloaisanpham = $r['id'];



$addsql = "INSERT INTO danhmucsanpham
(tendanhmuc,idphanloai) VALUES ('$tendanhmuc',$idloaisanpham)";



//thuc thi cau lenh them
if (mysqli_query($conn, $addsql)) {
    header("Location: ../../FE/quanLyKhoHang/viewDanhMuc.php");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}
