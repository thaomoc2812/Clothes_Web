<?php

session_start();
//nhan du lieu tu form
$sdt = $_POST['sdt'];
$matkhau = $_POST['matkhau'];

//ket noi csdl
require_once 'connect.php';

$red = 0;

//----------------admin--------------------
$pwadmin = 'admin123';
$storeMatKhau = password_hash($pwadmin, PASSWORD_DEFAULT);
if ($sdt == 'admin' && password_verify($matkhau, $storeMatKhau)) {
    $red = 1;
    header("Location: ../admin/home.php");
    exit();
}


//---------------------staff-------------------------

$search_nhanvien = "SELECT * FROM nhanvien WHERE (sdt = '$sdt')";

$query = mysqli_query($conn, $search_nhanvien);



while ($r = mysqli_fetch_assoc($query)) {
    $storeMatKhau = $r['matkhau'];

    if ($sdt == $r['sdt'] && password_verify($matkhau, $storeMatKhau)) {
        if ($r['trangthai'] == 0) {
            header("Location: ../html/dangNhap.php?sid=2");
            exit();
        }
        $idstaff = $r['id'];
        $red = 1;
        header("Location: ../staff/FE/home.php?staff=$idstaff");
        exit();
    }
};


//---------------------customer-------------------

$search_khach = "SELECT * FROM khachhang WHERE (sdt = '$sdt')";

$query = mysqli_query($conn, $search_khach);


while ($r = mysqli_fetch_assoc($query)) {

    $storeMatKhau = $r['matkhau'];
    if (password_verify($matkhau, $storeMatKhau)) {
        if ($r['hoatdong'] == 0) {
            header("Location: ../html/dangNhap.php?sid=2");
            exit();
        }
        $red = 1;
        header("Location: ../customer/home.php?user=$sdt");
        exit();
    }
}


//-----------------Error------------------------------
if ($red == 0) {
    header("Location: ../html/dangNhap.php?sid=1");
    exit();
}
