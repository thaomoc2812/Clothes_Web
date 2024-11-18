<?php $staff = $_GET['staff'];
include 'header.php'; ?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu đồ Số ca làm theo Tháng</title>
    <style>
        #chart-container {
            width: 80%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center;">Biểu đồ Số ca làm theo Tháng</h1>
    <div id="chart-container">
        <canvas id="shiftsChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        async function fetchShiftsData() {
            const urlParams = new URLSearchParams(window.location.search);
            const staff = urlParams.get('staff');
            const response = await fetch(`../BE/get_CaLam.php?staff=${staff}`);
            if (!response.ok) {
                console.error('Network response was not ok', response.statusText);
                return [];
            }
            const shifts = await response.json();
            console.log('Dữ liệu ca làm:', shifts); // Kiểm tra dữ liệu từ API
            return shifts;
        }
        

        function countShiftsPerMonth(shifts) {
            const shiftsPerMonth = {};
            shifts.forEach(shift => {
                const month = shift.ngay.slice(0, 7); // Lấy định dạng YYYY-MM
                if (!shiftsPerMonth[month]) {
                    shiftsPerMonth[month] = 0;
                }
                shiftsPerMonth[month] += 1;
            });
            return shiftsPerMonth;
        }

        async function renderChart() {
            const shifts = await fetchShiftsData();
            if (shifts.length === 0) {
                console.error('No data available for rendering the chart.');
                return;
            }
            const shiftsPerMonth = countShiftsPerMonth(shifts);
            const labels = Object.keys(shiftsPerMonth);
            const dataShifts = Object.values(shiftsPerMonth);

            console.log('Labels:', labels); // Kiểm tra labels cho biểu đồ
            console.log('Data Shifts:', dataShifts); // Kiểm tra data cho biểu đồ

            const ctx = document.getElementById('shiftsChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Số ca làm',
                            data: dataShifts,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.1
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
                            text: 'Tổng hợp Số ca làm theo Tháng'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tháng'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Số ca làm'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        renderChart();
    </script>
    </div>