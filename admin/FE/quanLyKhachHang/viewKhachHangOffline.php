<?php include 'header.html'; ?>
<div class="container">
<h1 style="text-align: center;">Danh sách khách hàng</h1>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li ><a href="viewKhachHangOnline.php">Khách hàng mua online</a></li>
            <li class="active" ><a href="viewKhachHangOffline.php">Khách hàng chỉ mua tại cửa hàng</a></li>
            
        </ul>
    </div>
</nav>


<div class="container">


    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Số điện thoại</th>
                <th>Họ tên</th>
                <th>Số đơn hàng đã mua</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../../php/connect.php';


            $view_sql1 = "SELECT * FROM khachhang WHERE matkhau = ''";

            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['sdt'] ?></td>
                    <td><?php echo $r1['hoten'] ?></td>

                    <td><?php
                    $idkhachhang = $r1['id'];
                        $view_sl = "SELECT * FROM donhang WHERE idkhachhang = $idkhachhang AND tinhtrang = N'Offline' ";

                        $result_sl = mysqli_query($conn, $view_sl);
          
                        // Khởi tạo biến tổng doanh thu
                        $total = 0;
          
                        while ($r_sl = mysqli_fetch_assoc($result_sl)) {
                         
                            $total += 1;}
                        echo $total;
                        ?></td>
                    <td><a href="viewChiTietKhachHangOffline.php?sid=<?php echo $r1['id'] ?>">Chi tiết</a></br>
                       

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