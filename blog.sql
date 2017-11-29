-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 09:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cat 1', '2017-05-13 09:58:28', '2017-05-13 09:58:28'),
(2, 'cat 2', '2017-05-13 09:58:37', '2017-05-13 09:58:37'),
(3, 'cat 3', '2017-05-13 09:58:45', '2017-05-13 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(16, 'Akbar', 'adnan@zahratalrawda.com', 'I am the great', 1, 3, '2017-05-16 11:42:09', '2017-05-16 11:42:09'),
(18, 'AHMED', 'admin@gmail.com', 'good morning adnan', 1, 4, '2017-05-16 14:01:37', '2017-05-16 14:01:37'),
(21, 'eret', 'adnanpalli@gmail.com', 'heloo', 1, 6, '2017-08-02 12:01:09', '2017-08-02 12:01:09'),
(22, 'adnan', 'adnan@gmail.com', 'thanks for guiding us...', 1, 7, '2017-11-09 06:22:44', '2017-11-09 06:22:44'),
(24, 'qas', 'admin@gmail.com', 'saasassa', 1, 8, '2017-11-22 05:19:20', '2017-11-22 05:19:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_22_103330_create_posts_table', 1),
(4, '2017_05_06_073532_add_slug_to_posts', 1),
(5, '2017_05_11_060727_create_categories_table', 1),
(6, '2017_05_11_061120_add_category_id_to_posts', 1),
(7, '2017_05_11_105127_create_tags_table', 1),
(8, '2017_05_11_121916_create_post_tag_table', 1),
(10, '2017_05_13_120700_create_comments_table', 2),
(12, '2017_05_13_132530_add_comment_table', 3),
(13, '2017_05_17_064412_add_img_to_post', 4);

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
('adnanpalli@gmail.com', '$2y$10$.6RzCC72tXAkOKsvQC91HOtx0gyLVKFtEPsa4x./kzT51XPu7ZPV6', '2017-11-22 10:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'css post', '<blockquote>\r\n<p style="text-align: center;"><em><strong>Accessible icons Modern versions of assistive technologies will announce CSS generated content, as well as specific Unicode characters. To avoid unintended and confusing output in screen readers (particularly when icons are used purely for decoration),</strong></em></p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p style="text-align: center;">LUCKNOW: A 35-year-old IAS officer from Karnataka <a class="key_underline" href="http://timesofindia.indiatimes.com/topic/Anurag-Tiwari">Anurag Tiwari</a> was found dead outside Meera Bai VIP guest house in <a class="key_underline" href="http://timesofindia.indiatimes.com/topic/Hazratganj">Hazratganj</a> area of Lucknow on Wednesday morning. Police says Tiwari''s death was not unnatural but were waiting for postmortem examination to take place. <br /> <br /> A native of Bahraich district, Tiwari was posted as food and civil supplies commissioner in Bengaluru at present.</p>\r\n</blockquote>', 'css-post', NULL, 2, '2017-05-13 10:01:26', '2017-05-17 02:13:52'),
(4, 'New Tiny', '<p><em><strong><img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-kiss.gif" alt="kiss"><img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-tongue-out.gif" alt="tongue-out"><img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-kiss.gif" alt="kiss">Hello Adnan<img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-kiss.gif" alt="kiss"><img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-kiss.gif" alt="kiss"><img src="https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-surprised.gif" alt="surprised"></strong></em></p>\r\n<p><em><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt est ac dolor condimentum vitae laoreet ante accumsan. Nullam tincidunt tincidunt ante tempus commodo. Duis rutrum, magna non lacinia tincidunt, risus lacus tempus ipsum, sit amet euismod justo metus ut metus. Donec feugiat urna non leo laoreet in tincidunt lectus gravida. Sed semper ante sed dui consectetur eget commodo eros imperdiet. Mauris magna diam, scelerisque at ornare vel, dignissim ac sem. Fusce id congue lacus. Duis sit amet tellus erat. Cum sociis natoque penatibus et magnis dis parturient montes,</strong></em></p>\r\n<p> </p>\r\n<p><em><strong>&lt;script&gt;alert(''hello'');&lt;/script&gt;</strong></em></p>\r\n<p> </p>', '12-slug', '1495010572.jpg', 2, '2017-05-16 13:43:07', '2017-05-17 05:42:52'),
(6, 'File Storage', '<h2><a href="https://laravel.com/docs/5.4/filesystem#configuration">Configuration</a></h2>\r\n<p>The filesystem configuration file is located at config/filesystems.php. Within this file you may configure all of your "disks". Each disk represents a particular storage driver and storage location. Example configurations for each supported driver are included in the configuration file. So, simply modify the configuration to reflect your storage preferences and credentials.</p>\r\n<p>Of course, you may configure as many disks as you like, and may even have multiple disks that use the same driver.</p>', 'File-Storage', '1495010506.jpg', 3, '2017-05-17 04:32:18', '2017-05-17 05:41:47'),
(7, 'My First review on iphone', '<p style="font-family:''open_sans'', Helvetica, Arial, ''Lucida Grande'', sans-serif;font-size:16px;color:#282828;background-color:#f5f5f5;">Of all the iPhone releases in the decade following the 2007 original, the iPhone 8 has probably generated the <a href="https://www.digitaltrends.com/business/iphone-8-launch/">least excitement</a>. There’s a very good reason for that: the iPhone X (ten). Apple’s nomenclature sends a very clear message: The best iPhone you can get isn’t the iPhone 8, or even its big brother, the <a href="https://www.digitaltrends.com/cell-phone-reviews/apple-iphone-8-plus-review/">iPhone 8 Plus</a>, but the iPhone X. And you don’t have to wait two years for it, because it’ll be here in November.</p>\r\n<p style="font-family:''open_sans'', Helvetica, Arial, ''Lucida Grande'', sans-serif;font-size:16px;color:#282828;background-color:#f5f5f5;">Despite the glamorous allure of an edge-to-edge OLED display and futuristic-feeling facial recognition functionality, not everyone will be persuaded to part with $1,000 or more for the <a href="https://www.digitaltrends.com/cell-phone-reviews/apple-iphone-x-review/">iPhone X</a>. Sure, wait until November for reviews — or hedge your bets and wait for the <em>next</em>next-gen model … <a href="https://www.digitaltrends.com/mobile/iphone-x-2018/">Apple iPhone X 2018</a>, anyone? For now, whether you’re on the upgrade cycle from the iPhone 6S or just looking for a more affordable iPhone, the iPhone 8 is for you. As our review shows, it may be refinement, rather than revolution, but it’s a damn good phone all the same.</p>', 'iphone', '1510219312.jpg', 3, '2017-11-09 06:21:53', '2017-11-09 06:21:53'),
(8, 'ssss', '<p>eerwerwerw</p>', 'sss-111', NULL, 2, '2017-11-15 05:56:29', '2017-11-22 05:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(5, 3, 3),
(6, 3, 4),
(7, 3, 5),
(12, 6, 3),
(13, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'PHP', '2017-05-13 09:57:56', '2017-05-13 09:57:56'),
(2, 'JAVA', '2017-05-13 09:58:02', '2017-05-13 09:58:02'),
(3, 'BIG POST', '2017-05-13 09:58:09', '2017-05-13 09:58:09'),
(4, 'RUBY', '2017-05-13 09:58:17', '2017-05-13 09:58:17'),
(5, 'CSS', '2017-05-13 10:00:52', '2017-05-13 10:00:52'),
(6, 'XXX', '2017-05-17 03:06:34', '2017-05-17 03:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adnan', 'adnan@zahratalrawda.com', '$2y$10$ea/XwvSgM6j45yZ4rcfcK.xhK4c4.BJVu17kIzC3hyQQK8gMlOB0i', 'xSYSMxTDDjRKjtqPVv2jCDxOJ3x7FJmO2Q49ZgXHbt91COXYdsHerMZzjUYH', '2017-05-13 09:57:47', '2017-05-13 09:57:47'),
(2, 'Afra', 'adnanpalli@gmail.com', '$2y$10$4JHmmPKoV7svPMbpjSdp/.Ij9HFzotzROegr/a/O.TC2ycoYsu2dW', '3RAvjzxSwCYUdaJO45JGTZ0ZwoGV0MgPYAaJJDtJ23Sm2YaAZvYrL5Tjc5gb', '2017-11-09 06:18:55', '2017-11-09 06:18:55'),
(3, 'suma', 'suma@gmail.com', '$2y$10$f8RF1prAVZVSVKdDx3GIvOlGXST/odrAG7NyByysNOt2uYauU1PaG', NULL, '2017-11-15 05:55:34', '2017-11-15 05:55:34'),
(4, 'admin', 'admin@gmail.com', '$2y$10$eMnjgYUJ8poOc9isyJxWpO8EhstghWWyln0jgoxft45o/jqYf5CIi', NULL, '2017-11-22 05:18:43', '2017-11-22 05:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
