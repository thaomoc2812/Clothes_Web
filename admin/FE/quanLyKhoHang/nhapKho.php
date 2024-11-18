<?php include 'header.html'; ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addLoHang.php">Thêm lô hàng</a></li>
                <li><a href="viewLoHang.php">Xem danh sách lô hàng</a></li>
                <li class="active"><a href="nhapKho.php">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <form action="nhapKhoView.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm" id="key" class="form-control" name="key">
        </div>

        <button type="submit" class="btn btn-primary">Tìm</button>
    </form>
  
</div>


</div>



<style>
    .thead-style {
        background-color: black;
        color: white;
    }
</style>
</body>

</html>