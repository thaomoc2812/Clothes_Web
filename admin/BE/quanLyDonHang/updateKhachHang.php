<?php 
$sdt = $_POST['sdt'];
$hoten = $_POST['hoten'];
$staff = $_POST['staff'];
$idkhachhang = $_POST['idkhachhang'];
//ket noi csdl
require_once '../../../php/connect.php';

if (!$sdt ||!$hoten||!preg_match("/^[0-9]{10}$/", $sdt) )
{
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?noti=3");
    exit;
}

$update_sql1 = "UPDATE khachhang 
SET hoten = N'$hoten'
WHERE sdt = '$sdt'";
//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql1) ){
    //in thong bao thanh cong

   
$addsql1 = "INSERT INTO donhang
(idkhachhang,hotennguoinhan,sdtnguoinhan,thoigian,tinhtrang, idnhanvienxacnhan) VALUES ($idkhachhang,'$hoten','$sdt',NOW(),N'Offline',$staff)";

if (mysqli_query($conn, $addsql1)) {
    $iddonhang = mysqli_insert_id($conn);
    $madonhang = $iddonhang;
    $update_sql00 = "UPDATE donhang SET madonhang = '$madonhang' WHERE id = $iddonhang";
    $u00 = mysqli_query($conn, $update_sql00);
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&iddonhang=$iddonhang");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}

};

