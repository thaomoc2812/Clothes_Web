<?php

$idNhomQuyen = $_GET['idnhomquyen'];
//ket noi csdl
require_once '../../../php/connect.php';

$search_sql = "SELECT * FROM nhanvien WHERE 
(vitri = $idNhomQuyen) AND trangthai = 1
";
if ($result = mysqli_query($conn, $search_sql)) {
    if ($r = mysqli_fetch_assoc($result)) {
        header("Location: ../../FE/quanLyNhanVien/viewNhomQuyen.php?noti=1");
        exit();
    }
};
$delete_sql1 = "DELETE FROM phanquyen WHERE idnhomquyen = $idNhomQuyen";
$r1 = mysqli_query($conn, $delete_sql1);

$delete_sql2 = "DELETE FROM nhomquyen WHERE id = $idNhomQuyen";
$r2 = mysqli_query($conn, $delete_sql2);

header("Location: ../../FE/quanLyNhanVien/viewNhomQuyen.php");
