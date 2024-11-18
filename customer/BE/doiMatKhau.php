<?php
//nhan du lieu tu form
$user = $_POST['user'];
$matkhau = $_POST['matkhaucu'];
$matkhaumoi = $_POST['matkhaumoi'];
$xacnhanmatkhaumoi = $_POST['xacnhanmatkhaumoi'];
//ket noi csdl
require_once '../../php/connect.php';


$search_khach = "SELECT matkhau FROM khachhang WHERE (sdt = '$user')";

$query = mysqli_query($conn, $search_khach);


$r = mysqli_fetch_assoc($query);

$storeMatKhau = $r['matkhau'];
if(!password_verify($matkhau, $storeMatKhau))
{
    header("Location: ../FE/doiMatKhau.php?user=$user&check=1");
    exit();
}
 
if($matkhaumoi != $xacnhanmatkhaumoi)
{
    header("Location: ../FE/doiMatKhau.php?user=$user&check=2");
    exit();
}
 



$hashedMatKhau = password_hash($matkhaumoi, PASSWORD_DEFAULT);
        $update_sql1 = "UPDATE khachhang 
        SET matkhau ='$hashedMatKhau'
        WHERE sdt = '$user'";
if(mysqli_query($conn, $update_sql1)){
    header("Location: ../FE/taiKhoan.php?user=$user");
    exit();
    
};


?>