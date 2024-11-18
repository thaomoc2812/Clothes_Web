<?php
    $calam = $_POST['calam'];
    $ngay = $_POST['ngay'];
    $staff = $_POST['staff'];

    require_once '../../../php/connect.php';

    $delete_sql = "DELETE FROM dangkycalam WHERE idnhanvien = $staff AND calam = '$calam' AND ngay ='$ngay'";


    //thuc thi cau lenh them
    if(mysqli_query($conn, $delete_sql)){
        //in thong bao thanh cong
      
        header("Location: ../../FE/quanLyNhanVien/quanLyLichLamViec.php");
    
        exit();
    }
    else {
        // Chuyển hướng trở lại trang trước
        $previousPage = $_SERVER['HTTP_REFERER'];
        header("Location: $previousPage");
        exit(); // Đảm bảo dừng thực thi mã sau khi chuyển hướng
    }