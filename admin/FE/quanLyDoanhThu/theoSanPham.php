<?php include 'header.html'; ?>
<div class="container">
    <h1 style="text-align: center;">Quản lý doanh thu</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="theoThoiGian.php">Theo thời gian</a></li>
                <li class="active"><a href="theoSanPham.php">Theo sản phẩm</a></li>
                <li><a href="theoKhachHang.php">Theo khách hàng</a></li>
            </ul>
        </div>
    </nav>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Lợi nhuận và Doanh số theo Danh mục và Sản phẩm</title>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="form-group">
            <label for="danhmuc">Chọn danh mục:</label>
            <select id="danhmuc" name="danhmuc" onchange="reloadPage()">
                <?php
                // Kết nối cơ sở dữ liệu
                require_once '../../../php/connect.php';

                $view_sql1 = "SELECT * FROM danhmucsanpham";
                $result1 = mysqli_query($conn, $view_sql1);
                while ($r1 = mysqli_fetch_assoc($result1)) {
                    $selected = (isset($_GET['danhmuc']) && $_GET['danhmuc'] == $r1['tendanhmuc']) ? 'selected' : '';
                    echo '<option ' . $selected . '>' . $r1['tendanhmuc'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div id="chart-container">
            <canvas id="revenueChart"></canvas>
        </div>
        <div id="table-container">
            <!-- Bảng thống kê sẽ được tạo bằng JavaScript -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function reloadPage() {
            const selectedDanhMuc = document.getElementById('danhmuc').value;
            window.location.href = `theoSanPham.php?danhmuc=${selectedDanhMuc}`;
        }

        $(document).ready(function() {
            // Hàm gửi yêu cầu Ajax để lấy dữ liệu từ file PHP
            function fetchData(danhmuc) {
                $.ajax({
                    url: '../../BE/quanLyDoanhThu/get_thongtindonhang_by_danhmuc.php',
                    type: 'GET',
                    data: { danhmuc: danhmuc },
                    success: function(data) {
                        console.log('Data received from server:', data); // In ra dữ liệu nhận được từ server
                        renderChart(data);
                        renderTable(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            function tinhTongTienLaiVaTongSoLuongTheoSanPham(thongtindonhang) {
                const tongTienLaiTheoSanPham = {};
                const tongSoLuongTheoSanPham = {};

                thongtindonhang.forEach(don => {
                    if (!don.masanpham) {
                        console.error(`Invalid id format for product ID: ${don.masanpham}`);
                        return;
                    }

                    const sanpham = don.masanpham;

                    // Kiểm tra và chuyển đổi tienlai sang số
                    const tienlai = parseFloat(don.tienlai);
                    const soluong = parseFloat(don.soluong);
                    if (isNaN(tienlai)) {
                        console.error(`Invalid tienlai value for product ID: ${don.masanpham}`);
                        return;
                    }
                    if (isNaN(soluong)) {
                        console.error(`Invalid soluong value for product ID: ${don.masanpham}`);
                        return;
                    }

                    if (!tongTienLaiTheoSanPham[sanpham]) {
                        tongTienLaiTheoSanPham[sanpham] = 0;
                    }
                    if (!tongSoLuongTheoSanPham[sanpham]) {
                        tongSoLuongTheoSanPham[sanpham] = 0;
                    }

                    tongTienLaiTheoSanPham[sanpham] += tienlai;
                    tongSoLuongTheoSanPham[sanpham] += soluong;
                });

                console.log('Tổng tiền lãi theo sản phẩm:', tongTienLaiTheoSanPham); // Kiểm tra kết quả tính toán
                console.log('Tổng số lượng bán được theo sản phẩm:', tongSoLuongTheoSanPham); // Kiểm tra kết quả tính toán
                return { tongTienLaiTheoSanPham, tongSoLuongTheoSanPham };
            }

            function renderChart(data) {
                const thongtindonhang = data;
                if (thongtindonhang.length === 0) {
                    console.error('No data available for rendering the chart.');
                    return;
                }
                const { tongTienLaiTheoSanPham, tongSoLuongTheoSanPham } = tinhTongTienLaiVaTongSoLuongTheoSanPham(thongtindonhang);
                const labels = Object.keys(tongTienLaiTheoSanPham);
                const dataTienLai = Object.values(tongTienLaiTheoSanPham);
                const dataSoLuong = Object.values(tongSoLuongTheoSanPham);

                console.log('Labels:', labels); // Kiểm tra labels cho biểu đồ
                console.log('Data Tien Lai:', dataTienLai); // Kiểm tra data cho biểu đồ
                console.log('Data So Luong:', dataSoLuong); // Kiểm tra data cho biểu đồ

                const ctx = document.getElementById('revenueChart').getContext('2d');
                const revenueChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Lợi nhuận',
                                data: dataTienLai,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.1,
                                yAxisID: 'y'
                            },
                            {
                                label: 'Doanh số',
                                data: dataSoLuong,
                                borderColor: 'rgba(153, 102, 255, 1)',
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.1,
                                yAxisID: 'y1'
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Tổng hợp Lợi nhuận và Doanh số theo Sản Phẩm'
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Sản phẩm'
                                }
                            },
                            y: {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                title: {
                                    display: true,
                                    text: 'Lợi nhuận (VND)'
                                },
                                beginAtZero: true
                            },
                            y1: {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                title: {
                                    display: true,
                                    text: 'Doanh số (sp)'
                                },
                                beginAtZero: true,
                                grid: {
                                    drawOnChartArea: false // Chỉ vẽ grid lines của trục chính
                                }
                            }
                        }
                    }
                });
            }

            function renderTable(data) {
                var tableContent = '<table class="table table-striped"><thead><tr><th>Mã sản phẩm</th><th>Lợi nhuận (VND)</th><th>Doanh số (sp)</th></tr></thead><tbody>';

                // Duyệt qua mỗi phần tử trong dữ liệu và thêm vào bảng
                data.forEach(function(item) {
                    tableContent += '<tr>';
                    tableContent += '<td>' + item.masanpham + '</td>';
                    var formattedTienlai = parseFloat(item.tienlai).toLocaleString('vi-VN');
                    tableContent += '<td>' + formattedTienlai + '</td>';
                    tableContent += '<td>' + item.soluong + '</td>';
                    tableContent += '</tr>';
                });

                tableContent += '</tbody></table>';

                // Gán nội dung của bảng vào container
                $('#table-container').html(tableContent);
            }

            // Khi tải trang, lấy dữ liệu cho danh mục được chọn
            const urlParams = new URLSearchParams(window.location.search);
            const selectedDanhMuc = urlParams.get('danhmuc');
            if (selectedDanhMuc) {
                fetchData(selectedDanhMuc);
            }
        });
    </script>
</body>
</html>
