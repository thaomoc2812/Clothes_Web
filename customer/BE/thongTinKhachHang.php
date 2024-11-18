<?php
$user = $_POST['user'];
   //ket noi csdl
   require_once '../../php/connect.php';
if(isset($_POST['hoten']))
{
    $hoten = $_POST['hoten'];
 
    $update_hoten = "UPDATE khachhang SET hoten = '$hoten' WHERE sdt = '$user'";
    $u_hoten = mysqli_query($conn, $update_hoten);
}
if(isset($_POST['tinh']))
{
    $tinh = $_POST['tinh'];
    $tinhJSON = file_get_contents('../../json/tinh_tp.json');
    $tinhData = json_decode($tinhJSON, true);
    $tinhName = $tinhData[$tinh]['name_with_type'];
    $update_tinh = "UPDATE khachhang SET tinh = '$tinhName' WHERE sdt = '$user'";
    $u_tinh = mysqli_query($conn, $update_tinh);
}

if(isset($_POST['huyen']))
{
    $huyen = $_POST['huyen'];
    $huyenJSON = file_get_contents('../../json/quan_huyen.json');
    $huyenData = json_decode($huyenJSON, true);
    $huyenName = $huyenData[$huyen]['name_with_type'];
    $update_huyen = "UPDATE khachhang SET huyen = '$huyenName' WHERE sdt = '$user'";
    $u_huyen = mysqli_query($conn, $update_huyen);
}

if(isset($_POST['xa']))
{
    $xa = $_POST['xa'];
    $xaJSON = file_get_contents('../../json/xa_phuong.json');
    $xaData = json_decode($xaJSON, true);
    $xaName = $xaData[$xa]['name_with_type'];
    $update_xa = "UPDATE khachhang SET xa = '$xaName' WHERE sdt = '$user'";
    $u_xa = mysqli_query($conn, $update_xa);
}
if(isset($_POST['sonha']))
{
    $sonha = $_POST['sonha'];
   
    $update_sonha = "UPDATE khachhang SET sonha = '$sonha' WHERE sdt = '$user'";
    $u_sonha = mysqli_query($conn, $update_sonha);
}
header("Location: ../FE/thongTinKhachHang.php?user=$user");
  