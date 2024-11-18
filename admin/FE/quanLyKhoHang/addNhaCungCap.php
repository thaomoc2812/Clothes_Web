<?php include 'header.html';
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
}  ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý nhà cung cấp</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="addNhaCungCap.php">Thêm nhà cung cấp</a></li>
                <li><a href="viewNhaCungCap.php">Xem danh sách nhà cung cấp</a></li>


            </ul>
        </div>
    </nav>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
    <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Đã tồn tại mã. Vui lòng nhập lại</p> <?php } ?>
    <?php if($noti == 3) {?><p style="text-align: center;color:red;font-size: large">Số điện thoại không hợp lệ. Vui lòng nhập lại</p> <?php } ?>

    <form action="../../BE/quanLyKhoHang/addNhaCungCap.php" method="post" onsubmit="return checkMaNhaCungCap()">

        
        <div class="form-group">
            <label for="manhacungcap" >Mã nhà cung cấp</label>
            <input type="text" id="manhacungcap" class="form-control" name="manhacungcap">
        </div>

        <div class="form-group">
            <label for="tennhacungcap" >Tên nhà cung cấp</label>
            <input type="text" id="tennhacungcap" class="form-control" name="tennhacungcap">
        </div>

        <div class="form-group">
            <label for="sdt" >Số điện thoại liên hệ</label>
            <input type="text" id="sdt" class="form-control" name="sdt">
        </div>
        <div class="form-group">
            <label for="diachi" >Địa chỉ</label>
            <input type="text" id="diachi" class="form-control" name="diachi">
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
</div>

<script>
 function checkMaNhaCungCap() {
    var manhacungcap = document.getElementById("manhacungcap").value;
 
    var regex = /^[a-zA-Z0-9]+$/;
        if (!regex.test(manhacungcap)) {
            alert("Mã nhà cung cấp chỉ gồm chữ cái không dấu và chữ số!");
            return false;
        }

    return true;
    }
    </script>
</div>

</body>

</html>