-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 30, 2024 lúc 05:56 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `warehouse`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkycalam`
--

CREATE TABLE `dangkycalam` (
  `id` bigint(20) NOT NULL,
  `idnhanvien` bigint(20) NOT NULL,
  `calam` varchar(20) NOT NULL,
  `ngay` date NOT NULL,
  `trangthai` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dangkycalam`
--

INSERT INTO `dangkycalam` (`id`, `idnhanvien`, `calam`, `ngay`, `trangthai`) VALUES
(16, 10, 'Chiều', '2024-05-04', 1),
(18, 10, 'Chiều', '2024-05-03', 1),
(20, 17, 'Sáng', '2024-06-06', 1),
(21, 17, 'Sáng', '2024-06-07', 1),
(22, 17, 'Sáng', '2024-06-09', 1),
(24, 17, 'Sáng', '2024-06-08', 1),
(25, 19, 'Sáng', '2024-06-17', 1),
(26, 19, 'Chiều', '2024-06-18', 1),
(27, 10, 'Sáng', '2024-06-24', 1),
(28, 10, 'Chiều', '2024-06-25', 1),
(29, 10, 'Sáng', '2024-07-01', 1),
(30, 10, 'Chiều', '2024-07-02', 1),
(31, 10, 'Sáng', '2024-07-09', 1),
(32, 10, 'Sáng', '2024-07-17', 0),
(33, 10, 'Chiều', '2024-07-18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `id` bigint(20) NOT NULL,
  `tendanhmuc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idphanloai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`id`, `tendanhmuc`, `idphanloai`) VALUES
(9, 'Áo dài tay', 1),
(10, 'Áo phông', 1),
(11, 'Quần short', 9),
(12, 'Quần jean ống đứng', 9),
(13, 'Quần jean ống loe', 9),
(14, 'Quần vải', 9),
(15, 'Set váy', 10),
(17, 'Đồ mặc nhà mùa hè', 11),
(18, 'Đồ mặc nhà mùa đông', 11),
(24, 'Áo polo', 1),
(25, 'Áo ba lỗ', 1),
(26, 'Áo kiểu', 1),
(27, 'Áo sơ mi', 1),
(28, 'Áo len', 1),
(29, 'Áo nỉ', 1),
(30, 'Áo nỉ có mũ', 1),
(31, 'Quần nỉ', 9),
(32, 'Quần kaki', 9),
(33, 'Váy liền thân', 13),
(34, 'Chân váy', 13),
(35, 'Chống nắng', 15),
(36, 'Áo khoác ngắn', 15),
(37, 'Áo khoác gió', 15),
(38, 'Áo khoác chần bông', 15),
(39, 'Áo khoác lông vũ', 15),
(41, 'Giữ nhiệt', 16),
(43, 'Khác', 1),
(44, 'Set quần áo', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` bigint(20) NOT NULL,
  `madonhang` varchar(20) NOT NULL,
  `idkhachhang` bigint(20) NOT NULL,
  `hotennguoinhan` varchar(50) NOT NULL,
  `sdtnguoinhan` varchar(50) NOT NULL,
  `tinh` varchar(50) NOT NULL,
  `huyen` varchar(50) NOT NULL,
  `xa` varchar(50) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `giatridonhang` int(20) NOT NULL,
  `tienlai` int(11) NOT NULL,
  `phiship` int(11) NOT NULL,
  `hinhthucthanhtoan` varchar(50) NOT NULL,
  `thoigian` date NOT NULL,
  `tinhtrang` varchar(20) NOT NULL,
  `idnhanvienxacnhan` bigint(20) NOT NULL,
  `thoigiangiao` date NOT NULL,
  `idnhanviengiao` bigint(20) NOT NULL,
  `thoigiannhanhang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `madonhang`, `idkhachhang`, `hotennguoinhan`, `sdtnguoinhan`, `tinh`, `huyen`, `xa`, `sonha`, `giatridonhang`, `tienlai`, `phiship`, `hinhthucthanhtoan`, `thoigian`, `tinhtrang`, `idnhanvienxacnhan`, `thoigiangiao`, `idnhanviengiao`, `thoigiannhanhang`) VALUES
(11, 'DH011', 1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Hà Nam', 'Huyện Kim Bảng', 'Thị trấn Quế', 'Số 17 Đường Biên Hòa', 125000, 35000, 50000, 'Chuyển khoản', '2024-01-16', 'Đã nhận', 0, '2024-01-18', 0, '2024-01-20'),
(12, 'DH012', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 465000, 185000, 30000, 'Ship COD', '2024-02-16', 'Đã nhận', 0, '2024-02-18', 0, '2024-02-20'),
(13, 'DH013', 2, 'Trần Tuấn Anh', '0222222222', 'Thành phố Hà Nội', 'Quận Hai Bà Trưng', 'Phường Bách Khoa', 'Số 5 Tạ Quang Bửu', 165000, 75000, 30000, 'Ship COD', '2024-03-17', 'Đã nhận', 0, '2024-03-20', 0, '2024-03-25'),
(14, 'DH014', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 125000, 65000, 30000, 'Chuyển khoản', '2024-03-17', 'Đã nhận', 0, '2024-03-18', 0, '2024-03-22'),
(15, 'DH015', 1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Hà Nam', 'Huyện Kim Bảng', 'Xã Tượng Lĩnh', 'Lưu Giáo', 200000, 0, 50000, 'Ship COD', '2024-04-18', 'Đã hủy', 0, '0000-00-00', 0, NULL),
(18, '18', 6, 'Lan', '0666666666', '', '', '', '', 290000, 40000, 0, '', '2024-04-20', 'Offline', 0, '0000-00-00', 0, NULL),
(21, 'DH021', 1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Hà Nam', 'Huyện Kim Bảng', 'Thị trấn Quế', 'Số 17 Đường Biên Hòa', 200000, 70000, 50000, 'Chuyển khoản', '2024-05-20', 'Đã nhận', 0, '2024-05-20', 0, '2024-05-25'),
(22, 'DH022', 3, 'Nguyễn Như Quỳnh', '0333333333', 'Thành phố Hà Nội', 'Quận Hai Bà Trưng', 'Phường Bách Khoa', 'Số 18 Tạ Quang Bửu', 480000, 120000, 30000, 'Ship COD', '2024-05-20', 'Đã nhận', 0, '2024-05-20', 0, '2024-05-22'),
(23, 'DH023', 9, 'Vũ Thu Huyền', '0199999998', 'Tỉnh Sơn La', 'Thành phố Sơn La', 'Phường Quyết Thắng', 'Số 8 Đường Chiến Thắng', 150000, 50000, 50000, 'Ship COD', '2024-05-20', 'Đã nhận', 0, '2024-05-22', 0, '2024-05-24'),
(24, 'DH024', 10, 'Đinh Thanh Loan', '0199999978', 'Tỉnh Bắc Ninh', 'Thành phố Bắc Ninh', 'Phường Tiền An', 'Số 5 Tiền An', 550000, 0, 50000, 'Ship COD', '2024-05-20', 'Đang vận chuyển', 17, '2024-05-28', 17, NULL),
(25, 'DH025', 11, 'Trương Thị Tiên', '0155555558', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Phan Chu Trinh', 'Số 9', 150000, 50000, 30000, 'Ship COD', '2024-05-20', 'Đã nhận', 0, '2024-06-15', 0, '2024-06-23'),
(26, 'DH026', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 450000, 170000, 30000, 'Ship COD', '2024-05-20', 'Đã nhận', 0, '2024-06-23', 0, '2024-06-30'),
(27, 'DH027', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 152000, 60000, 30000, 'Ship COD', '2024-05-22', 'Đã nhận', 0, '2024-06-16', 0, '2024-06-23'),
(28, 'DH028', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 435000, 110000, 30000, 'Chuyển khoản', '2024-05-22', 'Đã nhận', 0, '2024-06-23', 0, '2024-07-14'),
(30, '30', 14, 'Phương', '0789789789', '', '', '', '', 300000, 110000, 0, '', '2024-05-28', 'Offline', 17, '0000-00-00', 0, NULL),
(35, 'DH035', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hai Bà Trưng', 'Phường Trương Định', 'Số 6', 506250, 185000, 30000, 'Chuyển khoản', '2024-06-05', 'Đã nhận', 0, '2024-06-23', 0, '2024-07-12'),
(36, 'DH036', 1, 'Kiều Phương Thảo', '0145263987', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 17', 100000, 0, 30000, 'Chuyển khoản', '2024-06-16', 'Đã giao đến nơi', 0, '2024-07-13', 10, '2024-07-14'),
(37, 'DH037', 1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Lai Châu', 'Huyện Sìn Hồ', 'Thị trấn Sìn Hồ', 'sdwd', 185000, 0, 50000, 'Chuyển khoản', '2024-06-16', 'Đã giao đến nơi', 0, '2024-07-13', 10, '2024-07-14'),
(38, 'DH038', 1, 'Kiều Phương Thảo', '0125478963', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Yên Phụ', 'Số 17', 215000, 0, 30000, 'Chuyển khoản', '2024-06-16', 'Đang vận chuyển', 0, '2024-07-14', 0, NULL),
(46, 'DH046', 1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Hà Nam', 'Huyện Kim Bảng', 'Thị trấn Quế', 'Số 17 Đường Biên Hòa', 112500, 0, 50000, 'Chuyển khoản', '2024-06-23', 'Đang vận chuyển', 10, '2024-07-14', 0, NULL),
(48, 'DH048', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 145000, 0, 30000, 'Chuyển khoản', '2024-06-30', 'Đã soạn đơn', 0, '0000-00-00', 0, NULL),
(50, '50', 48, 'Ngân', '0141414141', '', '', '', '', 150000, 60000, 0, '', '2024-07-08', 'Offline', 0, '0000-00-00', 0, NULL),
(51, '51', 47, 'Nga', '0145278963', '', '', '', '', 125000, 35000, 0, '', '2024-07-08', 'Offline', 0, '0000-00-00', 0, NULL),
(52, '52', 46, 'Hà Chi', '0152478963', '', '', '', '', 150000, 25000, 0, '', '2024-07-08', 'Offline', 0, '0000-00-00', 0, NULL),
(53, '53', 44, 'Linh', '0111122222', '', '', '', '', 145000, 20000, 0, '', '2024-07-08', 'Offline', 0, '0000-00-00', 0, NULL),
(54, '54', 7, 'Huệ', '0111111112', '', '', '', '', 150000, 60000, 0, '', '2024-07-12', 'Offline', 0, '0000-00-00', 0, NULL),
(55, '55', 15, 'Chi', '0123123123', '', '', '', '', 150000, 50000, 0, '', '2024-07-13', 'Offline', 0, '0000-00-00', 0, NULL),
(56, '56', 6, 'Lan', '0666666666', '', '', '', '', 150000, 60000, 0, '', '2024-07-13', 'Offline', 0, '0000-00-00', 0, NULL),
(57, 'DH057', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 17', 306000, 0, 30000, 'Chuyển khoản', '2024-07-14', 'Đã soạn đơn', 0, '0000-00-00', 0, NULL),
(58, 'DH058', 2, 'Trần Tuấn Anh', '0222222222', 'Tỉnh Hà Nam', 'Huyện Kim Bảng', 'Thị trấn Quế', 'Số 17 Đường Biên Hòa', 3000000, 0, 50000, 'Chuyển khoản', '2024-07-14', 'Đang chuẩn bị', 0, '0000-00-00', 0, NULL),
(59, 'DH059', 2, 'Trần Tuấn Anh', '0222222222', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 17', 135000, 0, 30000, 'Ship COD', '2024-07-14', 'Đang chuẩn bị', 0, '0000-00-00', 0, NULL),
(60, 'DH060', 3, 'Nguyễn Như Quỳnh', '0333333333', 'Thành phố Hà Nội', 'Quận Hai Bà Trưng', 'Phường Bách Khoa', 'Số 18 Tạ Quang Bửu', 148500, 0, 30000, 'Chuyển khoản', '2024-07-14', 'Chờ xác nhận', 0, '0000-00-00', 0, NULL),
(61, 'DH061', 1, 'Kiều Phương Thảo', '0111111111', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', 81000, 0, 30000, 'Chuyển khoản', '2024-07-14', 'Chờ xác nhận', 0, '0000-00-00', 0, NULL),
(63, '63', 1, 'Kiều Phương Thảo', '0111111111', '', '', '', '', 0, 0, 0, '', '2024-07-18', 'Offline', 0, '0000-00-00', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` bigint(20) NOT NULL,
  `idkhachhang` bigint(20) NOT NULL,
  `idsanpham` bigint(20) NOT NULL,
  `kichthuoc` varchar(20) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `soluong` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `idkhachhang`, `idsanpham`, `kichthuoc`, `mausac`, `soluong`) VALUES
(67, 1, 24, 'S', 'Be', 1),
(68, 1, 20, 'S', 'Tím', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `id` bigint(20) NOT NULL,
  `idsanpham` bigint(20) NOT NULL,
  `hinhanhchinh` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hinhanhphu1` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hinhanhphu2` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hinhanhphu3` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`id`, `idsanpham`, `hinhanhchinh`, `hinhanhphu1`, `hinhanhphu2`, `hinhanhphu3`) VALUES
(2, 2, 'babytee.jpg', 'babytee.jpg', 'babytee.jpg', 'babytee.jpg'),
(3, 3, '1.jpg', '1.jpg', '1.jpg', '1.jpg'),
(4, 4, 'phong.jpg', 'phong.jpg', 'phong.jpg', 'phong.jpg'),
(5, 5, 'yem.jpg', 'yem.jpg', 'yem.jpg', 'yem.jpg'),
(6, 6, 'dongu.jpg', 'dongu.jpg', 'dongu.jpg', 'dongu.jpg'),
(7, 7, 'jean.jpg', 'jean.jpg', 'jean.jpg', 'jean.jpg'),
(10, 10, 'aolennu.png', 'Screenshot 2024-04-21 105801.png', '', ''),
(11, 11, 'anh1.png', 'Screenshot 2024-01-30 165529.png', 'Screenshot 2024-01-30 165552.png', ''),
(12, 12, 'Screenshot 2024-01-30 165714.png', 'Screenshot 2024-01-30 165735.png', 'Screenshot 2024-01-30 165808.png', ''),
(13, 13, 'Screenshot 2024-01-30 171458.png', 'Screenshot 2024-01-30 171521.png', 'Screenshot 2024-01-30 171540.png', ''),
(16, 16, 'Screenshot 2024-01-30 172141.png', 'Screenshot 2024-01-30 172214.png', 'Screenshot 2024-01-30 172239.png', ''),
(17, 17, 'Screenshot 2024-02-01 132557.png', 'Screenshot 2024-02-01 132616.png', 'Screenshot 2024-02-01 132639.png', ''),
(18, 18, 'Screenshot 2024-02-01 132808.png', 'Screenshot 2024-02-01 132833.png', 'Screenshot 2024-02-01 132851.png', 'Screenshot 2024-02-01 132915.png'),
(19, 19, 'Screenshot 2024-02-01 133206.png', 'Screenshot 2024-02-01 133144.png', 'Screenshot 2024-02-01 133225.png', ''),
(20, 20, 'Screenshot 2024-02-01 133432.png', 'Screenshot 2024-02-01 133335.png', 'Screenshot 2024-02-01 133411.png', ''),
(21, 21, 'Screenshot 2024-02-01 133558.png', 'Screenshot 2024-02-01 133617.png', '', ''),
(22, 22, 'Screenshot 2024-02-01 133728.png', 'Screenshot 2024-02-01 133754.png', 'Screenshot 2024-02-01 133810.png', ''),
(23, 23, 'Screenshot 2024-02-01 133953.png', 'Screenshot 2024-02-01 134016.png', '', ''),
(24, 24, 'Screenshot 2024-02-01 134238.png', 'Screenshot 2024-02-01 134306.png', 'Screenshot 2024-02-01 134331.png', ''),
(25, 25, 'Screenshot 2024-02-01 134744.png', 'Screenshot 2024-02-01 135120.png', 'Screenshot 2024-02-01 135139.png', ''),
(26, 26, 'Screenshot 2024-02-01 143200.png', 'Screenshot 2024-02-01 143229.png', 'Screenshot 2024-02-01 143252.png', ''),
(27, 27, 'Screenshot 2024-02-01 143404.png', 'Screenshot 2024-02-01 143422.png', '', ''),
(28, 28, 'Screenshot 2024-02-01 143514.png', 'Screenshot 2024-02-01 143531.png', 'Screenshot 2024-02-01 143553.png', ''),
(29, 29, 'Screenshot 2024-02-01 143652.png', 'Screenshot 2024-02-01 143709.png', 'Screenshot 2024-02-01 143727.png', ''),
(30, 30, 'Screenshot 2024-02-01 143826.png', 'Screenshot 2024-02-01 143844.png', 'Screenshot 2024-02-01 143901.png', ''),
(31, 31, 'Screenshot 2024-02-01 144002.png', 'Screenshot 2024-02-01 144021.png', '', ''),
(32, 32, 'Screenshot 2024-02-01 144208.png', 'Screenshot 2024-02-01 144233.png', '', ''),
(33, 33, 'Screenshot 2024-02-01 144322.png', 'Screenshot 2024-02-01 144339.png', 'Screenshot 2024-02-01 144358.png', ''),
(34, 34, 'Screenshot 2024-02-01 144643.png', 'Screenshot 2024-02-01 144707.png', '', ''),
(35, 35, 'Screenshot 2024-02-01 144821.png', '', '', ''),
(36, 36, 'Screenshot 2024-02-01 162542.png', 'Screenshot 2024-02-01 162600.png', '', ''),
(37, 37, 'Screenshot 2024-02-01 162705.png', 'Screenshot 2024-02-01 162733.png', '', ''),
(38, 38, 'Screenshot 2024-02-01 162831.png', 'Screenshot 2024-02-01 162847.png', '', ''),
(39, 39, 'Screenshot 2024-02-01 162937.png', 'Screenshot 2024-02-01 162956.png', '', ''),
(40, 40, 'Screenshot 2024-02-01 163048.png', 'Screenshot 2024-02-01 163105.png', 'Screenshot 2024-02-01 163121.png', ''),
(41, 41, 'Screenshot 2024-02-01 163217.png', 'Screenshot 2024-02-01 163237.png', 'Screenshot 2024-02-01 163254.png', ''),
(42, 42, 'Screenshot 2024-02-01 163348.png', 'Screenshot 2024-02-01 163404.png', 'Screenshot 2024-02-01 163424.png', ''),
(43, 43, 'Screenshot 2024-02-01 163715.png', 'Screenshot 2024-02-01 163734.png', 'Screenshot 2024-02-01 163749.png', 'Screenshot 2024-02-01 163805.png'),
(44, 44, 'Screenshot 2024-02-01 163929.png', 'Screenshot 2024-02-01 163947.png', 'Screenshot 2024-02-01 164002.png', 'Screenshot 2024-02-01 164017.png'),
(45, 45, 'Screenshot 2024-02-01 164130.png', 'Screenshot 2024-02-01 164146.png', 'Screenshot 2024-02-01 164201.png', 'Screenshot 2024-02-01 164113.png'),
(46, 46, 'Screenshot 2024-02-01 164335.png', 'Screenshot 2024-02-01 164354.png', '', ''),
(47, 47, 'Screenshot 2024-02-01 164453.png', 'Screenshot 2024-02-01 164512.png', 'Screenshot 2024-02-01 164531.png', ''),
(48, 48, 'Screenshot 2024-02-01 164708.png', 'Screenshot 2024-02-01 164725.png', '', ''),
(49, 49, 'Screenshot 2024-02-01 164851.png', 'Screenshot 2024-02-01 164909.png', '', ''),
(50, 50, 'Screenshot 2024-02-01 165117.png', 'Screenshot 2024-02-01 165057.png', 'Screenshot 2024-02-01 165039.png', 'Screenshot 2024-02-01 165016.png'),
(51, 51, 'Screenshot 2024-02-01 165225.png', 'Screenshot 2024-02-01 165211.png', '', ''),
(52, 52, 'Screenshot 2024-02-01 165401.png', 'Screenshot 2024-02-01 165346.png', 'Screenshot 2024-02-01 165327.png', ''),
(53, 53, 'Screenshot 2024-02-01 165524.png', 'Screenshot 2024-02-01 165546.png', 'Screenshot 2024-02-01 165603.png', ''),
(54, 54, 'Screenshot 2024-02-01 165710.png', 'Screenshot 2024-02-01 165731.png', 'Screenshot 2024-02-01 165749.png', ''),
(55, 55, 'Screenshot 2024-02-01 165842.png', 'Screenshot 2024-02-01 165900.png', 'Screenshot 2024-02-01 165917.png', ''),
(56, 56, 'Screenshot 2024-02-01 170017.png', 'Screenshot 2024-02-01 170034.png', 'Screenshot 2024-02-01 170052.png', ''),
(57, 57, 'Screenshot 2024-02-01 170141.png', 'Screenshot 2024-02-01 170155.png', 'Screenshot 2024-02-01 170210.png', 'Screenshot 2024-02-01 170225.png'),
(58, 58, 'Screenshot 2024-02-01 170318.png', 'Screenshot 2024-02-01 170333.png', '', ''),
(59, 59, 'Screenshot 2024-02-01 170433.png', 'Screenshot 2024-02-01 170448.png', 'Screenshot 2024-02-01 170502.png', 'Screenshot 2024-02-01 170515.png'),
(60, 60, 'Screenshot 2024-02-01 170615.png', 'Screenshot 2024-02-01 170631.png', 'Screenshot 2024-02-01 170730.png', ''),
(61, 61, 'Screenshot 2024-02-01 170824.png', 'Screenshot 2024-02-01 170839.png', 'Screenshot 2024-02-01 170854.png', ''),
(62, 62, 'Screenshot 2024-02-01 183646.png', 'Screenshot 2024-02-01 183702.png', 'Screenshot 2024-02-01 183722.png', 'Screenshot 2024-02-01 183739.png'),
(63, 63, 'Screenshot 2024-02-01 183851.png', 'Screenshot 2024-02-01 183909.png', 'Screenshot 2024-02-01 183929.png', 'Screenshot 2024-02-01 183945.png'),
(64, 64, 'Screenshot 2024-02-01 184046.png', 'Screenshot 2024-02-01 184108.png', 'Screenshot 2024-02-01 184128.png', ''),
(65, 65, 'Screenshot 2024-02-01 184236.png', 'Screenshot 2024-02-01 184255.png', '', ''),
(66, 66, 'Screenshot 2024-02-01 184707.png', 'Screenshot 2024-02-01 184738.png', 'Screenshot 2024-02-01 184753.png', ''),
(67, 67, 'Screenshot 2024-02-01 184854.png', 'Screenshot 2024-02-01 184910.png', 'Screenshot 2024-02-01 184928.png', ''),
(68, 68, 'Screenshot 2024-02-01 185021.png', 'Screenshot 2024-02-01 185038.png', '', ''),
(69, 69, 'Screenshot 2024-02-01 185144.png', 'Screenshot 2024-02-01 185206.png', 'Screenshot 2024-02-01 185225.png', ''),
(70, 70, 'Screenshot 2024-02-01 185329.png', 'Screenshot 2024-02-01 185352.png', 'Screenshot 2024-02-01 185409.png', ''),
(71, 71, 'Screenshot 2024-02-01 185459.png', 'Screenshot 2024-02-01 185517.png', 'Screenshot 2024-02-01 185536.png', ''),
(72, 72, 'Screenshot 2024-02-01 185626.png', 'Screenshot 2024-02-01 185642.png', 'Screenshot 2024-02-01 185658.png', ''),
(73, 73, 'Screenshot 2024-02-01 185742.png', 'Screenshot 2024-02-01 185757.png', '', ''),
(74, 74, 'Screenshot 2024-02-01 185840.png', 'Screenshot 2024-02-01 185857.png', 'Screenshot 2024-02-01 185915.png', ''),
(75, 75, 'Screenshot 2024-02-01 185958.png', 'Screenshot 2024-02-01 190020.png', 'Screenshot 2024-02-01 190037.png', ''),
(76, 76, 'Screenshot 2024-02-01 205210.png', 'Screenshot 2024-02-01 205227.png', '', ''),
(77, 77, 'Screenshot 2024-02-01 205356.png', 'Screenshot 2024-02-01 205414.png', '', ''),
(78, 78, 'Screenshot 2024-02-01 205501.png', 'Screenshot 2024-02-01 205526.png', '', ''),
(79, 79, 'Screenshot 2024-02-01 205626.png', 'Screenshot 2024-02-01 205649.png', 'Screenshot 2024-02-01 205712.png', 'Screenshot 2024-02-01 205726.png'),
(80, 80, 'Screenshot 2024-02-01 210025.png', 'Screenshot 2024-02-01 210042.png', 'Screenshot 2024-02-01 210100.png', ''),
(81, 81, 'Screenshot 2024-02-01 210147.png', 'Screenshot 2024-02-01 210206.png', '', ''),
(82, 82, 'Screenshot 2024-02-01 210258.png', 'Screenshot 2024-02-01 210317.png', 'Screenshot 2024-02-01 210332.png', ''),
(83, 83, 'Screenshot 2024-02-01 210454.png', 'Screenshot 2024-02-01 210514.png', '', ''),
(84, 84, 'Screenshot 2024-02-01 210604.png', 'Screenshot 2024-02-01 210628.png', 'Screenshot 2024-02-01 210644.png', ''),
(85, 85, 'Screenshot 2024-02-01 210740.png', 'Screenshot 2024-02-01 210802.png', 'Screenshot 2024-02-01 210815.png', ''),
(86, 86, 'Screenshot 2024-02-01 210911.png', 'Screenshot 2024-02-01 210927.png', 'Screenshot 2024-02-01 210945.png', ''),
(87, 87, 'Screenshot 2024-05-09 080429.png', 'Screenshot 2024-05-09 080448.png', 'Screenshot 2024-05-09 080512.png', ''),
(88, 88, 'Screenshot 2024-02-01 211200.png', 'Screenshot 2024-02-01 211215.png', '', ''),
(89, 89, 'Screenshot 2024-02-01 211305.png', 'Screenshot 2024-02-01 211320.png', '', ''),
(90, 90, 'Screenshot 2024-02-01 211413.png', 'Screenshot 2024-02-01 211429.png', '', ''),
(91, 91, 'Screenshot 2024-02-01 211515.png', 'Screenshot 2024-02-01 211541.png', 'Screenshot 2024-02-01 211558.png', ''),
(92, 92, 'Screenshot 2024-02-01 211709.png', 'Screenshot 2024-02-01 211724.png', 'Screenshot 2024-02-01 211745.png', ''),
(93, 93, 'Screenshot 2024-02-01 211955.png', 'Screenshot 2024-02-01 212011.png', 'Screenshot 2024-02-01 212024.png', ''),
(94, 94, 'Screenshot 2024-02-01 212114.png', 'Screenshot 2024-02-01 212132.png', 'Screenshot 2024-02-01 212145.png', ''),
(95, 95, 'Screenshot 2024-02-01 212231.png', 'Screenshot 2024-02-01 212247.png', '', ''),
(96, 96, 'Screenshot 2024-02-01 212411.png', 'Screenshot 2024-02-01 212429.png', 'Screenshot 2024-02-01 212445.png', ''),
(97, 97, 'Screenshot 2024-02-01 212532.png', 'Screenshot 2024-02-01 212547.png', 'Screenshot 2024-02-01 212611.png', ''),
(98, 98, 'Screenshot 2024-02-01 212656.png', 'Screenshot 2024-02-01 212714.png', '', ''),
(99, 99, 'Screenshot 2024-02-01 212758.png', 'Screenshot 2024-02-01 212816.png', '', ''),
(100, 100, 'Screenshot 2024-02-01 212946.png', 'Screenshot 2024-02-01 213000.png', '', ''),
(101, 101, 'Screenshot 2024-02-01 213051.png', 'Screenshot 2024-02-01 213105.png', '', ''),
(102, 102, 'Screenshot 2024-02-01 213203.png', 'Screenshot 2024-02-01 213236.png', 'Screenshot 2024-02-01 213221.png', ''),
(103, 103, 'Screenshot 2024-02-01 213320.png', 'Screenshot 2024-02-01 213336.png', 'Screenshot 2024-02-01 213353.png', ''),
(104, 104, 'Screenshot 2024-02-02 015010.png', 'Screenshot 2024-02-02 015036.png', 'Screenshot 2024-02-02 015114.png', ''),
(105, 105, 'Screenshot 2024-02-02 015222.png', 'Screenshot 2024-02-02 015238.png', 'Screenshot 2024-02-02 015256.png', ''),
(106, 106, 'Screenshot 2024-02-02 015347.png', 'Screenshot 2024-02-02 015409.png', 'Screenshot 2024-02-02 015430.png', ''),
(107, 107, 'Screenshot 2024-02-02 015525.png', 'Screenshot 2024-02-02 015544.png', '', ''),
(108, 108, 'Screenshot 2024-02-02 015634.png', 'Screenshot 2024-02-02 015653.png', 'Screenshot 2024-02-02 015710.png', ''),
(109, 109, 'Screenshot 2024-02-02 015817.png', 'Screenshot 2024-02-02 015836.png', 'Screenshot 2024-02-02 015853.png', ''),
(110, 110, 'Screenshot 2024-02-02 015947.png', 'Screenshot 2024-02-02 020006.png', 'Screenshot 2024-02-02 020022.png', ''),
(111, 111, 'Screenshot 2024-02-02 020202.png', 'Screenshot 2024-02-02 020223.png', '', ''),
(112, 112, 'Screenshot 2024-02-02 020328.png', 'Screenshot 2024-02-02 020345.png', '', ''),
(113, 113, 'Screenshot 2024-02-02 020453.png', 'Screenshot 2024-02-02 020605.png', '', ''),
(114, 114, 'Screenshot 2024-02-02 020658.png', 'Screenshot 2024-02-02 020715.png', '', ''),
(115, 115, 'Screenshot 2024-02-02 020815.png', 'Screenshot 2024-02-02 020833.png', 'Screenshot 2024-02-02 020851.png', ''),
(116, 116, 'Screenshot 2024-02-02 020957.png', 'Screenshot 2024-02-02 021011.png', '', ''),
(117, 117, 'Screenshot 2024-02-02 021056.png', 'Screenshot 2024-02-02 021113.png', '', ''),
(118, 118, 'Screenshot 2024-02-02 021152.png', 'Screenshot 2024-02-02 021205.png', '', ''),
(119, 119, 'Screenshot 2024-02-02 021254.png', 'Screenshot 2024-02-02 021308.png', 'Screenshot 2024-02-02 021323.png', ''),
(120, 120, 'Screenshot 2024-02-02 021625.png', 'Screenshot 2024-02-02 021641.png', '', ''),
(121, 121, 'Screenshot 2024-02-02 021740.png', 'Screenshot 2024-02-02 021758.png', '', ''),
(122, 122, 'Screenshot 2024-02-02 021842.png', '', '', ''),
(123, 123, 'Screenshot 2024-02-02 022056.png', 'Screenshot 2024-02-02 022111.png', 'Screenshot 2024-02-02 022123.png', ''),
(124, 124, 'Screenshot 2024-02-02 022213.png', 'Screenshot 2024-02-02 022228.png', '', ''),
(125, 125, 'Screenshot 2024-02-02 022325.png', 'Screenshot 2024-02-02 022341.png', '', ''),
(126, 126, 'Screenshot 2024-02-02 022433.png', '', '', ''),
(127, 127, 'Screenshot 2024-02-02 022524.png', '', '', ''),
(128, 128, 'Screenshot 2024-02-02 022610.png', '', '', ''),
(129, 129, 'Screenshot 2024-02-02 022646.png', '', '', ''),
(130, 130, 'Screenshot 2024-02-02 022937.png', 'Screenshot 2024-02-02 022913.png', '', ''),
(131, 131, 'Screenshot 2024-02-02 023309.png', 'Screenshot 2024-02-02 023328.png', 'Screenshot 2024-02-02 023346.png', ''),
(132, 132, 'Screenshot 2024-02-02 023531.png', 'Screenshot 2024-02-02 023552.png', '', ''),
(133, 133, 'Screenshot 2024-02-02 023648.png', 'Screenshot 2024-02-02 023706.png', '', ''),
(134, 134, 'Screenshot 2024-02-02 023758.png', 'Screenshot 2024-02-02 023813.png', 'Screenshot 2024-02-02 023828.png', ''),
(135, 135, 'Screenshot 2024-02-02 023921.png', 'Screenshot 2024-02-02 023938.png', '', ''),
(136, 136, 'Screenshot 2024-02-02 024028.png', '', '', ''),
(137, 137, 'Screenshot 2024-02-02 024116.png', '', '', ''),
(138, 138, 'Screenshot 2024-02-02 024215.png', '', '', ''),
(139, 139, 'Screenshot 2024-02-02 024311.png', '', '', ''),
(140, 140, 'Screenshot 2024-02-02 024410.png', '', '', ''),
(141, 141, 'Screenshot 2024-02-02 024521.png', '', '', ''),
(142, 142, 'Screenshot 2024-02-02 024634.png', 'Screenshot 2024-02-02 024651.png', '', ''),
(143, 143, 'Screenshot 2024-02-02 024748.png', 'Screenshot 2024-02-02 024807.png', '', ''),
(144, 144, 'Screenshot 2024-02-02 024900.png', 'Screenshot 2024-02-02 024916.png', '', ''),
(145, 145, 'Screenshot 2024-02-02 025003.png', '', '', ''),
(146, 146, 'Screenshot 2024-02-02 025112.png', 'Screenshot 2024-02-02 025130.png', '', ''),
(147, 147, 'Screenshot 2024-02-02 025224.png', 'Screenshot 2024-02-02 025240.png', '', ''),
(148, 148, 'Screenshot 2024-02-02 025416.png', 'Screenshot 2024-02-02 025401.png', '', ''),
(149, 149, 'Screenshot 2024-02-02 025506.png', '', '', ''),
(150, 150, 'Screenshot 2024-02-02 025745.png', 'Screenshot 2024-02-02 025804.png', '', ''),
(151, 151, 'Screenshot 2024-02-02 025903.png', '', '', ''),
(152, 152, 'Screenshot 2024-02-02 025952.png', 'Screenshot 2024-02-02 030011.png', 'Screenshot 2024-02-02 030027.png', ''),
(153, 153, 'Screenshot 2024-02-02 030129.png', 'Screenshot 2024-02-02 030148.png', 'Screenshot 2024-02-02 030203.png', ''),
(154, 154, 'Screenshot 2024-02-02 030318.png', 'Screenshot 2024-02-02 030335.png', '', ''),
(155, 155, 'Screenshot 2024-02-02 112419.png', 'Screenshot 2024-02-02 112440.png', '', ''),
(156, 156, 'Screenshot 2024-02-02 112536.png', '', '', ''),
(157, 157, 'Screenshot 2024-02-02 112626.png', '', '', ''),
(158, 158, 'Screenshot 2024-02-02 112720.png', 'Screenshot 2024-02-02 112747.png', '', ''),
(159, 159, 'Screenshot 2024-02-02 112837.png', 'Screenshot 2024-02-02 112857.png', '', ''),
(160, 160, 'Screenshot 2024-02-02 112950.png', 'Screenshot 2024-02-02 113007.png', '', ''),
(161, 161, 'Screenshot 2024-02-02 113049.png', 'Screenshot 2024-02-02 113112.png', '', ''),
(162, 162, 'Screenshot 2024-02-02 113157.png', 'Screenshot 2024-02-02 113213.png', '', ''),
(163, 163, 'Screenshot 2024-02-02 113305.png', 'Screenshot 2024-02-02 113327.png', '', ''),
(164, 164, 'Screenshot 2024-02-02 113429.png', 'Screenshot 2024-02-02 113443.png', '', ''),
(165, 165, 'Screenshot 2024-02-02 113530.png', '', '', ''),
(166, 166, 'Screenshot 2024-02-02 113620.png', '', '', ''),
(167, 167, 'Screenshot 2024-02-02 113705.png', '', '', ''),
(168, 168, 'Screenshot 2024-02-02 113746.png', 'Screenshot 2024-02-02 113804.png', '', ''),
(169, 169, 'Screenshot 2024-02-02 113917.png', 'Screenshot 2024-02-02 113933.png', '', ''),
(170, 170, 'Screenshot 2024-02-02 114016.png', 'Screenshot 2024-02-02 114032.png', '', ''),
(171, 171, 'Screenshot 2024-02-02 114133.png', 'Screenshot 2024-02-02 114147.png', '', ''),
(172, 172, 'Screenshot 2024-02-02 114758.png', 'Screenshot 2024-02-02 114817.png', '', ''),
(173, 173, 'Screenshot 2024-02-02 114909.png', 'Screenshot 2024-02-02 114926.png', '', ''),
(174, 174, 'Screenshot 2024-02-02 115008.png', 'Screenshot 2024-02-02 115024.png', '', ''),
(175, 175, 'Screenshot 2024-02-02 115152.png', 'Screenshot 2024-02-02 115210.png', '', ''),
(176, 176, 'Screenshot 2024-02-02 115254.png', '', '', ''),
(177, 177, 'Screenshot 2024-02-02 115341.png', '', '', ''),
(178, 178, 'Screenshot 2024-02-02 115426.png', 'Screenshot 2024-02-02 115446.png', '', ''),
(179, 179, 'Screenshot 2024-02-02 115529.png', 'Screenshot 2024-02-02 115545.png', '', ''),
(180, 180, 'Screenshot 2024-02-02 115627.png', '', '', ''),
(181, 181, 'Screenshot 2024-02-02 115707.png', '', '', ''),
(182, 182, 'Screenshot 2024-02-02 115745.png', '', '', ''),
(183, 183, 'Screenshot 2024-02-02 115823.png', '', '', ''),
(184, 184, 'Screenshot 2024-02-02 125214.png', 'Screenshot 2024-02-02 125237.png', 'Screenshot 2024-02-02 125257.png', 'Screenshot 2024-02-02 125318.png'),
(185, 185, 'Screenshot 2024-02-02 125505.png', 'Screenshot 2024-02-02 125440.png', '', ''),
(186, 186, 'Screenshot 2024-02-02 125603.png', 'Screenshot 2024-02-02 125622.png', 'Screenshot 2024-02-02 125640.png', ''),
(187, 187, 'Screenshot 2024-02-02 125752.png', 'Screenshot 2024-02-02 125733.png', '', ''),
(188, 188, 'Screenshot 2024-02-02 125846.png', 'Screenshot 2024-02-02 125905.png', '', ''),
(189, 189, 'Screenshot 2024-02-02 125955.png', 'Screenshot 2024-02-02 130017.png', 'Screenshot 2024-02-02 130035.png', ''),
(190, 190, 'Screenshot 2024-02-02 130127.png', 'Screenshot 2024-02-02 130143.png', '', ''),
(191, 191, 'Screenshot 2024-02-02 130233.png', '', '', ''),
(192, 192, 'Screenshot 2024-02-02 130332.png', 'Screenshot 2024-02-02 130353.png', '', ''),
(193, 193, 'Screenshot 2024-02-02 130437.png', '', '', ''),
(194, 194, 'Screenshot 2024-02-02 130533.png', 'Screenshot 2024-02-02 130600.png', '', ''),
(195, 195, 'Screenshot 2024-02-02 130657.png', 'Screenshot 2024-02-02 130715.png', '', ''),
(196, 196, 'Screenshot 2024-02-02 130801.png', 'Screenshot 2024-02-02 130821.png', '', ''),
(197, 197, 'Screenshot 2024-02-02 130924.png', '', '', ''),
(198, 198, 'Screenshot 2024-02-02 131036.png', '', '', ''),
(199, 199, 'Screenshot 2024-02-02 131115.png', 'Screenshot 2024-02-02 131132.png', 'Screenshot 2024-02-02 131146.png', ''),
(200, 200, 'Screenshot 2024-02-02 131236.png', 'Screenshot 2024-02-02 131252.png', '', ''),
(201, 201, 'Screenshot 2024-02-02 131525.png', 'Screenshot 2024-02-02 131541.png', 'Screenshot 2024-02-02 131556.png', 'Screenshot 2024-02-02 131503.png'),
(202, 202, 'Screenshot 2024-02-02 131657.png', 'Screenshot 2024-02-02 131710.png', 'Screenshot 2024-02-02 131643.png', ''),
(203, 203, 'Screenshot 2024-02-02 131857.png', 'Screenshot 2024-02-02 131842.png', 'Screenshot 2024-02-02 131826.png', 'Screenshot 2024-02-02 131800.png'),
(204, 204, 'Screenshot 2024-02-02 131956.png', '', '', ''),
(205, 205, 'Screenshot 2024-02-02 132031.png', 'Screenshot 2024-02-02 132055.png', '', ''),
(212, 212, 'Screenshot 2024-05-28 145027.png', 'Screenshot 2024-05-28 145049.png', '', ''),
(214, 214, 'Screenshot 2024-06-16 143754.png', 'Screenshot 2024-06-16 143726.png', '', ''),
(215, 215, 'Screenshot 2024-06-16 173503.png', 'Screenshot 2024-06-16 173522.png', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` bigint(20) NOT NULL,
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sdt` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tinh` varchar(50) NOT NULL,
  `huyen` varchar(50) NOT NULL,
  `xa` varchar(50) NOT NULL,
  `sonha` varchar(50) NOT NULL,
  `matkhau` text NOT NULL,
  `hoatdong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `hoten`, `sdt`, `tinh`, `huyen`, `xa`, `sonha`, `matkhau`, `hoatdong`) VALUES
(1, 'Kiều Phương Thảo', '0111111111', 'Tỉnh Lào Cai', 'Huyện Kim Bảng', 'Thị trấn Quế', 'Số 17 Đường Biên Hòa', '$2y$10$.My0P4SnoHPymyqQi.x.4.AA0sg/enCELJUv9OWzeX66pEfronZtm', 1),
(2, 'Trần Tuấn Anh', '0222222222', 'Thành phố Hà Nội', 'Quận Hoàng Mai', 'Phường Lĩnh Nam', 'Số 467 Lĩnh Nam', '$2y$10$gGrCrHnvxiik6aIZRLyhcOEzaYVgR7FOdhsSUWg4vMulvTnm3tt6u', 1),
(3, 'Nguyễn Như Quỳnh', '0333333333', 'Thành phố Hà Nội', 'Quận Hai Bà Trưng', 'Phường Bách Khoa', 'Số 18 Tạ Quang Bửu', '$2y$10$GZLPmDHXh69UmXUbueNJ0etFMopIv7ZjxYja0sg45yuNWDGtxXA1.', 1),
(4, 'Hoa', '0444444444', '', '', '', '', '$2y$10$2K5vWUYrRhC6f8GPRaiR6u45iBNAmP1.drUmmcrSwMMH5AqM7ORZW', 1),
(5, 'Quỳnh', '0555555555', '', '', '', '', '', 1),
(6, 'Lan', '0666666666', '', '', '', '', '', 1),
(7, 'Huệ', '0111111112', '', '', '', '', '', 1),
(8, 'Trần Thu Hà', '0188888889', 'Thành phố Hà Nội', 'Quận Cầu Giấy', 'Phường Nghĩa Đô', 'Khu đô thị Nghĩa Đô', '$2y$10$QYLp1SXPeol6T7lpoBMd4u6tA24CA/21KVq31RKt7550/85AUBWLq', 1),
(9, 'Vũ Thu Huyền', '0199999998', 'Tỉnh Sơn La', 'Thành phố Sơn La', 'Phường Quyết Tâm', 'Số 8 Đường Chiến Thắng', '$2y$10$bjmkN7n7Ms2YBe9SRGQbNO0MLbafRzW./IfL.Hc70tCeyJ3JqbGm2', 1),
(10, 'Đinh Thanh Loan', '0199999978', 'Tỉnh Bắc Ninh', 'Thành phố Bắc Ninh', 'Phường Tiền An', 'Số 5 Tiền An', '$2y$10$F/Mmyui7pNHyDRtdO2NiQebWOX/HO5nbFwyHDmuVjIgk1R7YvHeAK', 1),
(11, 'Trương Thị Tiên', '0155555558', 'Tỉnh Thanh Hóa', 'Huyện Thọ Xuân', 'Xã Xuân Trường', 'Gần trạm y tế', '$2y$10$WCjBA5InE0.OukaRcN45su06Ur8T4ngJrTVOJk/KpcpZ6mOSYSf2m', 1),
(12, 'Lương Thị Duyên', '0155555565', 'Thành phố Hà Nội', 'Huyện Thường Tín', 'Xã Chương Dương', 'Gần nhà văn hóa', '$2y$10$wq8pQp5RtLLvzQk/ywEdY.iwIlko4T0mldaHiAoyTXbZlP3FfmN7W', 0),
(14, 'Phương', '0789789789', '', '', '', '', '', 1),
(15, 'Chi', '0123123123', '', '', '', '', '', 1),
(16, 'Trang', '0456456456', '', '', '', '', '', 1),
(17, 'Vân', '0147147147', '', '', '', '', '', 1),
(44, 'Linh', '0111122222', '', '', '', '', '', 1),
(46, 'Hà Chi', '0152478963', '', '', '', '', '', 1),
(47, 'Nga', '0145278963', '', '', '', '', '', 1),
(48, 'Ngân', '0141414141', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` bigint(20) NOT NULL,
  `makhuyenmai` text NOT NULL,
  `idsoluong` bigint(20) NOT NULL,
  `masanpham` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `makhuyenmai`, `idsoluong`, `masanpham`) VALUES
(36, 'KM0202', 7, 'SP02'),
(37, 'KM0202', 15, 'SP05'),
(38, 'KM0202', 16, 'SP05'),
(39, 'KM0202', 14, 'SP05'),
(40, 'KM020201', 8, 'SP02'),
(41, 'KM2205', 18, 'SP06'),
(42, 'KM2205', 19, 'SP06'),
(43, 'KM2205', 20, 'SP06'),
(44, 'KM2205', 34, 'SP013'),
(45, 'KM2205', 37, 'SP014'),
(46, 'KM2205', 425, 'SP079'),
(47, 'KM2205', 491, 'SP0107'),
(48, 'KM2205', 496, 'SP0111'),
(49, 'KM2205', 668, 'SP0204'),
(51, 'KM2905', 1, 'SP03'),
(52, 'KM2905', 2, 'SP03'),
(53, 'KM2905', 5, 'SP02'),
(54, 'KM2905', 6, 'SP02'),
(55, 'KM0106', 10, 'SP01'),
(56, 'KM0106', 9, 'SP01'),
(57, 'KM0106', 24, 'SP011'),
(58, 'KM0106', 35, 'SP013'),
(59, 'KM0106', 36, 'SP013'),
(61, 'KM0406', 31, 'SP012'),
(62, 'KM0406', 32, 'SP012'),
(63, 'KM0406', 33, 'SP012'),
(64, 'KM0406', 38, 'SP017'),
(65, 'KM0406', 39, 'SP017'),
(66, 'KM0406', 40, 'SP017'),
(67, 'KM0406', 230, 'SP018'),
(68, 'KM0406', 231, 'SP019'),
(69, 'KM0406', 232, 'SP019'),
(70, 'KM0406', 233, 'SP019'),
(71, 'KM0406', 234, 'SP019'),
(72, 'KM0406', 235, 'SP019'),
(73, 'KM0406', 236, 'SP019'),
(74, 'KM0506', 12, 'SP04'),
(75, 'KM0506', 237, 'SP020'),
(76, 'KM0506', 238, 'SP020'),
(77, 'KM0506', 239, 'SP020'),
(78, 'SANSALETHANG7', 240, 'SP021'),
(79, 'SANSALETHANG7', 241, 'SP021'),
(80, 'SANSALETHANG7', 242, 'SP021'),
(81, 'SANSALETHANG7', 243, 'SP021'),
(82, 'SANSALETHANG7', 245, 'SP021'),
(83, 'SANSALETHANG7', 244, 'SP021'),
(84, 'SANSALETHANG7', 249, 'SP023'),
(85, 'SANSALETHANG7', 248, 'SP023'),
(86, 'SANSALETHANG7', 250, 'SP023'),
(87, 'SANSALETHANG7', 253, 'SP025'),
(88, 'SANSALETHANG7', 273, 'SP033'),
(89, 'SANSALETHANG7', 282, 'SP035'),
(90, 'SANSALETHANG7', 286, 'SP037'),
(91, 'SANSALETHANG7', 300, 'SP040'),
(92, 'SANSALETHANG7', 307, 'SP042'),
(93, 'thang7', 254, 'SP025'),
(94, 'thang7', 255, 'SP025');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lohang`
--

CREATE TABLE `lohang` (
  `id` bigint(20) NOT NULL,
  `malohang` varchar(20) NOT NULL,
  `ngaynhaphang` date NOT NULL,
  `idnhanvien` bigint(20) NOT NULL,
  `idnhacungcap` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lohang`
--

INSERT INTO `lohang` (`id`, `malohang`, `ngaynhaphang`, `idnhanvien`, `idnhacungcap`) VALUES
(23, 'lohang1212', '2023-12-12', 0, 1),
(25, 'lohang1213', '2023-12-13', 0, 2),
(26, 'lohang1412', '2023-12-14', 0, 3),
(27, 'lotep1412', '2023-12-14', 0, 1),
(28, 'lohang3001Tep', '2024-01-29', 0, 3),
(29, 'lohangpa0102', '2024-02-01', 0, 2),
(30, 'lohang1404', '2024-04-14', 0, 1),
(31, 'loJM1402', '2024-04-14', 0, 3),
(32, 'lohangjmchieu', '2024-04-14', 0, 3),
(33, 'lohangQT2104', '2024-04-21', 0, 4),
(34, 'lohangPA2104', '2024-04-21', 0, 2),
(35, 'lohangJM2104', '2024-04-21', 0, 3),
(36, 'lohangtep2304', '2024-04-23', 0, 1),
(37, 'lohangpa2304', '2024-04-23', 0, 2),
(38, 'lohangjm2304', '2024-04-23', 0, 3),
(39, 'lohang0805Tep', '2024-05-07', 0, 1),
(40, 'lohang0805pa', '2024-05-08', 0, 2),
(41, 'lohang0805jm', '2024-05-08', 0, 3),
(42, 'lohang0905qt', '2024-05-08', 0, 4),
(43, 'lohang0905Tep', '2024-05-09', 0, 1),
(44, 'lohang1005jm', '2024-05-10', 0, 3),
(45, 'lohang1105pa', '2024-05-11', 0, 2),
(46, 'lohang1205qt', '2024-05-12', 0, 4),
(47, 'lohang1205pa', '2024-05-12', 0, 2),
(48, 'lohang1205tep', '2024-05-13', 0, 1),
(49, 'lohang1405pa', '2024-05-14', 0, 2),
(50, 'lohang1505tep', '2024-05-15', 0, 1),
(51, 'lohang1505qt', '2024-05-15', 0, 4),
(52, 'lohang1505jm', '2024-05-15', 0, 3),
(54, 'lohang2905tep', '2024-05-29', 17, 1),
(58, 'lohang1606pa', '2024-06-16', 0, 2),
(59, 'lohang2306upstu', '2024-06-22', 0, 5),
(60, 'lohangqt1207', '2024-07-12', 0, 4),
(61, 'lohangjm1407', '2024-07-14', 0, 3),
(62, 'lohangjm1507', '2024-07-15', 0, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` bigint(20) NOT NULL,
  `manhacungcap` varchar(50) NOT NULL,
  `tennhacungcap` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `manhacungcap`, `tennhacungcap`, `sdt`, `diachi`, `trangthai`) VALUES
(1, 'teplinhhiep', 'Tép', '0111222333', 'Linh Hiệp, Hà Nội', 1),
(2, 'phuonganh', 'Phương Anh', '0444555666', 'Vĩnh Phúc', 1),
(3, 'jmstudio', 'J & M studio', '0555777999', 'Linh Hiệp, Hà Nội', 1),
(4, 'xuongmayqt', 'Xưởng may QT', '0152463987', 'Linh Hiệp, Hà Nội', 1),
(5, 'upsto', 'Up Studio', '0654128793', 'Linh Hiệp, Hà Nội', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` bigint(20) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `vitri` bigint(20) NOT NULL,
  `matkhau` text NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `hoten`, `sdt`, `diachi`, `vitri`, `matkhau`, `trangthai`) VALUES
(10, 'Kiều Phương Thảo', '0969068710', 'Hoàng Mai, Hà Nội', 30, '$2y$10$l630D..xjJcfPkHbP5vRzO0sd51E17BxGCwbYcMPBtS8Xvb6I2BIC', 1),
(11, 'Trần Văn A', '0587421369', 'Thanh Xuân, Hà Nội', 31, '$2y$10$kr9WwONmpi4N8OpVEoTe9OaGOy9SGyud6ZIq6x3GLa66q65/kjwcG', 1),
(16, 'Trần Thu Hà', '0147852369', 'Hoàng Mai, Hà Nội', 30, '', 0),
(17, 'Trần Trung Quỳnh', '0366600176', 'Hai Bà Trưng, Hà Nội', 37, '$2y$10$HEUMnj5uWbuZclxwNSGSU.C.ShY.MyLiMlWpT4rnVQDgk/XdzvNlu', 1),
(18, 'Kiều Thanh Lan', '0369852147', 'Hai Bà Trưng, Hà Nội', 39, '$2y$10$HEUMnj5uWbuZclxwNSGSU.C.ShY.MyLiMlWpT4rnVQDgk/XdzvNlu', 1),
(19, 'Nguyễn Trần Ân', '0365303112', 'Hai Bà Trưng, Hà Nội', 37, '$2y$10$V5wUavzuq5t0Neet6KnX.esR14oFUvmXjbuHNqVvhs2TainfoEsVG', 1),
(20, 'Vũ Đình Hoài', '0145287963', 'Hai Bà Trưng, Hà Nội', 30, '', 1),
(21, 'test', '0123456789', 'Hai Bà Trưng, Hà Nội', 31, '$2y$10$ZoH7la0PkgbBKJxBofNJs.XLLMQ/k3g1cvBNcCw7vnrUPfr5Dbz1m', 0),
(22, 'Nguyễn Đình Hà', '0245136987', 'Hai Bà Trưng, Hà Nội', 31, '$2y$10$Daezvqrymr3nHLvmB.cmDeG8M1eFDg3MvM0iDm8gomJ.q10/uiZ6y', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `id` bigint(11) NOT NULL,
  `tennhomquyen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`id`, `tennhomquyen`) VALUES
(30, 'Nhân viên bán hàng'),
(31, 'Nhân viên kho hàng'),
(37, 'Admin'),
(39, 'Nhân viên sản phẩm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloaisanpham`
--

CREATE TABLE `phanloaisanpham` (
  `id` bigint(20) NOT NULL,
  `loaisanpham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloaisanpham`
--

INSERT INTO `phanloaisanpham` (`id`, `loaisanpham`) VALUES
(1, 'Áo'),
(9, 'Quần'),
(10, 'Bộ'),
(11, 'Đồ mặc nhà'),
(13, 'Váy'),
(15, 'Đồ mặc ngoài'),
(16, 'Đồ mặc trong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` bigint(20) NOT NULL,
  `idnhomquyen` bigint(20) NOT NULL,
  `idquyentruycap` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `idnhomquyen`, `idquyentruycap`) VALUES
(106, 31, 2),
(107, 31, 3),
(108, 31, 4),
(109, 31, 5),
(110, 31, 12),
(111, 31, 13),
(112, 31, 14),
(113, 31, 15),
(136, 30, 3),
(137, 30, 4),
(138, 30, 8),
(139, 30, 9),
(140, 30, 11),
(168, 39, 3),
(169, 39, 4),
(170, 39, 9),
(171, 39, 10),
(172, 39, 12),
(173, 39, 14),
(174, 37, 2),
(175, 37, 3),
(176, 37, 4),
(177, 37, 5),
(178, 37, 8),
(179, 37, 9),
(180, 37, 10),
(181, 37, 11),
(182, 37, 12),
(183, 37, 13),
(184, 37, 14),
(185, 37, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyentruycap`
--

CREATE TABLE `quyentruycap` (
  `id` bigint(20) NOT NULL,
  `tenquyentruycap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyentruycap`
--

INSERT INTO `quyentruycap` (`id`, `tenquyentruycap`) VALUES
(2, 'Thêm sản phẩm'),
(3, 'Tìm kiếm sản phẩm'),
(4, 'Xem danh sách sản phẩm'),
(5, 'Xóa/Sửa sản phẩm'),
(8, 'Quản lý đơn hàng'),
(9, 'Quản lý danh mục sản phẩm'),
(10, 'Quản lý khuyến mại'),
(11, 'Quản lý khách hàng'),
(12, 'Quản lý số lượng tồn kho'),
(13, 'Quản lý lô hàng sản phẩm'),
(14, 'Phân loại sản phẩm'),
(15, 'Quản lý nhà cung cấp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` bigint(20) NOT NULL,
  `masanpham` varchar(50) NOT NULL,
  `tensanpham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idthongtinsanpham` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `masanpham`, `tensanpham`, `idthongtinsanpham`) VALUES
(2, 'SP01', 'Áo babytee', 2),
(3, 'SP02', 'Quần short vải có khóa', 3),
(4, 'SP03', 'Áo phông chữ Hot Memato', 4),
(5, 'SP04', 'Yếm bò kèm áo', 5),
(6, 'SP05', 'Đồ ngủ họa tiết dễ thương', 6),
(7, 'SP06', 'Quần Jean ống đứng', 7),
(10, 'SP011', 'Áo len nữ cộc tay', 10),
(11, 'SP012', 'Áo phông nữ cotton dáng ngắn in chữ', 11),
(12, 'SP013', 'Áo phông nữ interlock cổ tròn có túi ngực', 12),
(13, 'SP014', 'Áo phông nữ', 13),
(16, 'SP017', 'Áo phông nữ interlock dài tay dáng crop top', 16),
(17, 'SP018', 'Áo phông nữ dáng ôm', 17),
(18, 'SP019', 'Áo phông nữ cotton có hình in Winnie The Pooh dáng', 18),
(19, 'SP020', 'Áo polo nữ interlock dáng ngắn', 19),
(20, 'SP021', 'Áo polo nữ interlock dáng ngắn phối màu', 20),
(21, 'SP022', 'Áo polo nữ basic', 21),
(22, 'SP023', 'Áo polo nữ basic cổ bẻ cộc tay', 22),
(23, 'SP024', 'Áo ba lỗ nữ cổ tròn dáng ôm in họa tiết kẻ', 23),
(24, 'SP025', 'Áo ba lỗ nữ dáng ôm', 24),
(25, 'SP026', 'Áo ba lỗ nữ active cổ tròn đuôi tôm dáng suông', 25),
(26, 'SP027', 'Áo ba lỗ nữ cổ tròn dáng ôm', 26),
(27, 'SP028', 'Áo sát nách nữ cổ tròn bo chun gấu', 27),
(28, 'SP029', 'Áo sát nách nữ vai cánh tiên', 28),
(29, 'SP030', 'Áo hai dây nữ dáng ôm', 29),
(30, 'SP031', 'Áo ba lỗ nữ in loang dáng ôm', 30),
(31, 'SP032', 'Áo ba lỗ nữ dáng ôm', 31),
(32, 'SP033', 'Áo kiểu nữ dài tay ánh nhũ cổ đức dáng ôm', 32),
(33, 'SP034', 'Áo kiểu nữ dài tay cổ cách điệu', 33),
(34, 'SP035', 'Áo phông nữ cổ vuông tay bồng dáng ôm', 34),
(35, 'SP036', 'Áo kiểu nữ cotton cổ V tay phồng in họa tiết', 35),
(36, 'SP037', 'Áo kiểu nữ hai dây bản to cổ vuông', 36),
(37, 'SP038', 'Áo sơ mi nữ dài tay dáng suông', 37),
(38, 'SP039', 'Áo sơ mi nữ dài tay dáng ngắn', 38),
(39, 'SP040', 'Áo sơ mi nữ cotton cổ đức tay chờm', 39),
(40, 'SP041', 'Áo sơ mi nữ cotton cổ đức dài tay in họa tiết', 40),
(41, 'SP042', 'Áo sơ mi nữ cotton cổ đức', 41),
(42, 'SP043', 'Áo sơ mi nữ cổ đức', 42),
(43, 'SP044', 'Áo phông dài tay nữ phối kim tuyến', 43),
(44, 'SP045', 'Áo len nữ cổ bẻ', 44),
(45, 'SP046', 'Áo len nữ cổ tròn tay lửng', 45),
(46, 'SP047', 'Áo len nữ cổ polo tay lửng dáng ôm', 46),
(47, 'SP048', 'Áo len nữ cotton cổ leo dáng ôm', 47),
(48, 'SP049', 'Áo len nữ cộc tay cổ polo', 48),
(49, 'SP050', 'Áo len polo nữ dài tay', 49),
(50, 'SP051', 'Áo len nữ cổ tròn dáng vừa', 50),
(51, 'SP052', 'Áo len nữ', 51),
(52, 'SP053', 'Áo len gilet nữ vặn thừng cổ tim', 52),
(53, 'SP054', 'Áo len gilet nữ', 53),
(54, 'SP055', 'Áo len nữ lông cừu cổ tròn dài tay', 54),
(55, 'SP056', 'Áo len nữ dáng dài', 55),
(56, 'SP057', 'Áo len nữ cổ lọ dệt loang', 56),
(57, 'SP058', 'Áo len nữ cổ tròn tay lửng', 57),
(58, 'SP059', 'Áo len cổ lọ nữ dài tay dáng ôm', 58),
(59, 'SP060', 'Áo len nữ lông cừu cổ tròn dài tay', 59),
(60, 'SP061', 'Áo len nữ cổ tròn tay phồng nhẹ', 60),
(61, 'SP062', 'Áo len nữ cổ tròn dài tay', 61),
(62, 'SP063', 'Áo nỉ nữ có hình in', 62),
(63, 'SP064', 'Áo nỉ nữ bo gấu có hình in', 63),
(64, 'SP065', 'Áo nỉ nữ', 64),
(65, 'SP066', 'Áo nỉ nữ', 65),
(66, 'SP067', 'Áo nỉ nữ', 66),
(67, 'SP068', 'Áo nỉ nữ basic cổ tròn', 67),
(68, 'SP069', 'Áo nỉ nữ basic cổ tròn', 68),
(69, 'SP070', 'Áo nỉ nữ phối cổ', 69),
(70, 'SP071', 'Áo nỉ nữ có hình in', 70),
(71, 'SP072', 'Áo nỉ nữ có hình in', 71),
(72, 'SP073', 'Áo nỉ nữ cổ tròn dài tay có hình in', 72),
(73, 'SP074', 'Áo nỉ nữ cổ tròn dài tay có hình in', 73),
(74, 'SP075', 'Áo nỉ nữ có hình in', 74),
(75, 'SP076', 'Áo nỉ nữ cổ cao tay phồng có hình in', 75),
(76, 'SP077', 'Áo nỉ nữ có mũ dáng rộng', 76),
(77, 'SP078', 'Áo nỉ nữ có mũ dáng oversize in hình Bambi & Micke', 77),
(78, 'SP079', 'Áo nỉ nữ có mũ dáng rộng', 78),
(79, 'SP080', 'Áo nỉ có mũ unisex người lớn', 79),
(80, 'SP081', 'Quần soóc nữ interlock có dây rút', 80),
(81, 'SP082', 'Quần soóc dạ kẻ nữ', 81),
(82, 'SP083', 'Quần soóc nữ cotton có lớp lót dáng suông', 82),
(83, 'SP084', 'Quần shorts nữ Canifa Z', 83),
(84, 'SP085', 'Quần soóc nữ cotton dáng suông', 84),
(85, 'SP086', 'Quần soóc nữ cotton dáng suông', 85),
(86, 'SP087', 'Quần soóc nữ cạp chun', 86),
(87, 'SP088', 'Quần soóc nữ cotton cạp nhún chun', 87),
(88, 'SP089', 'Quần soóc nữ cạp chun dáng suông', 88),
(89, 'SP090', 'Quần soóc cotton jeans cạp nhún chun dáng suông', 89),
(90, 'SP091', 'Quần soóc jeans nữ cotton dáng suông', 90),
(91, 'SP092', 'Quần soóc nữ active cạp chun', 91),
(92, 'SP093', 'Quần soóc wicking active nữ dáng ôm', 92),
(93, 'SP094', 'Quần soóc nữ cạp chun', 93),
(94, 'SP095', 'Quần soóc nữ cotton USA màu loang', 94),
(95, 'SP096', 'Quần soóc nữ active', 95),
(96, 'SP097', 'Quần jeans nữ', 96),
(97, 'SP098', 'Quần jeans nữ dáng flare', 97),
(98, 'SP099', 'Quần jeans nữ cotton cạp nhún chun dáng slouchy', 98),
(99, 'SP0100', 'Quần jeans nữ dáng flare', 99),
(100, 'SP0101', 'Quần jeans nữ dáng ôm', 100),
(101, 'SP0102', 'Quấn jeans nữ cotton cài cúc dáng suông', 101),
(102, 'SP0103', 'Quần jeans nữ dáng mom', 102),
(103, 'SP0104', 'Quần jeans nữ dáng flare', 103),
(104, 'SP0105', 'Quần dài nữ interlock ống suông có dây rút', 104),
(105, 'SP0106', 'Quần áo dài len nữ', 105),
(106, 'SP0107', 'Quần dài nữ họa tiết dáng suông rộng', 106),
(107, 'SP0108', 'Quần dài nữ cotton cạp chun dáng suông rộng', 107),
(108, 'SP0109', 'Quần dài nữ dáng suông', 108),
(109, 'SP0110', 'Quần dài nữ dáng suông', 109),
(110, 'SP0111', 'Quần dài nữ dáng suông', 110),
(111, 'SP0112', 'Quần nỉ nữ basic dáng jogger', 111),
(112, 'SP0113', 'Quần dài nữ chất liệu gió túi hộp', 112),
(113, 'SP0114', 'Quần nỉ nữ basic dáng jogger', 113),
(114, 'SP0115', 'Quần nỉ nữ chun gấu', 114),
(115, 'SP0116', 'Quần nỉ nữ dáng jogger', 115),
(116, 'SP0117', 'Quần nỉ nữ dáng suông bo gấu chun', 116),
(117, 'SP0118', 'Quần nỉ nữ dáng suông túi hộp', 117),
(118, 'SP0119', 'Quần nỉ unisex người lớn dáng jogger', 118),
(119, 'SP0120', 'Quần nỉ nữ cạp chun có bo chun gấu', 119),
(120, 'SP0121', 'Quần nỉ nữ cạp chun phối màu', 120),
(121, 'SP0122', 'Quần khaki nữ dáng flare', 121),
(122, 'SP0123', 'Quần khaki nữ', 122),
(123, 'SP0124', 'Bộ quần áo nữ có hình in', 123),
(124, 'SP0125', 'Bộ quần áo nỉ nữ áo dài tay quần dài phối màu', 124),
(125, 'SP0126', 'Bộ quần áo nỉ nữ dài tay quần dài có hình in', 125),
(126, 'SP0127', 'Bộ quần áo nỉ nữ áo bomber dài tay quần dài phối m', 126),
(127, 'SP0128', 'Bộ quần áo nữ nỉ dài tay quần soóc cạp chun có hìn', 127),
(128, 'SP0129', 'Bộ quần áo nữ chất nỉ áo dài tay quần soóc có hình', 128),
(129, 'SP0130', 'Bộ quần áo nỉ nữ có hình in', 129),
(130, 'SP0131', 'Bộ mặc nhà nữ', 130),
(131, 'SP0132', 'Bộ mặc nhà nữ áo dài tay quần dài in hoạ tiết', 131),
(132, 'SP0133', 'Bộ pyjama nữ áo dài tay quần dài in hoạ tiết', 132),
(133, 'SP0134', 'Quần mặc nhà nữ', 133),
(134, 'SP0135', 'Bộ mặc nhà nữ áo dài tay quần dài có hình in', 134),
(135, 'SP0136', 'Bộ mặc nhà nữ áo dài tay quần suông dài', 135),
(136, 'SP0137', 'Bộ mặc nhà nữ cotton dài tay quần dài có hình in', 136),
(137, 'SP0138', 'Bộ mặc nhà nữ', 137),
(138, 'SP0139', 'Bộ mặc nhà nữ hoạ tiết', 138),
(139, 'SP0140', 'Bộ mặc nhà nữ giả len áo dài tay quần dài', 139),
(140, 'SP0141', 'Bộ mặc nhà 2 dây quần short', 140),
(141, 'SP0142', 'Bộ mặc nhà nữ áo cotton ba lỗ cổ tim quần đùi cạp ', 141),
(142, 'SP0143', 'Bộ pyjama nữ áo cộc tay quần soóc in họa tiết', 142),
(143, 'SP0144', 'Bộ pyjama nữ áo cộc tay quần soóc cạp chun in họa ', 143),
(144, 'SP0145', 'Quần soóc mặc nhà nữ cạp chun', 144),
(145, 'SP0146', 'Bộ mặc nhà nữ cotton cộc tay quần soóc cạp chun có', 145),
(146, 'SP0147', 'Bộ mặc nhà nữ cổ tim tròn cộc tay quần đùi cạp chu', 146),
(147, 'SP0148', 'Bộ mặc nhà nữ cổ tim mở cúc cộc tay quần đùi', 147),
(148, 'SP0149', 'Bộ mặc nhà nữ cộc tay quần soóc', 148),
(149, 'SP0150', 'Bộ mặc nhà nữ áo cổ tim cộc tay quần dài in họa ti', 149),
(150, 'SP0151', 'Váy liền nữ tay lỡ dáng A', 150),
(151, 'SP0152', 'Váy liền nữ ngắn tay dáng A dài', 151),
(152, 'SP0153', 'Áo dài nữ', 152),
(153, 'SP0154', 'Váy liền nữ interlock dáng suông', 153),
(154, 'SP0155', 'Váy liền nữ cotton USA cổ polo dài tay', 154),
(155, 'SP0156', 'Áo dài nữ', 155),
(156, 'SP0157', 'Váy liền nữ phối tay', 156),
(157, 'SP0158', 'Váy liền nữ dáng dài, phối màu', 157),
(158, 'SP0159', 'Váy liền nữ interlock cổ bẻ dáng A có cắt eo', 158),
(159, 'SP0160', 'Váy liền nữ interlock cổ bẻ dáng dài', 159),
(160, 'SP0161', 'Váy liền nữ vải line cổ tim sát nách có chun eo', 160),
(161, 'SP0162', 'Váy liền nữ cổ tròn tay bồng in họa tiết', 161),
(162, 'SP0163', 'Váy liền nữ sát nách cổ đức có đai thắt eo', 162),
(163, 'SP0164', 'Váy liền nữ cổ tròn cộc tay có hình in dáng suông', 163),
(164, 'SP0165', 'Váy liền nỉ nữ có mũ và túi ốp bụng dáng suông', 164),
(165, 'SP0166', 'Váy liền nữ có lớp lót cổ tròn dúm eo dáng fit & f', 165),
(166, 'SP0167', 'Váy liền nữ tay bồng nhẹ họa tiết kẻ dáng fit & fl', 166),
(167, 'SP0168', 'Váy liền nữ cotton cổ tàu xẻ V tay raglange', 167),
(168, 'SP0169', 'Váy liền nữ cổ vuông hai dây dáng fit & flare có l', 168),
(169, 'SP0170', 'Áo dài nữ vải sợi cổ cao sát nách dáng ôm', 169),
(170, 'SP0171', 'Váy liền nữ cotton dáng suông', 170),
(171, 'SP0172', 'Váy yếm nữ', 171),
(172, 'SP0173', 'Chân váy nữ chất liệu gió', 172),
(173, 'SP0174', 'Chân váy nữ xếp ly', 173),
(174, 'SP0175', 'Quần váy nữ interlock dáng ngắn', 174),
(175, 'SP0176', 'Chân váy nữ', 175),
(176, 'SP0177', 'Chân váy jean nữ', 176),
(177, 'SP0178', 'Chân váy nữ interlock dài qua gối có xẻ trước', 177),
(178, 'SP0179', 'Chân váy len nữ dáng A họa tiết kẻ', 178),
(179, 'SP0180', 'Chân váy nữ in họa tiết kèm đai dáng suông', 179),
(180, 'SP0181', 'Chân váy jeans nữ cotton dáng suông', 180),
(181, 'SP0182', 'Chân váy xếp ly nữ cạp liền dáng ngắn', 181),
(182, 'SP0183', 'Chân váy nữ midi cạp chun dáng ôm', 182),
(183, 'SP0184', 'Chân váy nữ họa tiết dáng chữ A', 183),
(184, 'SP0185', 'Áo khoác chống nắng nữ', 184),
(185, 'SP0186', 'Áo blazer dạ nữ dáng ngắn', 185),
(186, 'SP0187', 'Áo cardigan nữ cổ V dài tay dáng ngắn vừa', 186),
(187, 'SP0188', 'Áo khoác nữ', 187),
(188, 'SP0189', 'Áo cardigan nữ', 188),
(189, 'SP0190', 'Áo cardigan nữ cổ tròn dài tay basic', 189),
(190, 'SP0191', 'Áo khoác len nữ phối lông họa tiết kẻ', 190),
(191, 'SP0192', 'Áo blazer nữ cộc tay túi vuông 2 bên', 191),
(192, 'SP0193', 'Áo khoác gió nữ', 192),
(193, 'SP0194', 'Áo khoác gió nữ 2 lớp có mũ chống thấm nước', 193),
(194, 'SP0195', 'Áo khoác chần bông nữ Ultra Air siêu nhẹ, siêu ấm', 194),
(195, 'SP0196', 'Áo khoác gilet chần bông nữ chống nước', 195),
(196, 'SP0197', 'Áo khoác chần bông nữ', 196),
(197, 'SP0198', 'Áo khoác chần bông nữ cổ cao', 197),
(198, 'SP0199', 'Áo khoác chần bông nữ chống thấm nước cổ cao', 198),
(199, 'SP0200', 'Áo khoác lông vũ nữ cổ tròn', 199),
(200, 'SP0201', 'Áo khoác lông vũ nữ dáng dài', 200),
(201, 'SP0202', 'Áo giữ nhiệt nữ cổ tròn', 201),
(202, 'SP0203', 'Áo giữ nhiệt nữ cổ cao', 202),
(203, 'SP0204', 'Áo giữ nhiệt nữ cổ 3 phân', 203),
(204, 'SP0205', 'Áo giữ nhiệt nữ cổ cao', 204),
(205, 'SP0206', 'Áo giữ nhiệt nữ cổ tròn dài tay dáng ôm', 205),
(212, 'SP0213', 'Áo phông nữ cotton USA dáng babytee', 212),
(214, 'SP0215', 'Áo ba lỗ active nữ', 214),
(215, 'SP0216', 'Áo polo nữ in hoạ tiết dáng ôm', 215);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soluong`
--

CREATE TABLE `soluong` (
  `id` bigint(20) NOT NULL,
  `idsanpham` bigint(20) NOT NULL,
  `masanpham` text NOT NULL,
  `mausac` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kichthuoc` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `giabanra` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soluong`
--

INSERT INTO `soluong` (`id`, `idsanpham`, `masanpham`, `mausac`, `kichthuoc`, `giabanra`, `soluong`) VALUES
(1, 4, 'SP03', 'Đỏ', 'S', 60000, 30),
(2, 4, 'SP03', 'Đỏ', 'M', 60000, 30),
(5, 3, 'SP02', 'Đen', 'S', 160000, 19),
(6, 3, 'SP02', 'Đen', 'M', 160000, 20),
(7, 3, 'SP02', 'Xanh', 'S', 160000, 10),
(8, 3, 'SP02', 'Xanh', 'M', 160000, 10),
(9, 2, 'SP01', 'Trắng', 'Freesize', 150000, 50),
(10, 2, 'SP01', 'Đen', 'Freesize', 150000, 247),
(12, 5, 'SP04', 'Bò', 'Freesize', 170000, 20),
(14, 6, 'SP05', 'Họa tiết cam', 'Freesize', 150000, 15),
(15, 6, 'SP05', 'Họa tiết dâu', 'Freesize', 150000, 5),
(16, 6, 'SP05', 'Họa tiết dứa', 'Freesize', 150000, 5),
(18, 7, 'SP06', 'Xanh', 'S', 150000, 7),
(19, 7, 'SP06', 'Xanh', 'M', 150000, 10),
(20, 7, 'SP06', 'Xanh', 'L', 150000, 10),
(24, 10, 'SP011', 'Đen', 'Freesize', 150000, 98),
(31, 11, 'SP012', 'Tím', 'Freesize', 120000, 20),
(32, 11, 'SP012', 'Trắng', 'Freesize', 120000, 20),
(33, 11, 'SP012', 'Xanh', 'Freesize', 120000, 20),
(34, 12, 'SP013', 'Nâu', 'Freesize', 125000, 18),
(35, 12, 'SP013', 'Be', 'Freesize', 125000, 20),
(36, 12, 'SP013', 'Đen', 'Freesize', 125000, 20),
(37, 13, 'SP014', 'Đen', 'Freesize', 150000, 9),
(38, 16, 'SP017', 'Be', 'Freesize', 145000, 16),
(39, 16, 'SP017', 'Nâu', 'Freesize', 145000, 20),
(40, 16, 'SP017', 'Đen', 'Freesize', 145000, 20),
(230, 17, 'SP018', 'Vàng', 'Freesize', 150000, 100),
(231, 18, 'SP019', 'Đen', 'S', 150000, 20),
(232, 18, 'SP019', 'Đen', 'M', 150000, 20),
(233, 18, 'SP019', 'Đen', 'L', 150000, 20),
(234, 18, 'SP019', 'Trắng', 'S', 150000, 20),
(235, 18, 'SP019', 'Trắng', 'M', 150000, 20),
(236, 18, 'SP019', 'Trắng', 'L', 150000, 20),
(237, 19, 'SP020', 'Tím', 'Freesize', 125000, 48),
(238, 19, 'SP020', 'Trắng', 'Freesize', 125000, 60),
(239, 19, 'SP020', 'Đen', 'Freesize', 125000, 50),
(240, 20, 'SP021', 'Tím', 'S', 150000, 18),
(241, 20, 'SP021', 'Tím', 'M', 150000, 20),
(242, 20, 'SP021', 'Đen', 'S', 150000, 20),
(243, 20, 'SP021', 'Đen', 'M', 150000, 20),
(244, 20, 'SP021', 'Nâu', 'S', 150000, 20),
(245, 20, 'SP021', 'Nâu', 'M', 150000, 20),
(246, 21, 'SP022', 'Đen', 'Freesize', 150000, 50),
(247, 21, 'SP022', 'Trắng', 'Freesize', 150000, 50),
(248, 22, 'SP023', 'Vàng', 'S', 125000, 20),
(249, 22, 'SP023', 'Vàng', 'M', 125000, 20),
(250, 22, 'SP023', 'Vàng', 'L', 125000, 20),
(251, 23, 'SP024', 'Kẻ đen', 'Freesize', 100000, 49),
(252, 23, 'SP024', 'Kẻ cam', 'Freesize', 100000, 50),
(253, 24, 'SP025', 'Be', 'S', 90000, 19),
(254, 24, 'SP025', 'Be', 'M', 90000, 20),
(255, 24, 'SP025', 'Be', 'L', 90000, 20),
(256, 25, 'SP026', 'Trắng', 'Freesize', 90000, 49),
(257, 25, 'SP026', 'Hồng', 'Freesize', 90000, 50),
(258, 25, 'SP026', 'Đen', 'Freesize', 90000, 50),
(259, 26, 'SP027', 'Trắng', 'Freesize', 80000, 100),
(260, 27, 'SP028', 'Đen', 'Freesize', 125000, 50),
(261, 27, 'SP028', 'Cam', 'Freesize', 125000, 50),
(262, 28, 'SP029', 'Vàng', 'M', 115000, 50),
(263, 28, 'SP029', 'Vàng', 'L', 115000, 50),
(264, 29, 'SP030', 'Vàng', 'S', 125000, 49),
(265, 29, 'SP030', 'Vàng', 'M', 125000, 50),
(266, 29, 'SP030', 'Vàng', 'L', 125000, 50),
(267, 30, 'SP031', 'Cam', 'M', 125000, 50),
(268, 30, 'SP031', 'Cam', 'L', 125000, 50),
(269, 31, 'SP032', 'Xanh', 'S', 115000, 50),
(270, 31, 'SP032', 'Xanh', 'M', 115000, 50),
(271, 31, 'SP032', 'Trắng', 'S', 115000, 50),
(272, 31, 'SP032', 'Trắng', 'M', 115000, 50),
(273, 32, 'SP033', 'Be', 'S', 130000, 20),
(274, 32, 'SP033', 'Be', 'M', 130000, 20),
(275, 32, 'SP033', 'Be', 'L', 130000, 20),
(276, 32, 'SP033', 'Đen', 'S', 130000, 20),
(277, 32, 'SP033', 'Đen', 'M', 130000, 20),
(278, 32, 'SP033', 'Đen', 'L', 130000, 20),
(279, 33, 'SP034', 'Xanh', 'Freesize', 150000, 49),
(280, 33, 'SP034', 'Cam', 'Freesize', 150000, 50),
(281, 33, 'SP034', 'Trắng', 'Freesize', 150000, 50),
(282, 34, 'SP035', 'Trắng', 'Freesize', 150000, 18),
(283, 34, 'SP035', 'Xanh', 'Freesize', 150000, 20),
(284, 35, 'SP036', 'Hồng', 'M', 160000, 50),
(285, 35, 'SP036', 'Hồng', 'L', 160000, 50),
(286, 36, 'SP037', 'Hồng', 'S', 165000, 20),
(287, 36, 'SP037', 'Hồng', 'M', 165000, 20),
(288, 36, 'SP037', 'Hồng', 'L', 165000, 20),
(289, 36, 'SP037', 'Trắng', 'S', 165000, 20),
(290, 36, 'SP037', 'Trắng', 'M', 165000, 20),
(291, 36, 'SP037', 'Trắng', 'L', 165000, 20),
(292, 37, 'SP038', 'Xanh', 'M', 200000, 50),
(293, 37, 'SP038', 'Xanh', 'L', 200000, 50),
(294, 37, 'SP038', 'Trắng', 'M', 200000, 50),
(295, 37, 'SP038', 'Trắng', 'L', 200000, 50),
(296, 38, 'SP039', 'Xanh', 'S', 170000, 50),
(297, 38, 'SP039', 'Xanh', 'M', 170000, 50),
(298, 38, 'SP039', 'Trắng', 'S', 170000, 50),
(299, 38, 'SP039', 'Trắng', 'M', 170000, 50),
(300, 39, 'SP040', 'Xanh', 'S', 150000, 19),
(301, 39, 'SP040', 'Xanh', 'M', 150000, 20),
(302, 39, 'SP040', 'Trắng', 'S', 150000, 20),
(303, 39, 'SP040', 'Trắng', 'M', 150000, 20),
(304, 40, 'SP041', 'Họa tiết hồng', 'S', 165000, 50),
(305, 40, 'SP041', 'Họa tiết hồng', 'M', 165000, 50),
(306, 40, 'SP041', 'Họa tiết hồng', 'L', 165000, 50),
(307, 41, 'SP042', 'Đen', 'S', 165000, 20),
(308, 41, 'SP042', 'Đen', 'M', 165000, 20),
(309, 41, 'SP042', 'Đen', 'L', 165000, 20),
(310, 42, 'SP043', 'Đen', 'Freesize', 130000, 100),
(311, 43, 'SP044', 'Be', 'Freesize', 150000, 50),
(312, 43, 'SP044', 'Đen', 'Freesize', 150000, 50),
(313, 44, 'SP045', 'Hồng nhạt', 'Freesize', 165000, 50),
(314, 44, 'SP045', 'Hồng đậm', 'Freesize', 165000, 50),
(315, 44, 'SP045', 'Trắng', 'Freesize', 165000, 50),
(316, 44, 'SP045', 'Đen', 'Freesize', 165000, 50),
(317, 45, 'SP046', 'Be', 'Freesize', 150000, 50),
(318, 45, 'SP046', 'Nâu', 'Freesize', 150000, 50),
(319, 45, 'SP046', 'Tím', 'Freesize', 150000, 50),
(320, 45, 'SP046', 'Đen', 'Freesize', 150000, 50),
(321, 46, 'SP047', 'Hồng', 'S', 150000, 20),
(322, 46, 'SP047', 'Hồng', 'M', 150000, 20),
(323, 46, 'SP047', 'Hồng', 'L', 150000, 20),
(324, 46, 'SP047', 'Trắng', 'S', 150000, 20),
(325, 46, 'SP047', 'Trắng', 'M', 150000, 20),
(326, 47, 'SP048', 'Trắng', 'Freesize', 165000, 100),
(327, 47, 'SP048', 'Đỏ', 'Freesize', 165000, 100),
(328, 47, 'SP048', 'Đen', 'Freesize', 165000, 100),
(329, 48, 'SP049', 'Trắng', 'M', 150000, 50),
(330, 48, 'SP049', 'Trắng', 'L', 150000, 50),
(331, 48, 'SP049', 'Đen', 'M', 150000, 50),
(332, 48, 'SP049', 'Đen', 'L', 150000, 50),
(333, 49, 'SP050', 'Trắng', 'Freesize', 165000, 100),
(334, 49, 'SP050', 'Đen', 'Freesize', 165000, 100),
(335, 50, 'SP051', 'Đen', 'Freesize', 175000, 50),
(336, 50, 'SP051', 'Nâu', 'Freesize', 175000, 50),
(337, 50, 'SP051', 'Hồng', 'Freesize', 175000, 50),
(338, 50, 'SP051', 'Be', 'Freesize', 175000, 50),
(339, 51, 'SP052', 'Xanh', 'Freesize', 165000, 100),
(340, 51, 'SP052', 'Nâu', 'Freesize', 165000, 100),
(341, 52, 'SP053', 'Đen', 'Freesize', 120000, 100),
(342, 52, 'SP053', 'Nâu', 'Freesize', 120000, 100),
(343, 52, 'SP053', 'Trắng', 'Freesize', 120000, 100),
(344, 53, 'SP054', 'Be', 'M', 150000, 100),
(345, 53, 'SP054', 'Be', 'L', 150000, 100),
(346, 54, 'SP055', 'Be', 'Freesize', 165000, 100),
(347, 54, 'SP055', 'Nâu', 'Freesize', 165000, 50),
(348, 54, 'SP055', 'Đen', 'Freesize', 165000, 20),
(349, 55, 'SP056', 'Xám', 'S', 200000, 50),
(350, 55, 'SP056', 'Xám', 'M', 200000, 50),
(351, 55, 'SP056', 'Xám', 'L', 200000, 50),
(352, 56, 'SP057', 'Loang', 'Freesize', 210000, 100),
(353, 57, 'SP058', 'Cam', 'Freesize', 180000, 50),
(354, 57, 'SP058', 'Hồng', 'Freesize', 180000, 50),
(355, 57, 'SP058', 'Xanh', 'Freesize', 180000, 50),
(356, 57, 'SP058', 'Trắng', 'Freesize', 180000, 50),
(357, 58, 'SP059', 'Trắng', 'Freesize', 165000, 100),
(358, 58, 'SP059', 'Cam Nâu', 'Freesize', 165000, 100),
(359, 59, 'SP060', 'Đỏ', 'Freesize', 165000, 50),
(360, 59, 'SP060', 'Trắng', 'Freesize', 165000, 50),
(361, 59, 'SP060', 'Đen', 'Freesize', 165000, 50),
(362, 59, 'SP060', 'Nâu', 'Freesize', 165000, 50),
(363, 60, 'SP061', 'Be Nâu', 'Freesize', 160000, 100),
(364, 61, 'SP062', 'Xanh', 'S', 135000, 20),
(365, 61, 'SP062', 'Xanh', 'M', 135000, 20),
(366, 61, 'SP062', 'Xanh', 'L', 135000, 20),
(367, 61, 'SP062', 'Nâu', 'M', 135000, 20),
(368, 61, 'SP062', 'Nâu', 'L', 135000, 20),
(369, 61, 'SP062', 'Đen', 'S', 135000, 20),
(370, 61, 'SP062', 'Đen', 'M', 135000, 20),
(371, 61, 'SP062', 'Đen', 'L', 135000, 20),
(372, 62, 'SP063', 'Hồng', 'Freesize', 165000, 20),
(373, 62, 'SP063', 'Đen', 'Freesize', 165000, 20),
(374, 62, 'SP063', 'Tím', 'Freesize', 165000, 20),
(375, 62, 'SP063', 'Trắng', 'Freesize', 165000, 20),
(376, 63, 'SP064', 'Đen', 'Freesize', 165000, 40),
(377, 63, 'SP064', 'Hồng', 'Freesize', 165000, 20),
(378, 63, 'SP064', 'Xanh', 'Freesize', 165000, 20),
(379, 63, 'SP064', 'Trắng', 'Freesize', 165000, 20),
(380, 64, 'SP065', 'Tím', 'S', 150000, 20),
(381, 64, 'SP065', 'Tím', 'M', 150000, 20),
(382, 64, 'SP065', 'Tím', 'L', 150000, 20),
(383, 64, 'SP065', 'Be', 'S', 150000, 20),
(384, 64, 'SP065', 'Be', 'M', 150000, 20),
(385, 64, 'SP065', 'Be', 'L', 150000, 20),
(386, 64, 'SP065', 'Đen', 'S', 150000, 20),
(387, 64, 'SP065', 'Đen', 'M', 150000, 20),
(388, 64, 'SP065', 'Đen', 'L', 150000, 20),
(389, 65, 'SP066', 'Đen', 'Freesize', 165000, 50),
(390, 65, 'SP066', 'Trắng', 'Freesize', 165000, 50),
(391, 66, 'SP067', 'Xanh', 'M', 150000, 100),
(392, 66, 'SP067', 'Trắng', 'M', 150000, 100),
(393, 66, 'SP067', 'Đen', 'M', 150000, 100),
(394, 67, 'SP068', 'Hồng', 'Freesize', 175000, 50),
(395, 67, 'SP068', 'Xám', 'Freesize', 175000, 50),
(396, 67, 'SP068', 'Xanh', 'Freesize', 175000, 50),
(397, 68, 'SP069', 'Tím', 'Freesize', 200000, 100),
(398, 68, 'SP069', 'Be', 'Freesize', 200000, 100),
(399, 69, 'SP070', 'Tím', 'S', 125000, 100),
(400, 69, 'SP070', 'Tím', 'M', 125000, 100),
(401, 69, 'SP070', 'Tím', 'L', 125000, 100),
(402, 70, 'SP071', 'Be', 'S', 165000, 100),
(403, 70, 'SP071', 'Be', 'M', 165000, 100),
(404, 70, 'SP071', 'Be', 'L', 165000, 100),
(405, 71, 'SP072', 'Đỏ', 'S', 200000, 100),
(406, 71, 'SP072', 'Đỏ', 'M', 200000, 100),
(407, 71, 'SP072', 'Đỏ', 'L', 200000, 100),
(408, 72, 'SP073', 'Xanh', 'S', 135000, 50),
(409, 72, 'SP073', 'Xanh', 'M', 135000, 50),
(410, 72, 'SP073', 'Xanh', 'L', 135000, 50),
(411, 73, 'SP074', 'Tím', 'S', 165000, 50),
(412, 73, 'SP074', 'Tím', 'M', 165000, 50),
(413, 73, 'SP074', 'Tím', 'L', 165000, 50),
(414, 73, 'SP074', 'Đỏ', 'S', 165000, 50),
(415, 73, 'SP074', 'Đỏ', 'M', 165000, 50),
(416, 73, 'SP074', 'Đỏ', 'L', 165000, 50),
(417, 74, 'SP075', 'Đen', 'Freesize', 180000, 200),
(418, 75, 'SP076', 'Xanh', 'Freesize', 200000, 100),
(419, 76, 'SP077', 'Đỏ', 'Freesize', 150000, 100),
(420, 76, 'SP077', 'Trắng', 'Freesize', 150000, 100),
(421, 77, 'SP078', 'Đen', 'Freesize', 165000, 100),
(422, 77, 'SP078', 'Xanh', 'Freesize', 165000, 100),
(423, 78, 'SP079', 'Đỏ', 'S', 165000, 100),
(424, 78, 'SP079', 'Đỏ', 'M', 165000, 100),
(425, 78, 'SP079', 'Đen', 'S', 165000, 10),
(426, 78, 'SP079', 'Đen', 'M', 165000, 100),
(427, 79, 'SP080', 'Xanh', 'Freesize', 200000, 100),
(428, 79, 'SP080', 'Nâu', 'Freesize', 200000, 100),
(429, 80, 'SP081', 'Trắng', 'Freesize', 125000, 100),
(430, 80, 'SP081', 'Đen', 'Freesize', 125000, 100),
(431, 80, 'SP081', 'Xanh', 'Freesize', 125000, 100),
(432, 81, 'SP082', 'Kẻ đỏ đen', 'M', 150000, 48),
(433, 81, 'SP082', 'Kẻ đỏ đen', 'L', 150000, 50),
(434, 81, 'SP082', 'Kẻ trắng xám', 'M', 150000, 50),
(435, 81, 'SP082', 'Kẻ trắng xám', 'L', 150000, 50),
(436, 82, 'SP083', 'Trắng', 'S', 165000, 100),
(437, 82, 'SP083', 'Trắng', 'M', 165000, 100),
(438, 82, 'SP083', 'Trắng', 'L', 165000, 100),
(439, 83, 'SP084', 'Trắng', 'Freesize', 135000, 100),
(440, 83, 'SP084', 'Đen', 'Freesize', 135000, 100),
(441, 84, 'SP085', 'Trắng', 'S', 150000, 49),
(442, 84, 'SP085', 'Trắng', 'M', 150000, 50),
(443, 84, 'SP085', 'Xanh', 'S', 150000, 50),
(444, 84, 'SP085', 'Xanh', 'M', 150000, 50),
(445, 84, 'SP085', 'Đen', 'S', 150000, 50),
(446, 84, 'SP085', 'Đen', 'M', 150000, 50),
(447, 85, 'SP086', 'Cam', 'Freesize', 165000, 100),
(448, 85, 'SP086', 'Be', 'Freesize', 165000, 100),
(449, 85, 'SP086', 'Đen', 'Freesize', 165000, 100),
(450, 86, 'SP087', 'Đen', 'Freesize', 125000, 100),
(451, 86, 'SP087', 'Xanh', 'Freesize', 125000, 100),
(452, 86, 'SP087', 'Tím', 'Freesize', 125000, 100),
(453, 87, 'SP088', 'Đen', 'M', 165000, 100),
(454, 87, 'SP088', 'Nâu', 'M', 165000, 100),
(455, 87, 'SP088', 'Trắng', 'M', 165000, 100),
(456, 88, 'SP089', 'Đen', 'S', 125000, 50),
(457, 88, 'SP089', 'Đen', 'M', 125000, 50),
(458, 88, 'SP089', 'Trắng', 'S', 125000, 50),
(459, 88, 'SP089', 'Trắng', 'M', 125000, 50),
(460, 89, 'SP090', 'Xanh đậm', 'Freesize', 200000, 100),
(461, 89, 'SP090', 'Xanh nhạt', 'Freesize', 200000, 100),
(462, 90, 'SP091', 'Xanh đậm', 'S', 180000, 100),
(463, 90, 'SP091', 'Xanh đậm', 'M', 180000, 100),
(464, 90, 'SP091', 'Xanh nhạt', 'S', 180000, 100),
(465, 91, 'SP092', 'Đen', 'Freesize', 150000, 100),
(466, 92, 'SP093', 'Xám', 'Freesize', 160000, 100),
(467, 93, 'SP094', 'Hồng', 'Freesize', 130000, 100),
(468, 94, 'SP095', 'Cam loang', 'Freesize', 185000, 50),
(469, 95, 'SP096', 'Đen', 'M', 165000, 100),
(470, 95, 'SP096', 'Vàng', 'M', 165000, 100),
(471, 96, 'SP097', 'Xanh', 'S', 180000, 50),
(472, 96, 'SP097', 'Xanh', 'M', 180000, 50),
(473, 96, 'SP097', 'Xanh', 'L', 180000, 50),
(474, 97, 'SP098', 'Xanh', 'S', 185000, 50),
(475, 97, 'SP098', 'Xanh', 'M', 185000, 50),
(476, 97, 'SP098', 'Xanh', 'L', 185000, 50),
(477, 98, 'SP099', 'Xanh đậm', 'Freesize', 190000, 100),
(478, 98, 'SP099', 'Xanh nhạt', 'Freesize', 190000, 100),
(479, 99, 'SP0100', 'Xanh nhạt', 'Freesize', 185000, 100),
(480, 99, 'SP0100', 'Xanh đậm', 'Freesize', 185000, 100),
(481, 100, 'SP0101', 'Xanh đậm', 'Freesize', 200000, 100),
(482, 100, 'SP0101', 'Xanh nhạt', 'Freesize', 200000, 100),
(483, 101, 'SP0102', 'Đậm', 'Freesize', 145000, 50),
(484, 101, 'SP0102', 'Nhạt', 'Freesize', 145000, 50),
(485, 102, 'SP0103', 'Đen', 'Freesize', 200000, 100),
(486, 103, 'SP0104', 'Đen', 'Freesize', 165000, 50),
(487, 104, 'SP0105', 'Xám', 'Freesize', 150000, 100),
(488, 104, 'SP0105', 'Nâu', 'Freesize', 150000, 100),
(489, 104, 'SP0105', 'Đen', 'Freesize', 150000, 100),
(490, 105, 'SP0106', 'Be', 'Freesize', 165000, 100),
(491, 106, 'SP0107', 'Xanh', 'Freesize', 185000, 10),
(492, 107, 'SP0108', 'Kẻ trắng', 'M', 100000, 49),
(493, 107, 'SP0108', 'Kẻ đen', 'L', 100000, 50),
(494, 108, 'SP0109', 'Be', 'Freesize', 200000, 100),
(495, 109, 'SP0110', 'Trắng', 'Freesize', 190000, 20),
(496, 110, 'SP0111', 'Xanh', 'Freesize', 165000, 14),
(497, 111, 'SP0112', 'Trắng', 'M', 200000, 100),
(498, 111, 'SP0112', 'Xanh', 'L', 200000, 100),
(499, 112, 'SP0113', 'Đen', 'Freesize', 185000, 100),
(500, 112, 'SP0113', 'Be', 'Freesize', 185000, 100),
(501, 113, 'SP0114', 'Hồng', 'S', 125000, 50),
(502, 113, 'SP0114', 'Be', 'M', 125000, 50),
(503, 114, 'SP0115', 'Be', 'M', 200000, 100),
(504, 114, 'SP0115', 'Đen', 'L', 200000, 100),
(505, 115, 'SP0116', 'Xanh', 'S', 175000, 50),
(506, 115, 'SP0116', 'Xám', 'M', 175000, 50),
(507, 115, 'SP0116', 'Đen', 'L', 175000, 50),
(508, 116, 'SP0117', 'Xanh', 'Freesize', 165000, 100),
(509, 116, 'SP0117', 'Đen', 'Freesize', 165000, 100),
(510, 117, 'SP0118', 'Tím', 'M', 185000, 100),
(511, 117, 'SP0118', 'Đen', 'L', 185000, 100),
(512, 118, 'SP0119', 'Xanh', 'Freesize', 200000, 100),
(513, 118, 'SP0119', 'Đen', 'Freesize', 200000, 100),
(514, 119, 'SP0120', 'Xám', 'Freesize', 190000, 100),
(515, 120, 'SP0121', 'Xanh', 'Freesize', 165000, 50),
(516, 120, 'SP0121', 'Trắng', 'Freesize', 165000, 50),
(517, 121, 'SP0122', 'Đen', 'M', 215000, 99),
(518, 121, 'SP0122', 'Be', 'L', 215000, 100),
(519, 122, 'SP0123', 'Đen', 'Freesize', 200000, 100),
(520, 123, 'SP0124', 'Hồng', 'Freesize', 300000, 50),
(521, 123, 'SP0124', 'Be', 'Freesize', 300000, 50),
(522, 123, 'SP0124', 'Đen', 'Freesize', 300000, 50),
(523, 124, 'SP0125', 'Xanh', 'M', 350000, 100),
(524, 124, 'SP0125', 'Đen', 'L', 350000, 100),
(525, 125, 'SP0126', 'Xám', 'M', 360000, 100),
(526, 125, 'SP0126', 'Xanh', 'L', 400000, 50),
(527, 126, 'SP0127', 'Phối màu', 'Freesize', 450000, 100),
(528, 127, 'SP0128', 'Đen', 'Freesize', 300000, 100),
(529, 128, 'SP0129', 'Tím', 'S', 350000, 100),
(530, 128, 'SP0129', 'Tím', 'M', 350000, 100),
(531, 129, 'SP0130', 'Trắng', 'Freesize', 250000, 100),
(532, 130, 'SP0131', 'Xám', 'Freesize', 260000, 100),
(533, 130, 'SP0131', 'Be', 'Freesize', 260000, 100),
(534, 131, 'SP0132', 'Hồng', 'S', 285000, 50),
(535, 131, 'SP0132', 'Xanh đậm', 'M', 285000, 50),
(536, 131, 'SP0132', 'Xanh nhạt', 'L', 285000, 50),
(537, 132, 'SP0133', 'Xanh đậm', 'Freesize', 250000, 100),
(538, 132, 'SP0133', 'Hồng nhạt', 'Freesize', 250000, 100),
(539, 133, 'SP0134', 'Kẻ hồng', 'Freesize', 125000, 50),
(540, 133, 'SP0134', 'Kẻ cam', 'Freesize', 125000, 50),
(541, 134, 'SP0135', 'Cam', 'S', 250000, 100),
(542, 134, 'SP0135', 'Xanh đậm', 'M', 250000, 100),
(543, 134, 'SP0135', 'Xanh nhạt', 'L', 250000, 100),
(544, 135, 'SP0136', 'Vàng', 'M', 260000, 50),
(545, 135, 'SP0136', 'Hồng', 'L', 260000, 50),
(546, 136, 'SP0137', 'Phối màu', 'Freesize', 265000, 100),
(547, 137, 'SP0138', 'Hồng', 'Freesize', 285000, 100),
(548, 138, 'SP0139', 'Tràm', 'Freesize', 200000, 100),
(549, 139, 'SP0140', 'Hồng', 'Freesize', 240000, 100),
(550, 140, 'SP0141', 'Phối màu', 'Freesize', 190000, 100),
(551, 141, 'SP0142', 'Phối màu', 'Freesize', 185000, 50),
(552, 142, 'SP0143', 'Xanh', 'Freesize', 215000, 100),
(553, 142, 'SP0143', 'Cam', 'Freesize', 215000, 100),
(554, 143, 'SP0144', 'Xanh nhạt', 'Freesize', 190000, 50),
(555, 143, 'SP0144', 'Xanh đậm', 'Freesize', 190000, 50),
(556, 144, 'SP0145', 'Phối màu', 'Freesize', 175000, 100),
(557, 145, 'SP0146', 'Họa tiết trắng', 'Freesize', 195000, 100),
(558, 146, 'SP0147', 'Hồng nhạt', 'M', 200000, 50),
(559, 146, 'SP0147', 'Hồng đậm', 'L', 200000, 50),
(560, 147, 'SP0148', 'Tràm', 'Freesize', 185000, 100),
(561, 147, 'SP0148', 'Xanh', 'Freesize', 185000, 100),
(562, 148, 'SP0149', 'Xanh', 'Freesize', 190000, 100),
(563, 148, 'SP0149', 'Hồng', 'Freesize', 190000, 100),
(564, 149, 'SP0150', 'Họa tiết', 'Freesize', 150000, 100),
(565, 150, 'SP0151', 'Kẻ xám', 'S', 200000, 100),
(566, 150, 'SP0151', 'Đen', 'M', 200000, 100),
(567, 151, 'SP0152', 'Đen', 'Freesize', 260000, 100),
(568, 152, 'SP0153', 'Vàng', 'S', 185000, 49),
(569, 152, 'SP0153', 'Hồng', 'M', 185000, 50),
(570, 152, 'SP0153', 'Đỏ', 'L', 185000, 50),
(571, 153, 'SP0154', 'Nâu', 'Freesize', 250000, 100),
(572, 153, 'SP0154', 'Xanh', 'Freesize', 250000, 99),
(573, 153, 'SP0154', 'Đen', 'Freesize', 250000, 99),
(574, 154, 'SP0155', 'Hồng', 'M', 250000, 50),
(575, 154, 'SP0155', 'Xanh', 'L', 250000, 100),
(576, 155, 'SP0156', 'Hồng', 'Freesize', 215000, 50),
(577, 155, 'SP0156', 'Đỏ', 'Freesize', 215000, 49),
(578, 156, 'SP0157', 'Phối màu', 'M', 230000, 100),
(579, 156, 'SP0157', 'Phối màu', 'L', 230000, 100),
(580, 167, 'SP0168', 'Phối màu', 'M', 260000, 100),
(581, 157, 'SP0158', 'Phối màu', 'Freesize', 260000, 100),
(582, 158, 'SP0159', 'Nâu', 'S', 285000, 100),
(583, 158, 'SP0159', 'Đen', 'M', 285000, 100),
(584, 159, 'SP0160', 'Be', 'S', 240000, 48),
(585, 159, 'SP0160', 'Xám', 'M', 240000, 50),
(586, 160, 'SP0161', 'Xanh trắng', 'M', 300000, 99),
(587, 160, 'SP0161', 'Cam', 'L', 350000, 100),
(588, 161, 'SP0162', 'Họa tiết', 'Freesize', 240000, 100),
(589, 161, 'SP0162', 'Xanh trơn', 'Freesize', 240000, 100),
(590, 162, 'SP0163', 'Đen', 'S', 350000, 50),
(591, 162, 'SP0163', 'Be', 'M', 350000, 50),
(592, 163, 'SP0164', 'Vàng', 'Freesize', 230000, 100),
(593, 164, 'SP0165', 'Trắng', 'M', 280000, 50),
(594, 164, 'SP0165', 'Xanh', 'L', 280000, 50),
(595, 165, 'SP0166', 'Cam', 'Freesize', 310000, 100),
(596, 166, 'SP0167', 'Kẻ', 'Freesize', 350000, 100),
(597, 168, 'SP0169', 'Hồng', 'M', 300000, 50),
(598, 168, 'SP0169', 'Trắng', 'L', 300000, 50),
(599, 169, 'SP0170', 'Nâu', 'M', 250000, 50),
(600, 169, 'SP0170', 'Đen', 'L', 250000, 50),
(601, 170, 'SP0171', 'Nâu', 'S', 350000, 100),
(602, 170, 'SP0171', 'Xanh', 'M', 350000, 100),
(603, 171, 'SP0172', 'Đen', 'M', 320000, 100),
(604, 171, 'SP0172', 'Nâu', 'L', 320000, 100),
(605, 172, 'SP0173', 'Đen', 'S', 200000, 100),
(606, 172, 'SP0173', 'Be', 'M', 200000, 100),
(607, 173, 'SP0174', 'Be', 'S', 240000, 100),
(608, 173, 'SP0174', 'Đen', 'M', 240000, 100),
(609, 174, 'SP0175', 'Be đậm', 'Freesize', 180000, 50),
(610, 174, 'SP0175', 'Đen', 'Freesize', 180000, 50),
(611, 175, 'SP0176', 'Đen', 'Freesize', 270000, 100),
(612, 175, 'SP0176', 'Be', 'Freesize', 270000, 100),
(613, 176, 'SP0177', 'Bò', 'Freesize', 320000, 100),
(614, 177, 'SP0178', 'Đen', 'M', 250000, 100),
(615, 177, 'SP0178', 'Đen', 'L', 250000, 100),
(616, 178, 'SP0179', 'Xanh', 'M', 210000, 100),
(617, 178, 'SP0179', 'Đen', 'L', 210000, 100),
(618, 179, 'SP0180', 'Xanh', 'S', 250000, 50),
(619, 179, 'SP0180', 'Cam', 'M', 250000, 50),
(620, 180, 'SP0181', 'Bò', 'Freesize', 350000, 100),
(621, 181, 'SP0182', 'Đen', 'Freesize', 250000, 100),
(622, 182, 'SP0183', 'Bò', 'M', 260000, 50),
(623, 183, 'SP0184', 'Hồng', 'Freesize', 320000, 100),
(624, 184, 'SP0185', 'Xám', 'S', 200000, 100),
(625, 184, 'SP0185', 'Hồng', 'M', 200000, 100),
(626, 184, 'SP0185', 'Vàng', 'L', 200000, 100),
(627, 184, 'SP0185', 'Tím', 'XL', 200000, 100),
(628, 185, 'SP0186', 'Đỏ', 'M', 280000, 50),
(629, 185, 'SP0186', 'Nâu', 'L', 280000, 50),
(630, 186, 'SP0187', 'Trắng', 'S', 200000, 49),
(631, 186, 'SP0187', 'Đen', 'M', 200000, 50),
(632, 186, 'SP0187', 'Vàng', 'L', 200000, 50),
(633, 187, 'SP0188', 'Đỏ', 'Freesize', 260000, 100),
(634, 187, 'SP0188', 'Đen', 'Freesize', 260000, 100),
(635, 188, 'SP0189', 'Đen', 'Freesize', 240000, 50),
(636, 188, 'SP0189', 'Nâu', 'Freesize', 240000, 50),
(637, 189, 'SP0190', 'Be', 'S', 180000, 50),
(638, 189, 'SP0190', 'Đen', 'M', 180000, 50),
(639, 189, 'SP0190', 'Hồng', 'L', 180000, 50),
(640, 190, 'SP0191', 'Xanh', 'Freesize', 270000, 50),
(641, 190, 'SP0191', 'Đen', 'Freesize', 270000, 50),
(642, 191, 'SP0192', 'Trắng', 'Freesize', 290000, 100),
(643, 192, 'SP0193', 'Đen', 'Freesize', 200000, 50),
(644, 192, 'SP0193', 'Be', 'Freesize', 200000, 50),
(645, 193, 'SP0194', 'Đen', 'Freesize', 280000, 100),
(646, 194, 'SP0195', 'Trắng', 'Freesize', 300000, 50),
(647, 194, 'SP0195', 'Đen', 'Freesize', 300000, 50),
(648, 195, 'SP0196', 'Đen', 'Freesize', 290000, 50),
(649, 195, 'SP0196', 'Trắng', 'Freesize', 290000, 50),
(650, 196, 'SP0197', 'Xanh đậm', 'M', 320000, 100),
(651, 196, 'SP0197', 'Xanh nhạt', 'L', 320000, 100),
(652, 197, 'SP0198', 'Trắng', 'Freesize', 200000, 20),
(653, 198, 'SP0199', 'Đen', 'Freesize', 260000, 100),
(654, 199, 'SP0200', 'Hồng', 'S', 270000, 50),
(655, 199, 'SP0200', 'Trắng', 'M', 270000, 50),
(656, 199, 'SP0200', 'Đen', 'L', 270000, 50),
(657, 200, 'SP0201', 'Xanh', 'Freesize', 400000, 50),
(658, 200, 'SP0201', 'Nâu', 'Freesize', 400000, 50),
(659, 201, 'SP0202', 'Xanh', 'S', 150000, 50),
(660, 201, 'SP0202', 'Tím', 'M', 150000, 50),
(661, 201, 'SP0202', 'Đen', 'L', 150000, 50),
(662, 201, 'SP0202', 'Trắng', 'XL', 150000, 50),
(663, 202, 'SP0203', 'Tím', 'Freesize', 170000, 100),
(664, 202, 'SP0203', 'Đen', 'Freesize', 170000, 100),
(665, 202, 'SP0203', 'Xám', 'Freesize', 170000, 100),
(666, 203, 'SP0204', 'Đỏ', 'S', 200000, 50),
(667, 203, 'SP0204', 'Hồng', 'M', 200000, 50),
(668, 203, 'SP0204', 'Xám', 'L', 200000, 10),
(669, 203, 'SP0204', 'Cam', 'XL', 200000, 20),
(670, 204, 'SP0205', 'Cam', 'Freesize', 100000, 100),
(671, 205, 'SP0206', 'Đỏ', 'Freesize', 150000, 50),
(672, 205, 'SP0206', 'Xám', 'Freesize', 150000, 50),
(680, 212, 'SP0213', 'Đen', 'Freesize', 0, 100),
(681, 212, 'SP0213', 'Hồng', 'Freesize', 0, 100),
(685, 215, 'SP0216', 'Chấm bi', 'Freesize', 200000, 100),
(686, 214, 'SP0215', 'Hồng', 'Freesize', 150000, 100),
(687, 214, 'SP0215', 'Trắng', 'Freesize', 150000, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtindonhang`
--

CREATE TABLE `thongtindonhang` (
  `id` bigint(20) NOT NULL,
  `idkhachhang` bigint(20) NOT NULL,
  `iddonhang` bigint(20) NOT NULL,
  `idsanpham` bigint(20) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `kichthuoc` varchar(20) NOT NULL,
  `soluong` int(11) UNSIGNED NOT NULL,
  `gia` int(20) UNSIGNED NOT NULL,
  `malohang` varchar(50) NOT NULL,
  `gianhapvao` int(20) UNSIGNED NOT NULL,
  `tienlai` int(11) UNSIGNED NOT NULL,
  `nhanxet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtindonhang`
--

INSERT INTO `thongtindonhang` (`id`, `idkhachhang`, `iddonhang`, `idsanpham`, `mausac`, `kichthuoc`, `soluong`, `gia`, `malohang`, `gianhapvao`, `tienlai`, `nhanxet`) VALUES
(19, 1, 11, 12, 'Nâu', 'Freesize', 1, 125000, 'lohangpa0102', 90000, 35000, 'Đẹp lắm nha'),
(20, 1, 12, 155, 'Đỏ', 'Freesize', 1, 215000, 'lohang1205tep', 140000, 75000, 'Oke nha'),
(21, 1, 12, 153, 'Xanh', 'Freesize', 1, 250000, 'lohang1205tep', 140000, 110000, 'Sẽ ủng hộ lần sau'),
(22, 2, 13, 110, 'Xanh', 'Freesize', 1, 165000, 'lohang1005jm', 90000, 75000, NULL),
(23, 1, 14, 29, 'Vàng', 'S', 1, 125000, 'lohangPA2104', 60000, 65000, NULL),
(24, 1, 15, 203, 'Hồng', 'M', 1, 200000, '', 0, 0, NULL),
(28, 6, 18, 16, 'Be', 'Freesize', 2, 145000, 'lohangpa0102', 125000, 40000, NULL),
(29, 1, 21, 186, 'Trắng', 'S', 1, 200000, 'lohang1505qt', 130000, 70000, NULL),
(30, 3, 22, 159, 'Be', 'S', 2, 240000, 'lohang1205tep', 180000, 120000, NULL),
(31, 9, 23, 39, 'Xanh', 'S', 1, 150000, 'lohangJM2104', 100000, 50000, NULL),
(32, 10, 24, 160, 'Xanh trắng', 'M', 1, 300000, 'lohang1205tep', 200000, 100000, NULL),
(33, 10, 24, 153, 'Đen', 'Freesize', 1, 250000, 'lohang1205tep', 140000, 110000, NULL),
(34, 11, 25, 84, 'Trắng', 'S', 1, 150000, 'lohang0905Tep', 100000, 50000, NULL),
(35, 1, 26, 33, 'Xanh', 'Freesize', 1, 150000, 'lohangPA2104', 100000, 50000, NULL),
(36, 1, 26, 34, 'Trắng', 'Freesize', 2, 150000, 'lohangPA2104', 90000, 120000, NULL),
(37, 1, 27, 3, 'Đen', 'S', 1, 152000, 'lohang1212', 100000, 60000, 'oke'),
(38, 1, 28, 7, 'Xanh', 'S', 2, 142500, 'lotep1412', 125000, 50000, NULL),
(39, 1, 28, 20, 'Tím', 'S', 1, 142500, 'lohangQT2104', 90000, 60000, NULL),
(40, 14, 30, 2, 'Đen', 'Freesize', 1, 150000, 'lohang1212', 90000, 60000, NULL),
(41, 14, 30, 13, 'Đen', 'Freesize', 1, 150000, 'lohangpa0102', 100000, 50000, NULL),
(45, 1, 35, 81, 'Kẻ đỏ đen', 'M', 2, 127500, 'lohang0905Tep', 100000, 100000, NULL),
(46, 1, 35, 107, 'Kẻ trắng', 'M', 1, 85000, 'lohang1005jm', 50000, 50000, NULL),
(47, 1, 35, 19, 'Tím', 'Freesize', 1, 106250, 'lohang1404', 90000, 35000, NULL),
(48, 1, 36, 23, 'Kẻ đen', 'Freesize', 1, 85000, 'lohangQT2104', 60000, 40000, NULL),
(49, 1, 37, 152, 'Vàng', 'S', 1, 157250, 'lohang1205tep', 125000, 60000, NULL),
(50, 1, 38, 121, 'Đen', 'M', 1, 182750, 'lohang1105pa', 125000, 90000, NULL),
(54, 1, 46, 19, 'Tím', 'Freesize', 1, 112500, 'lohang1404', 90000, 35000, NULL),
(55, 1, 48, 16, 'Be', 'Freesize', 1, 145000, 'lohangpa0102', 125000, 20000, NULL),
(56, 48, 50, 10, 'Đen', 'Freesize', 1, 150000, 'lohang3001Tep', 90000, 60000, NULL),
(58, 47, 51, 12, 'Nâu', 'Freesize', 1, 125000, 'lohangpa0102', 90000, 35000, NULL),
(59, 46, 52, 7, 'Xanh', 'S', 1, 150000, 'lotep1412', 125000, 25000, NULL),
(60, 44, 53, 16, 'Be', 'Freesize', 1, 145000, 'lohangpa0102', 125000, 20000, NULL),
(61, 7, 54, 2, 'Đen', 'Freesize', 1, 150000, 'lohang1212', 90000, 60000, NULL),
(62, 15, 55, 2, 'Đen', 'Freesize', 1, 150000, 'lohangqt1207', 100000, 50000, NULL),
(63, 6, 56, 10, 'Đen', 'Freesize', 1, 150000, 'lohang3001Tep', 90000, 60000, NULL),
(64, 1, 57, 24, 'Be', 'S', 1, 81000, 'lohangPA2104', 50000, 40000, NULL),
(65, 1, 57, 20, 'Tím', 'S', 1, 135000, 'lohangQT2104', 90000, 60000, NULL),
(66, 1, 57, 25, 'Trắng', 'Freesize', 1, 81000, 'lohangQT2104', 50000, 40000, NULL),
(67, 2, 58, 21, 'Đen', 'Freesize', 20, 135000, '', 0, 0, NULL),
(68, 2, 59, 39, 'Xanh', 'S', 1, 135000, '', 0, 0, NULL),
(69, 3, 60, 41, 'Đen', 'S', 1, 148500, '', 0, 0, NULL),
(70, 1, 61, 24, 'Be', 'S', 1, 81000, '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinkhuyenmai`
--

CREATE TABLE `thongtinkhuyenmai` (
  `id` bigint(20) NOT NULL,
  `makhuyenmai` varchar(50) NOT NULL,
  `giam` int(11) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinkhuyenmai`
--

INSERT INTO `thongtinkhuyenmai` (`id`, `makhuyenmai`, `giam`, `ngaybatdau`, `ngayketthuc`) VALUES
(30, 'KM0202', 10, '2024-02-02', '2024-02-12'),
(31, 'KM020201', 10, '2024-02-09', '2024-02-10'),
(32, 'KM2205', 5, '2024-05-22', '2024-05-24'),
(33, 'KM2905', 10, '2024-05-28', '2024-05-29'),
(34, 'KM0106', 20, '2024-06-01', '2024-06-03'),
(36, 'KM0406', 10, '2024-06-04', '2024-06-05'),
(37, 'KM0506', 10, '2024-06-13', '2024-06-29'),
(38, 'KM3006', 10, '2024-06-29', '2024-06-30'),
(39, 'SANSALETHANG7', 10, '2024-06-29', '2024-07-30'),
(43, 'thang7', 15, '2024-07-20', '2024-07-26'),
(44, 'KHUYENMAI1607', 20, '2024-07-31', '2024-08-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinlohang`
--

CREATE TABLE `thongtinlohang` (
  `id` bigint(20) NOT NULL,
  `gianhapvao` int(11) UNSIGNED NOT NULL,
  `idlohang` bigint(20) NOT NULL,
  `masanpham` text NOT NULL,
  `mausac` text NOT NULL,
  `kichthuoc` text NOT NULL,
  `soluong` int(11) UNSIGNED NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1,
  `daban` int(11) UNSIGNED NOT NULL,
  `conlai` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinlohang`
--

INSERT INTO `thongtinlohang` (`id`, `gianhapvao`, `idlohang`, `masanpham`, `mausac`, `kichthuoc`, `soluong`, `trangthai`, `daban`, `conlai`) VALUES
(7, 40000, 23, 'SP03', 'Đỏ', 'S', 30, 1, 0, 30),
(8, 40000, 23, 'SP03', 'Đỏ', 'M', 30, 1, 0, 30),
(11, 100000, 23, 'SP02', 'Đen', 'S', 20, 1, 1, 19),
(12, 100000, 23, 'SP02', 'Đen', 'M', 20, 1, 0, 20),
(13, 100000, 23, 'SP02', 'Xanh', 'S', 10, 1, 0, 10),
(14, 100000, 23, 'SP02', 'Xanh', 'M', 10, 1, 0, 10),
(15, 90000, 23, 'SP01', 'Trắng', 'Freesize', 50, 1, 0, 50),
(16, 90000, 23, 'SP01', 'Đen', 'Freesize', 50, 1, 2, 48),
(20, 140000, 25, 'SP04', 'Bò', 'Freesize', 20, 1, 0, 20),
(21, 90000, 26, 'SP05', 'Họa tiết cam', 'Freesize', 15, 1, 0, 15),
(22, 90000, 26, 'SP05', 'Họa tiết dâu', 'Freesize', 5, 1, 0, 5),
(23, 90000, 26, 'SP05', 'Họa tiết dứa', 'Freesize', 5, 1, 0, 5),
(24, 125000, 27, 'SP06', 'Xanh', 'S', 10, 1, 3, 7),
(25, 125000, 27, 'SP06', 'Xanh', 'M', 10, 1, 0, 10),
(26, 125000, 27, 'SP06', 'Xanh', 'L', 10, 1, 0, 10),
(27, 90000, 28, 'SP011', 'Đen', 'Freesize', 100, 1, 2, 98),
(28, 100000, 29, 'SP012', 'Tím', 'Freesize', 20, 1, 0, 20),
(29, 100000, 29, 'SP012', 'Trắng', 'Freesize', 20, 1, 0, 20),
(30, 100000, 29, 'SP012', 'Xanh', 'Freesize', 20, 1, 0, 20),
(34, 90000, 29, 'SP013', 'Nâu', 'Freesize', 20, 1, 2, 18),
(35, 90000, 29, 'SP013', 'Be', 'Freesize', 20, 1, 0, 20),
(36, 90000, 29, 'SP013', 'Đen', 'Freesize', 20, 1, 0, 20),
(37, 100000, 29, 'SP014', 'Đen', 'Freesize', 10, 1, 1, 9),
(38, 125000, 29, 'SP017', 'Be', 'Freesize', 20, 1, 4, 16),
(39, 125000, 29, 'SP017', 'Nâu', 'Freesize', 20, 1, 0, 20),
(40, 125000, 29, 'SP017', 'Đen', 'Freesize', 20, 1, 0, 20),
(41, 90000, 30, 'SP018', 'Vàng', 'Freesize', 100, 1, 0, 100),
(42, 100000, 30, 'SP019', 'Đen', 'S', 20, 1, 0, 20),
(43, 100000, 30, 'SP019', 'Đen', 'M', 20, 1, 0, 20),
(44, 100000, 30, 'SP019', 'Đen', 'L', 20, 1, 0, 20),
(45, 100000, 30, 'SP019', 'Trắng', 'S', 20, 1, 0, 20),
(46, 100000, 30, 'SP019', 'Trắng', 'M', 20, 1, 0, 20),
(47, 100000, 30, 'SP019', 'Trắng', 'L', 20, 1, 0, 20),
(48, 100000, 32, 'SP019', 'Trắng', 'M', 10, 1, 0, 10),
(49, 100000, 32, 'SP019', 'Trắng', 'M', 20, 1, 0, 20),
(50, 90000, 30, 'SP020', 'Tím', 'Freesize', 50, 1, 2, 48),
(51, 90000, 30, 'SP020', 'Trắng', 'Freesize', 50, 1, 0, 50),
(52, 90000, 30, 'SP020', 'Đen', 'Freesize', 50, 1, 0, 50),
(53, 90000, 30, 'SP020', 'Trắng', 'Freesize', 10, 1, 0, 10),
(54, 90000, 33, 'SP021', 'Tím', 'S', 20, 1, 2, 18),
(56, 90000, 33, 'SP021', 'Tím', 'M', 20, 1, 0, 20),
(57, 90000, 33, 'SP021', 'Đen', 'S', 20, 1, 0, 20),
(58, 90000, 33, 'SP021', 'Đen', 'M', 20, 1, 0, 20),
(59, 90000, 33, 'SP021', 'Nâu', 'S', 20, 1, 0, 20),
(60, 90000, 33, 'SP021', 'Nâu', 'M', 20, 1, 0, 20),
(61, 100000, 33, 'SP022', 'Đen', 'Freesize', 50, 1, 0, 50),
(62, 100000, 33, 'SP022', 'Trắng', 'Freesize', 50, 1, 0, 50),
(63, 90000, 33, 'SP023', 'Vàng', 'S', 20, 1, 0, 20),
(64, 90000, 33, 'SP023', 'Vàng', 'M', 20, 1, 0, 20),
(65, 90000, 33, 'SP023', 'Vàng', 'L', 20, 1, 0, 20),
(66, 60000, 33, 'SP024', 'Kẻ đen', 'Freesize', 50, 1, 1, 49),
(67, 60000, 33, 'SP024', 'Kẻ cam', 'Freesize', 50, 1, 0, 50),
(68, 50000, 34, 'SP025', 'Be', 'S', 20, 1, 1, 19),
(69, 50000, 34, 'SP025', 'Be', 'M', 20, 1, 0, 20),
(70, 50000, 34, 'SP025', 'Be', 'L', 20, 1, 0, 20),
(71, 50000, 33, 'SP026', 'Trắng', 'Freesize', 50, 1, 1, 49),
(72, 50000, 33, 'SP026', 'Hồng', 'Freesize', 50, 1, 0, 50),
(73, 50000, 33, 'SP026', 'Đen', 'Freesize', 50, 1, 0, 50),
(74, 40000, 34, 'SP027', 'Trắng', 'Freesize', 100, 1, 0, 100),
(75, 90000, 34, 'SP028', 'Đen', 'Freesize', 50, 1, 0, 50),
(76, 90000, 34, 'SP028', 'Cam', 'Freesize', 50, 1, 0, 50),
(77, 60000, 34, 'SP029', 'Vàng', 'M', 50, 1, 0, 50),
(78, 60000, 34, 'SP029', 'Vàng', 'L', 50, 1, 0, 50),
(79, 60000, 34, 'SP030', 'Vàng', 'S', 50, 1, 1, 49),
(80, 60000, 34, 'SP030', 'Vàng', 'M', 50, 1, 0, 50),
(81, 60000, 34, 'SP030', 'Vàng', 'L', 50, 1, 0, 50),
(82, 90000, 34, 'SP031', 'Cam', 'M', 50, 1, 0, 50),
(83, 90000, 34, 'SP031', 'Cam', 'L', 50, 1, 0, 50),
(84, 80000, 33, 'SP032', 'Xanh', 'S', 50, 1, 0, 50),
(85, 80000, 33, 'SP032', 'Xanh', 'M', 50, 1, 0, 50),
(86, 80000, 33, 'SP032', 'Trắng', 'S', 50, 1, 0, 50),
(87, 80000, 33, 'SP032', 'Trắng', 'M', 50, 1, 0, 50),
(88, 90000, 34, 'SP033', 'Be', 'S', 20, 1, 0, 20),
(89, 90000, 34, 'SP033', 'Be', 'M', 20, 1, 0, 20),
(90, 90000, 34, 'SP033', 'Be', 'L', 20, 1, 0, 20),
(91, 90000, 34, 'SP033', 'Đen', 'S', 20, 1, 0, 20),
(92, 90000, 34, 'SP033', 'Đen', 'M', 20, 1, 0, 20),
(93, 90000, 34, 'SP033', 'Đen', 'L', 20, 1, 0, 20),
(94, 100000, 34, 'SP034', 'Xanh', 'Freesize', 50, 1, 1, 49),
(95, 100000, 34, 'SP034', 'Cam', 'Freesize', 50, 1, 0, 50),
(96, 100000, 34, 'SP034', 'Trắng', 'Freesize', 50, 1, 0, 50),
(97, 90000, 34, 'SP035', 'Trắng', 'Freesize', 20, 1, 2, 18),
(98, 90000, 34, 'SP035', 'Xanh', 'Freesize', 20, 1, 0, 20),
(99, 100000, 34, 'SP036', 'Hồng', 'M', 50, 1, 0, 50),
(100, 100000, 34, 'SP036', 'Hồng', 'L', 50, 1, 0, 50),
(101, 100000, 34, 'SP037', 'Hồng', 'S', 20, 1, 0, 20),
(102, 100000, 34, 'SP037', 'Hồng', 'M', 20, 1, 0, 20),
(103, 100000, 34, 'SP037', 'Hồng', 'L', 20, 1, 0, 20),
(104, 100000, 34, 'SP037', 'Trắng', 'S', 20, 1, 0, 20),
(105, 100000, 34, 'SP037', 'Trắng', 'M', 20, 1, 0, 20),
(106, 100000, 34, 'SP037', 'Trắng', 'L', 20, 1, 0, 20),
(107, 140000, 34, 'SP038', 'Xanh', 'M', 50, 1, 0, 50),
(108, 140000, 34, 'SP038', 'Xanh', 'L', 50, 1, 0, 50),
(109, 140000, 34, 'SP038', 'Trắng', 'M', 50, 1, 0, 50),
(110, 140000, 34, 'SP038', 'Trắng', 'L', 50, 1, 0, 50),
(111, 125000, 35, 'SP039', 'Xanh', 'S', 50, 1, 0, 50),
(112, 125000, 35, 'SP039', 'Xanh', 'M', 50, 1, 0, 50),
(113, 125000, 35, 'SP039', 'Trắng', 'S', 50, 1, 0, 50),
(114, 125000, 35, 'SP039', 'Trắng', 'M', 50, 1, 0, 50),
(115, 100000, 35, 'SP040', 'Xanh', 'S', 20, 1, 1, 19),
(116, 100000, 35, 'SP040', 'Xanh', 'M', 20, 1, 0, 20),
(117, 100000, 35, 'SP040', 'Trắng', 'S', 20, 1, 0, 20),
(118, 100000, 35, 'SP040', 'Trắng', 'M', 20, 1, 0, 20),
(119, 100000, 35, 'SP041', 'Họa tiết hồng', 'S', 50, 1, 0, 50),
(120, 100000, 35, 'SP041', 'Họa tiết hồng', 'M', 50, 1, 0, 50),
(121, 100000, 35, 'SP041', 'Họa tiết hồng', 'L', 50, 1, 0, 50),
(122, 125000, 35, 'SP042', 'Đen', 'S', 20, 1, 0, 20),
(123, 125000, 35, 'SP042', 'Đen', 'M', 20, 1, 0, 20),
(124, 125000, 35, 'SP042', 'Đen', 'L', 20, 1, 0, 20),
(125, 90000, 35, 'SP043', 'Đen', 'Freesize', 100, 1, 0, 100),
(126, 100000, 35, 'SP044', 'Be', 'Freesize', 50, 1, 0, 50),
(127, 100000, 35, 'SP044', 'Đen', 'Freesize', 50, 1, 0, 50),
(128, 125000, 35, 'SP045', 'Hồng nhạt', 'Freesize', 50, 1, 0, 50),
(129, 125000, 35, 'SP045', 'Hồng đậm', 'Freesize', 50, 1, 0, 50),
(130, 125000, 35, 'SP045', 'Trắng', 'Freesize', 50, 1, 0, 50),
(131, 125000, 35, 'SP045', 'Đen', 'Freesize', 50, 1, 0, 50),
(132, 100000, 35, 'SP046', 'Be', 'Freesize', 50, 1, 0, 50),
(133, 100000, 35, 'SP046', 'Nâu', 'Freesize', 50, 1, 0, 50),
(134, 100000, 35, 'SP046', 'Tím', 'Freesize', 50, 1, 0, 50),
(135, 100000, 35, 'SP046', 'Đen', 'Freesize', 50, 1, 0, 50),
(136, 90000, 36, 'SP047', 'Hồng', 'S', 20, 1, 0, 20),
(137, 90000, 36, 'SP047', 'Hồng', 'M', 20, 1, 0, 20),
(138, 90000, 36, 'SP047', 'Hồng', 'L', 20, 1, 0, 20),
(139, 90000, 36, 'SP047', 'Trắng', 'S', 20, 1, 0, 20),
(140, 90000, 36, 'SP047', 'Trắng', 'M', 20, 1, 0, 20),
(141, 125000, 36, 'SP048', 'Trắng', 'Freesize', 100, 1, 0, 100),
(142, 125000, 36, 'SP048', 'Đỏ', 'Freesize', 100, 1, 0, 100),
(143, 125000, 36, 'SP048', 'Đen', 'Freesize', 100, 1, 0, 100),
(144, 90000, 36, 'SP049', 'Trắng', 'M', 50, 1, 0, 50),
(145, 90000, 36, 'SP049', 'Trắng', 'L', 50, 1, 0, 50),
(146, 90000, 36, 'SP049', 'Đen', 'M', 50, 1, 0, 50),
(147, 90000, 36, 'SP049', 'Đen', 'L', 50, 1, 0, 50),
(148, 100000, 36, 'SP050', 'Trắng', 'Freesize', 100, 1, 0, 100),
(149, 100000, 36, 'SP050', 'Đen', 'Freesize', 100, 1, 0, 100),
(150, 125000, 36, 'SP051', 'Đen', 'Freesize', 50, 1, 0, 50),
(151, 125000, 36, 'SP051', 'Nâu', 'Freesize', 50, 1, 0, 50),
(152, 125000, 36, 'SP051', 'Hồng', 'Freesize', 50, 1, 0, 50),
(153, 125000, 36, 'SP051', 'Be', 'Freesize', 50, 1, 0, 50),
(154, 125000, 36, 'SP052', 'Xanh', 'Freesize', 100, 1, 0, 100),
(155, 125000, 36, 'SP052', 'Nâu', 'Freesize', 100, 1, 0, 100),
(156, 60000, 37, 'SP053', 'Đen', 'Freesize', 100, 1, 0, 100),
(157, 60000, 37, 'SP053', 'Nâu', 'Freesize', 100, 1, 0, 100),
(158, 60000, 37, 'SP053', 'Trắng', 'Freesize', 100, 1, 0, 100),
(159, 100000, 37, 'SP054', 'Be', 'M', 100, 1, 0, 100),
(160, 100000, 37, 'SP054', 'Be', 'L', 100, 1, 0, 100),
(161, 90000, 37, 'SP055', 'Be', 'Freesize', 100, 1, 0, 100),
(162, 90000, 37, 'SP055', 'Nâu', 'Freesize', 50, 1, 0, 50),
(163, 90000, 37, 'SP055', 'Đen', 'Freesize', 20, 1, 0, 20),
(164, 125000, 38, 'SP056', 'Xám', 'S', 50, 1, 0, 50),
(165, 125000, 38, 'SP056', 'Xám', 'M', 50, 1, 0, 50),
(166, 125000, 38, 'SP056', 'Xám', 'L', 50, 1, 0, 50),
(167, 140000, 38, 'SP057', 'Loang', 'Freesize', 100, 1, 0, 100),
(168, 125000, 38, 'SP058', 'Cam', 'Freesize', 50, 1, 0, 50),
(169, 125000, 38, 'SP058', 'Hồng', 'Freesize', 50, 1, 0, 50),
(170, 125000, 38, 'SP058', 'Xanh', 'Freesize', 50, 1, 0, 50),
(171, 125000, 38, 'SP058', 'Trắng', 'Freesize', 50, 1, 0, 50),
(172, 100000, 38, 'SP059', 'Trắng', 'Freesize', 100, 1, 0, 100),
(173, 100000, 38, 'SP059', 'Cam Nâu', 'Freesize', 100, 1, 0, 100),
(174, 140000, 38, 'SP060', 'Đỏ', 'Freesize', 50, 1, 0, 50),
(175, 140000, 38, 'SP060', 'Trắng', 'Freesize', 50, 1, 0, 50),
(176, 140000, 38, 'SP060', 'Đen', 'Freesize', 50, 1, 0, 50),
(177, 140000, 38, 'SP060', 'Nâu', 'Freesize', 50, 1, 0, 50),
(178, 125000, 39, 'SP061', 'Be Nâu', 'Freesize', 100, 1, 0, 100),
(179, 90000, 39, 'SP062', 'Xanh', 'S', 20, 1, 0, 20),
(180, 90000, 39, 'SP062', 'Xanh', 'M', 20, 1, 0, 20),
(181, 90000, 39, 'SP062', 'Xanh', 'L', 20, 1, 0, 20),
(182, 90000, 39, 'SP062', 'Nâu', 'M', 20, 1, 0, 20),
(183, 90000, 39, 'SP062', 'Nâu', 'L', 20, 1, 0, 20),
(184, 90000, 39, 'SP062', 'Đen', 'S', 20, 1, 0, 20),
(185, 90000, 39, 'SP062', 'Đen', 'M', 20, 1, 0, 20),
(186, 90000, 39, 'SP062', 'Đen', 'L', 20, 1, 0, 20),
(187, 140000, 40, 'SP063', 'Hồng', 'Freesize', 10, 1, 0, 10),
(188, 140000, 40, 'SP063', 'Đen', 'Freesize', 20, 1, 0, 20),
(189, 140000, 40, 'SP063', 'Tím', 'Freesize', 20, 1, 0, 20),
(190, 140000, 40, 'SP063', 'Trắng', 'Freesize', 20, 1, 0, 20),
(191, 140000, 40, 'SP063', 'Hồng', 'Freesize', 10, 1, 0, 10),
(192, 125000, 41, 'SP064', 'Đen', 'Freesize', 20, 1, 0, 20),
(193, 125000, 41, 'SP064', 'Hồng', 'Freesize', 20, 1, 0, 20),
(194, 125000, 40, 'SP064', 'Xanh', 'Freesize', 20, 1, 0, 20),
(195, 125000, 40, 'SP064', 'Trắng', 'Freesize', 20, 1, 0, 20),
(196, 125000, 40, 'SP064', 'Đen', 'Freesize', 20, 1, 0, 20),
(197, 100000, 41, 'SP065', 'Tím', 'S', 20, 1, 0, 20),
(198, 100000, 41, 'SP065', 'Tím', 'M', 20, 1, 0, 20),
(199, 100000, 41, 'SP065', 'Tím', 'L', 20, 1, 0, 20),
(200, 100000, 41, 'SP065', 'Be', 'S', 20, 1, 0, 20),
(201, 100000, 41, 'SP065', 'Be', 'M', 20, 1, 0, 20),
(202, 100000, 41, 'SP065', 'Be', 'L', 20, 1, 0, 20),
(203, 100000, 41, 'SP065', 'Đen', 'S', 20, 1, 0, 20),
(204, 100000, 41, 'SP065', 'Đen', 'M', 20, 1, 0, 20),
(205, 100000, 41, 'SP065', 'Đen', 'L', 20, 1, 0, 20),
(206, 125000, 40, 'SP066', 'Đen', 'Freesize', 50, 1, 0, 50),
(207, 125000, 40, 'SP066', 'Trắng', 'Freesize', 50, 1, 0, 50),
(208, 90000, 41, 'SP067', 'Xanh', 'M', 100, 1, 0, 100),
(209, 90000, 41, 'SP067', 'Trắng', 'M', 100, 1, 0, 100),
(210, 90000, 41, 'SP067', 'Đen', 'M', 100, 1, 0, 100),
(211, 100000, 40, 'SP068', 'Hồng', 'Freesize', 50, 1, 0, 50),
(212, 100000, 40, 'SP068', 'Xám', 'Freesize', 50, 1, 0, 50),
(213, 100000, 40, 'SP068', 'Xanh', 'Freesize', 50, 1, 0, 50),
(214, 140000, 41, 'SP069', 'Tím', 'Freesize', 100, 1, 0, 100),
(215, 140000, 41, 'SP069', 'Be', 'Freesize', 100, 1, 0, 100),
(216, 60000, 41, 'SP070', 'Tím', 'S', 100, 1, 0, 100),
(217, 60000, 41, 'SP070', 'Tím', 'M', 100, 1, 0, 100),
(218, 60000, 41, 'SP070', 'Tím', 'L', 100, 1, 0, 100),
(219, 125000, 40, 'SP071', 'Be', 'S', 100, 1, 0, 100),
(220, 125000, 40, 'SP071', 'Be', 'M', 100, 1, 0, 100),
(221, 125000, 40, 'SP071', 'Be', 'L', 100, 1, 0, 100),
(222, 140000, 42, 'SP072', 'Đỏ', 'S', 100, 1, 0, 100),
(223, 140000, 42, 'SP072', 'Đỏ', 'M', 100, 1, 0, 100),
(224, 140000, 42, 'SP072', 'Đỏ', 'L', 100, 1, 0, 100),
(225, 90000, 42, 'SP073', 'Xanh', 'S', 50, 1, 0, 50),
(226, 90000, 42, 'SP073', 'Xanh', 'M', 50, 1, 0, 50),
(227, 90000, 42, 'SP073', 'Xanh', 'L', 50, 1, 0, 50),
(228, 100000, 42, 'SP074', 'Tím', 'S', 50, 1, 0, 50),
(229, 100000, 42, 'SP074', 'Tím', 'M', 50, 1, 0, 50),
(230, 100000, 42, 'SP074', 'Tím', 'L', 50, 1, 0, 50),
(231, 100000, 42, 'SP074', 'Đỏ', 'S', 50, 1, 0, 50),
(232, 100000, 42, 'SP074', 'Đỏ', 'M', 50, 1, 0, 50),
(233, 100000, 42, 'SP074', 'Đỏ', 'L', 50, 1, 0, 50),
(234, 125000, 42, 'SP075', 'Đen', 'Freesize', 200, 1, 0, 200),
(235, 140000, 42, 'SP076', 'Xanh', 'Freesize', 100, 1, 0, 100),
(236, 90000, 42, 'SP077', 'Đỏ', 'Freesize', 100, 1, 0, 100),
(237, 90000, 42, 'SP077', 'Trắng', 'Freesize', 100, 1, 0, 100),
(238, 140000, 42, 'SP078', 'Đen', 'Freesize', 100, 1, 0, 100),
(239, 140000, 42, 'SP078', 'Xanh', 'Freesize', 100, 1, 0, 100),
(240, 125000, 42, 'SP079', 'Đỏ', 'S', 100, 1, 0, 100),
(241, 125000, 42, 'SP079', 'Đỏ', 'M', 100, 1, 0, 100),
(242, 125000, 42, 'SP079', 'Đen', 'S', 10, 1, 0, 10),
(243, 125000, 42, 'SP079', 'Đen', 'M', 100, 1, 0, 100),
(244, 140000, 42, 'SP080', 'Xanh', 'Freesize', 100, 1, 0, 100),
(245, 140000, 42, 'SP080', 'Nâu', 'Freesize', 100, 1, 0, 100),
(246, 90000, 43, 'SP081', 'Trắng', 'Freesize', 100, 1, 0, 100),
(247, 90000, 43, 'SP081', 'Đen', 'Freesize', 100, 1, 0, 100),
(248, 90000, 43, 'SP081', 'Xanh', 'Freesize', 100, 1, 0, 100),
(249, 100000, 43, 'SP082', 'Kẻ đỏ đen', 'M', 50, 1, 2, 48),
(250, 100000, 43, 'SP082', 'Kẻ đỏ đen', 'L', 50, 1, 0, 50),
(251, 100000, 43, 'SP082', 'Kẻ trắng xám', 'M', 50, 1, 0, 50),
(252, 100000, 43, 'SP082', 'Kẻ trắng xám', 'L', 50, 1, 0, 50),
(253, 125000, 43, 'SP083', 'Trắng', 'S', 100, 1, 0, 100),
(254, 125000, 43, 'SP083', 'Trắng', 'M', 100, 1, 0, 100),
(255, 125000, 43, 'SP083', 'Trắng', 'L', 100, 1, 0, 100),
(256, 90000, 43, 'SP084', 'Trắng', 'Freesize', 100, 1, 0, 100),
(257, 90000, 43, 'SP084', 'Đen', 'Freesize', 100, 1, 0, 100),
(258, 100000, 43, 'SP085', 'Trắng', 'S', 50, 1, 1, 49),
(259, 100000, 43, 'SP085', 'Trắng', 'M', 50, 1, 0, 50),
(260, 100000, 43, 'SP085', 'Xanh', 'S', 50, 1, 0, 50),
(261, 100000, 43, 'SP085', 'Xanh', 'M', 50, 1, 0, 50),
(262, 100000, 43, 'SP085', 'Đen', 'S', 50, 1, 0, 50),
(263, 100000, 43, 'SP085', 'Đen', 'M', 50, 1, 0, 50),
(264, 125000, 43, 'SP086', 'Cam', 'Freesize', 100, 1, 0, 100),
(265, 125000, 43, 'SP086', 'Be', 'Freesize', 100, 1, 0, 100),
(266, 125000, 43, 'SP086', 'Đen', 'Freesize', 100, 1, 0, 100),
(267, 60000, 43, 'SP087', 'Đen', 'Freesize', 100, 1, 0, 100),
(268, 60000, 43, 'SP087', 'Xanh', 'Freesize', 100, 1, 0, 100),
(269, 60000, 43, 'SP087', 'Tím', 'Freesize', 100, 1, 0, 100),
(270, 100000, 43, 'SP088', 'Đen', 'M', 100, 1, 0, 100),
(271, 100000, 43, 'SP088', 'Nâu', 'M', 100, 1, 0, 100),
(272, 100000, 43, 'SP088', 'Trắng', 'M', 100, 1, 0, 100),
(273, 60000, 43, 'SP089', 'Đen', 'S', 50, 1, 0, 50),
(274, 60000, 43, 'SP089', 'Đen', 'M', 50, 1, 0, 50),
(275, 60000, 43, 'SP089', 'Trắng', 'S', 50, 1, 0, 50),
(276, 60000, 43, 'SP089', 'Trắng', 'M', 50, 1, 0, 50),
(277, 140000, 43, 'SP090', 'Xanh đậm', 'Freesize', 100, 1, 0, 100),
(278, 140000, 43, 'SP090', 'Xanh nhạt', 'Freesize', 100, 1, 0, 100),
(279, 140000, 44, 'SP091', 'Xanh đậm', 'S', 100, 1, 0, 100),
(280, 140000, 44, 'SP091', 'Xanh đậm', 'M', 100, 1, 0, 100),
(281, 140000, 44, 'SP091', 'Xanh nhạt', 'S', 100, 1, 0, 100),
(282, 125000, 44, 'SP092', 'Đen', 'Freesize', 100, 1, 0, 100),
(283, 125000, 44, 'SP093', 'Xám', 'Freesize', 100, 1, 0, 100),
(284, 90000, 44, 'SP094', 'Hồng', 'Freesize', 100, 1, 0, 100),
(285, 140000, 44, 'SP095', 'Cam loang', 'Freesize', 50, 1, 0, 50),
(286, 125000, 44, 'SP096', 'Đen', 'M', 100, 1, 0, 100),
(287, 125000, 44, 'SP096', 'Vàng', 'M', 100, 1, 0, 100),
(288, 140000, 44, 'SP097', 'Xanh', 'S', 50, 1, 0, 50),
(289, 140000, 44, 'SP097', 'Xanh', 'M', 50, 1, 0, 50),
(290, 140000, 44, 'SP097', 'Xanh', 'L', 50, 1, 0, 50),
(291, 125000, 44, 'SP098', 'Xanh', 'S', 50, 1, 0, 50),
(292, 125000, 44, 'SP098', 'Xanh', 'M', 50, 1, 0, 50),
(293, 125000, 44, 'SP098', 'Xanh', 'L', 50, 1, 0, 50),
(294, 140000, 44, 'SP099', 'Xanh đậm', 'Freesize', 100, 1, 0, 100),
(295, 140000, 44, 'SP099', 'Xanh nhạt', 'Freesize', 100, 1, 0, 100),
(296, 140000, 44, 'SP0100', 'Xanh nhạt', 'Freesize', 100, 1, 0, 100),
(297, 140000, 44, 'SP0100', 'Xanh đậm', 'Freesize', 100, 1, 0, 100),
(298, 150000, 44, 'SP0101', 'Xanh đậm', 'Freesize', 100, 1, 0, 100),
(299, 150000, 44, 'SP0101', 'Xanh nhạt', 'Freesize', 100, 1, 0, 100),
(300, 90000, 44, 'SP0102', 'Đậm', 'Freesize', 50, 1, 0, 50),
(301, 90000, 44, 'SP0102', 'Nhạt', 'Freesize', 50, 1, 0, 50),
(302, 140000, 44, 'SP0103', 'Đen', 'Freesize', 100, 1, 0, 100),
(303, 100000, 44, 'SP0104', 'Đen', 'Freesize', 50, 1, 0, 50),
(304, 90000, 44, 'SP0105', 'Xám', 'Freesize', 100, 1, 0, 100),
(305, 90000, 44, 'SP0105', 'Nâu', 'Freesize', 100, 1, 0, 100),
(306, 90000, 44, 'SP0105', 'Đen', 'Freesize', 100, 1, 0, 100),
(307, 100000, 44, 'SP0106', 'Be', 'Freesize', 100, 1, 0, 100),
(308, 125000, 44, 'SP0107', 'Xanh', 'Freesize', 10, 1, 0, 10),
(309, 50000, 44, 'SP0108', 'Kẻ trắng', 'M', 50, 1, 1, 49),
(310, 50000, 44, 'SP0108', 'Kẻ đen', 'L', 50, 1, 0, 50),
(311, 140000, 44, 'SP0109', 'Be', 'Freesize', 100, 1, 0, 100),
(312, 140000, 44, 'SP0110', 'Trắng', 'Freesize', 20, 1, 0, 20),
(313, 90000, 44, 'SP0111', 'Xanh', 'Freesize', 15, 1, 1, 14),
(314, 140000, 45, 'SP0112', 'Trắng', 'M', 100, 1, 0, 100),
(315, 140000, 45, 'SP0112', 'Xanh', 'L', 100, 1, 0, 100),
(316, 125000, 45, 'SP0113', 'Đen', 'Freesize', 100, 1, 0, 100),
(317, 125000, 45, 'SP0113', 'Be', 'Freesize', 100, 1, 0, 100),
(318, 60000, 45, 'SP0114', 'Hồng', 'S', 50, 1, 0, 50),
(319, 60000, 45, 'SP0114', 'Be', 'M', 50, 1, 0, 50),
(320, 140000, 45, 'SP0115', 'Be', 'M', 100, 1, 0, 100),
(321, 140000, 45, 'SP0115', 'Đen', 'L', 100, 1, 0, 100),
(322, 125000, 45, 'SP0116', 'Xanh', 'S', 50, 1, 0, 50),
(323, 125000, 45, 'SP0116', 'Xám', 'M', 50, 1, 0, 50),
(324, 125000, 45, 'SP0116', 'Đen', 'L', 50, 1, 0, 50),
(325, 90000, 45, 'SP0117', 'Xanh', 'Freesize', 100, 1, 0, 100),
(326, 90000, 45, 'SP0117', 'Đen', 'Freesize', 100, 1, 0, 100),
(327, 100000, 45, 'SP0118', 'Tím', 'M', 100, 1, 0, 100),
(328, 100000, 45, 'SP0118', 'Đen', 'L', 100, 1, 0, 100),
(329, 140000, 45, 'SP0119', 'Xanh', 'Freesize', 100, 1, 0, 100),
(330, 140000, 45, 'SP0119', 'Đen', 'Freesize', 100, 1, 0, 100),
(331, 125000, 45, 'SP0120', 'Xám', 'Freesize', 100, 1, 0, 100),
(332, 90000, 45, 'SP0121', 'Xanh', 'Freesize', 50, 1, 0, 50),
(333, 90000, 45, 'SP0121', 'Trắng', 'Freesize', 50, 1, 0, 50),
(334, 125000, 45, 'SP0122', 'Đen', 'M', 100, 1, 1, 99),
(335, 125000, 45, 'SP0122', 'Be', 'L', 100, 1, 0, 100),
(336, 140000, 45, 'SP0123', 'Đen', 'Freesize', 100, 1, 0, 100),
(337, 200000, 46, 'SP0124', 'Hồng', 'Freesize', 50, 1, 0, 50),
(338, 200000, 46, 'SP0124', 'Be', 'Freesize', 50, 1, 0, 50),
(339, 200000, 46, 'SP0124', 'Đen', 'Freesize', 50, 1, 0, 50),
(340, 250000, 46, 'SP0125', 'Xanh', 'M', 100, 1, 0, 100),
(341, 250000, 46, 'SP0125', 'Đen', 'L', 100, 1, 0, 100),
(342, 260000, 46, 'SP0126', 'Xám', 'M', 100, 1, 0, 100),
(343, 350000, 46, 'SP0126', 'Xanh', 'L', 50, 1, 0, 50),
(344, 270000, 46, 'SP0127', 'Phối màu', 'Freesize', 100, 1, 0, 100),
(345, 210000, 46, 'SP0128', 'Đen', 'Freesize', 100, 1, 0, 100),
(346, 250000, 46, 'SP0129', 'Tím', 'S', 100, 1, 0, 100),
(347, 250000, 46, 'SP0129', 'Tím', 'M', 100, 1, 0, 100),
(348, 190000, 46, 'SP0130', 'Trắng', 'Freesize', 100, 1, 0, 100),
(349, 185000, 46, 'SP0131', 'Xám', 'Freesize', 100, 1, 0, 100),
(350, 185000, 46, 'SP0131', 'Be', 'Freesize', 100, 1, 0, 100),
(351, 200000, 46, 'SP0132', 'Hồng', 'S', 50, 1, 0, 50),
(352, 200000, 46, 'SP0132', 'Xanh đậm', 'M', 50, 1, 0, 50),
(353, 200000, 46, 'SP0132', 'Xanh nhạt', 'L', 50, 1, 0, 50),
(354, 190000, 46, 'SP0133', 'Xanh đậm', 'Freesize', 100, 1, 0, 100),
(355, 190000, 46, 'SP0133', 'Hồng nhạt', 'Freesize', 100, 1, 0, 100),
(356, 60000, 46, 'SP0134', 'Kẻ hồng', 'Freesize', 50, 1, 0, 50),
(357, 60000, 46, 'SP0134', 'Kẻ cam', 'Freesize', 50, 1, 0, 50),
(358, 140000, 46, 'SP0135', 'Cam', 'S', 100, 1, 0, 100),
(359, 140000, 46, 'SP0135', 'Xanh đậm', 'M', 100, 1, 0, 100),
(360, 140000, 46, 'SP0135', 'Xanh nhạt', 'L', 100, 1, 0, 100),
(361, 185000, 46, 'SP0136', 'Vàng', 'M', 50, 1, 0, 50),
(362, 185000, 46, 'SP0136', 'Hồng', 'L', 50, 1, 0, 50),
(363, 190000, 46, 'SP0137', 'Phối màu', 'Freesize', 100, 1, 0, 100),
(364, 200000, 46, 'SP0138', 'Hồng', 'Freesize', 100, 1, 0, 100),
(365, 150000, 46, 'SP0139', 'Tràm', 'Freesize', 100, 1, 0, 100),
(366, 190000, 46, 'SP0140', 'Hồng', 'Freesize', 100, 1, 0, 100),
(367, 140000, 46, 'SP0141', 'Phối màu', 'Freesize', 100, 1, 0, 100),
(368, 125000, 46, 'SP0142', 'Phối màu', 'Freesize', 50, 1, 0, 50),
(369, 140000, 47, 'SP0143', 'Xanh', 'Freesize', 100, 1, 0, 100),
(370, 140000, 47, 'SP0143', 'Cam', 'Freesize', 100, 1, 0, 100),
(371, 140000, 46, 'SP0144', 'Xanh nhạt', 'Freesize', 50, 1, 0, 50),
(372, 140000, 46, 'SP0144', 'Xanh đậm', 'Freesize', 50, 1, 0, 50),
(373, 125000, 47, 'SP0145', 'Phối màu', 'Freesize', 100, 1, 0, 100),
(374, 140000, 47, 'SP0146', 'Họa tiết trắng', 'Freesize', 100, 1, 0, 100),
(375, 125000, 47, 'SP0147', 'Hồng nhạt', 'M', 50, 1, 0, 50),
(376, 125000, 47, 'SP0147', 'Hồng đậm', 'L', 50, 1, 0, 50),
(377, 140000, 47, 'SP0148', 'Tràm', 'Freesize', 100, 1, 0, 100),
(378, 140000, 47, 'SP0148', 'Xanh', 'Freesize', 100, 1, 0, 100),
(379, 125000, 47, 'SP0149', 'Xanh', 'Freesize', 100, 1, 0, 100),
(380, 125000, 47, 'SP0149', 'Hồng', 'Freesize', 100, 1, 0, 100),
(381, 100000, 47, 'SP0150', 'Họa tiết', 'Freesize', 100, 1, 0, 100),
(382, 125000, 48, 'SP0151', 'Kẻ xám', 'S', 100, 1, 0, 100),
(383, 125000, 48, 'SP0151', 'Đen', 'M', 100, 1, 0, 100),
(384, 140000, 48, 'SP0152', 'Đen', 'Freesize', 100, 1, 0, 100),
(385, 125000, 48, 'SP0153', 'Vàng', 'S', 50, 1, 1, 49),
(386, 125000, 48, 'SP0153', 'Hồng', 'M', 50, 1, 0, 50),
(387, 125000, 48, 'SP0153', 'Đỏ', 'L', 50, 1, 0, 50),
(388, 140000, 48, 'SP0154', 'Nâu', 'Freesize', 100, 1, 0, 100),
(389, 140000, 48, 'SP0154', 'Xanh', 'Freesize', 100, 1, 1, 99),
(390, 140000, 48, 'SP0154', 'Đen', 'Freesize', 100, 1, 1, 99),
(391, 190000, 48, 'SP0155', 'Hồng', 'M', 50, 1, 0, 50),
(392, 190000, 48, 'SP0155', 'Xanh', 'L', 100, 1, 0, 100),
(393, 140000, 48, 'SP0156', 'Hồng', 'Freesize', 50, 1, 0, 50),
(394, 140000, 48, 'SP0156', 'Đỏ', 'Freesize', 50, 1, 1, 49),
(395, 165000, 48, 'SP0157', 'Phối màu', 'M', 100, 1, 0, 100),
(396, 165000, 48, 'SP0157', 'Phối màu', 'L', 100, 1, 0, 100),
(397, 150000, 48, 'SP0168', 'Phối màu', 'M', 100, 1, 0, 100),
(398, 140000, 48, 'SP0158', 'Phối màu', 'Freesize', 100, 1, 0, 100),
(399, 200000, 48, 'SP0159', 'Nâu', 'S', 100, 1, 0, 100),
(400, 200000, 48, 'SP0159', 'Đen', 'M', 100, 1, 0, 100),
(401, 180000, 48, 'SP0160', 'Be', 'S', 50, 1, 2, 48),
(402, 180000, 48, 'SP0160', 'Xám', 'M', 50, 1, 0, 50),
(403, 200000, 48, 'SP0161', 'Xanh trắng', 'M', 100, 1, 1, 99),
(404, 200000, 48, 'SP0161', 'Cam', 'L', 100, 1, 0, 100),
(405, 190000, 48, 'SP0162', 'Họa tiết', 'Freesize', 100, 1, 0, 100),
(406, 190000, 48, 'SP0162', 'Xanh trơn', 'Freesize', 100, 1, 0, 100),
(407, 250000, 48, 'SP0163', 'Đen', 'S', 50, 1, 0, 50),
(408, 250000, 48, 'SP0163', 'Be', 'M', 50, 1, 0, 50),
(409, 140000, 49, 'SP0164', 'Vàng', 'Freesize', 100, 1, 0, 100),
(410, 200000, 49, 'SP0165', 'Trắng', 'M', 50, 1, 0, 50),
(411, 200000, 49, 'SP0165', 'Xanh', 'L', 50, 1, 0, 50),
(412, 250000, 49, 'SP0166', 'Cam', 'Freesize', 100, 1, 0, 100),
(413, 260000, 49, 'SP0167', 'Kẻ', 'Freesize', 100, 1, 0, 100),
(414, 230000, 49, 'SP0169', 'Hồng', 'M', 50, 1, 0, 50),
(415, 230000, 49, 'SP0169', 'Trắng', 'L', 50, 1, 0, 50),
(416, 180000, 49, 'SP0170', 'Nâu', 'M', 50, 1, 0, 50),
(417, 180000, 49, 'SP0170', 'Đen', 'L', 50, 1, 0, 50),
(418, 270000, 49, 'SP0171', 'Nâu', 'S', 100, 1, 0, 100),
(419, 270000, 49, 'SP0171', 'Xanh', 'M', 100, 1, 0, 100),
(420, 230000, 49, 'SP0172', 'Đen', 'M', 100, 1, 0, 100),
(421, 230000, 49, 'SP0172', 'Nâu', 'L', 100, 1, 0, 100),
(422, 140000, 49, 'SP0173', 'Đen', 'S', 100, 1, 0, 100),
(423, 140000, 49, 'SP0173', 'Be', 'M', 100, 1, 0, 100),
(424, 150000, 49, 'SP0174', 'Be', 'S', 100, 1, 0, 100),
(425, 150000, 49, 'SP0174', 'Đen', 'M', 100, 1, 0, 100),
(426, 125000, 49, 'SP0175', 'Be đậm', 'Freesize', 50, 1, 0, 50),
(427, 125000, 49, 'SP0175', 'Đen', 'Freesize', 50, 1, 0, 50),
(428, 180000, 49, 'SP0176', 'Đen', 'Freesize', 100, 1, 0, 100),
(429, 180000, 49, 'SP0176', 'Be', 'Freesize', 100, 1, 0, 100),
(430, 250000, 49, 'SP0177', 'Bò', 'Freesize', 100, 1, 0, 100),
(431, 160000, 49, 'SP0178', 'Đen', 'M', 100, 1, 0, 100),
(432, 160000, 49, 'SP0178', 'Đen', 'L', 100, 1, 0, 100),
(433, 140000, 50, 'SP0179', 'Xanh', 'M', 100, 1, 0, 100),
(434, 140000, 50, 'SP0179', 'Đen', 'L', 100, 1, 0, 100),
(435, 150000, 50, 'SP0180', 'Xanh', 'S', 50, 1, 0, 50),
(436, 150000, 50, 'SP0180', 'Cam', 'M', 50, 1, 0, 50),
(437, 260000, 50, 'SP0181', 'Bò', 'Freesize', 100, 1, 0, 100),
(438, 160000, 50, 'SP0182', 'Đen', 'Freesize', 100, 1, 0, 100),
(439, 180000, 50, 'SP0183', 'Bò', 'M', 50, 1, 0, 50),
(440, 240000, 50, 'SP0184', 'Hồng', 'Freesize', 100, 1, 0, 100),
(441, 140000, 51, 'SP0185', 'Xám', 'S', 100, 1, 0, 100),
(442, 140000, 51, 'SP0185', 'Hồng', 'M', 100, 1, 0, 100),
(443, 140000, 51, 'SP0185', 'Vàng', 'L', 100, 1, 0, 100),
(444, 140000, 51, 'SP0185', 'Tím', 'XL', 100, 1, 0, 100),
(445, 200000, 50, 'SP0186', 'Đỏ', 'M', 50, 1, 0, 50),
(446, 200000, 50, 'SP0186', 'Nâu', 'L', 50, 1, 0, 50),
(447, 130000, 51, 'SP0187', 'Trắng', 'S', 50, 1, 1, 49),
(448, 130000, 51, 'SP0187', 'Đen', 'M', 50, 1, 0, 50),
(449, 130000, 51, 'SP0187', 'Vàng', 'L', 50, 1, 0, 50),
(450, 180000, 51, 'SP0188', 'Đỏ', 'Freesize', 100, 1, 0, 100),
(451, 180000, 51, 'SP0188', 'Đen', 'Freesize', 100, 1, 0, 100),
(452, 160000, 51, 'SP0189', 'Đen', 'Freesize', 50, 1, 0, 50),
(453, 160000, 51, 'SP0189', 'Nâu', 'Freesize', 50, 1, 0, 50),
(454, 90000, 51, 'SP0190', 'Be', 'S', 50, 1, 0, 50),
(455, 90000, 51, 'SP0190', 'Đen', 'M', 50, 1, 0, 50),
(456, 90000, 51, 'SP0190', 'Hồng', 'L', 50, 1, 0, 50),
(457, 190000, 51, 'SP0191', 'Xanh', 'Freesize', 50, 1, 0, 50),
(458, 190000, 51, 'SP0191', 'Đen', 'Freesize', 50, 1, 0, 50),
(459, 200000, 51, 'SP0192', 'Trắng', 'Freesize', 100, 1, 0, 100),
(460, 150000, 50, 'SP0193', 'Đen', 'Freesize', 50, 1, 0, 50),
(461, 150000, 50, 'SP0193', 'Be', 'Freesize', 50, 1, 0, 50),
(462, 210000, 51, 'SP0194', 'Đen', 'Freesize', 100, 1, 0, 100),
(463, 230000, 51, 'SP0195', 'Trắng', 'Freesize', 50, 1, 0, 50),
(464, 230000, 51, 'SP0195', 'Đen', 'Freesize', 50, 1, 0, 50),
(465, 200000, 51, 'SP0196', 'Đen', 'Freesize', 50, 1, 0, 50),
(466, 200000, 51, 'SP0196', 'Trắng', 'Freesize', 50, 1, 0, 50),
(467, 240000, 51, 'SP0197', 'Xanh đậm', 'M', 100, 1, 0, 100),
(468, 240000, 51, 'SP0197', 'Xanh nhạt', 'L', 100, 1, 0, 100),
(469, 140000, 51, 'SP0198', 'Trắng', 'Freesize', 20, 1, 0, 20),
(470, 200000, 52, 'SP0199', 'Đen', 'Freesize', 100, 1, 0, 100),
(471, 200000, 52, 'SP0200', 'Hồng', 'S', 50, 1, 0, 50),
(472, 200000, 52, 'SP0200', 'Trắng', 'M', 50, 1, 0, 50),
(473, 200000, 52, 'SP0200', 'Đen', 'L', 50, 1, 0, 50),
(474, 300000, 52, 'SP0201', 'Xanh', 'Freesize', 50, 1, 0, 50),
(475, 300000, 52, 'SP0201', 'Nâu', 'Freesize', 50, 1, 0, 50),
(476, 90000, 52, 'SP0202', 'Xanh', 'S', 50, 1, 0, 50),
(477, 90000, 52, 'SP0202', 'Tím', 'M', 50, 1, 0, 50),
(478, 90000, 52, 'SP0202', 'Đen', 'L', 50, 1, 0, 50),
(479, 90000, 52, 'SP0202', 'Trắng', 'XL', 50, 1, 0, 50),
(480, 100000, 52, 'SP0203', 'Tím', 'Freesize', 100, 1, 0, 100),
(481, 100000, 52, 'SP0203', 'Đen', 'Freesize', 100, 1, 0, 100),
(482, 100000, 52, 'SP0203', 'Xám', 'Freesize', 100, 1, 0, 100),
(483, 125000, 50, 'SP0204', 'Đỏ', 'S', 50, 1, 0, 50),
(484, 125000, 50, 'SP0204', 'Hồng', 'M', 50, 1, 0, 50),
(485, 125000, 50, 'SP0204', 'Xám', 'L', 10, 1, 0, 10),
(486, 125000, 50, 'SP0204', 'Cam', 'XL', 20, 1, 0, 20),
(487, 60000, 52, 'SP0205', 'Cam', 'Freesize', 100, 1, 0, 100),
(488, 100000, 52, 'SP0206', 'Đỏ', 'Freesize', 50, 1, 0, 50),
(489, 100000, 52, 'SP0206', 'Xám', 'Freesize', 50, 1, 0, 50),
(493, 90000, 54, 'SP0213', 'Đen', 'Freesize', 100, 1, 0, 100),
(494, 90000, 54, 'SP0213', 'Hồng', 'Freesize', 100, 1, 0, 100),
(496, 140000, 58, 'SP0216', 'Chấm bi', 'Freesize', 100, 1, 0, 100),
(497, 80000, 58, 'SP0215', 'Hồng', 'Freesize', 100, 1, 0, 100),
(498, 80000, 58, 'SP0215', 'Trắng', 'Freesize', 100, 1, 0, 100),
(500, 100000, 59, 'SP01', 'Đen', 'Freesize', 50, 1, 0, 50),
(501, 100000, 60, 'SP01', 'Đen', 'Freesize', 50, 1, 1, 49),
(502, 100000, 61, 'SP01', 'Đen', 'Freesize', 100, 1, 0, 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinsanpham`
--

CREATE TABLE `thongtinsanpham` (
  `id` bigint(20) NOT NULL,
  `masanpham` text NOT NULL,
  `iddanhmuc` bigint(20) NOT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinsanpham`
--

INSERT INTO `thongtinsanpham` (`id`, `masanpham`, `iddanhmuc`, `mota`) VALUES
(2, 'SP01', 10, 'Áo freesize dưới 65kg'),
(3, 'SP02', 11, 'Quần dài 40 - 50 cm'),
(4, 'SP03', 10, 'Áo freesize dưới 65kg'),
(5, 'SP04', 15, 'Freesize dưới 1m7, dưới 70kg'),
(6, 'SP05', 17, 'Freesize dưới 65kg'),
(7, 'SP06', 12, 'Quần có 3 size'),
(10, 'SP011', 28, 'Áo len polo nữ cộc tay, dáng áo rộng vừa, chất liệu và kiểu dáng phù hợp với thời tiết giao mùa, hoàn cảnh sử dụng linh hoạt.'),
(11, 'SP012', 10, 'Áo phông nữ dáng ngắn, với chất liệu 100% cotton mềm mịn, thấm hút. \r\nĐiểm nhấn của sản phẩm chính là phần thiết kế đồ họa ấn tượng, màu sắc nổi bật. \r\nChất liệu: 100% cotton. thấm hút tối đa, mềm mại và an toàn với làn da.'),
(12, 'SP013', 10, 'Áo cộc tay cổ tròn, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân. \r\nChất liệu Cotton Polyester \r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn, dấu dáng cho người mặc, ít nhăn.\r\n- Phom dáng: Phù hợp với phom dáng vừa đến rộng. \r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(13, 'SP014', 10, 'Áo phông cộc tay, thiết kế đơn giản tập trung vào cấu trúc vải dệt làm điểm nhấn. \r\nForm áo phù hợp với nhiều loại trang phục. \r\nChất liệu co giãn nhiều tạo sự thoải mái khi sử dụng. \r\nCấu trúc bề mặt vải mịn, bông sợi tạo điểm nhấn cho sản phẩm.'),
(16, 'SP017', 10, 'Áo phông nữ dài tay dáng ngắn crop top có chun gấu, dáng mặc bo chun bồng nhẹ phần gấu mang lại sự trẻ trung năng động, hợp thời trang.\r\nChất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi,đi làm, thời tiết mùa thu, mùa xuân.'),
(17, 'SP018', 10, 'Áo phông nữ phong cách nhẹ nhàng đơn giản'),
(18, 'SP019', 10, 'Áo phông croptop chất liệu 100% cotton, cổ tròn tay cộc, phom regular.'),
(19, 'SP020', 24, 'Áo cộc tay cổ bẻ, dáng ngắn, eo ôm vừa, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân.\r\nChất liệu Cotton Polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn, dấu dáng cho người mặc, ít nhăn.- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(20, 'SP021', 24, 'Áo cộc tay cổ bẻ, dáng ngắn, eo ôm vừa, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân.\r\nÁo mix màu phối ở gấu, cổ và nẹp áo, mang lại sự trẻ trung vào năng động.\r\nChất liệu Cotton Polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn,\r\ndấu dáng cho người mặc, ít nhăn. Nguyên liệu đứng\r\ndáng, mặc bền không bai dão.\r\n- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(21, 'SP022', 24, ''),
(22, 'SP023', 24, 'Áo polo chất liệu cotton pha, cổ bẻ tay cộc.'),
(23, 'SP024', 25, 'Áo ba lỗ chất liệu cotton pha, cổ tròn dáng ôm.'),
(24, 'SP025', 25, 'Áo ba lỗ chất liệu cotton co giãn, dáng ôm.'),
(25, 'SP026', 25, 'Áo ba lỗ chất liệu polyester, cổ tròn, đuôi tôm, phom regular.'),
(26, 'SP027', 25, 'Áo ba lỗ chất liệu polyester pha, cổ tròn dáng ôm.'),
(27, 'SP028', 25, 'Áo sát nách chất liệu cotton pha, cổ tròn, bo chun gấu.'),
(28, 'SP029', 25, 'Áo hai dây chất liệu cotton pha, vai cánh tiên, đường rút dây dọc thân trước.'),
(29, 'SP030', 25, 'Áo hai dây nữ dáng ôm body, chất liệu rayon pha'),
(30, 'SP031', 25, 'Áo ba lỗ chất liệu cotton co giãn, phom ôm'),
(31, 'SP032', 25, 'Áo ba lỗ chất liệu polyester pha, phom ôm.'),
(32, 'SP033', 26, 'Áo kiểu nữ dài tay cổ đức, dáng ôm vừa. Chất liệu dệt kim ánh nhũ.\r\nChất liệu dệt kim ánh nhũ, độ đàn hồi tốt, tạo cảm giác thoải mái cho người mặc.'),
(33, 'SP034', 26, 'Áo kiểu chất liệu cotton linen, cổ kiểu tay dài.'),
(34, 'SP035', 26, 'Áo phông chất liệu polyester, cổ vuông tay phồng, phom ôm.'),
(35, 'SP036', 26, 'Áo kiểu chất liệu 100% cotton, cổ V mở cúc, tay phồng.'),
(36, 'SP037', 26, 'Áo kiểu chất liệu tweed 100% polyester, 2 dây bản to cổ vuông, gấu xoả.'),
(37, 'SP038', 27, 'Áo sơ mi nữ dài tay, cổ đức, dáng suông.\r\nChất liệu 100% cotton với đặc tính thấm hút tốt, mềm mại và thoải mái khi sử dụng'),
(38, 'SP039', 27, 'Áo sơ mi chất liệu cotton,cổ đức, dáng ngắn.\r\nChất liệu cotton.\r\nThoáng mát và dễ chịu khi mặc.'),
(39, 'SP040', 27, 'Áo sơ mi chất liệu 100% cotton, cổ đức tay chờm.'),
(40, 'SP041', 27, 'Áo sơ mi chất liệu 100% cotton, cổ đức tay dài.'),
(41, 'SP042', 27, 'Áo sơ mi chất liệu 100% cotton, cổ đức túi ốp ngực.'),
(42, 'SP043', 27, 'Áo sơ mi nữ cổ đức chất liệu polyester pha'),
(43, 'SP044', 9, 'Áo nữ cổ tròn dài tay với các chi tiết tạo gân ở thân áo và sống tay kết hợp với chất liệu vải mỏng, mềm mix kim tuyến đã tạo nên 1 sản phẩm basic nhưng ấn tượng, phù hợp với nhiều hoàn cảnh mặc hàng ngày hay mùa lễ hội.\r\nCấu trúc dệt sợi lỏng và kết hợp với sợi kim tuyến tạo nên sự quyến rũ cho sản phẩm.\r\nThành phần chính là sợi Rayon mix với sợi poly tạo nên sự thoải mái, mềm mại và giữ phom sau nhiều lần sử dụng.'),
(44, 'SP045', 28, 'Áo len polo nữ cộc tay, dáng áo rộng vừa, chất liệu và kiểu dáng phù hợp với thời tiết giao mùa, hoàn cảnh sử dụng linh hoạt.\r\nChất liệu sợi cotton pha modal polyester giúp sản phẩm giữ ấm tốt mà vẫn thoáng khí và dễ chịu.'),
(45, 'SP046', 28, 'Áo len cổ tròn tay lửng, phom dáng cơ bản, chất liệu 100% acrylic.'),
(46, 'SP047', 28, 'Áo len cổ polo tay lửng, phom dáng ôm vừa, chất liệu mềm mại, thoải mái.'),
(47, 'SP048', 28, 'Áo len dài tay nữ cổ leo dáng ôm vừa, chất liệu mềm mại, thoải mái.\r\nĐộ đàn hồi tốt, tạo cảm giác mềm mại, thoải mái, ấm áp'),
(48, 'SP049', 28, 'Áo len polo nữ cộc tay, dáng áo rộng vừa, chất liệu và kiểu dáng phù hợp với thời tiết giao mùa, hoàn cảnh sử dụng linh hoạt.\r\nChất liệu sợi cotton giúp sản phẩm giữ ấm tốt mà vẫn thoáng khí và dễ chịu.'),
(49, 'SP050', 28, 'Áo len polo nữ dài tay, dáng áo rộng vừa, chất liệu\r\nvà kiểu dáng phù hợp với thời tiết giao mùa,\r\nhoàn cảnh sử dụng linh hoạt.\r\nChất liệu sợi cotton giúp sản phẩm giữ ấm tốt mà\r\nvẫn thoáng khí và dễ chịu.'),
(50, 'SP051', 28, 'Áo len dài tay nữ cổ tròn dáng vừa, chất liệu mềm mại, thoải mái.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và polyester giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt.'),
(51, 'SP052', 28, 'Áo len nữ vai chờm, cổ leo.\r\nChất liệu cotton modal pha polyester giúp sản phẩm giữ phom dáng đẹp, mà vẫn đảm bảo sự mềm mại và thoải mái.'),
(52, 'SP053', 28, 'Áo len gilet vặn thừng cổ tim, gấu dệt mix màu.\r\nChất liệu kết hợp giữa sợi len nhân tạo acrylic và polyester giúp sản phẩm mềm mại, nhẹ và giữ ấm tốt.'),
(53, 'SP054', 28, 'Áo len ghi lê nữ phối màu, họa tiết bông hoa.\r\nChất liệu acrylic giúp sản phẩm mềm nhẹ và giữ ấm tốt.'),
(54, 'SP055', 28, 'Áo len cổ tròn, dáng regular không quá ôm cũng không quá rộng tạo cho người mặc thấy thoải mái, vừa vặn. Phần thân áo dệt bằng chất liệu len lông cừu mềm, mịn, ấm áp, nhẹ nhàng, thoải mái khi mặc.\r\nÁo được dệt từ sợi 100% wool. Sợi có khả năng giữ ấm cực tốt do kết cấu từ sợi siêu mảnh, xốp với các lỗ trống có khả năng giữ không khí ấm bên trong tránh thoát hơi ấm ra ngoài.\r\nAn toàn cho người sử dụng: chống, ngăn ngừa sự xâm nhập và phát triển của vi khuẩn do thoát ẩm tốt.\r\nCảm giác tay khi sờ áo: mềm mại, xốp,\r\nkhông tích điện, mát tay.'),
(55, 'SP056', 28, 'Áo len nữ dài tay dáng dài, rộng vừa. Chất liệu bông xốp mềm mại và ấm áp.\r\nChất liệu: 70% acrylic 18% nylon 12% polyester.\r\nDầy bông, mềm mại, giữ ấm tốt'),
(56, 'SP057', 28, 'Áo len nữ'),
(57, 'SP058', 28, 'Áo len chất liệu 100% acrylic, áo cổ tròn tay lửng.'),
(58, 'SP059', 28, 'Áo len cổ lọ tay dài, dáng ôm.'),
(59, 'SP060', 28, 'Áo len chất liệu 100% len lông cừu Úc, cổ tròn cao tay dài.'),
(60, 'SP061', 28, 'Áo len cổ tròn tay phồng nhẹ.'),
(61, 'SP062', 28, 'Áo len chất liệu 100% acrylic, áo cổ tròn tay dài.'),
(62, 'SP063', 29, 'Áo nỉ dáng basic cổ tròn, thiết kế bo gấu tạo sự thoải mái khi mặc, kết hợp với các chi tiết đồ họa đơn giản tạo điểm nhấn cho sản phẩm.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ form dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.'),
(63, 'SP064', 29, 'Áo nỉ dáng basic cổ tròn, thiết kế bo gấu tạo sự thoải mái khi mặc, kết hợp với các chi tiết đồ họa đơn giản tạo điểm nhấn cho sản phẩm.'),
(64, 'SP065', 29, 'Áo nỉ nữ cổ tròn dáng rộng với phần đồ họa licence bố cục nổi bật, màu sắc đồ họa kết hợp với màu sắc của nền vải taoh nên 1 sản phẩm basic nhưng luôn đổi mới.\r\nChất liệu: 80% cotton 20% polyester.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ form dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.'),
(65, 'SP066', 29, 'Áo nỉ nữ với thiết kế điểm nhấn là chiếc khóa kéo bản cổ, linh hoạt trong sử dụng, có thể kéo full cổ khi đi ra ngoài hoặc bẻ cổ khi ở trong nhà, tạo nên 1 sản phẩm rất thoải mái trong mọi hoàn cảnh sử dụng.\r\nVới cấu trúc dệt jacquard tạo nên 1 bề mặt vải đanh mịn, phom áo luôn ổn định, giữ nhiệt tốt và rất thoải mái khi mặc.'),
(66, 'SP067', 29, 'Áo nỉ nữ'),
(67, 'SP068', 29, 'Áo nỉ dáng basic cổ tròn, thiết kế bo gấu tạo sự thoải mái khi mặc, kết hợp với các chi tiết đồ họa đơn giản tạo điểm nhấn cho sản phẩm.\r\nChất liệu: 95% poly 5% spandex.\r\nCo giãn, nhanh khô.'),
(68, 'SP069', 29, 'Áo nỉ dài tay dáng regular, thiết kế đơn giản, mặc thoải mái và dễ kết hợp với nhiều loại trang phục.\r\nChất liệu 100% polyester.'),
(69, 'SP070', 29, 'Áo nỉ nữ phối lá cổ dáng relax, ấn tượng với đồ họa nổi bật trên nền áo và phần lá cổ phối màu theo xu hướng tạo nên 1 sản phầm thời trang, trẻ trung và cá tính.\r\nChất liệu: 80% cotton 20% polyester.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ phom dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.'),
(70, 'SP071', 29, 'Áo nỉ chất liệu cotton pha, cổ tròn tra bo, gấu tay gấu thân bằng bo.'),
(71, 'SP072', 29, 'Áo nỉ chất liệu cotton pha, cổ tròn tra bo, gấu tay gấu thân bằng bo.'),
(72, 'SP073', 29, 'Áo nỉ chất liệu cotton pha, cổ tròn tay dài.'),
(73, 'SP074', 29, 'Áo nỉ chất liệu cotton pha, cổ tròn tay dài.'),
(74, 'SP075', 29, 'Áo nỉ chất liệu cotton pha, cổ cao, tay phồng.'),
(75, 'SP076', 29, 'Áo nỉ chất liệu cotton pha, cổ cao, tay phồng.'),
(76, 'SP077', 30, 'Áo hoodie nữ dáng oversize, phong cách khỏe khoắn với thiết kế can phối ở tay áo và hình in nổi bật tạo nên một sản phẩm ấn tượng, phù hợp với giới trẻ.'),
(77, 'SP078', 30, 'Áo hoodie nữ dáng oversize in hình nhân vật bản quyền của Disney phù hợp với giới trẻ. Sử dụng nguyên liệu cào lông mặt trái giúp giữ nhiệt và bề mặt đanh lì luôn giữ nguyên phom dáng.\r\nChất liệu: 60% cotton 40% polyester.\r\nĐanh lỳ, nhanh khô, giữ nhiệt tốt với mặt trái vải có cào bông, mềm mại với làn da, giữ phom sau khi sử dụng.'),
(78, 'SP079', 30, 'Áo nỉ nữ có mũ dáng relax với thiết kế đơn giản và điểm nhấn là hình đồ họa, dễ kết hợp với nhiều trang phục và nhiều hoàn cảnh sử dụng.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester với cấu trúc dệt vòng lông ở mặt trái, giúp cho sản phẩm giữ nhiệt tốt và bề mặt vải đanh mịn, thoải mái khi mặc và vận động.'),
(79, 'SP080', 43, 'Áo nỉ có mũ unisex người lớn'),
(80, 'SP081', 11, 'Quần shorts nữ, dáng hơi A, có dây rút eo, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, thời tiết mùa thu, mùa xuân.\r\nChất liệu Cotton Polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn, dấu dáng cho người mặc, ít nhăn.\r\n- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(81, 'SP082', 11, 'Quần shorts nữ dạ kẻ hai lớp.\r\nSự kết hợp của thành phần wool và polyester giúp sản phẩm giữ phom dáng tốt nhưng vẫn đảm bảo mềm mại và ấm áp.'),
(82, 'SP083', 11, 'Quần soóc chất liệu 100% cotton có lớp lót, cạp thường, phom regular.'),
(83, 'SP084', 11, 'Quần shorts nữ thuộc bộ sưu tập hình in chủ đề CNFLOW\r\nLấy cảm hứng từ phong cách thể thao, sự lựa chọn tối ưu cho sự năng động và trẻ trung.\r\nSử dụng công nghệ in In cao thành và thêu nổi, chât liệu da cá CVC thoàng mát.\r\nCanifa Z đưa đến cho bạn một lựa chọn tuyệt vời khoe cá tính và trải nghiệm dễ chịu cùng sản phẩm trong mọi hoạt động.'),
(84, 'SP085', 11, 'Quần soóc chất liệu 100% cotton, cạp thường, cúc cài trong cạp, phom regular.'),
(85, 'SP086', 11, 'Quần soóc chất liệu 100% cotton, cạp thường, cài cúc, phom regular.'),
(86, 'SP087', 11, 'Quần soóc chất liệu cotton pha, cạp chun.'),
(87, 'SP088', 11, 'Quần soóc nữ cotton cạp nhún chun'),
(88, 'SP089', 11, 'Quần soóc chất liệu cotton pha, cạp chun luồn dây dệt, phom regular.'),
(89, 'SP090', 11, 'Quần soóc jeans chất liệu 100% cotton, cạp nhún chun, phom regular.'),
(90, 'SP091', 11, 'Quần soóc jeans chất liệu 100% cotton, cạp thường cài cúc, phom regular.'),
(91, 'SP092', 11, 'Quần soóc chất liệu polyester, cạp chun luồn dây dệt.'),
(92, 'SP093', 11, 'Quần soóc chất liệu polyester, cạp liền phom ôm.\r\nTính năng: Wicking.'),
(93, 'SP094', 11, 'Quần soóc nữ cạp chun chất liệu cotton pha, nhiều màu sắc, phom dáng thoải mái'),
(94, 'SP095', 11, 'Quần soóc nữ chất liệu cotton USA thoải mái.'),
(95, 'SP096', 11, 'Quần soóc nữ chất liệu polyester, cạp chun luồn dây dệt.'),
(96, 'SP097', 12, 'Quần jeans nữ dáng crop đến mắt cá chân, với thiết kế phom ống đứng tôn dáng và các chi tiết cào rách nhẹ tạo điểm nhấn cho sản phẩm, phù hợp với nhiều loại trang phục và sử dụng được quanh năm.'),
(97, 'SP098', 12, 'Quần jeans nữ dáng flare với chất liệu co dãn thoải mái và thiết kế cutout phần ống quần tạo nên một sự mới mẻ cho chiếc quần đơn giản.'),
(98, 'SP099', 12, 'Quần jeans chất liệu 100% cotton, cạp nhún chun, dáng slouchy.'),
(99, 'SP0100', 12, 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, dáng flare.'),
(100, 'SP0101', 12, 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, phom ôm.'),
(101, 'SP0102', 12, 'Quần jeans chất liệu 100% cotton, cạp thường cài cúc, phom regular.'),
(102, 'SP0103', 12, 'Quần jeans chất liệu cotton pha, cạp thường cài cúc, dáng mom.'),
(103, 'SP0104', 13, 'Quần jeans nữ dáng flare'),
(104, 'SP0105', 14, 'Quần dệt kim nữ , ống rộng vừa phải, có dây rút eo, với chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, thời tiết mùa thu, mùa xuân.\r\nChất liệu Cotton Polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn, dấu dáng cho người mặc, ít nhăn.- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(105, 'SP0106', 14, 'Quần len dài mặc với áo dài Tết nữ, dáng suông rộng vừa.\r\nChất liệu pha nhiều thành phần giúp sản phẩm mềm mại và giữ ấm tốt.'),
(106, 'SP0107', 14, 'Quần dài chất liệu rayon linen, cạp thường kèm đai, dáng suông rộng.'),
(107, 'SP0108', 14, 'Quần dài cạp chun luồn dây dệt, dáng suông.'),
(108, 'SP0109', 14, 'Quần dài chất liệu polyester, cạp thường cài cúc, dáng suông.'),
(109, 'SP0110', 14, 'Quần vải chất liệu cotton rayon mềm maị.\r\nCạp thường, cài khuy, khóa phía trước.'),
(110, 'SP0111', 14, 'Quần dài nữ dáng suông'),
(111, 'SP0112', 31, 'Quần nỉ nữ basic dáng jogger với form fit vừa vặn dễ lựa chọn cho nhiều nhu cầu sử dụng. Phần cạp với thiết kế bo rib với độ đàn hồi lớn tạo sự thoải mái với nhiều kích thước vòng bụng khác nhau.'),
(112, 'SP0113', 31, 'Quần dài nữ chất liệu gió, phong cách khỏe khoắn với chi tiết túi hộp và rút dây hay bên gấu, tạo nên một sản phẩm năng động, thoải mái phù hợp với giới trẻ.\r\nChất liệu nhẹ, cản gió, thích hợp thời tiết mưa gió ẩm tại Việt Nam\r\nVải ít bám bẩn, không nhăn nhàu.'),
(113, 'SP0114', 31, 'Quần nỉ nữ dáng jogger basic, thiết kế vừa vặn với chất liệu đàn hồi giúp vận động thoải mái, bề mặt bên trong vải được dệt với cấu trúc vòng sợi giúp giữ nhiệt nhưng vẫn thoáng khí mang lại sự thoải mái cho người mặc.'),
(114, 'SP0115', 31, 'Quần nỉ nữ dáng chino với thiết kế cạp quần và gấu quần có chun, tạo cảm giác luôn thoải mái khi mặc, và dễ dàng vừa vặn với nhiều dáng người.\r\nVới cấu trúc dệt jacquard tạo nên 1 bề mặt vải đanh mịn, phom quần luôn ổn định, giữ nhiệt tốt và rất thoải mái khi mặc.'),
(115, 'SP0116', 31, 'Quần nỉ nữ dáng jogger basic, thiết kế đơn\r\ngiản, thoải mái và dễ kết hợp.'),
(116, 'SP0117', 31, 'Quần nỉ nữ dáng suông gấu có bo chun. Sử dụng nguyên liệu cào lông mặt trái giúp giữ nhiệt và bề mặt đanh lì luôn giữ nguyên phom dáng.\r\nChất liệu: 60% cotton 40% polyester.\r\nĐanh lỳ, nhanh khô, giữ nhiệt tốt với mặt trái vải có cào bông, mềm mại với làn da, giữ phom sau khi sử dụng.'),
(117, 'SP0118', 31, 'Quẩn nỉ nữ dáng suông với thiết kế túi hộp 2 bên cùng. Chất liệu dày dặn đứng phom, tạo nên 1 sản phẩm thời trang hoàn hảo.\r\nChất liệu: 80% cotton 20% polyester.\r\nSự kết hợp của 2 thành phần sợi cotton và polyester giúp sản phẩm giữ phom dáng tốt nhưng vẫn đảm bảo độ xốp và thoáng khí. Màu sắc bền đẹp và độ bền của sản phẩm cao.'),
(118, 'SP0119', 31, 'Kiểu dáng quần Jogger loose Unisex năng động.\r\nTay dài, phối mũ trùm và dây rút.\r\nPhối logo Canifa Z nổi bật ở ống quần trái.\r\nChất vải mềm mịn, giữ ấm và thấm hút tốt.\r\nGam màu hiện đại dễ dàng phối với nhiều trang phục và phụ kiện.\r\n\r\nThiết kế hình in độc nhất đậm chất đường phố, sử dụng công nghệ in PET đảm bảo độ tinh xảo từng chi tiết hình in.\r\n\r\nSản phẩm nàm trong show diễn \" Davines hair Show 2022\" . BST \" Ctrl Z\" mang tinh thần Gen-Z phóng khoáng đầy tự do.'),
(119, 'SP0120', 31, 'Quần nỉ chất liệu cotton pha, cạp chun luồn dây dệt, gấu bo chun.'),
(120, 'SP0121', 31, 'Quần nỉ chất liệu cotton pha, cạp chun luồn dây dệt, sườn và gấu quần phối màu.'),
(121, 'SP0122', 32, 'Quần khaki chất liệu cotton co giãn, cạp thường cài cúc, dáng falre.'),
(122, 'SP0123', 32, 'Quần khaki trơn, chất liệu cotton co giãn.\r\nPhom slimfit, dáng dài.\r\nĐơn giản, thoải mái, phù hợp nhiều hoàn cảnh.\r\nThích hợp mặc quanh năm.\r\nKết hợp với áo phông, sơ mi…với sandal, giày thể thao...'),
(123, 'SP0124', 44, 'Bộ nỉ nữ basic với thiết kế vừa vặn kết hợp với chất liệu có cấu trúc dệt vòng sợi giúp giữ ấm cơ thể mang lại sự thoải mái tối đa cho người sử dụng. Bên cạnh đó là các hình đồ họa nổi bật tạo nên phong cách trẻ trung và năng động.'),
(124, 'SP0125', 44, 'Bộ nỉ nữ với thiết kế phối màu ở phần áo tạo nên sự mới mẻ, phom dáng thoải mái trẻ trung dễ phù hợp với nhiều hoàn cảnh sử dụng.'),
(125, 'SP0126', 44, 'Bộ nỉ nữ basic với điểm nhấn là hình đồ họa nổi bật cùng với chất liệu vải cào bông ấm áp, phù hợp với nhiều hoàn cảnh sử dụng'),
(126, 'SP0127', 44, 'Bộ nỉ nữ thời trang với thiết kế cổ áo khóa kéo, phối màu nổi bật và hình đồ họa tinh tế, phom dáng trẻ trung với quần jogger và áo bomber, chất liệu dày dặn với cấu trúc vải cào lông giữ nhiệt, rất thích hợp với các hoạt động ngoài trời.'),
(127, 'SP0128', 44, 'Bộ quần áo chất liệu cotton pha, áo cổ tròn tay dài, quần soóc cạp chun.'),
(128, 'SP0129', 44, 'Bộ quần áo nữ chất nỉ áo dài tay quần soóc có hình in'),
(129, 'SP0130', 44, 'Bộ quần áo nỉ nữ có hình in'),
(130, 'SP0131', 18, 'Bộ mặc nhà nữ'),
(131, 'SP0132', 18, 'Bộ mặc nhà nữ áo dài tay quần dài in hoạ tiết'),
(132, 'SP0133', 18, 'Bộ mặc nhà pyjama nữ phom dáng vừa vặn, thoải mái, lịch sự. Chất liệu nguồn gốc tự nhiên, co giãn tốt, mềm mại dễ chịu, phù hợp các hoạt động nghỉ ngơi.'),
(133, 'SP0134', 17, 'Quần mặc nhà nữ'),
(134, 'SP0135', 18, 'Bộ mặc nhà nữ dài tay, quần dài. Phom dáng basic gọn gàng, lịch sự. Chất liệu mềm mại, mỏng nhẹ dễ chịu, màu sắc hài hòa, phù hợp nhiều lứa tuổi, thích hợp các hoạt động nghỉ ngơi thư giãn.\r\nChất liệu cotton pha thấm hút mồ hôi, nhẹ nhàng mềm mại, dễ chịu.'),
(135, 'SP0136', 18, 'Bộ mặc nhà nữ áo dài tay quần suông dài, chất liệu nhung mềm mại thoải mái và giữ ấm tốt. Sản phẩm phù hợp với thời tiết giao mùa.\r\nVải nhung 95% polyester 5% spandex: mềm mại, giữ ấm tốt.'),
(136, 'SP0137', 18, 'Bộ mặc nhà nữ dài tay, quần dài. Nguyên liệu nguồn gốc tự nhiên, mềm mại. Phom dáng vừa vặn, thoải mái, lịch sự. Màu sắc trẻ trung, tươi sáng, sạch sẽ, thích hợp cho các hoạt động nghỉ ngơi.\r\nSản phẩm có chứng chỉ OEKO-Tex.'),
(137, 'SP0138', 18, 'Bộ mặc nhà dáng suông rủ vừa phải, gọn gàng nhưng vẫn rộng rãi thoải mái.\r\nNguyên liệu dệt kim giả len mềm mại, ấm áp, mỏng nhẹ tạo cảm giác dễ chịu khi mặc, phù hợp các hoạt động nghỉ ngơi.'),
(138, 'SP0139', 18, 'Bộ mặc nhà dáng suông rủ vừa phải, gọn gàng nhưng vẫn rộng rãi thoải mái. Nguyên liệu Rib dệt kim mềm mại, mỏng nhẹ, họa tiết và màu sắc tràm ấm, nhẹ nhàng nữ tính tạo cảm giác dễ chịu khi mặc, phù hợp các hoạt động nghỉ ngơi.'),
(139, 'SP0140', 18, 'Bộ mặc nhà quần dài, áo dài tay form suông vừa, tôn dáng, gọn gàng, nữ tính.\r\nChất liệu giả len mỏng mềm mại, thoải mái. Màu sắc nhẹ nhàng, tươi trẻ, phù hợp với các hoạt động nghỉ ngơi.'),
(140, 'SP0141', 17, 'Bộ mặc nhà 2 dây quần short'),
(141, 'SP0142', 17, 'Bộ mặc nhà nữ áo cotton ba lỗ cổ tim quần đùi cạp chun'),
(142, 'SP0143', 17, 'Bộ mặc nhà chất liệu 100% viscose, áo tay cộc, quần soóc cạp chun.'),
(143, 'SP0144', 17, 'Bộ mặc nhà chất liệu cotton co giãn, áo tay cộc, quần soóc cạp chun.'),
(144, 'SP0145', 17, 'Quần soóc mặc nhà nữ cạp chun'),
(145, 'SP0146', 17, 'Bộ mặc nhà nữ cotton cộc tay quần soóc cạp chun có hình in'),
(146, 'SP0147', 17, 'Bộ mặc nhà nữ cổ tim tròn cộc tay quần đùi cạp chun'),
(147, 'SP0148', 17, 'Bộ mặc nhà nữ cổ tim mở cúc cộc tay quần đùi'),
(148, 'SP0149', 17, 'Bộ mặc nhà áo cổ henley tay cộc chất liệu polyester pha, phối quần soóc dệt thoi chất liệu 100% viscose'),
(149, 'SP0150', 17, 'Bộ mặc nhà nữ áo cổ tim cộc tay quần dài in họa tiết'),
(150, 'SP0151', 33, 'Váy liền nữ dáng A tay lỡ, chất liệu dầy dặn co dãn thoải mái, dễ chịu cho người mặc.\r\nChất liệu dệt kim dầy dặn, co dãn tốt tạo cảm giác thoải mái cho người mặc mà vẫn tôn dáng.'),
(151, 'SP0152', 33, 'Đầm liền nữ dáng A, tay ngắn, phối nguyên liệu, chất liệu mềm mại, thoải mái.\r\nChất liệu kết hợp thân áo là cotton, phần dưới là nylon, vẫn tạo cảm giác thoải mái cho người mặc trong mọi hoạt động.'),
(152, 'SP0153', 33, 'Áo dài len Tết nữ, cổ tròn dài tay, thêu hoa bên ngực.\r\nChất liệu pha nhiều thành phần giúp sản phẩm mềm mại và giữ ấm tốt.'),
(153, 'SP0154', 33, 'Váy liền nữ interlock dáng suông'),
(154, 'SP0155', 33, 'Váy dệt kim polo nữ dài tay, dáng ôm vừa, thoải mái, phù hợp với thời tiết giao mùa, hoàn cảnh sử dụng linh hoạt.\r\nChất liệu cotton pha, đàn hồi, tạo cảm giác thoải mái ấm áp cho người mặc.'),
(155, 'SP0156', 33, 'Áo dài len Tết nữ, cổ xẻ V cách điệu, vai chờm.\r\nChất liệu pha nhiều thành phần giúp sản phẩm mềm mại và giữ ấm tốt.'),
(156, 'SP0157', 33, 'Váy liền nữ hai lớp dạ kiểu phối tay dài.\r\nSự kết hợp giữa chất liệu liệu dạ kiểu phần thân váy hai lớp và phần tay áo chất liệu cotton, giúp sản phầm giữ phom dáng tốt nhưng vẫn đảm bảo mềm mại và ấm áp.'),
(157, 'SP0158', 33, 'Váy liền nữ dáng dài, chất liệu nỉ ấm áp phối màu. In hình trước ngực, kéo khóa cổ. Phom dáng thoải mái trẻ trung.\r\nChất liệu dầy dặn, mềm mại, ấm áp, tạo cảm giác thoải mái cho người mặc trong thời tiết thu đông.'),
(158, 'SP0159', 33, 'Váy liền nữ cổ bẻ, dáng A có cắt eo hơi bồng nhẹ, chất liệu interlock dầy dặn, thoải mái, nguyên liệu mặc tôn dáng, giữ phom khi mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân.'),
(159, 'SP0160', 33, 'Váy liền nữ cổ bẻ, dáng dài có cắt bổ thân tạo eo, giúp người mặc vô cùng tôn dáng, tay xếp nếp tạo bồng nhẹ, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân.'),
(160, 'SP0161', 33, 'Váy liền nữ chất liệu linen pha, cổ tim sát nách, chun eo.'),
(161, 'SP0162', 33, 'Váy liền có lót, cổ tròn, tay phồng, chun eo, dáng xoè.'),
(162, 'SP0163', 33, 'Váy liền nữ'),
(163, 'SP0164', 33, 'Váy liền chất liệu 100% cotton, cổ tròn tay cộc, phom suông.'),
(164, 'SP0165', 33, 'Váy liền chất liệu cotton pha, có mũ luồn dây dệt, túi ốp bụng, dáng suông.'),
(165, 'SP0166', 33, 'Váy liền chất liệu cottn linen có lớp lót, cúc dọc thân, dúm eo, dáng fit & flare.'),
(166, 'SP0167', 33, 'Váy liền chất liệu polyester pha, cổ tròn tay bồng nhẹ, dáng fit & flare.'),
(167, 'SP0168', 33, 'Váy liền chất liệu 100% cotton, cổ tàu xẻ V, tay raglange, dún nhẹ ở đỉnh vai, cửa tay dún tạo phồng.'),
(168, 'SP0169', 33, 'Váy liền nữ cổ vuông hai dây dáng fit & flare có lót trong'),
(169, 'SP0170', 33, 'Áo dài nữ vải sợi cổ cao sát nách dáng ôm'),
(170, 'SP0171', 33, 'Váy liền nữ dáng suông chất liệu 100% cotton thoáng mát thoải mái.'),
(171, 'SP0172', 33, 'Váy yếm, chất liệu Polyester\r\nDáng suông, phối túi có cúc'),
(172, 'SP0173', 34, 'Chân váy gió nữ dáng dài, phong cách khỏe khoắn với chi tiết túi hộp và rút dây hai bên gấu, tạo nên một sản phẩm năng động, thoải mái phù hợp với giới trẻ.\r\nChất liệu nhẹ, cản gió, thích hợp thời tiết mưa gió ẩm tại Việt Nam.\r\nVải ít bám bẩn, không nhăn nhàu.'),
(173, 'SP0174', 34, 'Chân váy ngắn xếp ly dáng xòe, với chất liệu siêu mềm mại kết vợi với kiểu dáng xếp ly toàn bộ tùng váy tạo nên 1 sản phẩm dễ kết hợp với nhiều loại trang phục, trẻ trung và dễ mặc.\r\nCấu trúc dệt 2 mặt giống nhau với chi số sợi nhỏ tạo nên bề mặt vải mịn, mềm nhg vẫn đanh lỳ giúp cho sản phẩm luôn ổn định phom dáng và thoải mái khi mặc.'),
(174, 'SP0175', 34, 'Chân váy ngắn có quần bên trong, dáng hơi A,\r\ncó dây rút eo.\r\nChất liệu interlock dầy dặn, thoải mái, dễ chịu.\r\nChất liệu cotton polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn,\r\ndấu dáng cho người mặc, ít nhăn.\r\n- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(175, 'SP0176', 34, 'Chân váy nữ'),
(176, 'SP0177', 34, 'Chân váy midi jean nữ dáng suông với thiết kế các đường chỉ nổi bật màu trắng làm điểm nhấn và chất liệu dày dặn đứng phom tạo nên một sản phẩm thời trang nhưng vẫn dễ ứng dụng với nhiều sản phầm và nhiều hoàn cảnh sử dụng khác nhau.'),
(177, 'SP0178', 34, 'Chân váy dài qua gối nữ, dáng hơi A, có dây rút eo, chất liệu interlock dầy dặn, thoải mái, dễ chịu cho người mặc, phù hợp với đi chơi, đi làm, thời tiết mùa thu, mùa xuân.\r\nChất liệu Cotton Polyester\r\n- Ưu điểm của nguyên liệu: Bề mặt lì, chắc dày dặn, dấu dáng cho người mặc, ít nhăn.- Phom dáng: Phù hợp với phom dáng vừa đến rộng.\r\n- Mùa: Phù hợp thời điểm giao mùa (Xuân và Thu).'),
(178, 'SP0179', 34, 'Chân váy len ngắn dáng A, dệt họa tiết kẻ. Chất liệu sợi len phối lông, mang lại cảm giác mềm mại và ấm áp.\r\nChất liệu: 73% nylon 27% notton.\r\nKết hợp hai loại sợi, dầy dặn, mềm mại, giữ ấm tốt.'),
(179, 'SP0180', 34, 'Chân váy nữ in họa tiết kèm đai dáng suông'),
(180, 'SP0181', 34, 'Chân váy jean chất liệu 100% cotton, cạp thường cài cúc, phom regular.'),
(181, 'SP0182', 34, 'Chân váy xếp ly nữ cạp liền dáng ngắn'),
(182, 'SP0183', 34, 'Chân váy nữ midi cạp chun dáng ôm'),
(183, 'SP0184', 34, 'Chân váy chất liệu tweed 100% polyester, dáng A.'),
(184, 'SP0185', 35, 'Áo khoác chống nắng chất liệu polyester, có mũ, kéo khoá, túi 2 bên.\r\nTính năng: AntiUV.'),
(185, 'SP0186', 36, 'Áo khoác dạ kẻ nữ 2 lớp cổ vest dáng ngắn.\r\nSự kết hợp của thành phần wool và polyester giúp sản phẩm giữ phom dáng tốt nhưng vẫn đảm bảo mềm mại và ấm áp.'),
(186, 'SP0187', 36, 'Áo khoác len nữ cổ V, chất liệu Acrylic polyester phom dáng ngắn vừa, phù hợp với mùa thu đông.Chất liệu len sợi, mềm, tạo cảm giác thoải mái.'),
(187, 'SP0188', 36, 'Áo khoác nỉ nữ dáng bomber ngắn, các chi tiết điểm nhấn như bo gấu phối kẻ, hình thêu tinh tế sắc nét tạo nên 1 sản phẩm chất lượng và nổi bật.\r\nCấu trúc dệt 2 mặt giống nhau với chi số sợi nhỏ tạo nên bề mặt vải mịn, mềm nhg vẫn đanh lỳ giúp cho sản phẩm luôn ổn định phom dáng và thoải mái khi mặc.'),
(188, 'SP0189', 36, 'Áo cardigan nữ'),
(189, 'SP0190', 36, 'Áo khoác len nữ cổ tròn, chất liệu Acrylic polyester phom dáng cơ bản basic, phù hợp với mùa thu đông.\r\nChất liệu len sợi, mềm, tạo cảm giác thoải mái.'),
(190, 'SP0191', 36, 'Áo khoác len nữ dài tay cổ tròn, dêt họa tiết kẻ.\r\nChất liệu sợi len phối lông, mang lại cảm giác mềm mại và ấm áp.\r\nChất liệu: 73% nylon 27% cotton.\r\nKết hợp hai loại sợi, dầy dặn, mềm mại, giữ ấm tốt.'),
(191, 'SP0192', 36, 'Áo blazer nữ cộc tay túi vuông 2 bên'),
(192, 'SP0193', 37, 'Áo khoác gió nữ'),
(193, 'SP0194', 37, 'Áo khoác gió nữ 2 lớp có mũ chống thấm nước'),
(194, 'SP0195', 38, 'Áo khoác chần bông siêu nhẹ nữ, giữ ấm tốt. Phom dáng gọn gàng, hiện đại, có thể gấp gọn vào túi tặng kèm. Mũ áo có khóa rời đa năng, tiên lợi. Màu sắc phong phú, phù hợp được nhiều lứa tuổi, dễ dàng mix đồ.\r\nVải ít bám bẩn, dễ vệ sinh.\r\nVải ít nhăn nhàu và dễ làm phẳng lại.\r\nCó khả năng cản gió, giữ ấm tốt.'),
(195, 'SP0196', 38, 'Áo khoác gilet nữ nhồi bông thổi. Phom dáng vừa vặn, thời trang, màu sắc trẻ trung hiện đại dễ mix match. Chất liệu có bề mặt bền vững, chống nước.'),
(196, 'SP0197', 38, 'Áo khoác chần bông nữ'),
(197, 'SP0198', 38, 'Áo khoác nữ thổi bông dày, cổ cao giữ ấm tốt. Phom áo phồng nhẹ gọn gàng, trẻ trung hiện đại. Màu sắc cơ bản dễ mix match trang phục, phù hợp nhiều độ tuổi và hoàn cảnh sử dụng.Nguyên liệu vải gió chống thấm nước, không nhăn nhàu. Lớp giữa thổi bông phồng giữ ấm tốt nhưng nhẹ nhàng, dễ sử dụng.'),
(198, 'SP0199', 38, 'Áo khoác chất liệu 100% polyester chống thấm nước, cổ cao kéo khoá, gấu tay bo chun, gấu thân luồn chun có chốt chặn.'),
(199, 'SP0200', 39, 'Áo khoác lông vũ siêu nhẹ, giữ ấm rất tốt, phom dáng vừa vặn, gọn gàng, phù hợp nhiều lứa tuổi, nhiều phong cách. Cổ tròn, cúc bấm trẻ trung hiện đại.'),
(200, 'SP0201', 39, 'Áo khoác lông vũ dáng dài, phom dáng vừa vặn, gọn gàng, hiện đại. Đường trần bông ziczac mới lạ, đai áo trần chun có móc cài tiên lợi. Màu sắc trẻ trung sạch sẽ, phù hợp nhiều lứa tuổi. Áo giữ ấm tốt và có bề mặt chống nước.\r\nChất liệu vải gió mướt mịn chống nước chống gió.'),
(201, 'SP0202', 41, 'Áo giữ nhiệt nữ cổ tròn, nguyên liệu mềm mịn, co giãn đàn hồi tốt, ôm sát giữ nhiệt cho cơ thể và thoải mái dễ chịu khi sử dụng.'),
(202, 'SP0203', 41, 'Áo giữ nhiệt nữ cổ cao, nguyên liệu mềm mịn, co giãn đàn hồi tốt, ôm sát giữ nhiệt cho cơ thể và thoải mái dễ chịu khi sử dụng.'),
(203, 'SP0204', 41, 'Áo giữ nhiệt nữ cổ lửng 3cm, nguyên liệu mềm mịn, co giãn đàn hồi tốt, ôm sát giữ nhiệt cho cơ thể và thoải mái dễ chịu khi sử dụng.'),
(204, 'SP0205', 41, 'Áo giữ nhiệt nữ cổ cao'),
(205, 'SP0206', 41, 'Áo giữ nhiệt nữ cổ tròn dài tay dáng ôm'),
(207, 'SP0208', 43, 'Áo crop nữ dáng ôm, với cấu trúc dệt rib tạo sự đàn hồi tối đa cho sản phẩm, thiết kế đơn giản phù hợp với nhiều trang phục khác nhau.'),
(208, 'SP0209', 10, 'Áo crop nữ dáng ôm, với cấu trúc dệt rib tạo sự đàn hồi tối đa cho sản phẩm, thiết kế đơn giản phù hợp với nhiều trang phục khác nhau.'),
(212, 'SP0213', 10, 'Áo t-shirt dáng babytee với chất liệu 100% cotton thoáng mát, thấm hút tốt, với điểm nhấn là chi tiết thêu nhỏ trên ngực áo.'),
(213, 'SP0214', 43, ''),
(214, 'SP0215', 25, 'Áo sát nách nữ với chất liệu vải dệt đặc biệt và có tính năng wicking giúp sản phẩm nhanh khô, thoáng, nhẹ. Rất phù hợp với các hoạt hộng thể thao.'),
(215, 'SP0216', 24, 'Áo polo nữ vải họa tiết, dáng áo slim với chất liệu co dãn vừa tôn dáng vừa thoải mái khi mặc.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dangkycalam`
--
ALTER TABLE `dangkycalam`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idphanloai` (`idphanloai`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkhachhang` (`idkhachhang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkhachhang` (`idkhachhang`);

--
-- Chỉ mục cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhanhsanpham_ibfk_1` (`idsanpham`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsoluong` (`idsoluong`);

--
-- Chỉ mục cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnhanvien` (`idnhanvien`),
  ADD KEY `idnhacungcap` (`idnhacungcap`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vitri` (`vitri`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnhomquyen` (`idnhomquyen`),
  ADD KEY `phanquyen_ibfk_2` (`idquyentruycap`);

--
-- Chỉ mục cho bảng `quyentruycap`
--
ALTER TABLE `quyentruycap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idthongtinsanpham` (`idthongtinsanpham`);

--
-- Chỉ mục cho bảng `soluong`
--
ALTER TABLE `soluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soluong_ibfk_1` (`idsanpham`);

--
-- Chỉ mục cho bảng `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkhachhang` (`idkhachhang`),
  ADD KEY `iddonhang` (`iddonhang`);

--
-- Chỉ mục cho bảng `thongtinkhuyenmai`
--
ALTER TABLE `thongtinkhuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thongtinlohang`
--
ALTER TABLE `thongtinlohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idlohang` (`idlohang`);

--
-- Chỉ mục cho bảng `thongtinsanpham`
--
ALTER TABLE `thongtinsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddanhmuc` (`iddanhmuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dangkycalam`
--
ALTER TABLE `dangkycalam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `lohang`
--
ALTER TABLE `lohang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `phanloaisanpham`
--
ALTER TABLE `phanloaisanpham`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT cho bảng `quyentruycap`
--
ALTER TABLE `quyentruycap`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT cho bảng `soluong`
--
ALTER TABLE `soluong`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT cho bảng `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `thongtinkhuyenmai`
--
ALTER TABLE `thongtinkhuyenmai`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `thongtinlohang`
--
ALTER TABLE `thongtinlohang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT cho bảng `thongtinsanpham`
--
ALTER TABLE `thongtinsanpham`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD CONSTRAINT `danhmucsanpham_ibfk_1` FOREIGN KEY (`idphanloai`) REFERENCES `phanloaisanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhang` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhang` (`id`);

--
-- Các ràng buộc cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD CONSTRAINT `khuyenmai_ibfk_1` FOREIGN KEY (`idsoluong`) REFERENCES `soluong` (`id`);

--
-- Các ràng buộc cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD CONSTRAINT `lohang_ibfk_2` FOREIGN KEY (`idnhacungcap`) REFERENCES `nhacungcap` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`vitri`) REFERENCES `nhomquyen` (`id`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_ibfk_1` FOREIGN KEY (`idnhomquyen`) REFERENCES `nhomquyen` (`id`),
  ADD CONSTRAINT `phanquyen_ibfk_2` FOREIGN KEY (`idquyentruycap`) REFERENCES `quyentruycap` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idthongtinsanpham`) REFERENCES `thongtinsanpham` (`id`);

--
-- Các ràng buộc cho bảng `soluong`
--
ALTER TABLE `soluong`
  ADD CONSTRAINT `soluong_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
  ADD CONSTRAINT `thongtindonhang_ibfk_1` FOREIGN KEY (`idkhachhang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `thongtindonhang_ibfk_2` FOREIGN KEY (`iddonhang`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `thongtinlohang`
--
ALTER TABLE `thongtinlohang`
  ADD CONSTRAINT `thongtinlohang_ibfk_1` FOREIGN KEY (`idlohang`) REFERENCES `lohang` (`id`);

--
-- Các ràng buộc cho bảng `thongtinsanpham`
--
ALTER TABLE `thongtinsanpham`
  ADD CONSTRAINT `thongtinsanpham_ibfk_1` FOREIGN KEY (`iddanhmuc`) REFERENCES `danhmucsanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
