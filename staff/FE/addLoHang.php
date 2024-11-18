<?php $staff = $_GET['staff'];
include 'header.php';  
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="addLoHang.php?staff=<?php echo $staff ?>">Thêm lô hàng</a></li>
                <li><a href="viewLoHang.php?staff=<?php echo $staff ?>">Xem danh sách lô hàng</a></li>
                <li><a href="nhapKho.php?staff=<?php echo $staff ?>">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
    <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Đã tồn tại mã. Vui lòng nhập lại</p> <?php } ?>
    <form action="../BE/addLoHang.php" method="post" onsubmit="return checkMaLoHang()">

        <div class="form-group">
            <label for = "tennhacungcap">Nhà cung cấp:</label> <br>

            <select id="tennhacungcap" name="tennhacungcap">
                <?php //ket noi csdl

                require_once '../../php/connect.php';


                $view_sql1 = "SELECT * FROM nhacungcap WHERE trangthai = 1";
                $result1 = mysqli_query($conn, $view_sql1);
                while ($r1 = mysqli_fetch_assoc($result1)) {
                ?>
                    <option><?php echo  $r1['tennhacungcap'] ?> </option><br><?php
                                                                        } ?>
            </select><br>
        </div>
        <input type="text" id="staff"  name="staff" value="<?php echo $staff?>" hidden>
        <div class="form-group">
            <label for="malohang">Mã lô hàng</label>
            <input type="text" id="malohang" class="form-control" name="malohang">
        </div>

        <div class="form-group">
            <label for="ngaynhaphang">Ngày nhập hàng</label>
            <input type="date" id="ngaynhaphang" class="form-control" name="ngaynhaphang" value = "<?php  echo date("Y-m-d");?>" readonly>
        </div>
        <?php 
        $search_nhanvien = "SELECT * FROM nhanvien WHERE  id = $staff ";
        $result_nhanvien = mysqli_query($conn, $search_nhanvien);
        $fetch_nhanvien= mysqli_fetch_assoc($result_nhanvien);
        $hoten = $fetch_nhanvien['hoten'];
        
        ?>
        <div class="form-group">
            <label for="tennhanvien">Nhân viên</label>
            <input type="text" id="tennhanvien" class="form-control" name="tennhanvien" value = "<?php echo $hoten ?>" readonly >
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
</div>

<script>
    function checkMaLoHang() {
        var malohang = document.getElementById("malohang").value;


        var regex = /^[a-zA-Z0-9]+$/;
        if (!regex.test(malohang)) {
            alert("Mã lô hàng chỉ gồm chữ cái không dấu và chữ số!");
            return false;
        }

        return true;
    }
</script>

</body>

</html>