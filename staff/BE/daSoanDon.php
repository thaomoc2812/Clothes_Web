<?php
//nhan du lieu tu form
$iddonhang = $_GET['sid'];
$staff = 0;
if (isset($_GET['staff']))
{
$staff = $_GET['staff'];
}
//ket noi csdl
require_once '../../php/connect.php';
$search_dh = "SELECT * FROM thongtindonhang WHERE iddonhang = $iddonhang";
$result_dh = mysqli_query($conn, $search_dh);
while($r_dh = mysqli_fetch_assoc($result_dh))
{
    $malohang = $r_dh['malohang'];
    if($malohang == NULL )
    
    {
        header("Location: ../FE/soanDon.php?staff=$staff&sid=$iddonhang&check=3");
    exit();
    }

}


$update_sql = "UPDATE donhang 
SET tinhtrang = N'Đã soạn đơn' ,
    idnhanvienxacnhan = '$staff'
WHERE id = $iddonhang";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/daSoanDon.php?staff=$staff");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}