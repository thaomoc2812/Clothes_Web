<?php $staff = $_GET['staff'];
include 'header.php'; 
?>

<?php 

$idthongtinkhuyenmai = $_GET['sid'];
$key1 = $_GET['key'];

require_once '../../php/connect.php';

$search_thongtinkhuyenmai = "SELECT * FROM thongtinkhuyenmai WHERE id = $idthongtinkhuyenmai";
$result_thongtinkhuyenmai = mysqli_query($conn, $search_thongtinkhuyenmai);
$r_thongtinkhuyenmai = mysqli_fetch_assoc($result_thongtinkhuyenmai);
$makhuyenmai = $r_thongtinkhuyenmai['makhuyenmai'];
$giam =  $r_thongtinkhuyenmai['giam'];
$ngaybatdau =  $r_thongtinkhuyenmai['ngaybatdau'];
$ngayketthuc =  $r_thongtinkhuyenmai['ngayketthuc'];
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
                <li><a href="addMaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo "." ?>&giam=<?php echo "." ?>&ngaybatdau=<?php echo "." ?>&ngayketthuc=<?php echo "." ?>&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>">Thêm mã khuyến mại</a></li>
                <li class="active"><a href="viewMaKhuyenMai.php?staff=<?php echo $staff ?>">Xem danh sách mã khuyến mại</a></li>


            </ul>
        </div>
    </nav>
    <h2 style="background-color: black; color: white; padding: 10px 20px; margin: 20px 0; border-radius: 5px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <?php echo $makhuyenmai ?> : giảm <?php echo $giam?>% ( Từ <?php echo $ngaybatdau?> đến <?php echo $ngayketthuc?>)</h2>
   
    <div>
    <form action="../BE/searchSanPhamDaKhuyenMai.php?staff=<?php echo $staff ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&link=<?php echo "viewChiTietMaKhuyenMai" ?>" method="post">
        <label >Các sản phẩm đã thêm mã khuyến mại</label>
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

                            <a onclick="return confirm('Xác nhận xóa mã giảm giá cho mặt hàng này?')" href="../BE/deleteMaKhuyenMaiSanPham.php?staff=<?php echo $staff ?>&idsoluong=<?php echo $r_soluong['id'] ?>&makhuyenmai=<?php echo $makhuyenmai ?>&giam=<?php echo $giam ?>&ngaybatdau=<?php echo $ngaybatdau ?>&ngayketthuc=<?php echo $ngayketthuc ?>&key1=<?php echo "" ?>&key2=<?php echo "" ?>&key3=<?php echo "" ?>&link=<?php echo "viewChiTietMaKhuyenMai" ?>" class="btn btn-danger">Xóa</a>

                        </td>
                    </tr>
            <?php
                }
            }

            ?>

        </tbody>
    </table>