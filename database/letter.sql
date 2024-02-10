-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 05, 2024 lúc 03:26 PM
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
-- Cơ sở dữ liệu: `bookstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `abstract` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_username` varchar(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_mail` varchar(255) NOT NULL,
  `cus_tel` varchar(15) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_add` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `cus_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_username`, `cus_password`, `cus_mail`, `cus_tel`, `cus_name`, `cus_add`, `activation_code`, `status`, `cus_create`) VALUES
(124, '', '$2y$10$4x6JJ0jSfYXIpzmoeJQQDOef7YaZkEZTX/nMjLntNyna0vvohQT9W', 'nmhieu981@gmail.com', '(+84) 964536632', 'Nguyễn Minh Hiếu', 'Ninh Bình', 'd3696cfb815ab692407d9362e6f06c28', 1, '2024-02-05 13:49:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs_login`
--

CREATE TABLE `logs_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `current_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `logs_login`
--

INSERT INTO `logs_login` (`id`, `user_id`, `last_login`, `current_login`) VALUES
(1, 117, 1707042716, 1707141183),
(2, 118, 1707042716, 1707141183),
(3, 119, 1707042716, 1707141183),
(4, 121, 1707136635, 1707141183),
(5, 124, 1707141055, 1707141183);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_fullname`, `password`, `level`) VALUES
(6, 'wind', 'Nguyễn Minh Hiếu', '$2y$10$.XniWD2wPYnB90HDR/THqe3YhPELAlL9a9OG5.SYL9WJaY.s9YJNe', 2),
(7, 'VA', 'VA', '$2y$10$sIG/f0HPdZk3WpDQBHD5VOO.r7KXXlbTamWoYyvh6KZEOYaPpOQVm', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `logs_login`
--
ALTER TABLE `logs_login`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT cho bảng `logs_login`
--
ALTER TABLE `logs_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
