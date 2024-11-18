<?php
$staff = $_POST['staff'];
$calam = $_POST['calam2'];
$ngay = $_POST['ngay2'];
//ket noi csdl
require_once '../../php/connect.php';


$delete_sql = "DELETE FROM dangkycalam WHERE idnhanvien = $staff AND calam = '$calam' AND ngay ='$ngay'";

if (mysqli_query($conn, $delete_sql))
{
    header("Location: ../FE/dangKyCaLam.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}