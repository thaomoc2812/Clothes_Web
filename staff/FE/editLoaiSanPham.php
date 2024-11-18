<?php

$nvid = $_GET['sid'];

require_once '../../php/connect.php';

$edit_sql = "SELECT * FROM phanloaisanpham WHERE id = $nvid";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);

?>
<?php $staff = $_GET['staff'];
include 'header.php'; ?>

<div class="container">
        <form action="../BE/updateLoaiSanPham.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $row['id']?>" id ="">
            <div class="form-group">
                <label for="loaisanpham">Loại sản phẩm</label>
                <input type="text" id ="loaisanpham" class="form-control" name="loaisanpham" value="<?php echo $row['loaisanpham']?>">
            </div>

            <input type="text" id="staff" name="staff" value ="<?php echo $staff?>" hidden>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>

        </form>
    </div>

    </body>
</html>