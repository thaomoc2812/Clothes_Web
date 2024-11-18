<?php $staff = $_GET['staff'];
include 'header.php';  
$today = date("Y-m-d");
$count_sql = "SELECT COUNT(*) AS row_count FROM lohang WHERE ngaynhaphang = '$today'";
$result = mysqli_query($conn, $count_sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $row_count = $row['row_count'];
}

?>

<div class="container">
    <h1 style="text-align: center;">Quản lý lô hàng</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="addLoHang.php?staff=<?php echo $staff ?>">Thêm lô hàng</a></li>
                <li><a href="viewLoHang.php?staff=<?php echo $staff ?>">Xem danh sách lô hàng</a></li>
                <li class="active"><a href="nhapKho.php?staff=<?php echo $staff ?>">Nhập kho</a></li>


            </ul>
        </div>
    </nav>
    <form action="nhapKhoView.php?staff=<?php echo $staff?>" method="post">
        <div class="form-group">
            <input type="text" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm" id="key" class="form-control" name="key">
            <input type="text" id="staff" name="staff" value ="<?php echo $staff ?>" hidden>
            <button type="submit" class="btn btn-primary">Tìm</button>
        </div>

       
    </form>
    <table class="table table-striped">
        <thead class="thead-style">
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //nhan du lieu tu form
            $key = $_POST['key'];


            //ket noi csdl
            require_once '../../php/connect.php';


            function convertToNonAccent($str) {
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

            while ($r = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $r['masanpham'] ?></td>
                    <td><?php echo $r['tensanpham'] ?></td>
                    <td><a href="nhapKhoSanPham.php?staff=<?php echo $staff?>&sid=<?php echo $r['id'] ?>" class="btn btn-info" onclick="return checkRowCount(<?php echo $row_count; ?>);">Chọn</a>
                       
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>


</div>



<style>
    .thead-style {
        background-color: black;
        color: white;
    }
</style>
</body>
<script type="text/javascript">
function checkRowCount(rowCount) {
    if (rowCount == 0) {
        alert("Cần thêm lô hàng trước khi nhập kho");
        return false; // Prevent the link from being followed
    }
    return true; // Allow the link to be followed
}
</script>
</html>