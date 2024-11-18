<?php

$nvid = $_GET['sid'];

require_once '../../../php/connect.php';

$edit_sql = "SELECT * FROM nhanvien WHERE id = $nvid";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);

?>
<?php include 'header.html'; ?>

<div class="container">
        <h1 style="text-align: center;">Sửa thông tin nhân viên</h1>
        <form action="../../BE/quanLyNhanVien/updateNhanVien.php" method="post">
            <input type="hidden" name="sid" value="<?php echo $row['id']?>" id ="">
            <div class="form-group">
                <label for="hoten">Họ tên</label>
                <input type="text" id ="hoten" class="form-control" name="hoten" value="<?php echo $row['hoten']?>">
            </div>

            
            <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="text" id="sdt" name="sdt" class="form-control" value="<?php echo $row['sdt']?>">
            </div>

            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" name="diachi" id="diachi" class="form-control" value="<?php echo $row['diachi']?>">
            </div>

            <div class="form-group">
              <label for="vitri">Vị trí</label></br>
              <select id="vitri" name="vitri" >
                <?php 
                  $view_sql1="SELECT * FROM nhomquyen";
                  $result1 = mysqli_query($conn, $view_sql1);
                  while ($r1 = mysqli_fetch_assoc($result1))
                    {?><option><?php echo  $r1['tennhomquyen']?> </option><br><?php 
                    }?>
							
            </select><br>
          </div>

            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>

        </form>
    </div>

    </body>
</html>