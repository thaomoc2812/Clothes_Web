<?php

$idnhomquyen = $_GET['idnhomquyen'];
require_once '../../../php/connect.php';

$edit_sql = "SELECT * FROM nhomquyen WHERE id = $idnhomquyen";

$result1 = mysqli_query($conn, $edit_sql);
$r1 = mysqli_fetch_assoc($result1);

$idNQ = $r1['id'];
$view_sql2 = "SELECT * FROM phanquyen
JOIN quyentruycap ON quyentruycap.id = phanquyen.idquyentruycap
WHERE phanquyen.idnhomquyen = $idNQ ";
$result2 = mysqli_query($conn, $view_sql2);
$tapQuyenTruyCap = [];
$i = 0;

while ($r2 = mysqli_fetch_assoc($result2))
{
                           
$tapQuyenTruyCap[$i] = $r2['idquyentruycap'];
$i ++;
}
                                
function check($idcheck,$tapQuyenTruyCap,$i)
{
    for($t = 0; $t < $i; $t++)
    {
        if($idcheck == $tapQuyenTruyCap[$t])
        {
            return 1;
        }
        
    }
    return 0;
};

?>

<?php include 'header.html'; ?>
                
                <div class="container">
                  <h1 style="text-align: center;">Sửa nhóm quyền</h1>

            
                  <form action="../../BE/quanLyNhanVien/updateNhomQuyen.php" method="post">
          
                   
                      <div class="form-group">
                      <input type="hidden" name="idnhomquyen" value="<?php echo $r1['id']?>" id ="">
                          <label for = "tennhomquyen">Tên nhóm quyền</label>
                          <input type="text" id ="tennhomquyen" class="form-control" name="tennhomquyen" value="<?php echo $r1['tennhomquyen']?>">
                      </div>
                      <div class="form-group">
                        <label>Các chức năng</label><br>
                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Thêm sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxThemSanPham" name="boxThemSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Thêm sản phẩm <br>
                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Tìm kiếm sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxTimKiemSanPham" name="boxTimKiemSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Tìm kiếm sản phẩm <br>

                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Xem danh sách sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxXemDanhSachSanPham" name="boxXemDanhSachSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Xem danh sách sản phẩm <br>

                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Xóa/Sửa sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxXoaSuaSanPham" name="boxXoaSuaSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Xóa/Sửa sản phẩm <br>


                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý đơn hàng' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyDonHang" name="boxQuanLyDonHang"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Quản lý đơn hàng <br>

                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý danh mục sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyDanhMucSanPham" name="boxQuanLyDanhMucSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Quản lý danh mục sản phẩm<br>


                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý khuyến mại' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyKhuyenMai" name="boxQuanLyKhuyenMai"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Quản lý khuyến mại <br>


                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý khách hàng' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyKhachHang" name="boxQuanLyKhachHang"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Quản lý khách hàng <br>


                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý số lượng tồn kho' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLySoLuongTonKho" name="boxQuanLySoLuongTonKho"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Quản lý số lượng tồn kho <br>

                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý lô hàng sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyLoHangSanPham" name="boxQuanLyLoHangSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>>Quản lý lô hàng sản phẩm <br>

                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Phân loại sản phẩm' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxPhanLoaiSanPham" name="boxPhanLoaiSanPham"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){?>checked<?php }?>> Phân loại sản phẩm<br>


                        <?php
                        $view_sql4 = "SELECT * FROM quyentruycap WHERE tenquyentruycap = 'Quản lý nhà cung cấp' ";
                        $result4 = mysqli_query($conn, $view_sql4);
                        $r4 = mysqli_fetch_assoc($result4);
                        ?>
                        <input type="checkbox" id="boxQuanLyNhaCungCap" name="boxQuanLyNhaCungCap"<?php if(check($r4['id'],$tapQuyenTruyCap,$i)){{{?>checked<?php }?><?php }?><?php }?>> Quản lý nhà cung cấp <br>


                    </div>
                  
          
                      <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
          
                  </form>
              </div>
          


</body>
</html>
