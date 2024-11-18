<?php $staff = $_GET['staff'];
include 'header.php';
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
  <h1 style="text-align: center;">Phân loại sản phẩm</h1>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="addLoaiSanPham.php?staff=<?php echo $staff ?>">Thêm mã khuyến mại</a></li>
        <li><a href="viewLoaiSanPham.php?staff=<?php echo $staff ?>">Xem danh sách loại sản phẩm</a></li>


      </ul>
    </div>
  </nav>
  <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
  <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Đã có loại sản phẩm này. Vui lòng nhập lại</p> <?php } ?>

  <form action="../BE/addLoaiSanPham.php" method="post">


    <div class="form-group">
      <label>Loại sản phẩm</label>
      <input type="text" id="tenLoaiSanPham" class="form-control" name="tenLoaiSanPham">
    </div>

    <input type="text" id="staff" name="staff" value ="<?php echo $staff?>" hidden>

    <button type="submit" class="btn btn-primary">Thêm</button>

  </form>
</div>



</body>

</html>