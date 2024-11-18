<?php include 'header.html'; ?>

            <div class="container">
            <h1 style="text-align: center;">Tìm kiếm nhân viên</h1> 
            <form action="searchNhanVien.php" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Nhập tên hoặc địa chỉ, số điện thoại, vị trí" id ="key" class="form-control" name="key">
                </div>

                <button type="submit" class="btn btn-primary">Tìm</button>
            </form>      
                <table class="table table-striped">
                    <thead class="thead-style">
                        <tr>
                            <th>Họ và tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Vị trí</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        //nhan du lieu tu form
                        $key = $_POST['key'];


                        //ket noi csdl
                        require_once '../../../php/connect.php';
                        function convertToNonAccent($str) {
                            $str = iconv('UTF-8', 'ASCII//IGNORE', $str);
                            $str = preg_replace('/[^a-zA-Z0-9]/', '', $str); // Loại bỏ các ký tự không phải chữ cái hoặc số
                            return $str;
                        }
                        
                        // Sử dụng hàm
                       
                        $chuoiKhongDau = convertToNonAccent($key);


                        $search_sql = "SELECT * FROM nhanvien WHERE 
                        (hoten LIKE '%$chuoiKhongDau%')
                        OR (diachi LIKE '%$chuoiKhongDau%')
                        OR (sdt LIKE '%$chuoiKhongDau%')
                        OR (vitri LIKE '%$chuoiKhongDau%')
                        ";



                        $result = mysqli_query($conn, $search_sql);

                        while ($r = mysqli_fetch_assoc($result))
                        {
                        ?>
                            <tr>
                            <td><?php echo $r['hoten'] ?></td>
                            <td><?php echo $r['sdt'] ?></td>
                            <td><?php echo $r['diachi'] ?></td>
                            <td><?php 
                            $vitri = $r['vitri'];
                            $search_nhomquyen = "SELECT * FROM nhomquyen WHERE id = $vitri";
                            $result_nhomquyen = mysqli_query($conn, $search_nhomquyen);
                            $r_nhomquyen = mysqli_fetch_assoc($result_nhomquyen);
                            echo $r_nhomquyen['tennhomquyen'] ;
                            
                            ?></td>
                                <td><a href="editNhanVien.php?sid=<?php echo $r['id'] ?>" class="btn btn-info">Sửa</a>
                                <a onclick="return confirm('Bạn có muốn xóa nhân viên này không?')" href="../../BE/quanLyNhanVien/deleteNhanVien.php?sid=<?php echo $r['id'] ?>" class="btn btn-danger">Xóa</a></td>
                            </tr>
                        <?php
                    }
                ?>

                </tbody>
            </table>

</body>
</html>