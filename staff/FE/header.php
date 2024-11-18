

<?php 

if (isset($_GET['staff']))
{
$staff = $_GET['staff'];
}
else $staff = "";
require_once '../../php/connect.php';
$search_nhanvien = "SELECT * FROM nhanvien WHERE  id = $staff ";
$result_nhanvien = mysqli_query($conn, $search_nhanvien);
$fetch_nhanvien= mysqli_fetch_assoc($result_nhanvien);
$vitri = $fetch_nhanvien['vitri'];


$search_nhomquyen = "SELECT * FROM nhomquyen WHERE  id = $vitri ";
$result_nhomquyen = mysqli_query($conn, $search_nhomquyen);
$fetch_nhomquyen= mysqli_fetch_assoc($result_nhomquyen);
$tennhomquyen = $fetch_nhomquyen['tennhomquyen'];


?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name ="viewport" content="width= device-width,initial-scale=1.0">
      <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>


      <script src="../../../js/script_admin.js"></script>
      <link rel="stylesheet" href="../../../css/dashMain.css">
      <link rel="stylesheet" href="../../../css/style2.css">
      <link rel="stylesheet" href="../../../css/entypo.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
    </head>

    <body class="page-body  page-fade" onload="collapseSidebar()">

      <div class="page-container sidebar-collapsed" id="navbarcollapse" >
  
  
          <div class="sidebar-menu">
            
              <header class="logo-env">
  
                  <!-- logo -->
  
  
                  <!-- logo collapse icon -->
                  <div class="sidebar-collapse" onclick="collapseSidebar()">
                      <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                          <i class="entypo-menu"></i>
                      </a>
                  </div>
              </header>
              
              <ul id="main-menu" class="" >
                
                  <li id="dash"><a href="home.php?staff=<?php echo $staff?>"><i class="entypo-gauge" ></i><span>Home [ <?php echo $tennhomquyen ?> ]</span></a></li>
                  <li class="" ><a href="viewSoCaLam.php?staff=<?php echo $staff?>" ><span>Số ca làm</span></a>
                  <li class="" ><a href="dangKyCaLam.php?staff=<?php echo $staff?>" ><span>Đăng ký ca làm</span></a>
                  <?php $search_phanquyen2 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 2 ";
                  if($result_nhomquyen2 = mysqli_query($conn, $search_phanquyen2)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen2)){?>
                    <li class="" ><a href="addSanPham.php?staff=<?php echo $staff?>" ><span>Thêm sản phẩm</span></a>
                  <?php }} ?>
                  
                  <?php $search_phanquyen3 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 3 ";
                  if($result_nhomquyen3 = mysqli_query($conn, $search_phanquyen3)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen3)){?>
                    <li class="" ><a href="searchSanPhamFirst.php?staff=<?php echo $staff?>" ><span>Tìm kiếm sản phẩm</span></a>
                  <?php }}?>
                  
                  <?php $search_phanquyen4 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 4 ";
                  if($result_nhomquyen4 = mysqli_query($conn, $search_phanquyen4)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen4)){?>
                  <li class="" ><a href="viewSanPham.php?staff=<?php echo $staff?>" ><span>Xem danh sách sản phẩm</span></a>
                  <?php } }?>

                  <?php $search_phanquyen5 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 5 ";
                  if($result_nhomquyen5 = mysqli_query($conn, $search_phanquyen5)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen5)){?>
                  <li class="" ><a href="deleteEditSanPham.php?staff=<?php echo $staff?>" ><span>Xóa/Sửa sản phẩm</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen8 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 8 ";
                  if($result_nhomquyen8 = mysqli_query($conn, $search_phanquyen8)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen8)){?>
                  <li class="" ><a href="taoHoaDon.php?staff=<?php echo $staff?>" ><span>Quản lý đơn hàng</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen11 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 11 ";
                  if($result_nhomquyen11 = mysqli_query($conn, $search_phanquyen11)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen11)){?>
                  <li class="" ><a href="viewKhachHangOnline.php?staff=<?php echo $staff?>" ><span>Quản lý khách hàng</span></a>
                  <?php }}?>

                  <?php $search_phanquyen12 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 12 ";
                 if($result_nhomquyen12 = mysqli_query($conn, $search_phanquyen12)){
                    
                  if(mysqli_fetch_assoc($result_nhomquyen12)){?>
                  <li class="" ><a href="quanLySoLuongTonKho.php?staff=<?php echo $staff ?>" ><span>Quản lý số lượng tồn kho</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen10 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 10 ";
                  if($result_nhomquyen10 = mysqli_query($conn, $search_phanquyen10)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen10)){?>
                  <li class="" ><a href="quanLyKhuyenMai.php?staff=<?php echo $staff ?>" ><span>Quản lý khuyến mại</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen13 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 13 ";
                  if($result_nhomquyen13 = mysqli_query($conn, $search_phanquyen13)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen13)){?>
                  <li class="" ><a href="quanLyLoHang.php?staff=<?php echo $staff ?>" ><span>Quản lý lô hàng sản phẩm</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen14 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 14 ";
                  if($result_nhomquyen14 = mysqli_query($conn, $search_phanquyen14)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen14)){?>
                  <li class="" ><a href="phanLoaiSanPham.php?staff=<?php echo $staff ?>" ><span>Phân loại sản phẩm</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen9 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 9 ";
                  if($result_nhomquyen9 = mysqli_query($conn, $search_phanquyen9)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen9)){?>
                  <li class="" ><a href="quanLyDanhMuc.php?staff=<?php echo $staff ?>" ><span>Quản lý danh mục sản phẩm</span></a>
                  <?php }} ?>

                  <?php $search_phanquyen15 = "SELECT * FROM phanquyen WHERE  idnhomquyen = $vitri AND idquyentruycap = 15 ";
                  if($result_nhomquyen15 = mysqli_query($conn, $search_phanquyen15)){
                    
                    if(mysqli_fetch_assoc($result_nhomquyen15)){?>
                      <li class="" ><a href="quanLyNhaCungCap.php?staff=<?php echo $staff ?>" ><span>Quản lý nhà cung cấp</span></a>
                  <?php }}?>
          
          
                  
                 
                  <li><a href="../../html/dangNhap.php"><i class="entypo-logout"></i><span>Đăng xuất</span></a></li>
                 
                </ul>
                
          </div>
          
