<?php include 'header.php';
$staff = $_GET['staff'];
require_once '../../php/connect.php';
?>


      <div class="container">
        <h1 style="text-align: center;">Tìm kiếm sản phẩm</h1>
        <form action="searchSanPham.php?staff=<?php echo $staff?>" method="post">
            <div class="form-group">
                <input type="text" placeholder="Nhập tên hoặc mã sản phẩm" id ="key" class="form-control" name="key">
            </div>
            <input type="text"id ="staff" name="staff" value="<?php echo $staff?>" hidden>

            <button type="submit" class="btn btn-primary">Tìm</button>
        </form>

</body>
</html>
   