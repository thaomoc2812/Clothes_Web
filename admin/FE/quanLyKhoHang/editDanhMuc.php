<?php

$nvid = $_GET['sid'];

require_once '../../../php/connect.php';

$edit_sql = "SELECT * FROM danhmucsanpham WHERE id = $nvid";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);

?>
<?php include 'header.html'; ?>

<div class="container">
        <form action="../../BE/quanLyKhoHang/updateDanhMuc.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $row['id']?>" id ="">
            <div class="form-group">
                <label for="tendanhmuc">Tên danh mục</label>
                <input type="text" id ="tendanhmuc" class="form-control" name="tendanhmuc" value="<?php echo $row['tendanhmuc']?>">
            </div>


            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>

        </form>
    </div>

    </body>
</html>