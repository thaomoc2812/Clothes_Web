<?php include 'header.html';
$sdt = '';
$iddonhang = 0;
if (isset($_GET['iddonhang'])) {
    $iddonhang = $_GET['iddonhang'];
}
$idkhachhang = 0;
if (isset($_GET['idkhachhang'])) {
    $idkhachhang = $_GET['idkhachhang'];
}
$staff = 0;
if (isset($_GET['staff'])) {
    $staff = $_GET['staff'];
}

$hoten = '';
if (isset($_GET['sdt'])) {
    $sdt = $_GET['sdt'];

    require_once '../../../php/connect.php';

    $search_khachhang = "SELECT * FROM khachhang WHERE  sdt = '$sdt' ";
    $result_khachhang = mysqli_query($conn, $search_khachhang);
    $fetch_khachhang = mysqli_fetch_assoc($result_khachhang);
    $hoten = $fetch_khachhang['hoten'];
}
$add = 0;
if (isset($_GET['add'])) {
    $add = $_GET['add'];
}
$idsanpham = 0;
if (isset($_GET['idsanpham'])) {
    $idsanpham = $_GET['idsanpham'];
}
$check = 0;
if (isset($_GET['check'])) {
    $check = $_GET['check'];
}
?>
<div class="container">
    <h1 style="text-align: center;">Quản lý đơn hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="taoHoaDon.php">Tạo hóa đơn</a></li>
                <li class=""><a href="offline.php">Đơn hàng tại cửa hàng</a></li>


            </ul>
        </div>
    </nav>
    <?php 
    $noti = 0;
    if (isset($_GET['noti'])) {
        $noti = $_GET['noti'];
    };
    if ($noti == 2) { ?><p style="text-align: center;color:red;font-size: large">Số điện thoại không hợp lệ!</p> <?php }
    $noti = 0;
    if (isset($_GET['noti'])) {
        $noti = $_GET['noti'];
    };
    if ($noti == 3) { ?><p style="text-align: center;color:red;font-size: large">Không được để trống số điện thoại hoặc họ tên!</p> <?php } ?>
    <div class="recipient-info">
        <form  action="../../BE/quanLyDonHang/searchKhachHang.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" id="sdt" class="form-control" name="sdt" value="<?php echo $sdt ?>">
            </div>
            <input type="text" id="staff" name="staff" value="<?php echo $staff ?>" hidden>
            <button type="submit" hidden>Lưu</button>
        </form>
        <form action="../../BE/quanLyDonHang/updateKhachHang.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" id="hoten" class="form-control" name="hoten" value="<?php echo $hoten ?>">
            </div>
            <input type="text" id="staff" name="staff" value="<?php echo $staff ?>" hidden>
            <input type="text" id="sdt" name="sdt" value="<?php echo $sdt ?>" hidden>
            <input type="text" id="idkhachhang" name="idkhachhang" value="<?php echo $idkhachhang ?>" hidden>
            <button type="submit" hidden>Lưu</button>
        </form>




    </div>


    <?php
    $noti = 0;
    if (isset($_GET['noti'])) {
        $noti = $_GET['noti'];
    };
    if ($noti == 1) { ?><p style="text-align: center;color:red;font-size: large"> Ấn enter cho mỗi lần nhập!</p> <?php } ?>
    <?php
    $sum = 0;
    if ($iddonhang != 0) {

        $search_donhang = "SELECT * FROM donhang WHERE  id = $iddonhang ";
        $result_donhang = mysqli_query($conn, $search_donhang);
        $fetch_donhang = mysqli_fetch_assoc($result_donhang);
        $search_ttdonhang = "SELECT * FROM thongtindonhang WHERE  iddonhang = $iddonhang ";
        $result_ttdonhang = mysqli_query($conn, $search_ttdonhang);
    ?>



        <div class="row">
            <div class="col col-md-12">
                <h2 style="display: flex;justify-content: center;">Các sản phẩm đã chọn</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh đại diện</th>
                            <th>Tên sản phẩm</th>
                            <th>Kích thước</th>
                            <th>Màu sắc</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>

                        </tr>
                    </thead>
                    <tbody id="datarow">
                        <?php

                        $count_sp = 0;

                        while ($fetch_ttdonhang = mysqli_fetch_assoc($result_ttdonhang)) {
                            $count_sp++;

                            $idsanpham = $fetch_ttdonhang['idsanpham'];

                            $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                            $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                            $fetch_hinhanh = mysqli_fetch_assoc($result_hinhanh);

                            $search_sp = "SELECT * FROM sanpham WHERE  id = $idsanpham ";
                            $result_sp = mysqli_query($conn, $search_sp);
                            $fetch_sp = mysqli_fetch_assoc($result_sp);
                        ?>
                            <?php if ($count_sp != 0) { ?>
                                <tr>

                                    <td><?php echo $count_sp ?></td>
                                    <td>
                                        <a href="../quanLyKhoHang/viewChiTietSanPham.php?sid=<?php echo $idsanpham ?>"> <img src="../../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh'] ?>" class="hinhdaidien" width="100"></a>
                                    </td>
                                    <td><?php echo $fetch_sp['tensanpham'] ?></td>
                                    <td><?php echo $fetch_ttdonhang['kichthuoc'] ?></td>
                                    <td><?php echo $fetch_ttdonhang['mausac'] ?></td>
                                    <td><?php echo $fetch_ttdonhang['soluong'] ?></td>
                                    <td><?php echo number_format($fetch_ttdonhang['gia'], 0, '.', '.') ?></td>
                                    <?php $thanhTien = $fetch_ttdonhang['soluong'] * $fetch_ttdonhang['gia'] ?>
                                    <td><?php echo number_format($thanhTien, 0, '.', '.');
                                        $sum = $sum + $thanhTien;
                                        ?></td>
                                    <td><a href="../../BE/quanLyDonHang/deleteSanPhamTuHoaDon.php?staff=<?php echo $staff ?>&idkhachhang=<?php echo $idkhachhang ?>&sdt=<?php echo $sdt ?>&idsanpham=<?php echo $idsanpham ?>&iddonhang=<?php echo $iddonhang ?>&idttdonhang=<?php echo $fetch_ttdonhang['id'] ?>" class="btn btn-danger" style="color: white;">Xóa</a></td>



                                </tr>

                            <?php
                            } ?>
                        <?php } ?>
                        <tr>
                            <td>Thanh toán</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                if ($fetch_donhang['giatridonhang'] != 0) {
                                    echo number_format($fetch_donhang['giatridonhang'], 0, '.', '.');
                                } else {
                                    echo number_format($sum, 0, '.', '.');
                                }

                                ?></td>

                        </tr>



                    </tbody>
                </table>


            </div>
        <?php } ?>
        <form action="../../BE/quanLyDonHang/updateDonHang.php" method="post" enctype="multipart/form-data">
            <input type="text" id="staff" name="staff" value="<?php echo $staff ?>" hidden>
            <input type="text" id="iddonhang" name="iddonhang" value="<?php echo $iddonhang ?>" hidden>
            <input type="text" id="giatridonhang" name="giatridonhang" value="<?php echo $sum ?>" hidden>
            <div style=" display: center;text-align: center;">
                <button type="submit">Lưu</button>
                <a href="../../BE/quanLyDonHang/deleteDonHang.php?iddonhang=<?php echo $iddonhang ?>" class="btn btn-danger" style="color: white;">Hủy</a>
            </div>
        </form>
        <br><br><br><br><br>
        <?php if ($sdt != '' && $iddonhang != 0) { ?>
            <div class="container">


                <table class="table table-striped">
                    <thead class="thead-style">
                        <tr>

                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh chính</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php

                        //ket noi csdl
                        require_once '../../../php/connect.php';


                        $view_sql1 = "SELECT * FROM sanpham";

                        $result1 = mysqli_query($conn, $view_sql1);


                        while ($r1 = mysqli_fetch_assoc($result1)) {
                        ?>

                            <tr>

                                <td><?php echo $r1['masanpham'] ?></td>
                                <td><?php echo $r1['tensanpham'] ?></td>
                                <td><?php
                                    $idsanpham = $r1['id'];
                                    $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
                                    $result2 = mysqli_query($conn, $search_sql2);
                                    if ($r2 = mysqli_fetch_assoc($result2))
                                    ?><image src="../../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
                                </td>

                                <td><?php
                                    $view_sl = "SELECT * FROM soluong WHERE idsanpham = $idsanpham ";

                                    $result_sl = mysqli_query($conn, $view_sl);

                                    // Khởi tạo biến tổng doanh thu
                                    $total = 0;

                                    while ($r_sl = mysqli_fetch_assoc($result_sl)) {

                                        $total += $r_sl['soluong'];
                                    }
                                    echo $total;
                                    ?></td>
                                <td><a href="../quanLyKhoHang/viewChiTietSanPham.php?sid=<?php echo $r1['id'] ?>">Chi tiết</a></br>
                                    <a href="../../BE/quanLyDonHang/addSanPhamVaoHoaDon.php?staff=<?php echo $staff ?>&idkhachhang=<?php echo $idkhachhang ?>&sdt=<?php echo $sdt ?>&iddonhang=<?php echo $iddonhang ?>&idsanpham=<?php echo $r1['id'] ?>" class="btn btn-info">Thêm</a>



                                </td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>


            </div>
            </main>

            </body>
            <style>
                .list-group-item {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                }

                .list-group-item a {
                    color: black;
                    flex: 1;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                }

                .recipient-info {
                    background-color: #f8f9fa;
                    /* Màu nền */
                    border: 1px solid #ced4da;
                    /* Đường viền */
                    padding: 20px;
                    /* Khoảng cách giữa nội dung và đường viền */
                    border-radius: 5px;
                    /* Bo góc */
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    /* Hiệu ứng bóng đổ */
                }

                .recipient-info h2 {
                    color: #007bff;
                    /* Màu văn bản */
                    font-size: 24px;
                    /* Kích thước chữ */
                    margin-bottom: 10px;
                    /* Khoảng cách giữa tiêu đề và nội dung */
                }

                .recipient-info p {
                    margin-bottom: 5px;
                    /* Khoảng cách giữa các dòng */
                }
            </style>

        </div>


        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <div style="text-align: center;">
                    <h2>Thông tin sản phẩm</h2>

                    &nbsp;&nbsp;&nbsp;
                    <form action="../../BE/quanLyDonHang/addSanPhamVaoHoaDonThanhCong.php" method="post" enctype="multipart/form-data">
                        <?php
                        if (isset($_GET['idsanpham'])) {
                            $idsanpham = $_GET['idsanpham'];
                        }
                        if (isset($_GET['check'])) {
                            $check = $_GET['check'];
                        }
                        $view_ha = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";

                        $result_ha = mysqli_query($conn, $view_ha);
                        $r_ha = mysqli_fetch_assoc($result_ha);
                        $view_sp = "SELECT * FROM sanpham WHERE id = $idsanpham";

                        $result_sp = mysqli_query($conn, $view_sp);
                        $r_sp = mysqli_fetch_assoc($result_sp);
                        ?>


                        <img src="../../../php/uploads/<?php echo $r_ha['hinhanhchinh'] ?>" width="100">
                        <?php if ($r_ha['hinhanhphu1'] != null) { ?><img src="../../../php/uploads/<?php echo $r_ha['hinhanhphu1'] ?>" width="100"> <?php } ?>
                        <?php if ($r_ha['hinhanhphu2'] != null) { ?><img src="../../../php/uploads/<?php echo $r_ha['hinhanhphu2'] ?>" width="100"> <?php } ?>
                        <?php if ($r_ha['hinhanhphu3'] != null) { ?><img src="../../../php/uploads/<?php echo $r_ha['hinhanhphu3'] ?>" width="100"> <?php } ?>


                </div>
                &nbsp;&nbsp;&nbsp;
                <p><strong>Tên sản phẩm:</strong> <?php echo $r_sp['tensanpham'] ?></p>
                <div class="form-group">
                    <input type="text" id="staff" name="staff" value="<?php echo $staff ?>" hidden>
                    <input type="text" id="sdt" name="sdt" value="<?php echo $sdt ?>" hidden>
                    <input type="text" id="idkhachhang" name="idkhachhang" value="<?php echo $idkhachhang ?>" hidden>
                    <input type="text" id="iddonhang" name="iddonhang" value="<?php echo $iddonhang ?>" hidden>
                    <input type="text" id="idsanpham" name="idsanpham" value="<?php echo $idsanpham ?>" hidden>
                    <input type="text" id="masanpham" name="masanpham" value="<?php echo $r_sp['masanpham'] ?>" hidden>
                    <?php if ($check == 2) { ?>
                        <p style="text-align: center;color:red">Sản phẩm không còn đủ số lượng để đáp ứng!</p>
                    <?php } ?>
                    <?php if ($check == 1) { ?>
                        <p style="text-align: center;color:red">Nhập sai kích thước hoặc màu sắc!</p>
                    <?php } ?>
                    <?php if ($check == 3) { ?>
                        <p style="text-align: center;color:red">Nhập đầy đủ màu sắc, kích thước, số lượng!</p>
                    <?php } ?>
                    <?php if ($check == 4) { ?>
                        <p style="text-align: center;color:red">Nhập sai mã lô hàng!</p>
                    <?php } ?>
                    <?php if ($check == 5) { ?>
                        <p style="text-align: center;color:red">Lô hàng vừa nhập đã hết sản phẩm này. Chọn mã lô hàng khác!</p>
                    <?php } ?>
                    <p><strong>Kích thước:</strong> <input type="text" id="kichthuoc" class="form-control" name="kichthuoc"> </p>
                    <p><strong>Màu sắc:</strong> <input type="text" id="mausac" class="form-control" name="mausac"> </p>
                    <p><strong>Số lượng:</strong> <input type="text" id="soluong" class="form-control" name="soluong"></p>
                    <p><strong>Mã lô hàng:</strong> <input type="text" id="malohang" class="form-control" name="malohang"></p>
                    <div style="text-align: center;">

                        <button type="submit">Thêm</button>
                        <a onclick="closePopup()" class="btn btn-danger" style="color: white;">Hủy</a>
                    </div>
                    </form>

                </div>
            </div>
        <?php } ?>
        <style>
            .popup {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .popup-content {
                background-color: #fff;
                padding: 50px;
                border-radius: 50px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
                /* Đổ bóng */
            }

            .close {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 24px;
                color: #555;
                cursor: pointer;
                transition: color 0.3s;
            }

            .close:hover {
                color: #000;
            }

            button {
                padding: 10px 20px;
                margin-top: 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;

            }

            button:hover {
                background-color: #0056b3;
            }
        </style>
        <script>
            function openPopup() {
                document.getElementById("popup").style.display = "block";
            }

            function closePopup() {
                document.getElementById("popup").style.display = "none";
            }
        </script>
        <?php
        if ($add == 1) {
        ?>
            <script>
                openPopup();
            </script>


        <?php } ?>

        </body>

        </html>