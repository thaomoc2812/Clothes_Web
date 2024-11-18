<?php
if(isset($_POST['btnDatHang'])) {

    // Lấy các giá trị từ form
    $hoten = $_POST['hoten'];
    $tinh = $_POST['tinh'];
    $huyen = $_POST['huyen'];
    $xa = $_POST['xa'];
    $sonha = $_POST['sonha'];
    $sdt = $_POST['sdt'];
    $httt_ma = $_POST['httt_ma'];
    $phiship = $_POST['idship'];
    $user = $_POST['user'];
    $giatridonhang = $_POST['giatridonhang'];
    // Đọc nội dung của tệp tin tinh_tp.json và tìm giá trị tương ứng với $tinhKey

$tinhJSON = file_get_contents('../../json/tinh_tp.json');
$tinhData = json_decode($tinhJSON, true);
$tinhName = $tinhData[$tinh]['name_with_type'];


// Tương tự, đọc và tìm giá trị từ tệp tin quan_huyen.json
$huyenJSON = file_get_contents('../../json/quan_huyen.json');
$huyenData = json_decode($huyenJSON, true);
$huyenName = $huyenData[$huyen]['name_with_type'];

// Và cũng đọc và tìm giá trị từ tệp tin xa_phuong.json
$xaJSON = file_get_contents('../../json/xa_phuong.json');
$xaData = json_decode($xaJSON, true);
$xaName = $xaData[$xa]['name_with_type'];


require_once '../../php/connect.php';
$search_khach = "SELECT * FROM khachhang WHERE  sdt = '$user' ";
$result_khach = mysqli_query($conn, $search_khach);
$fetch_khach= mysqli_fetch_assoc($result_khach);
$idkhachhang = $fetch_khach['id'];

$hinhthucthanhtoan ="";
if($httt_ma == 2)
{
    $hinhthucthanhtoan = "Chuyển khoản";
}
else
{
    $hinhthucthanhtoan = "Ship COD";
}


$ma = "DH0";


$addsql1 = "INSERT INTO donhang
(idkhachhang,hotennguoinhan,sdtnguoinhan,tinh,huyen,xa,sonha,giatridonhang,phiship,hinhthucthanhtoan,thoigian,tinhtrang) VALUES ($idkhachhang,'$hoten','$sdt','$tinhName','$huyenName','$xaName','$sonha',$giatridonhang,$phiship,'$hinhthucthanhtoan',NOW(),N'Chờ xác nhận')";
//thuc thi cau lenh them
if (mysqli_query($conn, $addsql1)) {
    $iddonhang = mysqli_insert_id($conn);
    $madonhang = $ma.$iddonhang;
    $update_sql00 = "UPDATE donhang SET madonhang = '$madonhang' WHERE id = $iddonhang";
    $u00 = mysqli_query($conn, $update_sql00);
};

$search_giohang = "SELECT * FROM giohang WHERE  idkhachhang = $idkhachhang ";
$result_giohang = mysqli_query($conn, $search_giohang);
$count_pay = 0;
while($fetch_giohang= mysqli_fetch_assoc($result_giohang))
{

    $idsanpham = $fetch_giohang['idsanpham'];

    $search_sp = "SELECT * FROM sanpham WHERE  id = $idsanpham ";
    $result_sp = mysqli_query($conn, $search_sp);
    $fetch_sp= mysqli_fetch_assoc($result_sp);

    $size = $fetch_giohang['kichthuoc'];
    $color = $fetch_giohang['mausac'];
    $soluong = $fetch_giohang['soluong'];

    $search_sl = "SELECT * FROM soluong WHERE  idsanpham = $idsanpham AND kichthuoc = '$size' AND mausac = '$color'  ";
    $result_sl = mysqli_query($conn, $search_sl);
    $fetch_sl= mysqli_fetch_assoc($result_sl);
    $idsoluong = $fetch_sl['id'];
    $gia = 0;
    $now = date('Y-m-d');
    $search_ttkm = "SELECT * FROM thongtinkhuyenmai WHERE ngaybatdau <= '$now' AND ngayketthuc >= '$now'";
    $check_km = 0;
   if($result_ttkm = mysqli_query($conn, $search_ttkm))
    {
    while($fetch_ttkm = mysqli_fetch_assoc($result_ttkm))
    {
   $makhuyenmai = $fetch_ttkm['makhuyenmai'];
    $search_km = "SELECT * FROM khuyenmai WHERE makhuyenmai = '$makhuyenmai' AND idsoluong = $idsoluong";
    if($result_km = mysqli_query($conn, $search_km))
    {
    $check_km = 1;
    $fetch_km = mysqli_fetch_assoc($result_km);
    $giathat = $fetch_sl['giabanra'] *(100-$fetch_ttkm['giam'])/100;
    $gia = $giathat;
    
    }
    }
    }
    if($check_km == 0){$gia = $fetch_sl['giabanra'];}
    $addsql2 = "INSERT INTO thongtindonhang
    (idkhachhang,iddonhang,idsanpham,kichthuoc,mausac,soluong,gia) VALUES ($idkhachhang,$iddonhang,$idsanpham,'$size','$color',$soluong,$gia)";
    //thuc thi cau lenh them
    mysqli_query($conn, $addsql2);
}
$delete_sql = "DELETE FROM giohang WHERE idkhachhang = $idkhachhang";
mysqli_query($conn, $delete_sql);

header("Location: ../FE/donHangChoXacNhan.php?user=$user");

}
?>