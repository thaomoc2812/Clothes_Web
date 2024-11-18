<?php
$idkhachhang = $_POST['idkhachhang'];
$sdt = $_POST['sdt'];
$staff = $_POST['staff'];
$iddonhang = $_POST['iddonhang'];
$idsanpham = $_POST['idsanpham'];
$masanpham = $_POST['masanpham'];
$kichthuoc = $_POST['kichthuoc'];
$mausac = $_POST['mausac'];
$soluong = $_POST['soluong'];
$malohang = $_POST['malohang'];

//ket noi csdl
require_once '../../php/connect.php';


if(!$soluong || !$kichthuoc || !$mausac)
{
    header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=3&add=1");
    exit();
}

$search_sl = "SELECT * FROM soluong WHERE masanpham = '$masanpham' AND idsanpham = $idsanpham AND kichthuoc = N'$kichthuoc' AND mausac = N'$mausac'  ";

if($result_sl = mysqli_query($conn, $search_sl)){
    if($fetch_sl= mysqli_fetch_assoc($result_sl)){
    $check_sl = $fetch_sl['soluong'];
    $idsl = $fetch_sl['id'];
    $gia = $fetch_sl['giabanra'];

    if($check_sl < $soluong)
    {
        header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=2&add=1");
        exit();
    }
    else
    {
        $check_sl = $check_sl - $soluong;
        $search_lohang = "SELECT * FROM lohang WHERE malohang = '$malohang'  ";
        if($result_lohang = mysqli_query($conn, $search_lohang))
        {
            $fetch_lohang= mysqli_fetch_assoc($result_lohang);
            $idlohang = $fetch_lohang['id'];

            $search_ttlohang = "SELECT * FROM thongtinlohang WHERE idlohang = $idlohang AND masanpham = '$masanpham'  AND kichthuoc = N'$kichthuoc' AND mausac = N'$mausac'  ";
            if($result_ttlohang = mysqli_query($conn, $search_ttlohang))
            {
                $fetch_ttlohang= mysqli_fetch_assoc($result_ttlohang);
                $idttlohang = $fetch_ttlohang['id'];
                $gianhapvao = $fetch_ttlohang['gianhapvao'];
                $conlai = $fetch_ttlohang['conlai'];
                $tienlai = ($gia - $gianhapvao) * $soluong;

                if($soluong > $conlai)
                {
                    header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=5&add=1");
                    exit();
                }
                else
                {
                    $addttdonhang = "INSERT INTO thongtindonhang
                    (idkhachhang,iddonhang,idsanpham,mausac, kichthuoc,soluong, gia,malohang, gianhapvao, tienlai) VALUES ($idkhachhang,$iddonhang,$idsanpham,'$mausac','$kichthuoc',$soluong,$gia, '$malohang', $gianhapvao, $tienlai)";
                    mysqli_query($conn, $addttdonhang);
                   
                    header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang");
                    exit();
                }
               

               
            }else
            {
                header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=4&add=1");
                exit();
            }
            
        }
        else
        {
            header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=4&add=1");
            exit();
        }
        

        
    }
}
else
{
    header("Location: ../FE/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&idsanpham=$idsanpham&iddonhang=$iddonhang&check=1&add=1");
    exit();
}
    
}
