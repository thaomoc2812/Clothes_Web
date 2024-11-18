<?php include 'header.html'; ?>

      <div class="container">
        <h1 style="text-align: center;">Tìm kiếm sản phẩm</h1>
        <form action="searchSanPham.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Nhập tên hoặc mã sản phẩm" id ="key" class="form-control" name="key">
            </div>

            <button type="submit" class="btn btn-primary">Tìm</button>
        </form>

</body>
</html>
   