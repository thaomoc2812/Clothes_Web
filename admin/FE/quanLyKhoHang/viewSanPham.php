<?php include 'header.html';
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
<?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Không thể xóa sản phẩm này vì đã nhập hàng!</p> <?php } ?>

    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh chính</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../../php/connect.php';


            $view_sql1 = "SELECT * FROM sanpham";

            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['masanpham'] ?></td>
                    <td><?php echo $r1['tensanpham'] ?></td>
                    <td><?php
                        $idsanpham = $r1['id'];
                        $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
                        $result2 = mysqli_query($conn, $search_sql2);
                        if ($r2 = mysqli_fetch_assoc($result2))
                        ?><image src="../../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
                    </td>

                    <td><?php
                        $view_sl = "SELECT * FROM soluong WHERE idsanpham = $idsanpham ";

                        $result_sl = mysqli_query($conn, $view_sl);
          
                        // Khởi tạo biến tổng doanh thu
                        $total = 0;
          
                        while ($r_sl = mysqli_fetch_assoc($result_sl)) {
                         
                            $total += $r_sl['soluong'];}
                        echo $total;
                        ?></td>
                    <td><a href="viewChiTietSanPham.php?sid=<?php echo $r1['id'] ?>">Chi tiết</a></br>
                        <a href="editSanPham.php?sid=<?php echo $r1['id'] ?>" class="btn btn-info">Sửa</a>

                        <a onclick="return confirm('Sản phẩm này chỉ có thể xóa khi chưa nhập kho?')" href="../../BE/quanLyKhoHang/deleteSanPham.php?sid=<?php echo $r1['id'] ?>" class="btn btn-danger">Xóa</a>

                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


</div>



<style>
    .thead-style {
        background-color: black;
        color: white;
    }
</style>
</body>

</html>