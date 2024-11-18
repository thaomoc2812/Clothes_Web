<?php

$nvid = $_GET['sid'];

require_once '../../php/connect.php';

$edit_sql = "SELECT * FROM nhacungcap WHERE id = $nvid";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);

?>
<?php $staff = $_GET['staff'];
include 'header.php'; ?>

<div class="container">
        <form action="../BE/updateNhaCungCap.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $row['id']?>" id ="">
        
        <h1 style="text-align: center;">Thay đổi thông tin nhà cung cấp</h1>
        <div class="form-group">
            <label for="manhacungcap" >Mã nhà cung cấp</label>
            <input type="text" id="manhacungcap" class="form-control" name="manhacungcap" value="<?php echo $row['manhacungcap']?>">
        </div>

        <div class="form-group">
            <label for="tennhacungcap" >Tên nhà cung cấp</label>
            <input type="text" id="tennhacungcap" class="form-control" name="tennhacungcap" value="<?php echo $row['tennhacungcap']?>">
        </div>

        <div class="form-group">
            <label for="sdt" >Số điện thoại liên hệ</label>
            <input type="text" id="sdt" class="form-control" name="sdt" value="<?php echo $row['sdt']?>">
        </div>
        <div class="form-group">
            <label for="diachi" >Địa chỉ</label>
            <input type="text" id="diachi" class="form-control" name="diachi" value="<?php echo $row['diachi']?>">
        </div>


        <input type="text" id="staff" name="staff" value ="<?php echo $staff?>" hidden>

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>

        </form>
    </div>

    </body>
</html>