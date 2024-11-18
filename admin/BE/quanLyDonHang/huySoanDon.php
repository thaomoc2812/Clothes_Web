<?php

$iddonhang = $_GET['sid'];
$staff = 0;
if (isset($_GET['staff']))
{
$staff = $_GET['staff'];
}
//ket noi csdl
require_once '../../../php/connect.php';

$search_ttdonhang = "SELECT * FROM thongtindonhang WHERE iddonhang = $iddonhang";
if($result_ttdonhang = mysqli_query($conn, $search_ttdonhang))
{
    while($r_ttdonhang = mysqli_fetch_assoc($result_ttdonhang))
    {
        $idsanpham = $r_ttdonhang['idsanpham'];
        $mausac = $r_ttdonhang['mausac'];
        $kichthuoc = $r_ttdonhang['kichthuoc'];
        $soluong = $r_ttdonhang['soluong'];
        $malohang = $r_ttdonhang['malohang'];
    
        $search_sp = "SELECT * FROM sanpham WHERE id = $idsanpham";
        $result_sp = mysqli_query($conn, $search_sp);
        $r_sp = mysqli_fetch_assoc($result_sp);
        $masanpham = $r_sp['masanpham'];

        $search_lh = "SELECT * FROM lohang WHERE malohang = '$malohang'";
        $result_lh = mysqli_query($conn, $search_lh);
        $r_lh = mysqli_fetch_assoc($result_lh);
        $idlohang = $r_lh['id'];

        $search_ttlohang = "SELECT * FROM thongtinlohang WHERE idlohang =$idlohang AND masanpham = '$masanpham' AND mausac=N'$mausac' AND kichthuoc = N'$kichthuoc'";
        $result_ttlohang = mysqli_query($conn, $search_ttlohang);
        $r_ttlohang = mysqli_fetch_assoc($result_ttlohang);
        $temp1 = $r_ttlohang['daban'] - $soluong;
        $temp2 = $r_ttlohang['conlai'] + $soluong;
        $idttlohang = $r_ttlohang['id'];

        $search_sl = "SELECT * FROM soluong WHERE masanpham = '$masanpham' AND mausac=N'$mausac' AND kichthuoc = N'$kichthuoc'";
        $result_sl = mysqli_query($conn, $search_sl);
        $r_sl = mysqli_fetch_assoc($result_sl);
        $slconlai = $r_sl['soluong'] + $soluong;
        $idsl = $r_sl['id'];
        $update_sql2 = "UPDATE thongtinlohang 
        SET daban = $temp1,
        conlai = $temp2
        WHERE id = $idttlohang";
        
            $update_sql3 = "UPDATE soluong 
        SET soluong = $slconlai
        WHERE id = $idsl";
            //thuc thi cau lenh them
        mysqli_query($conn, $update_sql2);
         mysqli_query($conn, $update_sql3);
    }
}
    

$update_sql1 = "UPDATE thongtindonhang 
SET malohang = ''
WHERE iddonhang = $iddonhang";

$update_sql2 = "UPDATE donhang 
SET tinhtrang = N'Đang chuẩn bị' ,
    idnhanvienxacnhan = 0
WHERE id = $iddonhang";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql1) && mysqli_query($conn, $update_sql2)){
    //in thong bao thanh cong

    header("Location: ../../FE/quanLyDonHang/dangChuanBi.php");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}