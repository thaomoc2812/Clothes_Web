<?php include 'header.html'; 
$iddonhang = $_GET['sid'];
$staff = 0;
if (isset($_GET['staff']))
{
$staff = $_GET['staff'];
}
$view = 0;
if (isset($_GET['view']))
{
$view= $_GET['view'];
}
?>
<div class="container">
    <h1 style="text-align: center;">Quản lý đơn hàng</h1>

    


    <?php 
        require_once '../../../php/connect.php';
        

        $search_donhang= "SELECT * FROM donhang WHERE  id = $iddonhang ";
        $result_donhang = mysqli_query($conn, $search_donhang);
        $fetch_donhang= mysqli_fetch_assoc($result_donhang);

        $search_ttdonhang= "SELECT * FROM thongtindonhang WHERE  iddonhang = $iddonhang ";
        $result_ttdonhang = mysqli_query($conn, $search_ttdonhang);
        ?>

        <div class="recipient-info">
            <h2>Người nhận:</h2>
            <p>Họ tên: <strong><?php echo $fetch_donhang['hotennguoinhan']?></strong></p>
            <p>SĐT: <strong><?php echo $fetch_donhang['sdtnguoinhan']?></strong></p>
            <p>Địa chỉ: <strong><?php echo $fetch_donhang['sonha']?>, 
            <?php echo $fetch_donhang['xa']?>, 
            <?php echo $fetch_donhang['huyen']?>,
            <?php echo $fetch_donhang['tinh']?></strong></p>
        </div>

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
                                <?php if($view == 1){?><th>Nhận xét</th><?php }?>
                            </tr>
                        </thead>
                        <tbody id="datarow">
                        <?php
                            
                            $count_sp = 0;
                            while($fetch_ttdonhang= mysqli_fetch_assoc($result_ttdonhang))
                            {
                                $count_sp ++;
                                $idsanpham = $fetch_ttdonhang['idsanpham'];

                                $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                                $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                                $fetch_hinhanh= mysqli_fetch_assoc($result_hinhanh);

                                $search_sp = "SELECT * FROM sanpham WHERE  id = $idsanpham ";
                                $result_sp = mysqli_query($conn, $search_sp);
                                $fetch_sp= mysqli_fetch_assoc($result_sp);
                            ?>
                            <tr>

                                <td><?php echo $count_sp ?></td>
                                <td>
                                <a href="../quanLyKhoHang/viewChiTietSanPham.php?sid=<?php echo $idsanpham ?>"> <img  src="../../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh']?>" class="hinhdaidien" width="100"></a>
                                </td>
                                <td><?php echo $fetch_sp['tensanpham']?></td>
                                <td><?php echo $fetch_ttdonhang['kichthuoc']?></td>
                                <td><?php echo $fetch_ttdonhang['mausac']?></td>
                                <td><?php echo $fetch_ttdonhang['soluong']?></td>
                                <td><?php echo number_format( $fetch_ttdonhang['gia'], 0, '.', '.')?></td>
                                <?php $thanhTien = $fetch_ttdonhang['soluong'] * $fetch_ttdonhang['gia'] ?>
                                <td><?php echo number_format( $thanhTien, 0, '.', '.')?></td>
                                <?php if($view == 1){?><td><?php echo $fetch_ttdonhang['nhanxet'] ?></td><?php }?>



                            </tr>
                            
                            <?php 
                            }?>
                            <tr>
                                <td>Tổng giá trị</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo number_format( $fetch_donhang['giatridonhang'], 0, '.', '.')?></td>

                            </tr>
                            <tr>
                                <td>Phí ship</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo number_format( $fetch_donhang['phiship'], 0, '.', '.')?></td>
                                
                            </tr>
                            <tr>
                                <td>Thanh toán</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?php echo number_format( $fetch_donhang['giatridonhang'] + $fetch_donhang['phiship'], 0, '.', '.')?></td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>

</body>
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
.recipient-info {
    background-color: #f8f9fa; /* Màu nền */
    border: 1px solid #ced4da; /* Đường viền */
    padding: 20px; /* Khoảng cách giữa nội dung và đường viền */
    border-radius: 5px; /* Bo góc */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Hiệu ứng bóng đổ */
}

.recipient-info h2 {
    color: #007bff; /* Màu văn bản */
    font-size: 24px; /* Kích thước chữ */
    margin-bottom: 10px; /* Khoảng cách giữa tiêu đề và nội dung */
}

.recipient-info p {
    margin-bottom: 5px; /* Khoảng cách giữa các dòng */
}

</style>

</div>



</body>
</html>