<?php include 'header.php';
if(isset($_GET['user']))
{
    $user = $_GET['user'];
}
if(isset($_GET['count']))
{
    $count_cart = $_GET['count'];
}
?>
</ul>
</div>

<body>
    <!-- header -->
  <!-- header -->
  <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <h1 style="color: white;text-align: center;margin-left: 700px;">Thanh toán</h1>
        
    </nav>
    <!-- end header -->

    <!-- end header -->

    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post" action="../BE/thanhToan.php">
                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                   
                    <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p><br>
                    <p class="lead">Hình thức chuyển khoản qua: 124578963 MB bank.</p>
                </div>

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Giỏ hàng</span>
                            <span class="badge badge-secondary badge-pill"><?php echo $count_cart?></span>
                        </h4>
                        <ul class="list-group mb-3">
                          
                            <?php
                            require_once '../../php/connect.php';
                            $search_khach = "SELECT * FROM khachhang WHERE  sdt = '$user' ";
                            $result_khach = mysqli_query($conn, $search_khach);
                            $fetch_khach= mysqli_fetch_assoc($result_khach);
                            $idkhachhang = $fetch_khach['id'];

                            $search_giohang = "SELECT * FROM giohang WHERE  idkhachhang = $idkhachhang ";
                            $result_giohang = mysqli_query($conn, $search_giohang);
                            $count_pay = 0;
                            while($fetch_giohang= mysqli_fetch_assoc($result_giohang))
                            {

                                $idsanpham = $fetch_giohang['idsanpham'];
                                $search_hinhanh = "SELECT * FROM hinhanhsanpham WHERE  idsanpham = $idsanpham ";
                                $result_hinhanh = mysqli_query($conn, $search_hinhanh);
                                $fetch_hinhanh= mysqli_fetch_assoc($result_hinhanh);

                                $search_sp = "SELECT * FROM sanpham WHERE  id = $idsanpham ";
                                $result_sp = mysqli_query($conn, $search_sp);
                                $fetch_sp= mysqli_fetch_assoc($result_sp);

                                $size = $fetch_giohang['kichthuoc'];
                                $color = $fetch_giohang['mausac'];
                                $soluong = $fetch_giohang['soluong'];

                                $search_sl = "SELECT * FROM soluong WHERE  idsanpham = $idsanpham AND kichthuoc = '$size' AND mausac = '$color'  ";
                                $result_sl = mysqli_query($conn, $search_sl);
                                $fetch_sl= mysqli_fetch_assoc($result_sl);
                                $idsoluong = $fetch_sl['id'];
                                $gia = 0;
                                $now = date('Y-m-d');
                                $search_ttkm = "SELECT * FROM thongtinkhuyenmai WHERE ngaybatdau <= '$now' AND ngayketthuc >= '$now'";
                                $check_km = 0;
                               if($result_ttkm = mysqli_query($conn, $search_ttkm))
                                {
                                while($fetch_ttkm = mysqli_fetch_assoc($result_ttkm))
                                {
                               $makhuyenmai = $fetch_ttkm['makhuyenmai'];
                                $search_km = "SELECT * FROM khuyenmai WHERE makhuyenmai = '$makhuyenmai' AND idsoluong = $idsoluong";
                                if($result_km = mysqli_query($conn, $search_km))
                                {
                                    if($fetch_km = mysqli_fetch_assoc($result_km))
                                    {
                                        $check_km = 1;
                                        $giathat = $fetch_sl['giabanra'] *(100-$fetch_ttkm['giam'])/100;
                                    $gia = $giathat;
                                    }
                                
                                }
                                }
                                }
                                if($check_km == 0){$gia = $fetch_sl['giabanra'];}
                                $tongTien = $gia * $soluong;
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0"><?php echo $fetch_sp['tensanpham']?></h6>
                                    <small class="text-muted"><?php echo number_format( $gia, 0, '.', '.')?> x <?php echo $soluong ?></small>
                                </div>
                                <span class="text-muted"><?php echo number_format( $tongTien, 0, '.', '.') ?></span>
                            </li>
                            
                            <?php 
                            $count_pay = $count_pay + $tongTien;
                            }
                            ?>
                            <input type="text" class="form-control" name="giatridonhang" id="giatridonhang" value="<?php echo $count_pay ?>" style="display: none;" >
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Phí ship</h6>
                                </div>
                                <span class="text-muted" id="ship"></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong id="count_pay"style="display: none;"><?php echo $count_pay?></strong>
                                <strong id="pay"></strong>
                            </li>
                        </ul>


                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin khách hàng</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="hoten">Họ tên</label>
                                <input type="text" class="form-control" name="hoten" id="hoten" value="<?php echo $fetch_khach['hoten']?>" >
                            </div>
                            
                            <input type="text" class="form-control" name="idship" id="idship" value="" style="display: none;" >

                            <input type="text" class="form-control" name="user" id="user" value="<?php echo $user ?>" style="display: none;" >

                            <div class="col-md-12">
                            <label for="tinh">Chọn Tỉnh/Thành phố:</label>
                            <select id="tinh" name="tinh"></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="huyen">Chọn Huyện/Quận:</label>
                            <select id="huyen" name="huyen"></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="xa">Chọn Xã/Phường:</label>
                            <select id="xa" name ="xa"></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="sonha">Số nhà:</label>
                            <input type="text" class="form-control" name="sonha"> <br>
                            </div>
                            <script>
                            var selectTinh = document.getElementById("tinh");
                            var selectHuyen = document.getElementById("huyen");
                            var selectXa = document.getElementById("xa");

                            // Tải dữ liệu từ tệp tin JSON
                            fetch('../../json/tinh_tp.json')
                            .then(response => response.json())
                            .then(data => {
                                // Lặp qua mỗi đối tượng trong JSON và tạo option cho select tỉnh
                                Object.keys(data).forEach(function(key) {
                                var option = document.createElement("option");
                                option.value = key;
                                option.text = data[key].name_with_type;
                                selectTinh.add(option);
                                });
                            });
                            // Khi tỉnh được chọn, cập nhật select huyện
                            var shipCost = 50000;
                            selectTinh.addEventListener("change", function() {
                            var selectedTinh = selectTinh.value;
                            console.log("Tinh: " + selectedTinh); 
                            if (selectedTinh === '01') { // Mã của Thành phố Hà Nội
                                    shipCost = 30000;
                                }
                                else shipCost = 50000;
                            selectHuyen.innerHTML = ''; // Xóa các option cũ
                            fetch('../../json/quan_huyen.json')
                                .then(response => response.json())
                                .then(data => {
                                Object.keys(data).forEach(function(key) {
                                    if (data[key].parent_code === selectedTinh) {
                                    var option = document.createElement("option");
                                    option.value = key;
                                    option.text = data[key].name_with_type;
                                    selectHuyen.add(option);
                                    }
                                });
                                });

                                console.log("Giá ship: " + shipCost); // Kiểm tra giá trị shipCost đã được cập nhật chính xác chưa
                                var shipElement = document.getElementById("ship");
                                var payElement = document.getElementById("pay");
                                var count_payElement = document.getElementById("count_pay");
                                var idshipElement = document.getElementById("idship");
                                
                                var count_payValue = parseFloat(count_payElement.textContent);
                                console.log("Pay: " + count_payValue);

                                if (shipElement) {
                                    var tong = shipCost + count_payValue;
                                    shipElement.textContent = shipCost.toLocaleString();
                                    payElement.textContent = tong.toLocaleString(); 
                                    idshipElement.value = shipCost;
                                } else {
                                    console.error("Không tìm thấy phần tử hiển thị giá ship");
}
                            });
                            // Khi huyện được chọn, cập nhật select xã
                            selectHuyen.addEventListener("change", function() {
                            var selectedHuyen = selectHuyen.value;
                            selectXa.innerHTML = ''; // Xóa các option cũ
                            fetch('../../json/xa_phuong.json')
                                .then(response => response.json())
                                .then(data => {
                                Object.keys(data).forEach(function(key) {
                                    if (data[key].parent_code === selectedHuyen) {
                                    var option = document.createElement("option");
                                    option.value = key;
                                    option.text = data[key].name_with_type;
                                    selectXa.add(option);
                                    }
                                });
                                });
                            });


      
    </script>
                            <div class="col-md-12">
                                <label for="kh_dienthoai">Điện thoại</label>
                                <input type="text" class="form-control" name="sdt" id="sdt"
                                    value="<?php echo $user?>" >
                            </div>
                           
                            
     
                        </div>

                        <h4 class="mb-3">Hình thức thanh toán</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="2">
                                <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                                    value="3">
                                <label class="custom-control-label" for="httt-3">Ship COD</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                            hàng</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>

 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popperjs/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom script - Các file js do mình tự viết -->
    <script src="../assets/js/app.js"></script>

</body>

</html>
<?php include 'footer.html';?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form[name="frmthanhtoan"]');
    form.addEventListener('submit', function(event) {
        var hoten = document.getElementById('hoten').value.trim();
        var sdt = document.getElementById('sdt').value.trim();
        var tinh = document.getElementById('tinh').value.trim();
        var huyen = document.getElementById('huyen').value.trim();
        var xa = document.getElementById('xa').value.trim();

        // Kiểm tra xem các trường dữ liệu yêu cầu có trống không
        if (hoten === '' || sdt === '' || tinh === '' || huyen === '' || xa === '') {
            event.preventDefault(); // Ngăn chặn mặc định của biểu mẫu
            alert('Vui lòng điền đầy đủ thông tin.');
        } else if (!/^\d{10}$/.test(sdt)) {
            event.preventDefault(); // Ngăn chặn mặc định của biểu mẫu
            alert('Số điện thoại không hợp l.');
        }
    });
});
</script>