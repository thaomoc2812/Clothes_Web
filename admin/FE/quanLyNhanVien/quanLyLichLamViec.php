<?php 
include 'header.html';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lịch làm việc</title>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
    <style>
        #calendar-container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 300px;
            padding: 20px;
        }
        .popup-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .disabled-event {
            background-color: #d3d3d3 !important;
        }
    </style>
</head>
<body>
    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Xóa lịch làm việc này</h2>
            <form action="../../BE/quanLyNhanVien/deleteCaLam.php" method="post">
               
                <input type="hidden" id="ngay" name="ngay">
                <input type="hidden" id="calam" name="calam">
                <input type="hidden" id="staff" name="staff" readonly>
                <button type="submit" class="btn btn-info">OK</button>
                <button type="button" class="btn btn-danger" onclick="closePopup()">Hủy</button>
            </form>
        </div>
    </div>

    <div id="popup2" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h2>Xác nhận lịch làm việc</h2>
            <form action="../../BE/quanLyNhanVien/dangKyCaLam.php" method="post">
                <input type="hidden" id="staff2" name="staff2" readonly>
                <input style ="width: 100%; padding: 10px;margin: 10px 0;box-sizing: border-box;border: 1px solid #ccc;border-radius: 4px;" type="text" id="hoten" name="hoten" readonly>
                <input style ="width: 100%; padding: 10px;margin: 10px 0;box-sizing: border-box;border: 1px solid #ccc;border-radius: 4px;" type="text" id="ngay2" name="ngay2" readonly>
                <input style ="width: 100%; padding: 10px;margin: 10px 0;box-sizing: border-box;border: 1px solid #ccc;border-radius: 4px;" type="text" id="calam2" name="calam2" readonly>
                
                <button type="submit" class="btn btn-info">Chấp nhận/Hủy bỏ</button>
                <a class="btn btn-danger" onclick="openPopup()">Xóa</a>
                <button type="button" class="btn btn-danger" onclick="closePopup2()">Hủy</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                selectable: true,
                selectHelper: true,
                events: [],
                selectAllow: function(selectInfo) {
                    var today = new Date();
                    return selectInfo.start >= today;
                },
                select: function(info) {
                    document.getElementById("shiftDate").value = info.startStr;
                    openPopup();
                },
                eventClick: function(info) {
                    
                        document.getElementById("ngay2").value = info.event.startStr;
                        document.getElementById("calam2").value = info.event.title;
                        document.getElementById("hoten").value = info.event.extendedProps.hoten;
                        document.getElementById("staff2").value = info.event.extendedProps.idnhanvien;

                        document.getElementById("ngay").value = info.event.startStr;
                        document.getElementById("calam").value = info.event.title;
                        document.getElementById("staff").value = info.event.extendedProps.idnhanvien;
                        openPopup2();
                    
                }
            });
            calendar.render();

            <?php 
            require_once '../../../php/connect.php';
            $search_dangkycalam = "SELECT * FROM dangkycalam";
            $result_dangkycalam = mysqli_query($conn, $search_dangkycalam);
            while ($fetch_dangkycalam = mysqli_fetch_assoc($result_dangkycalam)) {
                $calam = $fetch_dangkycalam['calam'];
                $ngay = $fetch_dangkycalam['ngay'];
                $idnhanvien = $fetch_dangkycalam['idnhanvien'];
                $search_nhanvien = "SELECT * FROM nhanvien";
                $result_nhanvien = mysqli_query($conn, $search_nhanvien);
                $fetch_nhanvien = mysqli_fetch_assoc($result_nhanvien);
                $hoten = $fetch_nhanvien['hoten'];
                $trangthai = $fetch_dangkycalam['trangthai'];
                $eventClass = $trangthai == 1 ? 'disabled-event' : '';
                ?>
                calendar.addEvent({
                    title: '<?php echo $calam; ?>',
                    start: '<?php echo $ngay; ?>',
                    end: '<?php echo $ngay; ?>',
                    allDay: true,
                    idnhanvien: '<?php echo $idnhanvien; ?>',
                    hoten: '<?php echo $hoten?>',
                    classNames: '<?php echo $eventClass; ?>',
                    
                });
                <?php
            }
            ?>
        });

        function openPopup() {
            closePopup2();
            document.getElementById("popup").style.display = "block";
        }
        function openPopup2() {
            document.getElementById("popup2").style.display = "block";
        }

        function closePopup2() {
            
            document.getElementById("popup2").style.display = "none";
        }
        function closePopup() {
            
            document.getElementById("popup").style.display = "none";
        }

        function submitWorkShift() {
            var shiftDate = document.getElementById("shiftDate").value;
            var shifts = [];
            if (document.getElementById("boxSang").checked) {
                shifts.push("Sáng");
            }
            if (document.getElementById("boxChieu").checked) {
                shifts.push("Chiều");
            }
            if (shifts.length > 0) {
                shifts.forEach(function(shift) {
                    // Add any additional code here for handling the shifts if necessary
                });
                closePopup();
            } else {
                alert("Vui lòng chọn ít nhất một ca làm việc.");
            }
        }
    </script>
</body>
</html>
