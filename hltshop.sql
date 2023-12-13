-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2023 lúc 10:58 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hltshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `branch`
--

INSERT INTO `branch` (`id`, `address`, `bname`) VALUES
(1, 'Can Tho', 'Can Tho'),
(2, 'HCM City', 'Ho Chi Minh City'),
(3, 'Vinh Long', 'Vinh Long');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cuserid_id` int(11) NOT NULL,
  `cproid_id` int(11) NOT NULL,
  `cquantity` smallint(6) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `cuserid_id`, `cproid_id`, `cquantity`, `cdate`) VALUES
(1, 1, 1, 1, '2023-12-11 13:52:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `cname`) VALUES
(1, 'Gundam'),
(2, 'Puzzle');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20231201062911', '2023-12-11 12:47:57', 54),
('DoctrineMigrations\\Version20231211114815', '2023-12-11 12:48:18', 164);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `owned`
--

CREATE TABLE `owned` (
  `id` int(11) NOT NULL,
  `oproid_id` int(11) NOT NULL,
  `obranchid_id` int(11) NOT NULL,
  `opquan` smallint(6) NOT NULL,
  `opcreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `owned`
--

INSERT INTO `owned` (`id`, `oproid_id`, `obranchid_id`, `opquan`, `opcreated`) VALUES
(1, 1, 1, 50, '2023-12-12 21:46:00'),
(2, 1, 3, 50, '2023-12-13 21:47:00'),
(3, 2, 3, 50, '2023-12-14 04:49:00'),
(4, 3, 1, 50, '2023-12-14 04:49:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `cat_id`, `pname`, `pdesc`, `price`, `image`) VALUES
(1, 1, 'METAL-BUILD-DRAGON-SCALE-Sirbine-Limited-1', 'METAL-BUILD-DRAGON-SCALE-Sirbine-Limited-1', 10.2, 'METAL-BUILD-DRAGON-SCALE-Sirbine-Limited-1-657705a386e42.webp'),
(2, 2, 'Cast Coaster Hanayama Puzzle – Level 4', 'Cast Coaster Hanayama Puzzle – Level 4', 15.01, 'Cast-Coaster-Hanayama-Puzzle-Level-4.jpg'),
(3, 2, 'BePuzzled Hanayama Cast Puzzle-Cylinder Level 4', 'BePuzzled Hanayama Cast Puzzle-Cylinder Level 4', 14.98, 'BePuzzled-Hanayama-Cast-Puzzle-Cylinder-Level-4.jpg'),
(4, 1, 'METAL-BUILD-Gundam-Astray-Gold-Frame-Alternative-Strike-Ver.-Limited', 'METAL-BUILD-Gundam-Astray-Gold-Frame-Alternative-Strike-Ver.-Limited', 10.5, 'METAL-BUILD-Gundam-Astray-Gold-Frame-Alternative-Strike-Ver-Limited-657a26df44b23.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `phonenum` varchar(50) NOT NULL,
  `state` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hometown`, `phonenum`, `state`) VALUES
(1, 'lam', '123456', 'cantho', '0987654321', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BA388B767B3612E` (`cuserid_id`),
  ADD KEY `IDX_BA388B714842D98` (`cproid_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Chỉ mục cho bảng `owned`
--
ALTER TABLE `owned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BB4532DF2B0DE8C` (`oproid_id`),
  ADD KEY `IDX_3BB4532DB2F1DA21` (`obranchid_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04ADE6ADA943` (`cat_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `owned`
--
ALTER TABLE `owned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_BA388B714842D98` FOREIGN KEY (`cproid_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_BA388B767B3612E` FOREIGN KEY (`cuserid_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `owned`
--
ALTER TABLE `owned`
  ADD CONSTRAINT `FK_3BB4532DB2F1DA21` FOREIGN KEY (`obranchid_id`) REFERENCES `branch` (`id`),
  ADD CONSTRAINT `FK_3BB4532DF2B0DE8C` FOREIGN KEY (`oproid_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04ADE6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
