<?php
//nhan du lieu tu form
$masanpham = $_POST['masanpham'];
$malohang = $_POST['malohang'];
$gianhapvao = $_POST['gianhapvao'];
$mausac = $_POST['mausac'];
$kichthuoc = $_POST['kichthuoc'];
$soluong = $_POST['soluong'];
//ket noi csdl
require_once '../../../php/connect.php';


$search_sql1 = "SELECT * FROM lohang WHERE malohang = '$malohang'";
$result1 = mysqli_query($conn, $search_sql1);
if ($r1 = mysqli_fetch_assoc($result1))
    $idlohang= $r1['id'];
$addsql1 = "INSERT INTO thongtinlohang (idlohang, masanpham, gianhapvao, mausac, kichthuoc, soluong,conlai, trangthai) VALUES ($idlohang,'$masanpham', $gianhapvao, '$mausac', '$kichthuoc',$soluong,$soluong,0)";


if(mysqli_query($conn, $addsql1)){

    header("Location: ../../FE/quanLyKhoHang/nhapKhoSanPhamThem.php?idlohang=$idlohang&masanpham=$masanpham");
    exit();

}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}



?>