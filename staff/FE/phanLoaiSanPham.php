<?php $staff = $_GET['staff'];
include 'header.php'; ?>

                <div class="container">
                  <h1 style="text-align: center;">Phân loại sản phẩm</h1>
    
              </div>

              <div class="list-group">
                <a href="addLoaiSanPham.php?staff=<?php echo $staff ?>" class="list-group-item">Thêm loại sản phẩm</a>
                <a href="viewLoaiSanPham.php?staff=<?php echo $staff ?>" class="list-group-item">Xem danh sách loại sản phẩm</a>
              
              </div>
          


</body>
</html>
   