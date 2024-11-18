<?php $staff = $_GET['staff'];
include 'header.php';  ?>

                <div class="container">
                  <h1 style="text-align: center;">Quản lý lô hàng</h1>
    
              </div>

              <div class="list-group">
                <a href="addLoHang.php?staff=<?php echo $staff ?>" class="list-group-item">Thêm lô hàng</a>
                <a href="viewLoHang.php?staff=<?php echo $staff ?>" class="list-group-item">Xem danh sách lô hàng</a>
                <a href="nhapKho.php?staff=<?php echo $staff ?>" class="list-group-item">Nhập kho</a>
              
              </div>
          


</body>
</html>
   