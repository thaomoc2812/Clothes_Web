<?php
$idkhachhang = $_POST['idkhachhang'];
$sdt = $_POST['sdt'];
$hoten = $_POST['hoten'];
$staff = $_POST['staff'];
$ma = "DH0";


$addsql1 = "INSERT INTO donhang
(idkhachhang,hotennguoinhan,sdtnguoinhan,thoigian,tinhtrang, idnhanvienxacnhan) VALUES ($idkhachhang,'$hoten','$sdt',NOW(),N'Offline',$staff)";
//thuc thi cau lenh them
if (mysqli_query($conn, $addsql1)) {
    $iddonhang = mysqli_insert_id($conn);
    $madonhang = $ma.$iddonhang;
    $update_sql00 = "UPDATE donhang SET madonhang = '$madonhang' WHERE id = $iddonhang";
    $u00 = mysqli_query($conn, $update_sql00);
    header("Location: ../../FE/quanLyDonHang/taoHoaDon.php?staff=$staff&idkhachhang=$idkhachhang&sdt=$sdt&iddonhang=$iddonhang");
    exit();
}
else {
    // Chuyển hướng trở lại trang trước
    $previousPage = $_SERVER['HTTP_REFERER'];
    header("Location: $previousPage");
    exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
}