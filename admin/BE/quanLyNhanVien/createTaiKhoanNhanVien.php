


<?php
//nhan du lieu tu form
$sdt = $_POST['sdt'];
$matkhau = $_POST['matkhau'];


//ket noi csdl
require_once '../../../php/connect.php';



if (!$sdt || !$matkhau)
    {
        header("Location: ../../FE/quanLyNhanVien/createTaiKhoanNhanVien.php?noti=1");
        exit;
    }


    if (!preg_match("/^[0-9]{10}$/", $sdt)) {
        header("Location: ../../FE/quanLyNhanVien/createTaiKhoanNhanVien.php?noti=2");
        exit;
    }

$search_sql = "SELECT * FROM nhanvien WHERE 
(sdt = '$sdt') AND trangthai = 1
";


$result = mysqli_query($conn, $search_sql);
$q=0;


while ($r = mysqli_fetch_assoc($result))
{
    $key = $r['sdt'] ;
    if  ($sdt == $key)
    {
        $q++;
    }


};

if($q == 0)
{
    header("Location: ../../FE/quanLyNhanVien/createTaiKhoanNhanVien.php?noti=3");
    exit;
}

else
{
    $hashedMatKhau = password_hash($matkhau, PASSWORD_DEFAULT);
    $addsql = "UPDATE nhanvien SET matkhau = '$hashedMatKhau' WHERE sdt = $sdt";
    if( mysqli_query($conn, $addsql)){
    
        header("Location: ../../FE/quanLyNhanVien/createTaiKhoanNhanVien.php?noti=4");
        exit();
    }
    else {
        // Chuyển hướng trở lại trang trước
        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");
        exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
    }
}



 