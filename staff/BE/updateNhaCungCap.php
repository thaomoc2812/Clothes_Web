<?php
//nhan du lieu tu form

$tennhacungcap = $_POST['tennhacungcap'];
$manhacungcap = $_POST['manhacungcap'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
$id = $_POST['sid'];
$staff = $_POST['staff'];


//ket noi csdl
require_once '../../php/connect.php';


$update_sql = "UPDATE nhacungcap SET manhacungcap = '$manhacungcap',tennhacungcap= '$tennhacungcap',sdt='$sdt',diachi= '$diachi' WHERE id = $id";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/viewNhaCungCap.php?staff=$staff");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}