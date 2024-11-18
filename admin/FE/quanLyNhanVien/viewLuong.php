<?php include 'header.html'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số Ca làm việc của nhân viên theo tháng</title>
    <style>
        .container {
            width: 80%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .thead-style {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Số Ca làm việc của nhân viên theo tháng</h1>
        <div id="tablesContainer"></div>
    </div>

    <script>
        async function fetchCalamData() {
            try {
                const response = await fetch('../../BE/quanLyNhanVien/get_luong.php');
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                const data = await response.json();
                return data;
            } catch (error) {
                console.error('Fetch error:', error);
                return {};
            }
        }

        function createTable(month, data) {
            const table = document.createElement('table');
            const thead = document.createElement('thead');
            thead.classList.add('thead-style');
            const tbody = document.createElement('tbody');

            const headerRow = document.createElement('tr');
            const headerCell1 = document.createElement('th');
            headerCell1.textContent = 'Nhân viên';
            const headerCell2 = document.createElement('th');
            headerCell2.textContent = 'Tổng số ca làm';
            headerRow.appendChild(headerCell1);
            headerRow.appendChild(headerCell2);
            thead.appendChild(headerRow);

            data.forEach(item => {
                const row = document.createElement('tr');
                const cell1 = document.createElement('td');
                cell1.textContent = item.hoten;
                const cell2 = document.createElement('td');
                cell2.textContent = item.total;
                row.appendChild(cell1);
                row.appendChild(cell2);
                tbody.appendChild(row);
            });

            table.appendChild(thead);
            table.appendChild(tbody);

            const monthHeader = document.createElement('h2');
            monthHeader.textContent = `Tháng ${month}`;

            const container = document.getElementById('tablesContainer');
            container.appendChild(monthHeader);
            container.appendChild(table);
        }

        async function renderTables() {
            const calamData = await fetchCalamData();
            if (Object.keys(calamData).length === 0) {
                console.error('No data available for rendering the tables.');
                return;
            }

            for (const [month, data] of Object.entries(calamData)) {
                const sortedData = Object.values(data).sort((a, b) => a.hoten.localeCompare(b.hoten));
                createTable(month, sortedData);
            }
        }

        renderTables();
    </script>
</body>
</html>
