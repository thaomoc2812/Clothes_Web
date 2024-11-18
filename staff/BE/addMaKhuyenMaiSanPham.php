<?php
//nhan du lieu tu form
$staff = $_GET['staff'];
$makhuyenmai = $_GET['makhuyenmai'];
$giam = $_GET['giam'];
$ngaybatdau = $_GET['ngaybatdau'];
$ngayketthuc = $_GET['ngayketthuc'];
$idsoluong = $_GET['idsoluong'];
$key1 = $_GET['key1'];
$key2 = $_GET['key2'];
$key3 = $_GET['key3'];
//ket noi csdl
require_once '../../php/connect.php';

if (!$makhuyenmai || $makhuyenmai == "."||!$giam || $giam == "."||!$ngaybatdau || $ngaybatdau == "."||!$ngayketthuc || $ngayketthuc == ".") {
    echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}

$search_sql = "SELECT * FROM soluong WHERE id = $idsoluong";
$result = mysqli_query($conn, $search_sql);
if ($r = mysqli_fetch_assoc($result))
    $idsanpham = $r['idsanpham'];

$search_sql1 = "SELECT * FROM sanpham WHERE id = $idsanpham";
$result1 = mysqli_query($conn, $search_sql1);
if ($r1 = mysqli_fetch_assoc($result1))
    $masanpham = $r1['masanpham'];


   $addsql = "INSERT INTO khuyenmai (makhuyenmai,idsoluong,masanpham) VALUES ('$makhuyenmai',$idsoluong,'$masanpham')";


//thuc thi cau lenh them
if (mysqli_query($conn, $addsql)) {
    
   header("Location: ../FE/addMaKhuyenMai.php?staff=$staff&makhuyenmai=$makhuyenmai&giam=$giam&ngaybatdau=$ngaybatdau&ngayketthuc=$ngayketthuc&key1=$key1&key2=$key2&key3=$key3");
   exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}





