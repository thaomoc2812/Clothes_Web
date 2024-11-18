<?php 
$staff ="";
if (isset($_GET['staff']))
{
    $staff = $_GET['staff'];
}
$noti = 0;
if (isset($_GET['noti'])) {
  $noti = $_GET['noti'];
};
include 'header.php';
require_once '../../php/connect.php';
?>


<div class="container">
    <h1 style="text-align: center;">Nhập mã sản phầm</h1>
    <form action="deleteEditSanPham.php?staff=<?php echo $staff?>" method="post">
        <div class="form-group">
            <input type="text" placeholder="Nhập mã sản phẩm" id="key" class="form-control" name="key">
        </div>
        <input type="text"id ="staff" name="staff" value="<?php echo $staff?>" hidden>
        <button type="submit" class="btn btn-primary">Tìm</button>
    </form>
    <?php if($noti == 1) {?><p style="text-align: center;color:red;font-size: large">Sản phẩm này đã từng được nhập kho. Không thể xóa!</p> <?php } ?>
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
            //nhan du lieu tu form
            $key = "";
            if (isset($_POST['key']))
            {
                $key = $_POST['key'];
            }
            

            function convertToNonAccent($str)
            {
                $str = iconv('UTF-8', 'ASCII//IGNORE', $str);
                $str = preg_replace('/[^a-zA-Z0-9]/', '', $str); // Loại bỏ các ký tự không phải chữ cái hoặc số
                return $str;
            }

            // Sử dụng hàm

            $chuoiKhongDau = convertToNonAccent($key);


            $search_sql = "SELECT * FROM sanpham WHERE 
                        (tensanpham LIKE '%$chuoiKhongDau%')
                        OR (masanpham LIKE '%$chuoiKhongDau%')
                        ";



            $result = mysqli_query($conn, $search_sql);

            while ($r1 = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $r1['masanpham'] ?></td>
                    <td><?php echo $r1['tensanpham'] ?></td>
                    <td><?php
                        $idsanpham = $r1['id'];
                        $search_sql2 = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham";
                        $result2 = mysqli_query($conn, $search_sql2);
                        if ($r2 = mysqli_fetch_assoc($result2))
                        ?><image src="../../php/uploads/<?php echo $r2['hinhanhchinh'] ?>" alt="" width="100">
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
                    <td><a href="viewChiTietSanPham.php?staff=<?php echo $staff?>&sid=<?php echo $r1['id'] ?>">Chi tiết</a><br>
                        <a href="editSanPham.php?staff=<?php echo $staff?>&sid=<?php echo $r1['id'] ?>" class="btn btn-info">Sửa</a>
                         <a onclick="return confirm('Sản phẩm này chỉ có thể xóa khi chưa nhập kho?')" href="../BE/deleteSanPham.php?staff=<?php echo $staff ?>&sid=<?php echo $r1['id'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>

    </body>

    </html>