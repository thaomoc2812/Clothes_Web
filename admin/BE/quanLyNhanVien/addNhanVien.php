<?php
//nhan du lieu tu form

$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
$vitri = $_POST['vitri'];

//ket noi csdl
require_once '../../../php/connect.php';

if (!$hoten || !$diachi || !$sdt || !$vitri)
    {
        header("Location: ../../FE/quanLyNhanVien/addNhanVien.php?noti=1");
        exit;
    }

    if (!preg_match("/^[0-9]{10}$/", $sdt)) {
        header("Location: ../../FE/quanLyNhanVien/addNhanVien.php?noti=2");
        exit;
    }

    $search = "SELECT * FROM nhanvien WHERE (sdt = '$sdt') ";

    $query = mysqli_query($conn, $search);
    $q=0;
    while ($r0 = mysqli_fetch_assoc($query))
    {
        if($r0['sdt'] == $sdt)
        {
            $q = 1;
        }
        
    };
    if($q == 1)
    {
        header("Location: ../../FE/quanLyNhanVien/addNhanVien.php?noti=3");
        exit;
    }

    
    $search_sql = "SELECT * FROM nhomquyen WHERE tennhomquyen = '$vitri'";
    $result = mysqli_query($conn, $search_sql);
    if($r = mysqli_fetch_assoc($result))
    $vt = $r['id'];
    


$addsql = "INSERT INTO nhanvien
(hoten,sdt, diachi, vitri, trangthai) VALUES ('$hoten','$sdt','$diachi',$vt,1)";



//thuc thi cau lenh them
if(mysqli_query($conn, $addsql)){

    header("Location: ../../FE/quanLyNhanVien/viewNhanVien.php");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}