<?php
$idttdonhang = $_POST['idttdonhang'];
$malohang = $_POST['malohang'];
$iddonhang = $_POST['iddonhang'];
//ket noi csdl
require_once '../../../php/connect.php';



$search_lohang = "SELECT * FROM lohang WHERE malohang = '$malohang'";
$result_lohang = mysqli_query($conn, $search_lohang);
if ($r_lohang = mysqli_fetch_assoc($result_lohang)) {


    $idlohang = $r_lohang['id'];

    $search_ttdonhang = "SELECT * FROM thongtindonhang WHERE id = $idttdonhang";
    $result_ttdonhang = mysqli_query($conn, $search_ttdonhang);
    $r_ttdonhang = mysqli_fetch_assoc($result_ttdonhang);
    $idsanpham = $r_ttdonhang['idsanpham'];
    $mausac = $r_ttdonhang['mausac'];
    $kichthuoc = $r_ttdonhang['kichthuoc'];
    $soluong = $r_ttdonhang['soluong'];
    $iddonhang = $r_ttdonhang['iddonhang'];

    $search_sp = "SELECT * FROM sanpham WHERE id = $idsanpham";
    $result_sp = mysqli_query($conn, $search_sp);
    $r_sp = mysqli_fetch_assoc($result_sp);
    $masanpham = $r_sp['masanpham'];

    $search_ttlohang = "SELECT * FROM thongtinlohang WHERE idlohang =$idlohang AND masanpham = '$masanpham' AND mausac=N'$mausac' AND kichthuoc = N'$kichthuoc'";
    $result_ttlohang = mysqli_query($conn, $search_ttlohang);
    $r_ttlohang = mysqli_fetch_assoc($result_ttlohang);
    $gianhapvao = $r_ttlohang['gianhapvao'];
    $temp1 = $r_ttlohang['daban'] + $soluong;
    $temp2 = $r_ttlohang['conlai'] - $soluong;
    $idttlohang = $r_ttlohang['id'];
    if ($soluong > ($r_ttlohang['conlai'])) {

        header("Location: ../../FE/quanLyDonHang/soanDon.php?sid=$iddonhang&check=2");
        exit();
    }


    $search_sl = "SELECT * FROM soluong WHERE masanpham = '$masanpham' AND mausac=N'$mausac' AND kichthuoc = N'$kichthuoc'";
    $result_sl = mysqli_query($conn, $search_sl);
    $r_sl = mysqli_fetch_assoc($result_sl);
    $slconlai = $r_sl['soluong'] - $soluong;
    $giabanra = $r_sl['giabanra'];
    $idsl = $r_sl['id'];

    $lai = ($giabanra - $gianhapvao) * $soluong;

    $update_sql1 = "UPDATE thongtindonhang 
SET malohang = '$malohang' ,
    gianhapvao = $gianhapvao,
    tienlai = $lai
WHERE id = $idttdonhang";

    $update_sql2 = "UPDATE thongtinlohang 
SET daban = $temp1,
conlai = $temp2
WHERE id = $idttlohang";

    $update_sql3 = "UPDATE soluong 
SET soluong = $slconlai
WHERE id = $idsl";
    //thuc thi cau lenh them
    if (mysqli_query($conn, $update_sql1) && mysqli_query($conn, $update_sql2) && mysqli_query($conn, $update_sql3)) {
        //in thong bao thanh cong

        header("Location: ../../FE/quanLyDonHang/soanDon.php?sid=$iddonhang&check=0");
        exit();
    };
   
} else {
    header("Location: ../../FE/quanLyDonHang/soanDon.php?sid=$iddonhang&check=1");
    exit();
}
