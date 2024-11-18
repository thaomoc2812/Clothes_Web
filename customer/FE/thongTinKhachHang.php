<?php include 'header.php';
if(isset($_GET['user']))
{
    $user = $_GET['user'];
}

require_once '../../php/connect.php';
$search_khach = "SELECT * FROM khachhang WHERE  sdt = '$user' ";
$result_khach = mysqli_query($conn, $search_khach);
$fetch_khach= mysqli_fetch_assoc($result_khach);
?>
</ul>
</div>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
        <h1 style="color: white;text-align: center;margin-left: 600px;">Thông tin cá nhân</h1>
        
    </nav>
    <main role="main">
        <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
        <div class="container mt-4">
            <form class="needs-validation" name="frmthanhtoan" method="post"
                action="../BE/thongTinKhachHang.php">
               

                <div class="py-5 text-center">
                    <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
                   
                    <p class="lead">Bạn có thể chỉnh sửa thông tin cá nhân bất cứ lúc nào, trừ số điện thoại đã đăng ký.</p>
                </div>

                        <h4 class="mb-3" style="text-align: center;">Thông tin khách hàng</h4>

                        <div class="row">
                            <input type="text" class="form-control" name="user" id="user" value="<?php echo $user ?>" style="display: none;" >
                            <div class="col-md-12">
                                <label for="kh_ten">Họ tên</label>
                                <input type="text" class="form-control" name="hoten" id="hoten" value="<?php echo $fetch_khach['hoten'] ?>" >
                            </div>
                            
                            
                            <div class="col-md-12">
                            <label for="tinh">Chọn Tỉnh/Thành phố: <?php echo $fetch_khach['tinh'] ?></label>
                            <select id="tinh" name="tinh"></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="huyen">Chọn Huyện/Quận: <?php echo $fetch_khach['huyen'] ?></label>
                            <select id="huyen" name="huyen"><?php echo $fetch_khach['huyen'] ?></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="xa">Chọn Xã/Phường: <?php echo $fetch_khach['xa'] ?></label>
                            <select id="xa" name ="xa"><?php echo $fetch_khach['xa'] ?></select><br>
                            </div>
                            <div class="col-md-12">
                            <label for="sonha">Số nhà: <?php echo $fetch_khach['sonha'] ?></label>
                            <input type="text" class="form-control" name="sonha" value="<?php echo $fetch_khach['sonha'] ?>"> <br>
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
                                    value="<?php echo $user?>" readonly="" >
                            </div>
     
                        </div>
                            
                            

                        
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Lưu</button>
                    </div>
                </div>
            </form>

        </div>
        <!-- End block content -->
    </main>

 
    <?php include 'footer.html';?>