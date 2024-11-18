


    <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width= device-width,initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../js/script_admin.js"></script>
  <link rel="stylesheet" href="../css/style2.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/dashMain.css">
  <link rel="stylesheet" href="../css/entypo.css">
</head>

<body class="page-body  page-fade" onload="collapseSidebar()">

  <div class="page-container sidebar-collapsed" id="navbarcollapse">

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
      <ul id="main-menu" class="">

        <li id="dash"><a href="home.php"><i class="entypo-gauge"></i><span>Home</span></a></li>

        <!-- <li id="regis"><a href="new_entry.php"><i class="entypo-user-add"></i><span>New Registration</span></a> -->

        <!-- <li id="paymnt"><a href="payments.php"><i class="entypo-star"></i><span>Payments</span></a></li> -->

        <li class="" id="staffhassubopen"><a href="#" onclick="memberExpand(1)"><i class="entypo-users"></i><span>Quản lý nhân viên</span></a>
          <ul id="staffExpand">
            <li>
              <a href="./FE/quanLyNhanVien/createTaiKhoanNhanVien.php"><span>Tạo tài khoản nhân viên</span></a>
            </li>
            <li>
              <a href="./FE/quanLyNhanVien/addNhanVien.php"><span>Thêm nhân viên</span></a>
            </li>

            <li>
              <a href="./FE/quanLyNhanVien/viewNhanVien.php"><span>Xem danh sách nhân viên</span></a>
            </li>
            <li >
              <a href="./FE/quanLyNhanVien/searchNhanVienFirst.php"><span>Tìm kiếm nhân viên</span></a>
            </li>
            <li >
              <a href="./FE/quanLyNhanVien/quanLyPhanQuyen.php"><span>Quản lý phân quyền</span></a>
            </li>
            <li >
              <a href="./FE/quanLyNhanVien/quanLyLichLamViec.php"><span>Quản lý lịch làm việc</span></a>
            </li>
            
            <li >
              <a href="./FE/quanLyNhanVien/viewLuong.php"><span>Quản lý lương</span></a>
            </li>
            <li >
              <a href="./FE/quanLyNhanVien/viewDanhGia.php"><span>Đánh giá</span></a>
            </li>
            
          </ul>
        </li>

        <!-- <li id="health_status"><a href="new_health_status.php"><i class="entypo-user-add"></i><span>Health Status</span></a> -->

        <li class="" id="roomhassubopen"><a href="#" onclick="memberExpand(2)"><i class="entypo-quote"></i><span>Quản lý kho hàng</span></a>

          <ul id="roomExpand">
          <li><a href="./FE/quanLyKhoHang/phanLoaiSanPham.php"><span>Phân loại sản phẩm</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLyDanhMuc.php"><span>Quản lý danh mục</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLyNhaCungCap.php"><span>Quản lý nhà cung cấp</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLyLoHang.php"><span>Quản lý lô hàng</span></a></li>
            <li><a href="./FE/quanLyKhoHang/addSanPham.php"><span>Thêm sản phẩm</span></a></li>
            <li><a href="./FE/quanLyKhoHang/viewSanPham.php"><span>Xem danh sách sản phẩm</span></a></li>
            <li><a href="./FE/quanLyKhoHang/searchSanPhamFirst.php"><span>Tìm kiếm sản phẩm</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLySoLuongTonKho.php"><span>Quản lý số lượng tồn kho</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLyKhuyenMai.php"><span>Quản lý khuyến mại</span></a></li>
            <li><a href="./FE/quanLyKhoHang/quanLyDanhGia.php"><span>Quản lý đánh giá</span></a></li>
          
          </ul>

        <li class="" id="devicehassubopen"><a href="#" onclick="memberExpand(3)"><i class="entypo-box"></i><span>Quản lý khách hàng</span></a>

          <ul id="deviceExpand">
            <li>
              <a href="FE/quanLyKhachHang/viewKhachHangOnline.php"><span>Danh sách khách hàng</span></a>
            </li>
         
            <li>
              <a href="FE/quanLyKhachHang/viewTaiKhoanDangHoatDong.php"><span>Tài khoản khách hàng</span></a>
            </li>

          </ul>

        <li class="" id="packagehassubopen"><a href="#" onclick="memberExpand(4)"><i class="entypo-alert"></i><span>Quản lý đơn hàng</span></a>

          <ul id="packageExpand">
          <li>
              <a href="FE/quanLyDonHang/taoHoaDon.php"><span>Tạo hóa đơn</span></a>
            </li>
            <li>
                <a href="FE/quanLyDonHang/offline.php"><span>Đơn hàng tại cửa hàng</span></a>
            </li>
            <li>
              <a href="FE/quanLyDonHang/choXacNhan.php"><span>Chờ xác nhận</span></a>
            </li>

            <li>
              <a href="FE/quanLyDonHang/dangChuanBi.php"><span>Đang chuẩn bị</span></a>
            </li>
            <li>
              <a href="FE/quanLyDonHang/daSoanDon.php"><span>Đã soạn đơn</span></a>
            </li>

            <li>
              <a href="FE/quanLyDonHang/dangVanChuyen.php"><span>Đang vận chuyển</span></a>
            </li>
            <li>
              <a href="FE/quanLyDonHang/giaoThanhCong.php"><span>Giao thành công</span></a>
            </li>
            <li>
            <a href="FE/quanLyDonHang/daHuy.php"><span>Đã hủy</span></a>
            </li>

          </ul>

        </li>

        <li class="" id="memberhassubopen"><a href="#" onclick="memberExpand(5)"><i class="entypo-star"></i><span>Quản lý doanh thu</span></a>

          <ul id="memExpand">
            <li >
              <a href="FE/quanLyDoanhThu/theoThoiGian.php"><span>Theo thời gian</span></a>
            </li>

            <li>
                        <a href="FE/quanLyDoanhThu/theoSanPham.php"><span>Theo sản phẩm</span></a>
                      </li>
          
                      <li>
                        <a href="FE/quanLyDoanhThu/theoKhachHang.php"><span>Theo khách hàng</span></a>
                      </li>
          </ul>

        </li>

       
        <li><a href="../html/dangNhap.php"><i class="entypo-logout"></i><span>Đăng xuất</span></a></li>

      </ul>
    </div>

    <div class="main-content">

      <div class="row">

        <!-- Profile Info and Notifications -->
        <div class="col-md-6 col-sm-8 clearfix">

        </div>


        <!-- Raw Links -->
        <div class="col-md-6 col-sm-4 clearfix hidden-xs">

          <ul class="list-inline links-list pull-right">

            <li>
              <a href="../html/dangNhap.php">
                Log Out <i class="entypo-logout right"></i>
              </a>
            </li>
          </ul>

        </div>

      </div>

      <h2>Warehouse</h2>

      <hr>

      <div class="col-sm-3"><a href="">
          <div class="tile-stats tile-red">

            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <img class="image_change" src="../../images/income.jpg" alt="">
              <h2 hr>Doanh thu</h2>
              <?php
              // ket noi csdl
              require_once '../php/connect.php';

              $count_giatridonhang = "SELECT SUM(giatridonhang) AS Tonggiatridonhang
              FROM donhang WHERE (tinhtrang = N'Đã nhận' OR tinhtrang = N'Offline')" ;
              $result_giatridonhang = mysqli_query($conn, $count_giatridonhang);
              $row_giatridonhang = mysqli_fetch_assoc($result_giatridonhang );
              $Tonggiatridonhang = $row_giatridonhang['Tonggiatridonhang'];
              echo number_format( $Tonggiatridonhang, 0, '.', '.');
              ?>

            </div>
          </div>
        </a>
      </div>


      <div class="col-sm-3"><a href="">
          <div class="tile-stats tile-green">

            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <img class="image_change" src="../../images/staff.jpg" alt="">
              <h2>Số lượng nhân viên</h2>
              <?php
              // ket noi csdl
              require_once '../php/connect.php';

              $view_sql = "SELECT * FROM nhanvien WHERE trangthai = 1";

              $result = mysqli_query($conn, $view_sql);

              // Khởi tạo biến đếm số thành viên
              $totalThanhVien = 0;

              while ($r = mysqli_fetch_assoc($result)) {
                $totalThanhVien++; // Tăng giá trị biến đếm lên 1

              ?>

              <?php
              }

              // In ra tổng số thành viên
              echo $totalThanhVien;
              ?>

            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-3"><a href="">
          <div class="tile-stats tile-aqua">

            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <img class="image_change" src="../../images/sanpham.png" alt="">
              <h2>Số lượng sản phẩm</h2>
              <?php
              // Ket noi csdl
              require_once '../php/connect.php';

              // Cau truy van dem so luong trang thiet bi
              $count_sql = "SELECT COUNT(*) AS total FROM sanpham";
              $result = mysqli_query($conn, $count_sql);
              $row = mysqli_fetch_assoc($result);
              $totalSanPham = $row['total'];

              // Hiển thị tổng số trang thiết bị
              echo $totalSanPham;
              ?>

            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-3"><a href="">
          <div class="tile-stats tile-blue">

            <div class="num" data-postfix="" data-duration="1500" data-delay="0">
              <img class="image_change" src="../../images/member.jpg" alt="">
              <h2>Số khách hàng</h2>
              <?php
              // Ket noi csdl
              require_once '../php/connect.php';

              // Cau truy van dem so luong hoi vien
              $count_sql = "SELECT COUNT(*) AS total FROM khachhang WHERE hoatdong = 1";
              $result = mysqli_query($conn, $count_sql);
              $row = mysqli_fetch_assoc($result);
              $totalHoiVien = $row['total'];

              // Hiển thị tổng số hoi vien
              echo $totalHoiVien;
              ?>

            </div>
          </div>
        </a>
      </div>
    </div>


</body>

</html>