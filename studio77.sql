-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 11:47 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studio77`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `article_description` text COLLATE utf8_unicode_ci NOT NULL,
  `article_date_time` datetime NOT NULL,
  `is_delete` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `article_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_title`, `article_description`, `article_date_time`, `is_delete`, `article_status`) VALUES
(1, 'Rafael Nadal criticises ruling to destroy doping evidence', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit semper orci, a accumsan mi vehicula ut. Integer euismod lorem sem, ac pretium erat egestas et. Nam gravida quam et viverra maximus. Quisque at urna eu odio congue consectetur. Suspendisse mollis suscipit dolor, sed rhoncus mauris. Quisque id condimentum sapien. Aenean ac odio euismod, posuere elit quis, viverra orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam maximus at velit in placerat. Quisque sollicitudin velit non dolor imperdiet accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida, nisl sed pulvinar viverra, augue magna vehicula odio, ac finibus nisl est eget tellus. Aliquam in rhoncus erat, a suscipit augue. Nulla sit amet purus a felis tincidunt finibus. Etiam lacinia, felis ultricies sagittis sodales, tortor lectus fermentum felis, et rhoncus urna ex quis risus. Quisque vitae tincidunt massa.</p>\r\n<p>Donec lacinia sapien in sem posuere, in pulvinar risus euismod. Ut cursus interdum velit et ornare. Nunc interdum, massa nec efficitur blandit, nisl diam viverra dui, et pellentesque augue purus id tellus. Nullam leo sem, consectetur eget vehicula id, ornare nec ex. Quisque id scelerisque felis, non euismod enim. Etiam efficitur eu ipsum ut sollicitudin. Nullam hendrerit fermentum ornare. Maecenas ut metus nibh. Maecenas eu massa in diam elementum sodales a sed quam. Maecenas rutrum enim id ipsum volutpat pulvinar. Integer ligula lorem, euismod iaculis nulla sit amet, egestas mollis orci.</p>', '2016-04-10 11:04:22', '', '1'),
(2, 'Serena Williams', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit semper orci, a accumsan mi vehicula ut. Integer euismod lorem sem, ac pretium erat egestas et. Nam gravida quam et viverra maximus. Quisque at urna eu odio congue consectetur. Suspendisse mollis suscipit dolor, sed rhoncus mauris. Quisque id condimentum sapien. Aenean ac odio euismod, posuere elit quis, viverra orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam maximus at velit in placerat. Quisque sollicitudin velit non dolor imperdiet accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida, nisl sed pulvinar viverra, augue magna vehicula odio, ac finibus nisl est eget tellus. Aliquam in rhoncus erat, a suscipit augue. Nulla sit amet purus a felis tincidunt finibus. Etiam lacinia, felis ultricies sagittis sodales, tortor lectus fermentum felis, et rhoncus urna ex quis risus. Quisque vitae tincidunt massa.</p>\r\n<p>Donec lacinia sapien in sem posuere, in pulvinar risus euismod. Ut cursus interdum velit et ornare. Nunc interdum, massa nec efficitur blandit, nisl diam viverra dui, et pellentesque augue purus id tellus. Nullam leo sem, consectetur eget vehicula id, ornare nec ex. Quisque id scelerisque felis, non euismod enim. Etiam efficitur eu ipsum ut sollicitudin. Nullam hendrerit fermentum ornare. Maecenas ut metus nibh. Maecenas eu massa in diam elementum sodales a sed quam. Maecenas rutrum enim id ipsum volutpat pulvinar. Integer ligula lorem, euismod iaculis nulla sit amet, egestas mollis orci.</p>', '2016-04-10 11:04:24', '', '1'),
(3, 'Starting From Zero', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit semper orci, a accumsan mi vehicula ut. Integer euismod lorem sem, ac pretium erat egestas et. Nam gravida quam et viverra maximus. Quisque at urna eu odio congue consectetur. Suspendisse mollis suscipit dolor, sed rhoncus mauris. Quisque id condimentum sapien. Aenean ac odio euismod, posuere elit quis, viverra orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam maximus at velit in placerat. Quisque sollicitudin velit non dolor imperdiet accumsan. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed gravida, nisl sed pulvinar viverra, augue magna vehicula odio, ac finibus nisl est eget tellus. Aliquam in rhoncus erat, a suscipit augue. Nulla sit amet purus a felis tincidunt finibus. Etiam lacinia, felis ultricies sagittis sodales, tortor lectus fermentum felis, et rhoncus urna ex quis risus. Quisque vitae tincidunt massa.</p>\r\n<p>Donec lacinia sapien in sem posuere, in pulvinar risus euismod. Ut cursus interdum velit et ornare. Nunc interdum, massa nec efficitur blandit, nisl diam viverra dui, et pellentesque augue purus id tellus. Nullam leo sem, consectetur eget vehicula id, ornare nec ex. Quisque id scelerisque felis, non euismod enim. Etiam efficitur eu ipsum ut sollicitudin. Nullam hendrerit fermentum ornare. Maecenas ut metus nibh. Maecenas eu massa in diam elementum sodales a sed quam. Maecenas rutrum enim id ipsum volutpat pulvinar. Integer ligula lorem, euismod iaculis nulla sit amet, egestas mollis orci.</p>', '2016-04-10 11:04:25', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_small_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `image_small_name`, `article_id`) VALUES
(1, 'rafael_nadal_criticises_ruling_to_destroy_doping_evidence10_04_2016_11_04_21.jpg', 'rafael_nadal_criticises_ruling_to_destroy_doping_evidence10_04_2016_11_04_21_small.jpg', 4),
(2, 'rafael_nadal_criticises_ruling_to_destroy_doping_evidence10_04_2016_11_04_22.jpg', 'rafael_nadal_criticises_ruling_to_destroy_doping_evidence10_04_2016_11_04_22_small.jpg', 1),
(3, 'serena_williams10_04_2016_11_04_24.jpg', 'serena_williams10_04_2016_11_04_24_small.jpg', 2),
(4, 'starting_from_zero10_04_2016_11_04_25.jpg', 'starting_from_zero10_04_2016_11_04_25_small.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image_name_small` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image_name`, `image_name_small`, `image_title`, `status`) VALUES
(1, '10_04_2016_11_04_12.jpg', '10_04_2016_11_04_12_small.jpg', 'Php Web Development', '1'),
(2, '2_10_04_2016_11_04_16.jpg', '2_10_04_2016_11_04_16_small.jpg', 'Php Web Development', '1'),
(3, '3_10_04_2016_11_04_16.jpg', '3_10_04_2016_11_04_16_small.jpg', 'Php Web Development', '1'),
(4, '10_04_2016_11_04_13.jpg', '10_04_2016_11_04_13_small.jpg', 'Php Web Development', '1'),
(5, '10_04_2016_11_04_16.jpg', '10_04_2016_11_04_16_small.jpg', 'Php Web Development', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'md5()',
  `user_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 - admin 2 - user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_surname`, `user_email`, `user_password`, `user_status`) VALUES
(1, 'Dragan Admin', 'Savic', 'savicdragan2707@gmail.com', '6e13a89ccc3744d6b06103d462ce8eb2', '1'),
(2, 'Dragan User', 'Savic', 'dragan.savic@link.co.rs', '378845045d3ea4ee2a89696c3ed17ffa', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
