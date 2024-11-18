<?php 
$staff = $_GET['staff'];
include 'header.php'; ?>
<div class="container">
    <h1 style="text-align: center;">Quản lý đơn hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
            <li ><a href="taoHoaDon.php?staff=<?php echo $staff?>">Tạo đơn</a></li>
            <li class="active"><a href="choXacNhan.php?staff=<?php echo $staff?>">Chờ xác nhận</a></li>
                <li ><a href="dangChuanBi.php?staff=<?php echo $staff?>">Đang chuẩn bị</a></li>
                <li><a href="daSoanDon.php?staff=<?php echo $staff?>">Đã soạn đơn</a></li>
                <li><a href="dangVanChuyen.php?staff=<?php echo $staff?>">Đang vận chuyển</a></li>
                <li><a href="giaoThanhCong.php?staff=<?php echo $staff?>">Thành công</a></li>
                <li><a href="daHuy.php?staff=<?php echo $staff?>">Đã hủy</a></li>  
            
                
            </ul>
        </div>
    </nav>
    <?php 
        require_once '../../php/connect.php';
       
        $count_sql = "SELECT COUNT(*) AS total FROM donhang WHERE tinhtrang= N'Chờ xác nhận'";
        $result = mysqli_query($conn, $count_sql);
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];
        if ($total == 0)
        { ?>
        
            <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
           
            <p class="lead">Chưa có đơn hàng nào chờ xác nhận.</p>

        </div>  
        <br><br><br><br><br><br><br><br><br><br><br><br>
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
                                <th>Số điện thoại khách hàng</th>
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
                            $search_donhang= "SELECT * FROM donhang WHERE  tinhtrang= N'Chờ xác nhận' ";
                            $result_donhang = mysqli_query($conn, $search_donhang);
                            $count = 0;
                            while($fetch_donhang= mysqli_fetch_assoc($result_donhang))
                            {
                                $count ++;
                                $iddonhang = $fetch_donhang['id'];
                                $idkhachhang = $fetch_donhang['idkhachhang'];
                                $search_khach = "SELECT * FROM khachhang WHERE  id = $idkhachhang ";
                                $result_khach = mysqli_query($conn, $search_khach);
                                $fetch_khach= mysqli_fetch_assoc($result_khach);
                                $sdt = $fetch_khach['sdt'];
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
                                <td><?php echo $sdt?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['phiship'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>
                                <td class="text-right"><?php echo $fetch_donhang['hinhthucthanhtoan']?></td>
                                <td class="text-right"><?php echo $fetch_donhang['thoigian']?></td>
                                <td>
                                    <a href="viewChiTietDonHang.php?staff=<?php echo $staff?>&sid=<?php echo $iddonhang ?>">Chi tiết</a></br>
                                    <a href="../BE/dangChuanBi.php?staff=<?php echo $staff?>&sid=<?php echo $iddonhang?>" class="btn btn-info">Xác nhận</a>
                                    <a onclick="return confirm('Xác nhận hủy đơn hàng?')" href="../BE/huyDonHang.php?staff=<?php echo $staff?>&sid=<?php echo $iddonhang ?>" id="delete_1" data-sp-ma="2" class="btn btn-danger btn-delete-sanpham">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hủy
                                    </a>
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


</div>



</body>
</html>
   