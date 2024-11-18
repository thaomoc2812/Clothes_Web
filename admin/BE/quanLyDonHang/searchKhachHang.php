<?php 
$sdt = $_POST['sdt'];
$staff = $_POST['staff'];
//ket noi csdl
require_once '../../../php/connect.php';


if (!$sdt ||!preg_match("/^[0-9]{10}$/", $sdt) )
    {
        header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?noti=2");
        exit;
    }

$search_kh = "SELECT * FROM khachhang WHERE sdt = '$sdt'";
$result_kh = mysqli_query($conn, $search_kh);
if($r_kh = mysqli_fetch_assoc($result_kh))
{
    $idkhachhang = $r_kh['id'];
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt");
    exit();

}
else
{
    $add_kh ="INSERT INTO khachhang (sdt) VALUES ('$sdt')";
    mysqli_query($conn, $add_kh);
    $last_id = mysqli_insert_id($conn);
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?staff=$staff&idkhachhang=$last_id&sdt=$sdt");
    exit();
}