<?php

$idsanpham = $_GET['sid'];

require_once '../../../php/connect.php';

$edit_sql = "SELECT * FROM sanpham WHERE id = $idsanpham";

$result = mysqli_query($conn, $edit_sql);
$row = mysqli_fetch_assoc($result);
$masanpham =$row['masanpham'];

$view_thongtinsanpham = "SELECT * FROM thongtinsanpham WHERE masanpham = '$masanpham'";

$result_thongtinsanpham = mysqli_query($conn, $view_thongtinsanpham);
$r_thongtinsanpham = mysqli_fetch_assoc($result_thongtinsanpham);
$iddanhmuc = $r_thongtinsanpham['iddanhmuc'];

$view_danhmucsanpham = "SELECT * FROM danhmucsanpham WHERE id = $iddanhmuc";

$result_danhmucsanpham = mysqli_query($conn, $view_danhmucsanpham);
$r_danhmucsanpham = mysqli_fetch_assoc($result_danhmucsanpham);


$view_hinhanhsanpham = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";

$result_hinhanhsanpham = mysqli_query($conn, $view_hinhanhsanpham);
$r_hinhanhsanpham= mysqli_fetch_assoc($result_hinhanhsanpham);


?>

<?php include 'header.html'; ?>

<div class="container">
    <form action="../../BE/quanLyKhoHang/updateSanPham.php?idsanpham=<?php echo $idsanpham?>" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Danh mục sản phẩm:</label>
            <input type="text" id="loaidanhmuc" class="form-control" name="loaidanhmuc" value="<?php echo $r_danhmucsanpham['tendanhmuc']?>" readonly >
        </div>

        <div class="form-group">
            <label for="masanpham">Mã sản phẩm</label>
            <input type="text" id="masanpham" class="form-control" name="masanpham" value="<?php echo $row['masanpham']?>" readonly >
        </div>
        <div class="form-group">
            <label for="tensanpham">Tên sản phẩm</label>
            <input type="text" id="tensanpham" name="tensanpham" class="form-control" value="<?php echo $row['tensanpham']?>" >
        </div>



        <div class="form-group">
            <label>Ảnh sản phẩm</label>
            <input type="file" id="anhsanphamchinh" name="anhsanphamchinh" class="form-control" value="<?php echo $r_hinhanhsanpham['hinhanhchinh']?>">
            <input type="file" id="anhsanphamphu1" name="anhsanphamphu1" class="form-control" value="<?php echo $r_hinhanhsanpham['hinhanhphu1']?>">
            <input type="file" id="anhsanphamphu2" name="anhsanphamphu2" class="form-control" value="<?php echo $r_hinhanhsanpham['hinhanhphu2']?>">
            <input type="file" id="anhsanphamphu3" name="anhsanphamphu3" class="form-control" value="<?php echo $r_hinhanhsanpham['hinhanhphu3']?>">
        </div>


        <div class="form-group">
            <label for="mota">Mô tả</label>
         
            <input type="text" name="mota" id="mota" class="form-control" value="<?php echo $r_thongtinsanpham['mota']?>">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>

</form>
        <table class="table table-striped">
        <thead style="background-color: gray;color: white;">
            <tr>

                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Giá bán ra</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php

            $view_soluong = "SELECT * FROM soluong WHERE idsanpham = $idsanpham";

            $result_soluong = mysqli_query($conn, $view_soluong);


            while ($r_soluong = mysqli_fetch_assoc($result_soluong)) {
                
            ?>

                <tr>
                
                    <td><?php echo $r_soluong['mausac'] ?></td>
                    <td><?php echo $r_soluong['kichthuoc'] ?></td>
                    <form action="../../BE/quanLyKhoHang/updateSoLuongSanPham.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idsoluong" value="<?php echo $r_soluong['id']?>" id ="">
                    <input type="hidden" name="idsanpham" value="<?php echo $idsanpham?>" id ="">
                    <td><input type="int" name="soluong" id="soluong" class="form-control" value="<?php echo $r_soluong['soluong'] ?>"></td>
                    <td><input type="int" name="giabanra" id="giabanra" class="form-control" value="<?php echo $r_soluong['giabanra'] ?>"></td>
                    <th><button type="submit"  hidden>Lưu</button></th>
                    </form>
                </tr>
            <?php
            }
            ?>

        </tbody>

        </tbody>
    </table>
    <a href="viewSanPham.php" class="btn btn-danger">Xong</a>
</div>
</body>

</html>