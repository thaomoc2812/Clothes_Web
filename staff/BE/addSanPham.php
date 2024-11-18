<?php
//nhan du lieu tu form
$staff = $_POST['staff'];
$tensanpham = $_POST['tensanpham'];
//$masanpham = $_POST['masanpham'];
$loaidanhmuc = $_POST['loaidanhmuc'];
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

if (!$tensanpham || !$loaidanhmuc) {
    header("Location: ../FE/addSanPham.php?staff=$staff&noti=1");
    exit;
}

// $search = "SELECT * FROM sanpham WHERE (masanpham = '$masanpham') ";

// $query = mysqli_query($conn, $search);
// $q = 0;
// while ($r0 = mysqli_fetch_assoc($query)) {
//     if ($r0['tensanpham'] == $tensanpham) {
//         $q = 1;
//     }
// };
// if ($q == 1) {
//     echo "Mã sản phẩm đã tồn tại <a href='javascript: history.go(-1)'>Trở lại</a>";
//     exit;
// }



$search_sql1 = "SELECT * FROM danhmucsanpham WHERE tendanhmuc = '$loaidanhmuc'";
$result1 = mysqli_query($conn, $search_sql1);
if ($r1 = mysqli_fetch_assoc($result1))
    $iddanhmuc = $r1['id'];
else {
    $search_sql2 = "SELECT * FROM phanloaisanpham WHERE loaisanpham = '$loaidanhmuc'";
    $result2 = mysqli_query($conn, $search_sql2);
    if ($r2 = mysqli_fetch_assoc($result2))
        $idloaisanpham = $r2['id'];


    $search_sql3 = "SELECT * FROM danhmucsanpham WHERE idphanloai = $idloaisanpham";
    $result3 = mysqli_query($conn, $search_sql3);
    $q = 0;
    while ($r3 = mysqli_fetch_assoc($result3)) {
        if ($r3['tendanhmuc'] == 'Khác') {
            $q = 1;
            $iddanhmuc = $r3['id'];
        }
    };
    if($q == 0)
    {
        $addsql1 = "INSERT INTO danhmucsanpham (tendanhmuc,idphanloai) VALUES (N'Khác',$idloaisanpham)";
        $a1 = mysqli_query($conn, $addsql1);
        $search_sql11 = "SELECT * FROM danhmucsanpham WHERE (tendanhmuc = 'Khác' AND idphanloai = $idloaisanpham)";
        $result11 = mysqli_query($conn, $search_sql11);
        if ($r11 = mysqli_fetch_assoc($result11))
            $iddanhmuc = $r11['id'];
    }
}


$masanpham = "SP0";
// $addsql2 = "INSERT INTO thongtinsanpham (iddanhmuc,masanpham) VALUES ($iddanhmuc,'$masanpham')";
// $a2 = mysqli_query($conn, $addsql2);
$addsql2 = "INSERT INTO thongtinsanpham (iddanhmuc,masanpham) VALUES ($iddanhmuc,'$masanpham')";
$a2 = mysqli_query($conn, $addsql2);


$search_sql4 = "SELECT * FROM thongtinsanpham WHERE masanpham = '$masanpham'";
$result4 = mysqli_query($conn, $search_sql4);
if ($r4 = mysqli_fetch_assoc($result4))
    $idthongtinsanpham = $r4['id'];
$sp = $idthongtinsanpham + 1;
$masanpham = $masanpham.$sp;
$update_sql00 = "UPDATE thongtinsanpham SET masanpham = '$masanpham' WHERE id = $idthongtinsanpham";
$u00 = mysqli_query($conn, $update_sql00);


$addsql3 = "INSERT INTO sanpham (masanpham, tensanpham, idthongtinsanpham) VALUES ('$masanpham','$tensanpham',$idthongtinsanpham)";
$a3 = mysqli_query($conn, $addsql3);

$search_sql5 = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
$result5 = mysqli_query($conn, $search_sql5);
if ($r5 = mysqli_fetch_assoc($result5))
    $idsanpham = $r5['id'];

$addsql4 = "INSERT INTO hinhanhsanpham(idsanpham) VALUES ($idsanpham)";
$a4 = mysqli_query($conn, $addsql4);
$addsql44 = "INSERT INTO soluong (idsanpham) VALUES ($idsanpham)";
$a44 = mysqli_query($conn, $addsql44);

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
$mota = mysqli_real_escape_string($conn, $mota);
$update_sql5 = "UPDATE thongtinsanpham SET mota = '$mota' WHERE id = $idthongtinsanpham";
$u5 = mysqli_query($conn, $update_sql5);
}


 header("Location: ../FE/viewSanPham.php?staff=$staff");
