<?php $staff = $_GET['staff'];
include 'header.php';  ?>

                <div class="container">
                  <h1 style="text-align: center;">Quản lý nhà cung cấp</h1>
    
              </div>

              <div class="list-group">
                <a href="addNhaCungCap.php?staff=<?php echo $staff ?>" class="list-group-item">Thêm nhà cung cấp</a>
                <a href="viewNhaCungCap.php?staff=<?php echo $staff ?>" class="list-group-item">Xem danh sách nhà cung cấp</a>
              
              </div>
          


</body>
</html>
   