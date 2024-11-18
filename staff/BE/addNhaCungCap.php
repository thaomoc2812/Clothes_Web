<?php
//nhan du lieu tu form
$staff = $_POST['staff'];
$tennhacungcap = $_POST['tennhacungcap'];
$manhacungcap = $_POST['manhacungcap'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];

//ket noi csdl
require_once '../../php/connect.php';

if (!$tennhacungcap || !$manhacungcap || !$sdt|| !$diachi )
    {
        header("Location: ../FE/addNhaCungCap.php?staff=$staff&noti=1");
        exit;
    }

    $search = "SELECT * FROM nhacungcap WHERE (manhacungcap = '$manhacungcap') ";

    $query = mysqli_query($conn, $search);
    $q=0;
    while ($r0 = mysqli_fetch_assoc($query))
    {
        if($r0['manhacungcap'] == $manhacungcap)
        {
            $q = 1;
        }
        
    };
    
    if($q == 1)
    {
        header("Location: ../FE/addNhaCungCap.php?staff=$staff&noti=2");
        exit;
    }

    if (!preg_match("/^[0-9]{10}$/", $sdt)) {
        header("Location: ../FE/addNhaCungCap.php?staff=$staff&noti=3");
        exit;
    }

$addsql = "INSERT INTO nhacungcap
(manhacungcap, tennhacungcap, sdt, diachi, trangthai) VALUES ('$manhacungcap','$tennhacungcap','$sdt','$diachi',1)";



//thuc thi cau lenh them
if(mysqli_query($conn, $addsql)){

    header("Location: ../FE/viewNhaCungCap.php?staff=$staff");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}