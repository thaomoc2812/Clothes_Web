<?php
//nhan du lieu tu form
$tendanhmuc = $_POST['tendanhmuc'];
$id = $_POST['sid'];
$staff = $_POST['staff'];
//ket noi csdl
require_once '../../php/connect.php';


$update_sql = "UPDATE danhmucsanpham SET tendanhmuc = '$tendanhmuc' WHERE id = $id";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/viewDanhMuc.php?staff=$staff");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}