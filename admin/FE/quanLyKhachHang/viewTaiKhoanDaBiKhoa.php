<?php include 'header.html'; ?>
<div class="container">
<h1 style="text-align: center;">Danh sách khách hàng</h1>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li ><a href="viewTaiKhoanDangHoatDong.php">Tài khoản đang hoạt động</a></li>
            <li class="active"><a href="viewTaiKhoanDaBiKhoa.php">Tài khoản đã bị khóa</a></li>
            
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
                <th>Đơn hàng đã mua</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../../php/connect.php';


            $view_sql1 = "SELECT * FROM khachhang WHERE matkhau != '' AND hoatdong = 0";

            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['sdt'] ?></td>
                    <td><?php echo $r1['hoten'] ?></td>
                    <td><?php echo $r1['sonha'] ?>, <?php echo $r1['xa'] ?>, <?php echo $r1['huyen'] ?>, <?php echo $r1['tinh'] ?></td>

                   

                    
                        <td><?php
                        $idkhachhang = $r1['id'];
                        $view_sl3 = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Đã nhận' ";

                        $result_sl3 = mysqli_query($conn, $view_sl3);
          
                        // Khởi tạo biến tổng doanh thu
                        $total3 = 0;
          
                        while (mysqli_fetch_assoc($result_sl3)) {
                         
                            $total3 += 1;}
                        echo $total3;
                        ?></td>

                       
                    <td><a href="../../BE/quanLyKhachHang/kichHoatTaiKhoan.php?idkhachhang=<?php echo $idkhachhang ?>" class="btn btn-info">Kích hoạt</a>
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