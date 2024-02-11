-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 11, 2024 lúc 03:25 PM
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

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `img`, `abstract`, `created_at`, `update_at`, `created_by`, `update_by`) VALUES
(27, '従業員向けのカバーレターのサンプル', '<p>[Your Name]</p><p>[Your Address]</p><p>[City, Zip Code]</p><p>[Your Email Address]</p><p>[Your Phone Number]</p><p>[Today\'s Date]</p><p><br></p><p>[Employer\'s Name]</p><p>[Company Name]</p><p>[Company Address]</p><p>[City, Zip Code]</p><p><br></p><p>拝啓、お世話になっております。</p><p><br></p><p>私は[Your Name]と申します。このたびは、貴社での仕事に興味を持ち、応募させていただきたいと思います。私は[Your University/Work Experience]での経験を通じて、[Relevant Skills and Qualifications]のスキルを身につけました。</p><p><br></p><p>私は課題に対して積極的かつ柔軟に取り組むことができ、新しいアイディアを提案することによりチームの成功に貢献できる自信があります。[Company Name]が提供するビジョンと価値観に共感し、それに基づいて私の経験と能力を活かして貢献したいと考えています。</p><p><br></p><p>私は流暢な日本語と英語が話せ、ビジネス環境で円滑にコミュニケーションを取ることができます。また、[Relevant Certifications or Achievements]など、私の経歴を裏付ける資格も取得しています。</p><p><br></p><p>[Company Name]での面接の機会を頂ければ、さらに詳しくお話しできることを楽しみにしています。ご検討いただき、誠にありがとうございます。</p><p><br></p><p>何かご質問がございましたら、どうぞお気軽にお知らせください。ご多忙の中、お時間をいただき誠にありがとうございました。</p><p><br></p><p>何よりも、貴社でお働きできることを心より楽しみにしております。</p><p><br></p><p>どうぞよろしくお願いいたします。</p><p><br></p><p>[Your Name]</p><p><br></p><p>----------</p>', 'img/images.png', '<p>従業員向けのカバーレターのサンプル</p>', 1707661415, 0, 0, 0);

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
(7, 'VA', 'VA', '$2y$10$sIG/f0HPdZk3WpDQBHD5VOO.r7KXXlbTamWoYyvh6KZEOYaPpOQVm', 2),
(11, 'root', 'root', '$2y$10$dy.7Xeu1pukJXwxAG7LsXuXgGpQT.ZWvRmf52gxkT3z5Yw1uyeNIO', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `logs_login`
--
ALTER TABLE `logs_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
