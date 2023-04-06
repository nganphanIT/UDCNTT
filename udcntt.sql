-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2023 lúc 07:06 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `udcntt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buoi`
--

CREATE TABLE `buoi` (
  `id` int(11) NOT NULL,
  `buoi` varchar(20) NOT NULL,
  `gio_bd` varchar(10) NOT NULL,
  `gio_kt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `buoi`
--

INSERT INTO `buoi` (`id`, `buoi`, `gio_bd`, `gio_kt`) VALUES
(1, 'CHIỀU', '14:30', '16:30'),
(4, 'CHIỀU', '14:30', '17:00'),
(2, 'SÁNG', '7:30', '9:30'),
(3, 'TỐI', '18:30', '20:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `macb` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msthue` varchar(20) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `cccd` int(10) NOT NULL,
  `ngaycap` date NOT NULL,
  `noicap` varchar(200) NOT NULL,
  `sotk` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `canbo`
--

INSERT INTO `canbo` (`macb`, `hoten`, `ngaysinh`, `sdt`, `email`, `msthue`, `diachi`, `cccd`, `ngaycap`, `noicap`, `sotk`, `image`) VALUES
(1, 'TÔ THỊ CẨM YÊN', '2000-01-01', '012355', 'yen@gmail.com', '0123', 'CAN THO', 123, '2020-01-01', 'AN GIANG', 123455, 'h1.jpg'),
(2, 'TRẦN MÌNH QUÂN', '2000-01-01', '0123400', 'quantran@gmail.com', '01234', 'CAN THO', 1234, '2020-01-01', 'CầnThơ', 1234, 'h7.jpg'),
(3, 'ĐINH THỊ MỸ PHƯƠNG', '2000-01-01', '012345', 'phuongdinh@gmail.com', '012345', 'THOẠI SƠN, AN GIANG', 12345, '2020-01-01', 'AN GIANG', 12345, 'h4.jpg'),
(4, 'TRẦN MÌNH QUÂN', '2000-01-01', '1233', 'quantran@gmail.com', '1233', 'CAN THO', 1233, '2022-01-01', 'CầnThơ', 1233, 'h1.jpg'),
(5, 'Nguyen Thi Thu Ha', '2000-01-01', '123123', 'hanguyen@gmail.com', '123123', 'CAN THO', 123123, '2020-01-01', 'VĨNH LONG', 123123, 'h6.jpg'),
(6, 'PHAN TẤN ĐẠT', '2000-11-24', '11156', 'dat2012@gmail.com', '111', 'VĨNH LONG', 111, '2020-01-01', 'VĨNH LONG', 111, 'h6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `id` int(11) NOT NULL,
  `hpsv` varchar(10) NOT NULL,
  `sttkhoa` int(10) NOT NULL,
  `matd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`id`, `hpsv`, `sttkhoa`, `matd`) VALUES
(1, '2000000', 1, 'CB'),
(2, '3000000', 1, 'NC'),
(3, '1800000', 1, 'OT'),
(4, '2000000', 3, 'CB'),
(5, '3000000', 3, 'NC'),
(6, '1800000', 3, 'OT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `stthv` int(11) NOT NULL,
  `tenhv` varchar(50) NOT NULL,
  `mssv` varchar(10) NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(200) NOT NULL,
  `phai` varchar(5) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tttt` varchar(20) DEFAULT NULL,
  `sttlop` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`stthv`, `tenhv`, `mssv`, `ngaysinh`, `noisinh`, `phai`, `diachi`, `sdt`, `email`, `tttt`, `sttlop`, `image`) VALUES
(1, 'PHAN THỊ HỒNG NGÂN', 'B1610594', '1998-01-01', 'VĨNH LONG', '', 'CAN THO', '0384170808', 'nganphan161298@gmail.com', '1', '1', 'h4.jpg'),
(2, 'TRẦN THỊ THÚY KIỀU', 'B1610595', '1998-01-01', 'BẾN TRE', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '0384170800', 'kieutran@gmail.com', '1', '4', 'h2.jpg'),
(3, 'TÔ THỊ CẨM YÊN', 'B1610596', '1998-01-01', 'AN GIANG', '', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '0384170802', 'yento@gmail.com', '1', '3', 'h2.jpg'),
(4, 'ĐINH THỊ MỸ PHƯƠNG', 'B1610591', '1999-01-01', 'AN GIANG', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '0384170801', 'phuongdinh@gmail.com', '1', '5', 'h3.jpg'),
(5, 'ĐINH QUANG MINH', '3333', '2015-10-10', 'CẦN THƠ', '1', 'BÌNH THỦY, CẦN THƠ', '0355857239', 'HUE392@YAHOO.COM.VN', '0', '1', 'h4.jpg'),
(6, 'CÙ DẠ LÝ', 'B1610599', '1998-01-01', 'HẬU GIANG', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '0384171112', 'cudaly@gmail.com', '0', '3', 'h7.jpg'),
(8, 'NGUYỄN HOÀNG LONG', 'b123', '2000-11-01', 'BẾN TRE', '1', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '7777', 'longnguyen@gmail.com', '1', '5', 'h14.jpg'),
(9, 'ĐNH THỊ MỸ PHƯƠNG', 'B1800635', '2000-04-24', 'AN GIANG', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '0359313571', 'phuonglxag4611@gmail.com', '1', '1', 'h4.jpg'),
(10, 'Nguyễn Thị Mỹ Tiên', 'B180184', '2000-01-27', 'Cần Thơ', '2', 'Hậu Giang', '0915123916', 'ntien0563@gmail.com', '0', '6', 'h4.jpg'),
(11, 'Nguyễn Hằng', 'B1610117', '2000-06-26', 'CẦN THƠ', '2', 'nguyên văn cừ cần thơ', '0123789456', 'yenb18015117@student.ctu.edu.vn', '0', '2', ''),
(12, 'PHAN THỊ NHƯ Ý', 'B123456', '2000-01-01', 'AN GIANG', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '77778', 'nhuy@gmail.com', '1', '5', 'h13.jpg'),
(13, 'NGUYỄN THỊ THANH THÚY', 'B1111', '2000-01-01', 'TIỀN GIANG', '2', 'KTX A, ĐHCT, XUÂN KHÁNH, NINH KIỀU, CẦN THƠ', '011112', 'thuynguyen@gmail.com', '0', '4', 'h12.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdong`
--

CREATE TABLE `hopdong` (
  `id` int(11) NOT NULL,
  `ngayki` date NOT NULL,
  `macb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `sttkhoa` int(11) NOT NULL,
  `ngaykg` date NOT NULL,
  `ngaykt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`sttkhoa`, `ngaykg`, `ngaykt`) VALUES
(1, '2023-04-01', '2023-05-15'),
(2, '2023-06-30', '2023-08-30'),
(3, '2023-04-01', '2023-05-15'),
(4, '2023-07-01', '2023-08-15'),
(5, '2023-05-01', '2023-06-15'),
(6, '2023-04-01', '2023-05-15'),
(7, '2023-07-01', '2023-08-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `id` int(11) NOT NULL,
  `sttlop` varchar(10) NOT NULL,
  `thu` varchar(10) NOT NULL,
  `buoi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichhoc`
--

INSERT INTO `lichhoc` (`id`, `sttlop`, `thu`, `buoi`) VALUES
(4, '1', '3', '3'),
(5, '1', '5', '3'),
(9, '2', '5', '3'),
(10, '2', '6', '3'),
(11, '2', '7', '1'),
(1, '3', '6', '3'),
(2, '3', '7', '3'),
(6, '4', '2', '3'),
(7, '4', '4', '3'),
(8, '4', '6', '3'),
(12, '5', '2', '3'),
(13, '5', '3', '3'),
(14, '5', '4', '3'),
(15, '6', '2', '3'),
(16, '6', '4', '3'),
(17, '6', '6', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `sttlop` int(11) NOT NULL,
  `sttp` varchar(10) NOT NULL,
  `macb` varchar(10) NOT NULL,
  `sttkhoa` varchar(10) NOT NULL,
  `matd` varchar(10) NOT NULL,
  `siso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`sttlop`, `sttp`, `macb`, `sttkhoa`, `matd`, `siso`) VALUES
(1, 'P01', 'CB1', '1', 'NC', '18'),
(2, 'P01', 'CB1', '1', 'NC', '24'),
(3, 'P01', 'CB1', '1', 'OT', '21'),
(4, 'P04', 'CB2', '1', 'CB', '20'),
(5, 'P25', 'CB1', '1', 'NC', '20'),
(6, 'P01', 'CB1', '3', 'CB', '24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nam`
--

CREATE TABLE `nam` (
  `nam` int(4) NOT NULL,
  `sttkhoa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nam`
--

INSERT INTO `nam` (`nam`, `sttkhoa`) VALUES
(2023, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuthu`
--

CREATE TABLE `phieuthu` (
  `sttpt` int(11) NOT NULL,
  `ngaylap` date NOT NULL DEFAULT current_timestamp(),
  `sotien` varchar(10) NOT NULL,
  `stthv` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieuthu`
--

INSERT INTO `phieuthu` (`sttpt`, `ngaylap`, `sotien`, `stthv`) VALUES
(1, '2023-03-28', '3000000', '1'),
(2, '2023-03-28', '1800000', '3'),
(3, '2023-03-28', '3000000', '4'),
(4, '2023-03-28', '2000000', '2'),
(5, '2023-03-28', '3000000', '8'),
(6, '2023-03-29', '3000000', '9'),
(7, '2023-03-29', '3000000', '12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `sttp` varchar(20) NOT NULL,
  `somay` int(11) NOT NULL,
  `trangthai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`sttp`, `somay`, `trangthai`) VALUES
('P01', 23, 0),
('P02', 20, 0),
('P03', 24, 0),
('P04', 22, 0),
('P25', 25, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sms`
--

CREATE TABLE `sms` (
  `id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'ngan123', '123', 'nganphan@gmail.com', 1),
(2, 'dat123', '123', '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thu`
--

CREATE TABLE `thu` (
  `id` int(11) NOT NULL,
  `thu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thu`
--

INSERT INTO `thu` (`id`, `thu`) VALUES
(1, 'HAI'),
(2, 'BA'),
(3, 'TƯ'),
(4, 'NĂM'),
(5, 'SÁU'),
(6, 'BẢY'),
(7, 'CHỦ NHẬT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthai`
--

CREATE TABLE `trangthai` (
  `STTTT` int(10) NOT NULL,
  `TENTT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trangthai`
--

INSERT INTO `trangthai` (`STTTT`, `TENTT`) VALUES
(0, 'Chưa thanh toán'),
(1, 'Đã thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdo`
--

CREATE TABLE `trinhdo` (
  `matd` varchar(10) NOT NULL,
  `tentd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trinhdo`
--

INSERT INTO `trinhdo` (`matd`, `tentd`) VALUES
('CB', 'CĂN BẢN'),
('NC', 'NÂNG CAO'),
('OT', 'ÔN THI');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `buoi`
--
ALTER TABLE `buoi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`buoi`,`gio_bd`,`gio_kt`),
  ADD UNIQUE KEY `buoi` (`buoi`,`gio_bd`,`gio_kt`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`macb`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sttkhoa` (`sttkhoa`,`matd`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`stthv`);

--
-- Chỉ mục cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`sttkhoa`);

--
-- Chỉ mục cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`sttlop`,`thu`,`buoi`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`sttlop`);

--
-- Chỉ mục cho bảng `nam`
--
ALTER TABLE `nam`
  ADD UNIQUE KEY `khoa` (`nam`,`sttkhoa`);

--
-- Chỉ mục cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  ADD PRIMARY KEY (`sttpt`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`sttp`);

--
-- Chỉ mục cho bảng `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thu`
--
ALTER TABLE `thu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`STTTT`);

--
-- Chỉ mục cho bảng `trinhdo`
--
ALTER TABLE `trinhdo`
  ADD PRIMARY KEY (`matd`),
  ADD UNIQUE KEY `matd` (`matd`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `buoi`
--
ALTER TABLE `buoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `canbo`
--
ALTER TABLE `canbo`
  MODIFY `macb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `stthv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hopdong`
--
ALTER TABLE `hopdong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `sttkhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `sttlop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phieuthu`
--
ALTER TABLE `phieuthu`
  MODIFY `sttpt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thu`
--
ALTER TABLE `thu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
