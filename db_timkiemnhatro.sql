-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2019 lúc 09:58 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_timkiemnhatro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `area`
--

CREATE TABLE `area` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `area`
--

INSERT INTO `area` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Quận Ninh Kiều', '2019-10-22 08:43:39', '2019-10-22 15:43:39'),
(2, 'Quận Cái Răng', '2019-10-22 08:43:39', '2019-10-22 15:43:39'),
(3, 'Quận Bình Thủy', '2019-10-22 08:44:31', '2019-10-22 15:44:31'),
(4, 'Quận Ô Môn', '2019-10-22 08:44:31', '2019-10-22 15:44:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boarding_house`
--

CREATE TABLE `boarding_house` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_type_boardinghouse` int(10) NOT NULL,
  `id_owner` int(10) NOT NULL,
  `id_area` int(10) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `acreage` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `lng` text COLLATE utf8_unicode_ci NOT NULL,
  `lat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `boarding_house`
--

INSERT INTO `boarding_house` (`id`, `name`, `price`, `status`, `image`, `description`, `id_type_boardinghouse`, `id_owner`, `id_area`, `address`, `type`, `acreage`, `created_at`, `update_at`, `lng`, `lat`) VALUES
(8, 'Kim Hằng', 750000, 1, 'images (5).jpg', 'diện tích 20m2\r\ntrên lầu, chủ trọ chung nên rất an toàn,\r\ncó xào phơi đồ các kiểu', 2, 1, 1, '15F, mạc thiên tích, quận ninh kiều, tp cần thơ', 'Có Gác', 20, '2019-11-03 10:04:30', '2019-11-03 10:04:30', '0', '0'),
(9, 'Ngọc Duy', 550000, 4, 'images (7).jpg', 'diện tích 20m2\r\nthích hợp cho người lao động các nhà máy xí nghiệp, các gia đình nhỏ\r\nđiện 3500, nước 6000\r\nwifi miễn phí', 2, 2, 4, '269, ấp thới phước A, phường thới an, quận ô môn ,tp cần thơ', 'Nhà trọ sạch sẽ, thoáng mát', 0, '2019-06-04 12:23:39', '2019-11-04 12:23:39', '10.04733', '105.76869'),
(11, 'Tuyết Nhi', 850000, 1, '1572942298.xay-phong-tro-gia-bao-nhieu-tien-4.jpg', '- diện tích 23m2\r\n- điện: 3000, nước: 7000\r\n- wifi miễn phí\r\n- giờ giấc tự do\r\n- số người tối đa: 3 người\r\n- thích hợp cho sinh viên các trường đại học', 2, 2, 1, '21/23/359 đường nguyễn văn cừ, phường an hòa, quận ninh kiều, tp cần thơ', 'Nhà trọ sạch sẽ, thoáng mát', 0, '2019-11-05 08:24:58', '2019-11-05 08:24:58', '10.04649', '105.76943'),
(15, 'Cư Xá Họ Lê', 750000, 1, '1574153663.images (3).jpg', '- Giá tiền điện: 4000\r\n				- Giá tiền nước: miễn phí\r\n				- Tiền cọc: nữa tháng\r\n				- Wifi: miễn phí\r\n				- Nam nữ ở chung: được\r\n				- Giờ Mở cửa, đóng cửa: tự do\r\n				- Số lượng người có thể ở: 2 người\r\n				- Đối tượng cho thuê: sinh viên các trường đại học\r\n				- Mô tả khác:\r\n+ gần chợ\r\n+ gần các cửa hàng tạp hóa', 2, 1, 1, '233/34/21, phường an hòa, quận ninh kiều, tp cần thơ', 'Không Gác', 20, '2019-11-19 08:54:23', '2019-11-19 08:54:23', '0', '0'),
(16, 'Tuấn Minh', 1200000, 1, '1574770997.images (6).jpg', '- Giá tiền điện: 3000\r\n				- Giá tiền nước: 8000\r\n				- Tiền cọc: nữa tháng\r\n				- Wifi: miễn phí\r\n				- Nam nữ ở chung: được\r\n				- Giờ Mở cửa, đóng cửa: tự do\r\n				- Số lượng người có thể ở: 3 người\r\n				- Đối tượng cho thuê: sinh viên\r\n				- Mô tả khác:', 1, 1, 1, '231/12 trần việt châu, phường an hòa, quận ninh kiều, tp cần thơ', 'Có Gác', 25, '2019-11-26 12:23:17', '2019-11-26 12:23:17', '10.04690', '105.76682'),
(17, 'Huy Toàn', 800000, 1, '1574771533.images (5).jpg', '- Giá tiền điện: 4500\r\n				- Giá tiền nước: 7000\r\n				- Tiền cọc: không\r\n				- Wifi: miễn phí\r\n				- Nam nữ ở chung: được\r\n				- Giờ Mở cửa, đóng cửa: tự do\r\n				- Số lượng người có thể ở: 3\r\n				- Đối tượng cho thuê:  sinh viên DH, cao đẳng\r\n				- Mô tả khác:', 2, 1, 1, '233/23/21 đường nguyễn văn cừ, phường an hòa, quận ninh kiều, tp cần thơ', 'Không Gác', 20, '2019-11-26 12:32:13', '2019-11-26 12:32:13', '10.04653', '105.76760');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`id`, `id_customer`, `note`, `payment`, `created_at`, `update_at`) VALUES
(9, 3, 'dọn vào cuối tuần này', 'Chuyển Khoản Toàn Bộ', '2019-11-11 13:13:49', '2019-11-11 13:13:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(10) NOT NULL,
  `id_boardinghouse` int(10) NOT NULL,
  `id_booking` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `id_boardinghouse`, `id_booking`, `price`, `quantity`, `created_at`, `update_at`) VALUES
(7, 9, 9, 550000, 1, '2019-11-11 13:13:49', '2019-11-11 13:13:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_boardinghouse`
--

CREATE TABLE `comment_boardinghouse` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_boardinghouse` int(10) NOT NULL,
  `star` int(1) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_boardinghouse`
--

INSERT INTO `comment_boardinghouse` (`id`, `id_customer`, `id_boardinghouse`, `star`, `image`, `content`, `created_at`, `update_at`) VALUES
(15, 2, 8, 5, '1.png', 'cũng khá ổn và ok', '2019-11-04 03:16:43', '2019-11-04 03:16:43'),
(16, 1, 8, 5, '1.png', 'cám ơn các bạn đã ủng hộ', '2019-11-04 12:37:04', '2019-11-04 12:37:04'),
(17, 2, 9, 5, '1.png', 'giá rẽ', '2019-11-05 05:42:21', '2019-11-05 05:42:21'),
(18, 2, 11, 5, '1.png', 'các bạn đến nhà trọ mình làm vài nháy nhé', '2019-11-05 08:48:00', '2019-11-05 08:48:00'),
(21, 4, 15, 5, '1.png', 'khá ổn', '2019-11-22 11:48:24', '2019-11-22 11:48:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_product`
--

CREATE TABLE `comment_product` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `star` int(1) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(10) DEFAULT NULL,
  `phone` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` int(20) DEFAULT NULL,
  `lng` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `id_user`, `first_name`, `last_name`, `age`, `phone`, `email`, `address`, `image`, `lat`, `lng`, `created_at`, `update_at`) VALUES
(1, 3, 'Trần Ngọc', 'Lý', NULL, '0582774228', 'tnduy.16.06.1998@gmail.com', '233/34/21, nguyễn vắn cừ, phường an hòa, quận ninh kiều, tành phố cần thơ', NULL, NULL, NULL, '2019-10-22 04:43:00', '2019-10-22 04:43:00'),
(2, 4, 'Nguyễn Thị Tuyết', 'Nhi', NULL, NULL, 'nttn@gmail.com', NULL, NULL, NULL, NULL, '2019-10-22 04:44:10', '2019-10-22 04:44:10'),
(3, 5, 'Trần Ngọc', 'Nhi', NULL, NULL, 'dung@gmail.com.vn', NULL, 'banner3.png', NULL, NULL, '2019-10-31 13:08:44', '2019-10-31 13:08:44'),
(4, 6, 'Phạm Duy', 'Thuận', NULL, '0582774228', 'nodejs1998@gmail.com', NULL, NULL, NULL, NULL, '2019-11-18 13:31:49', '2019-11-18 13:31:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_order_product`
--

CREATE TABLE `detail_order_product` (
  `id` int(10) NOT NULL,
  `id_order` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_boardinghouse`
--

CREATE TABLE `image_boardinghouse` (
  `id` int(10) NOT NULL,
  `id_boardinghouse` int(10) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_boardinghouse`
--

INSERT INTO `image_boardinghouse` (`id`, `id_boardinghouse`, `image`, `created_at`, `update_at`) VALUES
(11, 8, 'images (1).jpg', '2019-11-03 10:04:30', '2019-11-03 10:04:30'),
(12, 8, 'images (2).jpg', '2019-11-03 10:04:30', '2019-11-03 10:04:30'),
(15, 9, 'images (1).jpg', '2019-11-04 12:23:39', '2019-11-04 12:23:39'),
(16, 9, 'images (2).jpg', '2019-11-04 12:23:39', '2019-11-04 12:23:39'),
(20, 9, 'images (6).jpg', '2019-11-04 12:23:39', '2019-11-04 12:23:39'),
(31, 11, '1573733229.images (1).jpg', '2019-11-14 12:07:09', '2019-11-14 12:07:09'),
(32, 11, '1573733230.images (2).jpg', '2019-11-14 12:07:10', '2019-11-14 12:07:10'),
(33, 11, '1573733249.images (5).jpg', '2019-11-14 12:07:29', '2019-11-14 12:07:29'),
(34, 11, '1573733249.images.jpg', '2019-11-14 12:07:29', '2019-11-14 12:07:29'),
(40, 15, '1574153663.20151001093646-845b.jpg', '2019-11-19 08:54:23', '2019-11-19 08:54:23'),
(41, 15, '1574153663.20151208161225-a961.jpg', '2019-11-19 08:54:23', '2019-11-19 08:54:23'),
(42, 15, '1574153664.images (1).jpg', '2019-11-19 08:54:24', '2019-11-19 08:54:24'),
(43, 15, '1574153664.images (2).jpg', '2019-11-19 08:54:24', '2019-11-19 08:54:24'),
(44, 16, '1574770997.20151001093646-845b.jpg', '2019-11-26 12:23:17', '2019-11-26 12:23:17'),
(45, 16, '1574770997.images (4).jpg', '2019-11-26 12:23:17', '2019-11-26 12:23:17'),
(46, 16, '1574770997.images (5).jpg', '2019-11-26 12:23:17', '2019-11-26 12:23:17'),
(47, 17, '1574771533.images (4).jpg', '2019-11-26 12:32:13', '2019-11-26 12:32:13'),
(48, 17, '1574771533.images (6).jpg', '2019-11-26 12:32:13', '2019-11-26 12:32:13'),
(49, 17, '1574771533.20151208161225-a961.jpg', '2019-11-26 12:32:13', '2019-11-26 12:32:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

CREATE TABLE `image_product` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`id`, `id_product`, `image`, `created_at`, `update_at`) VALUES
(1, 2, '1574775467.1.jpg', '2019-11-26 13:37:47', '2019-11-26 13:37:47'),
(2, 2, '1574775467.2.jpg', '2019-11-26 13:37:47', '2019-11-26 13:37:47'),
(3, 2, '1574775467.3.jpg', '2019-11-26 13:37:47', '2019-11-26 13:37:47'),
(4, 2, '1574775468.4.jpg', '2019-11-26 13:37:48', '2019-11-26 13:37:48'),
(5, 2, '1574775468.5.jpg', '2019-11-26 13:37:48', '2019-11-26 13:37:48'),
(6, 3, '1574775845.1.jpg', '2019-11-26 13:44:05', '2019-11-26 13:44:05'),
(7, 3, '1574775845.3.jpg', '2019-11-26 13:44:05', '2019-11-26 13:44:05'),
(8, 3, '1574775845.5.jpg', '2019-11-26 13:44:05', '2019-11-26 13:44:05'),
(9, 4, '1574861258.3.jpg', '2019-11-27 13:27:38', '2019-11-27 13:27:38'),
(10, 4, '1574861258.4.jpg', '2019-11-27 13:27:38', '2019-11-27 13:27:38'),
(11, 4, '1574861258.1.jpg', '2019-11-27 13:27:38', '2019-11-27 13:27:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `sale` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `production` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `id_typeproduct` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `sale`, `quantity`, `production`, `image`, `status`, `description`, `id_typeproduct`, `id_customer`, `created_at`, `update_at`) VALUES
(2, 'Ghế SoFa\r\n', 1200000, 0, 10, 'Việt nam', '1574775467.5.jpg', 1, 'Chiều 26/11, trận đấu giữa U22 Indonesia và U22 Thái Lan tại SEA Games 30 chào đón một cổ động viên đặc biệt, đó là nữ diễn viên người Nhật Bản Maria Ozawa. Cô gái có biệt danh \"thánh nữ\" của dòng phim người lớn thu hút sự chú ý của đông đảo khán giả có mặt trên khán đài sân sận động Rizal Memorial.', 1, 1, '2019-11-26 13:37:47', '2019-11-26 13:37:47'),
(3, 'Ghế Sofa Minh Đan', 1200000, 990000, 12, 'Việt nam', '1574775845.2.jpg', 1, 'Cả hai hẹn hò 3 năm trước khi quyết định về chung một nhà vào tháng 1/2018. Sau khi kết hôn Huỳnh Mi và ông xã vui vẻ tận hưởng cuộc sống vợ chồng son. Họ thường dành khá nhiều thời gian để \"nắm tay nhau đi khắp thế gian\". Những nơi cặp đôi đặt chân đến toàn là địa danh nổi tiếng như Maldives, Hàn Quốc,...', 1, 1, '2019-11-26 13:44:05', '2019-11-26 13:44:05'),
(4, 'Bàn Học Mini', 75000, 0, 10, 'Việt nam', '1574861258.3.jpg', 1, 'Khi mọi người đang hoang mang sợ bị đói trong rừng thì 1 anh đưa ra cao kiến: \"Hay là anh ăn Trâm Anh còn em ăn lá cây sống\". Dù biết đây là lời trêu đùa vô thưởng vô phạt nhưng nó lại khá \"liên quan\" đến nàng hotgirl. Trâm Anh từng dính vào scandal lộ clip s.e.x vào tháng 4 năm nay. Lần này đồng hành cùng 2 người đàn ông vào rừng vắng để thực hiện thử thách sinh tồn quả thực có phần...nhạy cảm. Tuy nhiên, Trâm Anh lại vô tư đáp trả bạn đồng hành: \"Thôi để em ăn cả 2 anh cho công bằng\"', 2, 1, '2019-11-27 13:27:38', '2019-11-27 13:27:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rep_comment_boardinghouse`
--

CREATE TABLE `rep_comment_boardinghouse` (
  `id` int(10) NOT NULL,
  `id_comment_boardinghouse` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rep_comment_boardinghouse`
--

INSERT INTO `rep_comment_boardinghouse` (`id`, `id_comment_boardinghouse`, `id_customer`, `content`, `created_at`, `update_at`) VALUES
(3, 15, 1, 'cám ơn bạn nhiều nha', '2019-11-04 12:36:29', '2019-11-04 12:36:29'),
(4, 15, 1, 'thanks', '2019-11-04 12:39:00', '2019-11-04 12:39:00'),
(5, 16, 1, 'thanks', '2019-11-04 12:59:38', '2019-11-04 12:59:38'),
(6, 15, 1, 'ấdafa', '2019-11-04 13:29:49', '2019-11-04 13:29:49'),
(7, 16, 1, 'cám ơn bạn nhiều ạ', '2019-11-04 13:47:07', '2019-11-04 13:47:07'),
(8, 15, 2, 'không có chi', '2019-11-04 13:48:44', '2019-11-04 13:48:44'),
(9, 17, 2, 'cám ơn bạn', '2019-11-05 05:42:34', '2019-11-05 05:42:34'),
(10, 16, 2, 'không có chi nào', '2019-11-05 05:49:15', '2019-11-05 05:49:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rep_comment_product`
--

CREATE TABLE `rep_comment_product` (
  `id` int(10) NOT NULL,
  `id_comment` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales_channel`
--

CREATE TABLE `sales_channel` (
  `id` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sales_channel`
--

INSERT INTO `sales_channel` (`id`, `id_customer`, `created_at`, `update_at`) VALUES
(1, 2, '2019-11-09 06:22:44', '2019-11-09 06:22:44'),
(2, 1, '2019-11-11 11:55:48', '2019-11-11 11:55:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_boardinghouse`
--

CREATE TABLE `type_boardinghouse` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_boardinghouse`
--

INSERT INTO `type_boardinghouse` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Nhà Trọ Cao Cấp', '2019-10-22 08:46:26', '2019-10-22 08:46:26'),
(2, 'Nhà Trọ Bình Dân', '2019-10-22 08:46:26', '2019-10-22 08:46:26'),
(3, 'Nhà Cho Thuê', '2019-10-22 08:47:13', '2019-10-22 08:47:13'),
(4, 'Khách Sạn', '2019-10-22 08:47:13', '2019-10-22 08:47:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `created_at`, `update_at`) VALUES
(1, 'Ghế ', '2019-11-25 13:39:15', '2019-11-25 13:39:15'),
(2, 'Bàn', '2019-11-25 13:39:15', '2019-11-25 13:39:15'),
(3, 'Tủ', '2019-11-25 13:39:34', '2019-11-25 13:39:34'),
(4, 'Giường', '2019-11-25 13:39:34', '2019-11-25 13:39:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `token`, `created_at`, `update_at`) VALUES
(3, 'carotsusison', '$2y$10$2PE5b/cQLBljl4yOMlOac.3ZQjr7A/4t7v0lcFx4/pXnh628ibKIq', 'GAUrs7aDtfWZ5vAQ8u8HMcVFwgCKKwzr40B9DLvh', '2019-10-22 04:43:00', '2019-10-22 04:43:00'),
(4, 'tuyetnhi1999', '$2y$10$jXXXagv9vA9VOK64r8GAq.8thHm1sT4ghoddKYmxjW7OdyA6KxqdK', 'GAUrs7aDtfWZ5vAQ8u8HMcVFwgCKKwzr40B9DLvh', '2019-10-22 04:44:10', '2019-10-22 04:44:10'),
(5, 'tuyetnhi1998', '$2y$10$rqBLQLFLng4Yaw7R.nnwDuNoq5fA0go54jr4Pw2VEG9uhOP1BpKUC', '9YYvxPBtcXL8p6rEwRPJDcUjB7ibbZXgZqzBBaeV', '2019-10-31 13:08:44', '2019-10-31 13:08:44'),
(6, 'nodejs1998@gmail.com', '$2y$10$o7GiZd4MU8md/5YeEuUZNefS.x6/a5Vq4QzPCXaFOZkCj6/XOVN1u', 'mTppWJFkJ2W2B2JRa0JCCIyo0RNnF1Raj77jMnyv', '2019-11-18 13:31:49', '2019-11-18 13:31:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `boarding_house`
--
ALTER TABLE `boarding_house`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_boardinghouse` (`id_type_boardinghouse`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_boardinghouse` (`id_boardinghouse`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Chỉ mục cho bảng `comment_boardinghouse`
--
ALTER TABLE `comment_boardinghouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_boardinghouse` (`id_boardinghouse`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `detail_order_product`
--
ALTER TABLE `detail_order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `image_boardinghouse`
--
ALTER TABLE `image_boardinghouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_boardinghouse` (`id_boardinghouse`);

--
-- Chỉ mục cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_typeproduct` (`id_typeproduct`);

--
-- Chỉ mục cho bảng `rep_comment_boardinghouse`
--
ALTER TABLE `rep_comment_boardinghouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comment_boardinghouse` (`id_comment_boardinghouse`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `rep_comment_product`
--
ALTER TABLE `rep_comment_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comment` (`id_comment`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `sales_channel`
--
ALTER TABLE `sales_channel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `type_boardinghouse`
--
ALTER TABLE `type_boardinghouse`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `boarding_house`
--
ALTER TABLE `boarding_house`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment_boardinghouse`
--
ALTER TABLE `comment_boardinghouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `detail_order_product`
--
ALTER TABLE `detail_order_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `image_boardinghouse`
--
ALTER TABLE `image_boardinghouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `image_product`
--
ALTER TABLE `image_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `rep_comment_boardinghouse`
--
ALTER TABLE `rep_comment_boardinghouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `rep_comment_product`
--
ALTER TABLE `rep_comment_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sales_channel`
--
ALTER TABLE `sales_channel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `type_boardinghouse`
--
ALTER TABLE `type_boardinghouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `boarding_house`
--
ALTER TABLE `boarding_house`
  ADD CONSTRAINT `boarding_house_ibfk_1` FOREIGN KEY (`id_type_boardinghouse`) REFERENCES `type_boardinghouse` (`id`),
  ADD CONSTRAINT `boarding_house_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `boarding_house_ibfk_4` FOREIGN KEY (`id_owner`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`id_boardinghouse`) REFERENCES `boarding_house` (`id`),
  ADD CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`);

--
-- Các ràng buộc cho bảng `comment_boardinghouse`
--
ALTER TABLE `comment_boardinghouse`
  ADD CONSTRAINT `comment_boardinghouse_ibfk_1` FOREIGN KEY (`id_boardinghouse`) REFERENCES `boarding_house` (`id`),
  ADD CONSTRAINT `comment_boardinghouse_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `comment_product`
--
ALTER TABLE `comment_product`
  ADD CONSTRAINT `comment_product_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comment_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `detail_order_product`
--
ALTER TABLE `detail_order_product`
  ADD CONSTRAINT `detail_order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_product` (`id`),
  ADD CONSTRAINT `detail_order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `image_boardinghouse`
--
ALTER TABLE `image_boardinghouse`
  ADD CONSTRAINT `image_boardinghouse_ibfk_1` FOREIGN KEY (`id_boardinghouse`) REFERENCES `boarding_house` (`id`);

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_typeproduct`) REFERENCES `type_product` (`id`);

--
-- Các ràng buộc cho bảng `rep_comment_boardinghouse`
--
ALTER TABLE `rep_comment_boardinghouse`
  ADD CONSTRAINT `rep_comment_boardinghouse_ibfk_1` FOREIGN KEY (`id_comment_boardinghouse`) REFERENCES `comment_boardinghouse` (`id`),
  ADD CONSTRAINT `rep_comment_boardinghouse_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `rep_comment_product`
--
ALTER TABLE `rep_comment_product`
  ADD CONSTRAINT `rep_comment_product_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comment_product` (`id`),
  ADD CONSTRAINT `rep_comment_product_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `sales_channel`
--
ALTER TABLE `sales_channel`
  ADD CONSTRAINT `sales_channel_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
