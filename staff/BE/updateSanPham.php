<?php
//nhan du lieu tu form
$idsanpham = $_GET['idsanpham'];
$staff = $_GET['staff'];
$tensanpham = $_POST['tensanpham'];
$mota = $_POST['mota'];

$filechinh = $_FILES['anhsanphamchinh'];
$filephu1 = $_FILES['anhsanphamphu1'];
$filephu2 = $_FILES['anhsanphamphu2'];
$filephu3 = $_FILES['anhsanphamphu3'];


$file_namechinh = $filechinh['name'];
$file_namephu1 = $filephu1['name'];
$file_namephu2 = $filephu2['name'];
$file_namephu3 = $filephu3['name'];


if($file_namechinh) move_uploaded_file($filechinh['tmp_name'], '../../php/uploads/' . $file_namechinh);
if($file_namephu1) move_uploaded_file($filephu1['tmp_name'], '../../php/uploads/' . $file_namephu1);
if($file_namephu2) move_uploaded_file($filephu2['tmp_name'], '../../php/uploads/' . $file_namephu2);
if($file_namephu3) move_uploaded_file($filephu3['tmp_name'], '../../php/uploads/' . $file_namephu3);




//ket noi csdl
require_once '../../php/connect.php';
$update_sql = "UPDATE sanpham SET tensanpham = '$tensanpham' WHERE id = $idsanpham";
$u = mysqli_query($conn, $update_sql);

$search_sanpham = "SELECT * FROM sanpham WHERE id = $idsanpham";
$result_sanpham = mysqli_query($conn, $search_sanpham);
if ($r_sp = mysqli_fetch_assoc($result_sanpham))
    $masanpham = $r_sp['masanpham'];

    $search_thongtinsanpham = "SELECT * FROM thongtinsanpham WHERE masanpham = '$masanpham'";
    $result_thongtinsanpham = mysqli_query($conn, $search_thongtinsanpham);
    if ($r_ttsp = mysqli_fetch_assoc($result_thongtinsanpham))
        $idthongtinsanpham = $r_ttsp['id'];

if($file_namechinh)
{
    
$update_sql1 = "UPDATE hinhanhsanpham SET hinhanhchinh = '$file_namechinh' WHERE idsanpham = $idsanpham";
$u1 = mysqli_query($conn, $update_sql1);
}

if($file_namephu1)
{
    
$update_sql2 = "UPDATE hinhanhsanpham SET hinhanhphu1 = '$file_namephu1' WHERE idsanpham = $idsanpham";
$u2 = mysqli_query($conn, $update_sql2);
}

if($file_namephu2)
{
    
$update_sql3 = "UPDATE hinhanhsanpham SET hinhanhphu2 = '$file_namephu2' WHERE idsanpham = $idsanpham";
$u3 = mysqli_query($conn, $update_sql3);
}

if($file_namephu3)
{
    
$update_sql4 = "UPDATE hinhanhsanpham SET hinhanhphu3 = '$file_namephu3' WHERE idsanpham = $idsanpham";
$u4 = mysqli_query($conn, $update_sql4);
}
if($mota)
{
    
$update_sql5 = "UPDATE thongtinsanpham SET mota = '$mota' WHERE id = $idthongtinsanpham";
$u5 = mysqli_query($conn, $update_sql5);
}

//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong
    header("Location: ../FE/editSanPham.php?staff=$staff&sid=$idsanpham");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}