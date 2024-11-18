<?php
//nhan du lieu tu form
$iddonhang = $_GET['sid'];
$user = $_GET['user'];
//ket noi csdl
require_once '../../php/connect.php';

$count_tienlai = "SELECT SUM(tienlai) AS TongTienLai
FROM thongtindonhang
WHERE iddonhang = $iddonhang;
";
$result_tienlai = mysqli_query($conn, $count_tienlai);
$row_tienlai = mysqli_fetch_assoc($result_tienlai );
$total = $row_tienlai['TongTienLai'];

$update_sql = "UPDATE donhang SET tinhtrang = N'Đã nhận',
tienlai = $total,
thoigiannhanhang = NOW()
 WHERE id = $iddonhang";


//thuc thi cau lenh them
if(mysqli_query($conn, $update_sql)){
    //in thong bao thanh cong

    header("Location: ../FE/donHangDaMua.php?user=$user");

    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}



?>