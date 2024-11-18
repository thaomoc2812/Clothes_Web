<?php include 'header.html';
$iddonhang = $_GET['sid'];
$staff = 0;
if (isset($_GET['staff'])) {
    $staff = $_GET['staff'];
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
                <li><a href="choXacNhan.php">Chờ xác nhận</a></li>
                <li class="active"><a href="dangChuanBi.php">Đang chuẩn bị</a></li>
                <li><a href="daSoanDon.php">Đã soạn đơn</a></li>
                <li><a href="dangVanChuyen.php">Đang vận chuyển</a></li>

                <li><a href="giaoThanhCong.php">Giao hàng thành công</a></li>
                <li><a href="daHuy.php">Đã hủy</a></li>

            </ul>
        </div>
    </nav>
    <?php
    if ($check == 3) {
    ?>
        <p style="text-align: center;color:red; font-size: large;">Mã lô hàng không đúng!</p>
    <?php } ?>
    <?php
    if ($check == 1) {
    ?>
        <p style="text-align: center;color:red; font-size: large;">Mã lô hàng không đúng!</p>
    <?php } ?>
    <?php
    if ($check == 2) {
    ?>
        <p style="text-align: center;color:red">Lô hàng này đã hết sản phẩm tương ứng!</p>
    <?php } ?>
    <?php
    require_once '../../../php/connect.php';


    $search_donhang = "SELECT * FROM donhang WHERE  id = $iddonhang ";
    $result_donhang = mysqli_query($conn, $search_donhang);
    $fetch_donhang = mysqli_fetch_assoc($result_donhang);

    $search_ttdonhang = "SELECT * FROM thongtindonhang WHERE  iddonhang = $iddonhang ";
    $result_ttdonhang = mysqli_query($conn, $search_ttdonhang);
    ?>

    <div class="recipient-info">
        <h2>Mã đơn hàng: <strong><?php echo $fetch_donhang['madonhang'] ?></strong></h2>

    </div>
   

    <div class="row">
        <div class="col col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh đại diện</th>
                        <th>Tên sản phẩm</th>
                        <th>Kích thước</th>
                        <th>Màu sắc</th>
                        <th>Số lượng</th>
                        <th>Mã lô hàng</th>
                    </tr>
                </thead>
                <tbody id="datarow">
                    <?php

                    $count_sp = 0;
                    while ($fetch_ttdonhang = mysqli_fetch_assoc($result_ttdonhang)) {
                        $count_sp++;
                        $idsanpham = $fetch_ttdonhang['idsanpham'];
                        $idttdonhang = $fetch_ttdonhang['id'];

                        $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                        $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                        $fetch_hinhanh = mysqli_fetch_assoc($result_hinhanh);

                        $search_sp = "SELECT * FROM sanpham WHERE  id = $idsanpham ";
                        $result_sp = mysqli_query($conn, $search_sp);
                        $fetch_sp = mysqli_fetch_assoc($result_sp);
                        $masanpham = $fetch_sp['masanpham'];
                    ?>
                        <tr>

                            <td><?php echo $count_sp ?></td>
                            <td>
                                <a href="../quanLyKhoHang/viewChiTietSanPham.php?sid=<?php echo $idsanpham ?>"> <img src="../../../php/uploads/<?php echo $fetch_hinhanh['hinhanhchinh'] ?>" class="hinhdaidien" width="100"></a>
                            </td>
                            <td><?php echo $fetch_sp['tensanpham'] ?></td>
                            <td><?php
                                $size = $fetch_ttdonhang['kichthuoc'];
                                echo $fetch_ttdonhang['kichthuoc'] ?></td>
                            <td><?php
                                $color = $fetch_ttdonhang['mausac'];
                                echo $fetch_ttdonhang['mausac'] ?></td>
                            <td><?php echo $fetch_ttdonhang['soluong'] ?></td>
                            <form action="../../BE/quanLyDonHang/soanDon.php" method="post" enctype="multipart/form-data" onsubmit="return checkMaLoHang()">
                                <input id="idttdonhang" name="idttdonhang" value="<?php echo $idttdonhang ?>" hidden>
                                <input id="iddonhang" name="iddonhang" value="<?php echo $iddonhang ?>" hidden>
                                <td>
                                    <input type="text" id="malohang" class="form-control" name="malohang" value="<?php echo $fetch_ttdonhang['malohang'] ?>">
                                </td>
                                <button type="submit" hidden>Lưu</button>
                            </form>
                        </tr>

                    <?php
                    } ?>



                </tbody>
            </table>
            <a style="float: right;" href="../../BE/quanLyDonHang/huySoanDon.php?sid=<?php echo $iddonhang ?>" class="btn btn-danger">Hủy soạn đơn</a></td>
            <a style="float: right;" href="../../BE/quanLyDonHang/daSoanDon.php?sid=<?php echo $iddonhang ?>" class="btn btn-info">Xong đơn</a>

        </div>

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
    <script>
    function checkMaLoHang() {
        var malohang = document.getElementById("malohang").value;

        if (malohang === "") {
            alert("Vui lòng điền mã lô hàng!");
            return false;
        }

        var regex = /^[a-zA-Z0-9]+$/;
        if (!regex.test(malohang)) {
            alert("Mã lô hàng chỉ gồm chữ cái không dấu và chữ số!");
            return false;
        }

        return true;
    }
</script>

</div>



</body>

</html>