<?php


$tenNhomQuyen = $_POST['tenNhomQuyen'];

$themSanPham = isset($_POST['boxThemSanPham']) ? 1 : 0;
$timKiemSanPham = isset($_POST['boxTimKiemSanPham']) ? 1 : 0;
$xemDanhSachSanPham = isset($_POST['boxXemDanhSachSanPham']) ? 1 : 0;
$xoaSuaSanPham = isset($_POST['boxXoaSuaSanPham']) ? 1 : 0;
$quanLyDonHang = isset($_POST['boxQuanLyDonHang']) ? 1 : 0;
$quanLyKhuyenMai = isset($_POST['boxQuanLyKhuyenMai']) ? 1 : 0;
$quanLyDanhMucSanPham = isset($_POST['boxQuanLyDanhMucSanPham']) ? 1 : 0;
$quanLyKhachHang = isset($_POST['boxQuanLyKhachHang']) ? 1 : 0;
$quanLySoLuongTonKho = isset($_POST['boxQuanLySoLuongTonKho']) ? 1 : 0;
$quanLyLoHangSanPham = isset($_POST['boxQuanLyLoHangSanPham']) ? 1 : 0;
$phanLoaiSanPham = isset($_POST['boxPhanLoaiSanPham']) ? 1 : 0;
$quanLyNhaCungCap = isset($_POST['boxQuanLyNhaCungCap']) ? 1 : 0;

//ket noi csdl
require_once '../../../php/connect.php';
if (!$tenNhomQuyen || !$themSanPham && !$xemDanhSachSanPham && !$timKiemSanPham && !$xoaSuaSanPham && !$quanLyDonHang && !$quanLyKhuyenMai
&& !$quanLyDanhMucSanPham && !$quanLyKhachHang && !$quanLySoLuongTonKho && !$quanLyLoHangSanPham && !$quanLyNhaCungCap)
    {
        header("Location: ../../FE/quanLyNhanVien/addNhomQuyen.php?noti=1");
        exit;
    }


$search_sql = "SELECT * FROM nhomquyen WHERE 
(tennhomquyen LIKE '%$tenNhomQuyen%')
";
$result = mysqli_query($conn, $search_sql);
$q=0;
    
    
    while ($r = mysqli_fetch_assoc($result))
    {
        $key = $r['tennhomquyen'] ;
        if  ($tenNhomQuyen == $key)
        {
            $q++;
        }
    
    
    };
    
    if($q > 0)
    {
        header("Location: ../../FE/quanLyNhanVien/addNhomQuyen.php?noti=2");
    }

else
{
    $addsql = "INSERT INTO nhomquyen (tennhomquyen) VALUES ('$tenNhomQuyen')";
    mysqli_query($conn, $addsql);


    $search_sqlNhomQuyen = "SELECT * FROM nhomquyen WHERE (tennhomquyen LIKE '$tenNhomQuyen')";
    $resultNhomQuyen = mysqli_query($conn, $search_sqlNhomQuyen);
    $rnhomquyen = mysqli_fetch_assoc($resultNhomQuyen);
    $idnhomquyen = $rnhomquyen['id'];




    if($themSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Thêm sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql = "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    if($timKiemSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Tìm kiếm sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    if($xemDanhSachSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Xem danh sách sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    if($xoaSuaSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Xóa/Sửa sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    if($quanLyDonHang == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý đơn hàng')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }


    if($quanLyKhuyenMai == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý khuyến mại')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }



    if($quanLyDanhMucSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý danh mục sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }



    if($quanLyKhachHang == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý khách hàng')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }


    if($quanLySoLuongTonKho == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý số lượng tồn kho')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }


    if($quanLyLoHangSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý lô hàng sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }


    if($phanLoaiSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Phân loại sản phẩm')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    if($quanLyNhaCungCap == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý nhà cung cấp')";
        $resultQuyenTruyCap = mysqli_query($conn, $search_sqlQuyenTruyCap);
        $rQuyenTruyCap = mysqli_fetch_assoc($resultQuyenTruyCap);
        $idquyentruycap = $rQuyenTruyCap['id'];
        $addsql= "INSERT INTO phanquyen (idnhomquyen,idquyentruycap) VALUES ('$idnhomquyen','$idquyentruycap')";
        mysqli_query($conn, $addsql);
    }

    header("Location: ../../FE/quanLyNhanVien/viewNhomQuyen.php");


}

?>