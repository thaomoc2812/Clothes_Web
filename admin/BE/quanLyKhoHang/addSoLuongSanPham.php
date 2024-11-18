<?php

$idlohang = $_GET['idlohang'];
$masanpham = $_GET['masanpham'];
//ket noi csdl
require_once '../../../php/connect.php';


$search_sp = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
$result_sp = mysqli_query($conn, $search_sp);
if ($r_sp = mysqli_fetch_assoc($result_sp))
    $idsanpham = $r_sp['id'];

$search_lh = "SELECT * FROM thongtinlohang WHERE masanpham = '$masanpham' AND idlohang = $idlohang AND trangthai = 0";
$result_lh = mysqli_query($conn, $search_lh);
while ($r_lh = mysqli_fetch_assoc($result_lh)) {
    $id_lh= $r_lh['id'];
    $update_trangthai = "UPDATE thongtinlohang SET trangthai = 1 WHERE id = $id_lh";
    $ud = mysqli_query($conn, $update_trangthai);
    $mausac = $r_lh['mausac'];
    $kichthuoc = $r_lh['kichthuoc'];
    $soluong = $r_lh['soluong'];
    $search_sl = "SELECT * FROM soluong WHERE idsanpham = $idsanpham AND mausac = '$mausac' AND kichthuoc ='$kichthuoc'";
    $result_sl = mysqli_query($conn, $search_sl);
    $r_sl = mysqli_fetch_assoc($result_sl);
    if ($r_sl) {
        $id_update = $r_sl['id'];
        $total = $r_sl['soluong'] + $soluong;
        $update_sql = "UPDATE soluong SET soluong = $total WHERE id = $id_update";
        mysqli_query($conn, $update_sql);
    } else{
        $addsql = "INSERT INTO soluong (idsanpham, mausac, kichthuoc, soluong, masanpham) VALUES ($idsanpham, '$mausac','$kichthuoc', $soluong,'$masanpham')";
        mysqli_query($conn, $addsql);
        $delsql = "DELETE FROM soluong WHERE idsanpham = $idsanpham AND mausac = ''";
        mysqli_query($conn, $delsql);
        
    }
}

header("Location: ../../FE/quanLyKhoHang/viewChiTietLoHang.php?sid=$idlohang");
exit();

?>
