<?php include 'header.php';
$staff = $_GET['staff'];
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
};
require_once '../../php/connect.php';
$search_nhanvien = "SELECT * FROM nhanvien WHERE  id = $staff ";
$result_nhanvien = mysqli_query($conn, $search_nhanvien);
$fetch_nhanvien= mysqli_fetch_assoc($result_nhanvien);
$vitri = $fetch_nhanvien['vitri'];


$search_nhomquyen = "SELECT * FROM nhomquyen WHERE  id = $vitri ";
$result_nhomquyen = mysqli_query($conn, $search_nhomquyen);
$fetch_nhomquyen= mysqli_fetch_assoc($result_nhomquyen);
$tennhomquyen = $fetch_nhomquyen['tennhomquyen'];


?>

<div class="container">
    <h1 style="text-align: center;">Thêm sản phẩm</h1>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
    <form action="../BE/addSanPham.php" method="post" enctype="multipart/form-data">

        <div class="form-group">

        

            <label>Danh mục sản phẩm:</label> </br>
            <select id="loaidanhmuc" name="loaidanhmuc" style="width: 30%; height: 30px;">
               <?php

                $view_sql2 = "SELECT * FROM phanloaisanpham";
                $result2 = mysqli_query($conn, $view_sql2);
                while ($r2 = mysqli_fetch_assoc($result2)) {
                ?>

                    <option style="pointer-events: none;background-color: gray;"><?php echo  $r2['loaisanpham'] ?><br>


                        <?php
                        $loaisanpham = $r2['loaisanpham'];
                        $search_sql = "SELECT * FROM phanloaisanpham WHERE loaisanpham = '$loaisanpham'";
                        $result = mysqli_query($conn, $search_sql);
                        if ($r = mysqli_fetch_assoc($result))
                            $idloaisanpham = $r['id'];
                        $view_sql3 = "SELECT * FROM danhmucsanpham WHERE idphanloai = $idloaisanpham";
                        $result3 = mysqli_query($conn, $view_sql3);
                        while ($r3 = mysqli_fetch_assoc($result3)) {
                        ?>
                    <option><?php echo  $r3['tendanhmuc'] ?> </option><br>
                <?php
                        } ?>

                </option>

                <br><?php
                } ?>
            </option>

            </select><br>
        </div>

        <!-- <div class="form-group">
            <label for="masanpham">Mã sản phẩm</label>
            <input type="text" id="masanpham" class="form-control" name="masanpham">
        </div> -->
        <input type="text" id="staff" name="staff"  value = "<?php echo $staff?>" hidden>
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" class="form-control">
        </div>



        <div class="form-group">
            <label>Ảnh sản phẩm</label>
            <input type="file" id="anhsanphamchinh" name="anhsanphamchinh" class="form-control">
            <input type="file" id="anhsanphamphu1" name="anhsanphamphu1" class="form-control">
            <input type="file" id="anhsanphamphu2" name="anhsanphamphu2" class="form-control">
            <input type="file" id="anhsanphamphu3" name="anhsanphamphu3" class="form-control">
        </div>


        <!-- <div class="form-group">
            <label for="mota">Mô tả</label>
            <input type="text" name="mota" id="mota" class="form-control">
        </div> -->
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <textarea name="mota" id="mota" class="form-control"></textarea>
        </div>
     

        <button type="submit" class="btn btn-primary">Thêm</button>

    </form>
</div>
</body>

</html>
