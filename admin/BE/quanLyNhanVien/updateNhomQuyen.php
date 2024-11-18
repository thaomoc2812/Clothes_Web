<?php
//nhan du lieu tu form
$idnhomquyen = $_POST['idnhomquyen'];
$tenNhomQuyen = $_POST['tennhomquyen'];

$themSanPham = isset($_POST['boxThemSanPham']) ? 1 : 0;
$timKiemSanPham = isset($_POST['boxTimKiemSanPham']) ? 1 : 0;
$xemDanhSachSanPham = isset($_POST['boxXemDanhSachSanPham']) ? 1 : 0;
$xoaSuaSanPham = isset($_POST['boxXoaSuaSanPham']) ? 1 : 0;
$quanLyDonHang = isset($_POST['boxQuanLyDonHang']) ? 1 : 0;
$quanLyDanhMucSanPham = isset($_POST['boxQuanLyDanhMucSanPham']) ? 1 : 0;
$quanLyKhuyenMai = isset($_POST['boxQuanLyKhuyenMai']) ? 1 : 0;
$quanLyKhachHang = isset($_POST['boxQuanLyKhachHang']) ? 1 : 0;
$quanLySoLuongTonKho = isset($_POST['boxQuanLySoLuongTonKho']) ? 1 : 0;
$quanLyLoHangSanPham = isset($_POST['boxQuanLyLoHangSanPham']) ? 1 : 0;
$phanLoaiSanPham = isset($_POST['boxPhanLoaiSanPham']) ? 1 : 0;
$quanLyNhaCungCap = isset($_POST['boxQuanLyNhaCungCap']) ? 1 : 0;
//ket noi csdl
require_once '../../../php/connect.php';


if (!$tenNhomQuyen || !$themSanPham && !$xemDanhSachSanPham && !$timKiemSanPham && !$xoaSuaSanPham && !$quanLyDonHang && !$quanLyDanhMucSanPham
&& !$quanLyKhuyenMai && !$quanLyKhachHang && !$quanLySoLuongTonKho && !$quanLyLoHangSanPham && !$quanLyNhaCungCap)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }


$search_sql = "SELECT * FROM nhomquyen WHERE 
(tennhomquyen = '$tenNhomQuyen')
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
    
    if($q > 1)
    {
        echo "Đã có nhóm quyền này trong danh sách.Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    }

else
{
    
    $update_sql = "UPDATE nhomquyen SET tennhomquyen = '$tenNhomQuyen' WHERE id = $idnhomquyen";
    $rupdate = mysqli_query($conn, $update_sql);
    $delete_sql1 = "DELETE FROM phanquyen WHERE idnhomquyen = $idnhomquyen";
    $r1 = mysqli_query($conn, $delete_sql1);
    echo $themSanPham;
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


    if($quanLyDanhMucSanPham == 1)
    {
        $search_sqlQuyenTruyCap = "SELECT * FROM quyentruycap WHERE (tenquyentruycap LIKE 'Quản lý danh mục sản phẩm')";
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