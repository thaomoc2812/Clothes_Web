<?php include 'header.html'; ?>
<div class="container">
    <h1 style="text-align: center;">Quản lý doanh thu</h1>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="theoThoiGian.php">Theo thời gian</a></li>
                <li><a href="theoSanPham.php">Theo sản phẩm</a></li>
                <li class="active"><a href="theoKhachHang.php">Theo khách hàng</a></li>
            </ul>
        </div>
    </nav>
</div>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Doanh thu và Lợi nhuận theo từng Khách Hàng</title>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: auto;
        }
        #table-container {
            width: 80%;
            max-width: 800px;
            margin: auto;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id="chart-container">
        <canvas id="revenueChart"></canvas>
    </div>
    <div id="table-container">
        <table>
            <thead>
                <tr>
                    <th>Số điện thoại khách hàng</th>
                    <th>Lợi nhuận (VND)</th>
                    <th>Doanh thu (VND)</th>
                </tr>
            </thead>
            <tbody id="data-table-body">
                <!-- Dữ liệu sẽ được thêm động ở đây -->
            </tbody>
        </table>
    </div>
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

        function tinhTongTienLaiVaTongGiaTriDonHangTheoKhachHang(donhang) {
            const tongTienLaiTheoKhachHang = {};
            const tongGiaTriDonHangTheoKhachHang = {};

            donhang.forEach(don => {
                // Kiểm tra định dạng của thoigian
                if (!don.sdt) {
                    console.error(`Invalid date format for order ID: ${don.id}`);
                    return;
                }
                
                const sdt = don.sdt; 

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

                if (!tongTienLaiTheoKhachHang[sdt]) {
                    tongTienLaiTheoKhachHang[sdt] = 0;
                }
                if (!tongGiaTriDonHangTheoKhachHang[sdt]) {
                    tongGiaTriDonHangTheoKhachHang[sdt] = 0;
                }

                tongTienLaiTheoKhachHang[sdt] += tienlai;
                tongGiaTriDonHangTheoKhachHang[sdt] += giatri;
            });

            console.log('Tổng tiền lãi trên từng khách hàng:', tongTienLaiTheoKhachHang); // Kiểm tra kết quả tính toán
            console.log('Tổng giá trị đơn hàng trên từng khách hàng:', tongGiaTriDonHangTheoKhachHang); // Kiểm tra kết quả tính toán
            return { tongTienLaiTheoKhachHang, tongGiaTriDonHangTheoKhachHang };
        }

        function updateTable(tongTienLaiTheoKhachHang, tongGiaTriDonHangTheoKhachHang) {
            const tableBody = document.getElementById('data-table-body');
            tableBody.innerHTML = '';

            const khachHangSdts = Object.keys(tongTienLaiTheoKhachHang);
            khachHangSdts.forEach(sdt => {
                const row = document.createElement('tr');
                const sdtCell = document.createElement('td');
                sdtCell.textContent = sdt;
                const doanhThuCell = document.createElement('td');
                doanhThuCell.textContent = tongTienLaiTheoKhachHang[sdt].toLocaleString('vi-VN');
                const doanhSoCell = document.createElement('td');
                doanhSoCell.textContent = tongGiaTriDonHangTheoKhachHang[sdt].toLocaleString('vi-VN');
                row.appendChild(sdtCell);
                row.appendChild(doanhThuCell);
                row.appendChild(doanhSoCell);
                tableBody.appendChild(row);
            });
        }

        async function renderChart() {
            const donhang = await fetchDonhangData();
            if (donhang.length === 0) {
                console.error('No data available for rendering the chart.');
                return;
            }
            const { tongTienLaiTheoKhachHang, tongGiaTriDonHangTheoKhachHang } = tinhTongTienLaiVaTongGiaTriDonHangTheoKhachHang(donhang);
            const labels = Object.keys(tongTienLaiTheoKhachHang);
            const dataTienLai = Object.values(tongTienLaiTheoKhachHang);
            const dataGiaTriDonHang = Object.values(tongGiaTriDonHangTheoKhachHang);

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
                            text: 'Tổng hợp Doanh thu và Lợi nhuận trên từng Khách hàng'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Số điện thoại khách hàng'
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

            updateTable(tongTienLaiTheoKhachHang, tongGiaTriDonHangTheoKhachHang);
        }

        renderChart();
    </script>
</body>
</html>
