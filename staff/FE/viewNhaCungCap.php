<?php $staff = $_GET['staff'];
include 'header.php'; ?>

      <div class="container">
      <h1 style="text-align: center;">Quản lý nhà cung cấp</h1>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="addNhaCungCap.php?staff=<?php echo $staff ?>">Thêm nhà cung cấp</a></li>
                    <li class="active"><a href="viewNhaCungCap.php?staff=<?php echo $staff ?>">Xem danh sách nhà cung cấp</a></li>


                </ul>
            </div>
        </nav>
        <h2>Đang cung cấp</h2>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                 
                    <th>Mã NCC</th>
                    <th>Tên NCC</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../../php/connect.php';


                    $view_sql="SELECT * FROM nhacungcap WHERE trangthai = 1";

                    $result = mysqli_query($conn, $view_sql);
                    

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            
                            <td><?php echo $r['manhacungcap'] ?></td>
                            <td><?php echo $r['tennhacungcap'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><a href="viewChiTietNhaCungCap.php?staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>" >Chi tiết</a>
                                <a href="editNhaCungCap.php?staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>" class="btn btn-info">Sửa</a>
                             <a onclick="return confirm('Bạn có muốn dừng làm việc với nhà cung cấp này không?')" href="../BE/deleteNhaCungCap.php?staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>" class="btn btn-danger">Dừng</a></td>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>


    </div>


    <div class="container">
        <h2>Dừng cung cấp</h2>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                 
                    <th>Mã NCC</th>
                    <th>Tên NCC</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../../php/connect.php';


                    $view_sql="SELECT * FROM nhacungcap WHERE trangthai = 0";

                    $result = mysqli_query($conn, $view_sql);
                    

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            
                            <td><?php echo $r['manhacungcap'] ?></td>
                            <td><?php echo $r['tennhacungcap'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><a href="viewChiTietNhaCungCap.php?staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>" >Chi tiết</a>
                                <a href="../BE/returnNhaCungCap.php??staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>" class="btn btn-info">Trở lại</a>
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


