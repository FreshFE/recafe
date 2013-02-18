-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 02 月 18 日 08:51
-- 服务器版本: 5.5.25
-- PHP 版本: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `recafe`
--

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `hidden` tinyint(3) unsigned NOT NULL,
  `updateline` int(10) unsigned NOT NULL,
  `createline` int(10) unsigned NOT NULL,
  `customline` int(10) unsigned NOT NULL,
  `coverpath` char(26) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`id`, `cid`, `title`, `content`, `hidden`, `updateline`, `createline`, `customline`, `coverpath`, `price`) VALUES
(1, 2, '拿铁', '<p>新鲜拿铁</p>\r\n', 1, 1361115887, 1361115650, 1361030400, '2013/07/5120fae2ed62a.jpg', 28),
(2, 2, '摩卡', '', 1, 1361116108, 1361116068, 1361030400, '2013/07/5120fbcab2fb8.jpg', 32),
(3, 2, 'Espresso ', '', 1, 1361116873, 1361116818, 1361116800, '2013/08/5120fec64757d.jpg', 18),
(4, 2, '美式咖啡', '', 1, 1361116982, 1361116889, 1361116800, '2013/08/5120ff32e5a01.jpg', 18),
(5, 2, '卡布奇诺', '', 1, 1361117014, 1361116985, 1361116800, '2013/08/5120ff5429139.jpg', 32),
(6, 2, '焦糖玛奇朵', '', 1, 1361117035, 1361117017, 1361116800, '2013/08/5120ff690c491.jpg', 32),
(7, 2, 'Happy birthday', '', 1, 1361173709, 1361151980, 1361116800, '2013/08/5121dccb5c535.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
