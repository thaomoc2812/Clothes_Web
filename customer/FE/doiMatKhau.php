<?php include 'header.php';
if(isset($_GET['user'])) {
    $user = $_GET['user'];
}
$check = 0;
if(isset($_GET['check'])) {
    $check = $_GET['check'];
}
require_once '../../php/connect.php';
$search_khach = "SELECT * FROM khachhang WHERE sdt = '$user'";
$result_khach = mysqli_query($conn, $search_khach);
$fetch_khach= mysqli_fetch_assoc($result_khach);
?>
</ul>
</div>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <h1 style="color: white;text-align: center;margin-left: 600px;">Đổi mật khẩu</h1>
    </nav>
<br><br><br>
    <?php if ($check == 1) {?>
        <p style="text-align: center;color:red">Mật khẩu cũ không chính xác!</p>
    <?php }?>

    <?php if ($check == 2) {?>
        <p style="text-align: center;color:red">Mật khẩu mới và xác nhận không khớp!</p>
    <?php }?>

    <main role="main">
        <div class="container mt-4">
            <form id="passwordForm" class="needs-validation" action="../BE/doiMatKhau.php" method="post">
                <div class="row">
                    <input type="text" class="form-control" name="user" id="user" value="<?php echo $user ?>" style="display: none;">
                    <div class="col-md-12">
                        <label for="matkhaucu">Mật khẩu cũ</label>
                        <input type="text" class="form-control" name="matkhaucu" id="matkhaucu">
                    </div>
                    <div class="col-md-12">
                        <label for="matkhaumoi">Mật khẩu mới</label>
                        <input type="text" class="form-control" name="matkhaumoi" id="matkhaumoi">
                    </div>
                    <div class="col-md-12">
                        <label for="xacnhanmatkhaumoi">Xác nhận khẩu mới</label>
                        <input type="text" class="form-control" name="xacnhanmatkhaumoi" id="xacnhanmatkhaumoi">
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Lưu</button>
                </div>
            </form>
        </div>
    </main>
    <?php include 'footer.html';?>

    <script>
        document.getElementById('passwordForm').addEventListener('submit', function(event) {
            var matkhaucu = document.getElementById('matkhaucu').value;
            var matkhaumoi = document.getElementById('matkhaumoi').value;
            var xacnhanmatkhaumoi = document.getElementById('xacnhanmatkhaumoi').value;

            if (matkhaucu === '' || matkhaumoi === '' || xacnhanmatkhaumoi === '') {
                alert('Vui lòng điền tất cả các trường.');
                event.preventDefault();  // Ngăn chặn việc gửi biểu mẫu
            }
        });
    </script>
</body>
