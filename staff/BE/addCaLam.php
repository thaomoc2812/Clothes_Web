<?php

    // Lấy dữ liệu từ yêu cầu AJAX
    $boxSang = isset($_POST['boxSang']) ? 1 : 0;
$boxChieu = isset($_POST['boxChieu']) ? 1 : 0;
    $ngay = $_POST['shiftDate'];
    $staff = $_POST['staff'];

    require_once '../../php/connect.php';

if (!$boxSang || !$boxSang )
    {
        header("Location: ../FE/dangKyCaLam.php?staff=$staff");
    }
if($boxSang == 1)
{
    $addsql1 = "INSERT INTO dangkycalam
    (idnhanvien, calam, ngay, trangthai) VALUES ($staff,N'Sáng','$ngay',0)";
    mysqli_query($conn, $addsql1);
}
if($boxChieu == 1)
{
    $addsql2 = "INSERT INTO dangkycalam
    (idnhanvien, calam, ngay, trangthai) VALUES ($staff,N'Chiều','$ngay',0)";
    mysqli_query($conn, $addsql2);
}
   
header("Location: ../FE/dangKyCaLam.php?staff=$staff");

?>
