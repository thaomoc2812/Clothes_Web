<?php include 'header.html'; 
$idkhachhang = $_GET['sid'];
?>
<div class="container">
    <h1 style="text-align: center;">Quản lý khách hàng</h1>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active" ><a href="viewKhachHangOnline.php">Khách hàng mua online</a></li>
            <li ><a href="viewKhachHangOffline.php">Khách hàng chỉ mua tại cửa hàng</a></li>
            
        </ul>
    </div>
</nav>

<?php 
        require_once '../../../php/connect.php';
        
        $view_kh = "SELECT * FROM khachhang WHERE id = $idkhachhang";
        $result_kh = mysqli_query($conn, $view_kh);
        $fetch_kh= mysqli_fetch_assoc($result_kh);

        $search_donhang= "SELECT * FROM donhang WHERE  idkhachhang = $idkhachhang AND tinhtrang = N'Offline'";
        $result_donhang = mysqli_query($conn, $search_donhang);
        $fetch_donhang= mysqli_fetch_assoc($result_donhang);

        ?>

        <div class="recipient-info" style="background-color: #f0f0f0; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 30px;">Khách hàng:</h2>
            <p style="font-size: 15px;">Họ tên: <strong><?php echo $fetch_kh['hoten']?></strong></p>
            <p style="font-size: 15px;">SĐT: <strong><?php echo $fetch_kh['sdt']?></strong></p>
            <p style="font-size: 15px;">Địa chỉ: <strong><?php echo $fetch_kh['sonha']?>, 
            <?php echo $fetch_kh['xa']?>, 
            <?php echo $fetch_kh['huyen']?>,
            <?php echo $fetch_kh['tinh']?></strong></p>
        </div>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li ><a href="viewChiTietKhachHangChoXacNhan.php?sid=<?php echo $idkhachhang ?>">Chờ xác nhận</a></li>
                <li ><a href="viewChiTietKhachHangDangVanChuyen.php?sid=<?php echo $idkhachhang ?>">Đang vận chuyển</a></li>
                <li><a href="viewChiTietKhachHangDaNhan.php?sid=<?php echo $idkhachhang ?>">Đã nhận</a></li>
                <li class="active"><a href="viewChiTietKhachHangDaMuaOffline.php?sid=<?php echo $idkhachhang ?>">Đã mua tại cửa hàng</a></li>
            </ul>
        </div>
    </nav>
        <?php
        $search_khach = "SELECT * FROM khachhang WHERE  id = $idkhachhang ";
        $result_khach = mysqli_query($conn, $search_khach);
        $fetch_khach= mysqli_fetch_assoc($result_khach);
        $idkhachhang = $fetch_khach['id'];

        $count_sql = "SELECT COUNT(*) AS total FROM donhang WHERE  idkhachhang = $idkhachhang  AND tinhtrang= N'Offline'";
        $result = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        if ($total == 0)
        { ?>
        
            <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
           
            <p class="lead">Chưa có đơn hàng nào.</p>

        </div>  
        
        <?php       
        }
        else
        {
            
        ?>
      
            <div class="row">
                <div class="col col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản Phẩm</th>
                                <th>Người nhận</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Phí ship</th>
                                <th>Tổng Tiền</th>
                                <th>Hình thức chuyển khoản</th>
                                <th>Thời gian đặt hàng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                        <?php
                            $search_donhang= "SELECT * FROM donhang WHERE  idkhachhang = $idkhachhang AND tinhtrang= N'Offline' ";
                            $result_donhang = mysqli_query($conn, $search_donhang);
                            $count = 0;
                            while($fetch_donhang= mysqli_fetch_assoc($result_donhang))
                            {
                                $count ++;
                                $iddonhang = $fetch_donhang['id'];
                            ?>
                            <tr>
                                
                                <td><?php echo $count ?></td>
                                <?php
                                $search_ttdh = "SELECT * FROM thongtindonhang WHERE  iddonhang = $iddonhang ";
                                $result_ttdh = mysqli_query($conn, $search_ttdh);
                                $fetch_ttdh= mysqli_fetch_assoc($result_ttdh);
                                $idsanpham= $fetch_ttdh['idsanpham'];
                                $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                                $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                                $fetch_hinhanh= mysqli_fetch_assoc($result_hinhanh);
                                ?>
                                <td>
                                    <img src="../../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh']?>" class="hinhdaidien" width="100">
                                </td>
                                <td><?php echo $fetch_donhang['hotennguoinhan']?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['phiship'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo $fetch_donhang['hinhthucthanhtoan']?></td>
                                <td class="text-right"><?php echo $fetch_donhang['thoigian']?></td>
                                <td>
                                    <a href="../quanLyDonHang/viewChiTietDonHang.php?sid=<?php echo $iddonhang ?>">Chi tiết</a></br>
                                
                                </td>
                            </tr>
                            <?php 
                            
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php 
        }?>

      
    </main>
<style>
    .list-group-item {
    display: flex; justify-content: space-between; width: 100%;
}

.list-group-item a {
    color: black;
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}
</style>
    <!-- end footer -->
</body>

</html>
