<?php

$idlohang = $_GET['sid'];

require_once '../../../php/connect.php';



$view_sql1 = "SELECT * FROM lohang WHERE id = $idlohang";

$result1 = mysqli_query($conn, $view_sql1);
$r1 = mysqli_fetch_assoc($result1);

$view_sql2 = "SELECT * FROM thongtinlohang WHERE idlohang = $idlohang";

$result2 = mysqli_query($conn, $view_sql2);




?>
<?php include 'header.html'; ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addLoHang.php">Thêm lô hàng</a></li>
                <li class="active"><a href="viewLoHang.php">Xem danh sách lô hàng</a></li>
                <li><a href="nhapKho.php">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã lô hàng</th>
                <th>Ngày nhập hàng</th>
                <th>Tên nhà cung cấp</th>
                <th>Nhân viên</th>
            </tr>
        </thead>
        <tbody>

            <tr>

                <td><?php echo $r1['malohang'] ?></td>
                <td><?php echo $r1['ngaynhaphang'] ?></td>
                <td><?php
                    $idnhacungcap = $r1['idnhacungcap'];
                    $search_sql1 = "SELECT * FROM nhacungcap WHERE id = $idnhacungcap";
                    $result11 = mysqli_query($conn, $search_sql1);
                    if ($r11 = mysqli_fetch_assoc($result11))
                        echo $r11['tennhacungcap'] ?></td>

                <td><?php
                    $idnhanvien = $r1['idnhanvien'];
                    if ($idnhanvien == 0) echo "admin";
                    else {
                        $search_sql22 = "SELECT * FROM nhanvien WHERE id = $idnhanvien";
                        $result22 = mysqli_query($conn, $search_sql22);
                        if ($r22 = mysqli_fetch_assoc($result22))
                            echo $r22['hoten'];
                    }
                    ?></td>

            </tr>


        </tbody>
    </table>

    <table class="table table-striped">
        <thead class="thead-style">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Giá nhập vào</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalThanhToan = 0;
            while ($r2 = mysqli_fetch_assoc($result2)) {

            ?>
                <tr>

                    <td><?php $masanpham =$r2['masanpham'];  echo $r2['masanpham'] ?></td>
                    <td><?php echo $r2['mausac'] ?></td>
                    <td><?php echo $r2['kichthuoc'] ?></td>
                    <td><?php echo $r2['soluong'] ?></td>
                    <td><?php
                     $gia = number_format($r2['gianhapvao'] ,0,'.','.');
                     echo $gia  ?></td>
                    <?php
                    $totalThanhToan +=  $r2['soluong']  * $r2['gianhapvao'];
                    ?>
                

                </tr>

            <?php } ?>

            <tr style = "background-color: black;color: white;">

                    <td>Tổng</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php
                    echo number_format( $totalThanhToan ,0,'.','.');
                    ?></td>
                    
                

                </tr>
        </tbody>
    </table>

</div>



<style>
    .thead-style {
        background-color: gray;
        color: white;
    }
</style>

</body>

</html>