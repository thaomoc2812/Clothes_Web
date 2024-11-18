<?php
$idsanpham = $_POST['idsanpham'];
$user = $_POST['user'];
$masanpham = $_POST['masanpham'];

if($user == '0')
{
    header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=3");
}
else
{
        //ket noi csdl
    require_once '../../php/connect.php';

    if (isset($_POST['size']) && isset($_POST['color']) && isset($_POST['soluong'])) {
        $size = $_POST['size'];
        $color = $_POST['color'];
        $soluong = $_POST['soluong'];

        $search_sl = "SELECT * FROM soluong WHERE masanpham = '$masanpham' AND idsanpham = $idsanpham AND kichthuoc = '$size' AND mausac = '$color'  ";
        $result_sl = mysqli_query($conn, $search_sl);
        $fetch_sl= mysqli_fetch_assoc($result_sl);
        $check_sl = $fetch_sl['soluong'];
        $idsoluong = $fetch_sl['id'];
        
        if($soluong < 0)
        {
            header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=0");
            exit();
        }
        if($check_sl < $soluong)
        {
            header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=0");
            exit();
        }
        else if(!$soluong) 
        {
            header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=2");
            exit();
        }
        else
        {
            $gia = 0;
            $now = date('Y-m-d');
            $search_ttkm = "SELECT * FROM thongtinkhuyenmai WHERE ngaybatdau <= '$now' AND ngayketthuc >= '$now'";
            $check_km = 0;
           if($result_ttkm = mysqli_query($conn, $search_ttkm))
            {
            while($fetch_ttkm = mysqli_fetch_assoc($result_ttkm))
            {
           $makhuyenmai = $fetch_ttkm['makhuyenmai'];
            $search_km = "SELECT * FROM khuyenmai WHERE masanpham = '$masanpham' AND makhuyenmai = '$makhuyenmai' AND idsoluong = $idsoluong";
            if($result_km = mysqli_query($conn, $search_km))
            {
            
            if($fetch_km = mysqli_fetch_assoc($result_km))
            {
                $check_km = 1;
                $giathat = $fetch_sl['giabanra'] *(100-$fetch_ttkm['giam'])/100;
            $gia = $giathat;
            }
            
            
            }
            }
            }
            if($check_km == 0){$gia = $fetch_sl['giabanra'];}
            header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=1&size=$size&color=$color&gia=$gia&soluong=$soluong");
            exit();
        }
    }
    else
    {
    header("Location: ../FE/viewMotSanPham.php?user=$user&sid=$idsanpham&check=2");
    exit();
    }

}

