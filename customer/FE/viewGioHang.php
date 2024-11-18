<?php include 'header.php';
if(isset($_GET['user']))
{
    $user = $_GET['user'];

}
?>
</ul>
</div>


<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <h1 style="color: white;text-align: center;margin-left: 700px;">Giỏ hàng</h1>
        
    </nav>
    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            require_once '../../php/connect.php';
            $search_khach = "SELECT * FROM khachhang WHERE  sdt = $user ";
            $result_khach = mysqli_query($conn, $search_khach);
            $fetch_khach= mysqli_fetch_assoc($result_khach);
            $idkhachhang = $fetch_khach['id'];
                            
            $count_sql = "SELECT COUNT(*) AS total FROM giohang WHERE  idkhachhang = $idkhachhang";
            $result = mysqli_query($conn, $count_sql);
            $row = mysqli_fetch_assoc($result);
            $totalSanPham = $row['total'];
            if ($totalSanPham == 0)
            { ?>
            
                <div class="py-5 text-center">
                <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
               
                <p class="lead">Chưa có sản phẩm.</p>

            </div>  
            <br><br><br><br><br><br><br><br><br><br><br><br>
            <?php       
            }
            else
            {?>
            
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh đại diện</th>
                                <th>Tên sản phẩm</th>
                                <th>Kích thước</th>
                                <th>Màu sắc</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                            <?php
                            $search_giohang = "SELECT * FROM giohang WHERE  idkhachhang = $idkhachhang ";
                            $result_giohang = mysqli_query($conn, $search_giohang);
                            $count_cart = 0;
                            while($fetch_giohang= mysqli_fetch_assoc($result_giohang))
                            {
                                $count_cart ++;
                            ?>
                            <tr>
                                
                                <td><?php echo $count_cart ?></td>
                                <?php 
                                $idgiohang  =  $fetch_giohang['id'];
                                $idsanpham = $fetch_giohang['idsanpham'];
                                $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                                $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                                $fetch_hinhanh= mysqli_fetch_assoc($result_hinhanh);

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
                                
                                if($fetch_km = mysqli_fetch_assoc($result_km))
                                {
                                    $check_km = 1;
                                    $giathat = $fetch_sl['giabanra'] *(100-$fetch_ttkm['giam'])/100;
                                $gia = $giathat;
                                }
                                
                                
                                }
                                }
                                }
                                if($check_km == 0){$gia = $fetch_sl['giabanra'];}
                                $tongTien = $gia * $soluong;


                                ?>
                                <td>
                                    <img src="../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh']?>" class="hinhdaidien" width="100">
                                </td>
                                <td><?php echo $fetch_sp['tensanpham']?></td>
                                <td class="text-right"><?php echo $fetch_giohang['kichthuoc']?></td>
                                <td class="text-right"><?php echo $fetch_giohang['mausac']?></td>
                                <td class="text-right"><?php echo $fetch_giohang['soluong']?></td>
                                <td class="text-right"><?php echo number_format( $gia, 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $tongTien, 0, '.', '.')?></td>
                                <td>
                                    <a href="viewMotSanPham.php?user=<?php echo $user?>&sid=<?php echo $idsanpham ?>">Chi tiết</a></br>
                                    <a  onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?')" href="../BE/deleteSanPhamTuGioHang.php?user=<?php echo $sdt ?>&sid=<?php echo $idgiohang ?>"id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            
                            }
                            ?>
                            
                        </tbody>
                    </table>

                    <a href="../home.php?user=<?php echo $user?>" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                            aria-hidden="true"></i>&nbsp;Quay
                        về trang chủ</a>
                    <a href="thanhToan.php?user=<?php echo $sdt ?>&count=<?php echo $count_cart ?>" class="btn btn-primary btn-md"><i
                            class="fa fa-shopping-cart" aria-hidden="true" style="text-align: center;"></i>&nbsp;Thanh toán</a>
                    <!-- <a href="viewTatCaSanPham.php?user=<?php echo $sdt?>" class="btn btn-warning btn-md"><i class="fa fa-arrow-left"
                    aria-hidden="true" style="text-align: right;"></i>&nbsp;Tiếp tục mua sắm</a> -->
                </div>
            </div>
            <?php } ?>
        </div>
        <!-- End block content -->
    </main>

    <!-- end footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>

</body>

</html>

<?php include 'footer.html';?>