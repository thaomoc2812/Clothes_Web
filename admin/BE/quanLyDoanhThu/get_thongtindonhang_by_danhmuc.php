<?php
// Kết nối cơ sở dữ liệu
require_once '../../../php/connect.php';

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra xem 'danhmuc' có được đặt trong request không
if (isset($_GET['danhmuc']) && !empty($_GET['danhmuc'])) {
    $danhmuc = $_GET['danhmuc'];

    // Sử dụng prepared statement để tránh SQL Injection
    $sqltt = $conn->prepare("SELECT thongtindonhang.idsanpham, thongtindonhang.tienlai, thongtindonhang.soluong, sanpham.masanpham 
                             FROM thongtindonhang
                             INNER JOIN sanpham ON thongtindonhang.idsanpham = sanpham.id
                             INNER JOIN thongtinsanpham ON sanpham.masanpham = thongtinsanpham.masanpham
                             INNER JOIN danhmucsanpham ON thongtinsanpham.iddanhmuc = danhmucsanpham.id
                             WHERE danhmucsanpham.tendanhmuc = ? AND thongtindonhang.tienlai != 0
                             ORDER BY thongtindonhang.idsanpham ASC");
    $sqltt->bind_param('s', $danhmuc);
    $sqltt->execute();
    $resulttt = $sqltt->get_result();

    // Kiểm tra xem truy vấn có thành công không
    if ($resulttt) {
        $thongtindonhang = array();
        while ($r_sqltt = $resulttt->fetch_assoc()) {
            $thongtindonhang[] = $r_sqltt;
        }

        // Trả về dữ liệu dưới dạng JSON
        header('Content-Type: application/json');
        echo json_encode($thongtindonhang);
    } else {
        // Truy vấn không thành công
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Truy vấn không thành công.']);
    }

    // Đóng statement
    $sqltt->close();
} else {
    // Không có 'danhmuc' trong request
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Không có danh mục được chọn.']);
}

// Đóng kết nối
$conn->close();
?>
