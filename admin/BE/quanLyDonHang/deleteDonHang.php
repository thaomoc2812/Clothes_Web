<?php
$iddonhang = $_GET['iddonhang'];

//ket noi csdl
require_once '../../../php/connect.php';
$search_sql = "SELECT * FROM thongtindonhang WHERE iddonhang = $iddonhang";
if($result = mysqli_query($conn, $search_sql))
{
    if ($r = mysqli_fetch_assoc($result))
    {
        $delete_sql2 = "DELETE FROM thongtindonhang WHERE iddonhang = $iddonhang";
        mysqli_query($conn, $delete_sql2);

    }
}

$delete_sql = "DELETE FROM donhang WHERE id = $iddonhang";

if (mysqli_query($conn, $delete_sql)) {
    header("Location: ../../home.php");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}
