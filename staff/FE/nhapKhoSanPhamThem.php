<?php $staff = $_GET['staff'];
include 'header.php'; 
require_once '../../php/connect.php';
$idlohang = $_GET['idlohang'];
$masanpham = $_GET['masanpham'];

?>
<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addLoHang.php?staff=<?php echo $staff?>">Thêm lô hàng</a></li>
                <li><a href="viewLoHang.php?staff=<?php echo $staff?>">Xem danh sách lô hàng</a></li>
                <li class="active"><a href="nhapKho.php?staff=<?php echo $staff?>">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <?php
    $search_sql = "SELECT * FROM lohang WHERE id = $idlohang";
    $result = mysqli_query($conn, $search_sql);
    if ($r = mysqli_fetch_assoc($result))
        $malohang = $r['malohang'];

    $search_sql2 = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
    $result2 = mysqli_query($conn, $search_sql2);
    if ($r2 = mysqli_fetch_assoc($result2))
        $tensanpham = $r2['tensanpham'];


    ?>
    <form action="../BE/nhapKhoSanPham.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
    <input type="text" id="staff" name="staff" value="<?php echo $staff ?>" hidden>

        <div class="form-group">
            <label>Mã sản phẩm:</label> </br>
            <input type="text" id="masanpham" class="form-control" name="masanpham" value="<?php echo $masanpham ?>" readonly>
        </div>
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" class="form-control" value="<?php echo $tensanpham ?>" readonly>
        </div>
        <div class="form-group">
            <label for="malohang">Lô hàng</label><br>
            <input type="text" id="malohang" name="malohang" class="form-control" value="<?php echo $malohang ?>" readonly>
        </div>
        <?php

        ?>
        <div class="form-group">
            <table class="table table-striped">
                <thead class="thead-style">
                    <tr>

                        <th>Màu sắc</th>
                        <th>Kích thước</th>
                        <th>Số lượng</th>
                        <th>Giá nhập vào</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $view_sql3 = "SELECT * FROM thongtinlohang WHERE idlohang = $idlohang AND masanpham = '$masanpham'";

                    $result3 = mysqli_query($conn, $view_sql3);


                    while ($r3 = mysqli_fetch_assoc($result3)) {
                    ?>
                        <tr>


                            <td><?php echo $r3['mausac'] ?></td>
                            <td><?php echo $r3['kichthuoc'] ?></td>
                            <td><?php echo $r3['soluong'] ?></td>
                            <td><?php 
                            $gia = number_format($r3['gianhapvao'],0,'.','.');
                            echo $gia ?></td>

                            <td>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="../BE/deleteNhapKhoSanPham.php?staff=<?php echo $staff?>&sid=<?php echo $r3['id'] ?>&idlohang=<?php echo $idlohang?>&masanpham=<?php echo $masanpham ?>" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>

                        <td><input type="text" id="mausac" name="mausac" class="form-control"></td>
                        <td><input type="text" id="kichthuoc" name="kichthuoc" class="form-control"></td>
                        <td><input type="int" id="soluong" name="soluong" class="form-control"></td>
                        <td><input type="int" id="gianhapvao" name="gianhapvao" class="form-control"></td>
                    </tr>


                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="../BE/deleteNhapKho.php?staff=<?php echo $staff?>&idlohang=<?php echo $idlohang?>&masanpham=<?php echo $masanpham ?>" class="btn btn-danger">Hủy nhập sản phẩm</a>
        <a href="../BE/addSoLuongSanPham.php?staff=<?php echo $staff?>&idlohang=<?php echo $idlohang?>&masanpham=<?php echo $masanpham ?>" class="btn btn-info">Hoàn tất</a>    
    </form>
    <script>
    function validateForm() {
    var mausac = document.getElementById("mausac").value;
    var kichthuoc = document.getElementById("kichthuoc").value;
    var soluong = document.getElementById("soluong").value;
    var gianhapvao = document.getElementById("gianhapvao").value;
    if (mausac == "" || kichthuoc == "" || !soluong || !gianhapvao) {
        alert("Vui lòng điền đầy đủ thông tin màu sắc, kích thước, số lượng, giá nhập vào!");
        return false;
    }
    return true;
    }
    </script>
                  
</div>


</div>



<style>
    .thead-style {
        background-color: black;
        color: white;
    }
</style>
</body>

</html>