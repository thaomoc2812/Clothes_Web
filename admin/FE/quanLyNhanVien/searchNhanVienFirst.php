<?php include 'header.html'; ?>

      <div class="container">
        <h1 style="text-align: center;">Tìm kiếm nhân viên</h1>
        <form action="searchNhanVien.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Nhập tên hoặc địa chỉ, số điện thoại, vị trí" id ="key" class="form-control" name="key">
            </div>

            <button type="submit" class="btn btn-primary">Tìm</button>
        </form>

</body>
</html>
   