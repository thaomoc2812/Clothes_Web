<?php
    $calam = $_POST['calam2'];
    $ngay = $_POST['ngay2'];
    $staff = $_POST['staff2'];

    require_once '../../../php/connect.php';

    $search_dangkycalam = "SELECT * FROM dangkycalam WHERE idnhanvien = $staff AND calam = '$calam' AND ngay ='$ngay'";
    $result_dangkycalam = mysqli_query($conn, $search_dangkycalam);
    $fetch_dangkycalam = mysqli_fetch_assoc($result_dangkycalam);
    $trangthai = $fetch_dangkycalam['trangthai'];
    if($trangthai == 0)
    {
        $update_sql = "UPDATE dangkycalam SET trangthai = 1 WHERE idnhanvien = $staff AND ngay='$ngay' AND calam = '$calam'";
        
    }
    else 
    {
        $update_sql = "UPDATE dangkycalam SET trangthai = 0 WHERE idnhanvien = $staff AND ngay='$ngay' AND calam = '$calam'";
    }
    


    //thuc thi cau lenh them
    if(mysqli_query($conn, $update_sql)){
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