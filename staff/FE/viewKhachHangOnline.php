<?php $staff = $_GET['staff'];
include 'header.php'; ?>
<div class="container">
<h1 style="text-align: center;">Danh sách khách hàng</h1>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="viewKhachHangOnline.php?staff=<?php echo $staff ?>">Khách hàng mua online</a></li>
            <li ><a href="viewKhachHangOffline.php?staff=<?php echo $staff ?>">Khách hàng chỉ mua tại cửa hàng</a></li>
            
        </ul>
    </div>
</nav>


<div class="container">


    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Số điện thoại</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Đơn hàng đang chờ xác nhận</th>
                <th>Đơn hàng đang vận chuyển</th>
                <th>Đơn hàng đã nhận</th>
                <th>Đơn hàng mua tại cửa hàng</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';


            $view_sql1 = "SELECT * FROM khachhang WHERE matkhau != ''";

            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['sdt'] ?></td>
                    <td><?php echo $r1['hoten'] ?></td>
                    <td><?php echo $r1['sonha'] ?>, <?php echo $r1['xa'] ?>, <?php echo $r1['huyen'] ?>, <?php echo $r1['tinh'] ?></td>

                    <td><?php
                    $idkhachhang = $r1['id'];
                        $view_sl1 = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Chờ xác nhận' ";

                        $result_sl1 = mysqli_query($conn, $view_sl1);
          
                        // Khởi tạo biến tổng doanh thu
                        $total1 = 0;
          
                        while ( mysqli_fetch_assoc($result_sl1)) {
                         
                            $total1 += 1;}
                        echo $total1;
                        ?></td>

                    <td><?php
                        $view_sl2 = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Đang vận chuyển' ";

                        $result_sl2 = mysqli_query($conn, $view_sl2);
          
                        // Khởi tạo biến tổng doanh thu
                        $total2 = 0;
          
                        while (mysqli_fetch_assoc($result_sl2)) {
                         
                            $total2 += 1;}
                        echo $total2;
                        ?></td>
                        <td><?php
                        $view_sl3 = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Đã nhận' ";

                        $result_sl3 = mysqli_query($conn, $view_sl3);
          
                        // Khởi tạo biến tổng doanh thu
                        $total3 = 0;
          
                        while (mysqli_fetch_assoc($result_sl3)) {
                         
                            $total3 += 1;}
                        echo $total3;
                        ?></td>

                        <td><?php
                        $view_sl4 = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Offline' ";

                        $result_sl4 = mysqli_query($conn, $view_sl4);
          
                        // Khởi tạo biến tổng doanh thu
                        $total4 = 0;
          
                        while (mysqli_fetch_assoc($result_sl4)) {
                         
                            $total4 += 1;}
                        echo $total4;
                        ?></td>
                    <td><a href="viewChiTietKhachHangChoXacNhan.php?staff=<?php echo $staff?>&sid=<?php echo $r1['id'] ?>">Chi tiết</a></br>
                        

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