<?php $staff = $_GET['staff'];
include 'header.php';  ?>

                <div class="container">
                  <h1 style="text-align: center;">Quản lý danh mục sản phẩm</h1>
    
              </div>

              <div class="list-group">
                <a href="addDanhMuc.php?staff=<?php echo $staff ?>" class="list-group-item">Thêm danh mục</a>
                <a href="viewDanhMuc.php?staff=<?php echo $staff ?>" class="list-group-item">Xem danh sách danh mục</a>
              
              </div>
          


</body>
</html>
   