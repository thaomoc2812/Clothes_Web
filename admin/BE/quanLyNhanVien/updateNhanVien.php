<?php
//nhan du lieu tu form
$ten = $_POST['hoten'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$vitri = $_POST['vitri'];
$nvid = $_POST['sid'];
//ket noi csdl
require_once '../../../php/connect.php';

$search_sql = "SELECT * FROM nhomquyen WHERE tennhomquyen = '$vitri'";
$result = mysqli_query($conn, $search_sql);
if($r = mysqli_fetch_assoc($result))
$vt = $r['id'];


$update_sql = "UPDATE nhanvien SET hoten = '$ten', diachi = '$diachi', sdt = '$sdt', vitri = $vt WHERE id = $nvid";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong
  
    header("Location: ../../FE/quanLyNhanVien/viewNhanVien.php");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}