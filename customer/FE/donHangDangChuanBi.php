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
        <h1 style="color: white;text-align: center;margin-left: 600px;">Quản lý đơn hàng</h1>
        
    </nav>
    <main role="main">
        <div class="list-group-item">
            <a href="donHangChoXacNhan.php?user=<?php echo $sdt ?>" class="list-group-item"  >Chờ xác nhận</a>
            <a href="donHangDangChuanBi.php?user=<?php echo $sdt ?>" class="list-group-item" style="background-color:darkgray">Đang chuẩn bị</a>
            <a href="donHangDangVanChuyen.php?user=<?php echo $sdt ?>" class="list-group-item">Đang vận chuyển</a>
            <a href="donHangDaMua.php?user=<?php echo $sdt ?>" class="list-group-item" >Đã mua</a>
            <a href="donHangDaHuy.php?user=<?php echo $sdt ?>" class="list-group-item" >Đã hủy</a>
          
        </div>

        <?php 
        require_once '../../php/connect.php';
        $search_khach = "SELECT * FROM khachhang WHERE  sdt = '$user' ";
        $result_khach = mysqli_query($conn, $search_khach);
        $fetch_khach= mysqli_fetch_assoc($result_khach);
        $idkhachhang = $fetch_khach['id'];

        $count_sql = "SELECT COUNT(*) AS total FROM donhang WHERE  idkhachhang = $idkhachhang  AND (tinhtrang= N'Đang chuẩn bị' OR tinhtrang= N'Đã soạn đơn')";
        $result = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        if ($total == 0)
        { ?>
        
            <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
           
            <p class="lead">Chưa có đơn hàng.</p>

        </div>  
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php       
        }
        else
        {
            
        ?>
        <br><br><br><br>
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
                            $search_donhang= "SELECT * FROM donhang WHERE  idkhachhang = $idkhachhang AND (tinhtrang= N'Đang chuẩn bị' OR tinhtrang= N'Đã soạn đơn') ";
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
                                    <img src="../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh']?>" class="hinhdaidien" width="100">
                                </td>
                                <td><?php echo $fetch_donhang['hotennguoinhan']?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['phiship'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo $fetch_donhang['hinhthucthanhtoan']?></td>
                                <td class="text-right"><?php echo $fetch_donhang['thoigian']?></td>
                                <td>
                                    <a href="viewChiTietDonHang.php?user=<?php echo $user?>&sid=<?php echo $iddonhang ?>">Chi tiết</a></br>
                                    
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

        <br>
        <br>
        <br>
        <br>
        <br>
        <br><br>
        <br><br><br><br><br><br><br><br><br>
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
<?php include 'footer.html';?>