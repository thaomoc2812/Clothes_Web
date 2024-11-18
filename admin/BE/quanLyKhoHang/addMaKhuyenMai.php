<?php
//nhan du lieu tu form

$makhuyenmai = $_POST['makhuyenmai'];
$giam = $_POST['giam'];
$ngaybatdau = $_POST['ngaybatdau'];
$ngayketthuc = $_POST['ngayketthuc'];
$key1="";
$key2="";
$key3="";

require_once '../../../php/connect.php';

if (!$makhuyenmai || $makhuyenmai == "."||!$giam || $giam == "."||!$ngaybatdau || $ngaybatdau == "."||!$ngayketthuc || $ngayketthuc == ".") {
    header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?noti=1");
    exit;
}


if ( !is_numeric($giam) || $giam < 0 || $giam > 100)
{
    header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?noti=2");
    exit;
}

// if (($ngaybatdau->format('m') < date("Y-m-d").'m'||($ngaybatdau->format('m') == date("Y-m-d").'m' && $ngaybatdau->format('d') < date("Y-m-d").'d'))) {
//     echo "Thời gian áp dụng không phù hợp. <a href='javascript: history.go(-1)'>Trở lại</a>";
//     exit;
// }

$search_check = "SELECT COUNT(*) as count FROM thongtinkhuyenmai WHERE makhuyenmai = '$makhuyenmai' AND ngaybatdau <= NOW() ";

$query_check = mysqli_query($conn, $search_check);

if ($query_check) {
    $row_check = mysqli_fetch_assoc($query_check);
    $q_check = $row_check['count'];
} else {
    $q_check = 0;
}

if ($q_check >0) {
    header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?noti=3");
    exit();
}


$search = "SELECT * FROM thongtinkhuyenmai WHERE (makhuyenmai = '$makhuyenmai') ";

$query = mysqli_query($conn, $search);
$q = 0;
while ($r0 = mysqli_fetch_assoc($query)) {
    if ($r0['makhuyenmai'] == $makhuyenmai) {
        $q = 1;
    }
};
if ($q == 1) {
    $update_sql = "UPDATE thongtinkhuyenmai SET giam = $giam, ngaybatdau = '$ngaybatdau', ngayketthuc = '$ngayketthuc' WHERE makhuyenmai = '$makhuyenmai'";


//thuc thi cau lenh them
if (mysqli_query($conn, $update_sql)) {
    
    header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?makhuyenmai=$makhuyenmai&giam=$giam&ngaybatdau=$ngaybatdau&ngayketthuc=$ngayketthuc");
    exit();
};
}
else{
$addsql = "INSERT INTO thongtinkhuyenmai (makhuyenmai,giam,ngaybatdau,ngayketthuc) VALUES ('$makhuyenmai',$giam,'$ngaybatdau','$ngayketthuc')";

//thuc thi cau lenh them
if (mysqli_query($conn, $addsql)) {
   header("Location: ../../FE/quanLyKhoHang/addMaKhuyenMai.php?makhuyenmai=$makhuyenmai&giam=$giam&ngaybatdau=$ngaybatdau&ngayketthuc=$ngayketthuc&key1=$key1&key2=$key2&key3=$key3");
   exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}
}





