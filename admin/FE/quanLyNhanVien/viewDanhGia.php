<?php include 'header.html'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đánh giá nhân viên</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .thead-style {
            background-color: black;
            color: white;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Đánh giá nhân viên</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <script>
        async function fetchCalamData() {
            try {
                const response = await fetch('../../BE/quanLyNhanVien/get_CaLam.php');
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Fetch error:', error);
                return [];
            }
        }

        async function renderChart() {
            const calamData = await fetchCalamData();
            if (calamData.length === 0) {
                console.error('No data available for rendering the chart.');
                return;
            }

            const labels = calamData.map(item => item.hoten);
            const data = calamData.map(item => item.total);

            const chartData = {
                labels: labels,
                datasets: [{
                    label: 'Tổng số ca làm',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    data: data
                }]
            };

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        renderChart();
    </script>
</body>
</html>
