<?php
//nhan du lieu tu form
$link = $_GET['link'];
$makhuyenmai = $_GET['makhuyenmai'];
$giam = $_GET['giam'];
$ngaybatdau = $_GET['ngaybatdau'];
$ngayketthuc = $_GET['ngayketthuc'];
$idsoluong = $_GET['idsoluong'];
$key1 = $_GET['key1'];
$key2 = $_GET['key2'];
$key3 = $_GET['key3'];


require_once '../../../php/connect.php';

$search_sql = "SELECT * FROM thongtinkhuyenmai WHERE makhuyenmai = '$makhuyenmai'";
$result = mysqli_query($conn, $search_sql);
if ($r = mysqli_fetch_assoc($result))
    $idthongtinkhuyenmai = $r['id'];

$delete_sql = "DELETE FROM khuyenmai WHERE idsoluong = $idsoluong";

$d1 = mysqli_query($conn, $delete_sql);

if ( $d1&& $link == "addMaKhuyenMai")
{
    header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?makhuyenmai=$makhuyenmai&giam=$giam&ngaybatdau=$ngaybatdau&ngayketthuc=$ngayketthuc&key1=$key1&key2=$key2&key3=$key3");
    exit();
};

if ($d1 && $link == "viewChiTietMaKhuyenMai")
{
    $key = "";
    header("Location: ../../FE/quanLyKhoHang/viewChiTietMaKhuyenMai.php?sid=$idthongtinkhuyenmai&key=$key");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}

?>