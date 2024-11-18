<?php
//nhan du lieu tu form
$sdt = $_POST['sdt'];
$matkhau = $_POST['matkhau'];
$confirm = $_POST['confirm'];


//ket noi csdl
require_once 'connect.php';

if (!$sdt || !$matkhau )
    {
        header("Location: ../html/dangKy.php?sid=1");
        exit();
    }

    if (!preg_match("/^[0-9]{10}$/", $sdt)) {
        header("Location: ../html/dangKy.php?sid=2");
        exit();
    }


    if ($confirm != $matkhau )
    {
        header("Location: ../html/dangKy.php?sid=3");
        exit();
    }
$search_khach = "SELECT * FROM khachhang WHERE (sdt = '$sdt')";

$query = mysqli_query($conn, $search_khach);
$q=0;
while ($r0 = mysqli_fetch_assoc($query))
{
    if($r0['matkhau'] != NULL)
    {
        $q=1;
        header("Location: ../html/dangKy.php?sid=4");
        exit();
    }
    else
    {
        $hashedMatKhau = password_hash($matkhau, PASSWORD_DEFAULT);
        $update_sql1 = "UPDATE khachhang 
        SET matkhau ='$hashedMatKhau'
        WHERE sdt = '$sdt'";
        if(mysqli_query($conn, $update_sql1)){
            header("Location: ../../html/dangNhap.php?sid=0");
            exit();
        
        };
    
    }
    
    
};


$hashedMatKhau = password_hash($matkhau, PASSWORD_DEFAULT);
 


$addsql = "INSERT INTO khachhang
(sdt,matkhau) VALUES ('$sdt','$hashedMatKhau')";



if($q==0)
{
    if(mysqli_query($conn, $addsql)){
        //in thong bao thanh cong
        header("Location: ../../html/dangNhap.php?sid=0");
        exit();
    
    };
}
