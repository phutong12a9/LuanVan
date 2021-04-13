-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2021 lúc 06:27 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_vanbangchungchi`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `chitietdotcaplophoc` (IN `idcc` INT, IN `iddc` INT)  NO SQL
SELECT lopchungchi.ID AS IDLopHoc,chungchi.TenChungChi , dotcap.TenDotCap, danhmuc.TenDanhMuc,giangvien.HoTenGV,lopchungchi.NgayKhaiGiang, lopchungchi.HocPhi
                                FROM
                                    dotcap,
                                    chungchi,
                                    lopchungchi,
                                    giangvien,
                                    danhmuc
                                WHERE
                                         lopchungchi.ID_ChungChi = chungchi.ID 
                                     AND lopchungchi.ID_DotCap = dotcap.ID 
                                      
                                     AND chungchi.ID_DanhMuc = danhmuc.ID
                                     AND lopchungchi.TrangThai = "Đang Mở"
                                     AND lopchungchi.ID_ChungChi = idcc
                                     And lopchungchi.ID_DotCap = iddc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `chitietlophoc` (IN `id` INT(11))  NO SQL
SELECT lopchungchi.ID AS IDLopHoc,chungchi.TenChungChi , dotcap.TenDotCap, danhmuc.TenDanhMuc,giangvien.HoTenGV,lopchungchi.NgayKhaiGiang, lopchungchi.HocPhi
                                FROM
                                    dotcap,
                                    chungchi,
                                    lopchungchi,
                                    giangvien,
                                    danhmuc
                                WHERE
                                         lopchungchi.ID_ChungChi = chungchi.ID 
                                     AND lopchungchi.ID_DotCap = dotcap.ID 
                                     
                                     AND chungchi.ID_DanhMuc = danhmuc.ID
                                     AND lopchungchi.TrangThai = "Đang Mở"
                                     AND lopchungchi.ID_ChungChi = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `thoikhoabieu` (IN `id` INT)  NO SQL
SELECT lopchungchi.TenLop, lophocphan.PhongHoc, lopchungchi.ThoiGianHoc, lopchungchi.NgayKhaiGiang,giangvien.HoTenGV
FROM users,hocvien,hocviendangky,lopchungchi,lophoc,lophocphan,giangvien
WHERE 	users.ID = hocvien.ID_User
	AND	hocvien.ID =hocviendangky.ID_HocVien
    AND hocviendangky.ID_Lop = lopchungchi.ID
    AND hocviendangky.ID = lophoc.ID_HocVienDK
    AND lophoc.ID_LopHP = lophocphan.ID
    AND lophocphan.ID_GiangVien = giangvien.ID
    AND users.ID = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienlaihocphi`
--

CREATE TABLE `bienlaihocphi` (
  `ID` int(11) NOT NULL,
  `ID_CanBo` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL,
  `SoTien` int(11) NOT NULL,
  `NgayLap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `canbo`
--

CREATE TABLE `canbo` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_CV` int(11) NOT NULL,
  `HoTenCB` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` char(30) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `ID` int(11) NOT NULL,
  `TenCV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungchi`
--

CREATE TABLE `chungchi` (
  `ID` int(11) NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `TenChungChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chungchi`
--

INSERT INTO `chungchi` (`ID`, `ID_DanhMuc`, `TenChungChi`) VALUES
(1, 1, 'Tiếng Anh trình độ A'),
(4, 1, 'Tiếng Anh trình độ B'),
(5, 4, 'Tin Học căn bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `ID` int(11) NOT NULL,
  `TenCM` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`ID`, `TenCM`) VALUES
(1, 'Chiêu Sinh'),
(2, 'Lịch Thi'),
(3, 'Thông Báo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDanhMuc`) VALUES
(1, 'Chứng Chỉ Tiếng Anh'),
(2, 'Chứng Chỉ Tiếng Nhật'),
(3, 'Chứng Chỉ Tiếng Pháp'),
(4, 'Chứng Chỉ Tin Học Căn Bản'),
(5, 'Chứng Chỉ Tin Học Nâng Cao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `ID` int(11) NOT NULL,
  `ID_HocVi` int(11) NOT NULL,
  `HoTenGV` varchar(255) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` char(30) NOT NULL,
  `Email` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`ID`, `ID_HocVi`, `HoTenGV`, `GioiTinh`, `NgaySinh`, `DiaChi`, `SDT`, `Email`) VALUES
(1, 3, 'Nguyễn Xuân Hà Giang', 'Nữ', '1983-01-01', 'Cần Thơ', '0985379919', 'nxhgiang@ctuet.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvi`
--

CREATE TABLE `hocvi` (
  `ID` int(11) NOT NULL,
  `TenHocVi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvi`
--

INSERT INTO `hocvi` (`ID`, `TenHocVi`) VALUES
(1, 'Cử Nhân'),
(2, 'Thạc Sĩ'),
(3, 'Tiến Sĩ'),
(4, 'Giáo Sư');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

CREATE TABLE `hocvien` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `HoTenHV` varchar(50) NOT NULL,
  `GioiTinh` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) NOT NULL,
  `SDT` char(30) DEFAULT NULL,
  `Email` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`ID`, `ID_User`, `HoTenHV`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `SDT`, `Email`) VALUES
(15, 1, 'Tống Thanh Phú', 'Nam', '1999-05-02', 'Tiền Giang', '0367627089', 'phutong12a9@gmail.com'),
(16, 2, 'Nguyễn Văn A', 'Nam', '2000-07-08', 'Đồng Tháp', '03456726842', 'abcxyz@gmail.com'),
(17, 3, 'Nguyễn Văn B', 'Nam', '2000-07-11', 'Cà Mau', '0567896102', 'hoangtu252@gmail.com'),
(18, 4, 'Nguyễn Văn C', 'Nam', '2000-06-14', 'Bến Tre', '0368625987', 'phutong12aaa@gmail.com'),
(19, 5, 'Nguyễn Thị D', 'Nữ', '1999-04-14', 'An Giang', '0365982035', 'DNguyen@gmail.com'),
(20, 6, 'Chau Phi Runl', 'Nam', '1996-04-14', 'An Giang', '0348652347', 'phirunl@gmail.com'),
(21, 7, 'Trần Trung Tuấn', 'Nam', '2000-07-01', 'TP.HCM', '0567896102', 'TuanTran@gmail.com'),
(22, 8, 'Trần Thị Cúc', 'Nữ', '1996-06-02', 'Đồng Tháp', '0367627467', 'trancuc@gmail.com'),
(23, 9, 'Tống Thanh Phú', 'Nam', '1999-05-02', 'Tiền Giang', '0367627089', 'ttphu.ktpm0217@student.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocviendangky`
--

CREATE TABLE `hocviendangky` (
  `ID` int(11) NOT NULL,
  `ID_HocVien` int(11) NOT NULL,
  `ID_Lop` int(11) NOT NULL,
  `NgayKy` date DEFAULT NULL,
  `SoHieu` varchar(25) DEFAULT NULL,
  `SoVaoSo` varchar(25) DEFAULT NULL,
  `XetDuyet` varchar(50) DEFAULT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocviendangky`
--

INSERT INTO `hocviendangky` (`ID`, `ID_HocVien`, `ID_Lop`, `NgayKy`, `SoHieu`, `SoVaoSo`, `XetDuyet`, `TrangThai`) VALUES
(1, 15, 1, '2021-03-30', '1234421', '4424241', 'Đã duyệt', 'Chờ duyệt'),
(2, 16, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(3, 17, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(4, 18, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(6, 19, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(7, 20, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(8, 21, 1, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(9, 22, 2, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí'),
(11, 16, 2, NULL, NULL, NULL, 'Không duyệt', 'Đã Đóng Học Phí'),
(12, 22, 4, NULL, NULL, NULL, NULL, 'Chưa Đóng Học Phí'),
(13, 15, 2, NULL, NULL, NULL, 'Chờ duyệt', 'Đã Đóng Học Phí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketquathi`
--

CREATE TABLE `ketquathi` (
  `ID` int(11) NOT NULL,
  `ID_LopHoc` int(11) NOT NULL,
  `DiemNghe` float DEFAULT NULL,
  `DiemNoi` float DEFAULT NULL,
  `DiemDoc` float DEFAULT NULL,
  `DiemViet` float DEFAULT NULL,
  `DiemLyThuyet` float DEFAULT NULL,
  `DiemThucHanh` float DEFAULT NULL,
  `XepLoai` varchar(20) NOT NULL,
  `KetQua` varchar(50) DEFAULT NULL,
  `GhiChu` varchar(255) DEFAULT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ketquathi`
--

INSERT INTO `ketquathi` (`ID`, `ID_LopHoc`, `DiemNghe`, `DiemNoi`, `DiemDoc`, `DiemViet`, `DiemLyThuyet`, `DiemThucHanh`, `XepLoai`, `KetQua`, `GhiChu`, `ThoiGian`) VALUES
(58, 3, 6.5, 7.2, 7.4, 5, NULL, NULL, '', 'Đạt', NULL, '2021-03-29'),
(59, 4, 4, 2, 4.5, 5, NULL, NULL, '', 'Không Đạt', NULL, '2021-03-29'),
(60, 5, 3, 2, 4, 6, NULL, NULL, '', 'Không Đạt', NULL, '2021-03-29'),
(61, 6, 6.4, 7, 8, 9.5, NULL, NULL, '', 'Đạt', NULL, '2021-03-29'),
(63, 10, NULL, NULL, NULL, NULL, 8, 10, 'Giỏi', 'Đạt', NULL, '2021-03-29'),
(64, 8, 5, 6.4, 7.2, 4.5, NULL, NULL, 'Trung Bình', 'Đạt', NULL, '2021-03-29'),
(65, 7, 5, 6.4, 7.2, 4.5, NULL, NULL, 'Trung Bình', 'Đạt', NULL, '2021-03-29'),
(66, 1, 8, 6.4, 7.2, 4.5, NULL, NULL, 'Trung Bình', 'Đạt', NULL, '2021-03-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lopchungchi`
--

CREATE TABLE `lopchungchi` (
  `ID` int(11) NOT NULL,
  `ID_ChungChi` int(11) NOT NULL,
  `TenLop` varchar(255) NOT NULL,
  `HocPhi` int(11) NOT NULL,
  `NgayKhaiGiang` date NOT NULL,
  `BuoiHoc` varchar(50) NOT NULL,
  `ThoiGianHoc` varchar(50) NOT NULL,
  `ThoiGianThi` date NOT NULL,
  `TrangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lopchungchi`
--

INSERT INTO `lopchungchi` (`ID`, `ID_ChungChi`, `TenLop`, `HocPhi`, `NgayKhaiGiang`, `BuoiHoc`, `ThoiGianHoc`, `ThoiGianThi`, `TrangThai`) VALUES
(1, 1, 'Lớp Chứng Chỉ Anh Văn A Tháng 9', 1900000, '2020-12-18', 'Thứ 6 - 7 - CN', '9h - 10h30', '2020-09-30', 'Đang Mở'),
(2, 5, 'Lớp Chứng Chỉ Tin Học Tháng 11', 2000000, '2020-12-15', 'Thứ 3 - 5 - 7', '18h - 19h30', '2020-12-19', 'Đang Mở'),
(3, 1, 'Lớp Chứng Chỉ Anh Văn A Tháng 7', 1900000, '2020-07-01', 'Thứ 2 - 3 - 4', '7h - 8h30', '2020-12-17', 'Đang Mở'),
(4, 5, 'Lớp Chứng Chỉ Tin Học Tháng 9', 2000000, '2020-09-01', 'Thứ 6 - 7 - CN', '19h - 20h30', '2020-12-31', 'Đang Mở');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `ID` int(11) NOT NULL,
  `ID_LopHP` int(11) NOT NULL,
  `ID_HocVienDK` int(11) NOT NULL,
  `TrangThai` varchar(50) NOT NULL DEFAULT 'Chưa Nhập Điểm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`ID`, `ID_LopHP`, `ID_HocVienDK`, `TrangThai`) VALUES
(1, 18, 9, 'Đã Nhập Điểm'),
(3, 19, 4, 'Đã Nhập Điểm'),
(4, 19, 6, 'Đã Nhập Điểm'),
(5, 19, 7, 'Đã Nhập Điểm'),
(6, 19, 8, 'Đã Nhập Điểm'),
(7, 18, 1, 'Đã Nhập Điểm'),
(8, 18, 2, 'Đã Nhập Điểm'),
(9, 18, 3, 'Chưa Nhập Điểm'),
(10, 20, 11, 'Đã Nhập Điểm'),
(11, 20, 13, 'Chưa Nhập Điểm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `ID` int(11) NOT NULL,
  `ID_LopChungChi` int(11) NOT NULL,
  `ID_GiangVien` int(11) NOT NULL,
  `TenLop` varchar(255) NOT NULL,
  `PhongHoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`ID`, `ID_LopChungChi`, `ID_GiangVien`, `TenLop`, `PhongHoc`) VALUES
(18, 1, 1, 'Lớp Chứng Chỉ Anh Văn Tháng 9 - 1', 'C.1.5'),
(19, 1, 1, 'Lớp Chứng Chỉ Anh Văn Tháng 9 - 2', 'C.1.6'),
(20, 2, 1, 'Lớp Chứng Chỉ Tin Học Tháng 11 - 1', 'C.2.6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkyhoatdong`
--

CREATE TABLE `nhatkyhoatdong` (
  `ID` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ThaoTac` varchar(255) NOT NULL,
  `ThoiGian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `ID` int(11) NOT NULL,
  `ID_CM` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `TomTat` varchar(255) NOT NULL,
  `NoiDung` mediumtext NOT NULL,
  `NgayDang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`ID`, `ID_CM`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDang`) VALUES
(8, 1, 'Mức học phí các lớp chứng chỉ ứng dụng CNTT', 'Trung tâm Điện tử & Tin học thông báo mức học phí các lớp chứng chỉ ứng dụng CNTT như sau:', '<p><span style=\"font-family:arial\"><span style=\"font-size:medium\"><span style=\"color:#000099\">&nbsp;Học ph&iacute; &aacute;p dụng cho c&aacute;c lớp khai giảng từ 08/06/2020 trở về sau (</span><span style=\"color:#cc0000\">sinh vi&ecirc;n kh&ocirc;ng cần đ&oacute;ng th&ecirc;m lệ ph&iacute; thi</span><span style=\"color:#000099\">&nbsp;chứng nhận v&agrave; chứng chỉ)</span></span></span></p>\r\n\r\n<p style=\"margin-left:94px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">&nbsp;</span></span></span></span></span></p>\r\n\r\n<table cellspacing=\"0\" class=\"Table\" style=\"-webkit-text-stroke-width:0px; background:white; border-collapse:collapse; border-spacing:0px; border:none; box-sizing:border-box; color:#222222; font-family:Arial,Helvetica,sans-serif; font-size:12px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; margin-left:19px; max-width:100%; orphans:2; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:662px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; height:23px; width:349px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\">Lớp</span></span></strong></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Lệ ph&iacute;</span></span></span></strong></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:red\">Lệ ph&iacute; cho sinh vi&ecirc;n</span></span></span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Học v&agrave; thi Chứng chỉ Ứng dụng CNTT cơ bản, (k&yacute; hiệu&nbsp;<strong>CB</strong>)</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.440.000đ</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.350.000đ</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">&Ocirc;n v&agrave; thi chứng chỉ Ứng dụng CNTT cơ bản, (k&yacute; hiệu&nbsp;<strong>&Ocirc;n CB</strong>)</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.140.000đ</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#d9e2f3; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.080.000đ</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#fff2cc; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; height:23px; width:349px\">\r\n			<p><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">Học v&agrave; thi Chứng chỉ Ứng dụng CNTT n&acirc;ng cao, (k&yacute; hiệu&nbsp;<strong>NC</strong>)</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#e2efd9; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:114px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.830.000đ</span></span></span></p>\r\n			</td>\r\n			<td style=\"background-color:#b4c6e7; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; height:23px; width:198px\">\r\n			<p style=\"text-align:center\"><span style=\"font-size:12pt\"><span style=\"font-family:Arial,sans-serif\"><span style=\"color:black\">1.710.000đ</span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"margin-left:94px; text-align:justify\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Miễn giảm:&nbsp;<strong>cho tất cả đối tượng l&agrave; sinh vi&ecirc;n, học sinh c&aacute;c Trường</strong></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Địa điểm học: Khoa C&ocirc;ng nghệ Th&ocirc;ng tin &amp; Truyền th&ocirc;ng, Trường Đại học Cần Thơ</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:18px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#000099\">Mọi chi tiết xin li&ecirc;n hệ:</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:42px; text-align:justify\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><em><span style=\"color:#000099\">Văn ph&ograve;ng Đ&agrave;o tạo Chứng chỉ Tin học - Khoa C&ocirc;ng nghệ Th&ocirc;ng tin &amp; Truyền th&ocirc;ng, Trường Đại học Cần Thơ. Khu 2 đường 3/2, phường Xu&acirc;n Kh&aacute;nh, Quận Kinh Kiều, Tp. Cần Thơ. Điện thoại: 0292 3 735 898&nbsp;</span></em></span></span></span></span></p>', '2020-06-17'),
(9, 3, 'Lệ phí thi chứng chỉ ứng dụng CNTT', 'Trung tâm Điện tử & Tin học thông báo lệ phí thi chứng chỉ ứng dụng CNTT như sau:', '<table cellspacing=\"0\" class=\"Table\" style=\"-webkit-text-stroke-width:0px; background-color:#ffffff; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; color:#222222; font-family:Arial,Helvetica,sans-serif; font-size:12px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; margin-left:10px; max-width:100%; orphans:2; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:982px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:98px; width:982px\">\r\n			<p style=\"text-align:center\"><strong>LỆ PH&Iacute; THI<br />\r\n			CHỨNG CHỈ ỨNG DỤNG C&Ocirc;NG NGHỆ TH&Ocirc;NG TIN</strong><br />\r\n			<strong>(<em>Theo th&ocirc;ng tư li&ecirc;n tịch số 17/2016/TTLT-BGDĐT-BTTTT</em>)</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">&nbsp;</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:medium\"><span style=\"color:#000000\">&nbsp;&nbsp;<span style=\"font-family:Arial,Helvetica,sans-serif\">Lệ ph&iacute;: đối với th&iacute; sinh tự do l&agrave; 600.000đ cho CC UD CNTT cơ bản, 700.000đ cho CC UD CNTT n&acirc;ng cao.&nbsp;</span></span></span></span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"font-size:medium\"><span style=\"color:#000000\">&nbsp;&nbsp;</span><span style=\"color:#000099\">Nếu học vi&ecirc;n ghi danh học hoặc &ocirc;n tập v&agrave; thi c&aacute;c lớp khai giảng từ ng&agrave;y 08/06/2020 tại Trrung t&acirc;m th&igrave; kh&ocirc;ng cần đ&oacute;ng th&ecirc;m lệ ph&iacute; thi.</span><span style=\"color:#000099\">&nbsp;</span></span></span></span></span></span></p>', '2020-06-17'),
(10, 3, 'Thông báo v/v miễn học phần Tin học căn bản và TT. Tin học Căn bản', 'Sinh viên của Trường đại học Cần Thơ có giấy chứng nhận hoặc chứng chỉ do Trung tâm Điện tử và Tin học cấp (như danh sách bên dưới) sẽ được miễn học phần Tin học căn bản và TT. Tin học căn bản theo quy định của Trường như sau:', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">Sinh vi&ecirc;n của Trường đại học Cần Thơ c&oacute; giấy chứng nhận hoặc chứng chỉ do Trung t&acirc;m Điện tử v&agrave; Tin học cấp (<em>như danh s&aacute;ch b&ecirc;n dưới</em>) sẽ được miễn học phần&nbsp;<strong>Tin học căn bản</strong>&nbsp;v&agrave;&nbsp;<strong>TT. Tin học căn bản</strong>&nbsp;theo quy định của Trường như sau:</span></span></span></span></p>\r\n\r\n<p style=\"text-align:start\">&nbsp;</p>\r\n\r\n<table cellspacing=\"0\" class=\"MsoTableGrid\" style=\"-webkit-text-stroke-width:0px; background-color:#ffffff; border-collapse:collapse; border-spacing:0px; border:none; box-sizing:border-box; color:#222222; font-family:Arial,Helvetica,sans-serif; font-size:12px; font-style:normal; font-variant-caps:normal; font-variant-ligatures:normal; font-weight:400; letter-spacing:normal; max-width:100%; orphans:2; text-align:start; text-decoration-color:initial; text-decoration-style:initial; text-indent:0px; text-transform:none; white-space:normal; widows:2; width:642px; word-spacing:0px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:2px solid black; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:13pt\">T&ecirc;n chứng chỉ/chứng nh&acirc;̣n (do Trung t&acirc;m ĐTTH c&acirc;́p)</span></strong></p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:2px solid black; vertical-align:top; width:189px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:13pt\">Mi&ecirc;̃n học ph&acirc;̀n</span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:justify\"><span style=\"font-size:13pt\">Chứng chỉ Tin học ứng dụng tr&igrave;nh độ A (<em>Chứng chỉ A cũ</em>)</span></p>\r\n			</td>\r\n			<td rowspan=\"5\" style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:none; border-right:2px solid black; border-top:none; width:189px\">\r\n			<p style=\"text-align:center\"><strong><span style=\"font-size:13pt\">Tin học Căn bản v&agrave; TT. Tin học Căn bản</span></strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:justify\"><span style=\"font-size:13pt\">Chứng nh&acirc;̣n Hoàn thành khóa học Ứng dụng CNTT Căn bản</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:justify\"><span style=\"font-size:13pt\">Chứng nh&acirc;̣n Hoàn thành khóa học Ứng dụng CNTT N&acirc;ng cao&nbsp;</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:justify\"><span style=\"font-size:13pt\">Chứng chỉ Ứng dụng CNTT Căn bản</span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-bottom:2px solid black; border-left:2px solid black; border-right:2px solid black; border-top:none; vertical-align:top; width:453px\">\r\n			<p style=\"text-align:justify\"><span style=\"font-size:13pt\">Chứng chỉ Ứng dụng CNTT N&acirc;ng cao&nbsp;</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', '2020-06-17'),
(11, 2, 'Lịch thi chứng chỉ ứng dụng CNTT 28-06-2020', 'Trung tâm Điện tử & Tin học thông báo v/v thi chứng chỉ ứng dụng CNTT Quốc gia như sau:', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\"><span style=\"color:#0000ff\"><strong><em>TỔ CHỨC THI CẤP CHỨNG CHỈ ỨNG DỤNG CNTT QUỐC GIA</em></strong></span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:30px; text-align:start\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:30px; text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ng&agrave;y thi: S&aacute;ng Chủ Nhật,&nbsp;<span style=\"color:#0033ff\">ng&agrave;y 28/06/2020</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:30px; text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hạn đăng k&yacute;:&nbsp; 17/06/2020 (hoặc đủ số lượng 420 th&iacute; sinh)</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:30px; text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Chuẩn bị 02 ảnh 4x6 v&agrave; 02 ảnh 3x4 + giấy CMND photo + Photo c&ocirc;ng chứng CC UD CNTT cơ bản (nếu thi CC UDCNTT n&acirc;ng cao)</span></span></span></span></p>\r\n\r\n<p style=\"margin-left:30px; text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lệ ph&iacute;: đối với th&iacute; sinh tự do l&agrave; 600.000đ cho CC UD CNTT cơ bản, 700.000đ cho CC UD CNTT n&acirc;ng cao.&nbsp;<span style=\"color:#000099\">Nếu học vi&ecirc;n ghi danh học hoặc &ocirc;n tập v&agrave; thi c&aacute;c lớp khai giảng từ ng&agrave;y 08/06/2020 tại TRrung t&acirc;m th&igrave; kh&ocirc;ng cần đ&oacute;ng th&ecirc;m lệ ph&iacute; thi.</span></span></span></span></span></p>\r\n\r\n<p style=\"margin-left:30px; margin-right:-19px; text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#222222\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"background-color:#ffffff\">-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Địa chỉ đăng k&yacute; dự thi: Khoa CNTT&amp;TT &ndash; ĐHCT - Khu II &ndash; Đường 3/2 &ndash; Tp Cần Thơ.</span></span></span></span></p>', '2020-06-17'),
(12, 1, 'THÔNG BÁO NHẬN CHỨNG NHẬN NĂNG LỰC TIẾNG ANH CTUT KHÓA 3', 'Trung tâm Ngoại ngữ – Tin học trường Đại học Kỹ thuật – Công nghệ Cần Thơ thông báo đến các thí sinh thi đạt kỳ kiểm tra chứng nhận năng lực tiếng Anh CTUT (Khóa 23)', '<p><span style=\"font-size:18px\"><strong>Trung t&acirc;m Ngoại ngữ &ndash; Tin học trường Đại học Kỹ thuật &ndash; C&ocirc;ng nghệ Cần Thơ th&ocirc;ng b&aacute;o đến c&aacute;c th&iacute; sinh thi đạt kỳ kiểm tra chứng nh&acirc;̣n năng lực ti&ecirc;́ng Anh CTUT (Kh&oacute;a 23) như sau:</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul style=\"margin-left:80px\">\r\n	<li><span style=\"font-size:18px\">Đến Văn ph&ograve;ng Trung t&acirc;m nhận chứng nh&acirc;̣n v&agrave;o c&aacute;c buổi s&aacute;ng c&aacute;c ng&agrave;y l&agrave;m việc trong tuần.</span></li>\r\n	<li><span style=\"font-size:18px\">Đem theo chứng minh nh&acirc;n d&acirc;n hoặc thẻ căn cước c&ocirc;ng d&acirc;n để đối chiếu.</span></li>\r\n</ul>\r\n\r\n<p><span style=\"font-size:18px\">​​​​​​​</span></p>\r\n\r\n<p><span style=\"font-size:18px\">Lưu &yacute;: Mọi thắc mắc, th&iacute; sinh vui l&ograve;ng li&ecirc;n hệ với Trung t&acirc;m qua số điện thoại: <strong>02923.890698.</strong></span></p>', '2020-12-17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `TaiKhoan` char(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `PhanQuyen` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `TaiKhoan`, `password`, `PhanQuyen`, `updated_at`, `created_at`) VALUES
(1, '1700442', '$2y$10$3tumDGRspjugZ74bCmPQbuoQe4qvH5eV9k9CSE06gi6dXABKP0MO6', 0, '2020-12-13', '2020-12-13'),
(2, '1700443', '$2y$10$VDmI92.gTlxqeBsc2SVJPOS5TQ0AwR5jb1TvjbxtjxNhI7ckHbD82', 0, '2020-12-18', '2020-12-18'),
(3, '1700444', '$2y$10$tNzmA446TOjG5GO1bVbHTeZE6R9UMxNfatJRg2Mcfk1YlNyxh2dr6', 0, '2020-12-18', '2020-12-18'),
(4, '1700445', '$2y$10$VR70qyhjrZR59OWY/ZNaNeaSl/eBSSN6ET6RkArAPesUtaC9.70M.', 0, '2020-12-18', '2020-12-18'),
(5, '1700446', '$2y$10$9mf.YP6WLN92c9yIXn2PYuyrVVTfsBMPc175UrbgzZ92JuKFhta8u', 0, '2020-12-18', '2020-12-18'),
(6, '1700447', '$2y$10$Cz0NL5zbBH2cR.q.N1Jc3e9L6DzCsnWWdI7x.i.hN6/HUHrROGOsK', 0, '2020-12-18', '2020-12-18'),
(7, '1700448', '$2y$10$OlywzgC7j4hBKZg/REPC1Orbgh2Vx/2hL59UJtIPOmdIYZOJJ0lYa', 0, '2020-12-18', '2020-12-18'),
(8, '1700449', '$2y$10$/6Cii7qAR8mZ1ul0KLdI7OSu/d3a0qG/ASxA6kAF9DARgHRqBau5q', 0, '2020-12-18', '2020-12-18'),
(9, 'admin', '$2y$10$NMJnJSUnu4PKT.SmJLSs/.xvg4sT42nkV.0aYC4vjsJiLkBTy/.ja', 1, '2020-12-24', '2020-12-24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CanBo` (`ID_CanBo`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`);

--
-- Chỉ mục cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`),
  ADD KEY `ID_CV` (`ID_CV`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_DanhMuc` (`ID_DanhMuc`);

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVi` (`ID_HocVi`);

--
-- Chỉ mục cho bảng `hocvi`
--
ALTER TABLE `hocvi`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Chỉ mục cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVien` (`ID_HocVien`),
  ADD KEY `ID_Lop` (`ID_Lop`);

--
-- Chỉ mục cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_LopHoc` (`ID_LopHoc`);

--
-- Chỉ mục cho bảng `lopchungchi`
--
ALTER TABLE `lopchungchi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ChungChi` (`ID_ChungChi`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_HocVienDK` (`ID_HocVienDK`),
  ADD KEY `ID_LopHP` (`ID_LopHP`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_GiangVien` (`ID_GiangVien`),
  ADD KEY `ID_LopChungChi` (`ID_LopChungChi`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatkyhoatdong`
--
ALTER TABLE `nhatkyhoatdong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_User` (`ID_User`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CM` (`ID_CM`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `canbo`
--
ALTER TABLE `canbo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hocvi`
--
ALTER TABLE `hocvi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `lopchungchi`
--
ALTER TABLE `lopchungchi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienlaihocphi`
--
ALTER TABLE `bienlaihocphi`
  ADD CONSTRAINT `bienlaihocphi_ibfk_1` FOREIGN KEY (`ID_CanBo`) REFERENCES `canbo` (`ID`),
  ADD CONSTRAINT `bienlaihocphi_ibfk_2` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`);

--
-- Các ràng buộc cho bảng `canbo`
--
ALTER TABLE `canbo`
  ADD CONSTRAINT `canbo_ibfk_1` FOREIGN KEY (`ID_CV`) REFERENCES `chucvu` (`ID`),
  ADD CONSTRAINT `canbo_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `chungchi`
--
ALTER TABLE `chungchi`
  ADD CONSTRAINT `chungchi_ibfk_1` FOREIGN KEY (`ID_DanhMuc`) REFERENCES `danhmuc` (`ID`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`ID_HocVi`) REFERENCES `hocvi` (`ID`);

--
-- Các ràng buộc cho bảng `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `hocvien_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `hocviendangky`
--
ALTER TABLE `hocviendangky`
  ADD CONSTRAINT `hocviendangky_ibfk_1` FOREIGN KEY (`ID_HocVien`) REFERENCES `hocvien` (`ID`),
  ADD CONSTRAINT `hocviendangky_ibfk_2` FOREIGN KEY (`ID_Lop`) REFERENCES `lopchungchi` (`ID`);

--
-- Các ràng buộc cho bảng `ketquathi`
--
ALTER TABLE `ketquathi`
  ADD CONSTRAINT `ketquathi_ibfk_1` FOREIGN KEY (`ID_LopHoc`) REFERENCES `lophoc` (`ID`);

--
-- Các ràng buộc cho bảng `lopchungchi`
--
ALTER TABLE `lopchungchi`
  ADD CONSTRAINT `lopchungchi_ibfk_2` FOREIGN KEY (`ID_ChungChi`) REFERENCES `chungchi` (`ID`);

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_ibfk_1` FOREIGN KEY (`ID_HocVienDK`) REFERENCES `hocviendangky` (`ID`),
  ADD CONSTRAINT `lophoc_ibfk_2` FOREIGN KEY (`ID_LopHP`) REFERENCES `lophocphan` (`ID`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`ID_GiangVien`) REFERENCES `giangvien` (`ID`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`ID_LopChungChi`) REFERENCES `lopchungchi` (`ID`);

--
-- Các ràng buộc cho bảng `nhatkyhoatdong`
--
ALTER TABLE `nhatkyhoatdong`
  ADD CONSTRAINT `nhatkyhoatdong_ibfk_1` FOREIGN KEY (`ID_User`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`ID_CM`) REFERENCES `chuyenmuc` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
