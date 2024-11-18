<?php
//nhan du lieu tu form
$idttdonhang = $_POST['idttdonhang'];
$iddonhang = $_POST['iddonhang'];
$nhanxet = $_POST['nhanxet'];
$user = $_POST['user'];

//ket noi csdl
require_once '../../php/connect.php';

$update_sql = "UPDATE thongtindonhang 
SET nhanxet = '$nhanxet'
WHERE id = $idttdonhang";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/addNhanXet.php?user=$user&sid=$iddonhang");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}