-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 09, 2020 lúc 10:23 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbquanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `TenKhachHang` varchar(100) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `GhiChu` varchar(100) DEFAULT NULL,
  `TongTien` double DEFAULT NULL,
  `TrangThai` bit(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaSP` varchar(100) NOT NULL,
  `TENSP` varchar(100) NOT NULL,
  `SL` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `HoTen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `NoiDung` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menucha`
--

CREATE TABLE `menucha` (
  `id` int(11) NOT NULL,
  `TenMenuCha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menucha`
--

INSERT INTO `menucha` (`id`, `TenMenuCha`) VALUES
(1, 'Hộp Bảo Quản'),
(2, 'Dụng Cụ Nấu Ăn'),
(3, 'Đồ Dùng Trên Bàn'),
(4, 'Đồ Dùng Dã Ngoại'),
(5, 'Bình Giữ Nhiệt/Giữ Lạnh'),
(6, 'Bảo Quản Đồ Đạc'),
(7, 'Hàng Gia Dụng'),
(8, 'Phụ Kiện Nhà Bếp'),
(9, 'Đồ Dùng Sinh Hoạt'),
(10, 'Đồ Dùng Trẻ Em'),
(11, 'Đồ Nội Thất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menucon`
--

CREATE TABLE `menucon` (
  `id` int(11) NOT NULL,
  `TenMenuCon` varchar(100) NOT NULL,
  `id_Cha_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `menucon`
--

INSERT INTO `menucon` (`id`, `TenMenuCon`, `id_Cha_FK`) VALUES
(1, 'Hộp kín hơi', 1),
(2, 'Hộp nhựa', 1),
(3, 'Hủ gia vị', 1),
(4, 'Nắp hộp kín hơi', 1),
(5, 'Chảo/Chảo sâu lòng', 2),
(6, 'Nồi chảo/ Nồi áp suất', 2),
(7, 'Dùng cho lò nướng', 2),
(8, 'Dụng cụ trộn thực phẩm', 2),
(9, 'Khay/ rổ', 2),
(10, 'Dụng cụ nhà bếp/ Đồ gắp', 2),
(11, '\r\nDao/ Kéo', 2),
(12, '\r\nThớt', 2),
(13, 'Bình nước', 3),
(14, 'Ly/ Cốc', 3),
(15, 'Đế nồi', 3),
(16, 'Khay', 3),
(17, 'Tấm lót bàn ăn', 3),
(18, 'Ấm đun nước', 3),
(19, 'Bình nước', 4),
(20, '\r\nHộp cơm', 4),
(21, 'Đồ dùng du lịch', 4),
(22, '\r\nĐồ dùng cắm trại', 4),
(23, 'Hộp cơm giữ nhiệt', 5),
(24, '\r\nHộp đựng cháo', 5),
(25, '\r\nBình giữ nhiệt/ Giữ lạnh', 5),
(26, 'Túi chườm lạnh', 5),
(27, 'Thùng đựng đồ', 6),
(28, 'Giỏ', 6),
(29, 'Kệ/ Tủ', 6),
(30, 'Kệ kéo', 6),
(31, 'Túi hút chân không', 6),
(32, 'Thiết bị nhà bếp', 7),
(33, 'Thiết bị gia dụng', 7),
(34, 'Dụng cụ vệ sinh', 8),
(35, 'Đồ rửa chén', 8),
(36, 'Dụng cụ làm đá', 8),
(37, 'Dụng cụ nấu ăn', 8),
(38, 'Giá/ Kệ', 8),
(39, 'Hàng dùng một lần', 8),
(40, 'Dụng cụ bảo quản tủ lạnh', 8),
(41, 'Dụng cụ nhà tắm', 9),
(42, 'Thùng rác', 9),
(43, 'Móc/Kệ treo đồ', 9),
(44, 'Chăn/ra/ gối', 9),
(45, 'Cây lau nhà', 9),
(46, 'Dụng cụ uống sữa', 10),
(47, 'Đồ dùng cho bé', 10),
(48, 'Dụng cụ vệ sinh cho bé', 10),
(49, 'Thảm cho bé', 10),
(50, 'Bàn đa năng', 11),
(51, 'Kệ treo/ Kệ sách', 11),
(52, 'Bàn/ Tủ/ Ghế', 11),
(53, 'Giường', 11),
(54, 'Sofa / Đồ dùng phòng khách', 11),
(55, 'Thảm', 11),
(56, 'Phụ kiện nội thất', 11),
(57, 'Đèn', 11),
(58, 'Tủ quần áo/ Tủ lắp ráp', 11),
(59, 'Bàn trang điểm/ Gương', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register`
--

CREATE TABLE `register` (
  `TenTaiKhoan` varchar(250) NOT NULL,
  `TenKhachHang` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pasword` varchar(250) NOT NULL,
  `SoDienThoai` varchar(250) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(250) NOT NULL,
  `GioiTinh` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` varchar(100) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `AnhSP` varchar(100) NOT NULL,
  `ThongTinChiTiet` varchar(300) NOT NULL,
  `GIA_BD` float NOT NULL,
  `GIA_HT` float NOT NULL,
  `NgayDang` date NOT NULL,
  `id_Con_FK` int(11) NOT NULL,
  `SP_KM` bit(1) DEFAULT NULL,
  `SP_HOT` bit(1) DEFAULT NULL,
  `Active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `AnhSP`, `ThongTinChiTiet`, `GIA_BD`, `GIA_HT`, `NgayDang`, `id_Con_FK`, `SP_KM`, `SP_HOT`, `Active`) VALUES
('HPL550', 'HPL550- Hộp bảo quản gạo bằng nhựa Lock&Lock 12kg', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201900832117140.jpg\">\r\n<img src=\"http://www.lo', '<img src=\"/prod/spec_img/HPL550%2D%5Fdesign.jpg\">\r\nThương hiệu: Lock&Lock\r\nNơi Sản XUất: Trung Quốc\r\nKích thước: 370 x 215 x 290(mm)\r\nChất liệu: Nhựa PP,PS\r\nMàu Sắc: Trắng', 290000, 290000, '0000-00-00', 1, b'0', b'0', b'1'),
('HPL806S6', 'Bộ 6 hộp bảo quản Lock&Lock Classic (HPL806*2, HPL807*2, HPL816*1, HPL817*1)', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834440539728.JPG\">\r\n<img src=\"http://www.lo', '<img src=\"/prod/spec_img/3.JPG\">\r\n<img src=\"/prod/spec_img/HPL806S6.JPG\">\r\n<img src=\"/prod/spec_img/HPL806S6%2DCover.JPG\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam\r\nChất liệu	Nhựa PP', 380000, 380000, '0000-00-00', 1, b'0', b'0', b'1'),
('HPL817S5', 'Bộ 6 hộp bảo quản Lock&Lock Classic (HPL817*2, HPL817C*1, HPL854*2, HPL855*1)', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834440539358.JPG\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/HPL817S5%5Fcover%5F5.JPG\" title=\"HPL817S5%5Fcover%5F5.JPG\" ow=\"1500\" oh=\"1500\" style=\"width: 1100px; height: auto;\">\r\n<img src=\"/prod/spec_img/HPL817S5%5Fcover%5F2.JPG\" title=\"HPL817S5%5Fcover%5F2.JPG\" ow=\"1500\" oh=\"1500\" style=\"width: 1100px; height: auto;\">\r\n<img src=\"/pro', 530000, 530000, '0000-00-00', 1, b'0', b'0', b'1'),
('HSM8440T', 'Hộp bảo quản thực phẩm Lock&Lock 950ml', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201836251331324.jpg\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/HSM8440T%2D2.jpg\" title=\"HSM8440T%2D2.jpg\" ow=\"500\" oh=\"331\">\r\n<img src=\"/prod/spec_img/HSM8440T%2D1.jpg\" title=\"HSM8440T%2D1.jpg\" ow=\"600\" oh=\"516\">\r\nThương hiệu	Lock&Lock\r\nSản xuất tại	Viêt Nam\r\nChất liệu	nhựa PP\r\nDung tích	950ml', 129000, 129000, '0000-00-00', 2, b'0', b'0', b'1'),
('HSM8450T', 'Tô Salad 1.6L W/Khay&Khay nước sốt', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201836251331782.jpg\" alt=\"\" w=\"1000\" h=\"1000\" ', '<img src=\"/prod/spec_img/HSM8450T%2D2.jpg\" title=\"HSM8450T%2D2.jpg\" ow=\"500\" oh=\"500\">\r\n<img src=\"/prod/spec_img/HSM8450T%2D1.jpg\" title=\"HSM8450T%2D1.jpg\" ow=\"550\" oh=\"550\">\r\nThương hiệu	Lock&Lock\r\nSản xuất tại	Viêt Nam\r\nChất liệu	Nhựa PP\r\nDung tích	1.6L', 155000, 150000, '0000-00-00', 2, b'0', b'0', b'1'),
('LBU1242', 'Nồi nhôm chống dính BAUM Marble 24cm, 2 tay cầm, nắp thủy tinh, hiệu L&L', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834536586984.jpg\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/LBU1242.jpg\" title=\"LBU1242.jpg\" ow=\"750\" oh=\"5243\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam', 749000, 749000, '0000-00-00', 5, b'0', b'0', b'1'),
('LBU1243', 'Chảo nhôm chống dính BAUM Marble 24cm, 1 tay cầm, hiệu L&L', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834536586878.jpg\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/LBU1243.jpg\" title=\"LBU1243.jpg\" ow=\"750\" oh=\"5150\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam\r\nKích thước	24 cm', 390000, 390000, '0000-00-00', 5, b'0', b'0', b'1'),
('LBU1283\r\n', 'Chảo nhôm chống dính BAUM Marble 28cm, 1 tay cầm, hiệu L&L', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834536587465.jpg\" alt=\"\" w=\"1000\" h=\"1000\" ', '<img src=\"/prod/spec_img/LBU1283.jpg\" title=\"LBU1283.jpg\" ow=\"750\" oh=\"5150\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam\r\nKích thước	24 cm', 490000, 490000, '0000-00-00', 5, b'0', b'0', b'1'),
('LBU1285', 'Chảo nhôm sâu lòng chống dính BAUM Marble 28cm, 1 tay cầm, nắp thủy tinh, hiệu L&L', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834536587472.jpg\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/LBU1285.jpg\" title=\"LBU1285.jpg\" ow=\"750\" oh=\"5243\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam\r\nKích thước	28 cm', 669000, 669000, '0000-00-00', 5, b'0', b'0', b'1'),
('LBU1305', 'Chảo nhôm sâu lòng chống dính BAUM Marble 30cm, 1 tay cầm, nắp thủy tinh, hiệu L&L', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201834536587801.jpg\" alt=\"\" w=\"1000\" h=\"1000\" ', '<img src=\"/prod/spec_img/LBU1305.jpg\" title=\"LBU1305.jpg\" ow=\"750\" oh=\"5243\">\r\nThương hiệu	Lock&Lock\r\nXuất xứ thương hiệu	Hàn Quốc\r\nSản xuất tại	Viêt Nam\r\nKích thước	30 cm', 759000, 759000, '0000-00-00', 5, b'0', b'0', b'1'),
('LLG224S3', 'Bộ 3 hộp thủy tinh L&L Euro (LLG214*2, LLG224*1)', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201900833453671.jpg\" alt=\"\" class=\"viewer_imag', '<img src=\"/prod/spec_img/LLG224S3%5F1.jpg\" title=\"LLG224S3%5F1.jpg\" ow=\"650\" oh=\"6066\">\r\nThương hiệu	Lock&Lock\r\nNơi sản xuất	Việt Nam\r\nChất liệu	Borosilicate\r\nDung tích	500ml*2; 750ml*1', 570000, 570000, '0000-00-00', 1, b'0', b'0', b'1'),
('LLS213R', 'Hộp nhựa L&L Twist Two way 330ml+150ml - Nắp màu đỏ', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201836251332093.jpeg\" alt=\"\" w=\"2813\" h=\"3739\"', '<img src=\"/prod/spec_img/LLS213R.jpg\" title=\"LLS213R.jpg\" ow=\"750\" oh=\"9554\">\r\nThương hiệu	Lock&Lock\r\nSản xuất tại	Viêt Nam\r\nChất liệu	Nhựa PP\r\nDung tích	330ml + 150ml', 75000, 75000, '0000-00-00', 2, b'0', b'0', b'1'),
('LLS221R', 'Hộp nhựa L&L Twist Two way 360ml+310ml - Nắp màu đỏ', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201835450014217.jpg\">\r\n<img src=\"http://www.lo', '<img src=\"/prod/spec_img/LLS221R.jpg\">\r\nThương hiệu	Lock&Lock\r\nNơi sản xuất	Việt Nam\r\nChất liệu	Nhựa PP\r\nDung tích	360ml+310ml', 85000, 85000, '0000-00-00', 1, b'0', b'0', b'1'),
('LLS222R', 'Hộp nhựa L&L Twist Two way 560ml+310ml - Nắp màu đỏ', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201836251332109.jpg\" alt=\"\" w=\"1000\" h=\"1000\" ', '<img src=\"/prod/spec_img/LLS222R.jpg\" title=\"LLS222R.jpg\" ow=\"750\" oh=\"9554\">\r\nThương hiệu	Lock&Lock\r\nSản xuất tại	Viêt Nam\r\nChất liệu	Nhựa PP\r\nDung tích	560ml + 310ml', 95000, 95000, '0000-00-00', 2, b'0', b'0', b'1'),
('LLS223R\r\n', 'Hộp nhựa L&L Twist Two way 760ml+310ml - Nắp màu đỏ', '<img src=\"http://www.locknlock.vn/data/base/goods/big/201836251332237.jpg\" alt=\"\" w=\"1000\" h=\"1000\" ', '<img src=\"/prod/spec_img/LLS223R.jpg\" title=\"LLS223R.jpg\" ow=\"750\" oh=\"9554\">\r\nThương hiệu	Lock&Lock\r\nSản xuất tại	Viêt Nam\r\nChất liệu	Nhựa PP\r\nDung tích	760ml + 310ml', 99000, 99000, '0000-00-00', 2, b'0', b'0', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `MaSuKien` int(11) NOT NULL,
  `TieuDe` varchar(100) NOT NULL,
  `AnhDaiDien` varchar(100) NOT NULL,
  `ChiTiet` varchar(100) NOT NULL,
  `NgayDang` date NOT NULL,
  `Active` bit(5) NOT NULL,
  `MaSP_FK` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `Firstname`, `Lastname`, `Gender`, `Email`, `Password`) VALUES
(0, 'le', 'the', 'Male', 'leducminhthe96@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaSP`,`TENSP`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menucha`
--
ALTER TABLE `menucha`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menucon`
--
ALTER TABLE `menucon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Cha_FK` (`id_Cha_FK`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`TenTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `id_Con_FK` (`id_Con_FK`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`MaSuKien`),
  ADD KEY `MaSP_FK` (`MaSP_FK`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `menucon`
--
ALTER TABLE `menucon`
  ADD CONSTRAINT `menucon_ibfk_1` FOREIGN KEY (`id_Cha_FK`) REFERENCES `menucha` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_Con_FK`) REFERENCES `menucon` (`id`);

--
-- Các ràng buộc cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD CONSTRAINT `sukien_ibfk_1` FOREIGN KEY (`MaSP_FK`) REFERENCES `sanpham` (`MaSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
