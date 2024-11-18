<?php

$idkhachhang = $_GET['idkhachhang'];
//ket noi csdl
require_once '../../../php/connect.php';

$search_donhang= "SELECT * FROM donhang WHERE  idkhachhang = $idkhachhang AND (tinhtrang= N'Đã nhận' OR tinhtrang = N'Chờ xác nhận' OR tinhtrang = N'Đang vận chuyển' OR tinhtrang = N'Đang chuẩn bị' )";
$result_donhang = mysqli_query($conn, $search_donhang);
$count = 0;
while($fetch_donhang= mysqli_fetch_assoc($result_donhang))
{
    $count = $count + 1;
}
if($count == 0)
{
    $update_sql = "UPDATE khachhang SET hoatdong = 0 WHERE id = $idkhachhang";


    //thuc thi cau lenh them
    if(mysqli_query($conn, $update_sql)){
        //in thong bao thanh cong
    
        header("Location: ../../FE/quanLyKhachHang/viewTaiKhoanDaBiKhoa.php");
    
    };
}
header("Location: ../../FE/quanLyKhachHang/viewTaiKhoanDangHoatDong.php");





?>