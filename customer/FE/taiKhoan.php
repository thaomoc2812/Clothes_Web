<?php include 'header.php';
if(isset($_GET['user']))
{
    $sdt = $_GET['user'];
}?>
</ul>
</div>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <h1 style="color: white;text-align: center;margin-left: 600px;">Quản lý tài khoản</h1>
        
    </nav>
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="list-group">
            <a href="thongTinKhachHang.php?user=<?php echo $sdt ?>" class="list-group-item">Thông tin cá nhân</a>
            <a href="donHangChoXacNhan.php?user=<?php echo $sdt ?>" class="list-group-item">Đơn hàng</a>
            <a href="doiMatKhau.php?user=<?php echo $sdt ?>" class="list-group-item">Đổi mật khẩu</a>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br><br><br><br>
        </div>
    </main>

    <!-- end footer -->
</body>

</html>
<?php include 'footer.html';?>
