<?php
//nhan du lieu tu form
$staff = $_GET['staff'];
$makhuyenmai = $_GET['makhuyenmai'];
$link = $_GET['link'];
require_once '../../php/connect.php';



$delete_sql1 = "DELETE FROM khuyenmai WHERE makhuyenmai = '$makhuyenmai'";
$delete_sql2 = "DELETE FROM thongtinkhuyenmai WHERE makhuyenmai = '$makhuyenmai'";
$d1 = mysqli_query($conn, $delete_sql1);
$d2 = mysqli_query($conn, $delete_sql2);
if ( $d1&& $d2  && $link == "quanLyKhuyenMai")
{
    header("Location: ../FE/quanLyKhuyenMai.php?staff=$staff");
};

if ( $d1&& $d2  &&  $link == "viewMaKhuyenMai")
{
    header("Location: ../FE/viewMaKhuyenMai.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}