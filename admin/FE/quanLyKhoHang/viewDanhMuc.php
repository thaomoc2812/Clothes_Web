<?php include 'header.html'; 
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
} ?>

<div class="container">
    <h1 style="text-align: center;">Quản lý danh mục sản phẩm</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addDanhMuc.php">Thêm danh mục</a></li>
                <li class="active"><a href="addDanhMuc.php">Xem danh sách danh mục</a></li>


            </ul>
        </div>
    </nav>


</div>
<?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Không thể xóa vì đã có sản phẩm thuộc danh mục này!</p> <?php } ?>
<div class="container">

    <?php //ket noi csdl
    require_once '../../../php/connect.php';


    $view_sql1 = "SELECT * FROM phanloaisanpham";

    $result1 = mysqli_query($conn, $view_sql1);
    while ($r1 = mysqli_fetch_assoc($result1)) {

    ?>

        <table class="table table-striped">
            <thead class="thead-style">
                <tr>

                    <th style = "width: 300px;">Danh mục</th>
                    <th style = "width: 400px;"><?php echo  $r1['loaisanpham'] ?> </th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idphanloai = $r1['id'];
                $view_sql2 = "SELECT * FROM danhmucsanpham
                            WHERE idphanloai = $idphanloai ";
                $result2 = mysqli_query($conn, $view_sql2);
                while ($r2 = mysqli_fetch_assoc($result2)) {
                ?>

                    <tr>

                        <td><?php echo $r2['tendanhmuc'] ?></td>
                        <td></td>
                        <td><a href="viewChiTietDanhMuc.php?sid=<?php echo $r2['id'] ?>">Chi tiết</a>
                            <a href="editDanhMuc.php?sid=<?php echo $r2['id'] ?>" class="btn btn-info">Sửa</a>
                            <a onclick="return confirm('Bạn có muốn xóa danh mục này không?')" href="../../BE/quanLyKhoHang/deleteDanhMuc.php?sid=<?php echo $r2['id'] ?>" class="btn btn-danger">Xóa</a>
                        </td>


                    </tr>
                <?php
                } ?>


            </tbody>

        </table>
    <?php
    } ?>

</div>
<style>
    .thead-style {
        background-color: gray;
        color: white;
    }
</style>

</body>

</html>