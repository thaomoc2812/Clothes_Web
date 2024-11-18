<?php

$idsanpham = $_GET['sid'];

require_once '../../../php/connect.php';

$search_sql = "SELECT * FROM sanpham WHERE id = $idsanpham";
$result = mysqli_query($conn, $search_sql);
$r = mysqli_fetch_assoc($result);
$masanpham = $r['masanpham'];
$tensanpham = $r['tensanpham'];
$idthongtinsanpham = $r['idthongtinsanpham'];

$s = "SELECT * FROM thongtinsanpham WHERE id = $idthongtinsanpham";
$rs = mysqli_query($conn, $s);
$rss = mysqli_fetch_assoc($rs);
$iddanhmuc = $rss['iddanhmuc'];

$s_danhmucsanpham = "SELECT * FROM danhmucsanpham WHERE id = $iddanhmuc";
$r_danhmucsanpham = mysqli_query($conn, $s_danhmucsanpham);
$rss_danhmucsanpham = mysqli_fetch_assoc($r_danhmucsanpham);
$tendanhmuc = $rss_danhmucsanpham['tendanhmuc'];
$idphanloai = $rss_danhmucsanpham['idphanloai'];

$s_phanloaisanpham = "SELECT * FROM phanloaisanpham WHERE id = $idphanloai";
$r_phanloaisanpham = mysqli_query($conn, $s_phanloaisanpham);
$rss_phanloaisanpham = mysqli_fetch_assoc($r_phanloaisanpham);
$loaisanpham = $rss_phanloaisanpham['loaisanpham'];

$s_hinhanhsanpham = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
$rs_hinhanhsanpham = mysqli_query($conn, $s_hinhanhsanpham);
$rss_hinhanhsanpham = mysqli_fetch_assoc($rs_hinhanhsanpham);


?>
<?php include 'header.html'; ?>

<div class="container">
    <h1>Danh mục :(<?php echo $loaisanpham ?> ) <?php echo $tendanhmuc ?></h1>
    <h3><?php echo $masanpham ?> : <?php echo $tensanpham ?></h3>
    <p style ="font-size: 18px;"><strong>Mô tả :</strong></p>
     <p style ="font-size: 15px;"><?php echo nl2br($rss['mota']); ?></p>
  <image src="../../../php/uploads/<?php echo $rss_hinhanhsanpham['hinhanhchinh'] ?>" alt="" width="100">
  <image src="../../../php/uploads/<?php echo $rss_hinhanhsanpham['hinhanhphu1'] ?>" alt="" width="100">
  <image src="../../../php/uploads/<?php echo $rss_hinhanhsanpham['hinhanhphu2'] ?>" alt="" width="100">
  <image src="../../../php/uploads/<?php echo $rss_hinhanhsanpham['hinhanhphu3'] ?>" alt="" width="100">

        <table class="table table-striped">
            <thead style="background-color: gray;color: white;">
                <tr>

                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Giá bán ra</th>
                </tr>
            </thead>
            <tbody>

                <?php

                //ket noi csdl
                require_once '../../../php/connect.php';


                $view_soluong = "SELECT * FROM soluong WHERE idsanpham = $idsanpham";

                $result_soluong = mysqli_query($conn, $view_soluong);


                while ($r_soluong = mysqli_fetch_assoc($result_soluong)) {
                ?>

                    <tr>

                        <td><?php echo $r_soluong['mausac'] ?></td>
                        <td><?php echo $r_soluong['kichthuoc'] ?></td>
                        <td><?php echo $r_soluong['soluong'] ?></td>
                        <td><?php echo number_format($r_soluong['giabanra'], 0, '.', '.')?></td>


                    </tr>
                <?php
                }
                ?>

            </tbody>

            </tbody>
        </table>

        <h2>Các lô hàng</h2>
        <table class="table table-striped">
            <thead style="background-color: gray;color: white;">
                <tr>

                    <th>Mã lô hàng</th>
                    <th>Ngày nhập hàng</th>
                    <th>Nhà cung cấp</th>
                    <th>Màu sắc</th>
                    <th>Kích thước</th>
                    <th>Số lượng</th>
                    <th>Còn lại</th>
                    <th>Giá nhập vào</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $view_thongtinlohang = "SELECT * FROM thongtinlohang WHERE masanpham = '$masanpham'";

                $result_thongtinlohang = mysqli_query($conn, $view_thongtinlohang);


                while ($r_thongtinlohang = mysqli_fetch_assoc($result_thongtinlohang)) {

                    $idlohang = $r_thongtinlohang['idlohang'];

                    $view_lohang = "SELECT * FROM lohang WHERE id = $idlohang";
                    $result_lohang = mysqli_query($conn, $view_lohang);
                    $r_lohang = mysqli_fetch_assoc($result_lohang);
                    $idnhacungcap = $r_lohang['idnhacungcap'];

                    $view_nhacungcap = "SELECT * FROM nhacungcap WHERE id = $idnhacungcap";
                    $result_nhacungcap = mysqli_query($conn, $view_nhacungcap);
                    $r_nhacungcap = mysqli_fetch_assoc($result_nhacungcap);
                ?>

                    <tr>
                        <td><?php echo $r_lohang['malohang'] ?></td>
                        <td><?php echo $r_lohang['ngaynhaphang'] ?></td>
                        <td><?php echo $r_nhacungcap['tennhacungcap'] ?></td>
                        <td><?php echo $r_thongtinlohang['mausac'] ?></td>
                        <td><?php echo $r_thongtinlohang['kichthuoc'] ?></td>
                        <td><?php echo $r_thongtinlohang['soluong'] ?></td>
                        <td><?php echo $r_thongtinlohang['conlai'] ?></td>
                        <td><?php echo number_format($r_thongtinlohang['gianhapvao'], 0, '.', '.') ?></td>

                    </tr>
                <?php
                }
                ?>

            </tbody>

            </tbody>
        </table>
        <style>
            .thead-style {
                background-color: black;
                color: white;
            }
        </style>