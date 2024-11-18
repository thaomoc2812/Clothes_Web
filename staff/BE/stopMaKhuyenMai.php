<?php
//nhan du lieu tu form
$staff = $_GET['staff'];
$makhuyenmai = $_GET['makhuyenmai'];

//ket noi csdl
require_once '../../php/connect.php';

$today = date("Y-m-d");
$update_sql = "UPDATE thongtinkhuyenmai SET ngayketthuc = '$today' WHERE makhuyenmai = '$makhuyenmai'";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/viewMaKhuyenMai.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}

