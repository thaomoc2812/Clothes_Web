<?php include 'header.html';
$nvid = $_GET['sid'];

require_once '../../../php/connect.php';

$edit_sql = "SELECT * FROM sanpham WHERE id = $nvid";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addLoHang.php">Thêm lô hàng</a></li>
                <li><a href="viewLoHang.php">Xem danh sách lô hàng</a></li>
                <li class="active"><a href="nhapKho.php">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <form action="../../BE/quanLyKhoHang/nhapKhoSanPham.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        
        <div class="form-group">
            <label>Mã sản phẩm:</label> </br>
            <input type="text" id="masanpham" class="form-control" name="masanpham" value="<?php echo $row['masanpham'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" class="form-control" value="<?php echo $row['tensanpham'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="malohang">Lô hàng</label><br>
            <select id="malohang" name="malohang" style="width: 30%; height: 30px;">
                <?php //ket noi csdl

                $today = date("Y-m-d");
                $view_sql1 = "SELECT * FROM lohang WHERE ngaynhaphang = '$today'";
                $result1 = mysqli_query($conn, $view_sql1);
                while ($r1 = mysqli_fetch_assoc($result1)) {
                ?>
                    <option><?php echo  $r1['malohang'] ?></option><br><?php
                                                                    } ?>
            </select><br>
        </div>
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