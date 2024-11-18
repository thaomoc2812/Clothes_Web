<?php $staff = $_GET['staff'];
include 'header.php';  ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý khuyến mại</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo "." ?>&giam=<?php echo "." ?>&ngaybatdau=<?php echo "." ?>&ngayketthuc=<?php echo "." ?>&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>">Thêm mã khuyến mại</a></li>
                <li class="active"><a href="viewMaKhuyenMai.php?staff=<?php echo $staff ?>">Xem danh sách mã khuyến mại</a></li>


            </ul>
        </div>
    </nav>


    <h2>Mã khuyến mại đang hoạt động</h2>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã khuyến mại</th>
                <th>Giảm (%)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';
            $today = date("Y-m-d");

            $view_sql1 = "SELECT * FROM thongtinkhuyenmai WHERE 
            (((MONTH(ngayketthuc) = MONTH('$today') AND DAY(ngayketthuc) > DAY('$today')) OR MONTH(ngayketthuc) > MONTH('$today')))
            AND
            (((MONTH(ngaybatdau) = MONTH('$today') AND DAY(ngaybatdau) <= DAY('$today')) OR MONTH(ngaybatdau) < MONTH('$today')))
            ";




            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['makhuyenmai'] ?></td>
                    <td><?php echo $r1['giam'] ?></td>
                    <td><?php echo $r1['ngaybatdau'] ?></td>
                    <td><?php echo $r1['ngayketthuc'] ?></td>

                    <td><a href="viewChiTietMaKhuyenMaiDangChay.php?staff=<?php echo $staff ?>&sid=<?php echo $r1['id'] ?>&key=<?php echo "" ?>">Chi tiết</a>

                        <a onclick="return confirm('Vô hiệu hóa mã khuyến mại?')" href="../BE/stopMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $r1['makhuyenmai'] ?>" class="btn btn-danger">Dừng</a>

                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


    <h2>Mã khuyến mại chưa hoạt động</h2>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã khuyến mại</th>
                <th>Giảm (%)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';


            $view_sql1 = "SELECT * FROM thongtinkhuyenmai WHERE 
            ((MONTH(ngaybatdau) = MONTH('$today') AND DAY(ngaybatdau) > DAY('$today')) OR MONTH(ngaybatdau) > MONTH('$today'))
            ";


            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['makhuyenmai'] ?></td>
                    <td><?php echo $r1['giam'] ?></td>
                    <td><?php echo $r1['ngaybatdau'] ?></td>
                    <td><?php echo $r1['ngayketthuc'] ?></td>

                    <td><a href="viewChiTietMaKhuyenMai.php?staff=<?php echo $staff ?>&sid=<?php echo $r1['id'] ?>&key=<?php echo "" ?>">Chi tiết</a>

                        <a onclick="return confirm('Xóa mã khuyến mại?')" href="../BE/deleteMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $r1['makhuyenmai'] ?>&link=<?php echo "viewMaKhuyenMai" ?>" class="btn btn-danger">Xóa</a>

                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

    <h2>Mã khuyến mại đã dừng</h2>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã khuyến mại</th>
                <th>Giảm (%)</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
    
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';


            $view_sql1 = "SELECT * FROM thongtinkhuyenmai WHERE 
            ((MONTH(ngayketthuc) = MONTH('$today') AND DAY(ngayketthuc) <= DAY('$today')) OR MONTH(ngayketthuc) < MONTH('$today'))
            
            ";


            $result1 = mysqli_query($conn, $view_sql1);


            while ($r1 = mysqli_fetch_assoc($result1)) {
            ?>

                <tr>

                    <td><?php echo $r1['makhuyenmai'] ?></td>
                    <td><?php echo $r1['giam'] ?></td>
                    <td><?php echo $r1['ngaybatdau'] ?></td>
                    <td><?php echo $r1['ngayketthuc'] ?></td>

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