<?php
$staff = $_GET['staff'];
$idsanpham = $_GET['sid'];
//ket noi csdl
require_once '../../php/connect.php';

$search_sql = "SELECT * FROM sanpham WHERE id = $idsanpham";
$result = mysqli_query($conn, $search_sql);
if ($r = mysqli_fetch_assoc($result))
    $masanpham = $r['masanpham'];

$search = "SELECT * FROM thongtinlohang WHERE (masanpham = '$masanpham') ";

$query = mysqli_query($conn, $search);
$q = 0;
while ($r0 = mysqli_fetch_assoc($query)) {
    if ($r0['masanpham'] == $masanpham) {
        $q = 1;
    }
};
if ($q == 1) {
    header("Location: ../FE/deleteEditSanPham.php?staff=$staff&noti=1");
    exit;
}
else{
$delete_sql1 = "DELETE FROM sanpham WHERE id = $idsanpham";
$delete_sql2 = "DELETE FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
$delete_sql3 = "DELETE FROM thongtinsanpham WHERE masanpham = '$masanpham'";



if (mysqli_query($conn, $delete_sql1)&&mysqli_query($conn, $delete_sql2)&&mysqli_query($conn, $delete_sql3)) {
        header("Location: ../FE/deleteEditSanPham.php?staff=$staff");
        exit();
    }
    else {
        // Chuyển hướng trở lại trang trước
        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");
        exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
    }
};
