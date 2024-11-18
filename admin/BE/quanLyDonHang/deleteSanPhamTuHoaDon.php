<?php
$idkhachhang = $_GET['idkhachhang'];
$sdt = $_GET['sdt'];
$iddonhang = $_GET['iddonhang'];
$idsanpham = $_GET['idsanpham'];
$staff = $_GET['staff'];
$idttdonhang = $_GET['idttdonhang'];
//ket noi csdl
require_once '../../../php/connect.php';

$delete_sql = "DELETE FROM thongtindonhang WHERE id = $idttdonhang";



if (mysqli_query($conn, $delete_sql)) {
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}