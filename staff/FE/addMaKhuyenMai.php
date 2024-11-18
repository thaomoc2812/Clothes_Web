<?php $staff = $_GET['staff'];
include 'header.php';?>
<?php
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
}
$makhuyenmai='';
if (isset($_GET['makhuyenmai'])) {
$makhuyenmai = $_GET['makhuyenmai'];
}
$giam=0;
if (isset($_GET['giam'])) {
$giam = $_GET['giam'];
}
$ngaybatdau='';
if (isset($_GET['ngaybatdau'])) {
$ngaybatdau = $_GET['ngaybatdau'];
}
$ngayketthuc='';
if (isset($_GET['ngayketthuc'])) {
$ngayketthuc = $_GET['ngayketthuc'];
}
$key1='';
if (isset($_GET['key1'])) {
$key1 = $_GET['key1'];
}
$key2='';
if (isset($_GET['key2'])) {
$key2 = $_GET['key2'];
}
$key3='';
if (isset($_GET['key3'])) {
$key3 = $_GET['key3'];
}
function tinhLai($gianhapvao, $giabanra, $giam)
{
    $giabanra = $giabanra - $giabanra*$giam/100;
    $lai = $giabanra- $gianhapvao;
    return $lai;

}
?>
<div class="container">
    <h1 style="text-align: center;">Quản lý khuyến mại</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="addMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>">Thêm mã khuyến mại</a></li>
                <li><a href="viewMaKhuyenMai.php?staff=<?php echo $staff ?>">Xem danh sách mã khuyến mại</a></li>


            </ul>
        </div>
    </nav>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Vui lòng nhập đầy đủ thông tin!</p> <?php } ?>
    <?php if($noti == 2) {?><p style="text-align: center;color:red;font-size: large">Phần trăm giảm giá chưa chính xác!</p> <?php } ?>

    <form action="../BE/addMaKhuyenMai.php?staff=<?php echo $staff ?>" method="post">

        <div class="form-group">
            <label>Mã khuyến mại:</label> </br>
            <input type="text" id="makhuyenmai" class="form-control" name="makhuyenmai" <?php if ($makhuyenmai != ".") { ?> value="<?php echo $makhuyenmai ?>" <?php  } ?>>

        </div>
        <div class="form-group">
            <label>Phần trăm giảm giá</label>
            <input type="int" id="giam" class="form-control" name="giam" <?php if ($giam != ".") { ?> value="<?php echo $giam ?>" <?php  } ?>>
        </div>

        <div class="form-group">
            <label>Ngày bắt đầu</label>
            <input type="date" id="ngaybatdau" class="form-control" name="ngaybatdau" <?php if ($ngaybatdau != ".") { ?> value="<?php echo $ngaybatdau ?>" <?php  } ?>>
        </div>

        <div class="form-group">
            <label>Ngày kết thúc</label>
            <input type="date" id="ngayketthuc" class="form-control" name="ngayketthuc" <?php if ($ngayketthuc != ".") { ?> value="<?php echo $ngayketthuc ?>" <?php  } ?>>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button><br>


    </form>
    <a href="quanLyKhuyenMai.php?staff=<?php echo $staff ?>" class="btn btn-info">Hoàn tất</a>
    <a href="../BE/deleteMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&link=<?php echo "quanLyMaKhuyenMai"?>" class="btn btn-danger">Hủy mã khuyến mại</a>
    

    <div>
    <form action="../BE/searchSanPhamDaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&link=<?php echo "addMaKhuyenMai" ?>" method="post">
        <label>Các sản phẩm đã thêm mã khuyến mại</label>
        <input type="text" placeholder="Nhập mã sản phẩm" id="key1" name="key1">
        <button type="submit" class="btn btn-info">Tìm</button><br>
    </form>
    </div>
    
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Lãi mỗi sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl
            require_once '../../php/connect.php';
            if($key1 != "")
                $view_khuyenmai = "SELECT * FROM khuyenmai WHERE makhuyenmai = '$makhuyenmai' AND masanpham LIKE '%$key1%'";
            else $view_khuyenmai = "SELECT * FROM khuyenmai WHERE makhuyenmai = '$makhuyenmai' ";

            $result_khuyenmai = mysqli_query($conn, $view_khuyenmai);
            if ($result_khuyenmai) {
                while ($r_khuyenmai = mysqli_fetch_assoc($result_khuyenmai)) {

                    $idsoluong = $r_khuyenmai['idsoluong'];

                    $view_soluong = "SELECT * FROM soluong WHERE id = $idsoluong";

                    $result_soluong = mysqli_query($conn, $view_soluong);
                    $r_soluong = mysqli_fetch_assoc($result_soluong);

                    $idsanpham = $r_soluong['idsanpham'];
                    $view_sanpham = "SELECT * FROM sanpham WHERE id = $idsanpham ";

                    $result_sanpham = mysqli_query($conn, $view_sanpham);
                    $r_sanpham = mysqli_fetch_assoc($result_sanpham);

            ?>

                    <tr>

                        <td><?php echo $r_sanpham['masanpham'] ?></td>
                        <td><?php echo $r_sanpham['tensanpham'] ?></td>
                        <td><?php

                            $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
                            $result2 = mysqli_query($conn, $search_sql2);
                            if ($r2 = mysqli_fetch_assoc($result2))
                            ?><image src="../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
                        </td>

                        <td><?php echo $r_soluong['mausac'] ?></td>
                        <td><?php echo $r_soluong['kichthuoc'] ?></td>
                        <td><?php echo $r_soluong['soluong'] ?></td>
                        <?php 
                        if($giam == "." ) $giam = 0;
                        
                        $masanpham1 =  $r_sanpham['masanpham'];
                        $mausac1 =  $r_soluong['mausac']; 
                        $kichthuoc1 =  $r_soluong['kichthuoc']; 
                        $search_gia1= "SELECT * FROM thongtinlohang WHERE masanpham = '$masanpham1' AND mausac = '$mausac1' AND kichthuoc = '$kichthuoc1'";
                        $result_gia1 = mysqli_query($conn, $search_gia1);
                        if ($r_gia1 = mysqli_fetch_assoc($result_gia1))
                            $gianhapvao1= $r_gia1['gianhapvao'];
                        $lai1 = tinhLai($gianhapvao1,$r_soluong['giabanra'],$giam);
                        ?>
                        <td><?php echo number_format($lai1, 0, '.', '.') ?></td>
                        <td>

                            <a onclick="return confirm('Xác nhận xóa mã giảm giá cho mặt hàng này?')" href="../BE/deleteMaKhuyenMaiSanPham.php?staff=<?php echo $staff ?>&idsoluong=<?php echo $r_soluong['id'] ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>&link=<?php echo "addMaKhuyenMai" ?>" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
            <?php
                }
            }

            ?>

        </tbody>
    </table>


   
    <div>
    <form action="../BE/searchSanPhamTonKhoChuaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>" method="post">
    <label>Các sản phẩm còn ít chưa thêm mã khuyến mại</label>
        <input type="text" placeholder="Nhập mã sản phẩm" id="key2" name="key2">
        <button type="submit" class="btn btn-info">Tìm</button><br>
    </form>
    </div>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Lãi mỗi sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl

            $view_soluong2 = "SELECT * FROM soluong WHERE soluong < 31 AND masanpham LIKE '%$key2%' ";

            $result_soluong2 = mysqli_query($conn, $view_soluong2);


            while ($r_soluong2 = mysqli_fetch_assoc($result_soluong2)) {
                $idsanpham2 = $r_soluong2['idsanpham'];
                $view_sanpham2 = "SELECT * FROM sanpham WHERE id = $idsanpham2 ";

                $result_sanpham2 = mysqli_query($conn, $view_sanpham2);
                $r_sanpham2 = mysqli_fetch_assoc($result_sanpham2);

                $search = "SELECT * FROM khuyenmai ";

                $query = mysqli_query($conn, $search);
                $q = 0;
                while ($r0 = mysqli_fetch_assoc($query)) {
                    if ($r0['idsoluong'] == $r_soluong2['id']) {
                        $q = 1;
                    }
                };
                if ($q == 0) {
                    



            ?>

                    <tr>

                        <td><?php echo $r_sanpham2['masanpham'] ?></td>
                        <td><?php echo $r_sanpham2['tensanpham'] ?></td>
                        <td><?php

                            $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham2";
                            $result2 = mysqli_query($conn, $search_sql2);
                            if ($r2 = mysqli_fetch_assoc($result2))
                            ?><image src="../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
                        </td>

                        <td><?php echo  $r_soluong2['mausac'] ?></td>
                        <td><?php echo $r_soluong2['kichthuoc'] ?></td>
                        <td><?php echo $r_soluong2['soluong'] ?></td>

                        <?php 
                        if($giam == "." ) $giam = 0;
                        $masanpham2 =  $r_sanpham2['masanpham'];
                        $mausac2 =  $r_soluong2['mausac']; 
                        $kichthuoc2 =  $r_soluong2['kichthuoc']; 
                        $search_gia2= "SELECT * FROM thongtinlohang WHERE masanpham = '$masanpham2' AND mausac = '$mausac2' AND kichthuoc = '$kichthuoc2'";
                        $result_gia2 = mysqli_query($conn, $search_gia2);
                        if ($r_gia2 = mysqli_fetch_assoc($result_gia2))
                            $gianhapvao2= $r_gia2['gianhapvao'];
                        $lai2 = tinhLai($gianhapvao2,$r_soluong2['giabanra'],$giam);
                        
                        ?>
                        <td><?php echo number_format($lai2, 0, '.', '.') ?></td>
                        <td><a href="../BE/addMaKhuyenMaiSanPham.php?staff=<?php echo $staff ?>&idsoluong=<?php echo $r_soluong2['id'] ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>" class="btn btn-info">Thêm</a></td>
                    </tr>
            <?php
                }
            }

            ?>

        </tbody>
    </table>


    
    <div>
    <form action="../BE/searchSanPhamChuaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>" method="post">
    <label>Tất cả sản phẩm chưa thêm mã khuyến mại</label>
        <input type="text" placeholder="Nhập mã sản phẩm" id="key3" name="key3">
        <button type="submit" class="btn btn-info">Tìm</button><br>
    </form>
    </div>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>

                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Lãi mỗi sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>

            <?php

            //ket noi csdl

            $view_soluong2 = "SELECT * FROM soluong WHERE masanpham LIKE '%$key3%'";

            $result_soluong2 = mysqli_query($conn, $view_soluong2);


            while ($r_soluong2 = mysqli_fetch_assoc($result_soluong2)) {
                $idsanpham2 = $r_soluong2['idsanpham'];
                $view_sanpham2 = "SELECT * FROM sanpham WHERE id = $idsanpham2 ";

                $result_sanpham2 = mysqli_query($conn, $view_sanpham2);
                $r_sanpham2 = mysqli_fetch_assoc($result_sanpham2);

                $search = "SELECT * FROM khuyenmai ";

                $query = mysqli_query($conn, $search);
                $q = 0;
                while ($r0 = mysqli_fetch_assoc($query)) {
                    if ($r0['idsoluong'] == $r_soluong2['id']) {
                        $q = 1;
                    }
                };
                if ($q == 0) {



            ?>

                    <tr>

                        <td><?php echo $r_sanpham2['masanpham'] ?></td>
                        <td><?php echo $r_sanpham2['tensanpham'] ?></td>
                        <td><?php

                            $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham2";
                            $result2 = mysqli_query($conn, $search_sql2);
                            if ($r2 = mysqli_fetch_assoc($result2))
                            ?><image src="../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
                        </td>

                        <td><?php echo $r_soluong2['mausac'] ?></td>
                        <td><?php echo $r_soluong2['kichthuoc'] ?></td>
                        <td><?php echo $r_soluong2['soluong'] ?></td>
                        <?php 
                        if($giam == "." ) $giam = 0;
                        $masanpham2 =  $r_sanpham2['masanpham'];
                        $mausac2 =  $r_soluong2['mausac']; 
                        $kichthuoc2 =  $r_soluong2['kichthuoc']; 
                        $search_gia2= "SELECT * FROM thongtinlohang WHERE masanpham = '$masanpham2' AND mausac = '$mausac2' AND kichthuoc = '$kichthuoc2'";
                        $result_gia2 = mysqli_query($conn, $search_gia2);
                        if ($r_gia2 = mysqli_fetch_assoc($result_gia2))
                            $gianhapvao2= $r_gia2['gianhapvao'];
                        $lai2 = tinhLai($gianhapvao2,$r_soluong2['giabanra'],$giam);
                        
                        ?>
                        <td><?php echo number_format($lai2, 0, '.', '.') ?></td>
                        <td><a href="../BE/addMaKhuyenMaiSanPham.php?staff=<?php echo $staff ?>&idsoluong=<?php echo $r_soluong2['id'] ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>" class="btn btn-info">Thêm</a></td>
                    </tr>
            <?php
                }
            }

            ?>

        </tbody>
    </table>

    <style>
        .thead-style {
            background-color: black;
            color: white;
        }
    </style>


</div>




</div>



</body>

</html>