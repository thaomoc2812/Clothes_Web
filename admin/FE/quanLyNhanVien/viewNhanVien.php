<?php include 'header.html'; ?>

      <div class="container">
        <h1 style="text-align: center;">Danh sách nhân viên đang làm</h1>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                 
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vị trí</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../../../php/connect.php';


                    $view_sql="SELECT * FROM nhanvien WHERE trangthai = 1";

                    $result = mysqli_query($conn, $view_sql);
                    

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            
                            <td><?php echo $r['hoten'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><?php
                            $vt = $r['vitri'];
                            $search_sql = "SELECT * FROM nhomquyen WHERE id = $vt";
                            $result2 = mysqli_query($conn, $search_sql);
                            $r2 = mysqli_fetch_assoc($result2);
                             echo $r2['tennhomquyen'];
                             ?></td>
                            <td><a href="editNhanVien.php?sid=<?php echo $r['id'] ?>" class="btn btn-info">Sửa</a>
                             <a onclick="return confirm('Bạn có muốn xóa nhân viên này không?')" href="../../BE/quanLyNhanVien/deleteNhanVien.php?sid=<?php echo $r['id'] ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>


    </div>

    <div class="container">
        <h1 style="text-align: center;">Danh sách nhân viên đã nghỉ</h1>       
            <table class="table table-striped">
                <thead class="thead-style">
                <tr>
                 
                    <th>Họ và tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Vị trí</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
      
                <?php

                    //ket noi csdl
                    require_once '../../../php/connect.php';


                    $view_sql="SELECT * FROM nhanvien WHERE trangthai = 0";

                    $result = mysqli_query($conn, $view_sql);
                    

                    while ($r = mysqli_fetch_assoc($result))
                    {
                        ?>

                        <tr>
                            
                            <td><?php echo $r['hoten'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><?php
                            $vt = $r['vitri'];
                            $search_sql = "SELECT * FROM nhomquyen WHERE id = $vt";
                            $result2 = mysqli_query($conn, $search_sql);
                            $r2 = mysqli_fetch_assoc($result2);
                             echo $r2['tennhomquyen'];
                             ?></td>
                            <td><a href="../../BE/quanLyNhanVien/returnNhanVien.php?sid=<?php echo $r['id'] ?>" class="btn btn-info">Hoạt động trở lại</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>


    <style>
    .thead-style {
        background-color: black;
        color: white;
    }
    </style>
</body>
</html>


