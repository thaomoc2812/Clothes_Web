<?php include 'header.html';
$noti = 0;
if (isset($_GET['noti'])) {
    $noti = $_GET['noti'];
} ?>

<div class="container">
    <h1 style="text-align: center;">Tạo tài khoản nhân viên</h1>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
  <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Số điện thoại không hợp lệ. Vui lòng nhập lại</p> <?php } ?>
  <?php if($noti == 3) {?><p style="text-align: center;color:red;font-size: large">Chưa có nhân viên này trong danh sách hoặc đã dừng làm việc!</p> <?php } ?>
  <?php if($noti == 4) {?><p style="text-align: center;color:blue;font-size: large">Tạo tài khoản thành công!</p> <?php } ?>
    <form action="../../BE/quanLyNhanVien/createTaiKhoanNhanVien.php" method="post">
        <div class="form-group">
            <label for="sdt">Số điện thoại</label>
            <input type="text" id="sdt" class="form-control" name="sdt">
        </div>


        <div class="form-group">
            <label for="matkhau">Mật khẩu</label>
            <input type="text" id="matkhau" name="matkhau" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tạo</button>

    </form>
</div>


</body>

</html>