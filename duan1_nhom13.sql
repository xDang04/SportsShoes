-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 06:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_nhom13`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `image`) VALUES
(22, 'Giày thời trang', 'g19.jpg'),
(23, 'Giày bóng chuyền', 'g14.jpg'),
(24, 'Giày leo núi', 'g22.jpg'),
(29, 'Giày đá bóng', 'g3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(1, 'Đỏ'),
(2, 'Vàng');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_order` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `code_cart` varchar(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_address` varchar(255) DEFAULT NULL,
  `ship_name_user` varchar(255) DEFAULT NULL,
  `ship_phone_user` varchar(255) DEFAULT NULL,
  `pttt` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `code_cart`, `status`, `total`, `time`, `ship_address`, `ship_name_user`, `ship_phone_user`, `pttt`) VALUES
(101, 24, '3288', 0, 22222, '2023-12-02 17:36:26', 'HUD vân canh', 'Ho dang', '0967365963', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_categories` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` varchar(255) DEFAULT NULL,
  `product_price_sale` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_categories`, `product_name`, `product_price`, `product_price_sale`, `description`, `origin`, `image`, `image2`, `image3`, `view`) VALUES
(21, 29, 'Giày đá bóng Zocker', '22222', '11111', 'Giày đá bóng Zocker', '12345', 'Zocker1.webp', 'Zocker.webp', 'Zocker2.webp', 162),
(22, 29, 'Giày đá bóng kaiwin', '22222', '11111', 'Giày đá bóng kaiwin', '12345', 'kaiwin1.webp\r\n', 'kaiwin.webp', 'kaiwin2.webp', 816),
(23, 24, 'Giày Leo Núi ', '22222', '11111', 'Giày Leo Núi Cho Nam', '123344', 'giayleonui.webp', 'giayleonui1.webp', 'giayleonui2.webp', 52),
(24, 23, 'Giày bóng chuyền', '33333', '22222', 'Giày bóng chuyền', NULL, 'g8.webp', 'g9.jpg', 'g21.jpg', NULL),
(25, 23, 'giày cao cổ thời trang nam nữ', '799999', '199.999', 'Giày đẹp đi được cho cả nam và  nữ', NULL, '52.jpg', '51.jpg', '53.jpg', 642),
(27, 24, 'Giày converse', '3599999', '200000', 'Giày converse', NULL, 'c1.png', 'c2.jpg', 'c3.jpg', 322);

-- --------------------------------------------------------

--
-- Table structure for table `product_rev`
--

CREATE TABLE `product_rev` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `stars` tinyint(4) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `DateComment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_rev`
--

INSERT INTO `product_rev` (`id`, `id_user`, `id_product`, `stars`, `comment`, `DateComment`) VALUES
(36, 24, 22, 3, 'rất tốt', '2023-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(0, 'Khách hàng'),
(1, 'Quản trị viên');

-- --------------------------------------------------------

--
-- Table structure for table `save`
--

CREATE TABLE `save` (
  `id_user` int(11) DEFAULT NULL,
  `id_voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `size`) VALUES
(1, 'M'),
(2, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `id_momo` int(11) NOT NULL,
  `partner_code` varchar(50) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `order_info` varchar(50) NOT NULL,
  `order_type` varchar(50) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `code_cart` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `full_name`, `email`, `phone`, `address`, `role`, `password`) VALUES
(24, 'admin', 'admin', 'admin@gmail.com', '988888887', 'TDP Vĩnh Thịnh', 1, 'admin'),
(25, 'user', 'user', 'user@gmail.com', '8983437', 'ha noi', 0, 'user'),
(31, 'HoXuanDang', 'Hồ Xuân Đăng', 'hodang204@gmail.com', '0967365963', 'Yên định thanh hóa', 1, 'hõuandang152004'),
(32, 'Hodang204', 'Hồ Xuân Đăng A', 'hodang204@gmail.com', '0967365963', 'Yên định thanh hóa', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `quanlity` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_rev`
--
ALTER TABLE `product_rev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  ADD PRIMARY KEY (`id_momo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_rev`
--
ALTER TABLE `product_rev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_momo`
--
ALTER TABLE `tbl_momo`
  MODIFY `id_momo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
