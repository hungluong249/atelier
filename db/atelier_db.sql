-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 10:34 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atelier_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `slug`, `image`, `content`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Giới Thiệu', 'gioi-thieu', 'about/Jq2VNNdISGOpffsIgJv2k9x2lngJILSQgW6ClHBS.jpeg', '<p>noi dung 1111111</p>', 0, '2018-04-18 12:16:04', '2018-06-02 02:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '', '$2y$10$nfCNB/Gb9/Moch4IdsA97.LIWKu55Ybkh4sEFP2bm7MdyxTGJCDy6', '2uhKd6RK4YSuRo84Pzjbf6eS4r4ZoRVCkrpnik4ZNl3igc9sdw7LkVD8kXk8', NULL, NULL),
(2, 'maymymy_admin', 'maymymy_admin@maymymy.vn', '', '$2y$10$6Ji2vqAjzfEZS54WfwHzJu4Sy2.7OzK0zYq14j8beZeBmYVkHk.1q', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `is_deleted`, `created_at`, `updated_at`) VALUES
(14, 'photo-1448043552756-e747b7a2b2b8.jpg', 1, '2018-04-09 07:11:49', '2018-04-09 07:11:49'),
(15, 'kaitlin-dowis-506634-unsplash.jpg', 1, '2018-04-09 10:17:26', '2018-04-09 10:17:26'),
(16, '1932963e2039c99aaa7256b986efb537.jpg', 1, '2018-04-18 16:59:36', '2018-04-18 16:59:36'),
(17, 'e5aea3edb59f2307f70a7ba39156b430.jpg', 1, '2018-04-18 17:04:15', '2018-06-01 06:33:32'),
(18, 'about/KU4zFlHlBbU8nXFVYWCRzyKGsQcXcQEgyi3fEa21.jpeg', 0, '2018-06-01 06:32:29', '2018-06-01 06:32:29'),
(19, 'banner/fgxPEwpTOiDsnKUrFxcjFcsmQchjps8MkHz7djNT.jpeg', 1, '2018-06-01 06:34:20', '2018-06-01 06:34:28'),
(20, 'banner/CQcgbOBmE8WagOkGCnwYtXGuFnAmqZTTZOs0DJYj.jpeg', 0, '2018-06-01 06:34:53', '2018-06-01 06:34:53'),
(21, 'banner/Kvr82aL1wwqmfhhMN1HVzQq78kEVFxSA3LcZNGe7.html', 1, '2018-06-02 02:35:35', '2018-06-02 02:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `type`, `title`, `slug`, `image`, `description`, `content`, `is_deleted`, `created_at`, `updated_at`) VALUES
(13, 12, 1, 'test', 'test', 'news/lVhppAhir4zJICIN12x1LtHLsgXuFHLclxU3IENg.jpeg', 'asdasdasda', '<p>asdasdad</p>', 0, '2018-01-09 05:32:57', '2018-01-09 05:32:57'),
(14, 10, 0, 'tu van', 'tu-van', 'advises/MelCF1MBLqgHlASJnHswwGbBeNi41fXx82rOhJwx.jpeg', 'asdasdasd', '<p>asdasdasdad</p>', 0, '2018-01-09 09:21:14', '2018-01-09 09:21:14'),
(15, 12, 1, '2', '2', 'news/9ZPpZ1T2dyMUlfrl23OYRTHkjBXmYHLJDKZ2P4hm.jpeg', 'asdasdsa', '<p>asdasdasd</p>', 0, '2018-01-12 08:42:09', '2018-01-12 08:42:09'),
(16, 10, 0, 'Tư vấn 2', 'tu-van-2', 'advises/8pfVm4PUFU9xOPKHIG1knnPewb460eWdohtRQeyl.jpeg', 'tu van 2', '<p>tu van 2</p>', 0, '2018-02-01 07:05:28', '2018-02-01 07:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text,
  `description` text,
  `type` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `title`, `slug`, `image`, `description`, `type`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(10, 'Góc làm đẹp', 'goc-lam-dep', 'advises/category/loeOFv7Boe2wmcuKmyxA0ucYUSKOKRgMDmXywIB2.jpeg', NULL, 0, '2017-11-28 07:57:43', '2017-11-28 07:57:43', 1, 0),
(11, 'Chăm sóc da', 'cham-soc-da', 'advises/category/Vap2eV4IEtCqlMas1bgXk7aqLCVOzUF1HtH2eZYz.jpeg', NULL, 0, '2017-11-28 07:58:20', '2017-11-28 07:58:20', 1, 0),
(12, 'Tin tức', 'tin-tuc', 'news/category/myXkqdlXaJDeTT70jmFCkQOwIHmOUZ5X2ckUYNoQ.jpeg', NULL, 1, '2017-11-28 08:17:20', '2017-11-28 08:17:20', 1, 0),
(13, 'Tuyển dụng', 'tuyen-dung', 'news/category/klvnkoai4CYmkbb5V0iVXJ0PDhUAVypPZRpFJPbK.jpeg', NULL, 1, '2017-11-28 08:17:34', '2017-11-28 08:17:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_approved` tinyint(4) DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `author`, `email`, `url`, `ip`, `content`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(5, 13, 'abc', 'hanguyen@user.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 09:10:07', '2018-01-13 09:10:07'),
(6, 15, 'Minh Trường', 'minhtruong93gtvt@gmail.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 10:03:00', '2018-01-13 10:03:00'),
(7, 15, 'Nguyễn An', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 10:09:12', '2018-01-13 10:09:12'),
(8, 15, 'Nguyễn An', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 10:09:45', '2018-01-13 10:09:45'),
(9, 15, 'Minh Trường', 'minhtruong93gtvt@gmail.com', NULL, NULL, 'minh trường comment', 0, 0, '2018-01-13 17:12:49', '2018-01-13 17:12:49'),
(10, 15, 'abc', 'admin@admin.com', NULL, NULL, 'adadasd', 0, 0, '2018-01-13 17:21:04', '2018-01-13 17:21:04'),
(11, 15, 'aaa', 'admin@admin.com', NULL, NULL, 'adadas', 0, 0, '2018-01-13 17:23:12', '2018-01-13 17:23:12'),
(12, 15, 'bbb', 'admin@admin.com', NULL, NULL, 'adada', 0, 0, '2018-01-13 17:23:48', '2018-01-13 17:23:48'),
(13, 15, 'Lương Hưng', 'hanguyen@user.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 17:24:22', '2018-01-13 17:24:22'),
(14, 15, '123', 'admin@admin.com', NULL, NULL, 'adsasd', 0, 0, '2018-01-13 17:37:48', '2018-01-13 17:37:48'),
(15, 15, '1', 'admin@admin.com', NULL, NULL, '1', 0, 0, '2018-01-13 17:39:13', '2018-01-13 17:39:13'),
(16, 15, '2', 'admin@admin.com', NULL, NULL, '2', 0, 0, '2018-01-13 17:39:18', '2018-01-13 17:39:18'),
(19, 15, '3', 'admin@admin.com', NULL, NULL, 'ada', 0, 0, '2018-01-13 17:42:53', '2018-01-13 17:42:53'),
(20, 15, '4', 'admin@admin.com', NULL, NULL, 'a', 0, 0, '2018-01-13 17:47:51', '2018-01-13 17:47:51'),
(21, 15, '5', 'admin@admin.com', NULL, NULL, 'adasd', 0, 0, '2018-01-13 17:49:10', '2018-01-13 17:49:10'),
(22, 15, '6', 'admin@admin.com', NULL, NULL, '6', 0, 0, '2018-01-13 17:50:30', '2018-01-13 17:50:30'),
(23, 15, '7', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 17:51:30', '2018-01-13 17:51:30'),
(24, 15, '8', 'admin@admin.com', NULL, NULL, '8', 0, 0, '2018-01-13 17:53:19', '2018-01-13 17:53:19'),
(25, 13, '1', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-01-13 17:54:12', '2018-01-13 17:54:12'),
(26, 13, '3', 'admin@admin.com', NULL, NULL, '3', 0, 0, '2018-01-13 17:54:57', '2018-01-13 17:54:57'),
(27, 13, '4', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-01-14 07:48:07', '2018-01-14 07:48:07'),
(28, 14, '1', 'admin@admin.com', NULL, NULL, '1', 0, 0, '2018-01-15 02:57:47', '2018-01-15 02:57:47'),
(34, 14, '2', 'admin@admin.com', NULL, NULL, '2', 0, 0, '2018-01-15 04:26:38', '2018-01-15 04:26:38'),
(35, 13, 'hello', 'helllo@gmel.com', NULL, NULL, 'hello', 0, 0, '2018-01-15 05:07:11', '2018-01-15 05:07:11'),
(36, 14, 'abc', 'admin@admin.com', NULL, NULL, 'abc', 0, 0, '2018-02-23 13:07:39', '2018-02-23 13:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` text,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `title`, `slug`, `is_active`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`) VALUES
(1, 0, 'sadasdasd', 'sadasdasd', 1, NULL, NULL, NULL, '2018-01-02 08:40:11', NULL, 0),
(2, 0, 'nếp cẩm cực mạnh', 'nep-cam-cuc-manh-1', 1, 'categories/9xxaNQoCij9iWpUXSnmWFZk7xCpIoqMsZ2L5NNoJ.jpeg', 'ádasdasdasdasd', '2018-01-02 08:39:12', '2018-01-02 09:16:42', NULL, 0),
(3, 0, '1', '1', 1, 'categories/cn3OO4ZT64LrsdagPn9ZznfWKd1lhCc2StQnJ9bk.jpeg', '1', '2018-06-19 09:21:47', '2018-06-19 09:21:47', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(10) UNSIGNED NOT NULL,
  `library_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `library_id`, `image`, `description`, `created_at`, `updated_at`) VALUES
(8, 40, 'hinh-anh-dep-ve-tinh-yeu-chung-thuy.jpg', NULL, NULL, NULL),
(9, 40, 'anh-dep-1.jpg', NULL, NULL, NULL),
(10, 41, '003 - Copy (2).jpg', NULL, NULL, NULL),
(11, 41, '003 - Copy.jpg', NULL, NULL, NULL),
(12, 41, '003.jpg', NULL, NULL, NULL),
(13, 42, '_mg_9779__20433_zoom.jpg', NULL, NULL, NULL),
(14, 42, '003 - Copy (2).jpg', NULL, NULL, NULL),
(15, 42, '003 - Copy.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `introduce`
--

CREATE TABLE `introduce` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduce`
--

INSERT INTO `introduce` (`id`, `title`, `slug`, `image`, `content`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Về chúng tôi', 've-chung-toi', 'introduce/s8ZEzY18Dk193BB4nrsiTugshpjkBYWCV8NLCsHX.jpeg', '<p>Mỹ phẩm Maymymy l&agrave; thương hiệu mỹ phẩm lớn, uy t&iacute;n v&agrave; an to&agrave;n. Được đ&ocirc;ng đảo người ti&ecirc;u d&ugrave;ng tin tưởng v&agrave; lựa chọn.</p>\r\n<p>Với 7 năm x&acirc;y dựng v&agrave; ph&aacute;t triển tr&ecirc;n thị trường, Mỹ phẩm Maymymy đ&atilde; đạt được nhiều th&agrave;nh c&ocirc;ng rực rỡ. Những sản phẩm của Maymymy lu&ocirc;n ch&uacute; trọng cả về kh&acirc;u sản xuất lẫn đ&oacute;ng g&oacute;i,&nbsp;th&agrave;nh phẩn chiết xuất từ thi&ecirc;n nhi&ecirc;n, an to&agrave;n với mọi l&agrave;n da.</p>\r\n<p>Ch&uacute;ng t&ocirc;i mong muốn trao tới tay người ti&ecirc;u d&ugrave;ng 1 sản phẩm thực sự chất lượng, g&oacute;p phần mang thương hiệu Mỹ phẩm Việt Nam tới gần hơn với mọi người!</p>\r\n<p>Phương ch&acirc;m kinh doanh của ch&uacute;ng t&ocirc;i l&agrave; : CHẤT LƯỢNG, UY T&Iacute;N, TRUNG THỰC!</p>', 0, NULL, '2018-04-02 10:39:53'),
(2, 'Tầm nhìn chiến lược', 'tam-nhin-chien-luoc', 'introduce/DAUXK971T0dSwnalxtFsemkwspZrAb5hFlnWAje1.jpeg', '<p>Mỹ phẩm Maymymy l&agrave; thương hiệu mỹ phẩm lớn, uy t&iacute;n v&agrave; an to&agrave;n. Được đ&ocirc;ng đảo người ti&ecirc;u d&ugrave;ng tin tưởng v&agrave; lựa chọn.</p>\r\n<p>Với 7 năm x&acirc;y dựng v&agrave; ph&aacute;t triển tr&ecirc;n thị trường, Mỹ phẩm Maymymy đ&atilde; đạt được nhiều th&agrave;nh c&ocirc;ng rực rỡ. Những sản phẩm của Maymymy lu&ocirc;n ch&uacute; trọng cả về kh&acirc;u sản xuất lẫn đ&oacute;ng g&oacute;i,&nbsp;th&agrave;nh phẩn chiết xuất từ thi&ecirc;n nhi&ecirc;n, an to&agrave;n với mọi l&agrave;n da.</p>\r\n<p>Ch&uacute;ng t&ocirc;i mong muốn trao tới tay người ti&ecirc;u d&ugrave;ng 1 sản phẩm thực sự chất lượng, g&oacute;p phần mang thương hiệu Mỹ phẩm Việt Nam tới gần hơn với mọi người!</p>\r\n<p>Phương ch&acirc;m kinh doanh của ch&uacute;ng t&ocirc;i l&agrave; : CHẤT LƯỢNG, UY T&Iacute;N, TRUNG THỰC!</p>', 0, NULL, '2017-11-28 07:07:17'),
(3, 'Sứ mệnh', 'su-menh', 'introduce/3PoFSgfTrcsF0rNtcjDe7iIPh4anRhHjUAkmlVMn.jpeg', '<p>Sắc đẹp ch&iacute;nh l&agrave; vũ kh&iacute; lợi hại nhất gi&uacute;p chị em tỏa s&aacute;ng v&agrave; th&agrave;nh c&ocirc;ng hơn trong cuộc sống. Thấu hiểu được điều đ&oacute;, Mỹ phẩm Nam Anh Khương đ&atilde; nghi&ecirc;n cứu, s&aacute;ng tạo kh&ocirc;ng ngừng để tạo ra c&aacute;c sản phẩm chăm s&oacute;c sắc đẹp cho chị em phụ nữ.</p>\r\n<p>H&atilde;y để mỹ phẩm Nam Anh Khương đồng h&agrave;nh c&ugrave;ng bạn trong h&agrave;nh tr&igrave;nh chinh phục vẻ đẹp của ch&iacute;nh m&igrave;nh!</p>', 0, NULL, '2017-11-28 07:07:46'),
(4, 'Chứng nhận', 'chung-nhan', 'introduce/z47H97qzTwsB0Ww0LsPCWEBb7HkaPiCAOGVuyhoQ.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.</p>', 0, NULL, '2017-11-28 07:08:53'),
(5, 'Điểu khoản', 'dieu-khoan', 'introduce/W1cAVHfj4YBGD1yBpx9Wenv2dakH2l8HtScWUdZH.jpeg', '<p><strong>Thương hiệu v&agrave; bản quyền</strong></p>\r\n<p>C&ocirc;ng ty TNHH MTV SX TM h&oacute;a mỹ phẩm Nam Anh Khương l&agrave; nh&agrave; ph&acirc;n phối độc quyền thương hiệu mỹ phẩm</p>\r\n<p>Nam Anh Khương tại Việt Nam.</p>\r\n<p>To&agrave;n bộ nội dung của trang web được bảo vệ bởi luật bản quyền của Việt Nam v&agrave; c&aacute;c c&ocirc;ng ước quốc tế. Bản quyền đ&atilde; được bảo lưu.<br /><strong>&nbsp;Ch&iacute;nh s&aacute;ch khuyến m&atilde;i gi&aacute;<br /></strong>- Th&ocirc;ng tin, ch&iacute;nh s&aacute;ch gi&aacute; tr&ecirc;n trang web lu&ocirc;n giống ở c&aacute;c cửa h&agrave;ng b&aacute;n h&agrave;ng trực tiếp v&agrave; tr&ecirc;n fanpage ch&iacute;nh thức của c&ocirc;ng ty.<br />- Tuy nhi&ecirc;n trong một số chương tr&igrave;nh khuyến m&atilde;i, một số mặt h&agrave;ng gi&aacute; SỐC c&oacute; thể online chỉ c&oacute; số lượng nhất định, ch&uacute;ng t&ocirc;i sẽ c&ocirc;ng bố số lượng n&agrave;y l&ecirc;n trang web, nếu đ&atilde; b&aacute;n hết số lượng quy định n&agrave;y, bạn vui l&ograve;ng đến c&aacute;c cửa h&agrave;ng để mua h&agrave;ng.<br />- Nếu c&oacute; sai s&oacute;t ch&ecirc;nh lệch n&agrave;o đ&oacute; giữa gi&aacute; online v&agrave; gi&aacute; tại c&aacute;c cửa h&agrave;ng b&aacute;n h&agrave;ng trực tiếp của Nam Anh Khương th&igrave; gi&aacute; khuyến m&atilde;i sẽ được &aacute;p dụng cho k&ecirc;nh b&aacute;n h&agrave;ng n&agrave;o m&agrave; bạn quyết định chọn mua.<br />- Một số chương tr&igrave;nh d&agrave;nh ri&ecirc;ng cho online, khi đ&oacute; gi&aacute; khuyến m&atilde;i online c&oacute; thể kh&aacute;c so với gi&aacute; khuyến m&atilde;i tại c&aacute;c cửa h&agrave;ng b&aacute;n h&agrave;ng trực tiếp,&hellip; c&aacute;c gi&aacute; n&agrave;y chỉ d&agrave;nh ri&ecirc;ng cho online m&agrave; kh&ocirc;ng &aacute;p dụng cho b&aacute;n h&agrave;ng trực tiếp tại c&aacute;c cửa h&agrave;ng.</p>\r\n<p><strong>&nbsp;Ch&iacute;nh s&aacute;ch khuyến m&atilde;i qu&agrave; tặng<br /></strong>- C&aacute;c ch&iacute;nh s&aacute;ch qu&agrave; tặng khi mua online sẽ được hưởng t&ugrave;y theo c&aacute;c chương tr&igrave;nh qu&agrave; tặng của Mỹ phẩm Nam Anh Khương.</p>', 0, NULL, '2017-11-28 07:08:15'),
(6, 'Thư viện ảnh', 'thu-vien-anh', 'introduce/lSDOcIRzwjzjY20CS6oDCCMRw9huC3IuqFt4VxSu.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent gravida tempor lacinia. Nam odio metus, ornare vitae diam in, tempus pellentesque magna. Nullam eget nisi non quam luctus posuere. Quisque sem sapien, congue tincidunt varius in, sagittis in lorem. Aliquam feugiat est quis nisl varius sodales. Curabitur vel nibh dapibus, condimentum nunc ac, fringilla nunc. Praesent enim ex, molestie id sapien sed, tincidunt finibus dui. Praesent quis diam ultrices, iaculis nisi et, condimentum ex. In lacinia augue felis, nec lobortis risus aliquet in. Curabitur id tortor diam. Maecenas id interdum felis. Cras egestas, orci ut cursus dictum, neque purus sodales dui, a elementum mauris enim sed arcu.</p>', 0, NULL, '2017-11-28 07:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`id`, `type_id`, `title`, `slug`, `description`, `is_deleted`, `created_at`, `updated_at`, `is_active`, `image`) VALUES
(17, 31, 'Rượu táo mèo', 'ruou-tao-meo', 'rượu táo mèo', 0, '2017-12-31 10:41:48', '2017-12-31 10:41:48', 1, 'Desert.jpg'),
(18, 31, 'Rượu nếp cẩm', 'ruou-nep-cam', 'rượu nếp cẩm', 0, '2017-12-31 10:42:18', '2017-12-31 10:42:18', 1, 'Hydrangeas.jpg'),
(19, 32, 'Rượu Chivas', 'ruou-chivas', 'rượu chivas', 0, '2017-12-31 10:43:09', '2017-12-31 10:43:09', 1, 'Jellyfish.jpg'),
(20, 33, 'Tổ chức tiệc', 'to-chuc-tiec', 'acc', 0, '2018-01-30 09:26:15', '2018-01-30 09:26:15', 1, '16387030_1560201323989974_6924660638793359133_n.jpg'),
(21, 31, 'test', 'test', NULL, 0, '2018-06-23 07:19:45', '2018-06-23 07:35:58', 0, 'maxresdefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`id`, `title`, `slug`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(39, 'thông báo', 'thong-bao-1', 'abc', 1, '2018-02-01 04:42:40', '2018-02-01 04:58:15'),
(40, 'abc abc', 'abc-abc', 'abc abc', 1, '2018-02-01 04:58:50', '2018-02-01 05:00:11'),
(41, 'test', 'test', 'abc', 0, '2018-02-23 02:48:04', NULL),
(42, 'abc', 'abc', 'abc', 0, '2018-02-24 14:37:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2017_12_27_115203_create_image_table', 5),
(17, '2014_10_12_000000_create_users_table', 6),
(18, '2014_10_12_100000_create_password_resets_table', 6),
(19, '2017_02_25_025103_create_admins_table', 6),
(20, '2017_11_01_042108_adds_api_token_to_users_table', 6),
(21, '2017_11_07_164248_create_blog_table', 6),
(22, '2017_11_07_170713_create_comment_blog_table', 6),
(23, '2018_01_05_172646_create_tasting_table', 7),
(24, '2018_01_05_173223_create_tasting_product_table', 8),
(25, '2018_01_05_180917_create_tasting_table', 9),
(26, '2018_01_05_181014_create_tasting_product_table', 9),
(27, '2018_01_14_150322_create_product_comment_table', 10),
(28, '2018_02_01_155856_create_subscribe_table', 11),
(29, '2018_06_19_172842_create_teamplate_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `unique_code` varchar(10) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_phone` decimal(20,0) DEFAULT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `customer_district` varchar(100) DEFAULT NULL,
  `customer_city` varchar(100) DEFAULT NULL,
  `customer_content` text,
  `payment_method` tinyint(1) DEFAULT NULL COMMENT '1: COD; 2: Bank',
  `status` tinyint(1) DEFAULT '0' COMMENT '0: pending; 1: ongoing; 2: complete; 99: cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `unique_code`, `customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_district`, `customer_city`, `customer_content`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(62, 'B84C4EF74', 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', 'abc', 2, 99, '2018-03-05 05:17:59', '2018-06-02 02:19:07'),
(63, '2A310B666', 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '', 1, 2, '2018-03-22 07:58:49', '2018-06-02 02:19:52'),
(64, '0D2BC2982', 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', 'asdasda', 1, 2, '2018-04-21 15:19:30', '2018-06-22 10:27:48'),
(65, '74F2BDA1D', 9, 'Hung Nguyen', 'hungnguyen@user.com', '12123123123', '132123wqeqeqew', 'eqweqwqeweqw', 'qeweqweqweqw', 'qưeqweqweqwe', 1, 99, '2018-05-25 07:34:27', '2018-06-02 02:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_quantity` decimal(20,0) DEFAULT NULL,
  `product_total_cost` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `product_name`, `product_quantity`, `product_total_cost`) VALUES
(87, 62, 60, 'san pham 7', '5', '500'),
(88, 62, 60, 'san phammmmmmmmmm', '1', '9'),
(89, 63, 60, '3', '1', '3'),
(90, 64, 60, 'san phammmmmmmmmm 11', '1', '9'),
(91, 64, 60, '4', '1', '3'),
(92, 65, 60, 'san pham 2', '1', '10');

-- --------------------------------------------------------

--
-- Table structure for table `origin`
--

CREATE TABLE `origin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `origin`
--

INSERT INTO `origin` (`id`, `name`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Mỹ', 0, '2018-01-10 07:17:12', NULL),
(33, 'Việt Nam', 0, '2018-01-10 07:29:23', '2018-01-10 07:44:01'),
(34, 'Ai Cập', 0, '2018-01-10 07:29:39', '2018-01-10 07:43:47'),
(35, 'a 1 2', 0, '2018-01-10 07:38:43', '2018-01-10 07:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vinhan16sep@gmail.com', '$2y$10$aa3z2u1C4IAkZJiWpWHGyORJf2pnZppYY26W2pNRYLD5V9jtCV3Ba', '2017-11-01 23:32:26'),
('vinhan16sep@gmail.com', '$2y$10$aa3z2u1C4IAkZJiWpWHGyORJf2pnZppYY26W2pNRYLD5V9jtCV3Ba', '2017-11-01 23:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `effect` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(60,0) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount` decimal(60,0) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `template_title` text COLLATE utf8mb4_unicode_ci,
  `template_content` text COLLATE utf8mb4_unicode_ci,
  `template_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type_id`, `kind_id`, `name`, `slug`, `quantity`, `effect`, `price`, `content`, `description`, `discount`, `image`, `created_at`, `updated_at`, `deleted_at`, `is_deleted`, `template_title`, `template_content`, `template_id`, `is_active`) VALUES
(60, 31, 18, '2', '2', NULL, NULL, '2', '<p>2</p>', '<p>2</p>', '2', '[\"DIcolnR4IiZhWdSeNAezaK5zz99TYwune6vo76KP.jpeg\"]', '2018-06-20 05:46:30', '2018-06-22 08:39:58', NULL, 0, '[\"a1\",\"b2\",\"c3\",\"d4\"]', '[\"1\",\"1\",\"1\",\"1\"]', 1, 0),
(61, 31, 17, '3', '3', NULL, NULL, '3', '<p>3</p>', '<p>3</p>', '3', '[\"fosrI6UVpzZNIQobV3PhdmQUucKGqi2e43wNP88y.jpeg\",\"gJyJUSwKAtvERfu2nbOBHolHom1OZrMAV9Q1E5zc.jpeg\"]', '2018-06-20 08:17:03', '2018-06-23 06:37:54', NULL, 1, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"32\",\"32\",\"32\",\"32\",\"32\"]', 5, 0),
(62, 33, 20, 'test', 'test', NULL, NULL, '1000000', '<p>1</p>', '<p>1</p>', NULL, '[\"5WkEOVt88VX5CFoJfnuLxluDMTGcTURsYI6WZjGu.jpeg\",\"k7Dfb9ddP7eveqBi9kWlgF5uZDAt35kHAzilS9sd.jpeg\"]', '2018-06-23 03:41:27', '2018-06-23 03:41:27', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 1),
(63, 33, 20, 'abc', 'abc', NULL, NULL, '1000000', '<p>1</p>', '<p>1</p>', NULL, '[\"7TIFrhqI0pImCkDQMrsY8Anyb2h1NmwYKmwBzsoX.jpeg\",\"QVYeLCYI37Vt7nouZ8Xm6xW9c1UITfbs4P4onZvU.jpeg\"]', '2018-06-23 03:42:12', '2018-06-23 03:42:12', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 1),
(64, 33, 20, 'abcd', 'abcd', 100, NULL, '1000000', '<p>abc</p>', '<p>abc</p>', '200000', '[\"B0qDIvtZ5hrGJNx0oy7jRiaBvmpJz6Q2v78HRZq0.jpeg\"]', '2018-06-23 03:43:18', '2018-06-23 03:53:34', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 1),
(65, 32, 19, '1', '1', 100, NULL, '1000000', '<p>1</p>', '<p>1</p>', '10000', '[\"dkPnxnm5wmHiYXQAAlNTDG4JuoZHdvRh5Mc0XlFm.jpeg\"]', '2018-06-23 03:58:36', '2018-06-23 04:36:04', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 0),
(66, 31, 17, '22', '22', 100, NULL, '1000000', '<p>1</p>', '1', '100000', '[\"JpLRA3mL1PCErLYr6U2lIpQA6cQ5lhqPpjjyE22G.jpeg\"]', '2018-06-23 04:37:23', '2018-06-23 04:37:23', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 0),
(67, 31, 17, '2', '2-1', 100, NULL, '10000', '<p>1</p>', '1', '1000', '[\"ldgqiLUBqEUaXA1iWaPVnKhFkqtQFsiH4b9V8CDQ.jpeg\"]', '2018-06-23 04:44:56', '2018-06-23 06:42:59', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 0),
(68, 31, 18, '4', '4', 100, NULL, '10000', '<p>2</p>', '2', '0', '[\"7X1lP0njVpz8ymqTIzMmp1THfImQvHEMDraqRBNc.jpeg\",\"v6Qx94uaDiHfYBBIjKneNnotXZbfUI8o91NdEEKJ.jpeg\",\"6WXClX02tUPgxolgw0uHQtJqTJgu0zguPIHTTkEa.jpeg\",\"DlnOBXTF1MIGHLwO2aSZcP9GU0IOhAiA9RNUfykS.jpeg\"]', '2018-06-23 05:32:43', '2018-06-23 06:38:12', NULL, 1, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[\"1\",\"1\",\"1\",\"1\",\"1\"]', 5, 0),
(69, 31, 18, '2', '2-3', 1000, NULL, '10000', '<p>1</p>', '1', '0', '[\"VTLTeJHBTsTP36TimynHgnZKaybhWVLzMoXQ2imb.jpeg\",\"ryvvVUM2Rg7fcVfz4rvsl3TC0M71DGxRJ6rRQvB0.jpeg\"]', '2018-06-23 05:36:41', '2018-06-23 05:44:17', NULL, 0, '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', '[null,null,null,null,null]', 5, 0),
(70, 31, 17, '3', '3-1', 1000, NULL, '10000', '<p>1</p>', '1', '1000', '[\"k40jAjop6qur0ABHKMFSl8kDsM78eER2Yis2NEXg.jpeg\"]', '2018-06-23 05:45:00', '2018-06-23 06:38:04', NULL, 1, '[\"a1\",\"b2\",\"c3\",\"d4\"]', '[\"1\",\"1\",\"1\",\"1\"]', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `title`, `slug`, `parent_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Các loại cây', 'cac-loai-cay', 0, 0, '0000-00-00 00:00:00', '2018-06-02 02:37:01'),
(4, 'Chậu / Phụ kiện', 'chau-phu-kien', 0, 0, '2018-04-18 18:01:21', '2018-04-18 18:01:21'),
(5, 'Xương rồng', 'xuong-rong', 1, 0, '2018-04-18 18:01:28', '2018-06-02 02:36:53'),
(6, 'Sen đá', 'sen-da', 1, 0, '2018-04-18 18:15:31', '2018-04-18 18:15:31'),
(7, 'Cây nột thất', 'cay-not-that', 1, 0, '2018-04-18 18:15:44', '2018-04-18 18:15:44'),
(8, 'Các loại chậu', 'cac-loai-chau', 4, 0, '2018-04-18 18:16:00', '2018-04-18 18:16:00'),
(9, 'Đất', 'dat', 4, 0, '2018-04-18 18:16:11', '2018-04-18 18:16:11'),
(10, 'Phụ kiện trang trí', 'phu-kien-trang-tri', 4, 0, '2018-04-18 18:16:22', '2018-04-18 18:16:22'),
(11, 'test', 'test', 7, 0, '2018-05-02 08:19:08', '2018-05-02 08:19:08'),
(12, 'Danh mục mới', 'danh-muc-moi', 0, 1, '2018-06-01 09:20:20', '2018-06-01 14:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `is_approved` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`id`, `product_id`, `author`, `email`, `content`, `title`, `rating`, `is_approved`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 40, '1', 'admin@admin.com', '1', '1', 3, 0, 0, '2018-01-15 02:35:38', '2018-01-15 02:35:38'),
(4, 40, '2', 'admin@admin.com', '2', '2', 2, 0, 0, '2018-01-15 02:36:05', '2018-01-15 02:36:05'),
(5, 40, '3', 'admin@admin.com', '3', '3', 3, 0, 0, '2018-01-15 02:36:46', '2018-01-15 02:36:46'),
(6, 41, '1', 'admin@admin.com', '1', '1', 2, 0, 0, '2018-01-15 02:46:34', '2018-01-15 02:46:34'),
(7, 42, '1', 'admin@admin.com', '1', '1', 1, 0, 0, '2018-01-15 02:56:47', '2018-01-15 02:56:47'),
(8, 42, '2', 'admin@admin.com', '2', '2', 2, 0, 0, '2018-01-15 02:57:04', '2018-01-15 02:57:04'),
(9, 41, '2', 'admin@admin.com', '2', '2', 2, 0, 0, '2018-01-15 04:29:39', '2018-01-15 04:29:39'),
(10, 41, '3', 'admin@admin.com', '3', '3', 3, 0, 0, '2018-01-15 04:29:47', '2018-01-15 04:29:47'),
(11, 41, '4', 'admin@admin.com', '4', '4', 4, 0, 0, '2018-01-15 04:30:12', '2018-01-15 04:30:12'),
(12, 41, '5', 'admin@admin.com', '5', '5', 5, 0, 0, '2018-01-15 04:30:20', '2018-01-15 04:30:20'),
(13, 41, '6', 'admin@admin.com', '6', '6', 1, 0, 0, '2018-01-15 04:30:58', '2018-01-15 04:30:58'),
(14, 41, '7', 'admin@admin.com', '7', '7', 2, 0, 0, '2018-01-15 04:31:06', '2018-01-15 04:31:06'),
(15, 55, 'Minh Trường', 'minhtruong93gtvt@gmail.com', 'hay hay', NULL, 4, 0, 0, '2018-02-01 03:21:57', '2018-02-01 03:21:57'),
(16, 50, 'Minh Trường', 'minhtruong93gtvt@gmail.com', 'hay', NULL, 4, 0, 0, '2018-02-12 03:50:44', '2018-02-12 03:50:44'),
(17, 50, 'abc', 'a@gmail.com', 'abc', NULL, 5, 0, 0, '2018-02-23 13:18:51', '2018-02-23 13:18:51'),
(18, 57, 'a', 'admin@admin.com', 'abc', NULL, 5, 0, 0, '2018-02-26 06:34:50', '2018-02-26 06:34:50'),
(19, 57, '2', 'admin@admin.com', '3', NULL, 4, 0, 0, '2018-02-26 07:19:57', '2018-02-26 07:19:57'),
(20, 56, 'a', 'admin@admin.com', 'a', NULL, 4, 0, 0, '2018-02-26 07:29:17', '2018-02-26 07:29:17'),
(21, 56, 'ab', 'admin@admin.com', 'ab', NULL, 2, 0, 0, '2018-02-26 07:29:47', '2018-02-26 07:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `product_trademark`
--

CREATE TABLE `product_trademark` (
  `id` int(10) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `kind_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_trademark`
--

INSERT INTO `product_trademark` (`id`, `type_id`, `kind_id`, `name`, `slug`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`, `is_active`, `is_deleted`) VALUES
(24, 27, 13, 'Rượu Chivas', 'ruou-chivas', 'trademarks/xqV2GZ9Yz6PM8yAmryoG7uudOIMFrOIyjdHhuhA7.jpeg', 'rượu chivas', '2017-12-31 10:36:18', '2017-12-31 10:36:18', NULL, 1, 0),
(25, 32, 19, 'Táo mèo tây bắc', 'tao-meo-tay-bac-1', 'trademarks/H9CCsU8YfOjYWVJLAqZW21A1aILaIVSHbGAa4Udm.jpeg', 'táo mèo tây bắn', '2017-12-31 10:46:35', '2017-12-31 11:02:39', NULL, 1, 0),
(26, 31, 18, 'rượu nếp cẩm miền nam', 'ruou-nep-cam-mien-nam', 'trademarks/d2DCGZMAcqVhadmHA6nhO0kGEm3VGizQ66WKpri7.jpeg', 'rượu nếp cẩm miền nam', '2017-12-31 10:47:32', '2017-12-31 10:53:50', NULL, 1, 0),
(27, 32, 19, 'Rượu Chivas 21', 'ruou-chivas-21', 'trademarks/ecdJkGhOOGtVPX1oKMdqs5lJi63sFTmHKd8dPAdy.jpeg', 'Rượu Chivas 21', '2017-12-31 10:48:56', '2017-12-31 10:50:42', NULL, 1, 0),
(28, 33, 20, 'Chất lượng 5 sao', 'chat-luong-5-sao', 'trademarks/L7anRdexrPrmivYVZ3rXf5292v2X1ArYu2yXt7SB.jpeg', 'avav', '2018-01-30 09:27:00', '2018-01-30 09:27:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(3, 'hung.luong@matocreative.vn', NULL, NULL),
(4, 'an.nguyen@matocreative.vn', NULL, NULL),
(5, 'minhtruong93gtvt@gmail.com', '2018-02-02 03:30:06', NULL),
(6, 'ab@gmail.com', NULL, NULL),
(7, 'a1bb@gmail.com', NULL, NULL),
(8, 'abg@gmail.com', NULL, NULL),
(9, 'quyen.nguyen@matocreative.vn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasting`
--

CREATE TABLE `tasting` (
  `id` int(10) UNSIGNED NOT NULL,
  `unique_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` decimal(20,2) NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_content` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_store` tinyint(4) NOT NULL DEFAULT '0',
  `people` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasting`
--

INSERT INTO `tasting` (`id`, `unique_code`, `customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_district`, `customer_city`, `customer_content`, `status`, `time`, `created_at`, `updated_at`, `is_store`, `people`) VALUES
(41, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '2h', 1, '2018-01-01 00:00:00', NULL, NULL, 0, 0),
(42, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '15h', 1, '2018-01-24 00:00:00', NULL, NULL, 0, 0),
(43, NULL, 11, 'Van Nguyen', 'vannguyen@user.com', '9839849223555.00', 'Số 1 ABC2', 'Hoàn Kiếm1', 'Hà Nội33', '20h', 1, '2018-01-17 00:00:00', NULL, NULL, 0, 0),
(44, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '2h', 1, '2018-02-02 00:00:00', NULL, NULL, 0, 0),
(45, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '', 1, '2018-02-27 00:00:00', NULL, NULL, 0, 0),
(47, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'abc', 'abc', 'abc', 'abc', 1, '2018-02-20 00:00:00', NULL, NULL, 0, 0),
(48, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', NULL, NULL, NULL, '2h', 1, '2018-02-08 00:00:00', NULL, NULL, 1, 0),
(49, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '9839849223555.00', NULL, NULL, NULL, '2h', 1, '2018-02-05 00:00:00', NULL, NULL, 1, 0),
(50, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '9839849223555.00', NULL, NULL, NULL, '14h', 1, '2018-02-22 00:00:00', NULL, NULL, 1, 3),
(51, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', NULL, NULL, NULL, 'abc', 1, '2018-02-22 15:06:00', NULL, NULL, 1, 2),
(52, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '9839849223555.00', NULL, NULL, NULL, 'abc', 1, '2018-02-28 10:00:00', NULL, NULL, 1, 3),
(53, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', NULL, NULL, NULL, 'abc', 1, '2018-02-28 16:00:00', NULL, NULL, 1, 2),
(54, NULL, 6, 'Ha Nguyen', 'hanguyen@user.com', '985767862.00', 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', 'asdasdasdasd', 0, '2018-03-14 03:00:00', NULL, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tasting_product`
--

CREATE TABLE `tasting_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `tasting_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasting_product`
--

INSERT INTO `tasting_product` (`id`, `tasting_id`, `product_id`, `product_name`, `created_at`, `updated_at`) VALUES
(8, 40, 43, 'rượu ai cập', NULL, NULL),
(9, 41, 43, 'rượu ai cập', NULL, NULL),
(10, 42, 43, 'rượu ai cập', NULL, NULL),
(11, 43, 40, 'test 3', NULL, NULL),
(12, 43, 43, 'rượu ai cập', NULL, NULL),
(13, 43, 44, 'abc', NULL, NULL),
(14, 44, 50, 'san pham 1', NULL, NULL),
(15, 44, 51, 'san pham 2', NULL, NULL),
(16, 45, 50, 'san pham 1', NULL, NULL),
(17, 45, 51, 'san pham 2', NULL, NULL),
(18, 47, 50, 'san pham 1', NULL, NULL),
(19, 48, 50, 'san pham 1', NULL, NULL),
(20, 49, 57, 'san phammmmmmmmmm', NULL, NULL),
(21, 50, 56, 'san pham 7', NULL, NULL),
(22, 51, 57, 'san phammmmmmmmmm', NULL, NULL),
(23, 52, 57, 'san phammmmmmmmmm', NULL, NULL),
(24, 53, 50, 'san pham 1', NULL, NULL),
(25, 54, 57, 'san phammmmmmmmmm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `title`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trường', '[\"a1\",\"b2\",\"c3\",\"d4\"]', 0, NULL, '2018-06-20 13:12:34'),
(5, 'Cấu hình Mobile', '[\"k\\u00edch th\\u01b0\\u1edbc m\\u00e0n h\\u00ecnh\",\"\\u0111\\u1ed9 ph\\u00e2n gi\\u1ea3i\",\"ram\",\"cpu\",\"gpu\"]', 0, NULL, '2018-06-19 17:28:02'),
(6, '3', '[\"q\",\"w\",\"4\"]', 0, NULL, '2018-06-20 09:21:15'),
(7, '123123', '[\"1a\",\"2b\",\"4d\",\"5e\",\"6f\"]', 0, NULL, NULL),
(8, 'asdasd', '[\"1a\",\"2b\",\"7\",\"8\",\"10\",\"11\"]', 0, NULL, NULL),
(9, 'asdasd', '[\"1\",\"2\",\"3\",\"8\",\"9\",\"10\",\"11\"]', 0, NULL, '2018-06-20 11:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `trademark`
--

CREATE TABLE `trademark` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `kind_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `title`, `slug`, `description`, `is_deleted`, `created_at`, `updated_at`, `is_active`, `image`) VALUES
(31, 'Rượu Nội', 'ruou-noi-1', 'rượu nội', 0, '2017-12-31 10:40:51', '2018-01-04 07:01:54', 1, 'Lighthouse.jpg'),
(32, 'Rượu ngoại 1', 'ruou-ngoai-1-1', 'rượu ngoại', 0, '2017-12-31 10:41:10', '2018-01-04 07:02:10', 1, 'Desert.jpg'),
(33, 'Dịch vụ tại nhà', 'dich-vu-tai-nha', 'ccac', 0, '2018-01-30 09:25:04', NULL, 1, '16387030_1560201323989974_6924660638793359133_n.jpg'),
(34, '1', '1-1', '1', 0, '2018-06-23 07:04:30', '2018-06-23 07:36:35', 0, '1.jpg'),
(35, '1', '1-1', '1', 0, '2018-06-23 07:06:09', '2018-06-23 07:06:35', 1, '3096360_underneath_the_tree-wallpaper-1920x1080.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `dob`, `address`, `district`, `city`, `password`, `remember_token`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'an nguyen', 'annguyen@admin.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$nfCNB/Gb9/Moch4IdsA97.LIWKu55Ybkh4sEFP2bm7MdyxTGJCDy6', 'lp2HOrf8IWodg172HyuCTGhaqdUWJSGSzG0pvPW9mSBY1wbD9HmTpUhdyXJw', '2017-10-30 18:59:43', '2017-10-30 18:59:43', NULL),
(2, 'hung nguyen', 'hungalexi@gmail.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$vi.MnC67kuYKDaMv00mSteizdcOcA6Q4QoSu/wIA16UfaR1dvrHVG', '8qDVsHCkhkXIJdEWwngXWncqqRxPhBYk2XW5bZgpd9pTA6VX26QOm9m9Zy6M', '2017-11-03 01:39:19', '2017-11-03 01:39:19', NULL),
(3, '1 an nguyen', 'eagleele_admin@eagleele.vn', NULL, NULL, NULL, NULL, NULL, '$2y$10$nI/oa4cvbzB9cQXm0kK0b.nuTraKB8zEHcW7IPusBvFIYQtQexhYy', '6PHA9vtpEsAW1irg36eZUjL4BxCHYFx4FtYpzXIoTMd9zdMkruCUSoccAsc1', '2017-11-03 02:34:39', '2017-11-03 02:34:39', NULL),
(4, 'an nguyen', 'admin123@admin.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$Dmr8Ms7CnV4lFzZAv2sSRe7rvDk6mDj5qVuaGsjHW9WNqulQ2stoq', NULL, '2017-11-08 09:33:49', '2017-11-08 09:33:49', NULL),
(5, 'Ha Tran', 'hatran1@admin.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$aJvJY/O01vV3oNVSoW8RheyeQZtbKbfza5JNovNv3L6.Avb6.TnEC', 'ev2TPUvwWzOXS66x0hvLEDaHewT5JsJMh5k64p10zzNnMKjvHeRWuI5A1uUU', '2017-11-15 08:32:19', '2017-11-15 08:32:19', NULL),
(6, 'Ha Nguyen', 'hanguyen@user.com', '0985767862', NULL, 'Tô Hiệu', 'Cầu Giấy', 'Hà Nội', '$2y$10$X97HEadux3XWWStnjse8GerJBmscjrfZtoNcTA5r.p0VcJvzlGP/u', '64lyXvqWYPMc9NkY9d3b6XH2WVIapti1EeuRCDaZa06pAYgrWwXBqsWcaw5z', '2017-11-15 08:35:57', '2018-02-23 18:11:06', NULL),
(7, 'Admin', 'maymymy_admin@maymymy.vn', NULL, NULL, NULL, NULL, NULL, '$2y$10$6Ji2vqAjzfEZS54WfwHzJu4Sy2.7OzK0zYq14j8beZeBmYVkHk.1q', 'haC2I6lYRQW5xd4MiKb4FHN1fA2RS3XpkJl6NxbMrh3UN0kEiHI3gfrYTOE5', '2017-11-17 07:41:14', '2017-11-17 07:41:14', NULL),
(8, 'Dung Nguyen', 'dungnguyen@user.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$zof5dy..mDQ4MYrsGVazE.dkVfc9dfBV283/1RjbsouEiEsOXNTlq', NULL, '2017-11-20 11:09:32', '2017-11-20 11:09:32', NULL),
(9, 'Hung Nguyen', 'hungnguyen@user.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$YmN8cjnHSCbG3ppAfDAeTuatbqLKkPf9l3SJIuOlrhAFP1p.0k4IW', 'J55TBlVQUBWTAeagvoAiPMhteaItcDjMVP39oDCYL6ptRoR11hrMiQI7Me0h', '2017-12-03 06:49:39', '2017-12-03 06:49:39', NULL),
(10, 'Tuan Nguyen', 'tuannguyen@user.com', NULL, NULL, NULL, NULL, NULL, '$2y$10$jStlwLZMrOYBVICxW02ShOwK20bKi/YIApAYWzvyihpztjFdUH4nO', 'aL4RHk3ibP7uUCOcPCWIICmijEViAfaCdDDy7VOtvpx0HGRq7K557o4Mp6Cc', '2017-12-03 06:50:56', '2017-12-03 06:50:56', NULL),
(11, 'Van Nguyen', 'vannguyen@user.com', '09839849223555', '2017-12-21', 'Số 1 ABC2', 'Hoàn Kiếm1', 'Hà Nội33', '$2y$10$mqWStvRo8QRBS9YO7.mvLeFImsd/qhZeNZ61ysSe396d850f6nYCG', NULL, '2017-12-03 07:03:01', '2017-12-04 10:27:50', NULL),
(12, 'Minh Trường', 'minhtruong93gtvt@gmail.com', '0985767862', '2018-03-01', NULL, NULL, NULL, '$2y$10$BnVs6blLL9l5NCaNRVBCGu663yObFJ5jZBaBJdP7n7WBXSL4NCP/q', NULL, '2018-03-01 07:49:45', '2018-03-01 07:49:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_like_product`
--

CREATE TABLE `user_like_product` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_like_product`
--

INSERT INTO `user_like_product` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(30, 9, 52, '2018-05-25 06:54:22', '2018-05-25 06:54:22'),
(31, 9, 53, '2018-05-25 06:54:24', '2018-05-25 06:54:24'),
(32, 9, 54, '2018-05-25 06:54:27', '2018-05-25 06:54:27'),
(33, 9, 56, '2018-05-25 06:54:28', '2018-05-25 06:54:28'),
(34, 9, 57, '2018-05-25 06:54:29', '2018-05-25 06:54:29'),
(36, 9, 59, '2018-05-25 06:55:11', '2018-05-25 06:55:11'),
(37, 9, 58, '2018-05-25 06:57:46', '2018-05-25 06:57:46'),
(38, 9, 51, '2018-05-25 06:57:51', '2018-05-25 06:57:51'),
(108, 6, 51, '2018-05-28 08:05:32', '2018-05-28 08:05:32'),
(110, 6, 5, '2018-06-02 02:25:51', '2018-06-02 02:25:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `library_id` (`library_id`);

--
-- Indexes for table `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_trademark`
--
ALTER TABLE `product_trademark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasting`
--
ALTER TABLE `tasting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasting_product`
--
ALTER TABLE `tasting_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `user_like_product`
--
ALTER TABLE `user_like_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `origin`
--
ALTER TABLE `origin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_trademark`
--
ALTER TABLE `product_trademark`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasting`
--
ALTER TABLE `tasting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tasting_product`
--
ALTER TABLE `tasting_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trademark`
--
ALTER TABLE `trademark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_like_product`
--
ALTER TABLE `user_like_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
