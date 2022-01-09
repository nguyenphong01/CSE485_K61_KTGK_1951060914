-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2022 lúc 01:10 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `1951060914_employees`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `NHANVIEN` (
  `maNV` int(11) NOT NULL,
  `hovaten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phongban` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luong` float NOT NULL,
  `ngayvaolam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `NHANVIEN`
--

INSERT INTO `NHANVIEN` (`maNV`, `hovaten`, `chucvu`, `phongban`, `luong`, `ngayvaolam`) VALUES
(1, 'Nguyễn Hồng Phong', 'Nhân viên', 'Maketing', 10000000, '2022-15-02'),
(2, 'Nguyễn Văn A', 'Nhân viên', 'Maketing', 5000000, '2022-15-02'),
(3, 'Nguyễn Văn B', 'Nhân viên', 'Maketing', 6000000, '2022-15-02'),
(4, 'Nguyễn Văn C', 'Nhân viên', 'Maketing', 7000000, '2022-15-02'),
(5, 'Nguyễn Văn D', 'Nhân viên', 'Maketing', 8000000, '2022-15-02'),
(6, 'Nguyễn Văn E', 'Nhân viên', 'Maketing', 9000000, '2022-15-02');
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `NHANVIEN`
  ADD PRIMARY KEY (`maNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `NHANVIEN`
  MODIFY `maNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
