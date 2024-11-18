<?php include 'header.html'; ?>
<div class="container">
    <h1 style="text-align: center;">Quản lý doanh thu</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="theoThoiGian.php">Theo thời gian</a></li>
                <li><a href="theoSanPham.php">Theo sản phẩm</a></li>
                <li><a href="theoKhachHang.php">Theo khách hàng</a></li>
            </ul>
        </div>
    </nav>
</div>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Doanh thu và Doanh số theo Tháng</title>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
        }
        #data-table {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            border-collapse: collapse;
        }
        #data-table th, #data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        #data-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id="chart-container">
        <canvas id="revenueChart"></canvas>
    </div>

    <table id="data-table">
        <thead>
            <tr>
                <th>Tháng</th>
                <th>Lợi nhuận (VND)</th>
                <th>Doanh thu (VND)</th>
            </tr>
        </thead>
        <tbody>
            <!-- Nội dung bảng sẽ được thêm động qua JavaScript -->
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function fetchDonhangData() {
            const response = await fetch('../../BE/quanLyDoanhThu/get_donhang.php');
            if (!response.ok) {
                console.error('Network response was not ok', response.statusText);
                return [];
            }
            const donhang = await response.json();
            console.log('Dữ liệu donhang:', donhang); // Kiểm tra dữ liệu từ API
            return donhang;
        }

        function tinhTongTienLaiVaTongGiaTriDonHangTheoThang(donhang) {
            const tongTienLaiTheoThang = {};
            const tongGiaTriDonHangTheoThang = {};

            donhang.forEach(don => {
                // Kiểm tra định dạng của thoigian
                if (!don.thoigian || !don.thoigian.slice(0, 7).match(/^\d{4}-\d{2}$/)) {
                    console.error(`Invalid date format for order ID: ${don.id}`);
                    return;
                }
                
                const thang = don.thoigian.slice(0, 7); // Lấy định dạng YYYY-MM

                // Kiểm tra và chuyển đổi tienlai sang số
                const tienlai = parseFloat(don.tienlai);
                const giatri = parseFloat(don.giatridonhang);
                if (isNaN(tienlai)) {
                    console.error(`Invalid tienlai value for order ID: ${don.id}`);
                    return;
                }
                if (isNaN(giatri)) {
                    console.error(`Invalid giatri value for order ID: ${don.id}`);
                    return;
                }

                if (!tongTienLaiTheoThang[thang]) {
                    tongTienLaiTheoThang[thang] = 0;
                }
                if (!tongGiaTriDonHangTheoThang[thang]) {
                    tongGiaTriDonHangTheoThang[thang] = 0;
                }

                tongTienLaiTheoThang[thang] += tienlai;
                tongGiaTriDonHangTheoThang[thang] += giatri;
            });

            console.log('Tổng tiền lãi theo tháng:', tongTienLaiTheoThang); // Kiểm tra kết quả tính toán
            console.log('Tổng giá trị đơn hàng theo tháng:', tongGiaTriDonHangTheoThang); // Kiểm tra kết quả tính toán
            return { tongTienLaiTheoThang, tongGiaTriDonHangTheoThang };
        }

        function updateTable(tongTienLaiTheoThang, tongGiaTriDonHangTheoThang) {
            const tableBody = document.querySelector('#data-table tbody');
            tableBody.innerHTML = '';

            Object.keys(tongTienLaiTheoThang).forEach(thang => {
                const row = document.createElement('tr');
                const cellThang = document.createElement('td');
                const cellTienLai = document.createElement('td');
                const cellGiaTriDonHang = document.createElement('td');

                cellThang.textContent = thang;
                cellTienLai.textContent = tongTienLaiTheoThang[thang].toLocaleString();
                cellGiaTriDonHang.textContent = tongGiaTriDonHangTheoThang[thang].toLocaleString();

                row.appendChild(cellThang);
                row.appendChild(cellTienLai);
                row.appendChild(cellGiaTriDonHang);
                tableBody.appendChild(row);
            });
        }

        async function renderChart() {
            const donhang = await fetchDonhangData();
            if (donhang.length === 0) {
                console.error('No data available for rendering the chart.');
                return;
            }
            const { tongTienLaiTheoThang, tongGiaTriDonHangTheoThang } = tinhTongTienLaiVaTongGiaTriDonHangTheoThang(donhang);
            const labels = Object.keys(tongTienLaiTheoThang);
            const dataTienLai = Object.values(tongTienLaiTheoThang);
            const dataGiaTriDonHang = Object.values(tongGiaTriDonHangTheoThang);

            console.log('Labels:', labels); // Kiểm tra labels cho biểu đồ
            console.log('Data Tien Lai:', dataTienLai); // Kiểm tra data cho biểu đồ
            console.log('Data Gia Tri Don Hang:', dataGiaTriDonHang); // Kiểm tra data cho biểu đồ

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
                            label: 'Doanh thu',
                            data: dataGiaTriDonHang,
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
                            text: 'Tổng hợp Doanh thu và Lợi nhuận theo Tháng'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Năm 2024'
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
                                text: 'Doanh thu (VND)'
                            },
                            beginAtZero: true,
                            grid: {
                                drawOnChartArea: false // Chỉ vẽ grid lines của trục chính
                            }
                        }
                    }
                }
            });

            // Cập nhật bảng dữ liệu
            updateTable(tongTienLaiTheoThang, tongGiaTriDonHangTheoThang);
        }

        renderChart();
    </script>
</body>
</html>
