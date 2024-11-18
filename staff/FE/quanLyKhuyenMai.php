<?php $staff = $_GET['staff'];
include 'header.php'; ?>

                <div class="container">
                  <h1 style="text-align: center;">Quản lý khuyến mại</h1>
    
              </div>

              <div class="list-group">
                <a href="addMaKhuyenMai.php?staff=<?php echo $staff ?>" class="list-group-item">Thêm mã khuyến mại</a>
                <a href="viewMaKhuyenMai.php?staff=<?php echo $staff ?>" class="list-group-item">Xem danh sách mã khuyến mại</a>
              
              </div>
          


</body>
</html>
   