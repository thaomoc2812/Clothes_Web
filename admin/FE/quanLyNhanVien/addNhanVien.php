<?php include 'header.html';
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
  <h1 style="text-align: center;">Form thêm nhân viên</h1>
  <form action="../../BE/quanLyNhanVien/addNhanVien.php" method="post">
  <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
  <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Số điện thoại không hợp lệ. Vui lòng nhập lại</p> <?php } ?>
  <?php if($noti == 3) {?><p style="text-align: center;color:red;font-size: large">Số điện thoại đã tồn tại!</p> <?php } ?>
 
  

    <div class="form-group">
      <label for="hoten">Họ tên</label>
      <input type="text" id="hoten" class="form-control" name="hoten">
    </div>
    <div class="form-group">
      <label for="sdt">Số điện thoại</label>
      <input type="text" id="sdt" name="sdt" class="form-control">
    </div>
    <div class="form-group">
      <label for="diachi">Địa chỉ</label>
      <input type="text" name="diachi" id="diachi" class="form-control">
    </div>

    <div class="form-group">
      <label>Vị trí:</label>

      <select id="vitri" name="vitri">
        <?php //ket noi csdl

        require_once '../../../php/connect.php';


        $view_sql1 = "SELECT * FROM nhomquyen";
        $result1 = mysqli_query($conn, $view_sql1);
        while ($r1 = mysqli_fetch_assoc($result1)) {
        ?>
          <option><?php echo  $r1['tennhomquyen'] ?> </option><br><?php
                                                                } ?>
      </select><br>
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>

  </form>
</div>



</body>

</html>