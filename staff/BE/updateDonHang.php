<?php
//nhan du lieu tu form
$iddonhang = 0;
if (isset($_POST['iddonhang']))
{
    $iddonhang = $_POST['iddonhang'];
}

$staff = 0;
if (isset($_POST['staff']))
{
$staff = $_POST['staff'];
}
$giatridonhang = 0;
if (isset($_POST['giatridonhang']))
{
$giatridonhang = $_POST['giatridonhang'];
}


//ket noi csdl
require_once '../../php/connect.php';


if($giatridonhang == 0)
{
    $del_donhang = "DELETE FROM donhang WHERE id = $iddonhang AND giatridonhang = $giatridonhang ";
    mysqli_query($conn, $del_donhang);
    header("Location: ../FE/taoHoaDon.php?staff=$staff");
    exit();
}


$update_sql1 = "UPDATE donhang 
SET giatridonhang = $giatridonhang
WHERE id = $iddonhang";

if(mysqli_query($conn, $update_sql1))
{
    $count_tienlai = 0;
    $search_ttdonhang = "SELECT * FROM thongtindonhang WHERE iddonhang = $iddonhang  ";
    $result_ttdonhang = mysqli_query($conn, $search_ttdonhang);
    while($r_ttdonhang = mysqli_fetch_assoc($result_ttdonhang))
    {
        $malohang = $r_ttdonhang['malohang'];
        $soluong = $r_ttdonhang['soluong'];
        $idsanpham = $r_ttdonhang['idsanpham'];
        $mausac = $r_ttdonhang['mausac'];
        $kichthuoc = $r_ttdonhang['kichthuoc'];
        $tienlai = $r_ttdonhang['tienlai'];
        $count_tienlai = $count_tienlai + $tienlai;

        $search_lohang = "SELECT * FROM lohang WHERE malohang = '$malohang'  ";
        $result_lohang = mysqli_query($conn, $search_lohang);
        $r_lohang = mysqli_fetch_assoc($result_lohang);
        $idlohang = $r_lohang['id'];

        $search_sanpham = "SELECT * FROM sanpham WHERE id = $idsanpham  ";
        $result_sanpham = mysqli_query($conn, $search_sanpham);
        $r_sanpham = mysqli_fetch_assoc($result_sanpham);
        $masanpham= $r_sanpham['masanpham'];

        $search_ttlohang = "SELECT * FROM thongtinlohang WHERE idlohang = $idlohang AND masanpham = '$masanpham'  AND kichthuoc = N'$kichthuoc' AND mausac = N'$mausac'  ";
            if($result_ttlohang = mysqli_query($conn, $search_ttlohang))
            {
                $fetch_ttlohang= mysqli_fetch_assoc($result_ttlohang);
                $idttlohang = $fetch_ttlohang['id'];
                $gianhapvao = $fetch_ttlohang['gianhapvao'];
                $tienlai = ($gia - $gianhapvao) * $soluong;
                $daban = $fetch_ttlohang['daban'];
                $daban = $daban + $soluong;
                $conlai = $fetch_ttlohang['conlai'];
               
                $conlai = $conlai - $soluong;

                $update_sql1 = "UPDATE thongtinlohang 
                SET daban = $daban ,
                    conlai = $conlai
                WHERE id = $idttlohang";
                mysqli_query($conn, $update_sql1);

                $search_sl = "SELECT * FROM soluong WHERE masanpham = '$masanpham' AND idsanpham = $idsanpham AND kichthuoc = N'$kichthuoc' AND mausac = N'$mausac'  ";

                if($result_sl = mysqli_query($conn, $search_sl)){
                    if($fetch_sl= mysqli_fetch_assoc($result_sl)){
                    $check_sl = $fetch_sl['soluong'];
                    $idsl = $fetch_sl['id'];
                    $gia = $fetch_sl['giabanra'];

                $check_sl = $check_sl - $soluong;
                $update_sql2 = "UPDATE soluong 
                SET soluong = $check_sl
                WHERE id = $idsl";
                mysqli_query($conn, $update_sql2);}}

                $update_sql3 = "UPDATE donhang 
                SET tienlai = $count_tienlai
                WHERE id = $iddonhang";
                 mysqli_query($conn, $update_sql3);
            }
    }
    header("Location: ../FE/viewChiTietDonHang.php?staff=$staff&sid=$iddonhang");
    
}
