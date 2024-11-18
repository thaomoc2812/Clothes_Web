<?php

$nvid = $_GET['sid'];
//ket noi csdl
require_once '../../../php/connect.php';

$update_sql = "UPDATE nhacungcap SET trangthai = 0 WHERE id = $nvid";

if (mysqli_query($conn, $update_sql))
{
    header("Location: ../../FE/quanLyKhoHang/viewNhaCungCap.php");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}

?>