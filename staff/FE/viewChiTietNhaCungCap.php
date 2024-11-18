<?php

$idnhacungcap = $_GET['sid'];

require_once '../../php/connect.php';

$search_sql = "SELECT * FROM nhacungcap WHERE id = $idnhacungcap";
$result = mysqli_query($conn, $search_sql);
$r = mysqli_fetch_assoc($result);
?>
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

    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã NCC</th>
                <th>Tên NCC</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>


            <tr>

                <td><?php echo $r['manhacungcap'] ?></td>
                <td><?php echo $r['tennhacungcap'] ?></td>
                <td><?php echo $r['sdt'] ?></td>
                <td><?php echo $r['diachi'] ?></td>

            </tr>

        </tbody>
    </table>
  
    <table class="table table-striped">
        <thead style="background-color: gray;color: white;">
            <tr>

                <th>Mã lô hàng</th>
                <th>Ngày nhập hàng</th>
                <th>Nhân viên</th>
                <th>Chi tiết</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';


            $view_sql = "SELECT * FROM lohang WHERE idnhacungcap = $idnhacungcap";

            $result = mysqli_query($conn, $view_sql);


            while ($r = mysqli_fetch_assoc($result)) {
            ?>

                <tr>

                    <td><?php echo $r['malohang'] ?></td>
                    <td><?php echo $r['ngaynhaphang'] ?></td>

                    <td><?php
                        $idnhanvien = $r['idnhanvien'];
                        if ($idnhanvien == 0) echo "admin";
                        else {
                            $search_sql2 = "SELECT * FROM nhanvien WHERE id = $idnhanvien";
                            $result2 = mysqli_query($conn, $search_sql2);
                            if ($r2 = mysqli_fetch_assoc($result2))
                                echo $r2['hoten'];
                        }
                        ?></td>
                    <td><a href="viewChiTietLoHang.php?staff=<?php echo $staff ?>&sid=<?php echo $r['id'] ?>">Xem</a>
                       
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>

        </tbody>
    </table>
    <style>
        .thead-style {
            background-color: black;
            color: white;
        }
    </style>