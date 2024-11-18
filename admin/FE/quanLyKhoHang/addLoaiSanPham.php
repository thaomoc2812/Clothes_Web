<?php include 'header.html'; 
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
  <h1 style="text-align: center;">Phân loại sản phẩm</h1>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="addLoaiSanPham.php">Thêm loại sản phẩm</a></li>
        <li><a href="viewLoaiSanPham.php">Xem danh sách loại sản phẩm</a></li>


      </ul>
    </div>
  </nav>
  <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
  <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Đã có loại sản phẩm này. Vui lòng nhập lại</p> <?php } ?>
  <form action="../../BE/quanLyKhoHang/addLoaiSanPham.php" method="post">


    <div class="form-group">
      <label>Loại sản phẩm</label>
      <input type="text" id="tenLoaiSanPham" class="form-control" name="tenLoaiSanPham">
    </div>



    <button type="submit" class="btn btn-primary">Thêm</button>

  </form>
</div>



</body>

</html>